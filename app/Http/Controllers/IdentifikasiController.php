<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\HasilIdentifikasi;
use App\Models\HasilIdentifikasiDetail;
use App\Services\CertaintyFactorService;
use Illuminate\Http\Request;

class IdentifikasiController extends Controller
{
    // Daftar bobot CF berdasarkan istilah kepastian (untuk dropdown pilihan user)
    public const BOBOT_CF = [
        '0.0' => 'Tidak Pernah',
        '0.2' => 'Jarang',
        '0.4' => 'Kadang-Kadang',
        '0.6' => 'Cukup Sering',
        '0.8' => 'Sering',
        '1.0' => 'Sangat Sering',
    ];

    // STEP 1: Form data diri
    public function dataDiri()
    {
        return view('identifikasi.data_diri');
    }

    public function simpanDataDiri(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'usia' => ['nullable', 'integer', 'min:1', 'max:120'],
            'jenis_kelamin' => ['nullable', 'in:Laki-laki,Perempuan'],
        ]);

        session(['identifikasi.data_diri' => $validated]);

        return redirect()->route('identifikasi.gejala');
    }

    // STEP 2: Pilih gejala + tingkat keyakinan
    public function pilihGejala()
    {
        if (! session()->has('identifikasi.data_diri')) {
            return redirect()->route('identifikasi.dataDiri');
        }

        $gejala = Gejala::orderBy('kode_gejala')->get();

        return view('identifikasi.pilih_gejala', [
            'gejala' => $gejala,
            'bobotCf' => self::BOBOT_CF,
        ]);
    }

    // STEP 3: Proses perhitungan CF & simpan hasil
    public function proses(Request $request, CertaintyFactorService $cfService)
    {
        if (! session()->has('identifikasi.data_diri')) {
            return redirect()->route('identifikasi.dataDiri');
        }

        $validated = $request->validate([
            'gejala' => ['required', 'array', 'min:1'],
            'gejala.*' => ['exists:gejala,id'],
            'cf_user' => ['required', 'array'],
        ]);

        $dataDiri = session('identifikasi.data_diri');

        // Susun input CF sesuai urutan gejala yang dicentang (mengikuti urutan tampil di form)
        $inputs = [];
        foreach ($validated['gejala'] as $gejalaId) {
            $inputs[$gejalaId] = $validated['cf_user'][$gejalaId] ?? 0;
        }

        $hasilHitung = $cfService->hitung($inputs);

        $hasil = HasilIdentifikasi::create([
            'nama_user' => $dataDiri['nama'],
            'usia' => $dataDiri['usia'] ?? null,
            'jenis_kelamin' => $dataDiri['jenis_kelamin'] ?? null,
            'nilai_cf_combine' => $hasilHitung['cf_combine'],
            'persentase' => $hasilHitung['persentase'],
            'tingkat_insomnia_id' => $hasilHitung['tingkat']?->id,
            'tanggal' => now()->toDateString(),
        ]);

        foreach ($hasilHitung['detail'] as $d) {
            HasilIdentifikasiDetail::create([
                'hasil_identifikasi_id' => $hasil->id,
                'gejala_id' => $d['gejala_id'],
                'cf_pakar' => $d['cf_pakar'],
                'cf_user' => $d['cf_user'],
                'cf_he' => $d['cf_he'],
                'urutan' => $d['urutan'],
            ]);
        }

        session()->forget('identifikasi.data_diri');
        session(['identifikasi.hasil_id' => $hasil->id]);

        return redirect()->route('identifikasi.hasil', $hasil->id);
    }

    // Tampilkan hasil identifikasi
    public function hasil(HasilIdentifikasi $hasil)
    {
        $hasil->load(['tingkatInsomnia', 'detail.gejala']);

        return view('identifikasi.hasil', compact('hasil'));
    }
}

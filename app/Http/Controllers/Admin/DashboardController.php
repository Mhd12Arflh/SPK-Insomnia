<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aturan;
use App\Models\Gejala;
use App\Models\HasilIdentifikasi;
use App\Models\TingkatInsomnia;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahGejala = Gejala::count();
        $jumlahTingkat = TingkatInsomnia::count();
        $jumlahAturan = Aturan::count();
        $jumlahHasil = HasilIdentifikasi::count();

        $hasilPerTingkat = HasilIdentifikasi::selectRaw('tingkat_insomnia_id, count(*) as total')
            ->groupBy('tingkat_insomnia_id')
            ->with('tingkatInsomnia')
            ->get();

        return view('admin.dashboard', compact(
            'jumlahGejala',
            'jumlahTingkat',
            'jumlahAturan',
            'jumlahHasil',
            'hasilPerTingkat'
        ));
    }
}

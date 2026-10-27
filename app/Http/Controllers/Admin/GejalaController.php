<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aturan;
use App\Models\Gejala;
use Illuminate\Http\Request;

class GejalaController extends Controller
{
    public function index()
    {
        $gejala = Gejala::with('aturan')->orderBy('kode_gejala')->paginate(10);

        return view('admin.gejala.index', compact('gejala'));
    }

    public function create()
    {
        return view('admin.gejala.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_gejala' => ['required', 'string', 'max:10', 'unique:gejala,kode_gejala'],
            'nama_gejala' => ['required', 'string', 'max:255'],
            'nilai_cf_pakar' => ['required', 'numeric', 'min:0', 'max:1'],
        ]);

        $gejala = Gejala::create([
            'kode_gejala' => $validated['kode_gejala'],
            'nama_gejala' => $validated['nama_gejala'],
        ]);

        Aturan::create([
            'gejala_id' => $gejala->id,
            'nilai_cf_pakar' => $validated['nilai_cf_pakar'],
        ]);

        return redirect()->route('admin.gejala.index')->with('success', 'Data gejala berhasil ditambahkan.');
    }

    public function edit(Gejala $gejala)
    {
        $gejala->load('aturan');

        return view('admin.gejala.edit', compact('gejala'));
    }

    public function update(Request $request, Gejala $gejala)
    {
        $validated = $request->validate([
            'kode_gejala' => ['required', 'string', 'max:10', 'unique:gejala,kode_gejala,' . $gejala->id],
            'nama_gejala' => ['required', 'string', 'max:255'],
            'nilai_cf_pakar' => ['required', 'numeric', 'min:0', 'max:1'],
        ]);

        $gejala->update([
            'kode_gejala' => $validated['kode_gejala'],
            'nama_gejala' => $validated['nama_gejala'],
        ]);

        Aturan::updateOrCreate(
            ['gejala_id' => $gejala->id],
            ['nilai_cf_pakar' => $validated['nilai_cf_pakar']]
        );

        return redirect()->route('admin.gejala.index')->with('success', 'Data gejala berhasil diperbarui.');
    }

    public function destroy(Gejala $gejala)
    {
        $gejala->delete();

        return redirect()->route('admin.gejala.index')->with('success', 'Data gejala berhasil dihapus.');
    }
}

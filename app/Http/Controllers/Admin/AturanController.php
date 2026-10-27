<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aturan;
use App\Models\Gejala;
use Illuminate\Http\Request;

class AturanController extends Controller
{
    // "Aturan (Rule CF)" mengelola bobot CF pakar (rule base) untuk tiap gejala.
    public function index()
    {
        $aturan = Aturan::with('gejala')->orderByDesc('id')->paginate(10);

        return view('admin.aturan.index', compact('aturan'));
    }

    public function create()
    {
        $gejalaTanpaAturan = Gejala::whereDoesntHave('aturan')->orderBy('kode_gejala')->get();

        return view('admin.aturan.create', compact('gejalaTanpaAturan'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'gejala_id' => ['required', 'exists:gejala,id', 'unique:aturan,gejala_id'],
            'nilai_cf_pakar' => ['required', 'numeric', 'min:0', 'max:1'],
        ]);

        Aturan::create($validated);

        return redirect()->route('admin.aturan.index')->with('success', 'Rule CF berhasil ditambahkan.');
    }

    public function edit(Aturan $aturan)
    {
        $aturan->load('gejala');

        return view('admin.aturan.edit', compact('aturan'));
    }

    public function update(Request $request, Aturan $aturan)
    {
        $validated = $request->validate([
            'nilai_cf_pakar' => ['required', 'numeric', 'min:0', 'max:1'],
        ]);

        $aturan->update($validated);

        return redirect()->route('admin.aturan.index')->with('success', 'Rule CF berhasil diperbarui.');
    }

    public function destroy(Aturan $aturan)
    {
        $aturan->delete();

        return redirect()->route('admin.aturan.index')->with('success', 'Rule CF berhasil dihapus.');
    }
}

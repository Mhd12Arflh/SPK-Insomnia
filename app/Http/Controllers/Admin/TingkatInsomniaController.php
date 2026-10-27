<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TingkatInsomnia;
use Illuminate\Http\Request;

class TingkatInsomniaController extends Controller
{
    public function index()
    {
        $tingkat = TingkatInsomnia::orderBy('persentase_min')->paginate(10);

        return view('admin.tingkat.index', compact('tingkat'));
    }

    public function create()
    {
        return view('admin.tingkat.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validated($request);

        TingkatInsomnia::create($validated);

        return redirect()->route('admin.tingkat.index')->with('success', 'Data tingkat gangguan tidur berhasil ditambahkan.');
    }

    public function edit(TingkatInsomnia $tingkat)
    {
        return view('admin.tingkat.edit', compact('tingkat'));
    }

    public function update(Request $request, TingkatInsomnia $tingkat)
    {
        $validated = $this->validated($request, $tingkat->id);

        $tingkat->update($validated);

        return redirect()->route('admin.tingkat.index')->with('success', 'Data tingkat gangguan tidur berhasil diperbarui.');
    }

    public function destroy(TingkatInsomnia $tingkat)
    {
        $tingkat->delete();

        return redirect()->route('admin.tingkat.index')->with('success', 'Data tingkat gangguan tidur berhasil dihapus.');
    }

    private function validated(Request $request, $ignoreId = null): array
    {
        return $request->validate([
            'kode' => ['required', 'string', 'max:10', 'unique:tingkat_insomnia,kode,' . $ignoreId],
            'nama' => ['required', 'string', 'max:100'],
            'nilai_min' => ['required', 'numeric', 'min:0', 'max:1'],
            'nilai_max' => ['required', 'numeric', 'min:0', 'max:1', 'gte:nilai_min'],
            'persentase_min' => ['required', 'numeric', 'min:0', 'max:100'],
            'persentase_max' => ['required', 'numeric', 'min:0', 'max:100', 'gte:persentase_min'],
            'saran' => ['nullable', 'string'],
        ]);
    }
}

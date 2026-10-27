<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HasilIdentifikasi;

class HasilIdentifikasiController extends Controller
{
    public function index()
    {
        $hasil = HasilIdentifikasi::with('tingkatInsomnia')
            ->orderByDesc('tanggal')
            ->orderByDesc('id')
            ->paginate(10);

        return view('admin.hasil.index', compact('hasil'));
    }

    public function show(HasilIdentifikasi $hasil)
    {
        $hasil->load(['tingkatInsomnia', 'detail.gejala']);

        return view('admin.hasil.show', compact('hasil'));
    }

    public function destroy(HasilIdentifikasi $hasil)
    {
        $hasil->delete();

        return redirect()->route('admin.hasil.index')->with('success', 'Data hasil identifikasi berhasil dihapus.');
    }
}

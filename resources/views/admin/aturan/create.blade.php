@extends('layouts.admin')

@section('title', 'Tambah Rule CF')

@section('content')
    <div class="card mx-auto max-w-lg p-6 sm:p-8">
        <h2 class="mb-5 font-display text-lg text-ink">Tambah Rule CF</h2>

        @if ($errors->any())
            <div class="mb-4 rounded-xl border border-danger/20 bg-danger/5 px-4 py-3 text-sm text-danger">
                <ul class="list-inside list-disc space-y-0.5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.aturan.store') }}" class="space-y-4">
            @csrf
            <div>
                <label class="field-label">Gejala</label>
                <select name="gejala_id" class="field-input" required>
                    <option value="">-- Pilih gejala --</option>
                    @foreach ($gejalaTanpaAturan as $g)
                        <option value="{{ $g->id }}" {{ old('gejala_id') == $g->id ? 'selected' : '' }}>
                            {{ $g->kode_gejala }} - {{ $g->nama_gejala }}
                        </option>
                    @endforeach
                </select>
                @if ($gejalaTanpaAturan->isEmpty())
                    <p class="mt-1.5 text-xs text-moon-dark">Semua gejala sudah memiliki rule CF.</p>
                @endif
            </div>
            <div>
                <label class="field-label">Nilai CF Pakar (0.0 &ndash; 1.0)</label>
                <input type="number" step="0.1" min="0" max="1" name="nilai_cf_pakar" class="field-input" value="{{ old('nilai_cf_pakar') }}" required>
            </div>
            <div class="flex gap-3 pt-2">
                <button class="btn-primary">Simpan</button>
                <a href="{{ route('admin.aturan.index') }}" class="btn-light">Batal</a>
            </div>
        </form>
    </div>
@endsection

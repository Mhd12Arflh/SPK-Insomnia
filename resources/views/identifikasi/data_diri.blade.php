@extends('layouts.app')

@section('title', 'Data Diri')

@php $step = 1; @endphp

@section('content')
    <h2 class="mb-1 font-display text-xl text-ink">Data Diri</h2>
    <p class="mb-6 text-sm text-slate">Isi data singkat berikut sebelum memulai identifikasi.</p>

    @if ($errors->any())
        <div class="mb-4 rounded-xl border border-danger/20 bg-danger/5 px-4 py-3 text-sm text-danger">
            <ul class="list-inside list-disc space-y-0.5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('identifikasi.simpanDataDiri') }}" class="space-y-4">
        @csrf
        <div>
            <label class="field-label">Nama Lengkap</label>
            <input type="text" name="nama" class="field-input" placeholder="Masukkan nama lengkap" value="{{ old('nama') }}" required>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="field-label">Usia</label>
                <input type="number" name="usia" class="field-input" placeholder="Usia" min="1" max="120" value="{{ old('usia') }}">
            </div>
            <div>
                <label class="field-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="field-input">
                    <option value="">-- Pilih --</option>
                    <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
        </div>
        <div class="flex justify-end pt-2">
            <button type="submit" class="btn-accent w-full sm:w-auto">
                Lanjut
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" class="h-4 w-4"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-6-7 7 7-7 7"/></svg>
            </button>
        </div>
    </form>
@endsection

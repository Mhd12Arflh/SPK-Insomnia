@extends('layouts.app')

@section('title', 'Pilih Gejala')

@php $step = 2; @endphp

@section('content')
    <h2 class="mb-1 font-display text-xl text-ink">Pilih Gejala</h2>
    <p class="mb-5 text-sm text-slate">Centang gejala yang Anda alami, lalu tentukan tingkat keseringannya.</p>

    @if ($errors->any())
        <div class="mb-4 rounded-xl border border-danger/20 bg-danger/5 px-4 py-3 text-sm text-danger">
            <ul class="list-inside list-disc space-y-0.5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('identifikasi.proses') }}">
        @csrf
        <div class="max-h-[26rem] space-y-2 overflow-y-auto rounded-xl border border-line p-2 sm:p-3">
            @foreach ($gejala as $g)
                <div data-row class="flex flex-col gap-2 rounded-xl border border-line p-3 transition-colors sm:flex-row sm:items-center sm:justify-between">
                    <label class="flex items-start gap-3 text-sm text-ink">
                        <input type="checkbox" class="gejala-check mt-0.5 h-4 w-4 shrink-0 rounded border-line text-abyss focus:ring-abyss" name="gejala[]" value="{{ $g->id }}" data-target="cf-{{ $g->id }}">
                        <span>{{ $g->nama_gejala }}</span>
                    </label>
                    <select name="cf_user[{{ $g->id }}]" id="cf-{{ $g->id }}" class="field-input w-full !py-2 text-sm sm:w-48" disabled>
                        <option value="">Pilih</option>
                        @foreach ($bobotCf as $nilai => $label)
                            <option value="{{ $nilai }}">{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
            @endforeach
        </div>

        <div class="mt-6 flex flex-col-reverse gap-3 sm:flex-row sm:justify-between">
            <a href="{{ route('identifikasi.dataDiri') }}" class="btn-light w-full sm:w-auto">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" class="h-4 w-4"><path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5m6 7-7-7 7-7"/></svg>
                Kembali
            </a>
            <button type="submit" class="btn-accent w-full sm:w-auto">Proses Analisis</button>
        </div>
    </form>
@endsection

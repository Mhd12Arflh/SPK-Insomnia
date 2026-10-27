@extends('layouts.app')

@section('title', 'Hasil Identifikasi')

@php $step = 3; @endphp

@section('content')
    <div class="mb-6 rounded-2xl bg-[radial-gradient(ellipse_at_top,_#2C5670_0%,_#122430_75%)] p-6 text-center text-white sm:p-8">
        <div class="text-xs uppercase tracking-wide text-white/60">Tingkat Insomnia</div>
        <div class="mt-1 font-display text-2xl sm:text-3xl">
            {{ $hasil->tingkatInsomnia ? 'Insomnia ' . $hasil->tingkatInsomnia->nama : 'Tidak Terindikasi' }}
        </div>
        <div class="mt-4 text-xs uppercase tracking-wide text-white/60">Tingkat Keyakinan</div>
        <div class="mt-1 text-4xl font-bold text-moon">{{ number_format($hasil->persentase, 2) }}%</div>
    </div>

    @if ($hasil->tingkatInsomnia && $hasil->tingkatInsomnia->saran)
        <div class="mb-6 rounded-xl border border-line bg-moon-soft/40 p-4 sm:p-5">
            <p class="text-sm font-semibold text-ink">Saran</p>
            <p class="mt-1 text-sm text-slate">{{ $hasil->tingkatInsomnia->saran }}</p>
        </div>
    @endif

    <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-between">
        <button onclick="window.print()" class="btn-light w-full sm:w-auto">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-4 w-4"><path stroke-linecap="round" stroke-linejoin="round" d="M6 9V2h12v7M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2m-12 0h12v4H6v-4Z"/></svg>
            Cetak Hasil
        </button>
        <a href="{{ route('identifikasi.dataDiri') }}" class="btn-accent w-full sm:w-auto">Selesai</a>
    </div>
@endsection

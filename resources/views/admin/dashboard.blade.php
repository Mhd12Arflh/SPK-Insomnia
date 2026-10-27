@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-2 gap-4 sm:grid-cols-4">
        @php
            $stats = [
                ['label' => 'Gejala', 'value' => $jumlahGejala, 'icon' => 'M9 12h6m-6 4h6M9 8h6M5 4h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1Z'],
                ['label' => 'Tingkat Insomnia', 'value' => $jumlahTingkat, 'icon' => 'M4 20V10m8 10V4m8 16v-7'],
                ['label' => 'Aturan', 'value' => $jumlahAturan, 'icon' => 'M12 3v3m0 12v3M5.6 5.6l2.1 2.1m8.6 8.6 2.1 2.1M3 12h3m12 0h3M5.6 18.4l2.1-2.1m8.6-8.6 2.1-2.1'],
                ['label' => 'Hasil Identifikasi', 'value' => $jumlahHasil, 'icon' => 'M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2M9 5a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2M9 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2m-5 8 2 2 4-4'],
            ];
        @endphp
        @foreach ($stats as $s)
            <div class="card p-4 sm:p-5">
                <div class="mb-3 flex h-9 w-9 items-center justify-center rounded-xl bg-moon-soft text-abyss-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-5 w-5"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $s['icon'] }}"/></svg>
                </div>
                <div class="font-display text-2xl text-ink sm:text-3xl">{{ $s['value'] }}</div>
                <div class="mt-0.5 text-xs text-slate sm:text-sm">{{ $s['label'] }}</div>
            </div>
        @endforeach
    </div>

    <div class="card mt-6 p-5 sm:p-6">
        <h2 class="font-display text-lg text-ink">Sebaran Tingkat Gangguan Tidur</h2>
        <p class="mb-4 text-sm text-slate">Ringkasan hasil identifikasi yang sudah tercatat di sistem.</p>

        @if ($hasilPerTingkat->isEmpty())
            <div class="rounded-xl border border-dashed border-line py-10 text-center text-sm text-slate">
                Belum ada data hasil identifikasi.
            </div>
        @else
            <div class="space-y-4">
                @foreach ($hasilPerTingkat as $row)
                    <div>
                        <div class="mb-1.5 flex items-center justify-between text-sm">
                            <span class="font-medium text-ink">{{ $row->tingkatInsomnia->nama ?? 'Tidak diketahui' }}</span>
                            <span class="text-slate">{{ $row->total }} orang</span>
                        </div>
                        <div class="h-2 overflow-hidden rounded-full bg-mist">
                            <div class="h-full rounded-full bg-abyss" style="width: {{ $jumlahHasil ? round($row->total / $jumlahHasil * 100) : 0 }}%"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection

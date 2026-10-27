@extends('layouts.admin')

@section('title', 'Detail Hasil Identifikasi')

@section('content')
    <a href="{{ route('admin.hasil.index') }}" class="mb-4 inline-flex items-center gap-1 text-sm text-slate hover:text-ink">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="h-4 w-4"><path stroke-linecap="round" stroke-linejoin="round" d="m15 18-6-6 6-6"/></svg>
        Kembali
    </a>

    <div class="card mb-5 overflow-hidden">
        <div class="grid grid-cols-1 divide-y divide-line sm:grid-cols-2 sm:divide-x sm:divide-y-0">
            <div class="p-6">
                <h2 class="mb-3 font-display text-lg text-ink">Data Diri</h2>
                <dl class="space-y-2 text-sm">
                    <div class="flex justify-between"><dt class="text-slate">Nama</dt><dd class="font-medium text-ink">{{ $hasil->nama_user }}</dd></div>
                    <div class="flex justify-between"><dt class="text-slate">Usia</dt><dd class="font-medium text-ink">{{ $hasil->usia ?? '-' }}</dd></div>
                    <div class="flex justify-between"><dt class="text-slate">Jenis Kelamin</dt><dd class="font-medium text-ink">{{ $hasil->jenis_kelamin ?? '-' }}</dd></div>
                    <div class="flex justify-between"><dt class="text-slate">Tanggal</dt><dd class="font-medium text-ink">{{ $hasil->tanggal->format('d/m/Y') }}</dd></div>
                </dl>
            </div>
            <div class="bg-mist/50 p-6 text-center sm:text-right">
                <div class="text-xs uppercase tracking-wide text-slate">Tingkat Gangguan Tidur</div>
                <div class="font-display text-2xl text-ink">{{ $hasil->tingkatInsomnia->nama ?? 'Tidak Terindikasi' }}</div>
                <div class="mt-1 text-xs text-slate">Nilai CF Combine: {{ $hasil->nilai_cf_combine }}</div>
                <div class="mt-1 text-2xl font-bold text-abyss">{{ number_format($hasil->persentase, 2) }}%</div>
            </div>
        </div>
        @if ($hasil->tingkatInsomnia && $hasil->tingkatInsomnia->saran)
            <div class="border-t border-line bg-moon-soft/40 p-6">
                <p class="text-sm text-ink"><span class="font-semibold">Saran:</span> {{ $hasil->tingkatInsomnia->saran }}</p>
            </div>
        @endif
    </div>

    <div class="card p-5 sm:p-6">
        <h2 class="mb-4 font-display text-lg text-ink">Rincian Perhitungan Certainty Factor</h2>
        <div class="overflow-x-auto">
            <table class="w-full min-w-[480px] text-left text-sm">
                <thead class="border-b border-line text-xs uppercase tracking-wide text-slate">
                    <tr>
                        <th class="py-2 pr-4 font-medium">#</th>
                        <th class="py-2 pr-4 font-medium">Gejala</th>
                        <th class="py-2 pr-4 font-medium">CF Pakar</th>
                        <th class="py-2 pr-4 font-medium">CF User</th>
                        <th class="py-2 font-medium">CF(H,E)</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-line">
                    @foreach ($hasil->detail->sortBy('urutan') as $d)
                        <tr>
                            <td class="py-2.5 pr-4 text-slate">{{ $d->urutan }}</td>
                            <td class="py-2.5 pr-4 text-ink">{{ $d->gejala->kode_gejala }} &mdash; {{ $d->gejala->nama_gejala }}</td>
                            <td class="py-2.5 pr-4 text-ink">{{ $d->cf_pakar }}</td>
                            <td class="py-2.5 pr-4 text-ink">{{ $d->cf_user }}</td>
                            <td class="py-2.5 font-medium text-abyss">{{ $d->cf_he }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

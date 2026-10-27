@extends('layouts.admin')

@section('title', 'Hasil Identifikasi')

@section('content')
    <p class="mb-5 text-sm text-slate">Riwayat seluruh hasil identifikasi yang telah dikerjakan pengguna.</p>

    <!-- Desktop table -->
    <div class="card hidden overflow-hidden sm:block">
        <table class="w-full text-left text-sm">
            <thead class="border-b border-line bg-mist/60 text-xs uppercase tracking-wide text-slate">
                <tr>
                    <th class="px-5 py-3 font-medium">Tanggal</th>
                    <th class="px-5 py-3 font-medium">Nama User</th>
                    <th class="px-5 py-3 font-medium">Tingkat</th>
                    <th class="px-5 py-3 font-medium">Nilai CF</th>
                    <th class="px-5 py-3 font-medium text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-line">
                @forelse ($hasil as $h)
                    <tr class="hover:bg-mist/40">
                        <td class="px-5 py-3.5 text-slate">{{ $h->tanggal->format('d/m/Y') }}</td>
                        <td class="px-5 py-3.5 font-medium text-ink">{{ $h->nama_user }}</td>
                        <td class="px-5 py-3.5">
                            @if ($h->tingkatInsomnia)
                                <span @class([
                                    'inline-flex rounded-full px-2.5 py-1 text-xs font-semibold',
                                    'bg-success/10 text-success' => $h->tingkatInsomnia->nama === 'Ringan',
                                    'bg-moon-soft text-moon-dark' => $h->tingkatInsomnia->nama === 'Sedang',
                                    'bg-danger/10 text-danger' => $h->tingkatInsomnia->nama === 'Berat',
                                ])>Insomnia {{ $h->tingkatInsomnia->nama }}</span>
                            @else
                                <span class="inline-flex rounded-full bg-mist px-2.5 py-1 text-xs font-semibold text-slate">Tidak Terindikasi</span>
                            @endif
                        </td>
                        <td class="px-5 py-3.5 font-medium text-ink">{{ number_format($h->persentase, 2) }}%</td>
                        <td class="px-5 py-3.5 text-right">
                            <div class="inline-flex gap-2">
                                <a href="{{ route('admin.hasil.show', $h) }}" class="rounded-lg border border-line p-2 text-slate hover:bg-mist"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-4 w-4"><path stroke-linecap="round" stroke-linejoin="round" d="M2.5 12S6 5 12 5s9.5 7 9.5 7-3.5 7-9.5 7-9.5-7-9.5-7Z"/><circle cx="12" cy="12" r="3"/></svg></a>
                                <form action="{{ route('admin.hasil.destroy', $h) }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
                                    @csrf @method('DELETE')
                                    <button class="rounded-lg border border-danger/20 p-2 text-danger hover:bg-danger/5"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-4 w-4"><path stroke-linecap="round" stroke-linejoin="round" d="M3 6h18M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2m3 0-1 14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2L4 6h16Z"/></svg></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-5 py-10 text-center text-slate">Belum ada hasil identifikasi.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Mobile cards -->
    <div class="space-y-3 sm:hidden">
        @forelse ($hasil as $h)
            <div class="card p-4">
                <div class="mb-2 flex items-start justify-between gap-2">
                    <div>
                        <p class="text-sm font-medium text-ink">{{ $h->nama_user }}</p>
                        <p class="text-xs text-slate">{{ $h->tanggal->format('d/m/Y') }}</p>
                    </div>
                    <span class="shrink-0 rounded-full bg-moon-soft px-2.5 py-1 text-xs font-semibold text-abyss-dark">{{ number_format($h->persentase, 1) }}%</span>
                </div>
                <p class="mb-3 text-xs text-slate">{{ $h->tingkatInsomnia ? 'Insomnia ' . $h->tingkatInsomnia->nama : 'Tidak Terindikasi' }}</p>
                <div class="flex gap-2 border-t border-line pt-3">
                    <a href="{{ route('admin.hasil.show', $h) }}" class="btn-light flex-1 !py-2 text-xs">Lihat Detail</a>
                    <form action="{{ route('admin.hasil.destroy', $h) }}" method="POST" class="flex-1" onsubmit="return confirm('Hapus data ini?')">
                        @csrf @method('DELETE')
                        <button class="btn-danger-outline w-full !py-2 text-xs">Hapus</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="card p-8 text-center text-sm text-slate">Belum ada hasil identifikasi.</div>
        @endforelse
    </div>

    <div class="mt-5">{{ $hasil->links() }}</div>
@endsection

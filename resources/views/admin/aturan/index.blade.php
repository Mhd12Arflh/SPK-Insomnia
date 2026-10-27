@extends('layouts.admin')

@section('title', 'Aturan (Rule CF)')

@section('content')
    <div class="mb-5 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <p class="max-w-lg text-sm text-slate">Rule CF menentukan bobot kepakaran tiap gejala, dipakai pada rumus CF(H,E) = CF User &times; CF Pakar.</p>
        <a href="{{ route('admin.aturan.create') }}" class="btn-primary w-full sm:w-auto sm:shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="h-4 w-4"><path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m-7-7h14"/></svg>
            Tambah Rule
        </a>
    </div>

    <!-- Desktop table -->
    <div class="card hidden overflow-hidden sm:block">
        <table class="w-full text-left text-sm">
            <thead class="border-b border-line bg-mist/60 text-xs uppercase tracking-wide text-slate">
                <tr>
                    <th class="px-5 py-3 font-medium">Kode</th>
                    <th class="px-5 py-3 font-medium">Nama Gejala</th>
                    <th class="px-5 py-3 font-medium">Nilai CF Pakar</th>
                    <th class="px-5 py-3 font-medium text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-line">
                @forelse ($aturan as $a)
                    <tr class="hover:bg-mist/40">
                        <td class="px-5 py-3.5 font-semibold text-abyss">{{ $a->gejala->kode_gejala ?? '-' }}</td>
                        <td class="px-5 py-3.5 text-ink">{{ $a->gejala->nama_gejala ?? '-' }}</td>
                        <td class="px-5 py-3.5"><span class="inline-flex rounded-full bg-moon-soft px-2.5 py-1 text-xs font-semibold text-abyss-dark">{{ $a->nilai_cf_pakar }}</span></td>
                        <td class="px-5 py-3.5 text-right">
                            <div class="inline-flex gap-2">
                                <a href="{{ route('admin.aturan.edit', $a) }}" class="rounded-lg border border-line p-2 text-slate hover:bg-mist"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-4 w-4"><path stroke-linecap="round" stroke-linejoin="round" d="M11 4H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-5m-1.5-9.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4Z"/></svg></a>
                                <form action="{{ route('admin.aturan.destroy', $a) }}" method="POST" onsubmit="return confirm('Hapus rule ini?')">
                                    @csrf @method('DELETE')
                                    <button class="rounded-lg border border-danger/20 p-2 text-danger hover:bg-danger/5"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-4 w-4"><path stroke-linecap="round" stroke-linejoin="round" d="M3 6h18M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2m3 0-1 14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2L4 6h16Z"/></svg></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="px-5 py-10 text-center text-slate">Belum ada rule.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Mobile cards -->
    <div class="space-y-3 sm:hidden">
        @forelse ($aturan as $a)
            <div class="card p-4">
                <div class="mb-2 flex items-start justify-between gap-2">
                    <div>
                        <span class="text-xs font-semibold text-abyss">{{ $a->gejala->kode_gejala ?? '-' }}</span>
                        <p class="text-sm text-ink">{{ $a->gejala->nama_gejala ?? '-' }}</p>
                    </div>
                    <span class="shrink-0 rounded-full bg-moon-soft px-2.5 py-1 text-xs font-semibold text-abyss-dark">CF {{ $a->nilai_cf_pakar }}</span>
                </div>
                <div class="flex gap-2 border-t border-line pt-3">
                    <a href="{{ route('admin.aturan.edit', $a) }}" class="btn-light flex-1 !py-2 text-xs">Edit</a>
                    <form action="{{ route('admin.aturan.destroy', $a) }}" method="POST" class="flex-1" onsubmit="return confirm('Hapus rule ini?')">
                        @csrf @method('DELETE')
                        <button class="btn-danger-outline w-full !py-2 text-xs">Hapus</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="card p-8 text-center text-sm text-slate">Belum ada rule.</div>
        @endforelse
    </div>

    <div class="mt-5">{{ $aturan->links() }}</div>
@endsection

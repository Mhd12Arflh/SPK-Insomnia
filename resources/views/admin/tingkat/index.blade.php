@extends('layouts.admin')

@section('title', 'Data Tingkat Insomnia')

@section('content')
    <div class="mb-5 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <p class="text-sm text-slate">Kelola kategori tingkat gangguan tidur beserta rentang nilai & saran.</p>
        <a href="{{ route('admin.tingkat.create') }}" class="btn-primary w-full sm:w-auto">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="h-4 w-4"><path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m-7-7h14"/></svg>
            Tambah Tingkat
        </a>
    </div>

    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
        @forelse ($tingkat as $t)
            <div class="card p-5">
                <div class="mb-3 flex items-center justify-between">
                    <span class="rounded-full bg-abyss/10 px-2.5 py-1 text-xs font-semibold text-abyss">{{ $t->kode }}</span>
                    <div class="flex gap-1.5">
                        <a href="{{ route('admin.tingkat.edit', $t) }}" class="rounded-lg border border-line p-1.5 text-slate hover:bg-mist"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-4 w-4"><path stroke-linecap="round" stroke-linejoin="round" d="M11 4H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-5m-1.5-9.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4Z"/></svg></a>
                        <form action="{{ route('admin.tingkat.destroy', $t) }}" method="POST" onsubmit="return confirm('Hapus tingkat ini?')">
                            @csrf @method('DELETE')
                            <button class="rounded-lg border border-danger/20 p-1.5 text-danger hover:bg-danger/5"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-4 w-4"><path stroke-linecap="round" stroke-linejoin="round" d="M3 6h18M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2m3 0-1 14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2L4 6h16Z"/></svg></button>
                        </form>
                    </div>
                </div>
                <h3 class="font-display text-lg text-ink">Insomnia {{ $t->nama }}</h3>
                <dl class="mt-3 space-y-1.5 text-sm">
                    <div class="flex justify-between"><dt class="text-slate">Nilai CF</dt><dd class="font-medium text-ink">{{ $t->nilai_min }} &ndash; {{ $t->nilai_max }}</dd></div>
                    <div class="flex justify-between"><dt class="text-slate">Persentase</dt><dd class="font-medium text-ink">{{ $t->persentase_min }}% &ndash; {{ $t->persentase_max }}%</dd></div>
                </dl>
                @if ($t->saran)
                    <p class="mt-3 line-clamp-3 border-t border-line pt-3 text-xs text-slate">{{ $t->saran }}</p>
                @endif
            </div>
        @empty
            <div class="card col-span-full p-10 text-center text-sm text-slate">Belum ada data tingkat insomnia.</div>
        @endforelse
    </div>

    <div class="mt-5">{{ $tingkat->links() }}</div>
@endsection

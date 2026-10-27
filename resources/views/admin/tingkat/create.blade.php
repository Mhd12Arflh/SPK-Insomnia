@extends('layouts.admin')

@section('title', 'Tambah Tingkat Insomnia')

@section('content')
    <div class="card mx-auto max-w-2xl p-6 sm:p-8">
        <h2 class="mb-5 font-display text-lg text-ink">Tambah Tingkat Insomnia</h2>
        <form method="POST" action="{{ route('admin.tingkat.store') }}" class="space-y-4">
            @csrf
            @include('admin.tingkat._form')
            <div class="flex gap-3 pt-2">
                <button class="btn-primary">Simpan</button>
                <a href="{{ route('admin.tingkat.index') }}" class="btn-light">Batal</a>
            </div>
        </form>
    </div>
@endsection

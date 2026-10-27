@extends('layouts.admin')

@section('title', 'Edit Tingkat Insomnia')

@section('content')
    <div class="card mx-auto max-w-2xl p-6 sm:p-8">
        <h2 class="mb-5 font-display text-lg text-ink">Edit Tingkat Insomnia</h2>
        <form method="POST" action="{{ route('admin.tingkat.update', $tingkat) }}" class="space-y-4">
            @csrf
            @method('PUT')
            @include('admin.tingkat._form')
            <div class="flex gap-3 pt-2">
                <button class="btn-primary">Simpan Perubahan</button>
                <a href="{{ route('admin.tingkat.index') }}" class="btn-light">Batal</a>
            </div>
        </form>
    </div>
@endsection

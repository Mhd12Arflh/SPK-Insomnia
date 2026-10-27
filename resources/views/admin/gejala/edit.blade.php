@extends('layouts.admin')

@section('title', 'Edit Gejala')

@section('content')
    <div class="card mx-auto max-w-xl p-6 sm:p-8">
        <h2 class="mb-5 font-display text-lg text-ink">Edit Gejala</h2>
        <form method="POST" action="{{ route('admin.gejala.update', $gejala) }}" class="space-y-4">
            @csrf
            @method('PUT')
            @include('admin.gejala._form')
            <div class="flex gap-3 pt-2">
                <button class="btn-primary">Simpan Perubahan</button>
                <a href="{{ route('admin.gejala.index') }}" class="btn-light">Batal</a>
            </div>
        </form>
    </div>
@endsection

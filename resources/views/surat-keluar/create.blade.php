@extends('layouts.app')
@section('title', 'Tambah Surat Keluar')
@section('content')
<h1 class="mb-6 text-2xl font-bold tracking-tight text-slate-900">Tambah Surat Keluar</h1>
<form action="{{ route('surat-keluar.store') }}" method="POST"
      class="max-w-2xl space-y-5 rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
    @csrf
    <p class="text-sm font-medium text-slate-700">Nomor Surat:<br>
        <input name="nomor_surat" value="{{ old('nomor_surat') }}" class="mt-1 block w-full rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
        @error('nomor_surat') <span class="mt-1 block text-sm font-normal text-red-600">{{ $message }}</span> @enderror
    </p>
    <p class="text-sm font-medium text-slate-700">Tanggal:<br>
        <input type="date" name="tanggal" value="{{ old('tanggal') }}" class="mt-1 block w-full rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
        @error('tanggal') <span class="mt-1 block text-sm font-normal text-red-600">{{ $message }}</span> @enderror
    </p>
    <p class="text-sm font-medium text-slate-700">Tujuan:<br>
        <input name="tujuan" value="{{ old('tujuan') }}" class="mt-1 block w-full rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
        @error('tujuan') <span class="mt-1 block text-sm font-normal text-red-600">{{ $message }}</span> @enderror
    </p>
    <p class="text-sm font-medium text-slate-700">Perihal:<br>
        <input name="perihal" value="{{ old('perihal') }}" class="mt-1 block w-full rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
        @error('perihal') <span class="mt-1 block text-sm font-normal text-red-600">{{ $message }}</span> @enderror
    </p>
    <p class="text-sm font-medium text-slate-700">Keterangan:<br>
        <textarea name="keterangan" class="mt-1 block h-28 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">{{ old('keterangan') }}</textarea>
        @error('keterangan') <span class="mt-1 block text-sm font-normal text-red-600">{{ $message }}</span> @enderror
    </p>
    <div class="flex items-center gap-3 pt-2">
        <button type="submit"
                class="cursor-pointer rounded-lg bg-indigo-600 px-5 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-500">Simpan</button>
        <a href="{{ route('surat-keluar.index') }}"
           class="rounded-lg border border-slate-300 bg-white px-5 py-2 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">Batal</a>
    </div>
</form>
@endsection

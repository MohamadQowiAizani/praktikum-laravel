@extends('layouts.app')
@section('title', 'Edit Surat Masuk')
@section('content')
<h1 class="mb-6 text-2xl font-bold tracking-tight text-slate-900">Edit Surat Masuk</h1>
<form action="{{ route('surat-masuk.update', $surat->id) }}" method="POST"
      class="max-w-2xl space-y-5 rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
    @csrf
    @method('PUT')
    <p class="text-sm font-medium text-slate-700">Nomor Surat:<br>
        <input name="nomor_surat" value="{{ old('nomor_surat', $surat->nomor_surat) }}" class="mt-1 block w-full rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
        @error('nomor_surat') <span class="mt-1 block text-sm font-normal text-red-600">{{ $message }}</span> @enderror
    </p>
    <p class="text-sm font-medium text-slate-700">Tanggal:<br>
        <input type="date" name="tanggal" value="{{ old('tanggal', $surat->tanggal) }}" class="mt-1 block w-full rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
        @error('tanggal') <span class="mt-1 block text-sm font-normal text-red-600">{{ $message }}</span> @enderror
    </p>
    <p class="text-sm font-medium text-slate-700">Pengirim:<br>
        <input name="pengirim" value="{{ old('pengirim', $surat->pengirim) }}" class="mt-1 block w-full rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
        @error('pengirim') <span class="mt-1 block text-sm font-normal text-red-600">{{ $message }}</span> @enderror
    </p>
    <p class="text-sm font-medium text-slate-700">Perihal:<br>
        <input name="perihal" value="{{ old('perihal', $surat->perihal) }}" class="mt-1 block w-full rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
        @error('perihal') <span class="mt-1 block text-sm font-normal text-red-600">{{ $message }}</span> @enderror
    </p>
    <p class="text-sm font-medium text-slate-700">Keterangan:<br>
        <textarea name="keterangan" class="mt-1 block h-28 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">{{ old('keterangan', $surat->keterangan) }}</textarea>
        @error('keterangan') <span class="mt-1 block text-sm font-normal text-red-600">{{ $message }}</span> @enderror
    </p>
    <div class="flex items-center gap-3 pt-2">
        <button type="submit"
                class="cursor-pointer rounded-lg bg-indigo-600 px-5 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-500">Simpan Perubahan</button>
        <a href="{{ route('surat-masuk.index') }}"
           class="rounded-lg border border-slate-300 bg-white px-5 py-2 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">Batal</a>
    </div>
</form>
@endsection

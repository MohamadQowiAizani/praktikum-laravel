@extends('layouts.app')
@section('title', 'Edit Surat Keluar')
@section('content')
<h1 class="mb-6 text-2xl font-bold tracking-tight text-slate-900">Edit Surat Keluar</h1>
<form action="{{ route('surat-keluar.update', $surat->id) }}" method="POST" enctype="multipart/form-data"
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
    <p class="text-sm font-medium text-slate-700">Tujuan:<br>
        <input name="tujuan" value="{{ old('tujuan', $surat->tujuan) }}" class="mt-1 block w-full rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
        @error('tujuan') <span class="mt-1 block text-sm font-normal text-red-600">{{ $message }}</span> @enderror
    </p>
    <p class="text-sm font-medium text-slate-700">Perihal:<br>
        <input name="perihal" value="{{ old('perihal', $surat->perihal) }}" class="mt-1 block w-full rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
        @error('perihal') <span class="mt-1 block text-sm font-normal text-red-600">{{ $message }}</span> @enderror
    </p>
    <p class="text-sm font-medium text-slate-700">Keterangan:<br>
        <textarea name="keterangan" class="mt-1 block h-28 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">{{ old('keterangan', $surat->keterangan) }}</textarea>
        @error('keterangan') <span class="mt-1 block text-sm font-normal text-red-600">{{ $message }}</span> @enderror
    </p>
    <p class="text-sm font-medium text-slate-700">Kategori:<br>
        <select name="category_id" class="mt-1 block w-full rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
            <option value="">-- Tanpa kategori --</option>
            @foreach ($categories as $kategori)
                <option value="{{ $kategori->id }}"
                    @selected(old('category_id', $surat->category_id) == $kategori->id)>
                    {{ $kategori->nama }}
                </option>
            @endforeach
        </select>
        @error('category_id') <span class="mt-1 block text-sm font-normal text-red-600">{{ $message }}</span> @enderror
    </p>
    <p class="text-sm font-medium text-slate-700">Lampiran (PDF/JPG/PNG, maks. 2 MB):<br>
        <input type="file" name="lampiran" accept=".pdf,.jpg,.jpeg,.png" class="mt-1 block w-full text-sm text-slate-700 file:mr-3 file:rounded-lg file:border-0 file:bg-indigo-50 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-indigo-700 hover:file:bg-indigo-100">
        @if ($surat->lampiran)
            <span class="mt-1 block text-xs font-normal text-slate-500">Lampiran saat ini:
                <a href="{{ asset('storage/' . $surat->lampiran) }}" target="_blank" rel="noopener" class="font-semibold text-indigo-600 hover:text-indigo-500">Lihat lampiran</a>
                (kosongkan jika tidak ingin mengganti)
            </span>
        @endif
        @error('lampiran') <span class="mt-1 block text-sm font-normal text-red-600">{{ $message }}</span> @enderror
    </p>
    <div class="flex items-center gap-3 pt-2">
        <button type="submit"
                class="cursor-pointer rounded-lg bg-indigo-600 px-5 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-500">Simpan Perubahan</button>
        <a href="{{ route('surat-keluar.index') }}"
           class="rounded-lg border border-slate-300 bg-white px-5 py-2 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">Batal</a>
    </div>
</form>
@endsection

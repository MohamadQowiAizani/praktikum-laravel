@extends('layouts.app')
@section('title', 'Daftar Surat Masuk')
@section('content')
<h1 class="mb-6 text-2xl font-bold tracking-tight text-slate-900">Daftar Surat Masuk</h1>
@can('manage-letters')
    <a href="{{ route('surat-masuk.create') }}"
       class="mb-5 inline-block rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-500">+ Tambah Surat</a>
@endcan
<form method="GET" action="{{ route('surat-masuk.index') }}"
      class="mb-5 flex flex-wrap items-center gap-2 rounded-xl border border-slate-200 bg-white p-3 shadow-sm">
    <input type="text" name="q" value="{{ request('q') }}"
           placeholder="Nomor, pengirim, atau perihal"
           class="min-w-56 flex-1 rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
    <select name="category_id"
            class="rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
        <option value="">Semua kategori</option>
        @foreach ($categories as $kategori)
            <option value="{{ $kategori->id }}" @selected(request('category_id') == $kategori->id)>{{ $kategori->nama }}</option>
        @endforeach
    </select>
    <button type="submit"
            class="cursor-pointer rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-500">Cari / Filter</button>
    <a href="{{ route('surat-masuk.index') }}"
       class="rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">Reset</a>
</form>
@if (session('success'))
    <p class="mb-5 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm font-medium text-green-700">{{ session('success') }}</p>
@endif
<div class="overflow-x-auto rounded-xl border border-slate-200 bg-white shadow-sm">
<table class="w-full text-left text-sm">
    <thead class="bg-slate-100 text-xs uppercase tracking-wide text-slate-600">
        <tr>
            <th class="px-4 py-3 font-semibold">No</th>
            <th class="px-4 py-3 font-semibold">Nomor</th>
            <th class="px-4 py-3 font-semibold">Tanggal</th>
            <th class="px-4 py-3 font-semibold">Pengirim</th>
            <th class="px-4 py-3 font-semibold">Perihal</th>
            <th class="px-4 py-3 font-semibold">Kategori</th>
            <th class="px-4 py-3 font-semibold">Aksi</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-slate-100">
        @forelse ($suratMasuk as $surat)
            <tr class="transition hover:bg-slate-50">
                <td class="px-4 py-3 text-slate-500">{{ $suratMasuk->firstItem() + $loop->index }}</td>
                <td class="px-4 py-3 font-medium text-slate-900">{{ $surat->nomor_surat }}</td>
                <td class="whitespace-nowrap px-4 py-3">{{ $surat->tanggal }}</td>
                <td class="px-4 py-3">{{ $surat->pengirim }}</td>
                <td class="px-4 py-3">{{ $surat->perihal }}</td>
                <td class="px-4 py-3">{{ $surat->category?->nama ?? 'Tanpa kategori' }}</td>
                <td class="px-4 py-3">
                    <div class="flex items-center gap-2">
                    <a href="{{ route('surat-masuk.show', $surat->id) }}"
                       class="rounded-md bg-sky-50 px-2.5 py-1 text-xs font-semibold text-sky-700 transition hover:bg-sky-100">Detail</a>
                    @can('manage-letters')
                        <a href="{{ route('surat-masuk.edit', $surat->id) }}"
                           class="rounded-md bg-amber-50 px-2.5 py-1 text-xs font-semibold text-amber-700 transition hover:bg-amber-100">Edit</a>
                        <form action="{{ route('surat-masuk.destroy', $surat->id) }}"
                              method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="cursor-pointer rounded-md bg-red-50 px-2.5 py-1 text-xs font-semibold text-red-700 transition hover:bg-red-100"
                                    onclick="return confirm('Hapus surat ini?')">Hapus</button>
                        </form>
                    @endcan
                    </div>
                </td>
            </tr>
        @empty
            <tr><td colspan="7" class="px-4 py-10 text-center text-slate-500">Belum ada surat masuk.</td></tr>
        @endforelse
    </tbody>
</table>
</div>
<div class="mt-5">{{ $suratMasuk->links() }}</div>
@endsection

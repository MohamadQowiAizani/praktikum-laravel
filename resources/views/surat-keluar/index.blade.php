@extends('layouts.app')
@section('title', 'Daftar Surat Keluar')
@section('content')
<h1 class="mb-6 text-2xl font-bold tracking-tight text-slate-900">Daftar Surat Keluar</h1>
@can('manage-letters')
    <a href="{{ route('surat-keluar.create') }}"
       class="mb-5 inline-block rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-500">+ Tambah Surat</a>
@endcan
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
            <th class="px-4 py-3 font-semibold">Tujuan</th>
            <th class="px-4 py-3 font-semibold">Perihal</th>
            <th class="px-4 py-3 font-semibold">Aksi</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-slate-100">
        @forelse ($suratKeluar as $surat)
            <tr class="transition hover:bg-slate-50">
                <td class="px-4 py-3 text-slate-500">{{ $loop->iteration }}</td>
                <td class="px-4 py-3 font-medium text-slate-900">{{ $surat->nomor_surat }}</td>
                <td class="whitespace-nowrap px-4 py-3">{{ $surat->tanggal }}</td>
                <td class="px-4 py-3">{{ $surat->tujuan }}</td>
                <td class="px-4 py-3">{{ $surat->perihal }}</td>
                <td class="px-4 py-3">
                    <div class="flex items-center gap-2">
                    <a href="{{ route('surat-keluar.show', $surat->id) }}"
                       class="rounded-md bg-sky-50 px-2.5 py-1 text-xs font-semibold text-sky-700 transition hover:bg-sky-100">Detail</a>
                    @can('manage-letters')
                        <a href="{{ route('surat-keluar.edit', $surat->id) }}"
                           class="rounded-md bg-amber-50 px-2.5 py-1 text-xs font-semibold text-amber-700 transition hover:bg-amber-100">Edit</a>
                        <form action="{{ route('surat-keluar.destroy', $surat->id) }}"
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
            <tr><td colspan="6" class="px-4 py-10 text-center text-slate-500">Belum ada surat keluar.</td></tr>
        @endforelse
    </tbody>
</table>
</div>
@endsection

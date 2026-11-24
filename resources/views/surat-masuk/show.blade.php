@extends('layouts.app')
@section('title', 'Detail Surat Masuk')
@section('content')
<h1 class="mb-6 text-2xl font-bold tracking-tight text-slate-900">Detail Surat Masuk</h1>
<div class="max-w-2xl divide-y divide-slate-100 rounded-xl border border-slate-200 bg-white px-6 py-2 shadow-sm">
<p class="py-3 text-slate-700"><strong class="block text-xs font-semibold uppercase tracking-wide text-slate-500">Nomor:</strong> {{ $surat->nomor_surat }}</p>
<p class="py-3 text-slate-700"><strong class="block text-xs font-semibold uppercase tracking-wide text-slate-500">Tanggal:</strong> {{ $surat->tanggal }}</p>
<p class="py-3 text-slate-700"><strong class="block text-xs font-semibold uppercase tracking-wide text-slate-500">Pengirim:</strong> {{ $surat->pengirim }}</p>
<p class="py-3 text-slate-700"><strong class="block text-xs font-semibold uppercase tracking-wide text-slate-500">Perihal:</strong> {{ $surat->perihal }}</p>
<p class="py-3 text-slate-700"><strong class="block text-xs font-semibold uppercase tracking-wide text-slate-500">Keterangan:</strong> {{ $surat->keterangan ?? '-' }}</p>
<p class="py-3 text-slate-700"><strong class="block text-xs font-semibold uppercase tracking-wide text-slate-500">Kategori:</strong> {{ $surat->category?->nama ?? 'Tanpa kategori' }}</p>
@if ($surat->lampiran)
<p class="py-3 text-slate-700"><strong class="block text-xs font-semibold uppercase tracking-wide text-slate-500">Lampiran:</strong>
    <a href="{{ asset('storage/' . $surat->lampiran) }}" target="_blank" rel="noopener" class="font-semibold text-indigo-600 transition hover:text-indigo-500">Lihat lampiran</a>
</p>
@endif
</div>
<a href="{{ route('surat-masuk.index') }}"
   class="mt-5 inline-block text-sm font-semibold text-indigo-600 transition hover:text-indigo-500">Kembali ke daftar</a>
@endsection

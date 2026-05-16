@extends('layouts.app')
@section('title', 'Karir')
@section('meta_description', 'Bergabunglah bersama tim PT Kontragtor Indonesia Tbk. Temukan peluang karir di industri alat berat konstruksi.')

@section('content')

<section class="bg-yellow-500 py-16 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background: repeating-linear-gradient(-45deg,#000 0,#000 1px,transparent 0,transparent 16px);"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-black/50 text-sm font-bold uppercase tracking-widest mb-4">Bergabung Bersama Kami</div>
        <h1 class="font-display text-5xl font-black text-black uppercase">Lowongan <span class="text-white">Kerja</span></h1>
        <p class="text-black/70 mt-4 max-w-2xl">Bangun karir Anda bersama kami dan jadilah bagian dari tim yang membangun infrastruktur Indonesia.</p>
    </div>
</section>

<section class="py-12 bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Search & filter --}}
                <form method="GET" action="{{ route('careers.index') }}" class="mb-10">
            <div class="bg-gray-50 border border-gray-200 rounded-2xl p-5 flex flex-wrap gap-3 items-end shadow-sm">
                <div class="flex-1 min-w-[200px]">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Cari Posisi</label>
                    <div class="relative">
                        <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Nama posisi atau departemen..."
                            class="w-full bg-white border border-gray-200 rounded-xl pl-10 pr-4 py-3 text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition-all">
                    </div>
                </div>
                <div class="min-w-[160px]">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Tipe</label>
                    <div class="relative">
                        <select name="type" class="w-full appearance-none bg-white border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition-all pr-10 cursor-pointer">
                            <option value="">Semua Tipe</option>
                            <option value="full-time"  {{ request('type') === 'full-time'  ? 'selected' : '' }}>Full Time</option>
                            <option value="part-time"  {{ request('type') === 'part-time'  ? 'selected' : '' }}>Part Time</option>
                            <option value="contract"   {{ request('type') === 'contract'   ? 'selected' : '' }}>Contract</option>
                            <option value="internship" {{ request('type') === 'internship' ? 'selected' : '' }}>Internship</option>
                        </select>
                        <svg class="absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </div>
                </div>
                <div class="min-w-[190px]">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Departemen</label>
                    <div class="relative">
                        <select name="department" class="w-full appearance-none bg-white border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition-all pr-10 cursor-pointer">
                            <option value="">Semua Departemen</option>
                            @foreach($departments as $dept)
                            <option value="{{ $dept }}" {{ request('department') === $dept ? 'selected' : '' }}>{{ $dept }}</option>
                            @endforeach
                        </select>
                        <svg class="absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </div>
                </div>
                <div class="flex gap-2">
                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold px-5 py-3 rounded-xl text-sm transition-all flex items-center gap-2 shadow-sm hover:shadow-yellow-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        Cari
                    </button>
                    @if(request()->hasAny(['search','type','department']))
                    <a href="{{ route('careers.index') }}" class="bg-white border border-gray-200 hover:border-gray-300 hover:bg-gray-50 text-gray-600 font-semibold px-5 py-3 rounded-xl text-sm transition-all flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        Reset
                    </a>
                    @endif
                </div>
            </div>
        </form>

        @if(count($careers))
        <p class="text-sm text-gray-500 mb-6">Menampilkan <strong class="text-gray-800">{{ count($careers) }}</strong> lowongan</p>

        <div class="space-y-4">
            @foreach($careers as $career)
            <div class="group border border-gray-100 rounded-2xl p-6 hover:border-yellow-400 hover:shadow-xl transition-all duration-300 bg-white relative overflow-hidden">
                {{-- Yellow left accent on hover --}}
                <div class="absolute left-0 top-0 w-1 h-full bg-yellow-500 rounded-l-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-4 pl-2">
                    <div class="flex-1">
                        {{-- Badges --}}
                        <div class="flex flex-wrap items-center gap-2 mb-3">
                            <span class="bg-yellow-100 text-yellow-700 text-xs font-black px-3 py-1 rounded-full uppercase tracking-wide">{{ $career->type_label }}</span>
                            <span class="bg-gray-100 text-gray-600 text-xs font-semibold px-3 py-1 rounded-full">{{ $career->department }}</span>
                        </div>

                        <h2 class="font-display font-black text-gray-900 text-2xl uppercase group-hover:text-yellow-600 transition-colors leading-tight mb-3">{{ $career->title }}</h2>

                        <div class="flex flex-wrap items-center gap-4 text-sm text-gray-500">
                            <span class="flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                {{ $career->location }}
                            </span>
                            @if($career->salary_range)
                            <span class="flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                {{ $career->salary_range }}
                            </span>
                            @endif
                            @if($career->deadline)
                            <span class="flex items-center gap-1.5 {{ $career->deadline->isPast() ? 'text-red-500' : 'text-gray-500' }}">
                                <svg class="w-4 h-4 {{ $career->deadline->isPast() ? 'text-red-400' : 'text-yellow-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                Deadline: {{ $career->deadline->format('d M Y') }}
                            </span>
                            @endif
                        </div>
                    </div>

                    {{-- CTA Button --}}
                    <a href="{{ route('careers.show', $career->id) }}"
                        class="group/btn relative inline-flex items-center gap-2 bg-gray-950 hover:bg-yellow-500 text-white hover:text-black font-black px-6 py-3 rounded-xl text-sm transition-all duration-200 shadow-sm hover:shadow-yellow-400/30 hover:-translate-y-0.5 shrink-0 self-start sm:self-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        Lihat Detail
                        <svg class="w-4 h-4 group-hover/btn:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        @else
        <div class="text-center py-24">
            <svg class="w-16 h-16 mx-auto text-gray-200 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            <h3 class="font-display text-xl font-bold text-gray-400 uppercase">Tidak Ada Lowongan</h3>
            <p class="text-gray-400 text-sm mt-2">Tidak ditemukan lowongan dengan kriteria tersebut.</p>
            <a href="{{ route('careers.index') }}" class="inline-block mt-4 btn-primary text-sm">Lihat Semua</a>
        </div>
        @endif

        {{-- CTA Kirim Lamaran Umum --}}
        <div class="mt-14 bg-gray-950 rounded-2xl p-8 text-center relative overflow-hidden">
            <div class="absolute inset-0 opacity-5" style="background-image:repeating-linear-gradient(45deg,#F59E0B 0,#F59E0B 1px,transparent 0,transparent 50%);background-size:20px 20px;"></div>
            <div class="relative z-10">
                <div class="w-14 h-14 bg-yellow-500 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg shadow-yellow-500/30">
                    <svg class="w-7 h-7 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <h3 class="font-display text-2xl font-black text-white uppercase mb-2">Tidak Ada yang Cocok?</h3>
                <p class="text-gray-400 text-sm mb-5">Kirim CV Anda dan kami akan simpan untuk peluang di masa depan.</p>
                <a href="{{ route('contact') }}?subject=Lamaran+Umum" class="btn-primary">Kirim Lamaran Umum</a>
            </div>
        </div>
    </div>
</section>
@endsection

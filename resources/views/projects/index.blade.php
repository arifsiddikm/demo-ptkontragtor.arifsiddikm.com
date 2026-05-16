@extends('layouts.app')
@section('title', 'Portofolio & Pengalaman Proyek')
@section('meta_description', 'Kumpulan proyek konstruksi dan infrastruktur yang telah diselesaikan PT Kontragtor Indonesia Tbk. dengan armada alat berat profesional.')

@section('content')

{{-- Page Header --}}
<section class="bg-gray-950 py-20 relative overflow-hidden">
    <div class="absolute inset-0 opacity-5" style="background-image: repeating-linear-gradient(45deg, #F59E0B 0, #F59E0B 1px, transparent 0, transparent 50%); background-size: 20px 20px;"></div>
    <div class="absolute right-0 top-0 w-1/2 h-full overflow-hidden opacity-10 pointer-events-none">
        <div style="position:absolute;inset:0;background:repeating-linear-gradient(-45deg,transparent,transparent 18px,rgba(245,158,11,.4) 18px,rgba(245,158,11,.4) 20px);"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-yellow-500 text-sm font-bold uppercase tracking-widest mb-4">Track Record Kami</div>
        <h1 class="font-display text-5xl sm:text-6xl font-black text-white uppercase leading-tight">
            Portofolio <span class="text-yellow-500">&amp;</span><br>Pengalaman Proyek
        </h1>
        <p class="text-gray-400 mt-5 max-w-xl">Lebih dari 500 proyek konstruksi, pertambangan, dan infrastruktur nasional telah kami dukung sejak 2005.</p>

        {{-- Stats bar --}}
        <div class="flex flex-wrap gap-8 mt-10">
            @foreach([['500+','Proyek Selesai'],['34','Provinsi'],['19+','Tahun Pengalaman'],['200+','Unit Dikerahkan']] as [$num,$label])
            <div>
                <div class="font-display text-3xl font-black text-yellow-500">{{ $num }}</div>
                <div class="text-gray-500 text-xs font-semibold uppercase tracking-wide">{{ $label }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Search & Filter --}}
<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <form method="GET" action="{{ route('projects.index') }}" class="mb-10">
            <div class="bg-gray-50 border border-gray-200 rounded-2xl p-5 flex flex-wrap gap-3 items-end shadow-sm">
                {{-- Search --}}
                <div class="flex-1 min-w-[220px]">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Cari Proyek</label>
                    <div class="relative">
                        <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Nama proyek, klien, atau lokasi…"
                            class="w-full bg-white border border-gray-200 rounded-xl pl-10 pr-4 py-3 text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition-all">
                    </div>
                </div>

                {{-- Category --}}
                <div class="min-w-[200px]">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Kategori</label>
                    <div class="relative">
                        <select name="category" class="w-full appearance-none bg-white border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition-all pr-10 cursor-pointer">
                            <option value="">Semua Kategori</option>
                            @foreach($categories as $cat)
                            <option value="{{ $cat }}" {{ request('category') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
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
                    @if(request()->hasAny(['search','category']))
                    <a href="{{ route('projects.index') }}" class="bg-white border border-gray-200 hover:border-gray-300 hover:bg-gray-50 text-gray-600 font-semibold px-5 py-3 rounded-xl text-sm transition-all flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        Reset
                    </a>
                    @endif
                </div>
            </div>
        </form>

        @if($projects->total())
        <div class="text-sm text-gray-500 mb-6">Menampilkan <strong class="text-gray-800">{{ $projects->total() }}</strong> proyek{{ request('search') ? ' untuk "'.request('search').'"' : '' }}</div>
        @endif

        @if($projects->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7">
            @foreach($projects as $project)
            <a href="{{ route('projects.show', $project->slug) }}" class="group bg-white border border-gray-100 rounded-2xl overflow-hidden hover:border-yellow-400 hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 flex flex-col">
                <div class="aspect-video overflow-hidden bg-gray-100 relative">
                    <img src="{{ $project->image_url }}" alt="{{ $project->title }}"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        onerror="this.src='https://placehold.co/600x400/fef3c7/d97706?text=Proyek'">
                    @if($project->category)
                    <div class="absolute top-3 left-3">
                        <span class="bg-yellow-500 text-black text-xs font-black px-3 py-1 rounded-full uppercase tracking-wide">{{ $project->category }}</span>
                    </div>
                    @endif
                </div>
                <div class="p-5 flex flex-col flex-1">
                    @if($project->project_date)
                    <div class="text-gray-400 text-xs mb-2 flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        {{ $project->project_date->format('M Y') }}
                    </div>
                    @endif
                    <h2 class="font-display font-bold text-gray-900 text-xl uppercase leading-snug group-hover:text-yellow-600 transition-colors mb-2 line-clamp-2">{{ $project->title }}</h2>
                    @if($project->client)
                    <div class="text-xs text-gray-500 mb-2 flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5 text-yellow-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        {{ $project->client }}
                    </div>
                    @endif
                    @if($project->location)
                    <div class="text-xs text-gray-500 mb-3 flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5 text-yellow-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        {{ $project->location }}
                    </div>
                    @endif
                    <p class="text-gray-500 text-sm line-clamp-2 mb-4 flex-1">{{ $project->excerpt_short }}</p>
                    <div class="flex items-center gap-1 text-yellow-600 font-bold text-sm mt-auto">
                        Lihat Detail
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        <div class="mt-12">{{ $projects->withQueryString()->links() }}</div>

        @else
        <div class="text-center py-24">
            <svg class="w-16 h-16 mx-auto text-gray-200 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
            <h3 class="font-display text-xl font-bold text-gray-400 uppercase">Tidak Ada Proyek Ditemukan</h3>
            <a href="{{ route('projects.index') }}" class="inline-block mt-4 btn-primary text-sm">Lihat Semua</a>
        </div>
        @endif
    </div>
</section>

{{-- CTA --}}
<section class="py-20 bg-yellow-500 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background:repeating-linear-gradient(-45deg,#000 0,#000 1px,transparent 0,transparent 16px);"></div>
    <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
        <h2 class="font-display text-4xl font-black text-black uppercase mb-4">Ingin Proyek Anda<br>Jadi Bagian Dari Ini?</h2>
        <p class="text-black/70 mb-8">Konsultasikan kebutuhan alat berat proyek Anda bersama tim kami sekarang.</p>
        <a href="{{ route('contact') }}" class="bg-black hover:bg-gray-900 text-yellow-400 font-black px-10 py-4 rounded-xl text-base transition-all inline-flex items-center gap-3 shadow-xl">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            Konsultasi Sekarang
        </a>
    </div>
</section>

@endsection

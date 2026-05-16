@extends('layouts.app')
@section('title', 'Berita & Artikel')
@section('meta_description', 'Berita terbaru, tips, dan wawasan industri alat berat dari PT Kontragtor Indonesia Tbk.')

@section('content')

<section class="bg-yellow-500 py-16 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background: repeating-linear-gradient(-45deg,#000 0,#000 1px,transparent 0,transparent 16px);"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-black/50 text-sm font-bold uppercase tracking-widest mb-4">Informasi & Wawasan</div>
        <h1 class="font-display text-5xl font-black text-black uppercase">Berita & <span class="text-white">Artikel</span></h1>
    </div>
</section>

<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Search --}}
                <form method="GET" action="{{ route('articles.index') }}" class="mb-10">
            <div class="bg-gray-50 border border-gray-200 rounded-2xl p-5 flex flex-wrap gap-3 items-end shadow-sm">
                <div class="flex-1 min-w-[220px]">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Cari Artikel</label>
                    <div class="relative">
                        <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Judul atau kata kunci..."
                            class="w-full bg-white border border-gray-200 rounded-xl pl-10 pr-4 py-3 text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition-all">
                    </div>
                </div>
                <div class="flex gap-2">
                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold px-5 py-3 rounded-xl text-sm transition-all flex items-center gap-2 shadow-sm hover:shadow-yellow-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        Cari
                    </button>
                    @if(request('search'))
                    <a href="{{ route('articles.index') }}" class="bg-white border border-gray-200 hover:border-gray-300 hover:bg-gray-50 text-gray-600 font-semibold px-5 py-3 rounded-xl text-sm transition-all flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        Reset
                    </a>
                    @endif
                </div>
            </div>
        </form>

        @if($articles->total())
        <div class="text-sm text-gray-500 mb-6">Menampilkan <strong class="text-gray-800">{{ $articles->total() }}</strong> artikel{{ request('search') ? ' untuk "'.request('search').'"' : '' }}</div>
        @endif

        @if($articles->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($articles as $article)
            <a href="{{ route('articles.show', $article->slug) }}" class="group bg-white rounded-2xl overflow-hidden border border-gray-100 hover:border-yellow-400 hover:shadow-xl transition-all duration-300 hover:-translate-y-1 flex flex-col">
                <div class="aspect-video bg-gray-100 overflow-hidden">
                    <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" onerror="this.src='https://placehold.co/600x400/fef3c7/d97706?text=Artikel'">
                </div>
                <div class="p-5 flex flex-col flex-1">
                    <div class="flex items-center gap-3 text-xs text-gray-400 mb-3">
                        <span>{{ $article->published_at?->format('d M Y') }}</span>
                    </div>
                    <h2 class="font-display font-bold text-gray-900 text-xl uppercase leading-snug group-hover:text-yellow-600 transition-colors mb-3 line-clamp-2 flex-1">{{ $article->title }}</h2>
                    <p class="text-gray-500 text-sm leading-relaxed line-clamp-3 mb-4">{{ $article->excerpt_short }}</p>
                    <div class="flex items-center gap-1.5 text-yellow-600 font-bold text-sm mt-auto">
                        Baca Selengkapnya
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        <div class="mt-12">{{ $articles->withQueryString()->links() }}</div>
        @else
        <div class="text-center py-24">
            <svg class="w-16 h-16 mx-auto text-gray-200 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
            <p class="text-gray-400">Tidak ada artikel ditemukan.</p>
            <a href="{{ route('articles.index') }}" class="inline-block mt-4 btn-primary text-sm">Lihat Semua</a>
        </div>
        @endif
    </div>
</section>
@endsection

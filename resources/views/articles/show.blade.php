@extends('layouts.app')

@section('title', $article->title)
@section('meta_description', $article->excerpt_short)
@section('og_image', $article->image_url)

@section('content')

<article>
    {{-- Header --}}
    <section class="bg-gray-950 py-16 relative overflow-hidden">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <nav class="text-sm text-gray-500 mb-6 flex items-center gap-2">
                <a href="{{ route('home') }}" class="hover:text-yellow-400">Beranda</a>
                <span>/</span>
                <a href="{{ route('articles.index') }}" class="hover:text-yellow-400">Artikel</a>
                <span>/</span>
                <span class="text-gray-400 line-clamp-1">{{ $article->title }}</span>
            </nav>
            <div class="flex items-center gap-3 text-xs text-gray-500 mb-5">
                <span class="bg-yellow-500/20 text-yellow-400 px-2 py-1 rounded font-medium">Artikel</span>
                <span>{{ $article->published_at?->format('d M Y') }}</span>
                <span>&bull;</span>
                <span>{{ $article->author }}</span>
            </div>
            <h1 class="font-display text-4xl sm:text-5xl font-bold text-white uppercase leading-tight">{{ $article->title }}</h1>
        </div>
    </section>

    {{-- Content --}}
    <section class="py-14 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-12">
                <div class="lg:col-span-2">
                    @if($article->image)
                    <div class="aspect-video bg-gray-100 rounded-2xl overflow-hidden mb-10 shadow-lg">
                        <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
                    </div>
                    @endif

                    <div class="prose prose-lg max-w-none prose-headings:font-display prose-headings:uppercase prose-a:text-yellow-600 prose-strong:text-gray-900">
                        {!! $article->content !!}
                    </div>

                    <div class="mt-10 pt-8 border-t border-gray-100 flex items-center justify-between flex-wrap gap-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-yellow-500 rounded-full flex items-center justify-center text-black font-bold text-sm">
                                {{ strtoupper(substr($article->author, 0, 1)) }}
                            </div>
                            <div>
                                <div class="font-semibold text-gray-900 text-sm">{{ $article->author }}</div>
                                <div class="text-gray-400 text-xs">{{ $article->published_at?->format('d MMMM Y') }}</div>
                            </div>
                        </div>
                        <a href="{{ route('articles.index') }}" class="text-yellow-600 text-sm font-semibold hover:text-yellow-700 flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                            Kembali ke Daftar
                        </a>
                    </div>
                </div>

                {{-- Sidebar: Related --}}
                <div>
                    <h3 class="font-display font-bold text-gray-900 text-lg uppercase mb-5">Artikel Lainnya</h3>
                    @if($related->count())
                    <div class="space-y-5">
                        @foreach($related as $rel)
                        <a href="{{ route('articles.show', $rel->slug) }}" class="group flex gap-4">
                            <div class="w-20 h-14 bg-gray-100 rounded-lg overflow-hidden shrink-0">
                                <img src="{{ $rel->image_url }}" alt="{{ $rel->title }}" class="w-full h-full object-cover" onerror="this.src='https://placehold.co/80x56/f3f4f6/9ca3af?text=Artikel'">
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800 text-sm leading-snug group-hover:text-yellow-600 transition-colors line-clamp-2">{{ $rel->title }}</h4>
                                <div class="text-gray-400 text-xs mt-1">{{ $rel->published_at?->format('d M Y') }}</div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    @else
                    <p class="text-gray-400 text-sm">Tidak ada artikel lainnya.</p>
                    @endif

                    <div class="mt-8 bg-gray-950 rounded-xl p-5">
                        <h4 class="font-display font-bold text-yellow-400 uppercase text-sm mb-3">Butuh Alat Berat?</h4>
                        <p class="text-gray-400 text-sm mb-4">Konsultasikan kebutuhan proyek Anda bersama tim ahli kami.</p>
                        <a href="{{ route('contact') }}" class="btn-primary text-sm w-full justify-center">Hubungi Kami</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>

@endsection

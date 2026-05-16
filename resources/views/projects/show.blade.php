@extends('layouts.app')
@section('title', $project->title)
@section('meta_description', $project->excerpt_short)
@section('og_image', $project->image_url)

@section('content')

{{-- Hero / Header --}}
<section class="bg-gray-950 py-16 relative overflow-hidden">
    <div class="absolute inset-0 opacity-5" style="background-image:repeating-linear-gradient(45deg,#F59E0B 0,#F59E0B 1px,transparent 0,transparent 50%);background-size:20px 20px;"></div>
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        {{-- Breadcrumb --}}
        <nav class="text-sm text-gray-500 mb-6 flex items-center gap-2 flex-wrap">
            <a href="{{ route('home') }}" class="hover:text-yellow-400 transition-colors">Beranda</a>
            <span>/</span>
            <a href="{{ route('projects.index') }}" class="hover:text-yellow-400 transition-colors">Portofolio</a>
            <span>/</span>
            <span class="text-gray-400 line-clamp-1">{{ $project->title }}</span>
        </nav>

        @if($project->category)
        <span class="inline-block bg-yellow-500/20 text-yellow-400 text-xs font-black px-3 py-1 rounded-full uppercase tracking-widest mb-5">{{ $project->category }}</span>
        @endif

        <h1 class="font-display text-4xl sm:text-5xl font-black text-white uppercase leading-tight mb-6">{{ $project->title }}</h1>

        <div class="flex flex-wrap gap-5 text-sm text-gray-400">
            @if($project->client)
            <span class="flex items-center gap-1.5">
                <svg class="w-4 h-4 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                Klien: <span class="text-white font-semibold">{{ $project->client }}</span>
            </span>
            @endif
            @if($project->location)
            <span class="flex items-center gap-1.5">
                <svg class="w-4 h-4 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                {{ $project->location }}
            </span>
            @endif
            @if($project->project_date)
            <span class="flex items-center gap-1.5">
                <svg class="w-4 h-4 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                {{ $project->project_date->translatedFormat('F Y') }}
            </span>
            @endif
        </div>
    </div>
</section>

{{-- Content --}}
<section class="py-14 bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-12">

            {{-- Main content --}}
            <div class="lg:col-span-2">
                {{-- Thumbnail --}}
                <div class="rounded-2xl overflow-hidden mb-10 shadow-lg">
                    <img src="{{ $project->image_url }}" alt="{{ $project->title }}"
                        class="w-full object-cover max-h-[480px]"
                        onerror="this.src='https://placehold.co/900x500/fef3c7/d97706?text=Proyek'">
                </div>

                {{-- Rich content --}}
                <div class="prose prose-lg max-w-none prose-headings:font-display prose-headings:uppercase prose-headings:tracking-wide prose-h2:text-2xl prose-h3:text-xl prose-strong:text-gray-900 prose-a:text-yellow-600 prose-img:rounded-xl">
                    {!! $project->content !!}
                </div>

                {{-- Back --}}
                <div class="mt-12 pt-8 border-t border-gray-100">
                    <a href="{{ route('projects.index') }}" class="btn-outline inline-flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                        Kembali ke Portofolio
                    </a>
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="space-y-5">
                {{-- Project Info --}}
                <div class="bg-gray-950 rounded-2xl p-6 text-white sticky top-24">
                    <h3 class="font-display font-black text-yellow-400 uppercase mb-5 text-sm tracking-wide">Info Proyek</h3>
                    <dl class="space-y-4 text-sm">
                        @if($project->client)
                        <div>
                            <dt class="text-gray-500 text-xs uppercase font-bold tracking-wide mb-1">Klien</dt>
                            <dd class="text-white font-semibold">{{ $project->client }}</dd>
                        </div>
                        @endif
                        @if($project->category)
                        <div>
                            <dt class="text-gray-500 text-xs uppercase font-bold tracking-wide mb-1">Kategori</dt>
                            <dd><span class="bg-yellow-500/20 text-yellow-400 text-xs font-bold px-2.5 py-1 rounded-full">{{ $project->category }}</span></dd>
                        </div>
                        @endif
                        @if($project->location)
                        <div>
                            <dt class="text-gray-500 text-xs uppercase font-bold tracking-wide mb-1">Lokasi</dt>
                            <dd class="text-gray-300">{{ $project->location }}</dd>
                        </div>
                        @endif
                        @if($project->project_date)
                        <div>
                            <dt class="text-gray-500 text-xs uppercase font-bold tracking-wide mb-1">Tanggal Proyek</dt>
                            <dd class="text-gray-300">{{ $project->project_date->format('d M Y') }}</dd>
                        </div>
                        @endif
                    </dl>
                    <div class="mt-6 pt-5 border-t border-gray-800">
                        <a href="{{ route('contact') }}" class="btn-primary w-full justify-center text-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            Konsultasi Proyek
                        </a>
                        <a href="https://wa.me/6282112341234" target="_blank" class="mt-2 w-full flex items-center justify-center gap-2 bg-green-500 hover:bg-green-400 text-white font-bold py-3 px-4 rounded-xl text-sm transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            WhatsApp Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Related Projects --}}
        @if($related->count())
        <div class="mt-16 pt-12 border-t border-gray-100">
            <h2 class="section-title text-gray-900 mb-8">Proyek <span class="text-yellow-500">Terkait</span></h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($related as $rel)
                <a href="{{ route('projects.show', $rel->slug) }}" class="group border border-gray-100 rounded-2xl overflow-hidden hover:border-yellow-400 hover:shadow-lg transition-all duration-300">
                    <div class="aspect-video overflow-hidden bg-gray-100">
                        <img src="{{ $rel->image_url }}" alt="{{ $rel->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" onerror="this.src='https://placehold.co/400x250/fef3c7/d97706?text=Proyek'">
                    </div>
                    <div class="p-4">
                        <div class="text-yellow-600 text-xs font-bold uppercase mb-1">{{ $rel->category }}</div>
                        <h3 class="font-display font-bold text-gray-900 uppercase leading-snug line-clamp-2 group-hover:text-yellow-600 transition-colors">{{ $rel->title }}</h3>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>

@push('styles')
<style>
/* CKEditor content styling */
.prose img { max-width: 100%; height: auto; }
.prose table { width: 100%; border-collapse: collapse; }
.prose td, .prose th { border: 1px solid #e5e7eb; padding: 8px 12px; }
.prose th { background: #fef3c7; font-weight: 700; }
</style>
@endpush

@endsection

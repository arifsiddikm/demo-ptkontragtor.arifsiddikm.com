@extends('layouts.app')
@section('title', $equipment->name)
@section('meta_description', Str::limit(strip_tags($equipment->description), 160))

@section('content')

<section class="bg-yellow-500 py-14 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background: repeating-linear-gradient(-45deg,#000 0,#000 1px,transparent 0,transparent 16px);"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <nav class="text-sm text-black/50 mb-5 flex items-center gap-2 flex-wrap">
            <a href="{{ route('home') }}" class="hover:text-black transition-colors">Beranda</a>
            <span>/</span>
            <a href="{{ route('equipment.index') }}" class="hover:text-black transition-colors">Alat Berat</a>
            <span>/</span>
            <span class="text-black/80 font-semibold">{{ $equipment->name }}</span>
        </nav>

        <div class="flex flex-wrap items-start gap-4">
            <div class="flex-1">
                <div class="text-black/60 text-xs font-bold uppercase tracking-widest mb-2">{{ $equipment->category }}</div>
                <h1 class="font-display text-4xl sm:text-5xl font-black text-black uppercase leading-tight">{{ $equipment->name }}</h1>
            </div>
            <div class="shrink-0 pt-2">
                @if($equipment->isAvailable())
                <span class="inline-flex items-center gap-2 bg-green-500 text-white font-bold px-4 py-2 rounded-xl text-sm shadow-sm">
                    <span class="w-2 h-2 bg-white rounded-full animate-pulse"></span> Tersedia untuk Disewa
                </span>
                @else
                <span class="inline-flex items-center gap-2 bg-red-500 text-white font-bold px-4 py-2 rounded-xl text-sm">
                    <span class="w-2 h-2 bg-white rounded-full"></span> Sedang Tidak Tersedia
                </span>
                @endif
            </div>
        </div>
    </div>
</section>

<section class="py-14 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-5 gap-12">

            {{-- Main content --}}
            <div class="lg:col-span-3 space-y-10">
                {{-- Image --}}
                <div class="aspect-video bg-gray-100 rounded-2xl overflow-hidden shadow-lg border border-gray-100">
                    <img src="{{ $equipment->image_url }}" alt="{{ $equipment->name }}"
                         class="w-full h-full object-cover"
                         onerror="this.src='https://placehold.co/800x450/fef3c7/d97706?text={{ urlencode($equipment->name) }}'">
                </div>

                {{-- Description --}}
                <div class="bg-gray-50 rounded-2xl p-7 border border-gray-100">
                    <h2 class="font-display text-2xl font-black text-gray-900 uppercase mb-4 flex items-center gap-2">
                        <span class="w-1 h-6 bg-yellow-500 rounded-full inline-block"></span>
                        Deskripsi
                    </h2>
                    <p class="text-gray-600 leading-relaxed text-base">{{ $equipment->description }}</p>
                </div>

                {{-- Specifications --}}
                @if($equipment->specifications)
                <div>
                    <h2 class="font-display text-2xl font-black text-gray-900 uppercase mb-5 flex items-center gap-2">
                        <span class="w-1 h-6 bg-yellow-500 rounded-full inline-block"></span>
                        Spesifikasi Teknis
                    </h2>
                    <div class="rounded-2xl border border-gray-200 overflow-hidden shadow-sm">
                        @php
                            $lines = array_filter(array_map('trim', explode("\n", $equipment->specifications)));
                            $i = 0;
                        @endphp
                        @foreach($lines as $spec)
                        @php $parts = explode(':', $spec, 2); $i++; @endphp
                        @if(count($parts) === 2)
                        <div class="flex {{ $i % 2 === 0 ? 'bg-yellow-50/40' : 'bg-white' }} border-b border-gray-100 last:border-0">
                            <div class="w-2/5 sm:w-1/3 px-5 py-3.5 font-semibold text-gray-700 text-sm border-r border-gray-100 flex items-center gap-2">
                                <span class="w-1.5 h-1.5 bg-yellow-400 rounded-full shrink-0"></span>
                                {{ trim($parts[0]) }}
                            </div>
                            <div class="flex-1 px-5 py-3.5 text-gray-800 text-sm font-medium">{{ trim($parts[1]) }}</div>
                        </div>
                        @elseif(trim($spec))
                        <div class="px-5 py-2 bg-yellow-500 text-black font-display font-bold text-xs uppercase tracking-widest border-b border-yellow-400">
                            {{ trim($spec) }}
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            {{-- Sidebar --}}
            <div class="lg:col-span-2">
                <div class="sticky top-24 space-y-5">
                    {{-- CTA Card --}}
                    <div class="bg-gray-900 rounded-2xl p-6 text-white">
                        <h3 class="font-display font-black text-yellow-400 uppercase text-lg mb-2">Tertarik Menyewa?</h3>
                        <p class="text-gray-400 text-sm mb-5 leading-relaxed">Hubungi tim kami untuk informasi ketersediaan, harga sewa, dan detail kontrak. Respons dalam 1×24 jam.</p>
                        <a href="{{ route('contact') }}?subject={{ urlencode('Sewa '.$equipment->name) }}"
                           class="w-full flex items-center justify-center gap-2 bg-yellow-500 hover:bg-yellow-400 text-black font-black py-3.5 rounded-xl mb-3 transition-colors text-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            Hubungi Kami
                        </a>
                        <a href="https://wa.me/6282112341234?text={{ urlencode('Halo, saya tertarik menyewa '.$equipment->name) }}"
                           target="_blank"
                           class="w-full flex items-center justify-center gap-2 bg-green-500 hover:bg-green-400 text-white font-bold py-3 rounded-xl transition-colors text-sm">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            WhatsApp Sekarang
                        </a>
                    </div>

                    {{-- Quick Info --}}
                    <div class="bg-yellow-50 border border-yellow-200 rounded-2xl p-5">
                        <h4 class="font-display font-bold text-gray-800 uppercase text-sm mb-3 tracking-wide">Info Cepat</h4>
                        <div class="space-y-2.5 text-sm">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-500">Kategori</span>
                                <span class="font-bold text-gray-800 bg-white px-2.5 py-1 rounded-lg border border-gray-100 text-xs">{{ $equipment->category }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-500">Status</span>
                                @if($equipment->isAvailable())
                                <span class="font-bold text-green-600 text-xs bg-green-50 px-2.5 py-1 rounded-lg border border-green-100">✓ Tersedia</span>
                                @else
                                <span class="font-bold text-red-500 text-xs bg-red-50 px-2.5 py-1 rounded-lg border border-red-100">✗ Tidak Tersedia</span>
                                @endif
                            </div>
                            @if($equipment->is_featured)
                            <div class="flex justify-between items-center">
                                <span class="text-gray-500">Kategori</span>
                                <span class="font-bold text-yellow-700 text-xs bg-yellow-100 px-2.5 py-1 rounded-lg">⭐ Unggulan</span>
                            </div>
                            @endif
                        </div>
                    </div>

                    {{-- Back link --}}
                    <a href="{{ route('equipment.index') }}" class="flex items-center gap-2 text-gray-500 hover:text-yellow-600 text-sm font-semibold transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                        Lihat Semua Alat Berat
                    </a>
                </div>
            </div>
        </div>

        {{-- Related --}}
        @if($related->count())
        <div class="mt-16 pt-12 border-t border-gray-100">
            <h2 class="font-display text-2xl font-black text-gray-900 uppercase mb-8 flex items-center gap-2">
                <span class="w-1 h-6 bg-yellow-500 rounded-full"></span>
                Alat Berat Sejenis
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($related as $eq)
                <a href="{{ route('equipment.show', $eq->slug) }}" class="group eq-card border border-gray-100 rounded-2xl overflow-hidden hover:border-yellow-400 hover:shadow-lg transition-all">
                    <div class="aspect-video bg-gray-100 overflow-hidden">
                        <img src="{{ $eq->image_url }}" alt="{{ $eq->name }}" class="eq-img w-full h-full object-cover" onerror="this.src='https://placehold.co/400x225/fef3c7/d97706?text={{ urlencode($eq->name) }}'">
                    </div>
                    <div class="p-4">
                        <div class="text-yellow-600 text-xs font-bold uppercase mb-1">{{ $eq->category }}</div>
                        <h3 class="font-display font-bold text-gray-900 uppercase group-hover:text-yellow-600 transition-colors">{{ $eq->name }}</h3>
                        <p class="text-gray-400 text-xs mt-1 line-clamp-2">{{ Str::limit($eq->description, 80) }}</p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>

@endsection

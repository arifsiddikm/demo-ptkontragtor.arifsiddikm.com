@extends('layouts.app')

@section('title', $career->title)
@section('meta_description', Str::limit(strip_tags($career->description), 150))

@section('content')

<section class="bg-gray-950 py-16 relative overflow-hidden">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <nav class="text-sm text-gray-500 mb-6 flex items-center gap-2">
            <a href="{{ route('home') }}" class="hover:text-yellow-400">Beranda</a>
            <span>/</span>
            <a href="{{ route('careers.index') }}" class="hover:text-yellow-400">Karir</a>
            <span>/</span>
            <span class="text-gray-400">{{ $career->title }}</span>
        </nav>
        <div class="flex flex-wrap items-center gap-3 mb-5">
            <span class="bg-yellow-500/20 text-yellow-400 text-xs font-bold px-3 py-1 rounded-full uppercase">{{ $career->type_label }}</span>
            <span class="bg-gray-800 text-gray-300 text-xs font-semibold px-3 py-1 rounded-full">{{ $career->department }}</span>
        </div>
        <h1 class="font-display text-4xl sm:text-5xl font-bold text-white uppercase">{{ $career->title }}</h1>
        <div class="flex flex-wrap gap-5 mt-5 text-sm text-gray-400">
            <span class="flex items-center gap-1.5"><svg class="w-4 h-4 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>{{ $career->location }}</span>
            @if($career->salary_range)<span class="flex items-center gap-1.5"><svg class="w-4 h-4 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>{{ $career->salary_range }}</span>@endif
            @if($career->deadline)<span class="flex items-center gap-1.5"><svg class="w-4 h-4 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>Deadline: {{ $career->deadline->format('d M Y') }}</span>@endif
        </div>
    </div>
</section>

<section class="py-14 bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-10">
            <div class="lg:col-span-2 space-y-8">
                <div>
                    <h2 class="font-display text-2xl font-bold text-gray-900 uppercase mb-4">Deskripsi Pekerjaan</h2>
                    <div class="prose prose-sm max-w-none prose-headings:font-display prose-headings:uppercase prose-headings:tracking-wide prose-strong:text-gray-900 prose-a:text-yellow-600 prose-ul:space-y-1 prose-li:text-gray-600">
                        {!! $career->description !!}
                    </div>
                </div>
                <div>
                    <h2 class="font-display text-2xl font-bold text-gray-900 uppercase mb-4">Persyaratan</h2>
                    <div class="prose prose-sm max-w-none prose-headings:font-display prose-headings:uppercase prose-strong:text-gray-900 prose-a:text-yellow-600 prose-ul:space-y-1 prose-li:text-gray-600">
                        @if(str_contains($career->requirements, '<'))
                            {!! $career->requirements !!}
                        @else
                            <ul class="space-y-2 text-gray-600">
                                @foreach(explode("\n", $career->requirements) as $req)
                                @if(trim($req))
                                <li class="flex gap-2.5 text-sm">
                                    <svg class="w-4 h-4 text-yellow-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    {{ ltrim(trim($req), '-') }}
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>

            <div>
                <div class="bg-gray-950 rounded-2xl p-6 text-white sticky top-24">
                    <h3 class="font-display font-bold text-yellow-400 uppercase mb-5">Lamar Posisi Ini</h3>
                    <div class="space-y-3 text-sm text-gray-400 mb-6">
                        <div class="flex justify-between"><span>Posisi:</span><span class="text-white font-medium">{{ $career->title }}</span></div>
                        <div class="flex justify-between"><span>Departemen:</span><span class="text-white">{{ $career->department }}</span></div>
                        <div class="flex justify-between"><span>Tipe:</span><span class="text-white">{{ $career->type_label }}</span></div>
                        <div class="flex justify-between"><span>Lokasi:</span><span class="text-white">{{ $career->location }}</span></div>
                    </div>
                    <a href="{{ route('contact') }}?subject={{ urlencode('Lamaran: '.$career->title) }}" class="btn-primary w-full justify-center mb-3">
                        Lamar via Pesan
                    </a>
                    <a href="mailto:career@kontragtor.co.id?subject={{ urlencode('Lamaran: '.$career->title) }}" class="btn-outline w-full justify-center text-sm">
                        Kirim via Email
                    </a>
                    <p class="text-gray-600 text-xs mt-4 text-center">Kirim CV dan surat lamaran ke career@kontragtor.co.id</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

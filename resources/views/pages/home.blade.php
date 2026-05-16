@extends('layouts.app')
@section('title', 'Beranda')
@section('meta_description', 'PT Kontragtor Indonesia Tbk. — Solusi sewa alat berat konstruksi profesional. Excavator, Bulldozer, Crane, Grader tersedia siap pakai.')

@section('content')

{{-- ═══════════════════════════════════════════════════
     HERO SECTION — Animated construction-themed bg
═══════════════════════════════════════════════════ --}}
<section class="relative min-h-screen flex items-center overflow-hidden bg-white">

    {{-- Background image: heavy equipment / construction company --}}
    <div class="absolute inset-0 pointer-events-none">
        <img
            src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=1920&q=80&auto=format&fit=crop"
            alt="Construction site background"
            class="w-full h-full object-cover object-center"
            style="opacity: 0.5;"
        >
        {{-- Gradient overlay to keep text readable --}}
        <div class="absolute inset-0" style="background: linear-gradient(90deg, rgba(255,255,255,0.92) 0%, rgba(255,255,255,0.75) 50%, rgba(255,255,255,0.3) 100%);"></div>
        {{-- Bottom fade --}}
        <div class="absolute bottom-0 left-0 right-0 h-32" style="background: linear-gradient(to top, rgba(255,255,255,0.6), transparent);"></div>
    </div>

    {{-- Animated grid lines background (keep subtle on top of image) --}}
    <div class="absolute inset-0 pointer-events-none" style="
        background-image:
            linear-gradient(rgba(245,158,11,.05) 1px, transparent 1px),
            linear-gradient(90deg, rgba(245,158,11,.05) 1px, transparent 1px);
        background-size: 60px 60px;
    "></div>

    {{-- Animated diagonal stripes on right side --}}
    <div class="absolute right-0 top-0 w-1/2 h-full overflow-hidden pointer-events-none opacity-20">
        <div style="
            position: absolute; inset: 0;
            background: repeating-linear-gradient(
                -45deg,
                transparent,
                transparent 18px,
                rgba(245,158,11,.12) 18px,
                rgba(245,158,11,.12) 20px
            );
            animation: stripeMarch 20s linear infinite;
        "></div>
    </div>

    {{-- Floating geometric shapes --}}
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="hero-particle w-64 h-64 bg-yellow-400/10 -top-20 -right-20" style="animation-delay:0s; animation-duration:8s; border-radius:30% 70% 70% 30% / 30% 30% 70% 70%;"></div>
        <div class="hero-particle w-40 h-40 bg-yellow-500/8 top-1/3 -right-10" style="animation-delay:2s; animation-duration:10s; border-radius:60% 40% 30% 70% / 60% 30% 70% 40%;"></div>
        <div class="hero-particle w-24 h-24 bg-yellow-400/15 bottom-20 right-1/4" style="animation-delay:4s; animation-duration:7s; border-radius:50%;"></div>
        <div class="hero-particle w-16 h-16 bg-yellow-600/10 top-20 right-1/3" style="animation-delay:1s; animation-duration:9s; border-radius:50%;"></div>

        {{-- Construction gear shapes --}}
        <svg class="absolute top-16 right-16 w-32 h-32 text-yellow-400/20 animate-spin" style="animation-duration:30s" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 15.5a3.5 3.5 0 110-7 3.5 3.5 0 010 7zm7.43-1.32c.04-.32.07-.64.07-.97s-.03-.66-.07-1l2.08-1.63c.19-.15.24-.42.12-.64l-1.97-3.41c-.12-.22-.39-.3-.61-.22l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.23-.09-.49 0-.61.22L2.37 8.68c-.12.22-.07.49.12.64l2.08 1.63c-.04.34-.07.67-.07 1s.03.65.07.97l-2.08 1.66c-.19.15-.24.42-.12.64l1.97 3.41c.12.22.39.3.61.22l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.61-.25 1.17-.58 1.69-.98l2.49 1c.23.09.49 0 .61-.22l1.97-3.41c.12-.22.07-.49-.12-.64l-2.09-1.66z"/>
        </svg>
        <svg class="absolute bottom-32 right-32 w-20 h-20 text-yellow-500/15 animate-spin" style="animation-duration:20s; animation-direction:reverse" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 15.5a3.5 3.5 0 110-7 3.5 3.5 0 010 7zm7.43-1.32c.04-.32.07-.64.07-.97s-.03-.66-.07-1l2.08-1.63c.19-.15.24-.42.12-.64l-1.97-3.41c-.12-.22-.39-.3-.61-.22l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.23-.09-.49 0-.61.22L2.37 8.68c-.12.22-.07.49.12.64l2.08 1.63c-.04.34-.07.67-.07 1s.03.65.07.97l-2.08 1.66c-.19.15-.24.42-.12.64l1.97 3.41c.12.22.39.3.61.22l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.61-.25 1.17-.58 1.69-.98l2.49 1c.23.09.49 0 .61-.22l1.97-3.41c.12-.22.07-.49-.12-.64l-2.09-1.66z"/>
        </svg>

        {{-- Excavator arm line art --}}
        <svg class="absolute right-8 bottom-8 w-96 h-96 text-yellow-500/10" fill="none" stroke="currentColor" viewBox="0 0 200 200" stroke-width="2">
            <rect x="20" y="120" width="120" height="40" rx="4"/>
            <rect x="10" y="130" width="140" height="15" rx="2" fill="currentColor" opacity=".3"/>
            <circle cx="30" cy="165" r="15"/>
            <circle cx="100" cy="165" r="15"/>
            <line x1="140" y1="120" x2="160" y2="60"/>
            <line x1="160" y1="60" x2="180" y2="30"/>
            <polyline points="175,25 190,35 180,45"/>
            <line x1="20" y1="50" x2="25" y2="120"/>
        </svg>
    </div>

    {{-- Yellow accent left border --}}
    <div class="absolute left-0 top-0 w-1.5 h-full bg-gradient-to-b from-yellow-400 via-yellow-500 to-yellow-600"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 relative z-10 w-full">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                {{-- Badge --}}
                <div class="inline-flex items-center gap-2 bg-yellow-100 border border-yellow-300 text-yellow-700 text-xs font-bold px-4 py-2 rounded-full mb-7 uppercase tracking-widest">
                    <span class="w-2 h-2 bg-yellow-500 rounded-full animate-pulse"></span>
                    Terpercaya Sejak 2005
                </div>

                {{-- Headline with typewriter feel --}}
                <h1 class="font-display text-5xl sm:text-6xl lg:text-7xl font-black text-gray-900 uppercase leading-none tracking-tight mb-6" id="hero-headline">
                    SEWA<br>
                    <span class="relative inline-block">
                        <span class="text-yellow-500">ALAT BERAT</span>
                        <span class="absolute -bottom-1 left-0 w-full h-1 bg-yellow-500 rounded-full"></span>
                    </span><br>
                    <span class="text-gray-800">KONSTRUKSI</span>
                </h1>

                <p class="text-gray-600 text-lg leading-relaxed mb-8 max-w-lg">
                    PT Kontragtor Indonesia Tbk. hadir dengan armada alat berat lengkap dan terawat. Solusi andal untuk proyek infrastruktur, pertambangan, dan konstruksi Anda.
                </p>

                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('equipment.index') }}" class="btn-primary text-base">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                        Lihat Armada
                    </a>
                    <a href="{{ route('contact') }}" class="btn-outline text-base">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                        Konsultasi Gratis
                    </a>
                </div>

                {{-- Stats counter --}}
                <div class="grid grid-cols-3 gap-4 mt-12 pt-8 border-t border-gray-200">
                    @foreach([['200+','Unit Armada'],['500+','Proyek Selesai'],['19+','Tahun Pengalaman']] as [$num, $label])
                    <div class="stat-item">
                        <div class="font-display text-3xl sm:text-4xl font-black text-yellow-500">{{ $num }}</div>
                        <div class="text-xs text-gray-500 mt-0.5 font-semibold uppercase tracking-wide leading-tight">{{ $label }}</div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Right side: animated hero visual --}}
            <div class="hidden lg:flex items-center justify-center relative">
                <div class="relative w-full max-w-sm aspect-square">
                    {{-- Pulsing background rings --}}
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="w-80 h-80 border-2 border-yellow-300/30 rounded-full animate-ping" style="animation-duration:3s"></div>
                    </div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="w-64 h-64 border-2 border-yellow-400/20 rounded-full animate-ping" style="animation-duration:2.5s; animation-delay:.5s"></div>
                    </div>
                    {{-- Center card --}}
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="w-56 h-56 bg-yellow-500 rounded-3xl shadow-2xl flex flex-col items-center justify-center text-black transform rotate-3 hover:rotate-0 transition-transform duration-500">
                            <svg class="w-24 h-24 mb-3 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 80 80" stroke-width="2.5">
                                <rect x="5" y="42" width="55" height="22" rx="3"/>
                                <rect x="5" y="50" width="55" height="8" fill="currentColor" opacity=".2"/>
                                <circle cx="16" cy="67" r="7"/>
                                <circle cx="46" cy="67" r="7"/>
                                <line x1="60" y1="42" x2="70" y2="22"/>
                                <line x1="70" y1="22" x2="78" y2="10"/>
                                <circle cx="78" cy="10" r="4" fill="currentColor" opacity=".4"/>
                                <line x1="12" y1="28" x2="14" y2="42"/>
                                <line x1="14" y1="28" x2="35" y2="8"/>
                                <polyline points="32,4 40,10 33,15" fill="currentColor" opacity=".5"/>
                            </svg>
                            <div class="font-display font-black text-2xl uppercase tracking-wide">ARMADA</div>
                            <div class="text-sm font-bold opacity-70">SIAP OPERASI</div>
                        </div>
                    </div>
                    {{-- Orbiting badges --}}
                    <div class="absolute top-4 right-4 bg-white shadow-lg rounded-xl px-3 py-2 text-xs font-bold text-green-600 flex items-center gap-1.5 animate-bounce" style="animation-duration:2s">
                        <span class="w-2 h-2 bg-green-500 rounded-full"></span> Unit Tersedia
                    </div>
                    <div class="absolute bottom-10 left-2 bg-white shadow-lg rounded-xl px-3 py-2 text-xs font-bold text-blue-600 flex items-center gap-1.5" style="animation: floatUp 4s ease-in-out infinite">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Bersertifikat K3
                    </div>
                    <div class="absolute top-1/3 -left-4 bg-yellow-500 shadow-lg rounded-xl px-3 py-2 text-xs font-black text-black" style="animation: floatDown 5s ease-in-out infinite">
                        24/7 Support
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Scroll indicator --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 text-gray-400 text-xs font-medium animate-bounce">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
    </div>
</section>

@push('styles')
<style>
@keyframes stripeMarch {
    from { background-position: 0 0; }
    to   { background-position: 100px 100px; }
}
</style>
@endpush

{{-- ═══════════════════════════════════════════════════
     SERVICES
═══════════════════════════════════════════════════ --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <div class="text-yellow-600 text-sm font-bold uppercase tracking-widest mb-3">Layanan Kami</div>
            <h2 class="section-title text-gray-900">Solusi Alat Berat <span class="text-yellow-500">Lengkap</span></h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
            $services = [
                ['img' => 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=600&q=80&auto=format&fit=crop', 'icon' => 'M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4', 'title' => 'Sewa Harian', 'desc' => 'Fleksibel untuk kebutuhan proyek jangka pendek dengan tarif kompetitif.'],
                ['img' => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=600&q=80&auto=format&fit=crop', 'icon' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z', 'title' => 'Kontrak Bulanan', 'desc' => 'Harga khusus untuk penyewaan jangka panjang dengan garansi ketersediaan.'],
                ['img' => 'https://images.unsplash.com/photo-1565008447742-97f6f38c985c?w=600&q=80&auto=format&fit=crop', 'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z', 'title' => 'Dengan Operator', 'desc' => 'Operator bersertifikat berpengalaman tersedia untuk semua unit kami.'],
                ['img' => 'https://images.unsplash.com/photo-1590856029826-c7a73142bbf1?w=600&q=80&auto=format&fit=crop', 'icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z', 'title' => 'Maintenance', 'desc' => 'Tim teknisi siap 24/7 memastikan alat selalu dalam kondisi prima.'],
            ];
            @endphp
            @foreach($services as $svc)
            <div class="group bg-white rounded-2xl border border-gray-100 hover:border-yellow-400 hover:shadow-xl transition-all duration-300 hover:-translate-y-1 overflow-hidden flex flex-col">
                {{-- Cover image --}}
                <div class="aspect-video overflow-hidden bg-gray-100">
                    <img src="{{ $svc['img'] }}" alt="{{ $svc['title'] }}"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        onerror="this.src='https://placehold.co/400x225/fef3c7/d97706?text={{ urlencode($svc['title']) }}'">
                </div>
                <div class="p-6 flex flex-col flex-1">
                    <div class="w-11 h-11 bg-yellow-100 rounded-xl flex items-center justify-center mb-4 group-hover:bg-yellow-500 transition-colors">
                        <svg class="w-5 h-5 text-yellow-600 group-hover:text-black transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $svc['icon'] }}"/></svg>
                    </div>
                    <h3 class="font-display font-bold text-gray-900 text-lg uppercase tracking-wide mb-2">{{ $svc['title'] }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">{{ $svc['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════
     FEATURED EQUIPMENT
═══════════════════════════════════════════════════ --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-12 gap-4">
            <div>
                <div class="text-yellow-600 text-sm font-bold uppercase tracking-widest mb-3">Armada Unggulan</div>
                <h2 class="section-title text-gray-900">Alat Berat <span class="text-yellow-500">Pilihan</span></h2>
            </div>
            <a href="{{ route('equipment.index') }}" class="btn-outline text-sm self-start sm:self-auto">Lihat Semua</a>
        </div>

        @if($featuredEquipment->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($featuredEquipment as $eq)
            <a href="{{ route('equipment.show', $eq->slug) }}" class="group eq-card bg-white border border-gray-100 rounded-2xl overflow-hidden hover:border-yellow-400 hover:shadow-2xl transition-all duration-300 hover:-translate-y-1">
                <div class="aspect-video bg-gray-100 overflow-hidden relative">
                    <img src="{{ $eq->image_url }}" alt="{{ $eq->name }}" class="eq-img w-full h-full object-cover" onerror="this.src='https://placehold.co/600x400/fef3c7/d97706?text={{ urlencode($eq->name) }}'">
                    <div class="absolute top-3 left-3">
                        @if($eq->isAvailable())
                        <span class="badge-available">✓ Tersedia</span>
                        @else
                        <span class="badge-unavailable">✗ Tidak Tersedia</span>
                        @endif
                    </div>
                </div>
                <div class="p-5">
                    <div class="text-yellow-600 text-xs font-bold uppercase tracking-widest mb-1">{{ $eq->category }}</div>
                    <h3 class="font-display font-bold text-gray-900 text-xl uppercase leading-tight group-hover:text-yellow-600 transition-colors">{{ $eq->name }}</h3>
                    <p class="text-gray-500 text-sm mt-2 line-clamp-2">{{ $eq->description }}</p>
                    <div class="flex items-center gap-1 mt-4 text-yellow-600 text-sm font-bold">
                        Lihat Detail
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        @else
        <div class="text-center py-16 text-gray-400">
            <p>Belum ada data alat berat unggulan.</p>
        </div>
        @endif
    </div>
</section>

{{-- ═══════════════════════════════════════════════════
     WHY US — Yellow section
═══════════════════════════════════════════════════ --}}
<section class="py-20 bg-yellow-500 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: repeating-linear-gradient(-45deg, #000 0, #000 1px, transparent 0, transparent 50%); background-size: 16px 16px;"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <div class="text-black/50 text-sm font-bold uppercase tracking-widest mb-3">Mengapa Kami</div>
                <h2 class="font-display text-4xl lg:text-5xl font-black text-black uppercase leading-tight mb-6">KEUNGGULAN<br>KONTRAGTOR</h2>
                <p class="text-black/70 text-lg leading-relaxed mb-8">Kami bukan sekadar penyedia sewa alat — kami adalah mitra konstruksi Anda dengan standar perawatan tertinggi dan tim profesional berdedikasi.</p>
                <div class="grid grid-cols-2 gap-4">
                    @foreach([['01','Armada Terawat','Semua unit melalui perawatan berkala dan inspeksi ketat sebelum disewa.'],['02','Respons Cepat','Tim support 24 jam siap membantu mengatasi kendala di lapangan.'],['03','Harga Kompetitif','Tarif transparan tanpa biaya tersembunyi. Penawaran khusus kontrak panjang.'],['04','Berpengalaman','Lebih dari 19 tahun melayani proyek konstruksi skala nasional.']] as [$n,$t,$d])
                    <div class="bg-black/10 hover:bg-black/20 rounded-xl p-5 transition-colors">
                        <div class="font-display text-3xl font-black text-black/30 mb-2">{{ $n }}</div>
                        <h4 class="font-display font-bold text-black uppercase text-sm tracking-wide mb-1">{{ $t }}</h4>
                        <p class="text-black/60 text-xs leading-relaxed">{{ $d }}</p>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Cover Image / Visual --}}
            <div class="flex items-center justify-center">
                <div class="relative w-full max-w-md">
                    {{-- Main image --}}
                    <div class="rounded-3xl overflow-hidden shadow-2xl" style="transform: rotate(-2deg);">
                        <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=800&q=80&auto=format&fit=crop"
                            alt="Armada alat berat PT Kontragtor"
                            class="w-full h-80 object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent rounded-3xl"></div>
                    </div>
                    {{-- Floating badge 1 --}}
                    <div class="absolute -top-4 -right-4 bg-white rounded-2xl shadow-xl px-4 py-3" style="transform: rotate(3deg);">
                        <div class="font-display text-2xl font-black text-yellow-500">200+</div>
                        <div class="text-xs font-bold text-gray-600 uppercase tracking-wide">Unit Armada</div>
                    </div>
                    {{-- Floating badge 2 --}}
                    <div class="absolute -bottom-4 -left-4 bg-gray-900 rounded-2xl shadow-xl px-4 py-3" style="transform: rotate(-2deg);">
                        <div class="font-display text-2xl font-black text-yellow-400">19+</div>
                        <div class="text-xs font-bold text-gray-400 uppercase tracking-wide">Tahun Pengalaman</div>
                    </div>
                    {{-- Floating badge 3 --}}
                    <div class="absolute top-1/2 -left-6 bg-yellow-300 rounded-xl shadow-lg px-3 py-2 flex items-center gap-2">
                        <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                        <span class="text-xs font-black text-black">K3 Certified</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- LATEST NEWS --}}
@if($latestArticles->count())
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-12 gap-4">
            <div>
                <div class="text-yellow-600 text-sm font-bold uppercase tracking-widest mb-3">Terbaru</div>
                <h2 class="section-title text-gray-900">Berita & <span class="text-yellow-500">Artikel</span></h2>
            </div>
            <a href="{{ route('articles.index') }}" class="text-yellow-600 font-bold text-sm hover:text-yellow-700 flex items-center gap-1">Semua Artikel <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($latestArticles as $article)
            <a href="{{ route('articles.show', $article->slug) }}" class="group bg-white rounded-2xl overflow-hidden border border-gray-100 hover:border-yellow-400 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="aspect-video bg-gray-100 overflow-hidden">
                    <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" onerror="this.src='https://placehold.co/600x400/fef3c7/d97706?text=Artikel'">
                </div>
                <div class="p-5">
                    <div class="text-gray-400 text-xs mb-2">{{ $article->published_at?->format('d M Y') }}</div>
                    <h3 class="font-display font-bold text-gray-900 text-xl uppercase leading-snug group-hover:text-yellow-600 transition-colors line-clamp-2 mb-2">{{ $article->title }}</h3>
                    <p class="text-gray-500 text-sm line-clamp-2">{{ $article->excerpt_short }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- FEATURED PROJECTS --}}
@if(isset($featuredProjects) && $featuredProjects->count())
<section class="py-20 bg-gray-950 relative overflow-hidden">
    <div class="absolute inset-0 opacity-5" style="background-image: repeating-linear-gradient(45deg, #F59E0B 0, #F59E0B 1px, transparent 0, transparent 50%); background-size: 20px 20px;"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-12 gap-4">
            <div>
                <div class="text-yellow-500 text-sm font-bold uppercase tracking-widest mb-3">Track Record</div>
                <h2 class="section-title text-white">Portofolio <span class="text-yellow-500">Unggulan</span></h2>
            </div>
            <a href="{{ route('projects.index') }}" class="text-yellow-500 font-bold text-sm hover:text-yellow-400 flex items-center gap-1 self-start sm:self-auto">
                Semua Proyek <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($featuredProjects as $proj)
            <a href="{{ route('projects.show', $proj->slug) }}" class="group border border-gray-800 rounded-2xl overflow-hidden hover:border-yellow-500 transition-all duration-300 hover:-translate-y-1">
                <div class="aspect-video overflow-hidden bg-gray-800">
                    <img src="{{ $proj->image_url }}" alt="{{ $proj->title }}" class="w-full h-full object-cover opacity-75 group-hover:opacity-100 group-hover:scale-105 transition-all duration-500" onerror="this.src='https://placehold.co/600x400/1f2937/F59E0B?text=Proyek'">
                </div>
                <div class="p-5">
                    @if($proj->category)<div class="text-yellow-500 text-xs font-bold uppercase tracking-widest mb-2">{{ $proj->category }}</div>@endif
                    <h3 class="font-display font-bold text-white text-xl uppercase leading-snug group-hover:text-yellow-400 transition-colors line-clamp-2 mb-2">{{ $proj->title }}</h3>
                    @if($proj->location)<div class="text-gray-500 text-xs flex items-center gap-1.5"><svg class="w-3.5 h-3.5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>{{ $proj->location }}</div>@endif
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ═══════════════════════════════════════════════════
     CTA SECTION — Epic eye-catching
═══════════════════════════════════════════════════ --}}
<section class="py-24 relative overflow-hidden bg-gray-900">
    {{-- Animated background --}}
    <div class="absolute inset-0">
        {{-- Radial yellow glow --}}
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] rounded-full" style="background: radial-gradient(circle, rgba(245,158,11,.25) 0%, rgba(245,158,11,.05) 50%, transparent 70%);"></div>
        {{-- Animated grid --}}
        <div class="absolute inset-0 opacity-10" style="background-image: linear-gradient(rgba(245,158,11,.5) 1px, transparent 1px), linear-gradient(90deg, rgba(245,158,11,.5) 1px, transparent 1px); background-size: 50px 50px;"></div>
        {{-- Diagonal stripes --}}
        <div class="absolute inset-0 opacity-5" style="background: repeating-linear-gradient(45deg, #F59E0B 0, #F59E0B 1px, transparent 0, transparent 40px);"></div>
    </div>

    {{-- Floating elements --}}
    <div class="absolute top-10 left-10 w-16 h-16 border-2 border-yellow-500/30 rounded-xl rotate-12 animate-pulse"></div>
    <div class="absolute bottom-10 right-10 w-24 h-24 border-2 border-yellow-400/20 rounded-full animate-ping" style="animation-duration:4s"></div>
    <div class="absolute top-1/3 right-20 w-10 h-10 bg-yellow-500/20 rounded-lg rotate-45 animate-bounce" style="animation-duration:3s"></div>
    <div class="absolute bottom-1/4 left-20 w-8 h-8 bg-yellow-400/30 rounded-full animate-bounce" style="animation-duration:2s; animation-delay:.5s"></div>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        {{-- Icon badge --}}
        <div class="inline-flex items-center justify-center w-20 h-20 rounded-2xl bg-yellow-500 shadow-2xl mb-8 mx-auto cta-glow" style="animation: pulse-ring 2s infinite">
            <svg class="w-10 h-10 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
        </div>

        <div class="text-yellow-400 text-sm font-bold uppercase tracking-widest mb-4">Mulai Sekarang</div>

        <h2 class="font-display text-5xl sm:text-6xl lg:text-7xl font-black text-white uppercase leading-none mb-6">
            SIAP MULAI<br>
            <span class="text-yellow-500">PROYEK</span> ANDA?
        </h2>

        <p class="text-gray-400 text-lg mb-10 max-w-2xl mx-auto leading-relaxed">
            Konsultasikan kebutuhan alat berat Anda dengan tim ahli kami. Dapatkan penawaran terbaik, respon dalam <strong class="text-yellow-400">1x24 jam</strong>.
        </p>

        {{-- CTA buttons --}}
        <div class="flex flex-wrap gap-4 justify-center mb-12">
            <a href="{{ route('contact') }}" class="bg-yellow-500 hover:bg-yellow-400 text-black font-black px-10 py-4 rounded-xl text-base transition-all duration-300 inline-flex items-center gap-3 shadow-2xl hover:shadow-yellow-500/40 hover:-translate-y-1 transform">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                Hubungi Kami Sekarang
            </a>
            <a href="https://wa.me/6282112341234" target="_blank" class="bg-green-500 hover:bg-green-400 text-white font-black px-10 py-4 rounded-xl text-base transition-all duration-300 inline-flex items-center gap-3 shadow-2xl hover:shadow-green-500/40 hover:-translate-y-1 transform">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                WhatsApp Sekarang
            </a>
        </div>

        {{-- Trust badges --}}
        <div class="flex flex-wrap justify-center gap-6 text-sm text-gray-500">
            @foreach(['✓ Respons dalam 24 jam','✓ Operator bersertifikat K3','✓ Armada terawat & inspeksi rutin','✓ 19+ tahun pengalaman'] as $badge)
            <span class="flex items-center gap-1.5 text-gray-400"><span class="text-yellow-500 font-bold">{{ substr($badge, 0, 1) }}</span>{{ substr($badge, 1) }}</span>
            @endforeach
        </div>
    </div>
</section>

@endsection

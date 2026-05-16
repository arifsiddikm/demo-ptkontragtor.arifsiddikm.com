@extends('layouts.app')

@section('title', 'Tentang Kami')
@section('meta_description', 'Kenali PT Kontragtor Indonesia Tbk. lebih dekat — sejarah, visi misi, dan komitmen kami dalam industri sewa alat berat konstruksi Indonesia.')

@section('content')

{{-- Page Header --}}
<section class="bg-gray-950 py-20 relative overflow-hidden">
    <div class="absolute inset-0 opacity-5" style="background-image: repeating-linear-gradient(45deg, #F59E0B 0, #F59E0B 1px, transparent 0, transparent 50%); background-size: 20px 20px;"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-yellow-500 text-sm font-bold uppercase tracking-widest mb-4">Tentang Kami</div>
        <h1 class="font-display text-5xl sm:text-6xl font-bold text-white uppercase tracking-tight">PT KONTRAGTOR<br><span class="text-yellow-500">INDONESIA TBK.</span></h1>
    </div>
</section>

{{-- Company Profile --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <div class="text-yellow-600 text-sm font-bold uppercase tracking-widest mb-4">Profil Perusahaan</div>
                <h2 class="section-title text-gray-900 mb-6">Mitra Konstruksi <span class="text-yellow-500">Andal</span> Sejak 2005</h2>
                <div class="space-y-4 text-gray-600 leading-relaxed">
                    <p>PT Kontragtor Indonesia Tbk. adalah perusahaan jasa penyewaan alat berat konstruksi yang telah berdiri sejak tahun 2005 dan berkantor pusat di Cikarang, Bekasi, Jawa Barat.</p>
                    <p>Dengan pengalaman lebih dari 19 tahun, kami telah melayani ratusan proyek konstruksi, pertambangan, dan infrastruktur di seluruh Indonesia — dari pembangunan gedung bertingkat, jalan tol, pelabuhan, hingga proyek pertambangan di Kalimantan dan Sumatera.</p>
                    <p>Armada kami mencakup lebih dari 200 unit alat berat dari merek-merek terkemuka dunia seperti Komatsu, Caterpillar, Volvo, dan Hitachi, yang selalu dalam kondisi prima berkat sistem perawatan preventif kami yang ketat.</p>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gray-950 text-white rounded-xl p-7 col-span-2 sm:col-span-1 flex flex-col justify-between aspect-square">
                    <div class="font-display text-6xl font-bold text-yellow-500">19+</div>
                    <div class="font-display text-xl font-bold uppercase">Tahun Berpengalaman</div>
                </div>
                <div class="bg-yellow-500 rounded-xl p-7 flex flex-col justify-between aspect-square">
                    <div class="font-display text-6xl font-bold text-black">200+</div>
                    <div class="font-display text-xl font-bold uppercase text-black">Unit Armada Aktif</div>
                </div>
                <div class="bg-gray-100 rounded-xl p-7 flex flex-col justify-between aspect-square">
                    <div class="font-display text-6xl font-bold text-gray-900">500+</div>
                    <div class="font-display text-xl font-bold uppercase text-gray-700">Proyek Diselesaikan</div>
                </div>
                <div class="bg-gray-800 text-white rounded-xl p-7 flex flex-col justify-between aspect-square">
                    <div class="font-display text-6xl font-bold text-yellow-400">34</div>
                    <div class="font-display text-xl font-bold uppercase">Provinsi Dijangkau</div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Vision Mission --}}
<section class="py-20 bg-gray-950">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <div class="text-yellow-500 text-sm font-bold uppercase tracking-widest mb-3">Arah & Tujuan</div>
            <h2 class="section-title text-white">Visi & <span class="text-yellow-500">Misi</span></h2>
        </div>
        <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
            <div class="bg-yellow-500 rounded-2xl p-8">
                <div class="font-display text-xs font-bold uppercase tracking-widest text-black/50 mb-4">Visi</div>
                <p class="font-display text-2xl font-bold text-black uppercase leading-snug">
                    Menjadi perusahaan sewa alat berat terkemuka dan terpercaya di Asia Tenggara pada tahun 2030.
                </p>
            </div>
            <div class="bg-gray-900 border border-gray-700 rounded-2xl p-8">
                <div class="font-display text-xs font-bold uppercase tracking-widest text-yellow-500 mb-4">Misi</div>
                <ul class="space-y-3 text-gray-300 text-sm leading-relaxed">
                    <li class="flex gap-3">
                        <span class="text-yellow-500 font-bold mt-0.5">01.</span>
                        Menyediakan armada alat berat berkualitas tinggi dengan standar keselamatan internasional.
                    </li>
                    <li class="flex gap-3">
                        <span class="text-yellow-500 font-bold mt-0.5">02.</span>
                        Memberikan layanan pelanggan terbaik dengan respons cepat dan solusi tepat sasaran.
                    </li>
                    <li class="flex gap-3">
                        <span class="text-yellow-500 font-bold mt-0.5">03.</span>
                        Mengembangkan SDM yang kompeten dan berkarakter melalui pelatihan berkelanjutan.
                    </li>
                    <li class="flex gap-3">
                        <span class="text-yellow-500 font-bold mt-0.5">04.</span>
                        Berkontribusi pada pembangunan infrastruktur Indonesia yang berkelanjutan.
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- Values --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <div class="text-yellow-600 text-sm font-bold uppercase tracking-widest mb-3">Nilai Kami</div>
            <h2 class="section-title text-gray-900">Keunggulan yang Kami <span class="text-yellow-500">Jaga</span></h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @php
            $values = [
                ['icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z', 'title' => 'Keselamatan Pertama', 'desc' => 'Semua unit memenuhi standar K3 (Keselamatan dan Kesehatan Kerja). Operator kami bersertifikat dan terlatih menerapkan prosedur keselamatan ketat.'],
                ['icon' => 'M13 10V3L4 14h7v7l9-11h-7z', 'title' => 'Kinerja Tinggi', 'desc' => 'Kami menjamin ketersediaan alat dan waktu respons perbaikan di bawah 4 jam. SLA 98% uptime untuk semua unit yang disewa.'],
                ['icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z', 'title' => 'Tim Profesional', 'desc' => 'Lebih dari 300 karyawan profesional — operator bersertifikat, mekanik terlatih, dan tim manajemen berpengalaman di industri konstruksi.'],
            ];
            @endphp
            @foreach($values as $val)
            <div class="text-center p-8 border border-gray-100 rounded-2xl hover:border-yellow-400 hover:shadow-lg transition-all duration-300 group">
                <div class="w-16 h-16 bg-yellow-50 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-yellow-500 transition-colors">
                    <svg class="w-8 h-8 text-yellow-600 group-hover:text-black transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $val['icon'] }}"/></svg>
                </div>
                <h3 class="font-display font-bold text-gray-900 text-xl uppercase tracking-wide mb-3">{{ $val['title'] }}</h3>
                <p class="text-gray-500 text-sm leading-relaxed">{{ $val['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-24 relative overflow-hidden bg-gray-900">
    {{-- Background --}}
    <div class="absolute inset-0">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[700px] rounded-full" style="background: radial-gradient(circle, rgba(245,158,11,.2) 0%, rgba(245,158,11,.04) 50%, transparent 70%);"></div>
        <div class="absolute inset-0 opacity-10" style="background-image: linear-gradient(rgba(245,158,11,.5) 1px, transparent 1px), linear-gradient(90deg, rgba(245,158,11,.5) 1px, transparent 1px); background-size: 50px 50px;"></div>
    </div>
    {{-- Floating elements --}}
    <div class="absolute top-10 left-10 w-14 h-14 border-2 border-yellow-500/30 rounded-xl rotate-12 animate-pulse"></div>
    <div class="absolute bottom-10 right-12 w-20 h-20 border-2 border-yellow-400/20 rounded-full animate-ping" style="animation-duration:4s"></div>
    <div class="absolute top-1/3 right-16 w-8 h-8 bg-yellow-500/20 rounded-lg rotate-45 animate-bounce" style="animation-duration:3s"></div>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        {{-- Icon --}}
        <div class="inline-flex items-center justify-center w-20 h-20 rounded-2xl bg-yellow-500 shadow-2xl mb-8 mx-auto" style="box-shadow: 0 0 60px rgba(245,158,11,.35), 0 0 120px rgba(245,158,11,.15);">
            <svg class="w-10 h-10 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
        </div>

        <div class="text-yellow-400 text-sm font-bold uppercase tracking-widest mb-4">Mari Berkolaborasi</div>
        <h2 class="font-display text-5xl sm:text-6xl font-black text-white uppercase leading-none mb-5">
            SIAP BEKERJA<br><span class="text-yellow-500">SAMA</span> DENGAN KAMI?
        </h2>
        <p class="text-gray-400 text-lg mb-10 max-w-2xl mx-auto leading-relaxed">
            Hubungi tim kami dan dapatkan konsultasi <strong class="text-yellow-400">GRATIS</strong> serta penawaran terbaik untuk kebutuhan alat berat proyek Anda.
        </p>

        <div class="flex flex-wrap gap-4 justify-center mb-10">
            <a href="{{ route('contact') }}" class="bg-yellow-500 hover:bg-yellow-400 text-black font-black px-10 py-4 rounded-xl text-base transition-all duration-300 inline-flex items-center gap-3 shadow-2xl hover:shadow-yellow-500/40 hover:-translate-y-1 transform">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                Konsultasi Sekarang
            </a>
            <a href="https://wa.me/6282112341234" target="_blank" class="bg-green-500 hover:bg-green-400 text-white font-black px-10 py-4 rounded-xl text-base transition-all duration-300 inline-flex items-center gap-3 shadow-2xl hover:-translate-y-1 transform">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                WhatsApp Sekarang
            </a>
        </div>

        <div class="flex flex-wrap justify-center gap-6 text-sm text-gray-500">
            @foreach(['✓ Respons dalam 24 jam','✓ Operator bersertifikat K3','✓ Armada terawat & inspeksi rutin','✓ 19+ tahun pengalaman'] as $badge)
            <span class="flex items-center gap-1.5 text-gray-400"><span class="text-yellow-500 font-bold">{{ substr($badge, 0, 1) }}</span>{{ substr($badge, 1) }}</span>
            @endforeach
        </div>
    </div>
</section>

@endsection

@extends('layouts.app')
@section('title', 'Hubungi Kami')
@section('meta_description', 'Hubungi PT Kontragtor Indonesia Tbk. untuk informasi sewa alat berat, penawaran proyek, atau konsultasi kebutuhan konstruksi Anda.')

@section('content')

<section class="bg-yellow-500 py-16 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background: repeating-linear-gradient(-45deg,#000 0,#000 1px,transparent 0,transparent 16px);"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-black/50 text-sm font-bold uppercase tracking-widest mb-4">Kami Siap Membantu</div>
        <h1 class="font-display text-5xl font-black text-black uppercase">Hubungi <span class="text-white">Kami</span></h1>
    </div>
</section>

<section class="py-14 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-5 gap-14">

            {{-- Form --}}
            <div class="lg:col-span-3">
                <h2 class="font-display text-2xl font-bold text-gray-900 uppercase mb-2">Kirim Pesan</h2>
                <p class="text-gray-500 text-sm mb-8">Tim kami akan merespons dalam 1×24 jam kerja.</p>

                <form method="POST" action="{{ route('contact.send') }}" class="space-y-5" id="contactForm">
                    @csrf

                    <div class="grid sm:grid-cols-2 gap-5">
                        <div class="group">
                            <label class="block text-xs font-bold text-gray-600 uppercase tracking-wider mb-2">
                                Nama Lengkap <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                <input type="text" name="name" value="{{ old('name') }}" required
                                    class="w-full border @error('name') border-red-400 ring-2 ring-red-100 @else border-gray-200 @enderror rounded-xl pl-10 pr-4 py-3 text-gray-900 text-sm bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition-all"
                                    placeholder="Nama Anda">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase tracking-wider mb-2">
                                Email <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                <input type="email" name="email" value="{{ old('email') }}" required
                                    class="w-full border @error('email') border-red-400 ring-2 ring-red-100 @else border-gray-200 @enderror rounded-xl pl-10 pr-4 py-3 text-gray-900 text-sm bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition-all"
                                    placeholder="email@perusahaan.com">
                            </div>
                        </div>
                    </div>

                    <div class="grid sm:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase tracking-wider mb-2">No. Telepon</label>
                            <div class="relative">
                                <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                <input type="text" name="phone" value="{{ old('phone') }}"
                                    class="w-full border border-gray-200 rounded-xl pl-10 pr-4 py-3 text-gray-900 text-sm bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition-all"
                                    placeholder="08xx-xxxx-xxxx">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase tracking-wider mb-2">Subjek</label>
                            <div class="relative">
                                <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                                <input type="text" name="subject" value="{{ old('subject', request('subject')) }}"
                                    class="w-full border border-gray-200 rounded-xl pl-10 pr-4 py-3 text-gray-900 text-sm bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition-all"
                                    placeholder="Misal: Sewa Excavator">
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-600 uppercase tracking-wider mb-2">
                            Pesan <span class="text-red-500">*</span>
                        </label>
                        <textarea name="message" rows="6" required
                            class="w-full border @error('message') border-red-400 ring-2 ring-red-100 @else border-gray-200 @enderror rounded-xl px-4 py-3 text-gray-900 text-sm bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition-all resize-none"
                            placeholder="Ceritakan kebutuhan proyek Anda secara detail — jenis alat, lokasi proyek, durasi sewa, dll.">{{ old('message') }}</textarea>
                    </div>

                    {{-- Submit --}}
                    <button type="submit"
                        class="w-full bg-yellow-500 hover:bg-yellow-400 text-black font-black py-4 rounded-xl text-base transition-all duration-200 flex items-center justify-center gap-3 shadow-lg hover:shadow-yellow-300/50 hover:-translate-y-0.5 transform">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                        Kirim Pesan
                    </button>
                </form>
            </div>

            {{-- Info sidebar --}}
            <div class="lg:col-span-2 space-y-5">
                <h2 class="font-display text-2xl font-bold text-gray-900 uppercase mb-6">Info Kontak</h2>
                <div class="space-y-4">
                    @foreach([
                        ['M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z','Alamat Kantor','Jl. Raya Industri No. 45, Cikarang Barat, Bekasi 17530, Jawa Barat'],
                        ['M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z','Telepon','(021) 8888-1234 | 0821-1234-5678 (WA)'],
                        ['M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z','Email','info@kontragtor.co.id'],
                        ['M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z','Jam Operasional','Senin–Jumat: 08.00–17.00 WIB | Sabtu: 08.00–13.00'],
                    ] as [$icon, $title, $val])
                    <div class="flex gap-4 p-4 bg-gray-50 rounded-2xl border border-gray-100 hover:border-yellow-300 hover:bg-yellow-50/30 transition-all">
                        <div class="w-11 h-11 bg-yellow-500 rounded-xl flex items-center justify-center shrink-0 shadow-sm">
                            <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"/></svg>
                        </div>
                        <div>
                            <div class="font-bold text-gray-800 text-sm mb-0.5">{{ $title }}</div>
                            <p class="text-gray-500 text-sm leading-relaxed">{{ $val }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <a href="https://wa.me/6282112341234" target="_blank"
                   class="w-full flex items-center justify-center gap-3 bg-green-500 hover:bg-green-400 text-white font-black py-4 rounded-xl text-base transition-all duration-200 shadow-lg hover:shadow-green-300/50 hover:-translate-y-0.5 transform">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    Chat via WhatsApp
                </a>

                {{-- Response time badge --}}
                <div class="bg-green-50 border border-green-200 rounded-2xl p-4 flex items-center gap-3">
                    <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse shrink-0"></div>
                    <p class="text-green-700 text-sm font-semibold">Rata-rata waktu respons kami: <strong>kurang dari 2 jam</strong> di hari kerja.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

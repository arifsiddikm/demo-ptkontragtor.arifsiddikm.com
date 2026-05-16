<footer class="bg-gray-900 text-gray-400">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
            {{-- Brand --}}
            <div class="md:col-span-2">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 bg-yellow-500 rounded-lg flex items-center justify-center font-display font-bold text-black">KI</div>
                    <div>
                        <div class="font-display font-bold text-white text-lg uppercase leading-none">PT KONTRAGTOR</div>
                        <div class="text-yellow-400 text-xs tracking-widest">INDONESIA TBK.</div>
                    </div>
                </div>
                <p class="text-sm leading-relaxed text-gray-500 max-w-xs">
                    Penyedia jasa sewa alat berat konstruksi terpercaya sejak 2005. Melayani proyek skala kecil hingga infrastruktur nasional di seluruh Indonesia.
                </p>
                <div class="flex gap-3 mt-5">
                    @foreach([
                        ['M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z'],
                        ['M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z'],
                    ] as $svg)
                    <a href="#" class="w-9 h-9 rounded-lg bg-gray-800 hover:bg-yellow-500 hover:text-black text-gray-400 flex items-center justify-center transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="{{ $svg[0] }}"/></svg>
                    </a>
                    @endforeach
                </div>
            </div>

            {{-- Links --}}
            <div>
                <h4 class="font-display font-bold text-white uppercase tracking-wide text-sm mb-4 border-b border-gray-800 pb-2">Navigasi</h4>
                <ul class="space-y-2 text-sm">
                    @foreach([['home','Beranda'],['about','Tentang Kami'],['equipment.index','Alat Berat'],['articles.index','Berita & Artikel'],['projects.index','Portofolio'],['careers.index','Karir'],['contact','Hubungi Kami']] as [$route, $label])
                    <li><a href="{{ route($route) }}" class="hover:text-yellow-400 transition-colors flex items-center gap-1.5">
                        <span class="w-1 h-1 bg-yellow-500 rounded-full"></span>{{ $label }}
                    </a></li>
                    @endforeach
                </ul>
            </div>

            {{-- Contact --}}
            <div>
                <h4 class="font-display font-bold text-white uppercase tracking-wide text-sm mb-4 border-b border-gray-800 pb-2">Kontak</h4>
                <ul class="space-y-3 text-sm">
                    <li class="flex gap-2.5"><svg class="w-4 h-4 text-yellow-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg><span>Jl. Raya Industri No. 45, Cikarang Barat, Bekasi 17530</span></li>
                    <li class="flex gap-2.5"><svg class="w-4 h-4 text-yellow-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg><span>(021) 8888-1234</span></li>
                    <li class="flex gap-2.5"><svg class="w-4 h-4 text-yellow-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg><span>info@kontragtor.co.id</span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-gray-600">
            <span>&copy; {{ date('Y') }} PT Kontragtor Indonesia Tbk. All rights reserved.</span>
            <a href="{{ route('admin.login') }}" class="hover:text-gray-400 transition-colors">Admin Panel</a>
        </div>
    </div>
</footer>

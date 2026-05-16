<header class="bg-yellow-500 sticky top-0 z-50 shadow-md" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div class="w-9 h-9 bg-black rounded-lg flex items-center justify-center font-display font-bold text-yellow-400 text-sm group-hover:bg-gray-900 transition-colors">KI</div>
                <div class="leading-tight">
                    <div class="font-display font-bold text-black text-base uppercase tracking-wide leading-none">PT KONTRAGTOR</div>
                    <div class="text-black/60 text-xs font-semibold leading-none tracking-widest">INDONESIA TBK.</div>
                </div>
            </a>

            {{-- Desktop nav --}}
            <nav class="hidden md:flex items-center gap-1">
                <a href="{{ route('home') }}" class="nav-link px-3 py-2 rounded-lg hover:bg-yellow-600/30 {{ request()->routeIs('home') ? 'bg-yellow-600/20 text-black' : 'text-black/80' }}">Beranda</a>
                <a href="{{ route('about') }}" class="nav-link px-3 py-2 rounded-lg hover:bg-yellow-600/30 {{ request()->routeIs('about') ? 'bg-yellow-600/20 text-black' : 'text-black/80' }}">Tentang Kami</a>
                <a href="{{ route('equipment.index') }}" class="nav-link px-3 py-2 rounded-lg hover:bg-yellow-600/30 {{ request()->routeIs('equipment*') ? 'bg-yellow-600/20 text-black' : 'text-black/80' }}">Alat Berat</a>
                <a href="{{ route('articles.index') }}" class="nav-link px-3 py-2 rounded-lg hover:bg-yellow-600/30 {{ request()->routeIs('articles*') ? 'bg-yellow-600/20 text-black' : 'text-black/80' }}">Berita</a>
                <a href="{{ route('projects.index') }}" class="nav-link px-3 py-2 rounded-lg hover:bg-yellow-600/30 {{ request()->routeIs('projects*') ? 'bg-yellow-600/20 text-black' : 'text-black/80' }}">Portofolio</a>
                <a href="{{ route('careers.index') }}" class="nav-link px-3 py-2 rounded-lg hover:bg-yellow-600/30 {{ request()->routeIs('careers*') ? 'bg-yellow-600/20 text-black' : 'text-black/80' }}">Karir</a>
                <a href="{{ route('contact') }}" class="ml-2 bg-black hover:bg-gray-900 text-yellow-400 font-bold px-5 py-2.5 rounded-lg text-sm flex items-center gap-2 transition-all duration-200 shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    Hubungi Kami
                </a>
                <a href="{{ route('admin.login') }}" class="ml-1 bg-yellow-600/20 hover:bg-yellow-600/30 text-black/70 hover:text-black font-semibold px-3 py-2.5 rounded-lg text-xs flex items-center gap-1.5 transition-all duration-200 border border-yellow-600/20">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Admin
                </a>
            </nav>

            {{-- Mobile toggle --}}
            <button @click="open = !open" class="md:hidden text-black p-2 rounded-lg hover:bg-yellow-600/30 transition-colors">
                <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                <svg x-show="open" style="display:none" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        {{-- Mobile menu --}}
        <div x-show="open" x-transition class="md:hidden border-t border-yellow-600/30 py-4 space-y-1">
            <a href="{{ route('home') }}" class="block text-black/80 hover:text-black font-semibold px-3 py-2.5 rounded-lg hover:bg-yellow-600/20">Beranda</a>
            <a href="{{ route('about') }}" class="block text-black/80 hover:text-black font-semibold px-3 py-2.5 rounded-lg hover:bg-yellow-600/20">Tentang Kami</a>
            <a href="{{ route('equipment.index') }}" class="block text-black/80 hover:text-black font-semibold px-3 py-2.5 rounded-lg hover:bg-yellow-600/20">Alat Berat</a>
            <a href="{{ route('articles.index') }}" class="block text-black/80 hover:text-black font-semibold px-3 py-2.5 rounded-lg hover:bg-yellow-600/20">Berita</a>
            <a href="{{ route('projects.index') }}" class="block text-black/80 hover:text-black font-semibold px-3 py-2.5 rounded-lg hover:bg-yellow-600/20">Portofolio</a>
            <a href="{{ route('careers.index') }}" class="block text-black/80 hover:text-black font-semibold px-3 py-2.5 rounded-lg hover:bg-yellow-600/20">Karir</a>
            <a href="{{ route('contact') }}" class="block mt-3 bg-black text-yellow-400 font-bold px-4 py-3 rounded-lg text-center">Hubungi Kami</a>
            <a href="{{ route('admin.login') }}" class="block mt-2 bg-yellow-600/10 border border-yellow-600/20 text-black/60 font-semibold px-4 py-2.5 rounded-lg text-center text-sm flex items-center justify-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                Login Admin
            </a>
        </div>
    </div>
</header>

<!DOCTYPE html>
<html lang="id">
<head>
    {{-- PWA --}}
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <meta name="theme-color" content="#000000"> {{-- samain sama theme_color di manifest --}}
    <link rel="apple-touch-icon" href="{{ asset('images/favicon.svg') }}">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') | Admin Kontragtor</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/favicon.svg') }}">
    <link rel="alternate icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/favicon.svg') }}">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800&family=Barlow+Condensed:wght@600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Barlow','sans-serif'], display: ['Barlow Condensed','sans-serif'] },
                }
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @stack('styles')
    <style>
        * { font-family: 'Barlow', sans-serif; }
        body { background: #f8f9fa; }
        .sidebar { background: #fff; border-right: 1px solid #f0f0f0; }
        .sidebar-link {
            display: flex; align-items: center; gap: 10px;
            padding: 9px 14px; border-radius: 10px;
            color: #6b7280; font-size: 13px; font-weight: 600;
            transition: all .15s ease; cursor: pointer;
        }
        .sidebar-link:hover { background: #fef3c7; color: #92400e; }
        .sidebar-link.active { background: #F59E0B; color: #000; font-weight: 700; }
        .sidebar-link.active svg { color: #000; }
        .sidebar-link svg { width: 16px; height: 16px; flex-shrink: 0; }
        .admin-card { background: #fff; border: 1px solid #f0f0f0; border-radius: 14px; padding: 20px; }
        .btn-sm { font-size: 11px; font-weight: 700; padding: 5px 12px; border-radius: 7px; transition: all .15s; display: inline-flex; align-items: center; gap: 4px; }
        .topbar { background: #fff; border-bottom: 1px solid #f0f0f0; }
        .badge-count { background: #F59E0B; color: #000; font-size: 10px; font-weight: 800; padding: 1px 6px; border-radius: 999px; min-width: 18px; text-align: center; }
    </style>
</head>
<body class="text-gray-800">

<div class="flex min-h-screen" x-data="{ sidebarOpen: true }">

    {{-- Sidebar --}}
    <aside class="sidebar w-60 flex flex-col fixed h-full z-30 transition-transform duration-200"
           :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">

        {{-- Logo --}}
        <div class="px-5 py-5 border-b border-gray-100">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                <div class="w-9 h-9 bg-yellow-500 rounded-xl flex items-center justify-center font-display font-black text-black text-sm shadow-sm">KI</div>
                <div>
                    <div class="font-display font-black text-gray-900 text-sm uppercase leading-none tracking-wide">KONTRAGTOR</div>
                    <div class="text-xs text-yellow-600 font-semibold">Admin Panel</div>
                </div>
            </a>
        </div>

        {{-- Nav --}}
        <nav class="flex-1 p-3 space-y-1 overflow-y-auto">
            <div class="text-xs text-gray-400 uppercase tracking-widest px-3 py-2 font-bold">Menu</div>

            <a href="{{ route('admin.dashboard') }}"
               class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                Dashboard
            </a>

            <a href="{{ route('admin.equipment.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.equipment*') ? 'active' : '' }}">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                Alat Berat
            </a>

            <a href="{{ route('admin.articles.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.articles*') ? 'active' : '' }}">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                Artikel
            </a>

            <a href="{{ route('admin.projects.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.projects*') ? 'active' : '' }}">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                Portofolio
            </a>

            <a href="{{ route('admin.careers.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.careers*') ? 'active' : '' }}">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                Karir
            </a>

            <a href="{{ route('admin.messages.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.messages*') ? 'active' : '' }}">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                Pesan Masuk
            </a>

            <div class="pt-3 mt-3 border-t border-gray-100">
                <div class="text-xs text-gray-400 uppercase tracking-widest px-3 py-2 font-bold">Website</div>
                <a href="{{ route('home') }}" target="_blank" class="sidebar-link">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    Lihat Website
                </a>
            </div>
        </nav>

        {{-- User & Logout --}}
        <div class="p-3 border-t border-gray-100">
            <div class="flex items-center gap-3 px-3 py-2 mb-2">
                <div class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center text-black font-black text-xs shadow-sm">
                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <div class="text-sm font-bold text-gray-900 truncate">{{ auth()->user()->name ?? 'Admin' }}</div>
                    <div class="text-xs text-gray-400">Administrator</div>
                </div>
            </div>
            {{-- Logout with SweetAlert --}}
            <form method="POST" action="{{ route('admin.logout') }}" id="logoutForm">
                @csrf
                <button type="button" onclick="confirmLogout()"
                    class="sidebar-link w-full text-red-500 hover:bg-red-50 hover:text-red-600">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    Logout
                </button>
            </form>
        </div>
    </aside>

    {{-- Main --}}
    <div class="flex-1 ml-60">
        {{-- Topbar --}}
        <header class="topbar px-6 py-4 flex items-center justify-between sticky top-0 z-20">
            <div class="flex items-center gap-4">
                <button @click="sidebarOpen = !sidebarOpen" class="p-2 rounded-lg hover:bg-gray-100 text-gray-500 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
                <div>
                    <h1 class="font-display text-xl font-black text-gray-900 uppercase tracking-wide leading-none">@yield('page_title', 'Dashboard')</h1>
                    @hasSection('breadcrumb')
                    <div class="text-xs text-gray-400 mt-0.5">@yield('breadcrumb')</div>
                    @endif
                </div>
            </div>
            <div class="flex items-center gap-3">
                @yield('header_actions')
            </div>
        </header>

        {{-- Content --}}
        <main class="p-6">
            @yield('content')
        </main>
    </div>
</div>

{{-- Flash SweetAlert --}}
@if(session('success'))
<script>
document.addEventListener('DOMContentLoaded', () => {
    Swal.fire({ icon:'success', title:'Berhasil!', text:@json(session('success')), confirmButtonColor:'#F59E0B', timer:4000, timerProgressBar:true });
});
</script>
@endif
@if(session('error'))
<script>
document.addEventListener('DOMContentLoaded', () => {
    Swal.fire({ icon:'error', title:'Error!', text:@json(session('error')), confirmButtonColor:'#F59E0B' });
});
</script>
@endif

<script>
function confirmLogout() {
    Swal.fire({
        title: 'Konfirmasi Logout',
        text: 'Apakah Anda yakin ingin keluar dari panel admin?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#ef4444',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Ya, Logout',
        cancelButtonText: 'Batal',
    }).then(result => {
        if (result.isConfirmed) {
            document.getElementById('logoutForm').submit();
        }
    });
}
</script>

@stack('scripts')

{{-- PWA Service Worker --}}
<script>
  if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('/sw.js')
      .then(reg => console.log('SW registered:', reg.scope))
      .catch(err => console.error('SW error:', err));
  }
</script>

</body>
</html>

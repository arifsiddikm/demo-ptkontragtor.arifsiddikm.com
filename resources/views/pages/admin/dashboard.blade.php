@extends('layouts.admin')
@section('title','Dashboard')
@section('page_title','Dashboard')

@section('content')

{{-- Stats --}}
<div class="grid grid-cols-2 lg:grid-cols-4 xl:grid-cols-7 gap-4 mb-6">
    @php
    $cards = [
        ['Alat Berat', $stats['equipment'], 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z', 'bg-yellow-50 text-yellow-600'],
        ['Tersedia', $stats['available'], 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z', 'bg-green-50 text-green-600'],
        ['Artikel', $stats['articles'], 'M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z', 'bg-blue-50 text-blue-600'],
        ['Proyek', $stats['projects'], 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4', 'bg-indigo-50 text-indigo-600'],
        ['Lowongan', $stats['careers'], 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', 'bg-purple-50 text-purple-600'],
        ['Total Pesan', $stats['messages'], 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', 'bg-yellow-50 text-yellow-600'],
        ['Belum Dibaca', $stats['unread'], 'M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9', 'bg-red-50 text-red-500'],
    ];
    @endphp
    @foreach($cards as [$label, $value, $icon, $color])
    <div class="admin-card flex items-center gap-3">
        <div class="w-10 h-10 rounded-xl {{ $color }} flex items-center justify-center shrink-0 {{ strpos($color,'yellow') !== false ? 'bg-yellow-100' : '' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"/></svg>
        </div>
        <div>
            <div class="text-2xl font-display font-black text-gray-900">{{ $value }}</div>
            <div class="text-xs text-gray-400 font-semibold">{{ $label }}</div>
        </div>
    </div>
    @endforeach
</div>

<div class="grid lg:grid-cols-2 gap-5">
    {{-- Recent Messages --}}
    <div class="admin-card">
        <div class="flex items-center justify-between mb-4">
            <h3 class="font-display font-black text-gray-800 uppercase text-sm tracking-wide">Pesan Terbaru</h3>
            <a href="{{ route('admin.messages.index') }}" class="text-yellow-600 text-xs font-bold hover:underline">Lihat Semua →</a>
        </div>
        @forelse($recentMessages as $msg)
        <div class="flex items-start gap-3 py-3 border-b border-gray-50 last:border-0">
            <div class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center text-yellow-700 font-black text-xs shrink-0">{{ strtoupper(substr($msg->name,0,1)) }}</div>
            <div class="flex-1 min-w-0">
                <div class="flex items-center gap-1.5">
                    <span class="text-sm font-bold text-gray-800 truncate">{{ $msg->name }}</span>
                    @if(!$msg->is_read)<span class="w-1.5 h-1.5 bg-yellow-500 rounded-full shrink-0"></span>@endif
                </div>
                <p class="text-xs text-gray-400 truncate mt-0.5">{{ $msg->message }}</p>
            </div>
            <a href="{{ route('admin.messages.show', $msg->id) }}" class="btn-sm bg-gray-100 text-gray-600 hover:bg-yellow-500 hover:text-black shrink-0">Baca</a>
        </div>
        @empty
        <p class="text-gray-400 text-sm py-4 text-center">Belum ada pesan.</p>
        @endforelse
    </div>

    {{-- Recent Articles --}}
    <div class="admin-card">
        <div class="flex items-center justify-between mb-4">
            <h3 class="font-display font-black text-gray-800 uppercase text-sm tracking-wide">Artikel Terbaru</h3>
            <a href="{{ route('admin.articles.index') }}" class="text-yellow-600 text-xs font-bold hover:underline">Lihat Semua →</a>
        </div>
        @forelse($recentArticles as $art)
        <div class="flex items-center gap-3 py-3 border-b border-gray-50 last:border-0">
            <div class="flex-1 min-w-0">
                <div class="text-sm font-semibold text-gray-800 truncate">{{ $art->title }}</div>
                <div class="text-xs text-gray-400 mt-0.5">{{ $art->published_at?->format('d M Y') }} · {{ $art->author }}</div>
            </div>
            <span class="btn-sm {{ $art->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">{{ $art->is_active ? 'Publik' : 'Draft' }}</span>
        </div>
        @empty
        <p class="text-gray-400 text-sm py-4 text-center">Belum ada artikel.</p>
        @endforelse
    </div>
</div>

{{-- Quick actions --}}
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-5">
    @foreach([
        [route('admin.equipment.create'),'M12 4v16m8-8H4','Tambah Alat Berat'],
        [route('admin.articles.create'),'M12 4v16m8-8H4','Tambah Artikel'],
        [route('admin.careers.create'),'M12 4v16m8-8H4','Tambah Lowongan'],
        [route('admin.messages.index'),'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z','Kotak Masuk'],
    ] as [$href, $icon, $label])
    <a href="{{ $href }}" class="admin-card hover:border-yellow-400 hover:shadow-md transition-all flex items-center gap-3 group cursor-pointer">
        <div class="w-9 h-9 bg-yellow-100 rounded-xl flex items-center justify-center group-hover:bg-yellow-500 transition-colors shrink-0">
            <svg class="w-4 h-4 text-yellow-600 group-hover:text-black transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"/></svg>
        </div>
        <span class="text-sm font-semibold text-gray-700 group-hover:text-gray-900">{{ $label }}</span>
    </a>
    @endforeach
</div>
@endsection

@extends('layouts.app')
@section('title', 'Alat Berat')
@section('meta_description', 'Jelajahi armada lengkap alat berat PT Kontragtor Indonesia — Excavator, Bulldozer, Crane, Grader, Compactor dan lebih banyak lagi.')

@section('content')

<section class="bg-yellow-500 py-16 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background: repeating-linear-gradient(-45deg,#000 0,#000 1px,transparent 0,transparent 16px);"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-black/50 text-sm font-bold uppercase tracking-widest mb-4">Armada Kami</div>
        <h1 class="font-display text-5xl font-black text-black uppercase">Alat Berat <span class="text-white">Konstruksi</span></h1>
    </div>
</section>

<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Search & Filter --}}
                <form method="GET" action="{{ route('equipment.index') }}" class="mb-10">
            <div class="bg-gray-50 border border-gray-200 rounded-2xl p-5 flex flex-wrap gap-3 items-end shadow-sm">
                <div class="flex-1 min-w-[200px]">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Cari Alat</label>
                    <div class="relative">
                        <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Nama alat berat..."
                            class="w-full bg-white border border-gray-200 rounded-xl pl-10 pr-4 py-3 text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition-all">
                    </div>
                </div>
                <div class="min-w-[180px]">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Kategori</label>
                    <div class="relative">
                        <select name="category" class="w-full appearance-none bg-white border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition-all pr-10 cursor-pointer">
                            <option value="">Semua Kategori</option>
                            @foreach($categories as $cat)
                            <option value="{{ $cat }}" {{ request('category') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                            @endforeach
                        </select>
                        <svg class="absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </div>
                </div>
                <div class="min-w-[160px]">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Status</label>
                    <div class="relative">
                        <select name="status" class="w-full appearance-none bg-white border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition-all pr-10 cursor-pointer">
                            <option value="">Semua Status</option>
                            <option value="available"   {{ request('status') === 'available'   ? 'selected' : '' }}>✓ Tersedia</option>
                            <option value="unavailable" {{ request('status') === 'unavailable' ? 'selected' : '' }}>✗ Tidak Tersedia</option>
                        </select>
                        <svg class="absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </div>
                </div>
                <div class="flex gap-2">
                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold px-5 py-3 rounded-xl text-sm transition-all flex items-center gap-2 shadow-sm hover:shadow-yellow-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        Cari
                    </button>
                    @if(request()->hasAny(['search','category','status']))
                    <a href="{{ route('equipment.index') }}" class="bg-white border border-gray-200 hover:border-gray-300 hover:bg-gray-50 text-gray-600 font-semibold px-5 py-3 rounded-xl text-sm transition-all flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        Reset
                    </a>
                    @endif
                </div>
            </div>
        </form>

        {{-- Results count --}}
        @if($equipment->total())
        <div class="text-sm text-gray-500 mb-6">
            Menampilkan <strong class="text-gray-800">{{ $equipment->total() }}</strong> alat berat
            {{ request('search') ? 'untuk "'.request('search').'"' : '' }}
        </div>
        @endif

        {{-- Grid --}}
        @if($equipment->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($equipment as $eq)
            <a href="{{ route('equipment.show', $eq->slug) }}" class="group eq-card bg-white border border-gray-100 rounded-2xl overflow-hidden hover:border-yellow-400 hover:shadow-2xl transition-all duration-300 hover:-translate-y-1">
                <div class="aspect-video bg-gray-100 overflow-hidden relative">
                    <img src="{{ $eq->image_url }}" alt="{{ $eq->name }}" class="eq-img w-full h-full object-cover" onerror="this.src='https://placehold.co/600x400/fef3c7/d97706?text={{ urlencode($eq->name) }}'">
                    <div class="absolute top-3 left-3 flex gap-2 flex-wrap">
                        @if($eq->isAvailable())
                        <span class="badge-available">✓ Tersedia</span>
                        @else
                        <span class="badge-unavailable">✗ Tidak Tersedia</span>
                        @endif
                    </div>
                    @if($eq->is_featured)
                    <div class="absolute top-3 right-3"><span class="bg-yellow-500 text-black text-xs font-bold px-2.5 py-1 rounded-full">⭐ Unggulan</span></div>
                    @endif
                </div>
                <div class="p-5">
                    <div class="text-yellow-600 text-xs font-bold uppercase tracking-widest mb-1">{{ $eq->category }}</div>
                    <h3 class="font-display font-bold text-gray-900 text-xl uppercase leading-tight group-hover:text-yellow-600 transition-colors">{{ $eq->name }}</h3>
                    <p class="text-gray-500 text-sm mt-2 line-clamp-2">{{ $eq->description }}</p>
                    <div class="flex items-center gap-1 mt-4 text-yellow-600 text-sm font-bold">
                        Lihat Spesifikasi
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        <div class="mt-10">{{ $equipment->withQueryString()->links() }}</div>
        @else
        <div class="text-center py-24">
            <svg class="w-16 h-16 mx-auto text-gray-200 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <h3 class="font-display text-xl font-bold text-gray-400 uppercase">Tidak Ada Hasil</h3>
            <p class="text-gray-400 text-sm mt-2">Tidak ditemukan alat berat dengan kriteria tersebut.</p>
            <a href="{{ route('equipment.index') }}" class="inline-block mt-5 btn-primary text-sm">Reset Filter</a>
        </div>
        @endif
    </div>
</section>
@endsection

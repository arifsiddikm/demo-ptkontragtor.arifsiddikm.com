@extends('layouts.admin')
@section('title','Detail Pesan')
@section('page_title','Detail Pesan')
@section('breadcrumb')
    <a href="{{ route('admin.messages.index') }}" class="hover:text-yellow-600">Pesan Masuk</a> / Detail
@endsection

@section('content')
<div class="max-w-2xl">
    <div class="admin-card space-y-5">
        {{-- Header info --}}
        <div class="grid sm:grid-cols-2 gap-5 pb-5 border-b border-gray-100">
            <div>
                <div class="text-xs text-gray-400 font-bold uppercase tracking-wider mb-1">Dari</div>
                <div class="font-bold text-gray-900">{{ $message->name }}</div>
                <a href="mailto:{{ $message->email }}" class="text-yellow-600 text-sm hover:underline">{{ $message->email }}</a>
            </div>
            @if($message->phone)
            <div>
                <div class="text-xs text-gray-400 font-bold uppercase tracking-wider mb-1">Telepon</div>
                <div class="text-gray-800">{{ $message->phone }}</div>
            </div>
            @endif
            @if($message->subject)
            <div>
                <div class="text-xs text-gray-400 font-bold uppercase tracking-wider mb-1">Subjek</div>
                <div class="text-gray-800">{{ $message->subject }}</div>
            </div>
            @endif
            <div>
                <div class="text-xs text-gray-400 font-bold uppercase tracking-wider mb-1">Diterima</div>
                <div class="text-gray-800">{{ $message->created_at->format('d M Y, H:i') }} WIB</div>
            </div>
        </div>

        {{-- Message --}}
        <div>
            <div class="text-xs text-gray-400 font-bold uppercase tracking-wider mb-2">Isi Pesan</div>
            <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-5 text-gray-700 leading-relaxed whitespace-pre-wrap text-sm">{{ $message->message }}</div>
        </div>

        {{-- Actions --}}
        <div class="flex flex-wrap gap-3 pt-2">
            <a href="mailto:{{ $message->email }}?subject=Re: {{ $message->subject ?? 'Pesan dari Website' }}"
               class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold px-5 py-2.5 rounded-xl text-sm flex items-center gap-2 transition-colors shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                Balas via Email
            </a>
            <a href="{{ route('admin.messages.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold px-5 py-2.5 rounded-xl text-sm transition-colors">
                ← Kembali
            </a>
            <button onclick="confirmDelete('{{ route('admin.messages.destroy', $message->id) }}')"
                class="ml-auto bg-gray-100 hover:bg-red-500 text-red-500 hover:text-white font-semibold px-5 py-2.5 rounded-xl text-sm transition-colors">
                🗑 Hapus
            </button>
        </div>
    </div>
</div>
<form id="deleteForm" method="POST" class="hidden">@csrf @method('DELETE')</form>
@endsection

@push('scripts')
<script>
function confirmDelete(url) {
    Swal.fire({
        title: 'Hapus Pesan?',
        text: 'Data yang dihapus tidak dapat dikembalikan.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#ef4444',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal',
    }).then(r => {
        if (r.isConfirmed) {
            document.getElementById('deleteForm').action = url;
            document.getElementById('deleteForm').submit();
        }
    });
}
</script>
@endpush

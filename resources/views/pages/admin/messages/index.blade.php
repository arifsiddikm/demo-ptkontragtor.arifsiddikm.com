@extends('layouts.admin')
@section('title','Pesan Masuk')
@section('page_title','Kotak Masuk Pesan')

@section('content')
<div class="admin-card overflow-hidden p-0">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider border-b border-gray-100">
                <tr>
                    <th class="px-5 py-3.5 text-left font-bold">Pengirim</th>
                    <th class="px-5 py-3.5 text-left font-bold">Subjek</th>
                    <th class="px-5 py-3.5 text-left font-bold">Pesan</th>
                    <th class="px-5 py-3.5 text-left font-bold">Waktu</th>
                    <th class="px-5 py-3.5 text-right font-bold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($messages as $msg)
                <tr class="{{ !$msg->is_read ? 'bg-yellow-50/60' : '' }} hover:bg-yellow-50/40 transition-colors">
                    <td class="px-5 py-4">
                        <div class="flex items-center gap-2.5">
                            @if(!$msg->is_read)
                            <span class="w-2 h-2 bg-yellow-500 rounded-full shrink-0 shadow-sm" title="Belum dibaca"></span>
                            @else
                            <span class="w-2 h-2 bg-gray-200 rounded-full shrink-0"></span>
                            @endif
                            <div>
                                <div class="font-{{ !$msg->is_read ? 'bold' : 'semibold' }} text-gray-800">{{ $msg->name }}</div>
                                <div class="text-gray-400 text-xs">{{ $msg->email }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-4 text-gray-500 text-xs max-w-[140px] truncate">{{ $msg->subject ?? '—' }}</td>
                    <td class="px-5 py-4 text-gray-400 text-xs max-w-xs truncate">{{ $msg->message }}</td>
                    <td class="px-5 py-4 text-gray-400 text-xs whitespace-nowrap">{{ $msg->created_at->diffForHumans() }}</td>
                    <td class="px-5 py-4">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.messages.show', $msg->id) }}" class="btn-sm bg-gray-100 text-gray-700 hover:bg-yellow-500 hover:text-black transition-colors">Baca</a>
                            <button onclick="confirmDelete('{{ route('admin.messages.destroy', $msg->id) }}')" class="btn-sm bg-gray-100 text-red-500 hover:bg-red-500 hover:text-white transition-colors">Hapus</button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-5 py-16 text-center">
                        <svg class="w-12 h-12 mx-auto text-gray-200 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <p class="text-gray-400 font-medium">Belum ada pesan masuk.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($messages->hasPages())
    <div class="px-5 py-4 border-t border-gray-50">{{ $messages->links() }}</div>
    @endif
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
    }).then(r => { if (r.isConfirmed) { document.getElementById('deleteForm').action = url; document.getElementById('deleteForm').submit(); }});
}
</script>
@endpush

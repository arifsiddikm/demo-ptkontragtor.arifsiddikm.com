@extends('layouts.admin')
@section('title','Karir')
@section('page_title','Manajemen Lowongan Karir')
@section('header_actions')
<a href="{{ route('admin.careers.create') }}" class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold px-4 py-2.5 rounded-xl text-sm flex items-center gap-2 transition-colors shadow-sm">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg> Tambah Lowongan
</a>
@endsection

@section('content')
<div class="admin-card overflow-hidden p-0">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider border-b border-gray-100">
                <tr>
                    <th class="px-5 py-3.5 text-left font-bold">Posisi</th>
                    <th class="px-5 py-3.5 text-left font-bold">Departemen</th>
                    <th class="px-5 py-3.5 text-left font-bold">Tipe</th>
                    <th class="px-5 py-3.5 text-left font-bold">Deadline</th>
                    <th class="px-5 py-3.5 text-left font-bold">Status</th>
                    <th class="px-5 py-3.5 text-right font-bold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($careers as $career)
                <tr class="hover:bg-yellow-50/30 transition-colors">
                    <td class="px-5 py-4">
                        <div class="font-semibold text-gray-800">{{ $career->title }}</div>
                        <div class="text-gray-400 text-xs mt-0.5 flex items-center gap-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                            {{ $career->location }}
                        </div>
                    </td>
                    <td class="px-5 py-4 text-gray-500 text-xs">{{ $career->department }}</td>
                    <td class="px-5 py-4">
                        <span class="bg-yellow-100 text-yellow-700 text-xs font-bold px-2.5 py-1 rounded-lg">{{ $career->type_label }}</span>
                    </td>
                    <td class="px-5 py-4 text-gray-400 text-xs">
                        @if($career->deadline)
                            <span class="{{ $career->deadline->isPast() ? 'text-red-500 font-semibold' : 'text-gray-500' }}">
                                {{ $career->deadline->format('d M Y') }}
                                @if($career->deadline->isPast()) <span class="text-red-400">(Expired)</span>@endif
                            </span>
                        @else —
                        @endif
                    </td>
                    <td class="px-5 py-4">
                        <form method="POST" action="{{ route('admin.careers.toggle', $career->id) }}" class="inline">
                            @csrf @method('PATCH')
                            <button class="btn-sm {{ $career->is_active ? 'bg-green-100 text-green-700 hover:bg-green-200' : 'bg-gray-100 text-gray-500 hover:bg-gray-200' }} transition-colors">
                                {{ $career->is_active ? 'Aktif' : 'Nonaktif' }}
                            </button>
                        </form>
                    </td>
                    <td class="px-5 py-4">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.careers.edit', $career->id) }}" class="btn-sm bg-gray-100 text-gray-700 hover:bg-yellow-500 hover:text-black transition-colors">Edit</a>
                            <button onclick="confirmDelete('{{ route('admin.careers.destroy', $career->id) }}')" class="btn-sm bg-gray-100 text-red-500 hover:bg-red-500 hover:text-white transition-colors">Hapus</button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-5 py-14 text-center">
                        <div class="text-gray-300 text-4xl mb-3">💼</div>
                        <p class="text-gray-400 font-medium">Belum ada lowongan.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($careers->hasPages())
    <div class="px-5 py-4 border-t border-gray-50">{{ $careers->links() }}</div>
    @endif
</div>
<form id="deleteForm" method="POST" class="hidden">@csrf @method('DELETE')</form>
@endsection

@push('scripts')
<script>
function confirmDelete(url) {
    Swal.fire({
        title: 'Hapus Lowongan?',
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

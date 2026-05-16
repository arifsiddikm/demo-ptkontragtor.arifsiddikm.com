@extends('layouts.admin')
@section('title','Artikel')
@section('page_title','Manajemen Artikel')
@section('header_actions')
<a href="{{ route('admin.articles.create') }}" class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold px-4 py-2.5 rounded-xl text-sm flex items-center gap-2 transition-colors shadow-sm">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg> Tambah Artikel
</a>
@endsection

@section('content')
<div class="admin-card overflow-hidden p-0">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider border-b border-gray-100">
                <tr>
                    <th class="px-5 py-3.5 text-left font-bold">Judul</th>
                    <th class="px-5 py-3.5 text-left font-bold">Penulis</th>
                    <th class="px-5 py-3.5 text-left font-bold">Tanggal</th>
                    <th class="px-5 py-3.5 text-left font-bold">Status</th>
                    <th class="px-5 py-3.5 text-right font-bold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($articles as $article)
                <tr class="hover:bg-yellow-50/30 transition-colors">
                    <td class="px-5 py-4">
                        <div class="flex items-center gap-3">
                            @if($article->image)
                                <img src="{{ asset('storage/'.$article->image) }}" class="w-10 h-10 rounded-lg object-cover border border-gray-100" onerror="this.style.display='none'">
                            @else
                                <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center text-yellow-600 text-xs font-bold">ART</div>
                            @endif
                            <span class="font-semibold text-gray-800 line-clamp-1">{{ $article->title }}</span>
                        </div>
                    </td>
                    <td class="px-5 py-4 text-gray-500 text-xs">{{ $article->author }}</td>
                    <td class="px-5 py-4 text-gray-500 text-xs">{{ $article->published_at?->format('d M Y') ?? '—' }}</td>
                    <td class="px-5 py-4">
                        <form method="POST" action="{{ route('admin.articles.toggle', $article->id) }}" class="inline">
                            @csrf @method('PATCH')
                            <button class="btn-sm {{ $article->is_active ? 'bg-green-100 text-green-700 hover:bg-green-200' : 'bg-gray-100 text-gray-500 hover:bg-gray-200' }} transition-colors">
                                {{ $article->is_active ? 'Publik' : 'Draft' }}
                            </button>
                        </form>
                    </td>
                    <td class="px-5 py-4">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('articles.show', $article->slug) }}" target="_blank" class="btn-sm bg-gray-100 text-gray-500 hover:bg-gray-200 transition-colors">↗</a>
                            <a href="{{ route('admin.articles.edit', $article->id) }}" class="btn-sm bg-gray-100 text-gray-700 hover:bg-yellow-500 hover:text-black transition-colors">Edit</a>
                            <button onclick="confirmDelete('{{ route('admin.articles.destroy', $article->id) }}')" class="btn-sm bg-gray-100 text-red-500 hover:bg-red-500 hover:text-white transition-colors">Hapus</button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-5 py-14 text-center">
                        <div class="text-gray-300 text-4xl mb-3">📰</div>
                        <p class="text-gray-400 font-medium">Belum ada artikel.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($articles->hasPages())
    <div class="px-5 py-4 border-t border-gray-50">{{ $articles->links() }}</div>
    @endif
</div>
<form id="deleteForm" method="POST" class="hidden">@csrf @method('DELETE')</form>
@endsection

@push('scripts')
<script>
function confirmDelete(url) {
    Swal.fire({
        title: 'Hapus Artikel?',
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

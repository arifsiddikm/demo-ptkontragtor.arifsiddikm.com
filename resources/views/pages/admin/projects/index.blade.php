@extends('layouts.admin')
@section('title','Portofolio Proyek')
@section('page_title','Portofolio Proyek')
@section('breadcrumb') Portofolio Proyek @endsection

@section('content')
<div class="flex items-center justify-between mb-5">
    <p class="text-sm text-gray-500">Total <strong class="text-gray-700">{{ $projects->total() }}</strong> proyek</p>
    <a href="{{ route('admin.projects.create') }}" class="bg-yellow-500 hover:bg-yellow-600 text-black font-black px-5 py-2.5 rounded-xl text-sm transition-colors flex items-center gap-2">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Tambah Proyek
    </a>
</div>

<div class="admin-card overflow-x-auto">
    <table class="w-full text-sm">
        <thead>
            <tr class="border-b border-gray-100">
                <th class="text-left text-xs font-bold text-gray-400 uppercase tracking-wider pb-3 pr-4">Proyek</th>
                <th class="text-left text-xs font-bold text-gray-400 uppercase tracking-wider pb-3 pr-4">Kategori</th>
                <th class="text-left text-xs font-bold text-gray-400 uppercase tracking-wider pb-3 pr-4">Klien</th>
                <th class="text-left text-xs font-bold text-gray-400 uppercase tracking-wider pb-3 pr-4">Tanggal</th>
                <th class="text-left text-xs font-bold text-gray-400 uppercase tracking-wider pb-3 pr-4">Status</th>
                <th class="pb-3"></th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($projects as $project)
            <tr class="hover:bg-gray-50 transition-colors">
                <td class="py-3 pr-4">
                    <div class="flex items-center gap-3">
                        <img src="{{ $project->image_url }}" alt="" class="w-12 h-9 rounded-lg object-cover border border-gray-100 shrink-0" onerror="this.src='https://placehold.co/80x60/fef3c7/d97706?text=P'">
                        <div>
                            <div class="font-semibold text-gray-900 line-clamp-1 max-w-[220px]">{{ $project->title }}</div>
                            @if($project->is_featured)<span class="text-xs text-yellow-600 font-bold">⭐ Unggulan</span>@endif
                        </div>
                    </div>
                </td>
                <td class="py-3 pr-4 text-gray-500">{{ $project->category ?? '—' }}</td>
                <td class="py-3 pr-4 text-gray-500">{{ $project->client ?? '—' }}</td>
                <td class="py-3 pr-4 text-gray-500">{{ $project->project_date?->format('d M Y') ?? '—' }}</td>
                <td class="py-3 pr-4">
                    @if($project->is_active)
                    <span class="bg-green-100 text-green-700 text-xs font-semibold px-2.5 py-1 rounded-full">Aktif</span>
                    @else
                    <span class="bg-gray-100 text-gray-500 text-xs font-semibold px-2.5 py-1 rounded-full">Nonaktif</span>
                    @endif
                </td>
                <td class="py-3">
                    <div class="flex items-center gap-2 justify-end">
                        <a href="{{ route('projects.show', $project->slug) }}" target="_blank" class="btn-sm bg-gray-100 text-gray-600 hover:bg-gray-200">Lihat</a>
                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn-sm bg-yellow-500 text-black hover:bg-yellow-600">Edit</a>
                        <form method="POST" action="{{ route('admin.projects.toggle', $project->id) }}" class="inline">
                            @csrf @method('PATCH')
                            <button type="submit" class="btn-sm {{ $project->is_active ? 'bg-gray-100 text-gray-600 hover:bg-gray-200' : 'bg-green-100 text-green-700 hover:bg-green-200' }}">
                                {{ $project->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                            </button>
                        </form>
                        <form method="POST" action="{{ route('admin.projects.destroy', $project->id) }}" class="inline" onsubmit="return confirm('Hapus proyek ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-sm bg-red-50 text-red-600 hover:bg-red-100">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="py-12 text-center text-gray-400">Belum ada data proyek.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-5">{{ $projects->links() }}</div>
@endsection

@extends('layouts.admin')
@section('title', $project ? 'Edit Proyek' : 'Tambah Proyek')
@section('page_title', $project ? 'Edit Proyek' : 'Tambah Proyek')
@section('breadcrumb')
    <a href="{{ route('admin.projects.index') }}" class="hover:text-yellow-600">Portofolio</a> / {{ $project ? 'Edit' : 'Tambah' }}
@endsection

@section('content')
<div class="max-w-4xl">
<form method="POST"
      action="{{ $project ? route('admin.projects.update', $project->id) : route('admin.projects.store') }}"
      enctype="multipart/form-data" class="space-y-5" id="project-form">
    @csrf
    @if($project) @method('PUT') @endif

    <div class="admin-card space-y-5">
        <h3 class="font-display font-black text-gray-800 uppercase text-sm tracking-wide border-b border-gray-100 pb-3">Informasi Proyek</h3>
        <div>
            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Judul Proyek <span class="text-red-500">*</span></label>
            <input type="text" name="title" value="{{ old('title', $project?->title) }}" required
                class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500 bg-white"
                placeholder="Misal: Pembangunan Jalan Tol Trans-Sumatera">
            @error('title')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Excerpt / Ringkasan Singkat</label>
            <textarea name="excerpt" rows="2"
                class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500 resize-none bg-white"
                placeholder="Ringkasan singkat yang muncul di halaman listing…">{{ old('excerpt', $project?->excerpt) }}</textarea>
        </div>
        <div class="grid sm:grid-cols-3 gap-5">
            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Kategori</label>
                <input type="text" name="category" value="{{ old('category', $project?->category) }}" list="project-cats"
                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500 bg-white"
                    placeholder="Infrastruktur, Pertambangan…">
                <datalist id="project-cats">
                    @foreach(['Infrastruktur','Pertambangan','Konstruksi Gedung','Jalan & Jembatan','Pelabuhan','Bandara','Perumahan','Pertanian','Energi'] as $c)
                    <option value="{{ $c }}">
                    @endforeach
                </datalist>
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Nama Klien</label>
                <input type="text" name="client" value="{{ old('client', $project?->client) }}"
                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500 bg-white"
                    placeholder="PT / Kementerian / Kontraktor">
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Lokasi</label>
                <input type="text" name="location" value="{{ old('location', $project?->location) }}"
                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500 bg-white"
                    placeholder="Kota, Provinsi">
            </div>
        </div>
        <div class="max-w-xs">
            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Tanggal Proyek</label>
            <input type="date" name="project_date" value="{{ old('project_date', $project?->project_date?->format('Y-m-d')) }}"
                class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500 bg-white">
        </div>
        <div class="flex gap-6">
            <label class="flex items-center gap-2.5 cursor-pointer">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $project?->is_active ?? true) ? 'checked' : '' }} class="accent-yellow-500 w-4 h-4">
                <span class="text-sm text-gray-700 font-medium">Aktif (tampil di website)</span>
            </label>
            <label class="flex items-center gap-2.5 cursor-pointer">
                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $project?->is_featured) ? 'checked' : '' }} class="accent-yellow-500 w-4 h-4">
                <span class="text-sm text-gray-700 font-medium">Proyek Unggulan ⭐</span>
            </label>
        </div>
    </div>

    {{-- Thumbnail --}}
    <div class="admin-card space-y-4">
        <h3 class="font-display font-black text-gray-800 uppercase text-sm tracking-wide border-b border-gray-100 pb-3">Gambar Thumbnail</h3>
        @if($project?->image)
        <div class="flex items-start gap-4 p-3 bg-gray-50 rounded-xl border border-gray-100">
            <img src="{{ $project->image_url }}" alt="" class="h-24 w-40 rounded-lg object-cover border border-gray-200 shrink-0">
            <div><p class="text-sm font-semibold text-gray-700 mb-1">Gambar saat ini</p><p class="text-xs text-gray-400">Upload file baru atau isi URL baru untuk mengganti.</p></div>
        </div>
        @endif
        <div x-data="{ tab: 'url' }" class="space-y-4">
            <div class="flex gap-2 bg-gray-100 p-1 rounded-xl w-fit">
                <button type="button" @click="tab='url'" :class="tab==='url' ? 'bg-white shadow text-gray-900 font-bold' : 'text-gray-500'" class="px-4 py-1.5 rounded-lg text-xs font-semibold transition-all">🔗 Link URL</button>
                <button type="button" @click="tab='file'" :class="tab==='file' ? 'bg-white shadow text-gray-900 font-bold' : 'text-gray-500'" class="px-4 py-1.5 rounded-lg text-xs font-semibold transition-all">📁 Upload File</button>
            </div>
            <div x-show="tab==='url'">
                <input type="url" name="image_url" value="{{ old('image_url', $project?->image && str_starts_with($project->image,'http') ? $project->image : '') }}"
                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500 bg-white"
                    placeholder="https://images.unsplash.com/photo-xxxx">
            </div>
            <div x-show="tab==='file'" style="display:none">
                <input type="file" name="image" accept="image/*"
                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-gray-500 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500 bg-white file:mr-3 file:py-1.5 file:px-4 file:rounded-lg file:border-0 file:bg-yellow-500 file:text-black file:text-xs file:font-bold cursor-pointer hover:file:bg-yellow-600 transition-colors">
                <p class="text-gray-400 text-xs mt-1.5">JPG, PNG, WebP — maks. 3MB. Rasio 16:9 disarankan.</p>
            </div>
        </div>
    </div>

    {{-- Konten Detail Proyek - CKEditor5 --}}
    <div class="admin-card space-y-3">
        <h3 class="font-display font-black text-gray-800 uppercase text-sm tracking-wide border-b border-gray-100 pb-3">Konten Detail Proyek <span class="text-red-500">*</span></h3>
        <p class="text-gray-400 text-xs">Tulis deskripsi lengkap proyek. Bisa menyertakan gambar (copas/drag langsung), tabel, heading, dll.</p>
        <textarea name="content" id="proj-content">{{ old('content', $project?->content) }}</textarea>
        @error('content')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    <div class="flex items-center gap-3">
        <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-black font-black px-7 py-2.5 rounded-xl text-sm transition-colors shadow-sm">
            {{ $project ? '💾 Simpan Perubahan' : '➕ Tambah Proyek' }}
        </button>
        <a href="{{ route('admin.projects.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold px-6 py-2.5 rounded-xl text-sm transition-colors">Batal</a>
    </div>
</form>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('vendor/ckeditor5/ckeditor5.css') }}">
<style>
.ck.ck-editor__editable_inline { min-height: 320px !important; font-size: 14px; line-height: 1.7; }
.ck.ck-toolbar { background: #f8f9fa !important; border-color: #e5e7eb !important; }
.ck.ck-editor__main > .ck-editor__editable { border-color: #e5e7eb !important; padding: 16px 20px !important; }
.ck.ck-editor__main > .ck-editor__editable.ck-focused { border-color: #f59e0b !important; box-shadow: 0 0 0 2px rgba(245,158,11,.15) !important; }
</style>
@endpush

@push('scripts')
<script src="{{ asset('vendor/ckeditor5/ckeditor5.umd.js') }}"></script>
<script>
(function () {
    const {
        ClassicEditor, Essentials, Autoformat, AutoImage,
        Bold, Italic, Underline, Strikethrough,
        BlockQuote, Base64UploadAdapter,
        Heading, Image, ImageCaption, ImageStyle, ImageToolbar, ImageUpload, ImageResize, PictureEditing,
        Indent, IndentBlock, Link, LinkImage,
        List, ListProperties, MediaEmbed, Paragraph, PasteFromOffice,
        Table, TableToolbar, TableCaption, TableProperties, TableCellProperties,
        Alignment, HorizontalLine, RemoveFormat,
    } = window.ckeditor5;

    ClassicEditor.create(document.querySelector('#proj-content'), {
        plugins: [
            Essentials, Autoformat, AutoImage, Bold, Italic, Underline, Strikethrough,
            BlockQuote, Base64UploadAdapter, Heading, Image, ImageCaption, ImageStyle,
            ImageToolbar, ImageUpload, ImageResize, PictureEditing, Indent, IndentBlock,
            Link, LinkImage, List, ListProperties, MediaEmbed, Paragraph, PasteFromOffice,
            Table, TableToolbar, TableCaption, TableProperties, TableCellProperties,
            Alignment, HorizontalLine, RemoveFormat,
        ],
        toolbar: {
            items: [
                'undo', 'redo', '|', 'heading', '|',
                'bold', 'italic', 'underline', 'strikethrough', '|',
                'link', 'bulletedList', 'numberedList', '|',
                'outdent', 'indent', '|', 'blockQuote', 'insertTable', '|',
                'uploadImage', 'mediaEmbed', '|', 'alignment', 'horizontalLine', 'removeFormat',
            ],
            shouldNotGroupWhenFull: true,
        },
        heading: { options: [
            { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
            { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
            { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
            { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
        ]},
        image: {
            toolbar: ['imageStyle:inline','imageStyle:block','imageStyle:side','|','toggleImageCaption','imageTextAlternative','|','resizeImage'],
            upload: { types: ['jpeg','png','gif','bmp','webp'] },
        },
        table: { contentToolbar: ['tableColumn','tableRow','mergeTableCells','tableProperties','tableCellProperties'] },
    }).catch(err => console.error('CKEditor5:', err));
})();
</script>
@endpush

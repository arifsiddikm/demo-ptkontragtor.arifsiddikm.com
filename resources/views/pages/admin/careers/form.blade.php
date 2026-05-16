@extends('layouts.admin')
@section('title', $career ? 'Edit Lowongan' : 'Tambah Lowongan')
@section('page_title', $career ? 'Edit Lowongan' : 'Tambah Lowongan')
@section('breadcrumb')
    <a href="{{ route('admin.careers.index') }}" class="hover:text-yellow-600">Karir</a> / {{ $career ? 'Edit' : 'Tambah' }}
@endsection

@section('content')
<div class="max-w-4xl">
<form method="POST"
      action="{{ $career ? route('admin.careers.update', $career->id) : route('admin.careers.store') }}"
      class="space-y-5" id="career-form">
    @csrf
    @if($career) @method('PUT') @endif

    <div class="admin-card space-y-5">
        <h3 class="font-display font-black text-gray-800 uppercase text-sm tracking-wide border-b border-gray-100 pb-3">Informasi Lowongan</h3>
        <div class="grid sm:grid-cols-2 gap-5">
            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Judul Posisi <span class="text-red-500">*</span></label>
                <input type="text" name="title" value="{{ old('title', $career?->title) }}" required
                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500 bg-white"
                    placeholder="Misal: Operator Excavator Senior">
                @error('title')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Departemen <span class="text-red-500">*</span></label>
                <input type="text" name="department" value="{{ old('department', $career?->department) }}" required
                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500 bg-white"
                    placeholder="Operasional, Teknis, Marketing …">
                @error('department')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
        </div>
        <div class="grid sm:grid-cols-3 gap-5">
            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Lokasi</label>
                <input type="text" name="location" value="{{ old('location', $career?->location ?? 'Jakarta') }}"
                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500 bg-white">
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Tipe Pekerjaan</label>
                <div class="relative">
                    <select name="type" class="w-full appearance-none border border-gray-200 rounded-xl px-4 py-2.5 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500 bg-white pr-10 cursor-pointer">
                        @foreach(['full-time'=>'Full Time','part-time'=>'Part Time','contract'=>'Contract','internship'=>'Internship'] as $val=>$label)
                        <option value="{{ $val }}" {{ old('type', $career?->type) === $val ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    <svg class="absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </div>
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Deadline</label>
                <input type="date" name="deadline" value="{{ old('deadline', $career?->deadline?->format('Y-m-d')) }}"
                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500 bg-white">
            </div>
        </div>
        <div>
            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Range Gaji</label>
            <input type="text" name="salary_range" value="{{ old('salary_range', $career?->salary_range) }}"
                class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500 bg-white"
                placeholder="Misal: Rp 8.000.000 – Rp 12.000.000">
        </div>
        <label class="flex items-center gap-2.5 cursor-pointer">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $career?->is_active ?? true) ? 'checked' : '' }} class="accent-yellow-500 w-4 h-4">
            <span class="text-sm text-gray-700 font-medium">Aktifkan lowongan (tampil di website)</span>
        </label>
    </div>

    {{-- Deskripsi Pekerjaan - CKEditor5 --}}
    <div class="admin-card space-y-3">
        <h3 class="font-display font-black text-gray-800 uppercase text-sm tracking-wide border-b border-gray-100 pb-3">Deskripsi Pekerjaan <span class="text-red-500">*</span></h3>
        <p class="text-gray-400 text-xs">Jelaskan tanggung jawab, lingkungan kerja, dan benefit posisi ini. Mendukung formatting dan copas gambar.</p>
        <textarea name="description" id="career-desc" required>{{ old('description', $career?->description) }}</textarea>
        @error('description')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Persyaratan - CKEditor5 --}}
    <div class="admin-card space-y-3">
        <h3 class="font-display font-black text-gray-800 uppercase text-sm tracking-wide border-b border-gray-100 pb-3">Persyaratan <span class="text-red-500">*</span></h3>
        <p class="text-gray-400 text-xs">Gunakan bullet list untuk daftar persyaratan agar tampil rapi di halaman website.</p>
        <textarea name="requirements" id="career-req" required>{{ old('requirements', $career?->requirements) }}</textarea>
        @error('requirements')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    <div class="flex gap-3">
        <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-black font-black px-7 py-2.5 rounded-xl text-sm transition-colors shadow-sm">
            {{ $career ? '💾 Simpan Perubahan' : '➕ Tambah Lowongan' }}
        </button>
        <a href="{{ route('admin.careers.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold px-6 py-2.5 rounded-xl text-sm transition-colors">Batal</a>
    </div>
</form>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('vendor/ckeditor5/ckeditor5.css') }}">
<style>
.ck.ck-editor__editable_inline { min-height: 240px !important; font-size: 14px; line-height: 1.7; }
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

    const ckPlugins = [
        Essentials, Autoformat, AutoImage, Bold, Italic, Underline, Strikethrough,
        BlockQuote, Base64UploadAdapter, Heading, Image, ImageCaption, ImageStyle,
        ImageToolbar, ImageUpload, ImageResize, PictureEditing, Indent, IndentBlock,
        Link, LinkImage, List, ListProperties, MediaEmbed, Paragraph, PasteFromOffice,
        Table, TableToolbar, TableCaption, TableProperties, TableCellProperties,
        Alignment, HorizontalLine, RemoveFormat,
    ];

    const ckToolbarDesc = {
        items: [
            'undo', 'redo', '|', 'heading', '|',
            'bold', 'italic', 'underline', 'strikethrough', '|',
            'link', 'bulletedList', 'numberedList', '|',
            'outdent', 'indent', '|', 'blockQuote', 'insertTable', '|',
            'uploadImage', '|', 'alignment', 'horizontalLine', 'removeFormat',
        ],
        shouldNotGroupWhenFull: true,
    };

    const ckToolbarReq = {
        items: [
            'undo', 'redo', '|',
            'bold', 'italic', '|',
            'bulletedList', 'numberedList', '|',
            'outdent', 'indent', '|', 'removeFormat',
        ],
        shouldNotGroupWhenFull: true,
    };

    const ckShared = {
        plugins: ckPlugins,
        heading: { options: [
            { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
            { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
            { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
        ]},
        image: {
            toolbar: ['imageStyle:inline','imageStyle:block','imageStyle:side','|','toggleImageCaption','imageTextAlternative','|','resizeImage'],
            upload: { types: ['jpeg','png','gif','bmp','webp'] },
        },
        table: { contentToolbar: ['tableColumn','tableRow','mergeTableCells'] },
    };

    // Editor Deskripsi Pekerjaan
    ClassicEditor.create(document.querySelector('#career-desc'), { ...ckShared, toolbar: ckToolbarDesc })
        .catch(err => console.error('CKEditor5 desc:', err));

    // Editor Persyaratan - toolbar lebih ringkas, fokus bullet list
    ClassicEditor.create(document.querySelector('#career-req'), { ...ckShared, toolbar: ckToolbarReq })
        .catch(err => console.error('CKEditor5 req:', err));
})();
</script>
@endpush

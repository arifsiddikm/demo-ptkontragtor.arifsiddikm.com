@extends('layouts.admin')
@section('title', $equipment ? 'Edit Alat Berat' : 'Tambah Alat Berat')
@section('page_title', $equipment ? 'Edit Alat Berat' : 'Tambah Alat Berat')
@section('breadcrumb')
    <a href="{{ route('admin.equipment.index') }}" class="hover:text-yellow-600">Alat Berat</a> / {{ $equipment ? 'Edit' : 'Tambah' }}
@endsection

@section('content')
<div class="max-w-4xl">
<form method="POST"
      action="{{ $equipment ? route('admin.equipment.update', $equipment->id) : route('admin.equipment.store') }}"
      enctype="multipart/form-data" class="space-y-5" id="equipment-form">
    @csrf
    @if($equipment) @method('PUT') @endif

    <div class="admin-card space-y-5">
        <h3 class="font-display font-black text-gray-800 uppercase text-sm tracking-wide border-b border-gray-100 pb-3">Informasi Alat Berat</h3>
        <div class="grid sm:grid-cols-2 gap-5">
            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Nama Alat <span class="text-red-500">*</span></label>
                <input type="text" name="name" value="{{ old('name', $equipment?->name) }}" required
                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500 bg-white"
                    placeholder="Misal: Excavator Komatsu PC200">
                @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Kategori <span class="text-red-500">*</span></label>
                <input type="text" name="category" value="{{ old('category', $equipment?->category) }}" required list="cats"
                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500 bg-white"
                    placeholder="Excavator, Bulldozer, Crane …">
                <datalist id="cats">
                    @foreach(['Excavator','Bulldozer','Crane','Grader','Compactor','Wheel Loader','Dump Truck','Backhoe','Tower Crane','Pile Driver','Concrete Pump','Rough Terrain Crane'] as $c)
                    <option value="{{ $c }}">
                    @endforeach
                </datalist>
                @error('category')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
        </div>
        <div class="grid sm:grid-cols-2 gap-5">
            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Status Ketersediaan</label>
                <div class="relative">
                    <select name="status" class="w-full appearance-none border border-gray-200 rounded-xl px-4 py-2.5 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500 bg-white pr-10 cursor-pointer">
                        <option value="available"   {{ old('status', $equipment?->status) === 'available'   ? 'selected' : '' }}>✓ Tersedia</option>
                        <option value="unavailable" {{ old('status', $equipment?->status) === 'unavailable' ? 'selected' : '' }}>✗ Tidak Tersedia</option>
                    </select>
                    <svg class="absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </div>
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-3">Opsi Tampilan</label>
                <div class="flex gap-6">
                    <label class="flex items-center gap-2.5 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $equipment?->is_active ?? true) ? 'checked' : '' }} class="accent-yellow-500 w-4 h-4">
                        <span class="text-sm text-gray-700 font-medium">Aktif</span>
                    </label>
                    <label class="flex items-center gap-2.5 cursor-pointer">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $equipment?->is_featured) ? 'checked' : '' }} class="accent-yellow-500 w-4 h-4">
                        <span class="text-sm text-gray-700 font-medium">Unggulan ⭐</span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    {{-- Thumbnail --}}
    <div class="admin-card space-y-4">
        <h3 class="font-display font-black text-gray-800 uppercase text-sm tracking-wide border-b border-gray-100 pb-3">Foto / Thumbnail</h3>
        @if($equipment?->image)
        <div class="flex items-start gap-4 p-3 bg-gray-50 rounded-xl border border-gray-100">
            <img src="{{ $equipment->image_url }}" alt="" class="h-24 w-40 rounded-lg object-cover border border-gray-200 shrink-0">
            <div><p class="text-sm font-semibold text-gray-700 mb-1">Gambar saat ini</p><p class="text-xs text-gray-400">Upload file baru atau isi URL baru untuk mengganti.</p></div>
        </div>
        @endif
        <div x-data="{ tab: 'url' }" class="space-y-3">
            <div class="flex gap-2 bg-gray-100 p-1 rounded-xl w-fit">
                <button type="button" @click="tab='url'" :class="tab==='url' ? 'bg-white shadow text-gray-900 font-bold' : 'text-gray-500'" class="px-4 py-1.5 rounded-lg text-xs font-semibold transition-all">🔗 Link URL</button>
                <button type="button" @click="tab='file'" :class="tab==='file' ? 'bg-white shadow text-gray-900 font-bold' : 'text-gray-500'" class="px-4 py-1.5 rounded-lg text-xs font-semibold transition-all">📁 Upload File</button>
            </div>
            <div x-show="tab==='url'">
                <input type="url" name="image_url" value="{{ old('image_url', $equipment?->image && str_starts_with($equipment->image,'http') ? $equipment->image : '') }}"
                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500 bg-white"
                    placeholder="https://images.unsplash.com/photo-xxxx">
            </div>
            <div x-show="tab==='file'" style="display:none">
                <input type="file" name="image" accept="image/*"
                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-gray-500 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500 bg-white file:mr-3 file:py-1.5 file:px-4 file:rounded-lg file:border-0 file:bg-yellow-500 file:text-black file:text-xs file:font-bold cursor-pointer">
                <p class="text-gray-400 text-xs mt-1.5">JPG, PNG, WebP — maks. 2MB.</p>
            </div>
        </div>
        @error('image')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Deskripsi - CKEditor5 --}}
    <div class="admin-card space-y-3">
        <h3 class="font-display font-black text-gray-800 uppercase text-sm tracking-wide border-b border-gray-100 pb-3">Deskripsi <span class="text-red-500">*</span></h3>
        <p class="text-gray-400 text-xs">Jelaskan alat berat secara detail: keunggulan, kegunaan utama, kondisi, dan kapasitasnya. Mendukung copas gambar langsung.</p>
        <textarea name="description" id="eq-desc">{{ old('description', $equipment?->description) }}</textarea>
        @error('description')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Spesifikasi teknis --}}
    <div class="admin-card space-y-3">
        <h3 class="font-display font-black text-gray-800 uppercase text-sm tracking-wide border-b border-gray-100 pb-3">Spesifikasi Teknis</h3>
        <p class="text-gray-400 text-xs">Format: <code class="bg-gray-100 px-1 rounded">Nama: Nilai</code> — satu baris per item.</p>
        <textarea name="specifications" rows="10"
            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500 resize-none bg-white font-mono text-xs leading-relaxed"
            placeholder="Berat Operasi: 20.700 kg&#10;Kapasitas Bucket: 0.8 m³&#10;Daya Mesin: 155 HP">{{ old('specifications', $equipment?->specifications) }}</textarea>
    </div>

    <div class="flex items-center gap-3">
        <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-black font-black px-7 py-2.5 rounded-xl text-sm transition-colors shadow-sm">
            {{ $equipment ? '💾 Simpan Perubahan' : '➕ Tambah Alat Berat' }}
        </button>
        <a href="{{ route('admin.equipment.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold px-6 py-2.5 rounded-xl text-sm transition-colors">Batal</a>
    </div>
</form>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('vendor/ckeditor5/ckeditor5.css') }}">
<style>
.ck.ck-editor__editable_inline { min-height: 260px !important; font-size: 14px; line-height: 1.7; }
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

    ClassicEditor.create(document.querySelector('#eq-desc'), {
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

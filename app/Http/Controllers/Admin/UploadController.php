<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadController extends Controller
{
    /**
     * Handle CKEditor5 image upload.
     * Returns JSON: { "url": "..." } on success
     *              { "error": { "message": "..." } } on failure
     */
    public function image(Request $request)
    {
        $request->validate([
            'upload' => ['required', 'image', 'mimes:jpeg,png,gif,bmp,webp', 'max:4096'],
        ]);

        $file = $request->file('upload');
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('uploads/ck', $filename, 'public');

        return response()->json([
            'url' => Storage::disk('public')->url($path),
        ]);
    }
}

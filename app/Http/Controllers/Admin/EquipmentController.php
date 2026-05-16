<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Equipment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class EquipmentController extends Controller
{
    public function index(): View
    {
        $equipment = Equipment::latest()->paginate(15);
        return view('pages.admin.equipment.index', compact('equipment'));
    }

    public function create(): View
    {
        return view('pages.admin.equipment.form', ['equipment' => null]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name'           => 'required|string|max:150',
            'category'       => 'required|string|max:100',
            'description'    => 'required|string',
            'specifications' => 'nullable|string',
            'status'         => 'required|in:available,unavailable',
            'is_featured'    => 'boolean',
            'is_active'      => 'boolean',
            'image_url'      => 'nullable|url|max:500',
            'image'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data['slug']        = Str::slug($data['name']) . '-' . Str::random(5);
        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active']   = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('equipment', 'public');
        } elseif (!empty($data['image_url'])) {
            $data['image'] = $data['image_url'];
        }
        unset($data['image_url']);

        Equipment::create($data);

        return redirect()->route('admin.equipment.index')
            ->with('success', 'Alat berat berhasil ditambahkan.');
    }

    public function edit(Equipment $equipment): View
    {
        return view('pages.admin.equipment.form', compact('equipment'));
    }

    public function update(Request $request, Equipment $equipment): RedirectResponse
    {
        $data = $request->validate([
            'name'           => 'required|string|max:150',
            'category'       => 'required|string|max:100',
            'description'    => 'required|string',
            'specifications' => 'nullable|string',
            'status'         => 'required|in:available,unavailable',
            'is_featured'    => 'boolean',
            'is_active'      => 'boolean',
            'image_url'      => 'nullable|url|max:500',
            'image'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active']   = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            if ($equipment->image && !str_starts_with($equipment->image, 'http')) {
                \Storage::disk('public')->delete($equipment->image);
            }
            $data['image'] = $request->file('image')->store('equipment', 'public');
        } elseif (!empty($data['image_url'])) {
            $data['image'] = $data['image_url'];
        }
        unset($data['image_url']);

        $equipment->update($data);

        return redirect()->route('admin.equipment.index')
            ->with('success', 'Alat berat berhasil diperbarui.');
    }

    public function destroy(Equipment $equipment): RedirectResponse
    {
        if ($equipment->image) {
            \Storage::disk('public')->delete($equipment->image);
        }
        $equipment->delete();

        return redirect()->route('admin.equipment.index')
            ->with('success', 'Alat berat berhasil dihapus.');
    }

    public function toggle(Equipment $equipment): RedirectResponse
    {
        $equipment->update(['is_active' => !$equipment->is_active]);
        $status = $equipment->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return back()->with('success', "Alat berat berhasil {$status}.");
    }
}

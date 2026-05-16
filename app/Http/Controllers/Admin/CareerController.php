<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CareerController extends Controller
{
    public function index(): View
    {
        $careers = Career::latest()->paginate(15);
        return view('pages.admin.careers.index', compact('careers'));
    }

    public function create(): View
    {
        return view('pages.admin.careers.form', ['career' => null]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title'        => 'required|string|max:150',
            'department'   => 'required|string|max:100',
            'location'     => 'required|string|max:100',
            'type'         => 'required|in:full-time,part-time,contract,internship',
            'description'  => 'required|string',
            'requirements' => 'required|string',
            'salary_range' => 'nullable|string|max:100',
            'deadline'     => 'nullable|date',
            'is_active'    => 'boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        Career::create($data);

        return redirect()->route('admin.careers.index')
            ->with('success', 'Lowongan berhasil ditambahkan.');
    }

    public function edit(Career $career): View
    {
        return view('pages.admin.careers.form', compact('career'));
    }

    public function update(Request $request, Career $career): RedirectResponse
    {
        $data = $request->validate([
            'title'        => 'required|string|max:150',
            'department'   => 'required|string|max:100',
            'location'     => 'required|string|max:100',
            'type'         => 'required|in:full-time,part-time,contract,internship',
            'description'  => 'required|string',
            'requirements' => 'required|string',
            'salary_range' => 'nullable|string|max:100',
            'deadline'     => 'nullable|date',
            'is_active'    => 'boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        $career->update($data);

        return redirect()->route('admin.careers.index')
            ->with('success', 'Lowongan berhasil diperbarui.');
    }

    public function destroy(Career $career): RedirectResponse
    {
        $career->delete();
        return redirect()->route('admin.careers.index')
            ->with('success', 'Lowongan berhasil dihapus.');
    }

    public function toggle(Career $career): RedirectResponse
    {
        $career->update(['is_active' => !$career->is_active]);
        $status = $career->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return back()->with('success', "Lowongan berhasil {$status}.");
    }
}

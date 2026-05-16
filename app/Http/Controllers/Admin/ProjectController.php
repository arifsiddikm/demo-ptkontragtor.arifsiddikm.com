<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        $projects = Project::latest()->paginate(15);
        return view('pages.admin.projects.index', compact('projects'));
    }

    public function create(): View
    {
        return view('pages.admin.projects.form', ['project' => null]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title'        => 'required|string|max:200',
            'excerpt'      => 'nullable|string|max:400',
            'content'      => 'required|string',
            'client'       => 'nullable|string|max:150',
            'location'     => 'nullable|string|max:150',
            'category'     => 'nullable|string|max:100',
            'project_date' => 'nullable|date',
            'is_featured'  => 'boolean',
            'is_active'    => 'boolean',
            'image_url'    => 'nullable|url|max:500',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
        ]);

        $data['slug']       = Str::slug($data['title']) . '-' . Str::random(5);
        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active']   = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('projects', 'public');
        } elseif (!empty($data['image_url'])) {
            $data['image'] = $data['image_url'];
        }
        unset($data['image_url']);

        Project::create($data);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Proyek berhasil ditambahkan.');
    }

    public function edit(Project $project): View
    {
        return view('pages.admin.projects.form', compact('project'));
    }

    public function update(Request $request, Project $project): RedirectResponse
    {
        $data = $request->validate([
            'title'        => 'required|string|max:200',
            'excerpt'      => 'nullable|string|max:400',
            'content'      => 'required|string',
            'client'       => 'nullable|string|max:150',
            'location'     => 'nullable|string|max:150',
            'category'     => 'nullable|string|max:100',
            'project_date' => 'nullable|date',
            'is_featured'  => 'boolean',
            'is_active'    => 'boolean',
            'image_url'    => 'nullable|url|max:500',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
        ]);

        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active']   = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            if ($project->image && !str_starts_with($project->image, 'http')) {
                \Storage::disk('public')->delete($project->image);
            }
            $data['image'] = $request->file('image')->store('projects', 'public');
        } elseif (!empty($data['image_url'])) {
            $data['image'] = $data['image_url'];
        }
        unset($data['image_url']);

        $project->update($data);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Proyek berhasil diperbarui.');
    }

    public function destroy(Project $project): RedirectResponse
    {
        if ($project->image && !str_starts_with($project->image, 'http')) {
            \Storage::disk('public')->delete($project->image);
        }
        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Proyek berhasil dihapus.');
    }

    public function toggle(Project $project): RedirectResponse
    {
        $project->update(['is_active' => !$project->is_active]);
        $status = $project->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return back()->with('success', "Proyek berhasil {$status}.");
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(Request $request): View
    {
        $query = Project::active()->latest('project_date');

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('client', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%");
            });
        }

        if ($category = $request->input('category')) {
            $query->where('category', $category);
        }

        $categories = Project::active()->distinct()->pluck('category')->filter()->sort()->values();
        $projects   = $query->paginate(9);

        return view('projects.index', compact('projects', 'categories'));
    }

    public function show(string $slug): View
    {
        $project  = Project::active()->where('slug', $slug)->firstOrFail();
        $related  = Project::active()->where('id', '!=', $project->id)
                           ->where('category', $project->category)
                           ->latest('project_date')->take(3)->get();

        return view('projects.show', compact('project', 'related'));
    }
}

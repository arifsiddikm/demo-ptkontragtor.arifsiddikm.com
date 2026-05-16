<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CareerController extends Controller
{
    public function index(Request $request): View
    {
        $query = Career::active();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('department', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('department')) {
            $query->where('department', 'like', '%' . $request->department . '%');
        }

        $careers     = $query->latest()->get();
        $departments = Career::active()->distinct()->pluck('department')->sort()->values();

        return view('careers.index', compact('careers', 'departments'));
    }

    public function show(int $id): View
    {
        $career = Career::active()->findOrFail($id);
        return view('careers.show', compact('career'));
    }
}

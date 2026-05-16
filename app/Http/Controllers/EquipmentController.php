<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EquipmentController extends Controller
{
    public function index(Request $request): View
    {
        $query = Equipment::active();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('category', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $equipment  = $query->latest()->paginate(9);
        $categories = Equipment::active()->distinct()->pluck('category')->sort()->values();

        return view('equipment.index', compact('equipment', 'categories'));
    }

    public function show(string $slug): View
    {
        $equipment = Equipment::active()->where('slug', $slug)->firstOrFail();
        $related   = Equipment::active()
            ->where('category', $equipment->category)
            ->where('id', '!=', $equipment->id)
            ->take(3)->get();

        return view('equipment.show', compact('equipment', 'related'));
    }
}

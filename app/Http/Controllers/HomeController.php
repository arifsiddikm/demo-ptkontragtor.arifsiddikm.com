<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Equipment;
use App\Models\Project;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $featuredEquipment = Equipment::active()->featured()->take(6)->get();
        $latestArticles    = Article::active()->latest('published_at')->take(3)->get();
        $featuredProjects  = Project::active()->featured()->latest('project_date')->take(3)->get();

        return view('pages.home', compact('featuredEquipment', 'latestArticles', 'featuredProjects'));
    }

    public function about(): View
    {
        return view('pages.about');
    }
}

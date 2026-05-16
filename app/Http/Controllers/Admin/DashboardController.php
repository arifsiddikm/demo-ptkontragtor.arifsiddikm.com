<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Career;
use App\Models\ContactMessage;
use App\Models\Equipment;
use App\Models\Project;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'equipment'  => Equipment::count(),
            'articles'   => Article::count(),
            'careers'    => Career::count(),
            'projects'   => Project::count(),
            'messages'   => ContactMessage::count(),
            'unread'     => ContactMessage::where('is_read', false)->count(),
            'available'  => Equipment::where('status', 'available')->count(),
        ];

        $recentMessages = ContactMessage::latest()->take(5)->get();
        $recentArticles = Article::latest()->take(5)->get();

        return view('pages.admin.dashboard', compact('stats', 'recentMessages', 'recentArticles'));
    }
}

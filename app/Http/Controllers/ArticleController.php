<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(Request $request): View
    {
        $query = Article::active();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('excerpt', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%');
            });
        }

        $articles = $query->latest('published_at')->paginate(9);

        return view('articles.index', compact('articles'));
    }

    public function show(string $slug): View
    {
        $article = Article::active()->where('slug', $slug)->firstOrFail();
        $related = Article::active()
            ->where('id', '!=', $article->id)
            ->latest('published_at')
            ->take(3)->get();

        return view('articles.show', compact('article', 'related'));
    }
}

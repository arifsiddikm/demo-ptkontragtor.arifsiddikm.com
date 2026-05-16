<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        $articles = Article::latest()->paginate(15);
        return view('pages.admin.articles.index', compact('articles'));
    }

    public function create(): View
    {
        return view('pages.admin.articles.form', ['article' => null]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title'        => 'required|string|max:200',
            'excerpt'      => 'nullable|string|max:400',
            'content'      => 'required|string',
            'is_active'    => 'boolean',
            'published_at' => 'nullable|date',
            'image_url'    => 'nullable|url|max:500',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data['slug']      = Str::slug($data['title']) . '-' . Str::random(5);
        $data['is_active'] = $request->boolean('is_active');
        $data['author']    = 'Admin';

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('articles', 'public');
        } elseif (!empty($data['image_url'])) {
            $data['image'] = $data['image_url'];
        }
        unset($data['image_url']);

        Article::create($data);

        return redirect()->route('admin.articles.index')
            ->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit(Article $article): View
    {
        return view('pages.admin.articles.form', compact('article'));
    }

    public function update(Request $request, Article $article): RedirectResponse
    {
        $data = $request->validate([
            'title'        => 'required|string|max:200',
            'excerpt'      => 'nullable|string|max:400',
            'content'      => 'required|string',
            'is_active'    => 'boolean',
            'published_at' => 'nullable|date',
            'image_url'    => 'nullable|url|max:500',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            if ($article->image && !str_starts_with($article->image, 'http')) {
                \Storage::disk('public')->delete($article->image);
            }
            $data['image'] = $request->file('image')->store('articles', 'public');
        } elseif (!empty($data['image_url'])) {
            $data['image'] = $data['image_url'];
        }
        unset($data['image_url']);

        $article->update($data);

        return redirect()->route('admin.articles.index')
            ->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Article $article): RedirectResponse
    {
        if ($article->image && !str_starts_with($article->image, 'http')) {
            \Storage::disk('public')->delete($article->image);
        }
        $article->delete();

        return redirect()->route('admin.articles.index')
            ->with('success', 'Artikel berhasil dihapus.');
    }

    public function toggle(Article $article): RedirectResponse
    {
        $article->update(['is_active' => !$article->is_active]);
        $status = $article->is_active ? 'dipublikasikan' : 'disembunyikan';
        return back()->with('success', "Artikel berhasil {$status}.");
    }
}

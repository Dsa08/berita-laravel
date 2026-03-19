<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;

class NewsController extends Controller
{
    public function index()
    {
        $query = Post::with(['category', 'tags'])->published()->latest();

        // Kalau ada keyword pencarian
        if (request('search')) {
            $query->where('title', 'like', '%' . request('search') . '%')
                  ->orWhere('content', 'like', '%' . request('search') . '%');
        }

        $posts = $query->paginate(9)->withQueryString();
        $categories = Category::all();
        $search = request('search');

        return view('public.home', compact('posts', 'categories', 'search'));
    }

    public function show(Post $post)
    {
        if ($post->status !== 'published') {
            abort(404);
        }

        $relatedPosts = Post::with('category')
            ->published()
            ->where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->latest()
            ->take(4)
            ->get();

        return view('public.show', compact('post', 'relatedPosts'));
    }
}
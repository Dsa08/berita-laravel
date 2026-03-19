<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;

class NewsController extends Controller
{
    public function index()
    {
        $posts = Post::with(['category', 'tags'])
            ->published()
            ->latest()
            ->paginate(9);

        $categories = Category::all();

        return view('public.home', compact('posts', 'categories'));
    }

    public function show(Post $post)
    {
        // Pastikan hanya berita published yang bisa dibuka publik
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
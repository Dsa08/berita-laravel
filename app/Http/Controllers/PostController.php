<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(5);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        $tags = Tag::orderBy('name')->get();
        return view('posts.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'content'     => 'required|string',
            'author'      => 'nullable|string|max:100',
            'category_id' => 'nullable|exists:categories,id',
            'tags'        => 'nullable|array',
            'tags.*'      => 'exists:tags,id',
            'thumbnail'   => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['title', 'content', 'author', 'category_id']);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $post = Post::create($data);

        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        }

        return redirect()->route('admin/posts.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::with(['category', 'tags'])->findOrFail($id);
        $categories = Category::orderBy('name')->get();
        $tags = Tag::orderBy('name')->get();
        return view('posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'content'     => 'required|string',
            'author'      => 'nullable|string|max:100',
            'category_id' => 'nullable|exists:categories,id',
            'tags'        => 'nullable|array',
            'tags.*'      => 'exists:tags,id',
            'thumbnail'   => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $post = Post::findOrFail($id);
        $data = $request->only(['title', 'content', 'author', 'category_id']);

        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama jika ada
            if ($post->thumbnail && \Storage::disk('public')->exists($post->thumbnail)) {
                \Storage::disk('public')->delete($post->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $post->update($data);

        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        } else {
            $post->tags()->detach();
        }

        return redirect()->route('admin/posts.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy(Post $post)
    {
        // Hapus thumbnail dari storage jika ada
        if ($post->thumbnail && \Storage::disk('public')->exists($post->thumbnail)) {
            \Storage::disk('public')->delete($post->thumbnail);
        }

        $post->delete();
        return redirect()->route('admin/posts.index')->with('success', 'Berita berhasil dihapus!');
    }
}
@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Edit Berita</h1>

    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="title" class="form-control" value="{{ $post->title }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Konten</label>
            <textarea name="content" class="form-control">{{ $post->content }}</textarea>
        </div>

        {{-- Thumbnail lama --}}
        <div class="mb-3">
            <label class="form-label d-block">Thumbnail Sekarang:</label>
            @if ($post->thumbnail)
                <img src="{{ asset('storage/' . $post->thumbnail) }}" 
                     class="img-thumbnail mb-2" width="200">
            @else
                <p><em>Belum ada thumbnail</em></p>
            @endif
        </div>

        {{-- Upload Thumbnail baru --}}
        <div class="mb-3">
            <label class="form-label">Ganti Thumbnail (Opsional)</label>
            <input type="file" name="thumbnail" class="form-control">
            <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
        </div>

        {{-- 🔽 TOMBOL SUBMIT --}}
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
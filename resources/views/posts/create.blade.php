@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Tambah Berita</h1>
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Isi Berita</label>
            <textarea name="content" class="form-control" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label>Thumbnail</label>
            <input type="file" name="thumbnail" class="form-control">
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <select name="category_id" class="form-control">
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tag</label><br>
            @foreach($tags as $tag)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}" id="tag-{{ $tag->id }}">
                    <label class="form-check-label" for="tag-{{ $tag->id }}">
                        {{ $tag->name }}
                    </label>
                </div>
            @endforeach
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
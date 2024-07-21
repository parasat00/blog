@extends('layouts.main')

@section('title', 'Create Post')

@section('header', 'Create new post')

@section('content')
    <form method="post" action="{{ route('posts.update', $post->id) }}">
        @csrf
        @method('patch')
        <div class="row mb-3">
            <label for="title" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="body" class="col-sm-2 col-form-label">Body</label>
            <div class="col-sm-10">
                <textarea name="body" id="body" class="form-control" aria-label="With textarea">{{ $post->body }}</textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label for="categories" class="col-sm-2 col-form-label">Categories</label>
            <select class="form-select" multiple aria-label="Multiple select example" name="categories[]" id="categories">
                @foreach($categories as $category)
                    <option
                        {{ $post->categories && $post->categories->contains($category->id) ? ' selected' : ''}}
                        value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection

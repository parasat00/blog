@extends('layouts.main')

@section('title', 'Create Post')

@section('header', 'Create new post')

@section('content')
    <form method="post" action="{{ route('posts.store') }}">
        @csrf
        <div class="row mb-3">
            <label for="title" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" name="title">
            </div>
        </div>
        <div class="row mb-3">
            <label for="body" class="col-sm-2 col-form-label">Body</label>
            <div class="col-sm-10">
                <textarea name="body" id="body" class="form-control" aria-label="With textarea"></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label for="categories" class="col-sm-2 col-form-label">Categories</label>
            <select class="form-select" multiple aria-label="Multiple select example" name="categories[]" id="categories">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection

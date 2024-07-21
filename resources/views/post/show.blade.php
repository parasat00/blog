@extends('layouts.main')

@section('title', $post->title)

@section('header', $post->title)

@section('header-button')
    <a class="btn btn-primary mr-2 px-2 py-1" href="{{ route('posts.edit', $post->id) }}">Edit</a>
    <form method="post" action="{{ route('posts.delete', $post->id) }}">
        @csrf
        @method('delete')
        <input type="submit" value="Delete" class="btn btn-danger px-2 py-1">
    </form>
@endsection

@section('content')
    <div>Author: {{ $post->author->name }}       {{ $post->created_at }}</div>
    <div>
        {{ $post->body }}
    </div>
    @if($post->categories)
        <div class="mt-3">
            <h5>Categories: </h5>
            <div class="d-flex">
                @foreach($post->categories as $category)
                    <div class="py-1 px-3 rounded-pill bg-blue mr-2">{{ $category->name }}</div>
                @endforeach
            </div>
        </div>
    @endif
@endsection

@extends('layouts.main')

@section('title', 'Posts')

@section('header')
    Posts:
@endsection

@section('header-button')
    <a href="{{ route('posts.create') }}" class="btn btn-success float-end">Create post</a>
@endsection

@section('content')

    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Link</th>
        </tr>
        </thead>
        <tbody>
            @foreach($posts as $index => $post)
                <tr>
                    <th scope="row">{{ $index+1 }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->author->name }}</td>
                    <td>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-link">Details</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $posts->links() }}

@endsection

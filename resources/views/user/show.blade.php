@extends('layouts.main')

@section('title', 'Profile')

@section('header', 'Profile')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3">
                <div>
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="{{ $user->image }}" alt="user-image" class="rounded-circle" width="180">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8 mb-3">
                <div class="card mb-1">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $user->name }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $user->email }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Role</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $user->role === 1 ? 'Admin' : ($user->role === 2 ? 'Writer' : 'User') }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3 d-flex justify-content-end">
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary mr-2">Edit</a>
                    <a href="{{ route('users.editPassword', $user->id) }}" class="btn btn-primary">Change Password</a>
                </div>
            </div>
        </div>
    </div>
        @if($user->posts)
            <div class="container">
                <div class="card">
                    <h2 class="m-3">Posts of {{ $user->name }}</h2>

                    <table class="table table-dark">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Link</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user->posts as $index => $post)
                            <tr>
                                <th scope="row">{{ $index+1 }}</th>
                                <td>{{ $post->title }}</td>
                                <td>
                                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-link">Details</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    @endsection

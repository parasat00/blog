@extends('layouts.main')

@section('title', 'Users')

@section('header')
    Users:
@endsection

{{--@section('header-button')--}}
{{--    <a href="{{ route('posts.create') }}" class="btn btn-success float-end">Create post</a>--}}
{{--@endsection--}}

@section('content')

    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Link</th>
        </tr>
        </thead>
        <tbody>
            @foreach($users as $index => $user)
                <tr>
                    <th scope="row">{{ $index+1 }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role === 1 ? 'Admin' : ($user->role === 2 ? 'Writer' : 'User') }}</td>
                    <td>
                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-link">Details</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}

@endsection

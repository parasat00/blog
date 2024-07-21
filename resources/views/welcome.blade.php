@extends('layouts.main')

@section('title', 'Dashboard')

@section('header', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $data['post_count'] }}</h3>

                    <p>Posts</p>
                </div>
                <a href="{{ route('posts.index') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $data['user_count'] }}</h3>

                    <p>Users</p>
                </div>
                @can('view', auth('web')->user())
                    <a href="{{ route('users.index') }}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                @endcan
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $data['category_count'] }}</h3>

                    <p>Categories</p>
                </div>
{{--                <a href="#" class="small-box-footer">--}}
{{--                    More info <i class="fas fa-arrow-circle-right"></i>--}}
{{--                </a>--}}
            </div>
        </div>
    </div>
@endsection

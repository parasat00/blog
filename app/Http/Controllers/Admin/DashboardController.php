<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $data = [
            'post_count' => Post::count(),
            'user_count' => User::count(),
            'category_count' => Category::count()
        ];
        return view('welcome', compact('data'));
    }
}

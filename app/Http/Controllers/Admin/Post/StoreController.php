<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $categories = $data['categories'];
        unset($data['categories']);
        $data['user_id'] = auth()->id();
        $post = Post::create($data);
        $post->categories()->attach($categories);
        return redirect()->route('posts.index');
    }
}

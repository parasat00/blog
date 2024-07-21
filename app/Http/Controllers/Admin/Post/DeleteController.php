<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;

class DeleteController extends Controller
{
    public function __invoke(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post successfully deleted');
    }
}

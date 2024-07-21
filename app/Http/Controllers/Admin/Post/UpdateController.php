<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;

class UpdateController extends Controller
{
    public function __invoke(Post $post,UpdateRequest $request)
    {
        $data = $request->validated();
        $categories = $data['categories'];
        unset($data['categories']);
        $post->update($data);
        $post->categories()->sync($categories);
        return redirect()->route('posts.show', $post->id);
    }
}

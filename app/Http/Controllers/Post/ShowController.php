<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Post $post)
    {
        $category = $post->category;
        $postTags = $post->tags;
        return view('post.show', compact('post', 'category', 'postTags'));
    }
}

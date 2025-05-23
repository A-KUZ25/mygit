<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Post $post)
    {
        $tags = [];
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => 'int',
            'tags' => ''
        ]);
        if (isset($data['tags'])) {
            $tags = $data['tags'];
            unset($data['tags']);
        }
        $post->update($data);
        $post->tags()->sync($tags);

        return redirect()->route('post.show', $post->id);
    }
}

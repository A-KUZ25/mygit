<?php

namespace App\Services\Post;

use App\Http\Filter\PostFilter;
use App\Models\Post;

class Service
{
    public function index($data)
    {
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);

        $filteredPost = Post::query()->filter($filter)->paginate(12);

        return $filteredPost;
    }

    public function store($data)
    {
        if (isset($data['tags'])) {
            $tags = $data['tags'];
            unset($data['tags']);
            $post = Post::create($data);
            $post->tags()->sync($tags);
        }
        else {
            Post::create($data);
        }
    }

    public function update($data, Post $post)
    {
        $tags = [];
        if (isset($data['tags'])) {
            $tags = $data['tags'];
            unset($data['tags']);
        }
        $post->update($data);
        $post->tags()->sync($tags);
    }
}

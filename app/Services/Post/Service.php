<?php

namespace App\Services\Post;

use App\Http\Filter\PostFilter;
use App\Models\Post;

class Service
{
    public function index(array $data, int $postOnPage)
    {
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);

        $filteredPost = Post::query()->filter($filter)->paginate($postOnPage);

        return $filteredPost;
    }

    public function store(array $data): Post
    {
        if (isset($data['tags'])) {
            $tags = $data['tags'];
            unset($data['tags']);
            $post = Post::create($data);
            $post->tags()->sync($tags);
        } else {
            $post = Post::create($data);
        }
        return $post;
    }

    public function update(array $data, Post $post)
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

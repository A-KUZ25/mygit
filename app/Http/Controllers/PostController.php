<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterRequest;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class PostController extends BaseController
{
    public function index(FilterRequest $request)
    {
        $data = $request->validated();

        $query = Post::query();

        if (isset($data['category_id'])) {
            $query->where('category_id', $data['category_id']);
        }

        if (isset($data['title'])){
            $query->where('title', 'like', "%{$data['title']}%");
        }
        $posts = $query->get();
       dd($posts);
        $posts = Post::paginate(12);
        $categories = Category::all();
        return view('post.index', compact('posts', 'categories'));
    }

    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('post.create', compact('categories', 'tags'));
    }

    public function store(PostRequest $request)
    {
        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        $category = $post->category;
        $postTags = $post->tags;
        return view('post.show', compact('post', 'category', 'postTags'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $postTags = $post->tags;
        return view('post.edit', compact('post', 'categories', 'tags', 'postTags'));
    }

    public function update(Post $post, PostRequest $request)
    {
        $data = $request->validated();

        $this->service->update($data, $post);

        return redirect()->route('post.show', $post->id);

    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }

}

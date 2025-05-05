<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $categories = Category::all();
        return view('post.index', compact('posts', 'categories'));
    }

    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('post.create', compact('categories', 'tags'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'string',
            'category_id' => 'int',
            'content' => 'string',
            'image' => 'string',
            'tags' => ''
        ]);
        if (isset($data['tags'])) {
            $tags = $data['tags'];
            unset($data['tags']);
            $post = Post::create($data);
            $post->tags()->sync($tags);
        }
        else {
            Post::create($data);
        }

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

    public function update(Post $post)
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

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }

}

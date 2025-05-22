<?php

namespace App\Http\Controllers;

use App\Http\Filter\PostFilter;
use App\Http\Requests\FilterRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminController extends BaseController
{

    public function index(FilterRequest $request)
    {
        $data = $request->validated();

        $postOnPage = 15;

        $posts =  $this->service->index($data, 1,$postOnPage);
        return view('admin.post', compact('posts'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}

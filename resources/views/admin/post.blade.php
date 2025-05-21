
@extends('layouts.admin')

@section('content')
            @foreach($posts as $post)
                <div class="mt-3">
                    <a href="{{route('post.show', $post->id)}}">{{$post->id}}. {{$post->title}}</a>
                    <p>Категория: {{$post->category->name}}</p>
                </div>
            @endforeach
            <div class="mt-3">
                {{$posts->withQueryString()->links()}}
            </div>
@endsection

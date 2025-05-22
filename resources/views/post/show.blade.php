@extends('layouts.main')
@section('content')
    <div>
        <div class="mb-3">
            <div class="mb-2">ID: {{$post->id}} <br> {{$post->title}}</div>
            <div class="mb-2">Категория: {{$category->name}}</div>
            <div>Содержание:</div>
            <div class="mb-4">{{$post->content}}</div>
            <div class="mb-2">Теги:</div>
            @if(count($postTags) != 0)
                @foreach($postTags as $postTag)
                    <button type="button" class="btn btn-secondary mb-4">{{$postTag->name}}</button>
                @endforeach

            @else
                <label>У поста пока нет тегов</label>
            @endif
        </div>
        <div>
            <form action="{{route('post.destroy', $post->id)}}" method="post">
                @csrf
                @method('delete')
                <a href="{{url()->previous()}}" class="btn btn-outline-secondary" tabindex="-1" role="button"
                   aria-disabled="true">Назад</a>
                <button type="submit" class="btn btn-danger">Удалить</button>
                @can('view', auth()->user())
                    <a href="{{route('post.edit', $post->id)}}" class="btn btn-outline-success" tabindex="-1" role="button"
                       aria-disabled="true">Редактировать</a>
                @endcan

            </form>
        </div>
    </div>
@endsection

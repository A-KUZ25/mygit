@extends('layouts.main')
@section('content')
    <div>
        <form action="{{route('post.update', $post->id)}}" method="post" name="form">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="title" class="form-label">Название</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Назовите пост"
                       value="{{$post->title}}">
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Категория</label>
                <select class="form-select" aria-label="" name="category_id" id="category_id" required="true">
                    @foreach($categories as $category)
                        <option
                                {{ $post->category_id == $category->id ? 'selected' : ''}}
                                value="{{$category->id}}">{{$category->name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Текст</label>
                <textarea type="text" class="form-control" id="content" name="content"
                          placeholder="О чём вы хотите написать?">{{$post->content}}</textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Превью</label>
                <input type="text" class="form-control" id="image" name="image"
                       placeholder="Перенесите файл или вставьте URL"
                       value="{{$post->image}}">
            </div>
            <div class="mb-5">
                @foreach($tags as $tag)
                    <input type="checkbox" class="btn-check" id="{{$tag->id}}" name="tags[]" autocomplete="off"
                           value="{{$tag->id}}"
                    @foreach($postTags as $postTag)
                        {{ $postTag->id == $tag->id ? 'checked' : ''}}
                            @endforeach
                    >
                    <label class="btn btn-outline-secondary" for="{{$tag->id}}">{{$tag->name}}</label>
                @endforeach
            </div>
            <a href="{{route('post.index')}}" class="btn btn-outline-danger" tabindex="-1" role="button"
               aria-disabled="true">Назад</a>
            <button type="submit" class="btn btn-outline-success">Сохранить</button>
        </form>
    </div>
@endsection

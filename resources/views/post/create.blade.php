@extends('layouts.main')
@section('content')
    <div>
        <form action="{{route('post.store')}}" method="post">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Название</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Назовите пост"
                       value="{{old('title')}}">
                @error('title')
                <p class="text-danger">Введите название</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Категория</label>
                <select class="form-select" aria-label="" name="category_id" id="category_id" required="true">
                    <option value="">-- Выберите категорию --</option>
                    @foreach($categories as $category)
                        <option
                            {{old('category_id') != null && ($category->id == old('category_id')) ? 'selected' : ''}}
                            value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Текст</label>
                <textarea type="text" class="form-control" id="content" name="content"
                          placeholder="О чём вы хотите написать?"
                > {{old('content')}}</textarea>
                @error('content')
                <p class="text-danger">Введите текст</p>
                @enderror
            </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Превью</label>
                            <input type="text" class="form-control" id="image" name="image"
                                   placeholder="Перенесите файл или вставьте URL">
                        </div>
            <label for="tags" class="form-label">Теги</label><br>
            <div class="mb-5">
                @foreach($tags as $tag)
                    <input type="checkbox" class="btn-check" id="{{$tag->id}}" name="tags[]" autocomplete="off"
                           value="{{$tag->id}}"
                        {{old('tags') && in_array($tag->id, old('tags')) ? 'checked' : ''}}>
                    <label class="btn btn-outline-secondary" for="{{$tag->id}}">{{$tag->name}}</label>
                @endforeach
            </div>
            <br>
            <a href="{{route('post.index')}}" class="btn btn-danger " tabindex="-1" role="button"
               aria-disabled="true">Назад</a>
            <button type="submit" class="btn btn-outline-success">Опубликовать</button>
        </form>
    </div>
@endsection

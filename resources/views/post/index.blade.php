@extends('layouts.main')
@section('content')
    <div>
        <div>
            <div class="row">
                @foreach($posts as $post)
                    <div class="card m-3" style="width: 18rem;">
                        {{--                        <img src="..." class="card-img-top" alt="...">--}}
                        <div class="card-body">
                            <h5 class="card-title">{{$post->title}}</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">
                                Категория:
                                {{$post->category->name}}
                            </h6>
                            <p class="card-text">{{$post->content}}</p>
                            <a href="{{route('post.show', $post->id)}}" class="btn btn-primary">Открыть</a>
                        </div>
                    </div>
                @endforeach
                <div>
                    {{$posts->withQueryString()->links()}}
                </div>
            </div>
            <a href="{{route('post.create')}}" class="btn btn-outline-success mt-3" tabindex="-1" role="button"
               aria-disabled="true">Создать новый</a>
        </div>
    </div>
@endsection

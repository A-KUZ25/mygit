<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/resources/assets/metavak_32.ico">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>1</title>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('main.index')}}">
                Сайт
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    {{--                    <li class="nav-item">--}}
                    {{--                        <a class="nav-link active" aria-current="page" href="{{route('main.index')}}">Главная</a>--}}
                    {{--                    </li>--}}
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('post.index')}}">Посты</a>
                    </li>
                    {{--                    <li class="nav-item">--}}
                    {{--                        <a class="nav-link active" href="{{route('about.index')}}">О компании</a>--}}
                    {{--                    </li>--}}
                    {{--                    <li class="nav-item">--}}
                    {{--                        <a class="nav-link active" href="{{route('contact.index')}}">Контакты</a>--}}
                    {{--                    </li>--}}

                </ul>
                </li>
                </ul>
                @can('view', auth()->user())
                    <a href="{{route('admin.index')}}" class="btn btn-outline-success" role="button"
                       aria-disabled="true">Админ</a>
                @endcan
            </div>
        </div>
    </nav>
    <div class="lead"> @yield('content')</div>
</div>
</body>
</html>

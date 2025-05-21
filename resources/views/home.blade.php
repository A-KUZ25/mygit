@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}


                    </div>

                </div>
                    <div class="position-absolute start-50 translate-middle mt-5">
                        <a href="{{route('main.index')}}" class="btn btn-success mt-3" tabindex="-1"
                           role="button"
                           aria-disabled="true">На сайт</a>
                    </div>


            </div>
        </div>
    </div>
@endsection


@extends('layouts.main') {{--// подключение родительского шаблона--}}

@section('title')
    {{ $news['title'] }} @parent
@endsection

@section('header')
    {{ $news['title'] }}
@endsection

@section('content') {{--контент для вывода на главною страницу--}}

<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">

                {{ $news['text'] }}

            </div>
        </div>
    </div>
</article>

<br>

<a href="{{ route('admin.news.index') }}">В админку</a>

@endsection

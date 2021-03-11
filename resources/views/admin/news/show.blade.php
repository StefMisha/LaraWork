@extends('layouts.admin')
@section('content')

    <h2> {{ $news -> title }}</h2>
    <div>{!! $news -> description !!}</div>

        @foreach ($news->categories as $category)
            <span>{{ $category->title }}. </span>
        @endforeach

    {{ $news -> created_at }}
    {{ $news -> status }}


@endsection

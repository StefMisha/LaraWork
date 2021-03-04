@extends('layouts.admin')
@section('contact')

    <h2> {{ $news->title }}</h2>
    <div>{!! $news->description !!}</div>



@endsection

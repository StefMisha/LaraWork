@extends('layouts.admin')
@section('content')

    <h2> {{ $news -> title }}</h2>
    <div>{!! $news -> description !!}</div>



@endsection

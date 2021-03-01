<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">



    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href= "{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/clean-blog.min.css')}}" rel="stylesheet">

</head>

<body>

<!-- Navigation -->

<x-navbar></x-navbar>

<!-- Page Header -->
<header class="masthead" style="background-image: url({{asset('assets/img/contact-bg.jpg')}}">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="page-heading">
                    <h1>@section('title')  @show</h1>
                    <span class="subheading">Have questions? I have answers.</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->

@if(request()->RouteIs('contact.OrderDownload'))
    <a class="btn-danger" style="float: right; width: 180px;padding-left:10px ;text-decoration: none;" href="{{ route('contact.index') }}">Оставить отзыв о нас</a>
@else
    <a class="btn-danger" style="float: right; width: 180px;padding-left:10px ;text-decoration: none;" href=" {{ route('contact.OrderDownload') }} ">Заявка на загрузку данных со сторонних источников</a>
@endif

<br>
<div class="container">

   @yield('content')

</div>
<hr>
<!-- Footer -->
<x-footer></x-footer>


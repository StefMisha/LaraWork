@extends('layouts.admin')
@section('content')

    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Изменить новость</h1> &nbsp; <strong>
                <a href="{{ route('admin.news.index') }}">Список новостей</a>
            </strong>
        </div>

        <div>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            <form action="{{ route('admin.news.update', ['news' => $news]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="col-8">
                    <div class="form-group">
                        <label for="title">Наименование новости</label>
                        <input type="text" class="form-control" placeholder="title" name="title" value="{{ $news->title }}">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Описание новости</label>
                        <textarea class="form-control" name="description">{!! $news->description !!}</textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Сохранить</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@extends('layouts.admin')


@section('content')

    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Добавить новость</h1> &nbsp; <strong>
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
            <form action="{{ route('admin.news.store') }}" method="POST">
                @csrf
                <div class="col-8">
                    <div class="form-group">
                        <label for="category">Выбор категории</label>
                        <select class="form-control" name="category" id="category">
{{--Передедлать под выборку нескольких вариантов через чекбокс--}}
                            <option></option>
                            @forelse($categories as $category)
                                <option>{{ $category->title }}</option>
                            @empty
                                <option value="">Пусто</option>
                            @endforelse
                        </select>
                        @error('category')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-groupe">
                        <label for="title"></label>Заголовок новости</label>
                        <input type="text" class="form-control" name="title" id="title"  value="{{ old('title') }}">

                        @error('title')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="form-groupe">
                        <label for="description"></label>Описание новости</label>
                        <textarea class="form-control" id="description" name="description" value="{{ old('description') }}"></textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-groupe">
                        <label for="image"></label>Изображение для новости</label>
                        <input class="btn btn-block btn-danger" id="image" name="image" type="file" ">
                    </div>
                    <div class="form-groupe">
                        <label for="description">Статус новости</label>
                        <select class="form-control" name="status" id="status">
                            <option>draft</option>
                            <option>published</option>
                            <option>blocked</option>
                        </select>
                        @error('News')
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

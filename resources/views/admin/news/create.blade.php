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
                            <option>Выбрать</option>
                        </select>
                    </div>
                    <div class="form-groupe">
                        <label for="title"></label>Заголовок новости</label>
                        <input type="text" class="form-control" name="title" name="title" id="title"  value="{{ old('title') }}">
                    </div>
                    <div class="form-groupe">
                        <label for="description"></label>Описание новости</label>
                        <textarea class="form-control" id="description" name="description" value="{{ old('description') }}"></textarea>
                    </div>
                    <div class="form-groupe">
                        <label for="image"></label>Изображение для новости</label>
                        <input class="btn btn-block btn-danger" id="image" name="image" type="file" ">
                    </div>
                    <div class="form-groupe">
                        <label for="description">Статус новости</label>
                        <select class="form-control" name="category" id="category">
                            <option>Выбрать</option>
                        </select>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Сохранить</button>
                </div>
            </form>
        </div>
    </div>

@endsection

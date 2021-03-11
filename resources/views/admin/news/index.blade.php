@extends('layouts.admin')

@section('content')

    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Список новостей</h1> &nbsp; <strong>
                <a href="{{ route('admin.news.create') }}">Добавить новость </a>
            </strong>
        </div>

        <div class="row">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#ID</th>
                    <th>Заголовок</th>
                    <th>Категория</th>
                    <th>Дата добавления</th>
                    <th>Видимость</th>
                    <th>Управление</th>
                </tr>
                </thead>

                <tbody>

                @forelse($newsList as $news)
                    <tr>

                        <td>{{ $news -> id }}</td>
                        <td>{{ $news -> title }}</td>
                        <td>
                        @foreach ($news->categories as $category)
                            <span>{{ $category->title }}. </span>
                        @endforeach
                        </td>
                        <td>{{ $news -> created_at }}</td>
                        <td>{{ $news -> status }}</td>
                        <td><a href="{{ route('admin.news.show', ['news' => $news]) }}">Пр.</a>&nbsp;
                            <a href="{{ route('admin.news.edit', ['news' => $news]) }}">Ред.</a>&nbsp;
                            <a href="">Уд.</a></td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="4">
                            <h2>Записей нет</h2>
                        </td>
                    </tr>
                @endforelse

                </tbody>
            </table>
            {{ $newsList->links() }} {{--   вывод по n шт на страницу--}}
        </div>

    </div>
@endsection

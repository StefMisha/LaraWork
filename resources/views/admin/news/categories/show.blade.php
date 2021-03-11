@extends('layouts.admin')
@section('content')

    <h4>Название категории: </h4> <h2>{{ $category->title }}</h2>
    <h4>Описание категории: </h4> <h2>{!! $category->description !!}</h2>
    <hr>
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Список новостей из категории:</h1> &nbsp; <strong>
                <a href="{{ route('admin.news.create') }}">Добавить новость </a>
            </strong>
        </div>

        <div class="row">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Заголовок</th>
                        <th>Новость</th>
                        <th>Дата добавления</th>
                        <th>Дата изменения</th>
                        <th>Просмотры</th>
                    </tr>
                    </thead>
            <tbody>

                @forelse($category -> news as $newsOne)
                    <tr>
                        <td>{{ $newsOne -> id }}</td>
                        <td>{{ $newsOne -> title }}</td>
                        <td>{{ $newsOne -> status }}</td>
                        <td>{{ $newsOne -> created_at }}</td>
                        <td>{{ $newsOne -> updated_at }}</td>
                        <td>{{ $newsOne -> show }}</td>

                    </tr>
                @empty {{-- иначе --}}
                    <tr>
                        <td colspan="4">
                            <h2>Записей нет</h2>
                        </td>
                    </tr>
                @endforelse

                </tbody>
            </table>
            {{--            {{ $newsOne->links() }} --}}{{--   вывод по n шт на страницу--}}
        </div>

    </div>
@endsection

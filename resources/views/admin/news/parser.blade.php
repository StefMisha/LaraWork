@extends('layouts.admin')

@section('content')

    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Список <img src="{{ ($news['image']) }}" style="height: 29px" class="icon"> новостей</h1> &nbsp;
        </div>

        <div class="row">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Название</th>
                    <th>Ссылка</th>
                    <th>Краткое описание</th>
                    <th>Дата публикации</th>
                    <th>Управление</th>
                </tr>
                </thead>
                <ul> <h4>Источники:</h4>

                @forelse($links as $urlOne)
                    <li><a href="{{ route('admin.parser.index', $urlOne) }}">{{ $urlOne }}</a><hr></li>
                @empty  <h1 style="color: red">Не получил данные</h1>

                @endforelse
                </ul>
                <hr>
                Текущий источник: <br>
                {{ $urlOne }}
                <tbody>
                @forelse($news['news'] as $newsOne)
                    <tr>
                        <td>{{ $newsOne['title'] }}</td>
                        <td><a href="{{ $newsOne['link'] }}">Перейти к источнику</a> </td>
                        <td>{{ $newsOne['description'] }}</td>
                        <td>{{ $newsOne['pubDate'] }}</td>
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
{{--            {{ $newsList->links() }} --}}{{--   вывод по n шт на страницу--}}
        </div>

    </div>
@endsection

<?php

namespace App\Http\Controllers;

use App\Jobs\NewsJob;
use App\Services\ParserService;
use Illuminate\Http\Request;

class ParserController extends Controller
{

    public function index()//TODO: передать отдельно ссылки дял просмотра новостей на найте через ParserService
    {
        $parsingLinks = [
            'https://news.yandex.ru/army.rss',
            'https://news.yandex.ru/music.rss',
            'https://news.yandex.ru/auto.rss',
            'https://news.yandex.ru/martial_arts.rss',
            'https://news.yandex.ru/communal.rss',
            'https://news.yandex.ru/health.rss',
            'https://news.yandex.ru/games.rss',
            'https://news.yandex.ru/internet.rss',
            'https://news.yandex.ru/cyber_sport.rss',
            'https://news.yandex.ru/movies.rss',
            'https://news.yandex.ru/cosmos.rss',
            'https://news.yandex.ru/culture.rss',
        ];
        foreach ($parsingLinks as $link) {
            NewsJob::dispatch($link);
        }

        echo "Работа выполнена";

    }

    public function parsing(Request $request)//TODO: передать отдельно ссылки дял просмотра новостей на найте через ParserService
    {
        $parsingLinks = [
            'https://news.yandex.ru/army.rss',
            'https://news.yandex.ru/music.rss',
            'https://news.yandex.ru/auto.rss'
        ];

        $arr = $request->input();
        if (empty($arr)) {
            $result = $parsingLinks[0];
        } else {
            $result = str_ireplace('_' , '.', array_key_first($arr)); //получаю первый ключ массива, затем переменяю нижиний дефис на .
        }

        $news = (new ParserService($result))->start();

        return view('admin.news.parser', [
            'news' => $news,
            'links' => $parsingLinks,
        ]);
    }

}

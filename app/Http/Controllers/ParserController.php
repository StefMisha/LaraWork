<?php

namespace App\Http\Controllers;

use App\Services\ParserService;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    public function index(ParserService $service,Request $request)
    {
        $parsingLinks = [
            'https://news.yandex.ru/army.rss',
            'https://news.yandex.ru/music.rss',
            'https://news.yandex.ru/auto.rss'];

       $arr = $request->input();
       if (empty($arr)) {
           $result = $parsingLinks[0];
       } else {
           $result = str_ireplace('_' , '.', array_key_first($arr)); //получаю первый ключ массива, затем переменяю нижиний дефис на .
       }

        $news = $service->start($result);

        return view('admin.news.parser', [
            'news' => $news,
            'links' => $parsingLinks,
        ]);
    }
}

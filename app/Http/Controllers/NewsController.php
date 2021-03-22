<?php

namespace App\Http\Controllers;


use App\Models\News;
use App\Services\FakeNewsService; //$faker - пропсал в ручную
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index()
    {
        $newsList = News::select('id', 'title','status', 'created_at')
            ->with('categories')
            ->paginate(10);

        return view('news.index',[
            'listNews' => $newsList
        ]);
    }
/*
    public function index(FakeNewsService $service)
    {
        return view('news.index',[
            'listNews' => $service->getNews()
            ]);
    }
*/
    public function show( $service, int $id)
    {
        //TODO: ДОДЕЛАТЬ ПОКАЗ НОВОСТИ ИЗ БД
        $allNews = $service->getNews();
        $news = $allNews[$id] ?? "Not found";
        return view('news.show', [
            'news'=>$news]
        );


    }
}

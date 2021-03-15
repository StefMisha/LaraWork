<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsCreateRequest;
use App\Http\Requests\NewsEditRequest;
use App\Models\Category;
use App\Models\News;
use App\Models\NewsTmp;
use Illuminate\Http\Request;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
/*старый варинате через объект
        $objNew = new News();
      $newsList = $objNew->getNews();
*/

        /* 1 к
         $newsList = NewsTmp::with('category')->get();
        dd($newsList);*/

        $newsList = News::select('id', 'title','status', 'created_at')
            ->with('categories')
            ->paginate(10);

        return view('admin.news.index', [
            'newsList' => $newsList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $categories
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select('id', 'title', 'slug', 'description', 'created_at')
            ->get();

        return view('admin.news.create', [
            'categories' => $categories
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewsCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsCreateRequest $request)
    {
        //валидация проводится в моделях, сервисах.

        dd($request->input());
        $model = News::create($request->validated());
        $model->categories()->sync($request->input('categories'));

//        $data = $request -> validated();
//
//        $data['slug'] = \Str::slug($data['title']); //slug берет имя от title
//        $create = News::create($data);//записываем данные в базу
//
//        if ($create) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Новость добавлена');
//        }
//        return back()->withInput()
//            ->with('errors', 'Не удалось добавить запись');
    }

    /**
     * Display the specified resource.
     *
     * @param News $news
     * @return \Illuminate\Http\Response
     */
    public function show(news $news)
    {
        return view('admin.news.show', [
            'news' => $news
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', [
            'news' => $news
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NewsEditRequest $request
     * @param News $news
     * @return \Illuminate\Http\Response
     */
    public function update(NewsEditRequest $request, News $news)
    {

        $data = $request -> validated();
        $save = $news->fill($data)->save();
        if ($save) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Запись успешно обновлена');
        }
        return back()
            ->withInput()->with('errors','Не удалось обновить запись');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

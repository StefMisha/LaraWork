<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//       $objNew = new News();
//       $newsList = $objNew->getNews();



       $newsList = News::select('id', 'title', 'created_at')
           ->with('categories')
           ->paginate(10);

       return view('admin.news.index', [
           'newsList' => $newsList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $date = $request->only(['title', 'description']);
        $data['slug'] = \Str::slug($date['title']);

        $create = News::create($date);

        if ($create) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Новость добавлена');

        }
        return back()->withInput()
            ->with('errors', 'Не удалось добавить запись');
    }

    /**
     * Display the specified resource.
     *
     * @param News $news
     * @return \Illuminate\Http\Response
     */
    public function show(news $news) //$id ??
    {
        return view('admin.news.show', [
            'news' => $news]);
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $data = $request->only([
            'title', 'description'
        ]);


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

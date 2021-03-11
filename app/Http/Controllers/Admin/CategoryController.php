<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryEditRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
/*
        $categories = Category::all();//обращение как к статистическому методу, вернет все записи их модели
        $categories = Category::with('newsTmp')->get();
        dd($categories->pluck('id', 'title'));
*/

        $categories = Category::select('id', 'title', 'slug', 'description', 'created_at')
            ->with('news')
            ->paginate(10); //вывод по 10 шт на страницу


        return view('admin.news.categories.index', [
            'categories' => $categories]);


/*еще варианты вывода
       $objCategory = new Category();
        $categories = $objCategory->getCategories();

        dd($categories);
        dd($objCategory->getCategory(5));
*/

/*пример работы с бд

        dd(\DB::table('news')->where([ //несколько условий
            ['id', '>', '3'],
            ['description', 'like', '%do%']
        ])->get());

*/

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryCreateRequest $request)
    {

        /*only, request - проводит валидацию и передает только нужные данные

                $data = $request->only([
                    'title', 'description'
                ]);

        */

        $data = $request->validated();

        $data['slug'] = \Str::slug($data['title']);
        $create = Category::create($data);

        if ($create) {
            return redirect()->route('admin.categories.index')
                ->with('success', 'Запись успешно добавлена');
        }
        return back()->withInput()
            ->with('errors','Не удалось добавить запись');
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
       return view('admin.news.categories.show',[
           'category' => $category
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {

        return view('admin.news.categories.edit', [
            'category' => $category
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryEditRequest $request
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryEditRequest $request, Category $category)
    {
/*only, request - проводит валидацию и передает только нужные данные

        $data = $request->only([
            'title', 'description'
        ]);

*/
        $data = $request->validated();

        $data['slug'] = \Str::slug($data['title']);

        $save = $category->fill($data)->save();
        if ($save) {
            return redirect()->route('admin.categories.index')
                ->with('success', 'Запись успешно обновлена');
        }
        return back()
            ->withInput()->with('errors','Не удалось обновить запись');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}

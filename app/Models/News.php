<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    public function getNews()
    {
        return \DB::table('news')
       //     ->join('categories', 'category_id', '')
            ->select("id", "title", "created_at") //селект строку можно убрать, тк get по сути выводит всё
            ->get();

    }

    public function getNew(int $id)
    {
        return \DB::table('news')->find($id);
    }

    public function categories()
    {
        return $this->belongsToMany (Category::class, 'categories_has_news', 'news_id', 'category_id');
    }
}


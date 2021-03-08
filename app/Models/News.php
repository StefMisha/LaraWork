<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class News extends Model
{
    use HasFactory;

    protected $table = "news"; //переопределяем имя таблици если оно стандартно, то фассад сам присваивает нужное имя
    protected $primaryKey = "id";

    protected $fillable = [
        'title','description'
    ];

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





    //связи с другими таблицами

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany (Category::class, 'categories_has_news', 'news_id', 'category_id');
    }
    public function newsTmp(): hasMany
    {
        return $this->hasMany(NewsTmp::class, 'news_id', 'id');
    }

}


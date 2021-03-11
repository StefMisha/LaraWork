<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories"; //переопределяем имя таблици если оно стандартно, то фассад сам присваивает нужное имя
    protected $primaryKey = "id";

    protected $fillable = [
        'title', 'slug','description'
    ];
   // protected $guarded = ['id']; // охрана

/* старый вариант выборки
    public function getCategories()
    {
        return \DB::table('categories')
            ->select("id", "title", "slug", "description", "created_at") //селект строку можно убрать, тк get по сути выводит всё
            ->get();
    }
*/

    public function getCategory(int $category)
    {
        return \DB::table('categories')->find($category); //сокращенное написание вывода элемента по id, find - найти

    }

  //связи с другими таблицами

    public function news(): BelongsToMany
    {
        return $this->belongsToMany (News::class, 'categories_has_news', 'category_id', 'news_id');
    }

    public function newsTmp(): hasMany
    {
        return $this->hasMany(NewsTmp::class, 'category_id', 'id');
    }
}



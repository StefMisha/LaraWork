<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\News;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $this->call([
//            CategorySeader::class,
//            NewsSeeder::class
//        ]);

        // \App\Models\User::factory(10)->create();

        Category::factory()
            ->has(News::factory()->count(10))
            ->count(5)
            ->create();
    }
}

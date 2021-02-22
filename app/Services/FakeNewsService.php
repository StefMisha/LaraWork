<?php


namespace App\Services;


use Faker\Factory;

class FakeNewsService //$faker - генератор рандомных значений
{
    public function getNews(): array
    {

        $news = [];
        $faker = Factory::create('ru_RU');
        for ($i = 0; $i < 5; $i++) {
            $news[] = [
                'title' => $faker -> jobTitle, //$faker - генератор рандомных значений
                'text' => $faker->text(300),
                'author' => $faker->firstName . " " . $faker->lastName,
                'created_at' => now()
            ];
        }
        return $news;
    }
}

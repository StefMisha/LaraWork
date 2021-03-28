<?php declare(strict_types=1);


namespace App\Services;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService
{
    public string $url;

    public function __construct(string $url)
    {
        $this->url = $url;

    }

    public function startWithJob() : void //для очереди startWithJob
    {
        $xml = XmlParser::load($this->url);

      $data =  $xml->parse([
            'title' => [
                'user' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ]
        ]);
//проверка выгузки с источников
        try {
            $name = \Str::between($data['link'], '.ru/', '.html?');
            \Storage::disk('public')
                ->put("news/parser/$name.txt", json_encode($data));
        } catch (\Throwable $e) {
            Log::debug($e->getMessage());
        }
    }

//временный вывод новостей по ссылкам из ParserController

    public function start(string $url) : array
    {
        $xml = XmlParser::load($url);

        return  $xml->parse([
            'title' => [
                'user' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ]
        ]);
    }

}

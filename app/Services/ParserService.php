<?php declare(strict_types=1);


namespace App\Services;


use Illuminate\Support\Facades\DB;
use XmlParser;

class ParserService
{
    protected $parsingLinks = [
        'https://news.yandex.ru/army.rss',
        'https://news.yandex.ru/music.rss',
        'https://news.yandex.ru/auto.rss'
    ];

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

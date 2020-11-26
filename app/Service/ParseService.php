<?php


namespace App\Service;


use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParseService
{

    protected $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    protected function load()
    {
        return XmlParser::load($this->url);
    }
    public function getData(): array
    {
        $load = $this->load();
        return $load->parse([
            'title' => [
                'uses' => 'channel.title'
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
                'uses' => 'channel.item[title,link,guid,description,image,pubDate]'
            ],

        ]);

//        Storage::disk('local')->get($this->url . ".txt");
    }

    public function saveData(): void
    {
        $json = json_encode($this->getData(), JSON_UNESCAPED_UNICODE);
        Storage::disk('local')->put($this->url . ".txt", $json);
    }
}

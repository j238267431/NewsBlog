<?php

namespace App\Http\Controllers;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Database\Eloquent;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class PareserController extends Controller
{
    public function index()
    {
        $load = XmlParser::load("https://news.yandex.ru/music.rss");
        $data = $load->parse([
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

        $parseYndxNews = $data['news'];

//        $create = News::create($data['news']);
        foreach($parseYndxNews as $news) {
            $create = News::insert([
                'title' => $news['title'],
                'description' => $news['description'],
                'categoryId' => '1',
                'resourceId' => '1',
                'created_at' => Carbon::now(+3),
                'updated_at' => Carbon::now(+3),
                'link' => $news['link'],
                'pub_date' => Carbon::now(),
            ]);
        }
        if ($create) {
            return redirect('/admin/news')->with('success', 'новость добавлена');
        }
        return redirect('/admin/news')->with('error', 'новость не добавлена');
    }
}

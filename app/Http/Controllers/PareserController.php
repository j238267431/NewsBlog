<?php

namespace App\Http\Controllers;
use App\Jobs\NewsParsing;
use App\Models\News;
use App\Service\ParseService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class PareserController extends Controller
{

    protected $urls = [
        "https://news.yandex.ru/music.rss",
        "https://news.yandex.ru/auto.rss",
        "https://news.yandex.ru/army.rss",
        "https://news.yandex.ru/games.rss",
        "https://news.yandex.ru/movies.rss",
        "https://news.yandex.ru/cosmos.rss",
        "https://news.yandex.ru/health.rss"
    ];
    public function index()
    {
        foreach($this->urls as $url){
            NewsParsing::dispatch(new ParseService($url));

    }
        echo "Success";

//        $parseYndxNews = $data['news'];
//
////        $create = News::create($data['news']);
//        foreach($parseYndxNews as $news) {
//            $create = News::insert([
//                'title' => $news['title'],
//                'description' => $news['description'],
//                'categoryId' => '1',
//                'resourceId' => '1',
//                'created_at' => Carbon::now(+3),
//                'updated_at' => Carbon::now(+3),
//                'link' => $news['link'],
//                'pub_date' => Carbon::now(),
//            ]);
//        }
//        if ($create) {
//            return redirect('/admin/news')->with('success', 'новость добавлена');
//        }
//        return redirect('/admin/news')->with('error', 'новость не добавлена');
    }
}

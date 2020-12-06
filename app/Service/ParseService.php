<?php


namespace App\Service;


use App\Models\Categories;
use App\Models\News;
use App\Models\ParsedNews;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
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
    protected function getSlug($categoryTitle)
    {
        $pattern = '/(Яндекс.Новости: )([а-яА-Яёa-zA-Z])/';
        $replacement = '$2';
        return preg_replace($pattern, $replacement, $categoryTitle);
    }

    protected function addSlug($slug, $news)
    {
        foreach ($news as $oneNews){
            $oneNews['slug'] = $slug;
            $date = $oneNews['pubDate'];
            $oneNews['pubDate'] =
                Carbon::createFromIsoFormat('!D MMM YYYY HH:mm:ss ZZ', $date)
                    ->isoFormat('DD MMM YYYY HH:mm');
            $oneNews['pubDateFormatted'] =
                Carbon::createFromIsoFormat('!D MMM YYYY HH:mm:ss ZZ', $date)
                    ->isoFormat('YYYY-MM-DD HH:mm');
            $newsWithSlug[] = $oneNews;

        }
        return $newsWithSlug;
    }


    public function saveData(): void
    {
        $data = $this->getData();
        $news = $data['news'];
        $slug = $this->getSlug($data['title']);
        $news = $this->addSlug($slug, $news);
        DB::table('parsedNews')->insertOrIgnore($news);
        Categories::updateOrCreate(['name' => $slug]);

//        ParsedNews::updateOrCreate([
//            ['title'=>'q','link'=>'q','guid'=>1,'description'=>'q','image'=>'q','pubDate'=>'q'],
//            ['title'=>'a','link'=>'a','guid'=>1,'description'=>'a','image'=>'a','pubDate'=>'a'],
//        ]);

//        App\Models\Flight::upsert([
//            ['departure' => 'Oakland', 'destination' => 'San Diego', 'price' => 99],
//            ['departure' => 'Chicago', 'destination' => 'New York', 'price' => 150]
//        ],
//            ['departure', 'destination'], ['price']);

//      $catName = $this->getCategoryName($data);
//        $title = $data['title'];
//        $news = $data['news'];
//        $this->addCategory($data);

//        Categories::updateOrCreate(['name' => $catName]);
//        $categoryId = Categories::where('name', '=', $catName)->get('id')->toArray();
//
//        dd($categoryId);
//        News::create($news);

//        App\Models\Flight::upsert([
//            ['departure' => 'Oakland', 'destination' => 'San Diego', 'price' => 99],
//            ['departure' => 'Chicago', 'destination' => 'New York', 'price' => 150]
//        ], ['departure', 'destination'], ['price']);

//        $json = json_encode($this->getData(), JSON_UNESCAPED_UNICODE);
//        Storage::disk('local')->put($this->url . ".txt", $json);
//        $data = $this->getData();
//        Categories::create($data->title);
//        Categories::create('news');

//        $categories = Categories::create([
//            'name' => 'Taylor',
//        ]);
//        dd($categories);
//        $categories->save();

    }
}

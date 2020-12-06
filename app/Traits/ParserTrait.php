<?php


namespace App\Traits;


trait ParserTrait
{
    protected $parsedNewsArr;


    public function getParsedNews($slug=null, $id=null)
    {
        $parsedNews = \Storage::disk('local')->files('/https:/news.yandex.ru');
        foreach ($parsedNews as $pNews) {
            $newsPath = \Storage::disk('local')->get($pNews);
            $parsedNews = json_decode($newsPath);
            $parsedCategory = $parsedNews->title;
            $pattern = '/(Яндекс.Новости: )([а-яА-Яёa-zA-Z])/';
            $replacement = '$2';
            $parsedNews->slug = preg_replace($pattern, $replacement, $parsedCategory);
            $this->parsedNewsArr[] = $parsedNews;
        }
        if(isset($id)){
            return $this->getOneNews($slug, $id);
        }
        if(isset($slug)){
            return $this->getOneCategory($slug);
        }

        return $this->parsedNewsArr;
    }

    public function getOneNews($slug, $id)
    {
        foreach ($this->getOneCategory($slug)->news as $key => $oneNews){
            if ($key == $id){
                return $oneNews;
            }
        }
    }

    public function getOneCategory($slug)
    {
        foreach ($this->parsedNewsArr as $oneCategory){
            if ($oneCategory->slug == $slug){
                return $oneCategory;
            }
        }
    }

}

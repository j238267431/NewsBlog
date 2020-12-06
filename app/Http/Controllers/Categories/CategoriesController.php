<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\ParsedNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categories;
use App\Traits\ParserTrait;
use mysql_xdevapi\Table;
use phpDocumentor\Reflection\Types\Collection;

class CategoriesController extends Controller
{
use ParserTrait;
    public function index()
    {
//        dd(Categories::find(1)->news);
        $categories = $this->getCategoryList();
        $news = News::all()->take(5);
        if(isset($_GET['slug'])){
            $news = ParsedNews::all()->where('slug', '=', $_GET['slug']);
        }

            return view('categories.categories', [
                'categories' => $this->getCategoryList(),
                'titleNews' => $news,
            ]);

    }

    public function show($slug)
    {
        $oneCategory = Categories::where('name', '=', $slug)->first();
        $categories = $this->getCategoryList();
//        $news = ParsedNews::all()->where('slug', '=', $slug);
        $news = DB::table('parsedNews')
            ->orderBy('pubDateFormatted', 'desc')
            ->where('slug', '=', $slug)
            ->paginate(10);
        return view('categories.show', [
            'slug' => $slug,
            'categories' => $this->getCategoryList(),
            'oneCategory' => $oneCategory,
            'news' => $news,
        ]);
    }
    public function showNews($slug, $id)
    {
        $oneNews = ParsedNews::find($id);
        return view('categories.showNews', [
            'slug' => $slug,
            'id' => $id,
            'categories' => $this->getCategoryList(),
            'oneNews' => $oneNews
        ]);
    }
}

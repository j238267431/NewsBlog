<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categories;

class CategoriesController extends Controller
{

    public function index()
    {
//        $this->categoryList = DB::select('SELECT * FROM categories');

//        $this->newsList = DB::select('SELECT * FROM news');
//        if(isset($_GET['id'])){
//            foreach($this->getNewsList($_GET['id']) as $news){
//                if ($news['categoryId'] == $_GET['id']){
//                    $this->titleNews[] = $news;
//                }
//            }
//        } else {
//            for($i=0; $i<5; $i++){
//                $this->titleNews[] = $this->newsList[$i];
//            }
//        }

        $categories = Categories::all();


        if(isset($_GET['id'])){
            return view('categories.categories', [
                'categories' => $categories,
                'titleNews' => $this->getNewsList($_GET['id']),
            ]);
        }
        return view('categories.categories', [
            'categories' => $categories,
            'titleNews' => $this->getNewsList(),
            ]);
    }

    public function show($id)
    {
//        $oneNews = [];
//        foreach($this->newsList as $news){
//            if($news){
//                if($news['id'] == $id){
//                    $oneNews = $news;
//                }
//            }
//        }
        return view('categories.show', [
            'id' => $id,
            'categories' => $this->getCategoryList(),
            'oneNews' => $this->getOneNews($id),
        ]);
    }
}

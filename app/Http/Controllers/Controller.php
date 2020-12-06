<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $titleNews;
    protected $newsList;
    protected $categoryList;
    protected $oneNews;


    public function getCategoryList()
    {
//        return $this->categoryList = DB::select('SELECT * FROM categories');
//        return $this->categoryList = DB::table('categories')->get();
        return $this->categoryList = Categories::all();
    }
    public function getNewsList()
    {
        if(isset($_GET['id'])){
//            return $this->newsList = DB::select('SELECT * FROM news where categoryId=' .$id);
            return $this->newsList = DB::table('news')
                ->where('categoryId', '=', $_GET['id'])
                ->get();
        }
//        return $this->newsList = DB::select('SELECT * FROM news limit 5');
        return $this->newsList = DB::table('news')
            ->limit(5)
            ->get();
    }


}

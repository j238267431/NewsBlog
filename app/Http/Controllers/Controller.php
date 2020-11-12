<?php

namespace App\Http\Controllers;

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
        return $this->categoryList = DB::table('categories')->get();
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
    public function getOneNews($id)
    {
        return $this->oneNews = DB::table('news')
            ->where('id', '=', $id)
            ->get();
    }
//    protected $categoryList =
//        [
//            [
//                'id' => 1,
//                'category_name' => 'Nature'
//            ],
//            [
//                'id' => 2,
//                'category_name' => 'Politics'
//            ],
//            [
//                'id' => 3,
//                'category_name' => 'Games'
//            ],
//            [
//                'id' => 4,
//                'category_name' => 'High tech'
//            ],
//            [
//                'id' => 5,
//                'category_name' => 'Auto'
//            ],
//        ];

//    protected $newsList = [
//        [
//            'id' => 1,
//            'categoryId' => 1,
//            'slug' => 'one',
//            'title' => 'news 1',
//            'description' => 'description of the news 1',
//            'author' => 'author1',
//            'img' => 'img1.jpg'
//        ],
//        [
//            'id' => 2,
//            'categoryId' => 1,
//            'slug' => 'two',
//            'title' => 'news 2',
//            'description' => 'description of the news 2',
//            'author' => 'author1',
//            'img' => 'img2.jpg'
//        ],
//        [
//            'id' => 3,
//            'categoryId' => 1,
//            'slug' => 'three',
//            'title' => 'news 3',
//            'description' => 'description of the news 3',
//            'author' => 'author1',
//            'img' => 'img3.jpg'
//
//        ],
//        [
//            'id' => 4,
//            'categoryId' => 1,
//            'slug' => 'four',
//            'title' => 'news 4',
//            'description' => 'description of the news 4',
//            'author' => 'author1',
//            'img' => 'img4.jpg'
//        ],
//        [
//            'id' => 5,
//            'categoryId' => 2,
//            'slug' => 'one',
//            'title' => 'news 5',
//            'description' => 'description of the news 5',
//            'author' => 'author1',
//            'img' => 'img5.jpg'
//        ],
//        [
//            'id' => 6,
//            'categoryId' => 2,
//            'slug' => 'two',
//            'title' => 'news 6',
//            'description' => 'description of the news 6',
//            'author' => 'author1',
//            'img' => 'img6.jpg'
//        ],
//        [
//            'id' => 7,
//            'categoryId' => 2,
//            'slug' => 'three',
//            'title' => 'news 7',
//            'description' => 'description of the news 7',
//            'author' => 'author1',
//            'img' => 'img7.jpg'
//        ],
//        [
//            'id' => 8,
//            'categoryId' => 2,
//            'slug' => 'four',
//            'title' => 'news 8',
//            'description' => 'description of the news 8',
//            'author' => 'author1',
//            'img' => 'img8.jpg'
//        ],
//        [
//            'id' => 9,
//            'categoryId' => 3,
//            'slug' => 'one',
//            'title' => 'news 9',
//            'description' => 'description of the news 9',
//            'author' => 'author1',
//            'img' => 'img9.jpg'
//        ],
//        [
//            'id' => 10,
//            'categoryId' => 3,
//            'slug' => 'two',
//            'title' => 'news 10',
//            'description' => 'description of the news 10',
//            'author' => 'author1',
//            'img' => 'img10.jpg'
//
//        ],
//        [
//            'id' => 11,
//            'categoryId' => 3,
//            'slug' => 'three',
//            'title' => 'news 11',
//            'description' => 'description of the news 11',
//            'author' => 'author1',
//            'img' => 'img11.jpg'
//        ],
//        [
//            'id' => 12,
//            'categoryId' => 3,
//            'slug' => 'four',
//            'title' => 'news 12',
//            'description' => 'description of the news 12',
//            'author' => 'author1',
//            'img' => 'img12.jpg'
//        ],
//        [
//            'id' => 13,
//            'categoryId' => 4,
//            'slug' => 'one',
//            'title' => 'news 13',
//            'description' => 'description of the news 13',
//            'author' => 'author1',
//            'img' => 'img13.jpg'
//        ],
//        [
//            'id' => 14,
//            'categoryId' => 4,
//            'slug' => 'two',
//            'title' => 'news 14',
//            'description' => 'description of the news 14',
//            'author' => 'author1',
//            'img' => 'img14.jpg'
//        ],
//        [
//            'id' => 15,
//            'categoryId' => 4,
//            'slug' => 'three',
//            'title' => 'news 15',
//            'description' => 'description of the news 15',
//            'author' => 'author1',
//            'img' => 'img15.jpg'
//        ],
//        [
//            'id' => 16,
//            'categoryId' => 4,
//            'slug' => 'four',
//            'title' => 'news 16',
//            'description' => 'description of the news 16',
//            'author' => 'author1',
//            'img' => 'img16.jpg'
//        ],
//        [
//            'id' => 17,
//            'categoryId' => 5,
//            'slug' => 'one',
//            'title' => 'news 17',
//            'description' => 'description of the news 17',
//            'author' => 'author1',
//            'img' => 'img17.jpg'
//        ],
//        [
//            'id' => 18,
//            'categoryId' => 5,
//            'slug' => 'two',
//            'title' => 'news 18',
//            'description' => 'description of the news 18',
//            'author' => 'author1',
//            'img' => 'img18.jpg'
//        ],
//        [
//            'id' => 19,
//            'categoryId' => 5,
//            'slug' => 'three',
//            'title' => 'news 19',
//            'description' => 'description of the news 19',
//            'author' => 'author1',
//            'img' => 'img19.jpg'
//        ],
//        [
//            'id' => 20,
//            'categoryId' => 5,
//            'slug' => 'four',
//            'title' => 'news 20',
//            'description' => 'description of the news 20',
//            'author' => 'author1',
//            'img' => 'img20.jpg'
//        ],
//    ];
}

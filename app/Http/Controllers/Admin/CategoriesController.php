<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ParsedNews;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        return view('admin.categories.index',[
            'categories' => $this->getCategoryList()
        ]);
    }

    public function show($slug)
    {
        $news = ParsedNews::orderBy('id', 'desc')->where('slug', '=', $slug)->paginate(4);

        return view ('admin.news.index', [
            'news' => $news,
            'categories' => $this->getCategoryList(),
            'slug'=>$slug,
        ]);
    }
}

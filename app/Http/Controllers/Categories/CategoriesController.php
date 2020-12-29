<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Models\comments;
use App\Models\News;
use App\Models\ParsedNews;
use App\Models\RepliesComments;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $news = ParsedNews::paginate(30);
//        if(isset($_GET['slug'])){
//            $news = ParsedNews::all()->where('slug', '=', $_GET['slug']);
//        }

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


    public function showNews(Request $request, $slug=null, $id=null)
    {

        if ($request->ajax()) {
            $slug = $request->slug;
            $id = $request->id;
        }
        $replies = RepliesComments::all()
            ->sortByDesc('created_at');

        $oneNews = ParsedNews::find($id);
        $user = null;
        if(!empty(Auth::id())){
            $user = User::find(Auth::id());
        }
        $comments = DB::table('comments')
            ->where('news_id', '=', $id)
            ->where('to_comment_id', '=', null)
            ->orderBy('created_at', 'desc')
            ->paginate(2);

        $commentsQty = comments::all()
            ->where('news_id', '=', $id)
            ->where('to_comment_id', '=', null)
            ->count();

        $categories = $this->getCategoryList();
        if(isset($request)) {
            if ($request->ajax()) {
                return view('comments', compact([
                    'slug',
                    'comments',
                    'oneNews',
                    'id',
                    'categories',
                    'user',
                    'replies',
                    'commentsQty']))->render();
            }
        }
        return view('categories.showNews', compact([
            'slug',
            'comments',
            'oneNews',
            'id',
            'categories',
            'user',
            'replies',
            'commentsQty']));
    }
}

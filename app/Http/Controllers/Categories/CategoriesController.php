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
    public function index(Request $request)
    {

//        $news = ParsedNews::paginate(10);

        $q = $request->searchWord;
        $slug = $request->slug;
        $max_page = 10;
        //Полнотекстовый поиск с пагинацией
        if($q == ''){
            if($slug == '') {
                $results = ParsedNews::orderByDesc('pubDateFormatted')
                    ->paginate($max_page);
            } else {
                $results = ParsedNews::orderByDesc('pubDateFormatted')
                    ->where('slug', '=', $slug)
                    ->paginate($max_page);            }
        } else {
            if($slug == '') {
                $results = ParsedNews::query()
                    ->orderByDesc('pubDateFormatted')
                    ->where('title', 'like', "%$q%")
                    ->paginate($max_page);
            } else {
                $results = ParsedNews::query()
                    ->orderByDesc('pubDateFormatted')
                    ->where('title', 'like', "%$q%")
                    ->where('slug', '=', $slug)
                    ->paginate($max_page);
            }

        }

        if($request->ajax()) {
            return view('allNews', [
                'include' => 'search.table',
                'titleNews' => $results,
            ])->render();
        }

            return view('categories.categories', [
                'categories' => $this->getCategoryList(),
                'titleNews' => $results,
            ]);

    }

    public function show($slug)
    {
        $oneCategory = Categories::where('name', '=', $slug)->first();
        $categories = $this->getCategoryList();
//        $news = ParsedNews::all()->where('slug', '=', $slug);
        $titleNews = DB::table('parsedNews')
            ->orderBy('pubDateFormatted', 'desc')
            ->where('slug', '=', $slug)
            ->paginate(10);
        return view('categories.show', [
            'slug' => $slug,
            'categories' => $this->getCategoryList(),
            'oneCategory' => $oneCategory,
            'titleNews' => $titleNews,
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
        $interestingNews = ParsedNews::query()
            ->where('slug', '=', $oneNews->slug)
            ->where('id', '!=', $oneNews->id)
            ->get()
            ->random(2);

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
            'commentsQty',
            'interestingNews']));
    }
}

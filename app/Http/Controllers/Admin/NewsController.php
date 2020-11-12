<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsCreate;
use App\Http\Requests\NewsUpdate;
use App\Models\Categories;
use App\Models\news;
use Dotenv\Exception\ValidationException;
use http\Exception\InvalidArgumentException;
use Illuminate\Http\Request;
//use Illuminate\Validation\ValidationException;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::all();
        $news = News::orderBy('id', 'desc')->paginate(4);
        return view ('admin.news.index', ['news' => $news, 'categories' => $categories ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        return view('admin.news.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsCreate $request)
    {
        $data = $request->only('title', 'categoryId', 'resourceId', 'description');
        $create = News::create($data);
        if ($create) {
            return redirect('/form/news')->with('success', 'новость добавлена');
        }
        return redirect('/form/news')->with('error', 'новость не добавлена');
    }

        /**
     * Display the specified resource.
     *
     * @param  \App\Models\news  $news
     * @return \Illuminate\Http\Response
     */
    public function show(news $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\news  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(news $news)
    {
        $categories = Categories::all();
        $data = $news->getAttributes();
        return view('admin.news.edit', [
            'news' => $data,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\news  $news
     * @return \Illuminate\Http\Response
     */
    public function update(NewsUpdate $request, news $news)
    {
        $categories = Categories::all();
        $id = $news->getAttribute('id');
        $row = News::find($id);
        $row->update([
            'title' => $request->input('title'),
            'categoryId' => $request->input('categoryId'),
            'resourceId' => $request->input('resourceId'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('news.index')->with('success', 'Новость изменена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\news  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(news $news)
    {
        $news->delete();
//        return response()->json(['data' => 'delete']);
//        return redirect()->route('news.index');
    }
}

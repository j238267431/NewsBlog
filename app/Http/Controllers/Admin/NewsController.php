<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsCreate;
use App\Http\Requests\NewsUpdate;
use App\Models\Categories;
use App\Models\news;
use App\Models\ParsedNews;
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
    public function index($slug)
    {
//        if(isset($_GET['slug'])) {
//            $slug = $_GET['slug'];
//        }
        $news = ParsedNews::orderBy('id', 'desc')->where('slug', '=', $slug)->paginate(4);

        return view ('admin.news.index', [
            'news' => $news,
            'categories' => $this->getCategoryList(),
            'slug'=>$slug,
        ]);
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
        $data = $request->only('title', 'categoryId', 'resourceId', 'description', 'image');

        if($request->has('image')){
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $data['image'] = $file->storeAs('news', $fileName, 'uploads');
        }
        $create = News::create($data);
        if ($create) {
            return redirect('/admin/news')->with('success', 'новость добавлена');
        }
        return redirect('/admin/news')->with('error', 'новость не добавлена');
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
     * @param ParsedNews $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ParsedNews::find($id);
        return view('admin.news.edit', [
            'news' => $data,
            'categories' => $this->getCategoryList(),
            'slug' => $data->slug,
            'id' => $data->id,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NewsUpdate $request
     * @param ParsedNews $news
     * @return \Illuminate\Http\Response
     */
    public function update(NewsUpdate $request, ParsedNews $news)
    {

        $categories = Categories::all();
        $id = $news->getAttribute('id');
        $row = ParsedNews::find($id);
        $row->update([
            'title' => $request->input('title'),
            'slug' => $request->input('categoryId'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('admin.news', ['slug' => $row->slug])->with('success', 'Новость изменена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $row = ParsedNews::find($_GET['news']);
        $row->delete();
        return redirect()->route('admin.news', ['slug' => $row->slug])->with('success', 'Новость удалена');


//        return response()->json(['data' => 'delete']);
//        return redirect()->route('news.index');
    }


}

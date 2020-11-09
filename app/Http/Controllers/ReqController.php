<?php

namespace App\Http\Controllers;

use App\Models\Categories;
//use App\Models\Request;
use Illuminate\Http\Request;
use App\Models\Req;

class ReqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        return view('forms.request.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->only('name', 'phone', 'email', 'request');
//        dd($data);
        $create = Req::create($data);
        if($create){
            return back()->with('success', 'request succesfully added');
        }
        return back()->with('error', 'request did not added');



//        $data = $request->only(['name', 'phone', 'email', 'request']);
//        $saveFile = function(array $data) {
//            $responseData = [];
//            $fileNews = storage_path('app/news.txt');
//            if(file_exists($fileNews)) {
//                $file = file_get_contents($fileNews);
//                $response = json_decode($file, true);
//            }
//
//
//            $responseData[] = $data;
//            if(isset($response) && !empty($response)) {
//                $r = array_merge($response, $responseData);
//            }else {
//                $r = $responseData;
//            }
//            file_put_contents($fileNews, json_encode($r));
//        };
//
//        $saveFile($data);
//
//        return redirect()->route('request.create')->with('message', 'the request successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Req  $req
     * @return \Illuminate\Http\Response
     */
    public function show(Req $req)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Req  $req
     * @return \Illuminate\Http\Response
     */
    public function edit(Req $req)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Req  $req
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Req $req)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Req  $req
     * @return \Illuminate\Http\Response
     */
    public function destroy(Req $req)
    {
        //
    }
}

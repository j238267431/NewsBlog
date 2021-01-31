<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentsCreate;
use App\Models\comments;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo 'helloIndex';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo 'helloCreate';
    }


    /**
     * @param CommentsCreate $request
     * @return array
     */
    public function store(CommentsCreate $request)
    {
        $userName = 'Anonimus';
        if(isset(Auth::user()->name)){
            $userName = Auth::user()->name;
        }
        if(!empty($request->user_name)){
            $userName = $request->user_name;
        }


        $res = Comments::create([
            'news_id'=>$request->newsId,
            'body'=>$request->body,
            'user_id'=>\Auth::id(),
            'user_name'=>$userName,
            'to_comment_id'=>$request->commentId,
        ]);
        $carbondate = Carbon::parse($res->created_at);
        $past = $carbondate->diffForHumans();
        $created_at = $carbondate->format('M d, Y (H:i)');

        $data = [
            'id'=>$res->id,
            'body'=>$request->body,
            'userName'=>$userName,
            'createdAt'=>$created_at,
            'slug'=>$request->slug,
            'newsid'=>$request->newsId,
            'commentId' => $request->commentId,
            ];
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function show(comments $comments)
    {
        return "show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function edit(comments $comments)
    {
        echo 'helloEdit';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, comments $comments)
    {
        echo 'hello';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function destroy(comments $comments)
    {
        echo 'hello';
    }
}

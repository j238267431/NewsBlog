<?php

namespace App\Http\Controllers;

use App\Models\Likes;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function store(Request $request)
    {
        $likeToId = $request->commentId;
        if(isset($request->replyId)){
            $likeToId = $request->replyId;
        }
        $type = $request->type;

        Likes::create([
           'like_to' => $type,
           'like_to_id' =>  $likeToId,
        ]);
        $likesQty = Likes::all()->where('like_to_id', '=', $likeToId)->count();
        $data = [
            'type' => $type,
            'likeToId' => $likeToId,
            'likesQty' => $likesQty,
        ];

        return $data;
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\RepliesComments;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    public function store(Request $request)
    {
        $toCommentId = $request->commentId;
        $body = $request->body;
        $res = RepliesComments::create([
            'to_comment_id' =>  $toCommentId,
            'body' => $body,
        ]);
        $carbondate = Carbon::parse($res->created_at);
        $past = $carbondate->diffForHumans();
        $created_at = $carbondate->format('M d, Y (H:i)');
        $data = [
            'replyId' => $res->id,
            'body' => $body,
            'toCommentId' => $toCommentId,
            'createdAt' => $created_at,
        ];
        return $data;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function storeComment(Request $request, $article_id)
    {
       $comment = new Comment();
       $comment->comment = request('comment');
       $comment->user_id = auth()->user()->id;
       $comment->article_id = $article_id;
       $comment->save();
       return back();
    }
}

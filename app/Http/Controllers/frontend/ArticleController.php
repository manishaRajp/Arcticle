<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
   public function  like(Request $req, $id)
   {
        $like = new Like();
        $art_id = Article::find($id);
        $user_Id = Auth::id();
        $like->user_Id = $user_Id;
        $like->art_id = $art_id->id;
        $like->status = 'Like';
        $like->save();
        return redirect()->back();
   }

    public function dislikes(Request $request)
    {
        $art_id = Article::find($request['id']);
        $dislike = Like::where('user_id', Auth::user()->id)->where('art_id', $art_id->id)->first();
        $dislike->forceDelete();
        return redirect()->back();
    }
    public function comment(Request $request, $id)
    {
        $comment = new Comment();
        $art_id = Article::where('id', $id)->first();
        $user_Id = Auth::id();
        $comment->name = Auth::user()->name;
        $comment->user_Id = $user_Id;
        $comment->art_id = $art_id->id;
        $comment->comment = $request['comment'];
        $comment->save();
        return redirect()->back();
    }
}

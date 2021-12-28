<?php

namespace App\Http\Controllers\APi;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function showarticle()
    {
        return Article::get();
    }

    public function artilcelike()
    {
        $like = new Like();
        $art_id = Article::get()->first();
        $user_Id = Auth::user()->id;
        $like->user_Id = $user_Id;
        $like->art_id = $art_id->id;
        $like->status = 'Like';
        $like->save();
        return response([
            'User name' => Auth::user()->name,
            'Request Sent' => "thanks For ur like"
        ]);
    }

    public function artilcedislike(Request $request)
    {
        $art_id = Article::get()->first();
        $dislike = Like::where('user_id', Auth::user()->id)->where('art_id', $art_id->id)->first();
        $dislike->forceDelete();
        return response([
            'User name' => Auth::user()->name,
            'Request Sent' => "😏😏😏😏Dislike done"
        ]);
    }

    public function artilcecomment(Request $request,$id)
    {
        $comment = new Comment();
        $art_id = Article::where('id', $id)->first();
        $user_Id = Auth::id();
        $comment->name = Auth::user()->name;
        $comment->user_Id = $user_Id;
        $comment->art_id = $art_id->id;
        $comment->comment = $request['comment'];
        $comment->save();
         return response([
         'User name' => Auth::user()->name,
         'Request Sent' => "😃😃 Thanks for valueable comment"
         ]);
    }
}

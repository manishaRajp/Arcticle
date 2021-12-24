<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $posts = Post::all();
        $art = Article::all();
        $like_user = Like::all();
        return view('frantend.welcome', compact('art', 'like_user','posts'));
    }

    // public function like()
    // {
    //     dd(2435);
    //     $like = new Like();
    //     $art = Article::all();
    //     $user_Id = Auth::id();
    //     $like->user_Id = $user_Id;
    //     $like->status = 'Like';
    //     $like->save();
    //     return redirect()->back();
    // }
    public function user_dislikes(Request $request)
    {
        $art = Article::find($request['id']);
        $dislike = Like::where('user_id', Auth::user()->id)->where('art_id', $art->id)->first();
        return redirect()->back();
    }

    public  function done(Request $request ,$id)
    {
         $like = new Like();
         $art = Article::all();
         $user_Id = Auth::id();
         $like->user_Id = $user_Id;
         $like->status = 'Like';
         $like->save();
         return redirect()->back();
    }
}

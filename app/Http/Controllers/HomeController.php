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
        $like_user = Like::all(); 
        $posts = Post::all();
        $art = Article::all();
        return view('frantend.welcome', compact('art','posts','like_user'));
    }

 

}

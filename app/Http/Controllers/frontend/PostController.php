<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $like_user = Like::all(); 
        $posts = Post::all();
        $art = Article::all();
        return view('frantend.welcome', compact('art','posts','like_user'));
    }

  
    public function create()
    {
        return view('frantend.post_create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255|unique:posts,title|alpha',
            'body' => 'required|max:100000',
            'image' => 'required|mimes:jpg,png,jpeg,gif',
        ]);
        $add_ras = User::where('id', Auth::user()->id)->get()->first();
        $images = uploadFile($request['image'], 'PostImage');
        $news = new Post;
        $news->title = $request->title;
        $news->body = $request->body;
        $news->points += 10;
        $news->user_id = Auth::user()->id;
        $news->image = $images;
        $news->save();
        $add_ras->points += 10;
        $add_ras->save();
        return redirect()->route('post.index')->with('success', 'Post created successfully!');;
    }

    
}

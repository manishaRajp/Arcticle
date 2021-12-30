<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Like;
use App\Models\Post;
use App\Models\RechagerDetails;
use App\Models\Recharge;
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
        $user_points = User::all();
        return view('frantend.welcome', compact('art', 'posts', 'like_user', 'user_points'));
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
        $point_sum = User::where('id', Auth::user()->id)->get()->first();
        $images = uploadFile($request['image'], 'PostImage');
        $news = new Post;
        $news->title = $request->title;
        $news->body = $request->body;
        $news->points += 10;
        $news->user_id = Auth::user()->id;
        $news->image = $images;
        $news->save();
        $point_sum->points += 10;
        $point_sum->save();
        return redirect()->route('post.index')->with('success', 'Post created successfully!');
    }

    public function sendrequest(Request $request)
    {
        $request->validate([
            'points' => 'required|numeric'
        ]);
        $post_Id = Post::get()->first();
        $pointssub = User::where('id', Auth::user()->id)->get()->first();
        if ($pointssub->points > 31) {
            $recharge = new Recharge;
            $recharge->user_id = Auth::user()->id;
            $recharge->post_Id = $post_Id->id;
            $recharge->points = $request->points;
            $recharge->save();
            $pointssub->points -= 10;
            $pointssub->save();
            return redirect()->route('post.index')->with('success', 'Request sent successfully!');
        } else { 
        return redirect()->route('post.index')->with('warning',"Don't Have Requeied points");
        }
    }
    
   
}

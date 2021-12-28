<?php

namespace App\Http\Controllers\APi;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\RechagerDetails;
use App\Models\Recharge;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function addpost(Request $request)
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
        return response([
            "Post Created Successfully...you got 10 points",
            "total points .....,$point_sum->points",
        ]);
    }

    public function totalpoints()
    {
        $ponits = User::where('id', Auth::user()->id)->get()->first();
        if ($ponits->points >= 30) {
            return response([
                'Count of points total' => $ponits->points,
                'yes' =>  "You can Go for Request"
            ]);
        } else {
            return response([
                'Count of points total' => $ponits,
                'opps' => "To get points go for create post"
            ]);
        }
    }

    public function sendrequest(Request $request)
    {

        $post_Id = Post::get()->first();
        $pointssub = User::where('id', Auth::user()->id)->get()->first();
        if ($pointssub->points > 31) {
            $recharge = new RechagerDetails;
            $recharge->user_id = Auth::user()->id;
            $recharge->post_Id = $post_Id->id;
            $recharge->points = $request->points;
            $recharge->save();
            $pointssub->points -= 10;
            $pointssub->save();
            return response([
                'User name' => Auth::user()->name,
                'Request Sent' => "Done"
            ]);
        } else {
            return response([
                'User name' => Auth::user()->name,
                'Count of points total' => $pointssub->points,
                'opps' => "To get points go for create post"
            ]);
        }
    }

    public function acceptrequest(Request $request)
    {
        
        $post_Id = Post::get()->first();
        $total_points = User::where('id', Auth::user()->id)->get()->first();
        $accept_request = new Recharge;
        $accept_request->post_Id = $post_Id->id;
        $accept_request->user_id = Auth::user()->id;
        $accept_request->points = $total_points->points;
        $recharge_details_delete = RechagerDetails::where('user_id', Auth::user()->id)->get();
      
        $accept_request->save();
        foreach ($recharge_details_delete as $delete_data) {
            $delete_data->delete();
        }
        return response([
            'User name' => Auth::user()->name,
            'Request Accepted' => "Recharge Done"
        ]);
    }
}

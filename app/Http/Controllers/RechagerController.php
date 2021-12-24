<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Rechager;
use App\Models\RechagerDetails;
use App\Models\Recharge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RechagerController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $rech = RechagerDetails::all();
        return view('frantend.welcome', compact('posts', 'rech'));
    }
    public function create(Request $request)
    {
        $rech = RechagerDetails::all();
        $ponits = Post::select('points')->where('user_id', Auth::user()->id)->pluck('points')->toArray();
        $sum = collect($ponits)->sum();
        $value = $sum - $request->points;
        $post_Id = Post::get()->first();
        $detail = new RechagerDetails();
        $detail->user_id = Auth::user()->id;
        $detail->post_Id = $post_Id->id;
        $detail->points = $sum;
        $detail->save();
        return view('frantend.rechargar.reg_add', compact('detail', 'post_Id', 'rech', 'sum','value'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'points' => 'required|numeric'
        ]);
        $post_Id = Post::get()->first();
        $ponits = Post::select('points')->where('user_id', Auth::user()->id)->pluck('points')->toArray();
        $sum = collect($ponits)->sum();
        $value = $sum - $request->points;
        $recharge = new Recharge;
        $recharge->user_id = Auth::user()->id;
        $recharge->post_Id = $post_Id->id;
        $recharge->points = $value;
        $recharge->save();
        return view('frantend.rechargar.reg_add', compact('value', 'sum'));
        // return redirect()->route('rechger.index',compact('value'))->with('success', 'Recharge done successfully!');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\RechargeDataTable;
use App\Http\Controllers\Controller;
use App\Mail\NotifyMail;
use App\Models\Notification;
use App\Models\Post;
use App\Models\Rechager;
use App\Models\RechagerDetails;
use App\Models\Recharge;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RechargeController extends Controller
{

    public function index(RechargeDataTable $dataTable)
    {
        return $dataTable->render('Backend.rechargar.reg_view');
    }

    public function create()
    {
        dd(354);
    }

    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

    public function Rechargestatus(Request $request)
    {

        $id = $request['id'];
        $recharge = Recharge::find($id);
        if ($recharge->status == "1") {
            $recharge->status = "0";
            Notification::create([
                'user_id' => $recharge->user_id,
                'post_id' => $recharge->post_id,
                'message' => "Your Request has been Approved",
                'status' => 'approve',
            ]);
            $user = User::find(1)->toArray();
            Mail::send('backend.userMail', $user, function ($message) use ($user) {
                $message->to($user['email']);
                $message->subject('Welcome Mail');
            });
        } else {
            $recharge->status = "1";
        }
        $recharge->save();
        return response()->json(['data' => $recharge]);
    }
}

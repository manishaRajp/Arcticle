<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
     public function changePasswordview()
     {
          return view('Backend.Admin.changePassword');
     }

     public function changePassword(Request $request)
     {
          $request->validate([
               'oldpassword' => ['required', new MatchOldPassword],
               'newpassword' => ['required'],
               'password_confirmation' => ['same:newpassword'],
          ]);
          Admin::find(auth()->user()->id)->update(['password' => Hash::make($request->newpassword)]);
          return view('Backend.Admin.dashboard');
     }


     public function profileview()
     {
          return view('Backend.Admin.profile');
     }

     public function profileupdate(Request $request)
     {
     $admin = Admin::get()->first();
     $admin->name = $request->name;
     $admin->email = $request->email;
     $admin->save();
     return view('Backend.Admin.dashboard');
     }
}

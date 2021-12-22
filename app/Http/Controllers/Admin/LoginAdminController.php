<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = "admin/dasboard";

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('Backend.Admin.login');
    }
    
    protected function attemptLogin(Request $request)
    {
        return $this->guard('admin')->attempt(
            $this->credentials($request),
            $request->filled('remember')
        );
    }

    public function logout(Request $request)
    {
        $this->guard('admin')->logout();
        return redirect()->route('admin.admin_login');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

}

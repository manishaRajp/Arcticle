<?php

namespace App\Http\Controllers\API;

use App\Contracts\LoginContracts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class LoginController extends Controller
{
public function __construct(LoginContracts $loginServices)
{
$this->loginServices = $loginServices;
}

public function register(Request $request){
return $this->loginServices->register($request->all());
}
public function login(Request $request){
return $this->loginServices->login($request->all());
}
}

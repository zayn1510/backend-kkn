<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\akun\LoginRequest;
use App\Repository\Admin\LoginAdminRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginControllerAdmin extends Controller
{
    public function login(Request $loginRequest){
        return LoginAdminRepo::login_akun($loginRequest);
    }

    public function logout(){
        Auth::logout();
        return redirect("/");
    }
}

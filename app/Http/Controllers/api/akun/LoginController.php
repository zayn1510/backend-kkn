<?php

namespace App\Http\Controllers\api\akun;

use App\Http\Controllers\Controller;
use App\Http\Requests\akun\LoginRequest;
use App\Repository\Akun\LoginRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Summary of login_akun
     * @param \App\Http\Requests\akun\LoginRequest $loginRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function login_akun(LoginRequest $loginRequest) : JsonResponse
    {
        return LoginRepository::login_akun($loginRequest);
    }

    /**
     * Summary of detail_akun
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function detail_akun($id) : JsonResponse
    {
        return LoginRepository::detail_akun($id);
    }

    /**
     * Summary of akun_pengguna
     * @return \Illuminate\Http\JsonResponse
     */
    public function akun_pengguna() : JsonResponse
    {
        return LoginRepository::akun_pengguna();
    }


}

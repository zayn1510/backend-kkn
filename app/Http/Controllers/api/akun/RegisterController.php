<?php

namespace App\Http\Controllers\api\akun;

use App\Http\Controllers\Controller;
use App\Http\Requests\akun\RegistrasiRequest;

use App\Repository\Akun\RegisterRepository;


class RegisterController extends Controller
{
    /**
     * Summary of register_akun
     * @param \App\Http\Requests\akun\RegistrasiRequest $registrasiRequest
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    function register_akun(RegistrasiRequest $registrasiRequest){

        return RegisterRepository::register_akun($registrasiRequest);
    }
}

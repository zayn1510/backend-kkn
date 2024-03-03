<?php
namespace App\Repository\Admin;
use App\Http\Requests\akun\LoginRequest;
use App\Models\akun\PenggunaModel;
use App\Models\mahasiswa\MahasiswaModel;
use Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class LoginAdminRepo{


    /**
     * Summary of login_akun
     * @param \App\Http\Requests\akun\LoginRequest $loginRequest
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public static function login_akun(Request $loginRequest):JsonResponse{

        try {
            $infologin=$loginRequest->only("username","password");
            if(Auth::attempt($infologin)){
                $dashboard=getenv("URL_APP")."admin/dashboard";
                 return response()->json(["message"=>"login has success","success"=>true,'redirect'=>$dashboard,"role"=>Auth::user()->role],200);
            }
            return response()->json(["message"=>"Login has failed","success"=>false],200);

        } catch (\Throwable $th) {
            return response()->json(["message"=>"Error ".$th->getMessage(),"success"=>false]);
        }
    }

    public static function detail_akun($id){

       try {
        if(is_int($id)) return response()->json(["message"=>"Value Must Be Number","success"=>false],200);
        $data=MahasiswaModel::findOrFail($id);
        return response()->json(["message"=>"Data Found","success"=>true,"data"=>$data],200);
       } catch (ModelNotFoundException $th) {
        return response()->json(["message"=>"Invalid ID Pengguna","success"=>false]);
       }

    }


}


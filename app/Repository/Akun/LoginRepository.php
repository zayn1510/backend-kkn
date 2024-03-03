<?php
namespace App\Repository\Akun;
use App\Http\Requests\akun\LoginRequest;
use App\Http\Requests\akun\RegistrasiRequest;
use App\Models\akun\PenggunaModel;
use App\Models\mahasiswa\MahasiswaModel;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\JsonResponse;

class LoginRepository{


    /**
     * Summary of login_akun
     * @param \App\Http\Requests\akun\LoginRequest $loginRequest
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public static function login_akun(LoginRequest $loginRequest):JsonResponse{

        try {
            $check=Auth::attempt($loginRequest->only("username","password"));
            $id_pengguna=Auth::user()->id_pengguna;
            if($check) return response()->json(["message"=>"login has success","success"=>true,"id_pengguna"=>$id_pengguna],200);
            return response()->json(["message"=>"Login has failed","success"=>false,"payloads"=>$loginRequest->all()],200);

        } catch (\Throwable $th) {
            return response()->json(["message"=>"Error ".$th->getMessage(),"success"=>false,"payload"=>$loginRequest->all()]);
        }
    }

    public static function detail_akun($id){

       try {
        if(is_int($id)) return response()->json(["message"=>"Value Must Be Number","success"=>false],200);
        MahasiswaModel::findOrFail($id);
        $data=DB::table(("tbl_mahasiswa as mhs"))
        ->join("tbl_fakultas as f","f.id_fakultas","=","mhs.id_fakultas")
        ->join("tbl_jurusan as j","j.id_jurusan","=","mhs.id_jurusan")
        ->whereRaw("id_mhs=?",[$id])
        ->selectRaw("mhs.id_mhs,mhs.nim_mhs,mhs.nama_mhs,mhs.tempat_lahir_mhs,
            mhs.tgl_lahir_mhs,mhs.nomor_hp_mhs,mhs.email_mhs,mhs.angkatan_mhs,mhs.foto_mhs,f.nama_fakultas,j.nama_jurusan")
        ->first();
        $data->foto_mhs=isset($data->foto_mhs) ? "mahasiswa/".$data->nim_mhs."/".$data->foto_mhs : "akun/default.jpg";
        return response()->json(["message"=>"Data Found","success"=>true,"data"=>$data],200);
       } catch (ModelNotFoundException $th) {
        return response()->json(["message"=>"Invalid ID Pengguna","success"=>false]);
       }

    }

    public static function akun_pengguna(){

        try {
            $data=DB::table("users")->selectRaw("*")->get();
            return response()->json(["message"=>"Data Found","success"=>true,"data"=>$data],200);
        } catch (ModelNotFoundException $th) {
            return response()->json(["message"=>"Invalid ID Pengguna","success"=>false]);
        }

     }


}


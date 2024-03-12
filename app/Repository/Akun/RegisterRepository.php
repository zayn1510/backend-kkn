<?php
namespace App\Repository\Akun;
use App\Http\Requests\akun\RegistrasiRequest;
use App\Models\akun\PenggunaModel;
use App\Models\mahasiswa\MahasiswaModel;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\JsonResponse;

class RegisterRepository{


    public static function register_akun(RegistrasiRequest $registrasiRequest):JsonResponse{

        try {
            DB::beginTransaction();
            $registrasiRequest["token"]=Str::password(40);
            $mhs=MahasiswaModel::where("nim_mhs",$registrasiRequest->only("nim"))->get();
            if(count($mhs)==0){
                return response()->json(["message"=>"nim anda tidak ditemukan !","success"=>false,"found"=>false],200);
            }

            // give value to tgl,id_pengguna,and password
            $registrasiRequest["tgl"]=date("Y-m-d");
            $input['id_pengguna'] = $mhs[0]->id_mhs;
            $registrasiRequest["id_pengguna"]=$mhs[0]->id_mhs;
            $registrasiRequest["password"]=Hash::make($registrasiRequest["password"]);

            // check account exist or not
            $check=User::where("id_pengguna",$registrasiRequest["id_pengguna"])->get();
            if(count($check)>0){
                return response()->json(["message"=>"nim already be there","success"=>false,"nim"=>true],200);
            }

            $mahasiswa=MahasiswaModel::where("nim_mhs",$registrasiRequest["nim"])->first();
            $mahasiswa->email_mhs=$registrasiRequest["email"];
            $mahasiswa->save();
            // // create account user
            User::create($registrasiRequest->all());
            DB::commit();
            return response()->json(["message"=>"registrasi has success","success"=>true],200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(["message"=>"Error ".$th->getMessage(),"success"=>false]);
        }
    }


}


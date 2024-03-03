<?php
namespace App\Repository\Akademik;
use App\Http\Requests\mahasiswa\BerkasRequest;
use App\lib\Uploadfile;
use App\Models\mahasiswa\berkasCalonKknModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class BerkasRepository{


    static function upload_berkas_calon_kkn(Request $request){
        try {
            $result=Uploadfile::upload_berkas_calon_kkn($request);
            $tipe=$request->tipe;
            $check=$result["success"];
            if($check){
                $colomn=array($tipe=>$result["data"]);

                berkasCalonKknModel::findOrFail($request->only("id_berkas_calon_kkn"));
                berkasCalonKknModel::where("id_berkas_calon_kkn",$request->id_berkas_calon_kkn)->update($colomn);
                return ["message"=>"Upload File Berhasil","success"=>true,"data"=>$result["data"]];
            }
            return ["message"=>"Upload File Gagal","success"=>false,"data"=>$result["data"]];
        }
        catch(ModelNotFoundException $e){
            return response()->json(["message"=>"Invalid ID","success"=>false],500);
        }
     catch (\Throwable $th) {
        return response()->json(["message"=>"Something Error To Query Results ".$th->getMessage(),"success"=>false],500);
    }


    }


}


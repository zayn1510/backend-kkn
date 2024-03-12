<?php

namespace App\Repository\Akademik;
use App\Http\Requests\akademik\JurusanRequest;
use App\Models\akademik\JurusanModel;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;


/**
 * Summary of FakultasRepository
 */
class JurusanRepository{



    /**
     * Summary of loadDadta
     * @return \Illuminate\Http\JsonResponse
     */
    public static function loadDadta():JsonResponse{
        try {
            $column=["jurusan.id_jurusan","jurusan.kode_jurusan","jurusan.nama_jurusan","fakultas.id_fakultas","fakultas.nama_fakultas"];
            $tables_relationship=["tbl_jurusan as jurusan","tbl_fakultas as fakultas"];
            $data=DB::table($tables_relationship[0])
            ->join($tables_relationship[1],"fakultas.id_fakultas","=","jurusan.id_fakultas")->select($column)->get();
            return response()->json(["data"=>$data,"message"=>"success"],200);
            } catch (\Throwable $th) {
                return response()->json(["code"=>$th->getCode(),"message"=>"Error ".$th->getMessage()],500);
            }
    }


    /**
     * Summary of createData
     * @param mixed $r
     * @return \Illuminate\Http\JsonResponse
     */
    public static function createData(JurusanRequest $r):JsonResponse{
        try {
            
            $query=JurusanModel::create($r->validated());
            if($query) return response()->json(["check"=>1, "message"=>"Success"],200);
            return response()->json(["check"=>0,"message"=>"Failed"]);

        } catch (\Throwable $th) {
          return response()->json([
            "check"=>0,
            "message"=>$th->getMessage(),
            "status"=>500
          ]);
        }

    }


    /**
     * Summary of updateData
     * @param mixed $r
     * @return \Illuminate\Http\JsonResponse
     */
    public static function updateData(JurusanRequest $r):JsonResponse{
        try {
            $allowupdate=$r->only("id_fakultas","kode_jurusan","nama_jurusan");
            $query=JurusanModel::where("id_jurusan",$r->only("id_jurusan"))->update($allowupdate);
            if($query)return response()->json(["check"=>1,"message"=>"Success"],200);
            return  response()->json(["check"=>0,"message"=>"Failed"],500);
        } catch (\Throwable $th) {
          return response()->json(["check"=>0,"message"=>$th->getMessage()],500);
        }
    }


    /**
     * Summary of deleteData
     * @param mixed $id_jurusan
     * @return \Illuminate\Http\JsonResponse
     */
    public static function deleteData($id_jurusan):JsonResponse{
        try {
            JurusanModel::findOrFail($id_jurusan);
            JurusanModel::where("id_jurusan",$id_jurusan)->delete();
            return response()->json(["check"=>1,"message"=>"Success"],200);
        } catch (ModelNotFoundException $th) { return response()->json(["check"=>0,"message"=>"Invalid value parameter"],500);}
        catch (Exception $e) { return response()->json(["check"=>0,"message"=>"Error in ur server"],500);}
    }

}

?>

<?php

namespace App\Repository\Akademik;
use App\Http\Requests\akademik\FakultasRequest;
use App\Models\akademik\FakultasModel;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;



/**
 * Summary of FakultasRepository
 */
class FakultasRepository{


    /**
     * Summary of loadDadta
     * @return array
     */
    public static function loadDadta(){
        try {

            $data=DB::table("tbl_fakultas")->select("*")->get();
            return[
                "data"=>$data,
                "code"=>200,
                "message"=>"success",
            ];
            } catch (\Throwable $th) {
                return[
                    "code"=>$th->getCode(),
                    "message"=>$th->getMessage()
                ];
            }
    }



    /**
     * Summary of createData
     * @param mixed $r
     * @return \Illuminate\Http\JsonResponse
     */
    public static function createData(FakultasRequest $r):JsonResponse{
        try {
            $allowinsert=$r->only("kode_fakultas","nama_fakultas");
            $query=FakultasModel::create($allowinsert);
            if($query){
              return response()->json([
                "check"=>1,
                "message"=>"Success",
              ],200);
            }
            return response()->json([
                "check"=>0,
                "message"=>"Failed",
              ],500);
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
    public static function updateData(FakultasRequest $r):JsonResponse{
        try {
            $allowupdate=$r->only("kode_fakultas","nama_fakultas");
            $query=FakultasModel::where("id_fakultas",$r->only("id_fakultas"))->update($allowupdate);
            if($query){
              return response()->json([
                "check"=>1,
                "message"=>"Success",
              ],200);
            }
            return response()->json([
                "check"=>0,
                "message"=>"Failed",
              ],500);
        } catch (\Throwable $th) {
          return  response()->json([
            "check"=>0,
            "message"=>$th->getMessage(),
          ],500);
        }
    }


    /**
     * Summary of deleteData
     * @param mixed $id_fakultas
     * @return \Illuminate\Http\JsonResponse
     */
    public static function deleteData($id_fakultas):JsonResponse{
        try {
            $check=FakultasModel::findOrFail($id_fakultas);
            FakultasModel::where("id_fakultas",$id_fakultas)->delete();
            return response()->json([
                "check"=>1,
                "message"=>"Success",
              ],200);

        } catch(ModelNotFoundException $e){
            return response()->json([
                "check"=>0,
                "message"=>"Invalid Id",
              ],500);
        } catch(Exception $e){
            return response()->json([
                "check"=>0,
                "message"=>"Error ".$e->getMessage(),
              ],500);
        }
    }

}


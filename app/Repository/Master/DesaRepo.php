<?php

namespace App\Repository\Master;
use App\Http\Requests\master\DesaRequest;
use App\Models\master\DesaModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class DesaRepo{

    /**
     * Summary of load_data
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public static function load_data(){
        try {
            $result=DB::table("tbl_desa as ds")->join("tbl_periode_kkn as pk","pk.id_periode_kkn","=","ds.id_periode_kkn")
            ->whereRaw("pk.status=?",[1])
            ->selectRaw("ds.id_desa,ds.kabupaten,ds.kecamatan,ds.desa,pk.tahun_akademik,pk.angkatan,pk.id_periode_kkn")->get();

            return response()->json(["message"=>"success","success"=>true,"data"=>$result],200);
        } catch (\Throwable $th) {
            return response()->json(["message"=>"error in server ","success"=>false,"data"=>[]],500);
        }
    }

    /**
     * Summary of save_data
     * @param \App\Http\Requests\master\DesaRequest $request
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public static function save_data(DesaRequest $request){
        try {
            DesaModel::create($request->validated());
            return response()->json(["message"=>"success","success"=>true],200);
        } catch (\Throwable $th) {
            return response()->json(["message"=>"error in server ".$th->getMessage(),"success"=>false],500);
        }
    }
    /**
     * Summary of update_data
     * @param \App\Http\Requests\master\DesaRequest $desaRequest
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public static function update_data(DesaRequest $desaRequest){
        try {
            DesaModel::findOrFail($desaRequest->id_desa);
            DesaModel::where("id_desa",$desaRequest->id_desa)->update($desaRequest->except("id_desa"));
            return response()->json(["message"=>"success","success"=>true],200);
        } catch(ModelNotFoundException $e){
            return response()->json(["message"=>"invalid id","success"=>false],500);
        }
        catch (\Throwable $th) {
            return response()->json(["message"=>"error in server","success"=>false],500);
        }
    }

    /**
     * Summary of delete_data
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public static function delete_data($id){
        try {
            DesaModel::findOrFail($id);
            DesaModel::where("id_desa",$id)->delete();
            return response()->json(["message"=>"success","success"=>true],200);
        } catch(ModelNotFoundException $e){
            return response()->json(["message"=>"invalid id","success"=>false],500);
        }
        catch (\Throwable $th) {
            return response()->json(["message"=>"error in server","success"=>false],500);
        }
    }
}


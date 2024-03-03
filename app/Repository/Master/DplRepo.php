<?php

namespace App\Repository\Master;
use App\Http\Requests\master\DplRequest;
use App\Models\master\DplModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DplRepo{

    /**
     * Summary of load_data
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public static function load_data(){
        try {
            $result=DB::table("tbl_dpl as dpl")->join("tbl_periode_kkn as pk","pk.id_periode_kkn","dpl.id_periode_kkn")
            ->whereRaw("pk.status=?",[1])
            ->select("dpl.id_dpl","dpl.id_periode_kkn","dpl.nama_dosen","dpl.gelar_depan","dpl.nidn","dpl.email",
            "dpl.gelar_belakang","dpl.nomor_hp","dpl.email","dpl.created_at","dpl.updated_at","pk.tahun_akademik","pk.angkatan")->get();
            return response()->json(["message"=>"success","success"=>true,"data"=>$result],200);
        } catch (\Throwable $th) {
            return response()->json(["message"=>"error in server","success"=>false],500);
        }
    }

    /**
     * Summary of save_data
     * @param \App\Http\Requests\master\DplRequest $request
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public static function save_data(DplRequest $request){
        try {
            DplModel::create($request->validated());
            return response()->json(["message"=>"success","success"=>true],200);
        } catch (\Throwable $th) {
            return response()->json(["message"=>"error in server ".$th->getMessage(),"success"=>false],500);
        }
    }
    /**
     * Summary of update_data
     * @param \App\Http\Requests\master\DplRequest $desaRequest
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public static function update_data(DplRequest $dplRequest){
        try {

            DplModel::findOrFail($dplRequest->id_dpl);
            DplModel::find($dplRequest->id_dpl)->update($dplRequest->except("id_dpl"));
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
            DplModel::findOrFail($id);
            DplModel::find($id)->delete();
            return response()->json(["message"=>"success","success"=>true],200);
        } catch(ModelNotFoundException $e){
            return response()->json(["message"=>"invalid id","success"=>false],500);
        }
        catch (\Throwable $th) {
            return response()->json(["message"=>"error in server","success"=>false],500);
        }
    }
}


<?php

namespace App\Repository\Akademik;
use App\Http\Requests\akademik\BeritaRequest;
use App\Http\Resources\api\akademik\BeritaResource;
use App\lib\Uploadfile;
use App\Models\akademik\BeritaModel;
use Crypt;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaRepository{

    public static function loadData():JsonResponse{
       try {
        return response()->json(["message"=>"success","success"=>true,"data"=>BeritaResource::collection(BeritaModel::all())],200);
       } catch (\Throwable $th) {
        return response()->json(["message"=>"failed","success"=>false],500);
       }
    }

    public static function uploadThumbnail(Request $request){
       return response()->json(Uploadfile::upload_thumbnail($request));
    }
    public static function createData(BeritaRequest $beritaRequest):JsonResponse{
        try {


            $beritaRequest["tgl"]=date("Y-m-d");
            $beritaRequest["waktu"]=date("H:s");
            $query=BeritaModel::create($beritaRequest->all());
            if($query) return response()->json(["message"=>"success","success"=>true],200);
            return response()->json(["message"=>"failed","success"=>false],200);
        } catch (\Throwable $th) {
            return response()->json(["message"=>"error ".$th->getMessage(),"success"=>false],500);
        }
    }

    public static function updateData(BeritaRequest $beritaRequest):JsonResponse{
        try {

            BeritaModel::findOrFail($beritaRequest->only("id_berita"));
            $beritaRequest["tgl"]=date("Y-m-d");
            $beritaRequest["waktu"]=date("H:s");
            BeritaModel::where("id_berita",$beritaRequest->only("id_berita"))->update($beritaRequest->all());
            return response()->json(["message"=>"Success","success"=>true],200);
        } catch(ModelNotFoundException $e){
            return response()->json(["message"=>"Invalid ID","success"=>false],500);
        }
    }

    public static function deleteData($id):JsonResponse{
        try {
            BeritaModel::findOrFail($id);
            BeritaModel::where("id_berita",$id)->delete();
            return response()->json(["message"=>"Success","success"=>true],200);
        } catch(ModelNotFoundException $e){
            return response()->json(["message"=>"Invalid ID","success"=>false],500);
        }

        catch (\Throwable $th) {
            return response()->json(["message"=>"error ".$th->getMessage(),"success"=>false],500);
        }
    }
}


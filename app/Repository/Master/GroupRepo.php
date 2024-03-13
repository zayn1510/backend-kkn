<?php

namespace App\Repository\Master;

use App\Http\Requests\master\GroupKknRequest;
use App\Models\master\DetailGroupModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;


class GroupRepo
{

    /**
     * Summary of saveData
     * @param \App\Http\Requests\master\GroupKknRequest $groupKknRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveData(GroupKknRequest $groupKknRequest): JsonResponse
    {
        try {

            // begin trancsaction database
            DB::beginTransaction();

            $groupKknRequest["created_at"] = now();
            $groupKknRequest["updated_at"] = now();
            // get id group when success insert to group_anggota_kkn
            $idgroup = DB::table("tbl_group_anggota_kkn")->insertGetId($groupKknRequest->except("mahasiswa"));

            // merge values id group in data mahassiwa to isnert detail_anggota_kkn
            $data = $groupKknRequest->get("mahasiswa");
            foreach ($data as $key => $value) {
                $data[$key]["id_group"] = $idgroup;
                $data[$key]["created_at"] = now();
                $data[$key]["updated_at"] = now();

            }

            // insert it
            DB::table("tbl_detail_anggota_kkn")->insert($data);

            // commit query
            DB::commit();
            return response()->json(["message" => "Success", "success" => true]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(["message" => "Error", "success" => false]);
        }

    }

    /**
     * Summary of getData
     * @return \Illuminate\Http\JsonResponse
     */
    public function getData(): JsonResponse
    {
        try {
            $data = DB::table("tbl_group_anggota_kkn as g")
                ->join("tbl_dpl as d", "d.id_dpl", "=", "g.id_dpl")
                ->join("tbl_desa as dsa", "dsa.id_desa", "=", "g.id_desa")
                ->leftJoin("tbl_detail_anggota_kkn as dak", "g.id", "=", "dak.id_group")
                ->selectRaw("g.id,g.id_dpl,g.id_desa,d.nidn,d.nama_dosen,d.gelar_depan,d.gelar_belakang,
                        dsa.kabupaten,dsa.kecamatan,dsa.desa, COUNT(dak.id_group) AS jumlah")
                ->groupByRaw("g.id, g.id_dpl, g.id_desa, dsa.kabupaten, dsa.kecamatan, dsa.desa, d.nidn, d.nama_dosen")
                ->get();
                $pesertnogroup=DB::table("tbl_calon_kkn as ck")->
                join("tbl_periode_kkn as pk","pk.id_periode_kkn","=","ck.id_periode_kkn")->
                join("tbl_mahasiswa as mhs","mhs.id_mhs","=","ck.id_mhs")->
                leftJoin("tbl_detail_anggota_kkn as dak","dak.id_calon_kkn","=","ck.id_calon_kkn")->
                where("pk.status",1)->
                select("ck.id_calon_kkn","mhs.nama_mhs","mhs.nim_mhs","ck.id_mhs","ck.email","ck.nomor_hp",
                "ck.kode_calon_kkn","ck.ukuran_baju","ck.kecamatan","ck.kabupaten","ck.desa",
                "ck.id_berkas_calon","ck.tgl_daftar","ck.status","ck.id_periode_kkn",
                "pk.tahun_akademik","pk.angkatan","pk.tgl_akademik","mhs.tempat_lahir_mhs","mhs.tgl_lahir_mhs",
                "mhs.angkatan_mhs","dak.id as id_detail"
                )->get();
                $filteredCollection = $pesertnogroup->filter(function ($item) {
                    return $item->id_detail === null;
                });

              // Extract 'jumlah' values into a separate array
            $jumlahValues = array_column($data->toArray(), 'jumlah');

            // Calculate the sum using array_sum
            $sum = array_sum($jumlahValues);
                 $result=[
                "data"=>$data,
                "jumlahgroup"=>count($data),
                "pesertanogroup"=>count($filteredCollection),
                "pesertagroup"=>$sum,
                "totalpeserta"=>$sum+count($filteredCollection)
            ];
            return response()->json(["message" => "success", "success" => true, "data" => $result], 200);
        } catch (\Throwable $th) {
            return response()->json(["message" => "error " . $th->getMessage(), "success" => false]);
        }
    }

    /**
     * Summary of deleteData
     * @param mixed $idgroup
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteData($idgroup): JsonResponse
    {
        try {
            DB::beginTransaction();
            $check = DB::table("tbl_group_anggota_kkn")->whereRaw("id=?", [$idgroup])->first();
            if (empty($check)) {
                return response()->json(["message" => "Invalid ID", "success" => false], 404);
            }
            DB::table("tbl_group_anggota_kkn")->whereRaw("id=?", [$idgroup])->delete();
            DB::table("tbl_detail_anggota_kkn")->whereRaw("id_group=?", [$idgroup])->delete();
            DB::commit();
            return response()->json(["message" => "Success", "success" => true], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(["message" => "Error " . $th->getMessage(), "success" => false], 500);
        }
    }

    /**
     * Summary of detailData
     * @param mixed $idgroup
     * @return \Illuminate\Http\JsonResponse
     */
    public function detailData($idgroup) : JsonResponse
    {
        try {
            $exist=DB::table("tbl_detail_anggota_kkn as dak")->
            join("tbl_calon_kkn as ckk","ckk.id_calon_kkn","=","dak.id_calon_kkn")
            ->join("tbl_mahasiswa as mhs","mhs.id_mhs","=","ckk.id_mhs")->
            whereRaw("dak.id_group=?",[$idgroup])->
            selectRaw("mhs.nim_mhs,mhs.nama_mhs")->get();
            if($exist->count()==0){
                return response()->json(["message"=>"Invalid ID","success"=>false],404);
            }
            return response()->json(["message"=>"Success","success"=>true,"data"=>$exist],200);
        } catch (\Throwable $th) {
            return response()->json(["message"=>"Error ".$th->getMessage(),"success"=>false],500);
        }
    }

     /**
     * Summary of getData
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDataUserGroup($id): JsonResponse
    {
        try {

            // check exist data in kkn

            // $akun=DB::table("tbl_mahasiswa as m")->whereRaw("")

            // check exist data
            $existcalon=DB::table("tbl_calon_kkn")->whereRaw("id_mhs=?",[$id])->select("id_calon_kkn")->first();
            if($existcalon){

                $exits= DB::table("tbl_detail_anggota_kkn")->whereRaw("id_calon_kkn=?",[$existcalon->id_calon_kkn])->selectRaw("id,id_group,id_calon_kkn")->first();

                if(!$exits){
                    return response()->json(["message" => "success", "success" => true, "data" => null], 200);
                }
                // get data group
                $group=DB::table("tbl_group_anggota_kkn as group")
                ->join("tbl_dpl as dpl","dpl.id_dpl","=","group.id_dpl")
                ->join("tbl_desa as desa","desa.id_desa","=","group.id_desa")
                ->whereRaw("group.id=?",[$exits->id_group])->selectRaw("dpl.nama_dosen,desa.kabupaten,desa.kecamatan,desa.desa")
                ->first();



                // get data member kkn
                $member=DB::table("tbl_detail_anggota_kkn as d")
                ->join("tbl_calon_kkn as c","c.id_calon_kkn","=","d.id_calon_kkn")
                ->join("tbl_mahasiswa as m","m.id_mhs","=","c.id_mhs")
                ->leftJoin("tbl_berkas_calon_kkn as b","b.id_berkas_calon_kkn","=","c.id_berkas_calon")
                ->join("tbl_fakultas as f","f.id_fakultas","=","m.id_fakultas")
                ->join("tbl_jurusan as j","j.id_jurusan","=","m.id_jurusan")
                ->whereRaw("d.id_group=?",[$exits->id_group])
                ->selectRaw("d.id_calon_kkn,m.nim_mhs,m.nama_mhs,b.foto,f.nama_fakultas,j.nama_jurusan")
                ->orderBy("m.nama_mhs","asc")->get();
                // merge data
                $exits= (object) array_merge((array) $exits, (array) $group);

                $exits->anggota=$member;
                $exits->jumlah=count($member);

                return response()->json(["message" => "success", "success" => true, "data" => $exits], 200);
            }

            return response()->json(["message"=>"Invalid ID","success"=>false],404);
        } catch (\Throwable $th) {
            return response()->json(["message" => "error " . $th->getMessage(), "success" => false]);
        }
    }
}

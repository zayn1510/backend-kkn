<?php

namespace App\Repository\User;
use Dotenv\Dotenv;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class InfoKknRepo
{
    public function getInfoKkn($id_pengguna) : JsonResponse
    {
        try {
            $data=DB::table("tbl_calon_kkn")->whereRaw("id_mhs =?",[$id_pengguna])->selectRaw("*")->first();
            if(!empty($data)){
                $mhs=DB::table("tbl_mahasiswa as mhs")
                ->join("tbl_fakultas as f","f.id_fakultas","=","mhs.id_fakultas")
                ->join("tbl_jurusan as j","j.id_jurusan","=","mhs.id_jurusan")
                ->selectRaw("mhs.id_mhs,mhs.nim_mhs,mhs.nama_mhs,mhs.tempat_lahir_mhs,mhs.tgl_lahir_mhs,mhs.angkatan_mhs,
                f.nama_fakultas,j.nama_jurusan")->whereRaw("mhs.id_mhs=:id",["id"=>$id_pengguna])->first();
                $berkas=DB::table("tbl_berkas_calon_kkn")->whereRaw("id_berkas_calon_kkn =?",[$data->id_berkas_calon])->first();
                $data->mhs=$mhs;
                $berkas->urlfoto=isset($berkas->foto) ? "calonkkn/foto/".$mhs->nim_mhs."/".$berkas->foto : null;
                $berkas->surat_izin_atasan=isset($berkas->surat_izin_atasan) ? "calonkkn/surat_izin_atasan/".$mhs->nim_mhs."/".$berkas->surat_izin_atasan :null;
                $berkas->surat_izin_ortu=isset($berkas->surat_izin_ortu) ? "calonkkn/surat_izin_ortu/".$mhs->nim_mhs."/".$berkas->surat_izin_ortu : null;
                $berkas->sertifikat_vaksin=isset($berkas->sertifikat_vaksin) ? "calonkkn/sertifikat_vaksin/".$mhs->nim_mhs."/".$berkas->sertifikat_vaksin :null;
                $berkas->transkip_nilai=isset($berkas->transkip_nilai) ? "calonkkn/transkip_nilai/".$mhs->nim_mhs."/".$berkas->transkip_nilai :null;
                $berkas->krs_terakhir=isset($berkas->krs_terakhir) ? "calonkkn/krs_terakhir/".$mhs->nim_mhs."/".$berkas->krs_terakhir :null;
                $berkas->slip_pembayaran_smt=isset($berkas->slip_pembayaran_smt) ? "calonkkn/slip_pembayaran_smt/".$mhs->nim_mhs."/".$berkas->slip_pembayaran_smt : null;
                $berkas->slip_pembayaran_kkn=isset($berkas->slip_pembayaran_kkn) ? "calonkkn/slip_pembayaran_sm/".$mhs->nim_mhs."/".$berkas->slip_pembayaran_kkn : null;
                $data->berkas=$berkas;
            }
            return response()->json(
                [
                    "message"=>"success",
                    "success"=>true,
                    "data"=>$data
                ]
            );
        }
        catch (\Throwable $th) {
            return response()->json(
                [
                    "message"=>"error ".$th->getMessage(),
                    "success"=>false,
                ]
            );
        }
    }

    public function checkPeriodeKkn(): JsonResponse
    {
        try {
            $data=[];
            $existdata=DB::table("tbl_periode_kkn as periode")->whereRaw("periode.status=?",[1])->select("*")->first();
            return response()->json(["message"=>"success","success"=>true,"data"=>$existdata],200);
        } catch (\Throwable $th) {
            return response()->json(["message"=>"error","success"=>false,],500);
        }
    }
}


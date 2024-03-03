<?php

namespace App\Http\Resources\api\mahasiswa;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CalonKknResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "idcalonkkn"=>$this->id_calon_kkn,
            "namalengkapmhs"=>$this->nama_mhs,
            "nimmhs"=>$this->nim_mhs,
            "idmhs"=>$this->id_mhs,
            "email"=>$this->email,
            "notelpon"=>$this->nomor_hp,
            "kodecalonkkn"=>$this->kode_calon_kkn,
            "ukuranbaju"=>$this->ukuran_baju,
            "desa"=>$this->desa,
            "kecamatan"=>$this->kecamatan,
            "kabupaten"=>$this->kabupaten,
            "idberkas"=>$this->id_berkas_calon,
            "tgl"=>self::alias_date($this->tgl_daftar),
            "status"=>$this->status,
            "idperiodekkn"=>$this->id_periode_kkn,
            "tahunperiodekkn"=>$this->tahun_akademik,
            "angkatanperiodekkn"=>$this->angkatan,
            "tglperiodekkn"=>$this->tgl_akademik,
            "tempatlahir"=>$this->tempat_lahir_mhs,
            "tgllahir"=>self::alias_date($this->tgl_lahir_mhs),
            "angkatanmhs"=>$this->angkatan_mhs,

        ];
    }

    private static function alias_date($tgl){
        // $namahari=["Minggu","Selasa","Rabu","Kamis","Jumat","Sabtu"];
        $namabulan=["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];

        // explode tanggal daftar peserta kkn
        $explodetgl=explode("-",$tgl);
        $date=$explodetgl[2]<9 ? (int) $explodetgl[2] : $explodetgl[2];
        $tgl_real=$date." ".$namabulan[(int)$explodetgl[1]-1]." ".$explodetgl[0];
        return $tgl_real;
    }
}

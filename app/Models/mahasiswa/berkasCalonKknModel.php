<?php

namespace App\Models\mahasiswa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class berkasCalonKknModel extends Model
{
    use HasFactory;
    protected $table="tbl_berkas_calon_kkn";

    protected $primaryKey="id_berkas_calon_kkn";
    public $timestamps=false;
    protected $fillable=["id_berkas_calon_kkn","surat_izin_atasan","sertifikat_vaksin",
    "surat_izin_ortu","krs_terakhir","transkip_nilai","slip_pembayaran_smt","slip_pembayaran_kkn","status"];
}

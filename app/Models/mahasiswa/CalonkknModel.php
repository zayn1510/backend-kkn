<?php

namespace App\Models\mahasiswa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonkknModel extends Model
{
    use HasFactory;
    protected $table="tbl_calon_kkn";

    protected $primaryKey="id_calon_kkn";
    public $timestamps=false;
    protected $fillable=[
        "id__calon_kkn","id_mhs","email","nomor_hp","email",
        "id_berkas_calon","kabupaten","kecamatan","desa",
        "tgl_daftar","ukuran_baju","kode_calon_kkn","status",
        "id_periode_kkn"
    ];
}

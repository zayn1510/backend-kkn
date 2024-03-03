<?php

namespace App\Models\mahasiswa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahasiswaModel extends Model
{
    use HasFactory;
    protected $table="tbl_mahasiswa";

    protected $primaryKey="id_mhs";
    public $timestamps=false;
    protected $fillable=[
        "id_mhs","nim_mhs","nama_mhs","tempat_lahir_mhs","tgl_lahir_mhs",
        "nomor_hp_mhs","angkatan_mhs","foto_mhs","email_mhs",
        "id_fakultas","id_jurusan"
    ];

}

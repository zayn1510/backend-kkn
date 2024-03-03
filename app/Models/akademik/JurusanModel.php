<?php

namespace App\Models\akademik;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurusanModel extends Model
{
    use HasFactory;


    protected $table="tbl_jurusan";

    protected $primaryKey="id_jurusan";
    public $timestamps=false;

    protected $fillable=[
        "id_jurusan","kode_jurusan","nama_jurusan","id_fakultas"
    ];

   public function fakultas(){
       return $this->hasOne("App\Models\akademik\FakultasModel","id_fakultas","id_fakultas");
   }
}


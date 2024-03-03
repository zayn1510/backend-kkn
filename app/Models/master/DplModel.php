<?php

namespace App\Models\master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DplModel extends Model
{
    use HasFactory;

    protected $table="tbl_dpl";
    protected $primaryKey="id_dpl";
    public $timestamps=true;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable=[
      "id_dpl","nidn","nama_dosen","gelar_depan",
      "gelar_belakang","nomor_hp","email","id_periode_kkn"
    ];
}

<?php

namespace App\Models\master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesaModel extends Model
{
    use HasFactory;

    protected $table="tbl_desa";
    protected $primaryKey="id_desa";
    public $timestamps=true;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable=[
      "id_desa","kabupaten","kecamatan","desa","id_periode_kkn"
    ];
}

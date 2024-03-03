<?php

namespace App\Models\akademik;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FakultasModel extends Model
{
    use HasFactory;

    protected $table="tbl_fakultas";// table name

    protected $primaryKey = 'id_fakultas';

    public $timestamps=false;

    protected $fillable=[
        "id_fakultas","kode_fakultas","nama_fakultas"
    ];

    public function jurusan()
    {
    	return $this->belongsTo(JurusanModel::class);
    }
}

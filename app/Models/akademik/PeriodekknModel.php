<?php

namespace App\Models\akademik;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodekknModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_periode_kkn';

    protected $primaryKey = 'id_periode_kkn';
    public $timestamps=false;

    protected $fillable=["id_periode_kkn","tahun_akademik","angkatan","status","tgl_akademik","status_pendaftaran"];
}

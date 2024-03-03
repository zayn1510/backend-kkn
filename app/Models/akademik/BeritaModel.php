<?php

namespace App\Models\akademik;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaModel extends Model
{
    use HasFactory;
    protected $table="tbl_berita";// table name

    protected $primaryKey = 'id_berita';

    public $timestamps=false;

    protected $fillable=[
       "id_berita","judul","author","konten","tgl","waktu","thumbnail"
    ];

}

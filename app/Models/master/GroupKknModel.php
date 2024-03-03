<?php

namespace App\Models\master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupKknModel extends Model
{
    use HasFactory;
    protected $table="tbl_group_anggota_kkn";
    protected $primaryKey="id";
    public $timestamps=true;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable=[
        "id","id_dpl","id_desa"
    ];
}

<?php

namespace App\Http\Resources\api\akademik;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PeriodekknResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=>$this->id_periode_kkn,
            "tahunakademik"=>$this->tahun_akademik,
            "angkatan"=>$this->angkatan,
            "status"=>$this->status,
            "tanggal"=>$this->tgl_akademik,
            "status_pendaftaran"=>$this->status_pendaftaran
        ];
    }
}

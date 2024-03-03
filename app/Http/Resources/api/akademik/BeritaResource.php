<?php

namespace App\Http\Resources\api\akademik;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BeritaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
       return [
        "idberita"=>$this->id_berita,
        "thumbnail"=>$this->thumbnail,
        "judul"=>$this->judul,
        "konten"=>$this->konten,
        "author"=>$this->author,
        "tgl"=>$this->tgl,
        "waktu"=>$this->waktu
       ];
    }
}

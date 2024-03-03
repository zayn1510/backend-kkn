<?php

namespace App\Http\Controllers\api\akademik;

use App\Http\Controllers\Controller;
use App\Http\Requests\akademik\BeritaRequest;
use App\Repository\Akademik\BeritaRepository;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function load_data(){
        return BeritaRepository::loadData();
    }


    public function upload_thumbnail(Request $r){
        return BeritaRepository::uploadThumbnail($r);
    }

    public function create_data(BeritaRequest $beritaRequest){
        return BeritaRepository::createData($beritaRequest);
    }

    public function update_data(BeritaRequest $beritaRequest){
        return BeritaRepository::updateData($beritaRequest);
    }

    public function delete_data($id){
        return BeritaRepository::deleteData($id);
    }
}

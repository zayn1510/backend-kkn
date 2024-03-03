<?php

namespace App\Http\Controllers\api\master;

use App\Http\Controllers\Controller;
use App\Http\Requests\master\DesaRequest;
use App\Models\master\DesaModel;
use App\Repository\Master\DesaRepo;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    function loadData(){
        return DesaRepo::load_data();
    }

    function saveData(DesaRequest $desaRequest){
        return DesaRepo::save_data($desaRequest);
    }

    function updateData(DesaRequest $desaRequest){
        return DesaRepo::update_data($desaRequest);
    }

    function deleteData($id){
        return DesaRepo::delete_data($id);
    }
}

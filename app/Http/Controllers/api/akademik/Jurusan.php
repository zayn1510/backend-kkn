<?php

namespace App\Http\Controllers\api\akademik;

use App\Http\Controllers\Controller;
use App\Http\Requests\akademik\JurusanRequest;
use App\Repository\Akademik\JurusanRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class Jurusan extends Controller
{
    /**
     * Summary of loadData
     * @return JsonResponse
     */
    public function loadData(){
      return JurusanRepository::loadDadta();
    }

    /**
     * Summary of saveData
     * @param \Illuminate\Http\Request $r
     * @return JsonResponse
     */
    public function saveData(JurusanRequest $r){
        return JurusanRepository::createData($r);
    }

    /**
     * Summary of updateData
     * @param \Illuminate\Http\Request $r
     * @return JsonResponse
     */
    public function updateData(JurusanRequest $r){
        return JurusanRepository::updateData($r);
    }

    /**
     * Summary of deleteData
     * @param mixed $id
     * @return JsonResponse
     */
    public function deleteData($id){
       return JurusanRepository::deleteData($id);
    }
}

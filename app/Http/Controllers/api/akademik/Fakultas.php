<?php

namespace App\Http\Controllers\api\akademik;

use App\Http\Controllers\Controller;
use App\Repository\Akademik\FakultasRepository;
use App\Repository\Akademik\PeriodeKknRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\akademik\FakultasRequest;

class Fakultas extends Controller
{



    /**
     * Summary of loadData
     * @return JsonResponse
     */
    public function loadData(){

        $data=FakultasRepository::loadDadta();
        return new JsonResponse($data);

    }

    public function saveData(FakultasRequest $fakultasRequest){
        return FakultasRepository::createData($fakultasRequest);
    }

    public function updateData(FakultasRequest $fakultasRequest){

        return FakultasRepository::updateData($fakultasRequest);
    }

    public function deleteData($id){
        $delete=FakultasRepository::deleteData($id);
        return $delete;
    }
}

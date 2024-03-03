<?php

namespace App\Http\Controllers\api\master;

use App\Http\Controllers\Controller;
use App\Http\Requests\master\DplRequest;
use App\Repository\Master\DplRepo;
use Illuminate\Http\Request;

class DplController extends Controller
{
    /**
     * Summary of loadData
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    function loadData(){
        return DplRepo::load_data();
    }

    /**
     * Summary of saveData
     * @param \App\Http\Requests\master\DplRequest $dplRequest
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    function saveData(DplRequest $dplRequest){
        return DplRepo::save_data($dplRequest);
    }

    /**
     * Summary of updateData
     * @param \App\Http\Requests\master\DplRequest $dplRequest
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    function updateData(DplRequest $dplRequest){
        return DplRepo::update_data($dplRequest);
    }

    /**
     * Summary of deleteData
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    function deleteData($id){
        return DplRepo::delete_data($id);
    }

}

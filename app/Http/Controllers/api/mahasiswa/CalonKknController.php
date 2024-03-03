<?php

namespace App\Http\Controllers\api\mahasiswa;

use App\Http\Controllers\Controller;

use App\Http\Requests\mahasiswa\BerkasRequest;
use App\Http\Requests\mahasiswa\CalonKknRequest;
use App\Repository\Mahasiswa\CalonkknRepository;
use Illuminate\Http\Request;

class CalonKknController extends Controller
{
    /**
     * Summary of loadDataCalonKkn
     * @return \Illuminate\Http\JsonResponse
     */
    function loadDataCalonKkn(){
        return CalonkknRepository::get_data_calon_kkn();
    }

    function loadCaloKknGroup(){
        return CalonkknRepository::get_data_calon_kkn_by_group();
    }


    function konfirmasiCalonKkn(Request $r){
        return CalonkknRepository::update_data_calon_kkn_any($r);
    }
    /**
     * Summary of saveDataCalonKkn
     * @param \App\Http\Requests\mahasiswa\CalonKknRequest $calonKknRequest
     * @param \App\Http\Requests\mahasiswa\BerkasRequest $berkasRequest
     * @return \Illuminate\Http\JsonResponse
     */
    function saveDataCalonKkn(CalonKknRequest $calonKknRequest,BerkasRequest $berkasRequest){
        return CalonkknRepository::create_data_calon_kkn($calonKknRequest,$berkasRequest);
    }

    /**
     * Summary of update_calon_kkn
     * @param \Illuminate\Http\Request $r
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    function update_calon_kkn(Request $r){
        return CalonkknRepository::update_ukuran_baju($r);
    }

    /**
     * Summary of updateDataCalonKkn
     * @param \App\Http\Requests\mahasiswa\CalonKknRequest $calonKknRequest
     * @return \Illuminate\Http\JsonResponse
     */
    function updateDataCalonKkn(CalonKknRequest $calonKknRequest){
        return CalonkknRepository::update_data_calon_kkn($calonKknRequest);
    }

    /**
     * Summary of deleteDataCalonKkn
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    function deleteDataCalonKkn($id){
        return CalonkknRepository::delete_data_calon_kkn($id);
    }

    /**
     * Summary of detailCalonKkn
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    function detailCalonKkn($id){
        return CalonkknRepository::detail_calon_kkn($id);
    }

    /**
     * Summary of getBerkasCalonKkn
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    function getBerkasCalonKkn($id){
        return CalonkknRepository::get_data_berkas_calon($id);
    }

    function getDataByPeriode($id){
        return CalonkknRepository::get_data_by_periode($id);
    }
}

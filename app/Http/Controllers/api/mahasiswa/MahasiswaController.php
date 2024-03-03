<?php

/**
 * Summary of namespace App\Http\Controllers\api\mahasiswa
 */
namespace App\Http\Controllers\api\mahasiswa;

use App\Http\Controllers\Controller;
use App\Repository\Mahasiswa\MahasiswaRepository;
use Illuminate\Http\Request;
use App\Http\Requests\mahasiswa\MahasiswaRequest;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Summary of MahasiswaController
 */
class MahasiswaController extends Controller
{

    function upload_foto_mhs(Request $r,$nim){
        return MahasiswaRepository::upload_foto($r,$nim);
    }

    function dataFakultasMahasiswa(){
        $data=MahasiswaRepository::loadDataFakultas();
        return $data;
    }


    /**
     * Summary of loadData
     * @return JsonResponse
     */
    function loadData(){
       return MahasiswaRepository::loadData();
    }

    /**
     * Summary of saveData
     * @param \Illuminate\Http\Request $r
     * @return JsonResponse
     */
    function saveData(MahasiswaRequest $r){
        return MahasiswaRepository::createData($r);
    }

    /**
     * Summary of updateData
     * @param \Illuminate\Http\Request $r
     * @return JsonResponse
     */
    function updateData(MahasiswaRequest $r){
        return MahasiswaRepository::updateData($r);
    }

    /**
     * Summary of deleteData
     * @param mixed $id
     * @return JsonResponse
     */
    function deleteData($id){
        return MahasiswaRepository::deleteData($id);
    }

    function checkDuplicate(Request $request)
    {
        return MahasiswaRepository::checkDuplicate($request);
    }

    function insertExcel(Request $request)
    {
        return MahasiswaRepository::insertExcelData($request);
    }
}

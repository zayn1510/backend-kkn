<?php

namespace App\Http\Controllers\api\akademik;

use App\Http\Controllers\Controller;
use App\Http\Requests\Akademik\PeriodeKkn;
use App\Http\Requests\akademik\PeriodeRequest;
use App\Repository\Akademik\PeriodeKknRepository;
use Illuminate\Http\Request;
use Validator;

class PeriodeKknController extends Controller
{
    public function index(){
        return PeriodeKknRepository::loadData();
    }

    public function saveData(PeriodeRequest $periodeRequest){
        return PeriodeKknRepository::createData($periodeRequest);
    }

    public function updateData(PeriodeRequest $periodeRequest){
        return PeriodeKknRepository::updateData($periodeRequest);
    }
    public function deleteData($id){
       return PeriodeKknRepository::deleteData($id);
    }

}

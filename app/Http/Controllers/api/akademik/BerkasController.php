<?php

namespace App\Http\Controllers\api\akademik;

use App\Http\Controllers\Controller;
use App\Repository\Akademik\BerkasRepository;
use Illuminate\Http\Request;

class BerkasController extends Controller
{
    public function upload_berkas_calon_kkn(Request $request){
        return BerkasRepository::upload_berkas_calon_kkn($request);
    }
}

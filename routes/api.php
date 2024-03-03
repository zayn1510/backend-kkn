<?php

use App\Http\Controllers\api\akademik\BerkasController;

use App\Http\Controllers\api\akademik\BeritaController;

use App\Http\Controllers\api\akademik\Fakultas;
use App\Http\Controllers\api\akademik\Jurusan;
use App\Http\Controllers\api\akademik\PeriodeKknController;
use App\Http\Controllers\api\akun\LoginController;
use App\Http\Controllers\api\akun\RegisterController;
use App\Http\Controllers\api\mahasiswa\CalonKknController;
use App\Http\Controllers\api\mahasiswa\MahasiswaController;
use App\Http\Controllers\api\admin\LoginControllerAdmin;
use App\Http\Controllers\api\master\DesaController;
use App\Http\Controllers\api\master\DplController;
use App\Http\Controllers\api\master\GroupController;
use App\Http\Controllers\api\user\InfoKknController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::prefix("v1")->group(function(){

    Route::prefix("admin")->group(function(){
        Route::post("login",[LoginControllerAdmin::class,"login"]);

        Route::prefix("fakultas")->group(function(){
            Route::get("load-data-fakultas",[Fakultas::class,"loadData"])->name("load-data-fakultas");
            Route::post("save-data-fakultas",[Fakultas::class,"saveData"])->name("save-data-fakultas");
            Route::put("update-data-fakultas",[Fakultas::class,"updateData"])->name("update-data-fakultas");
            Route::delete("delete-data-fakultas/{id}",[Fakultas::class,"deleteData"])->name("delete-data-fakultas");
        });

        Route::prefix("jurusan")->group(function(){
            Route::get("load-data-jurusan",[Jurusan::class,"loadData"])->name("load-data-jurusan");
            Route::post("save-data-jurusan",[Jurusan::class,"saveData"])->name("save-data-jurusan");
            Route::put("update-data-jurusan",[Jurusan::class,"updateData"])->name("update-data-jurusan");
            Route::delete("delete-data-jurusan/{id}",[Jurusan::class,"deleteData"])->name("delete-data-jurusan");
        });

        Route::prefix("mahasiswa")->group(function(){
            Route::get("load-data-fakultas-mahasiswa",[MahasiswaController::class,"dataFakultasMahasiswa"]);
            Route::get("load-data-mahasiswa",[MahasiswaController::class,"loadData"])->name("load-data-mahasiswa");
            Route::post("save-data-mahasiswa",[MahasiswaController::class,"saveData"])->name("save-data-mahasiswa");
            Route::put("update-data-mahasiswa",[MahasiswaController::class,"updateData"])->name("update-data-mahasiswa");
            Route::delete("delete-data-mahasiswa/{id}",[MahasiswaController::class,"deleteData"])->name("delete-data-jurusan");
            Route::post("upload-foto-mhs/{nim}",[MahasiswaController::class,"upload_foto_mhs"])->name("upload-foto-mhs");
            Route::get("load-data-calon-kkn",[CalonKknController::class,"loadDataCalonKkn"]);
            Route::post("save-data-calon-kkn",[CalonKknController::class,"saveDataCalonKkn"]);
            Route::put("konfirmasi-status",[CalonKknController::class,"konfirmasiCalonKkn"]);
            Route::delete("delete-data-calon-kkn/{id}",[CalonKknController::class,"deleteDataCalonKkn"]);
            Route::get("berkas-calon-kkn/{id}",[CalonKknController::class,"getBerkasCalonKkn"]);
            Route::get("get-calon-kkn-periode/{id}",[CalonKknController::class,"getDataByPeriode"]);
            Route::post("check-duplicate",[MahasiswaController::class,"checkDuplicate"]);
            Route::post("insert-excel",[MahasiswaController::class,"insertExcel"]);
        });

        Route::prefix("periode-kkn")->group(function(){
            Route::get("load-data",[PeriodeKknController::class,"index"])->name("load-data");
            Route::put("update-data",[PeriodeKknController::class,"updateData"])->name("update-data");
            Route::post("save-data",[PeriodeKknController::class,"saveData"]);
            Route::delete("delete-data/{id}",[PeriodeKknController::class,"deleteData"]);
        });

        Route::prefix("berita")->group(function(){

            Route::get("load-data",[BeritaController::class,"load_data"]);
            Route::post("upload-thumbnail",[BeritaController::class,"upload_thumbnail"]);
            Route::post("save-data",[BeritaController::class,"create_data"]);
            Route::put("update-data",[BeritaController::class,"update_data"]);
            Route::delete("delete-data/{id}",[BeritaController::class,"delete_data"]);
        });

        Route::prefix("desa")->group(function(){
            Route::get("load-data",[DesaController::class,"loadData"]);
            Route::post("save-data",[DesaController::class,"saveData"]);
            Route::put("update-data",[DesaController::class,"updateData"]);
            Route::delete("delete-data/{id}",[DesaController::class,"deleteData"]);
        });
        Route::prefix("dpl")->group(function(){
            Route::get("load-data",[DplController::class,"loadData"]);
            Route::post("save-data",[DplController::class,"saveData"]);
            Route::put("update-data",[DplController::class,"updateData"]);
            Route::delete("delete-data/{id}",[DplController::class,"deleteData"]);
        });

        Route::prefix("group-kkn")->group(function(){
            Route::post("/",[GroupController::class,"save_data"]);
            Route::get("/",[GroupController::class,"get_data"]);
            Route::get("calon-kkn",[CalonKknController::class,"loadCaloKknGroup"]);
            Route::delete("/{id}",[GroupController::class,"delete_data"]);
            Route::get("detail/{id}",[GroupController::class,"detail_data"]);
        });
        Route::prefix("pengguna")->group(function(){
            Route::get("/",[LoginController::class,"akun_pengguna"]);
        });
    });

    Route::prefix("user")->group(function(){
        Route::post("register-akun",[RegisterController::class,"register_akun"]);
        Route::post("login-akun",[LoginController::class,"login_akun"]);
        Route::get("detail-akun/{id}",[LoginController::class,"detail_akun"]);
        Route::post("upload-berkas-calon-kkn",[BerkasController::class,"upload_berkas_calon_kkn"]);
        Route::get("detail-calon-kkn/{id}",[CalonKknController::class,"detailCalonKkn"]);
        Route::put("update-calon-kkn",[CalonKknController::class,"update_calon_kkn"]);
        Route::get("info-kkn/{id}",[InfoKknController::class,"get_data"]);
        Route::get("group/{id}",[GroupController::class,"get_data_user_group"]);
        Route::get("check-periode-kkn",[InfoKknController::class,"check_data_periode"]);
    });
});



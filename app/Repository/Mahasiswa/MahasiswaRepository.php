<?php
/**
 * Summary of namespace App\Repository\Mahasiswa
 */
namespace App\Repository\Mahasiswa;

use App\lib\Uploadfile;
use App\Models\mahasiswa\MahasiswaModel;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Constraint\IsEmpty;
use App\Http\Requests\mahasiswa\MahasiswaRequest;

/**
 * Summary of MahasiswaRepository
 */
class MahasiswaRepository
{

    static function upload_foto(Request $r, $nim)
    {
        return response()->json(Uploadfile::upload_foto_mahasiswa($r, $nim));
    }
    static function loadDataFakultas(): JsonResponse
    {
        $column_jurusan = ["id_jurusan", "id_fakultas", "kode_jurusan", "nama_jurusan"]; // kolom tabel jurusan
        $fakultas = DB::table("tbl_fakultas as fakultas")->selectRaw("id_fakultas,kode_fakultas,nama_fakultas")->get();
        if (count($fakultas) == 0)
            $message = "Empty Data Fakultas"; // check data fakultas
        $jurusan = DB::table("tbl_jurusan as jurusan")->select($column_jurusan)->get(); // load data jurusan
        $message = "Data Found";
        $datanew = [];

        try {
            foreach ($fakultas as $key => $value) {
                $value->jurusan = [];

                foreach ($jurusan as $key => $j) {
                    if ($value->id_fakultas == $j->id_fakultas) {
                        $value->jurusan[] = $j;
                    }
                }
                $datanew[] = $value;
            }
            return response()->json(["message" => $message, "success" => true, "data" => $datanew], 200);
        } catch (\Throwable $th) {
            return response()->json([
                "action" => 0,
                "message" => "Error in database"
            ], 500);
        }
        // Looping data fakultas and jurusan

    }

    /**
     * Summary of loadData
     * @return \Illuminate\Http\JsonResponse
     */
    static function loadData(): JsonResponse
    {
        $column_mahasiswa = [
            "mhs.id_mhs",
            "mhs.nim_mhs",
            "mhs.nama_mhs",
            "jurusan.id_jurusan",
            "jurusan.id_fakultas",
            "jurusan.nama_jurusan",
            "fakultas.id_fakultas",
            "fakultas.nama_fakultas",
            "mhs.tempat_lahir_mhs",
            "mhs.tgl_lahir_mhs",
            "mhs.nomor_hp_mhs",
            "mhs.email_mhs",
            "mhs.foto_mhs",
            "mhs.angkatan_mhs"
        ]; // kolom tabel join
        $data = DB::table("tbl_mahasiswa as mhs")->join("tbl_fakultas as fakultas", "fakultas.id_fakultas", "=", "mhs.id_fakultas")
            ->join("tbl_jurusan as jurusan", "jurusan.id_jurusan", "=", "mhs.id_jurusan")
            ->select($column_mahasiswa)->get();
        if (count($data) == 0)
            $message = "Empty Data";
        else
            $message = "Data Found";
        try {
            return response()->json(["data" => $data, "action" => 1, "message" => $message], 200);
        } catch (\Throwable $th) {
            return response()->json(["action" => 0, "message" => "Error in database"], 500);
        }
    }

    /**
     * Summary of checkMahasiswa
     * @param mixed $nim
     * @return bool
     */
    static function checkMahasiswa($nim): bool
    {
        $conditon = ["nim_mhs" => $nim];
        $data = DB::table("tbl_mahasiswa")->where($conditon)->select("nim_mhs")->get();
        if (count($data) > 0)
            return true;
        return false;
    }

    /**
     * Summary of createData
     * @param mixed $r
     * @return \Illuminate\Http\JsonResponse
     */
    static function createData(MahasiswaRequest $r): JsonResponse
    {
        try {
            $checkmhs = self::checkMahasiswa($r->only("nim_mhs"));
            if ($checkmhs)
                return response()->json(["message" => "Mahasiswa dengan nim ini telah ada", "action" => 77], 403);
            $command = MahasiswaModel::create($r->validated());
            if ($command)
                return response()->json(["message" => "Save Data Success", "action" => 1], 200);

            return response()->json(["message" => "Save Data Failed", "action" => 0], 500);

        } catch (\PDOException $e) {
            return response()->json(["message" => "Error in Database ", "action" => 0], 500);
        } catch (\Exception $e) {
            return response()->json(["message" => "Error in " . $e->getCode(), "action" => 0], 500);
        }
    }


    /**
     * Summary of updateData
     * @param mixed $r
     * @return \Illuminate\Http\JsonResponse
     */
    static function updateData(MahasiswaRequest $r): JsonResponse
    {
        try {
            $allowupdate = $r->except("id_mhs");
            $allowcondition = $r->only("id_mhs");
            MahasiswaModel::where("id_mhs", $allowcondition)->update($allowupdate);
            return response()->json(["message" => "Update Data Success", "success" => true], 200);

        } catch (\Throwable $th) {
            return response()->json(["message" => "Error in Database " . $th, "success" => false], 500);
        }
    }


    /**
     * Summary of deleteData
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    static function deleteData($id): JsonResponse
    {
        try {
            MahasiswaModel::findOrFail($id);
            MahasiswaModel::where("id_mhs", $id)->delete();
            return response()->json(["message" => "Delete Data Success", "action" => 1], 200);
        } catch (ModelNotFoundException $th) {
            return response()->json(["message" => "Invalid ID", "action" => 0], 500);
        } catch (Exception $e) {
            return response()->json(["message" => "Error " . $e->getMessage(), "action" => 0], 500);
        }
    }

    /**
     * Summary of checkDuplicate
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    static function checkDuplicate(Request $request): JsonResponse
    {
        try {
            $data = $request->data;
            $nim = array_column($data, "nim");
            $kode_jurusan = array_column($data, "kode_jurusan");
            $notduplicate = DB::table("tbl_mahasiswa")->whereIn("nim_mhs", $nim)->pluck("nim_mhs")->toArray();
            $existjurusan = DB::table("tbl_jurusan as j")->join("tbl_fakultas as f", "f.id_fakultas", "=", "j.id_fakultas")
                ->selectRaw("f.id_fakultas,f.kode_fakultas,j.id_jurusan,j.kode_jurusan")->get();

            $newvalues = array_values(array_diff($nim, $notduplicate));
            $newdata = [];
            foreach ($data as $key => $value) {
                if (in_array($value["nim"], $newvalues) && in_array($value["kode_jurusan"], $kode_jurusan)) {
                    unset($value["no"]);
                    $value["id_fakultas"] = $existjurusan[$key]->id_fakultas;
                    $value["id_jurusan"] = $existjurusan[$key]->id_jurusan;
                    $newdata[] = $value;
                }
            }
            return response()->json(["message" => "Update Data Success", "success" => true, "data" => $newdata], 200);

        } catch (\Throwable $th) {
            return response()->json(["message" => "Error in Database " . $th, "success" => false], 500);
        }
    }

    static function insertExcelData(Request $request): JsonResponse
    {
        try {
            $data = $request->data;
            $arr = [];
            foreach ($data as $key => $value) {
                $arr = [
                    "nim_mhs" => $value["nim"],
                    "nama_mhs" => $value["nama"],
                    "id_fakultas" => $value["id_fakultas"],
                    "id_jurusan" => $value["id_jurusan"],
                    "angkatan_mhs" => $value["angkatan"]
                ];
                MahasiswaModel::query()->create($arr);
            }
            return response()->json(["message" => "Create Data Success", "success" => true], 200);

        } catch (\Throwable $th) {
            return response()->json(["message" => "Error in Database " . $th, "success" => false], 500);
        }
    }



}

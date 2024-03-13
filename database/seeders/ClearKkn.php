<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class ClearKkn extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            DB::beginTransaction();
            DB::table("tbl_detail_anggota_kkn")->delete();
            DB::table("tbl_calon_kkn")->delete();
            DB::table("tbl_berkas_calon_kkn")->delete();
            DB::commit();
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}

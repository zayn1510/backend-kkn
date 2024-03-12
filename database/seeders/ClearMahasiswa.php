<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class ClearMahasiswa extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            DB::beginTransaction();
            DB::table("tbl_mahasiswa")->delete();
            DB::table("users")->whereNot("role", "admin")->delete();
            DB::commit();
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}

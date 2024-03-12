<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class ClearGroup extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            DB::beginTransaction();
            DB::table("tbl_group_anggota_kkn")->delete();
            DB::commit();
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}

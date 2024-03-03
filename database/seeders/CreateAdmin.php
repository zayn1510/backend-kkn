<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;

class CreateAdmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            User::query()->create([
                "username" => "admin",
                "email" => "admin@gmail.com",
                "password" => Hash::make("12345678"),
                "role" => "admin",
                "id_pengguna" => 1,
            ]);
        } catch (\Throwable $th) {
            echo json_encode([
                "message" => "error " . $th->getMessage(),
            ]);
        }
    }
}

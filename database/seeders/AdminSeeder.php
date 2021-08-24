<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "Admin",
            "email" => "admin@jambesari.id",
            "password" => Hash::make("jambesari123"),
            "position" => "admin",
            "avatar" => "/admin/assets/img/undraw_profile_1.svg"
        ]);
    }
}

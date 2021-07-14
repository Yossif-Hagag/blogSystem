<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

            ['name' => 'Yossif', 'email' => 'yossif@example.com', 'password' => Hash::make('88888888'), 'address' => 'Cairo', 'id_card' => '555-666-222', 'phone_number' => '0135896456', 'type' => 'user', 'created_at' => now(), 'updated_at' => now(), 'email_verified_at' => now(), 'remember_token' => Str::random(10)],

            ['name' => 'Ahmed', 'email' => 'ahmed@example.com', 'password' => Hash::make('88888888'), 'address' => 'Naser City', 'id_card' => '000-306-257', 'phone_number' => '015489221', 'type' => 'user', 'created_at' => now(), 'updated_at' => now(), 'email_verified_at' => now(), 'remember_token' => Str::random(10)],

            ['name' => 'Admin 1', 'email' => 'admin1@example.com', 'password' => Hash::make('88888888'), 'address' => 'Giza', 'id_card' => '975-000-262', 'phone_number' => '0131562406', 'type' => 'admin', 'created_at' => now(), 'updated_at' => now(), 'email_verified_at' => now(), 'remember_token' => Str::random(10)],

            ['name' => 'Admin 2', 'email' => 'admin2@example.com', 'password' => Hash::make('88888888'), 'address' => 'Cairo', 'id_card' => '111-580-207', 'phone_number' => '0131562406', 'type' => 'admin', 'created_at' => now(), 'updated_at' => now(), 'email_verified_at' => now(), 'remember_token' => Str::random(10)],

        ]);
    }
}

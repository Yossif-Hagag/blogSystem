<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([

            ['name' => 'Art', 'user_id' => '3', 'created_at' => now(), 'updated_at' => now()],

            ['name' => 'Sport', 'user_id' => '3', 'created_at' => now(), 'updated_at' => now()],

            ['name' => 'Literature', 'user_id' => '4', 'created_at' => now(), 'updated_at' => now()],

        ]);
    }
}

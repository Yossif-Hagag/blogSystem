<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Arr;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_ids = Category::all()->pluck('id')->toArray();
        $admin_ids = User::where('type', 'admin')->pluck('id')->toArray();
        $publishStatus = [0,1];
        $faker = Faker::create();
        foreach (range(1,20) as $index) {
             DB::table('articles')->insert([
                'title' => $faker->sentence(2),
                'body' => $faker->paragraph(5),
                'published' => Arr::random($publishStatus),
                'photo' => '',
                'user_id' => Arr::random($admin_ids),
                'category_id' => Arr::random($category_ids),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
       
    }
}

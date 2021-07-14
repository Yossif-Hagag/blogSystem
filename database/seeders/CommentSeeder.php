<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([

            ['comment' => 'that is a comment', 'user_id' => '1', 'article_id' => '20', 'created_at' => now(), 'updated_at' => now()],

            ['comment' => 'that is a comment', 'user_id' => '1', 'article_id' => '20', 'created_at' => now(), 'updated_at' => now()],

            ['comment' => 'that is a comment', 'user_id' => '2', 'article_id' => '20', 'created_at' => now(), 'updated_at' => now()],

            ['comment' => 'that is a comment', 'user_id' => '2', 'article_id' => '19', 'created_at' => now(), 'updated_at' => now()],

            ['comment' => 'that is a comment', 'user_id' => '1', 'article_id' => '19', 'created_at' => now(), 'updated_at' => now()],

            ['comment' => 'that is a comment', 'user_id' => '1', 'article_id' => '18', 'created_at' => now(), 'updated_at' => now()],

            ['comment' => 'that is a comment', 'user_id' => '2', 'article_id' => '18', 'created_at' => now(), 'updated_at' => now()],

            ['comment' => 'that is a comment', 'user_id' => '1', 'article_id' => '16', 'created_at' => now(), 'updated_at' => now()],

            ['comment' => 'that is a comment', 'user_id' => '1', 'article_id' => '12', 'created_at' => now(), 'updated_at' => now()],

            ['comment' => 'that is a comment', 'user_id' => '1', 'article_id' => '8', 'created_at' => now(), 'updated_at' => now()],

            ['comment' => 'that is a comment', 'user_id' => '2', 'article_id' => '8', 'created_at' => now(), 'updated_at' => now()],

            ['comment' => 'that is a comment', 'user_id' => '2', 'article_id' => '1', 'created_at' => now(), 'updated_at' => now()],

            ['comment' => 'that is a comment', 'user_id' => '2', 'article_id' => '1', 'created_at' => now(), 'updated_at' => now()],

            ['comment' => 'that is a comment', 'user_id' => '2', 'article_id' => '2', 'created_at' => now(), 'updated_at' => now()],


        ]);
    }
}

<?php

namespace Database\Seeders\laracasts;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaracastsPostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('laracasts_posts')->insert([
            [
                'title' => 'My Family Post',
                'excerpt' => 'Excerpt for my post',
                'slug' => "my-family-post",
                'laracasts_category_id' => 1,
                'laracasts_user_id' => 1,
                'body' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'My Work Post',
                'excerpt' => 'Excerpt for my post',
                'slug' => "my-work-post",
                'laracasts_category_id' => 2,
                'laracasts_user_id' => 1,
                'body' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'My Hobby Post',
                'excerpt' => 'Excerpt for my post',
                'slug' => "my-hobby-post",
                'laracasts_category_id' => 3,
                'laracasts_user_id' => 1,
                'body' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}

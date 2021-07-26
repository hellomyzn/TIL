<?php

namespace Database\Seeders;

use App\Models\laracasts\LaracastsUser;
use App\Models\laracasts\LaracastsPost;
use App\Models\laracasts\LaracastsCategory;
use App\Models\laracasts\LaracastsComment;
use Illuminate\Database\Seeder;
use Database\Seeders\laracasts\LaracastsPostsSeeder;
use Database\Seeders\laracasts\LaracastsCategoriesSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(LaracastsPostsSeeder::class);
        // $this->call(LaracastsCategoriesSeeder::class);

        LaracastsUser::factory(10)->create();
        LaracastsCategory::factory(5)->create();
        LaracastsPost::factory(30)->create();
        LaracastsComment::factory(5000)->create();
    }
}

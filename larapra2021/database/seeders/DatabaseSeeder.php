<?php

namespace Database\Seeders;

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
        $this->call(LaracastsPostsSeeder::class);
        $this->call(LaracastsCategoriesSeeder::class);

        \App\Models\laracasts\LaracastsUser::factory(10)->create();
    }
}

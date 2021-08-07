<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\laracasts\LaracastsUser;
use App\Models\laracasts\LaracastsPost;
use App\Models\laracasts\LaracastsCategory;
use App\Models\laracasts\LaracastsComment;
use App\Models\simablog\SimablogUser;
use App\Models\simablog\SimablogPost;
use App\Models\blogcrud\BlogcrudPost;
use App\Models\blogcrud\BlogcrudUser;
use App\Models\simplenote\SimplenoteUser;
use App\Models\simplenote\SimplenoteMemo;
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

        User::factory(10)->create();

        LaracastsUser::factory(10)->create();
        LaracastsUser::factory(1)->create([
            'name' => 'laracasts',
            'username' => 'laracasts',
        ]);
        LaracastsCategory::factory(5)->create();
        LaracastsPost::factory(30)->create();
        LaracastsComment::factory(100)->create();


        SimablogUser::factory(10)->create();
        SimablogUser::factory(1)->create([
            'name' => 'simablog',
        ]);
        SimablogPost::factory(30)->create();

        BlogcrudUser::factory(10)->create();
        BlogcrudUser::factory(1)->create([
            'name' => 'blogcrud',
        ]);
        BlogcrudPost::factory(30)->create();

        SimplenoteUser::factory(10)->create();
        SimplenoteUser::factory(1)->create([
            'name' => 'simplenote',
        ]);
        SimplenoteMemo::factory(10)->create();

    }
}

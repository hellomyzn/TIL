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
            'name' => 'hoge',
            'username' => 'hoge',
            'email' => "hoge@hoge.com",
            'password' => 'password',
        ]);
        LaracastsCategory::factory(5)->create();
        LaracastsPost::factory(30)->create();
        LaracastsComment::factory(100)->create();


        SimablogUser::factory(10)->create();
        SimablogUser::factory(1)->create([
            'name' => 'hoge',
            'email' => "hoge@hoge.com",
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);
        SimablogPost::factory(30)->create();

        BlogcrudUser::factory(10)->create();
        BlogcrudUser::factory(1)->create([
            'name' => 'hoge',
        ]);
        BlogcrudPost::factory(30)->create();

    }
}

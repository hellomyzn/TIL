<?php

namespace Database\Seeders\laracasts;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaracastsCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('laracasts_categories')->insert([
            [
                'name' => 'Work',
                'slug' => 'work',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Personal',
                'slug' => 'personal',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Hobbies',
                'slug' => 'hobbies',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}

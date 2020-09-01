<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'Seeder hoge',
            'mail' => 'seeder-hoge@seeder-hoge.com',
            'age' => 123,
        ];
        DB::table('people')->insert($param);

        $param = [
            'name' => 'Seeder fuga',
            'mail' => 'seeder-fuga@seeder-fuga.com',
            'age' => 456,
        ];
        DB::table('people')->insert($param);

        $param = [
            'name' => 'Seeder piyo',
            'mail' => 'seeder-piyo@seeder-piyo.com',
            'age' => 789,
        ];
        DB::table('people')->insert($param);
    }
}

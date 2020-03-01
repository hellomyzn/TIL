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
        //
        $param = [
            'name' => 'taro',
            'mail' => 'taro@taro.jp',
            'age' => '12', 
        ];
        DB::table('people')->insert($param);
        

        $param = [
            'name' => 'hanako',
            'mail' => 'hanako@hanako.jp',
            'age' => '36', 
        ];
        DB::table('people')->insert($param);

        $param = [
            'name' => 'sachiko',
            'mail' => 'sachiko@sachiko.jp',
            'age' => '56', 
        ];
        DB::table('people')->insert($param);
        
    }
}

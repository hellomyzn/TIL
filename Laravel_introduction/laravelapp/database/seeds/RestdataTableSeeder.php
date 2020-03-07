<?php

use Illuminate\Database\Seeder;
use App\Restdata;

class RestdataTableSeeder extends Seeder
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
            'message' => 'Google Japane',
            'url' => 'https://www.google.co.jp',
        ];
        $restdata = new Restdata;
        $restdata->fill($param)->save();
        
        $param = [
            'message' => 'Yahoo Japane',
            'url' => 'https://www.yahoo.co.jp',
        ];
        $restdata = new Restdata;
        $restdata->fill($param)->save();

        $param = [
            'message' => 'MSM Japane',
            'url' => 'https://www.msm.com/ja-jp',
        ];
        $restdata = new Restdata;
        $restdata->fill($param)->save();
        
        
        
    }
}

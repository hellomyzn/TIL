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
        $param = [
            'message' => 'Google Japan',
            'url' => 'https://www.google.co.jp',
        ];

        $restdata = new Restdata;
        $restdata->fill($param)->save();

        $param = [
            'message' => 'Yahoo Japan',
            'url' => 'https://www.yahoo.co.jp',
        ];

        $restdata = new Restdata;
        $restdata->fill($param)->save();

        $param = [
            'message' => 'MSM Japan',
            'url' => 'https://www.msm.com/ja-jp',
        ];

        $restdata = new Restdata;
        $restdata->fill($param)->save();
    }
}

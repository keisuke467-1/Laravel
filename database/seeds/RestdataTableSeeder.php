<?php

use Illuminate\Database\Seeder;
use App\Restdata;
use Illuminate\Foundation\Console\Presets\React;

class RestdataTableSeeder extends Seeder
{
    public function run()
    {
        $param = [
            'message' => 'Google Japan',
            'url' => 'https://www.google.co.jp',
        ];
        $restdata = new Restdata;
        $restdata->fill($param)->save();
        $param = [
            'message' => 'MSN Japan',
            'url' => 'http://www.mns.com/ja-jp',
        ];
        $restdata = new Restdata;
        $restdata->fill($param)->save();
    }
}

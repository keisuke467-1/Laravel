<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restdata extends Model
{
    //関連しているデータベースのテーブルを指定
    protected $table = 'restdata';
    protected $guarded = array('id');

    public static $rules = array (
        'message' => 'required',
        'url' => 'required'
    );

    public function getData()
    {
        return $this->id . ':' . $this->message . '('. $this->url . ')';
    }
}

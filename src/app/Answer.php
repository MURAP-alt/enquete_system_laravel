<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //
    public static function getDate($from, $until)
    {
        //created_atが20xx/xx/xx ~ 20xx/xx/xxのデータを取得

        return Answer::whereBetween("created_at", [$from, $until])->get();
    }
}

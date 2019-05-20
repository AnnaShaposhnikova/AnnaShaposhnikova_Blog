<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Impression extends Model
{
    public $timestamps=false; // так как в таблице бд impressins нет timestamps
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function post()
    {
        return $this->belongsTo('App\Post');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model

{
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function comments()
    {
        return $this->hasMany('App\Comment');

    }
    public function impressions()
    {
       return $this->hasMany('App\Impression');
    }
    public function tags() : BelongsToMany
    {
        return $this->belongsToMany('App\Tag', 'post_tag');
    }
    public function findImpression($userId){
        $impression = Impression::query()
                ->where('user_id','=', $userId)
                ->where('post_id','=',$this->id)
                ->first();
        return  $impression;
    }

}

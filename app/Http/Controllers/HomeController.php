<?php
/**
 * Created by PhpStorm.
 * User: anna
 * Date: 4/9/19
 * Time: 10:04 AM
 */

namespace App\Http\Controllers;


use App\Post;
use App\Tag;
use App\User;

class HomeController extends Controller
{
    public  function  home(){
        $tags = Tag::all();
//        $user = User::find(1);
//        var_dump($user->comments()->get());
//       var_dump($user->posts());
//        var_dump($user->impressions());
        return view('index',['tags'=>$tags]);
    }

}
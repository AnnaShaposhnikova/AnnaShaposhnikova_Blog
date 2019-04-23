<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SignController extends Controller
{
    public  function  sign_in(){

        return view('user_side.sign_in');
    }
    public  function  sign_up(){

        return view('user_side.sign_up');
    }
}

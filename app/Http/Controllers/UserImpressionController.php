<?php
/**
 * Created by PhpStorm.
 * User: anna
 * Date: 5/20/19
 * Time: 10:48 AM
 */

namespace App\Http\Controllers;

use Validator;
use App\Impression;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserImpressionController extends Controller
{


    public function save($postId)
    {

//      dd($postId);
        $impression=Impression::query()
            ->where('user_id','=', \Auth::user()->id)
            ->where('post_id','=',$postId)
            ->first();
        if($impression===null) {
            if (Auth::check()) {
                $impression = new Impression();
                $impression->user_id = \Auth::user()->id;
                $impression->post_id = $postId;
                $impression->save();
                return redirect()->route('userPost',
                    [
                        'postId' => $impression->post_id,
                        'user_id' => $impression->user_id,
                    ]);
            }
            else {
                return redirect()->route('sign_in');
            }
        }
        else{
            return redirect()->route('userPost',
                [
                    'postId' => $impression->post_id,
                    'user_id' => $impression->user_id,
                ]);
        }

  }


}
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
        if (!Auth::check()) {
            return redirect()->route('sign_in');
        }
           $post=Post::find($postId);
        $impression=$post->findImpression(\Auth::user()->id);
            if($impression===null) {
                $impression = new Impression();
                $impression->user_id = \Auth::user()->id;
                $impression->post_id = $postId;
                $impression->save();
            }
                return redirect()->route('userPost',
                    [
                        'id' => $impression->post_id,
                    ]);
        }
}
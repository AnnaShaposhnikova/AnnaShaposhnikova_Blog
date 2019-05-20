<?php
/**
 * Created by PhpStorm.
 * User: anna
 * Date: 5/20/19
 * Time: 10:48 AM
 */

namespace App\Http\Controllers;


use App\Impression;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserImpressionController extends Controller
{


  public function save(Request $request)
  {
//      dd( $request);
      $validatedData = $request->validate([
          'user_id' => 'unique:impressions',
          'post_id' => 'unique:impressions',

      ]);

      if (Auth::check()) {
          $impression = new Impression();
          $impression->user_id = \Auth::user()->id;
          $impression->post_id = $request->request->get('post_id');
          $impression->save();
          return redirect()->route('userPost',
              [
                  'postId'=>$impression->post_id,
              ]);
      }
      else{
          return redirect()->route('sign_in');
      }

  }

}
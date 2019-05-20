<?php
/**
 * Created by PhpStorm.
 * User: anna
 * Date: 4/13/19
 * Time: 9:59 PM
 */

namespace App\Http\Controllers;


use App\Comment;
use App\Post;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserCommentController extends Controller
{

    public function create()
    {
        $users = User::all();
        $posts = Post::all();
        return view('post',['users'=>$users, 'posts'=>$posts]);
    }
    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'text' => 'required|min:3',
            'post_id' => 'required|exists:posts,id',

        ]);
        if (Auth::check()) {


            $comment = new Comment();
            $comment->text = $request->request->get('text');

            $comment->user_id = \Auth::user()->id;
//                $comment->user_id = \Auth::id();
//        $comment->user_id = $request->session()->get('user_id');
//        $comment->user_id = $request->session()->get('user_id');
//        $comment->user_id = $request->request->get('user_id');

            $comment->post_id = $request->request->get('post_id');
            $comment->save();

            return redirect()->route('userPost',['id'=>$comment->post_id]);
        }
        else{
            return redirect()->route('sign_in');
        }
    }

}
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


class CommentController extends Controller
{
    public function comment()
    {
        $comments=Comment::all();

        return view('comment',['comments'=>$comments]);

    }
     public function create()
     {
         $users = User::all();
         $posts = Post::all();
         return view('comment-form',['users'=>$users, 'posts'=>$posts]);
     }
    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'text' => 'required|min:3',
            'user_id' => 'required|exists:users,id',
            'post_id' => 'required|exists:posts,id',

        ]);

        $comment = new Comment();
        $comment->user_id = 1;
        $comment->text = $request->request->get('text');
        $comment->user_id = $request->request->get('user_id');
        $comment->post_id = $request->request->get('post_id');
        $comment->save();
        return redirect()->route('comment');

    }
    public  function  update(Comment $comment){
        $users = User::all();
        $posts = Post::all();
        return view('comment-form',['comment'=>$comment, 'user'=>$users, 'post'=>$posts]);
    }

    public function store(Request $request, Comment $comment)
    {
        $validatedData = $request->validate([
            'text' => 'required|min:3|unique:comments,text,'.$comment->id.'id',
            'user_id' => 'required|exists:user,id',
            'post_id' => 'required|exists:post,id',
        ]);

        $comment->text = $request->request->get('text');
        $comment->user_id = $request->request->get('user_id');
        $comment->post_id = $request->request->get('post_id');
        $comment->save();
        return redirect()->route('coment');
    }


    public function delite(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('comment');
    }

}
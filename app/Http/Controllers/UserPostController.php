<?php
/**
 * Created by PhpStorm.
 * User: anna
 * Date: 4/21/19
 * Time: 2:32 PM
 */

namespace App\Http\Controllers;
use App\Post;

use App\Tag;
use Illuminate\Http\Request;
class UserPostController extends Controller


{
    public  function  posts(Request $request){
        $tagId=$request->get('tag' );

        //select * from posts
        //join post_tag  on posts.id=post_tag.post_id
        //where tag_id = 1;

        $posts = Post::paginate(10) ;
     //TODO вывести посты в зависимости от тэга


        return view('user_side.posts',['posts'=>$posts]);
    }
    public function post ($id){

        $post = Post::find($id);
        return view('user_side.post', [
            'post'=>$post,
        ]);
    }




}
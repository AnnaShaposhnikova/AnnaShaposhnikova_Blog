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
use Illuminate\Support\Facades\DB;
use PDO;

class UserPostController extends Controller


{
    public  function  posts(Request $request){

        $tagId=$request->get('tag' );

        if($tagId) {
            $posts = Post::query()
                ->join('post_tag', 'posts.id', '=', 'post_tag.post_id')
                ->where('tag_id', '=',$tagId)
                ->paginate(10)
                ;
        }
        else{


            //select * from posts
            //join post_tag  on posts.id=post_tag.post_id
            //where tag_id = $tagId;

            $posts = Post::paginate(10) ;
        }




        return view('user_side.posts',['posts'=>$posts]);
    }
    public function post ($id){

        $post = Post::find($id);
        $comments = Post::find($id)->comments;
        $sumComment=$post->comments()->count();
        $sumImpression=$post->impressions()->count();

        return view('user_side.post', [
            'post'=>$post,
            'comments'=>$comments,
            'sumComment'=>$sumComment,
            'sumImpression'=> $sumImpression,
        ]);
    }




}
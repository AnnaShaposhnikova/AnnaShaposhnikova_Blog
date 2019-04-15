<?php
/**
 * Created by PhpStorm.
 * User: anna
 * Date: 4/13/19
 * Time: 9:59 PM
 */

namespace App\Http\Controllers;


use App\Post;
use App\PostTag;
use App\Tag;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class PostController extends Controller
{
    public function post()
    {
        $posts=Post::all();

        return view('post',['posts'=>$posts]);

    }
    public function create()
    {
        $categories= Category::all();
        $tags= Tag::all();
        return view('post-form',['categories'=>$categories, 'tags'=>$tags]);
    }
    public function save(Request $request)
    {
//        dd($_POST);
        $validatedData = $request->validate([
            'title' => 'required|min:3',
            'text' => 'required|min:3',
            'category_id' => 'required|exists:categories,id',

            'tag_id.*' =>'nullable|exists:tags,id',
            'tag_id' =>function ($attribute, $value, $fail) {
                $value=array_filter($value);
                $uniqueArray =  array_unique($value);
                if(count($uniqueArray)!=count($value)){
                    $fail($attribute.' is invalid.');
                }
            },
        ]);

        $post = new Post();
        $post->user_id = 1;
        $post->title = $request->request->get('title');
        $post->text = $request->request->get('text');
        $post->category_id = $request->request->get('category_id');
        $post->save();

        $arrayTags= $request->request->get('tag_id');
        foreach ($arrayTags as $tag){
            if (empty($tag)) {
                continue;
            }
            $postTag=new PostTag();
            $postTag ->tag_id = (int)$tag;
            $postTag ->post_id = $post->id;
            $postTag->save();
        }

        return redirect()->route('post');

    }
    public  function  update(Post $post){
        $tags= Tag::all();
        $categories= Category::all();
        return view('post-form',['post'=>$post, 'categories'=>$categories, 'tags'=>$tags]);
    }

    public function store(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:3',
            'text' => 'required|min:3|unique:posts,text,'.$post->id.'id',
            'category_id' => 'required|exists:categories,id',
            'tag_id.*' =>'nullable|exists:tags,id',
            'tag_id' =>function ($attribute, $value, $fail) {
                $value=array_filter($value);
                $uniqueArray =  array_unique($value);
                if(count($uniqueArray)!=count($value)){
                    $fail($attribute.' is invalid.');
                }
            },
        ]);

        $post->title = $request->request->get('title');
        $post->text = $request->request->get('text');
        $post->category_id = $request->request->get('category_id');
        $post->save();

        $post->tags()->detach();

        $arrayTags= $request->request->get('tag_id');

        foreach ($arrayTags as $tag){
            if (empty($tag)) {
                continue;
            }
            $postTag=new PostTag();
            $postTag ->tag_id = (int)$tag;
            $postTag ->post_id = $post->id;
            $postTag->save();
        }

        return redirect()->route('post');
    }


    public function delite(Post $post)
    {
        $post->delete();
        return redirect()->route('post');
    }

}
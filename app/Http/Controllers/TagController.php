<?php
/**
 * Created by PhpStorm.
 * User: anna
 * Date: 4/13/19
 * Time: 9:59 PM
 */

namespace App\Http\Controllers;


use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function tag()
    {
        $tags=Tag::all();
        return view('tag',['tags'=>$tags]);
    }
     public function create()
     {
         return view('tag-form');
     }
    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|unique:tags,name',
            'class' => 'required|min:3|unique:tags,class',
        ]);
        $tag = new Tag();
        $tag->name = $request->request->get('name');
        $tag->class = $request->request->get('class');
        $tag->save();
        return redirect()->route('tag');

    }
    public  function  update(Tag $tag){

        return view('tag-form',['tag'=>$tag]);
    }

    public function store(Request $request, Tag $tag)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|unique:tags,name,'.$tag->id.'id',
            'class' => 'required|min:3|unique:tags,class,'.$tag->id.'id',
        ]);

        $tag->name = $request->request->get('name');
        $tag->class = $request->request->get('class');
        $tag->save();
        return redirect()->route('tag');
    }


    public function delite(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tag');
    }

}
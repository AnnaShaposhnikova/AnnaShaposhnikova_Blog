<?php
/**
 * Created by PhpStorm.
 * User: anna
 * Date: 4/9/19
 * Time: 10:04 AM
 */

namespace App\Http\Controllers;


use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public  function  category(){
        $categories = Category::all();

        return view('category',['categories'=>$categories]);
    }
    public  function  create(){

        return view('category-form');
    }
    public  function  save(Request $request){
        $validatedData = $request->validate([
           'name' => 'required|min:3',
            'slug' => 'required|min:3|unique:categories,slug'
        ]);

        $category=new Category();
        $category->name = $request->request->get('name');
        $category->slug = $request->request->get('slug');
        $category->save();
        return redirect()->route('category');
    }
    public  function  update(Category $category){
//dd($category);
        return view('category-form',['category'=>$category]);
    }

    public  function  store(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3',
            'slug' => 'required|min:3|unique:categories,slug,'.$category->id.'id'
        ]);
        $category->name = $request->request->get('name');
        $category->slug = $request->request->get('slug');
        $category->save();
        return redirect()->route('category');
    }
    public function delite(Category $category){
        $category->delete();
        return redirect()->route('category');

    }


}
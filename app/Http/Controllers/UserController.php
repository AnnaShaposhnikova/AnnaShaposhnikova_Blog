<?php
/**
 * Created by PhpStorm.
 * User: anna
 * Date: 4/13/19
 * Time: 9:59 PM
 */

namespace App\Http\Controllers;



use App\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function user()
    {
        $users=User::all();

        return view('user',['users'=>$users]);

    }

     public function create()
     {

         return view('user-form');
     }
    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'firstName' => 'required|min:3',
            'lastName' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5',
            'skype' => 'string',
            'phone' => 'string',

        ]);

        $user = new User();
        $user->firstName = $request->request->get('firstName');
        $user->lastName = $request->request->get('lastName');
        $user->email = $request->request->get('email');
        $user->password = $request->request->get('password');
        $user->skype = $request->request->get('skype');
        $user->phone = $request->request->get('phone');
        $user->save();
        return redirect()->route('user');

    }
    public  function  update(User $user){

        return view('user-form');
    }

    public function store(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'firstName' => 'required|min:3',
            'lastName' => 'required|min:3',
            'email' => 'required|email|unique:table,column,'. $user->id .',id',
            'password' => 'required|min:5',
            'skype' => 'string',
            'phone' => 'string',
        ]);

        $user->firstName = $request->request->get('firstName');
        $user->lastName = $request->request->get('lastName');
        $user->email = $request->request->get('email');
        $user->password = $request->request->get('password');
        $user->skype = $request->request->get('skype');
        $user->phone = $request->request->get('phone');
        $user->save();
        $user->save();
        return redirect()->route('user');
    }


    public function delite(User $user)
    {
        $user->delete();
        return redirect()->route('user');
    }

}
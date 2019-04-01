<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
class LoginController extends Controller
{
    //

    public function index(){
        return view('login');
    }

    public function signin(Request $req){
        $email = $req->input('email');
        $password = $req->input('password');

        if($email == "" || $password == ""){
            return redirect()->back()->with('error','None of the field can be empty.');
        }else {
            $user = User::where(['email' => $email]);
            if($user->count() > 0){
                if(Auth::attempt(['email' => $email, 'password' => $password])){
                    return redirect('/');
                }else {
                    return redirect()->back()->with('error','Invalid Credentials.');
                }
            }else {
            return redirect()->back()->with('error','Invalid Credentials.');

            }
        }

    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }


}

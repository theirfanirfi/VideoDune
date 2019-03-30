<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\MyClasses\VerifyToken as VT;
use App\User;
use Illuminate\Support\Facades\Hash;
class APIController extends Controller
{
    //

    public function login(Request $req){
        $email = $req->input('email');
        $password = $req->input('password');

        if($email == "" || $password == ""){
            return response()->json([
                'error' => true,
                'isEmpty' => true,
                'message' => "None of the field can be empty"
            ]);
        }else {
            $user = User::where(['email' => $email]);
            if($user->count() > 0){
                $user = $user->first();
                if(Hash::check($password, $user->password)){
                    $token = Hash::make(base64_encode($user->name.":".time()));
                    $user->token = $token;
                    if($user->save()){
                        return response()->json([
                            'error' => false,
                            'isLoggedIn' => true,
                            'user' => $user,
                            'message' => "User Logged in"
                        ]);
                    }else{
                        return response()->json([
                            'error' => true,
                            'message' => "Error occurred during login. Please try again."
                        ]);
                    }
                }else {
                    return response()->json([
                        'error' => true,
                        'message' => "Invalid credentials"
                    ]);
                }
            }else {
                return response()->json([
                    'error' => true,
                    'message' => "Invalid credentials"
                ]);
            }
        }
    }

    public function register(Request $req){
        $name = $req->input('name');
        $email = $req->input('email');
        $password = $req->input('password');

        if($name == "" || $email == "" || $password == ""){
            return response()->json([
                'error' => true,
                'isEmpty' => true,
                'message' => "None of the field can be empty"
            ]);
        }else {
            $user = User::where(['email' => $email]);
            if($user->count() > 0){
                return response()->json([
                    'error' => true,
                    'isEmpty' => false,
                    'misMatch' => false,
                    'isTaken' => true,
                    'message' => "The Email is already taken. Please use another."
                ]);
            }else {
                $newUser= new User();
                $newUser->email = $email;
                $newUser->name = $name;
                $newUser->password = Hash::make($password);
                $token = Hash::make(base64_encode($name.":".time()));
                $newUser->token = $token;
                if($newUser->save()){
                    return response()->json([
                        'error' => false,
                        'isEmpty' => false,
                        'misMatch' => false,
                        'isTaken' => false,
                        'isCreatedError' => false,
                        'isCreated' => true,
                        'user' => $newUser,
                        'message' => "User Registered."
                    ]);
                }else {
                    return response()->json([
                        'error' => true,
                        'isEmpty' => false,
                        'misMatch' => false,
                        'isTaken' => false,
                        'isCreatedError' => true,
                        'message' => "Error occurred in creating the user. Please try again."
                    ]);
                }
            }
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\MyClasses\VerifyToken as VT;
use App\User;
use App\Settings as ST;
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

    public function getsettings(Request $req){
        $token = $req->input('token');

        if($token == ""){
            return response()->json([
                'error' => true,
                'isEmpty' => true,
                'message' => "None of the field can be empty"
            ]);
        }else {
            $vt = new VT();
            $user = $vt->verifyTokenInDb($token);
            if(!$user){
                return response()->json([
                    'error' => true,
                    'isAuthenticated' => false,
                    'message' => "you need to login inorder to perform this action."
                ]);
            }else {
                $st = ST::where(['user_id' => $user->id]);
                if($st->count() > 0){
                    $st = $st->first();
                    return response()->json([
                        'isAuthenticated' => true,
                        'message' => "Settings found",
                        'isSettingsFound' => true,
                        'settings' => $st
                    ]);

                }else {
                return response()->json([
                    'isAuthenticated' => true,
                    'message' => "Settings not found",
                    'isSettingsFound' => false
                ]);
                }
            }
        }
    }

    public function saveSettings(Request $req){
        $token = $req->input('token');
        $username = $req->input('username');
        $address = $req->input('address');
        $hashtag = $req->input('hashtag');

        if($token == "" || $username == "" || $address == "" || $hashtag == ""){
            return response()->json([
                'error' => true,
                'isEmpty' => true,
                'message' => "None of the field can be empty"
            ]);
        }else {
            $vt = new VT();
            $user = $vt->verifyTokenInDb($token);
            if(!$user){
                return response()->json([
                    'error' => true,
                    'isAuthenticated' => false,
                    'message' => "you need to login inorder to perform this action."
                ]);
            }else {



                $st = new ST();
                $st->username = $username;
                $st->user_id = $user->id;
                $st->address = $address;
                $st->hashtag = $hashtag;

                if($st->save()){
                    return response()->json([
                        'error' => false,
                        'isAuthenticated' => true,
                        'isSaved' => true,
                        'settings' => $st,
                        'message' => "Settings saved."
                    ]);
                }else {
                    return response()->json([
                        'error' => true,
                        'isAuthenticated' => true,
                        'message' => "Error occurred in saving settings. Please try again."
                    ]);
                }
            }
        }


    }
}

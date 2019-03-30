<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    //

    public function index(){
        return view('Frontend.home');
    }


    public function Video($id){
        return view('Frontend.videodetail');
    }
}

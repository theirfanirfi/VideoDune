<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Videos;
class HomeController extends Controller
{
    //

    public function index(){
        $videos = new Videos();

        return view('Frontend.home',['videos' => $videos->getVideos()->get()]);
    }


    public function Video($id){
        $video = new Videos();
        return view('Frontend.videodetail',['video' => $video->getVideo($id)->first()]);
    }

    public function Videos(){
        $videos = new Videos();

        return view('Frontend.videos',['videos' => $videos->getVideos()->get()]);
    }

    public function myvideos(){
        $user = Auth::user();
        $videos = new Videos();
        return view('Frontend.videos',['videos' => $videos->getMyVideos($user->id)->get()]);

    }

    public function likeVideo($id){
        $user = Auth::user();
    }
}

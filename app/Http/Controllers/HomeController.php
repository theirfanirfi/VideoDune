<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Videos;
use App\VideoLikes as VK;
class HomeController extends Controller
{
    //

    public function index(){
        $videos = Videos::all();
//        $videos = new Videos();
        return view('Frontend.home',['videos' => $videos]);
    }


    public function Video($id){
        $video = new Videos();
        return view('Frontend.videodetail',['video' => $video->getVideo($id)->first()]);
    }

    public function Videos(){
        $videos = Videos::all();

        return view('Frontend.videos',['videos' => $videos]);
    }

    public function myvideos(){
        $user = Auth::user();
        $videos = Videos::where(['user_id' => $user->id])->get();
        return view('Frontend.videos',['videos' => $videos]);
    }

    public function likevideo($id){
        $user = Auth::user();
        $checkVideoExistence = Videos::where(['id' => $id]);
        if($checkVideoExistence->count() > 0){
        $v = VK::where(['liker_id' => $user->id,'video_id' => $id]);

        if($v->count() > 0){
            return redirect()->back()->with('error','You have already liked the video.');
        }else {
            $like = new VK();
            $like->liker_id = $user->id;
            $like->video_id = $id;

            if($like->save()){
                return redirect()->back()->with('success','Video Liked.');

            }else {
            return redirect()->back()->with('error','Error occurred in liking the video.');
            }
        }

        }else {
            return redirect()->back()->with('error','No Such Video found.');
        }

    }

    public function deletevideo($id){
        $user = Auth::user();
        $video = Videos::where(['id' => $id]);
        if($video->count() > 0){
            $vodeo = $video->first();
            if($vodeo->user_id == $user->id){
                $path = public_path("mvideos");
                if($vodeo->delete() && unlink($path."\\".$vodeo->video_name)){

                    return redirect()->back()->with('success','Video deleted.');

                }else {
            return redirect()->back()->with('error','Error occurred in deleting the video. Please try again.');
                }
            }else {
            return redirect('/')->with('error','This video does not belong to you.');

            }
        }else {
            return redirect('/')->with('error','No Such Video found.');
        }
    }

    public function checkUnlink(){
        echo "check successful";
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\VideoLikes as VK;
use DB;
use Auth;
class Videos extends Model
{
    //

    protected $table = "videos";

    public function getVideos(){
        $videos = DB::table('videos')->leftjoin('users',['videos.user_id' => 'users.id'])->orderBy('videos.id','DESC')->select('users.name','videos.*');
        return $videos;
    }

    public function getVideo($id){
        $videos = DB::table('videos')->where(['videos.id' => $id])->leftjoin('users',['videos.user_id' => 'users.id'])
       // ->leftjoin('videolikes',[])
        ->select('users.name','videos.*');
        return $videos;
    }

    public function getMyVideos($id){
        $videos = DB::table('videos')->where(['videos.user_id' => $id])->leftjoin('users',['videos.user_id' => 'users.id'])->orderBy('videos.id','DESC')->select('users.name','videos.*');
        return $videos;
    }

    public function checkWhetherLikedOrNot(){
        if(Auth::check()){
        return VK::where(['liker_id' => Auth::user()->id,'video_id' => $this->id])->count();
        }else {
            return 0;
        }
    }

    public function getVideoLikesCount(){
        return VK::where(['video_id' => $this->id])->count();
    }

    public function getVideoAuthor(){
        return User::where(['id' => $this->user_id])->first()->name;
    }
}

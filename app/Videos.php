<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use DB;
class Videos extends Model
{
    //

    protected $table = "videos";

    public function getVideos(){
        $videos = DB::table('videos')->leftjoin('users',['videos.user_id' => 'users.id'])->orderBy('videos.id','DESC')->select('users.name','videos.*');
        return $videos;
    }

    public function getVideo($id){
        $videos = DB::table('videos')->where(['videos.id' => $id])->leftjoin('users',['videos.user_id' => 'users.id'])->select('users.name','videos.*');
        return $videos;
    }

    public function getMyVideos($id){
        $videos = DB::table('videos')->where(['videos.user_id' => $id])->leftjoin('users',['videos.user_id' => 'users.id'])->orderBy('videos.id','DESC')->select('users.name','videos.*');
        return $videos;
    }

}

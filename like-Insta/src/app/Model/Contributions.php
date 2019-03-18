<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contributions extends Model
{
    //
     protected $fillable = ['username','image','caption', 'created_at', 'updated_at'];

     public static function GetAll(){
       $contributions = DB::table('contributions')->orderBy('created_at', 'desc')->paginate(10);
       return $contributions;
     }

     public static function GetOneuserContributions($username){
       $userContributions = DB::table('contributions')->where('username', $username)->get();
       return $userContributions;
     }

     public static function GetUsernamefromPostid($postId){
       $postusername = DB::table('contributions')->where('post_id', $postId)->value('username');
       return $postusername;
     }

     public static function DeleteContribution($postId){
       DB::table('contributions')->where('post_id', $postId)->delete();

     }





}

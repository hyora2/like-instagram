<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Like extends Model
{
    //
     protected $fillable = ['post_id','like_username', 'posted_username'];

     public static function Getlikeduser($postId){
       $likedusersdata = DB::table('likes')->where('post_id', $postId)->get();
       return $likedusersdata;
     }

     public static function GetlikeId($username){
       $mylikeid = DB::table('likes')->where('like_username', $username)->get();
       return $mylikeid;
     }

     public static function GetAmountoflike($username){
       $countnum = DB::table('likes')->where('posted_username', $username)->count();
       return $countnum;

     }

     public static function deletepost($postId){
       DB::table('likes')->where('post_id', $postId)->delete();
     }

}

<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\Contributions;
use Illuminate\Support\Facades\DB;
use App\Model\Like;

/**
 *
 */
class LikeController extends Controller
{
  public function add(Request $request){
    $postId = $request->input('post_id');
    $postusername = Contributions::GetUsernamefromPostid($postId);
    $myname = session('username');
    $now = date("Y/m/d H:i:s");
    $app_user = DB::select('select * from public.likes where post_id = ? and like_username = ?', [$postId, $myname]);
    if (empty($app_user)) {
    //  Like::addlike($postId, $myname);
        DB::insert('insert into public.likes (post_id, like_username, posted_username,  created_at, updated_at) values (?, ?, ?, ?, ?)', [$postId, $myname, $postusername, $now, $now]);
    }else {
        DB::delete('delete from public.likes where post_id = ? and like_username = ?', [$postId, $myname]);
      //Like::deletelike($postId, $myname);
    }
    return redirect('/home');

  }


  public function likedindex($postId){
    $likedlists = Like::Getlikeduser($postId);
  
    return view('/liked', ["likedlists" => $likedlists]);
  }

}

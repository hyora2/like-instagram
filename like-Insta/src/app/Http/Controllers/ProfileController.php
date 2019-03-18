<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\Model\Contributions;
use App\Model\userdatas;
use App\Model\Like;

/**
 *
 */
class ProfileController extends Controller
{
  public function index($username=null){
      if($username == null){
        return redirect('/home');
      }

      $iconData = base64_encode(file_get_contents('https://github.com/' . "$username" . '.png'));
     $contributions = Contributions::GetOneuserContributions($username);
     $AmountOfLike = Like::GetAmountoflike($username);

//DB::select('select * from public.userdatas where username = ?', [$github_user->user['login']])
    return view('profile', [ "username" => $username, "iconData" => $iconData, "contributions" => $contributions, "AmountOfLike" => $AmountOfLike]);
  }

  public function mypageindex(){
    if( empty( session()->has('username')) ) {
      return redirect('/welcome');
    }
    //$app_user = session('app_user');
    $username = session('username');
    return redirect()->action('ProfileController@index', ["username" => $username]);

  }



}

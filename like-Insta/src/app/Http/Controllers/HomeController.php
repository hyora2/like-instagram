<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\Contributions;
use App\Model\Like;

class HomeController extends Controller{

  public function index(){
    $username = session('username');

    $contributions = Contributions::GetAll();
    $mylikeid = Like::GetlikeId($username);
    return view('home', ["contributions" => $contributions, "myname" => $username, "mylikeid" => $mylikeid]);
  }

  public function onePostdelete(Request $request){
    $postId = $request->input('postId');
    Like::deletepost($postId);
    Contributions::DeleteContribution($postId);
     return redirect('/home');

  }


}

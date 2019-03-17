<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\Contributions;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller{

  public function index(){
    $username = session('username');

    $contributions = Contributions::GetAll();
    return view('home', ["contributions" => $contributions, "myname" => $username]);
  }

  public function onePostdelete(Request $request){

    $postId = $request->input('postId');
    Contributions::DeleteContribution($postId);
    // $cont = new Contributions();
    // $cont->DeleteContribution($postId);
     return redirect('/home');
  }


}

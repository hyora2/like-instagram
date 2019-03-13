<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\Contributions;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller{

  public function index(){
    $contribution = Contributions::all();
    
    return view('home', ["contribution" => $contribution]);
  }

  public function showtoken(Request $request){
  //  $token = $request->$token;

    $contribution = Contributions::all();

    return view('home', ["contribution" => $contribution]);
  }

}

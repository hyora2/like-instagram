<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\Contributions;
use App\Model\userdatas;
use Illuminate\Support\Facades\DB;

class PostingController extends Controller{

  public function index(){
    if( empty( session()->has('username')) ) {
      return redirect('welcome');
    }
    $username = session('username');
    return view('posting',["username" => $username]);
  }

  public function upload(Request $request){

    $request->validate([

                  'image' => [
                  'required',
                  'file',
                  'image',
                  'mimes:png,jpeg,gif',
                  'max:61440',
                ],

                'caption' => 'required|max:200',
            ]);
            if($request->file('image')->isValid([])){
              $now = date("Y/m/d H:i:s");
              $username = $request->input('username');
              $caption = $request->input('caption');
              $imageData = base64_encode(file_get_contents($request->image->getRealPath()));

              DB::insert('insert into public.contributions (username, image, caption, created_at, updated_at) values (?, ?, ?, ?, ?) ', [ $username, $imageData,  $caption, $now, $now]);
        //  return view('/home');
             return redirect('/home');

            }else {
               return redirect()
               ->back()
               ->withInput()
               ->withErrors();
            }
  }


}

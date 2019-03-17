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
                ],

                'caption' => 'required|max:200',
            ]);
            if($request->file('image')->isValid([])){
              $now = date("Y/m/d H:i:s");
              //$path = $request->file->store('public');
              $username = $request->input('username');
              $caption = $request->input('caption');
              $imageData = base64_encode(file_get_contents($request->image->getRealPath()));

              DB::insert('insert into public.contributions (username, image, caption, created_at, updated_at) values (?, ?, ?, ?, ?) ', [ $username, $imageData,  $caption, $now, $now]);
              //  DB::insert('insert into public.userdatas (username,  created_at, updated_at) values (?, ?, ?)', [$github_user->user['login'], $now, $now])
          //    $contribution = Contributions::all();
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


// namespace App\Http\Controllers;
// use Illuminate\Http\Request;
// use App\Model\Bbs; // さっき作成したモデルファイルを引用
//
// class BbsController extends Controller
// {
//     // Indexページの表示
//     public function index() {
//
//         $bbs = Bbs::all(); // 全データの取り出し
//         return view('bbs.index', ["bbs" => $bbs]); // bbs.indexにデータを渡す
//     }
//
//     // 投稿された内容を表示するページ
//     public function create(Request $request) {
//
//         // バリデーションチェック
//         $request->validate([
//             'name' => 'required|max:10',
//             'comment' => 'required|min:5|max:140',
//         ]);
//
//         // 投稿内容の受け取って変数に入れる
//         $name = $request->input('name');
//         $comment = $request->input('comment');
//
//         Bbs::insert(["name" => $name, "comment" => $comment]); // データベーステーブルbbsに投稿内容を入れる
//
//         $bbs = Bbs::all(); // 全データの取り出し
//         return view('bbs.index', ["bbs" => $bbs]); // bbs.indexにデータを渡す
//     }
// }

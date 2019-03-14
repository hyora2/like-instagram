<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\Contributions;

class PostingController extends Controller{

  public function index(){
    if( empty( session()->has('github_id')) ) {
      return redirect('welcome');
    }

    return view('posting');
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

            $userId = $request->input('user_id');
            $caption = $request->input('caption');
            if($request->file('image')->isValid([])){
              //$path = $request->file->store('public');
              $imageData = base64_encode(file_get_contents($request->image->getRealPath()));
              Contributions::insert(["user_id" => $userId,"image" => $imageData, "caption" => $caption]);
          //    $contribution = Contributions::all();
          //return view('home',["contribution" => $contribution]);
             return redirect('home');

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

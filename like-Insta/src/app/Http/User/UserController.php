<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use Illuminate\Support\Facades\DB;
use Auth;

class UserController extends Controller
{
    public function index(){
      if (!Auth::check()) {
          // ログイン済でなければリダイレクト
          return view('welcome');
      }
      $username = Auth::user()->username;
      return redirect('home',["username" => $username]);

    }

    public function updateUser(Request $request)
    {
        $token = $request->session()->get('github_token', null);
        $user = Socialite::driver('github')->userFromToken($token);

        DB::update('update public.user set name = ?, comment = ? where github_id = ?', [$request->input('name'), $request->input('comment'), $user->user['login']]);
        return redirect('/github');
    }
}

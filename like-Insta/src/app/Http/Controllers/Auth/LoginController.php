<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your / screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(){
      if( empty( session()->has('username')) ) {
        return redirect('/welcome');
      }

      session()->flush();
      return redirect('/home');
    }

    /**
     * GitHubの認証ページヘユーザーをリダイレクト
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->scopes(['read:user', 'public_repo'])->redirect();
    }

    /**
     * GitHubからユーザー情報を取得
     *
     * @return \Illuminate\Http\Response
     */
     public function handleProviderCallback(Request $request)
    {
        $github_user = Socialite::driver('github')->user();

        $now = date("Y/m/d H:i:s");
        $app_user = DB::select('select * from public.userdatas where username = ?', [$github_user->user['login']]);
        // $iconData = base64_encode(file_get_contents('https://github.com/' . $github_user->user['login'] . '.png'));
        if (empty($app_user)) {
            DB::insert('insert into public.userdatas (username,  created_at, updated_at) values (?, ?, ?)', [$github_user->user['login'], $now, $now]);
        }
        session()->flush();
        session()->put('app_user', $app_user);
        $request->session()->put('github_token', $github_user->token);

        session()->put('username', $github_user->user['login']);
      //  return  redirect()->action('/Controller@showtoken', ['token' => $github_user->token]);
        return redirect('/home');
        //return redirect('github');
    }
}

<?php

namespace App\Http\Controllers\Github;

use App\Http\Controllers\Controller;
use Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Contributions;
use Auth;

class GithubController extends Controller
{
  public function top(Request $request)
    {
        $token = $request->session()->get('github_token', null);

        try {
            $github_user = Socialite::driver('github')->userFromToken($token);
        } catch (\Exception $e) {
            return redirect('login/github');
        }

        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'https://api.github.com/user/repos', [
            'headers' => [
                'Authorization' => 'token ' . $token
            ]
        ]);

      //  $app_user = DB::select('select * from public.userdatas where github_id = ?', [$github_user->user['login']]);
        //redirect()->action('HomeController@showtoken', ['token' => $token]);


        //
        return view('github', [
            'app_user' => $app_user[0],
            'contribution' => $contribution
          'nickname' => $github_user->nickname,
            'token' => $token,
            'repos' => array_map(function($o) {
                return $o->name;
            }, json_decode($res->getBody()))
        ]);
    }


    public function profileIndex(){

        $github_user = Socialite::driver('github')->user();

        $app_user = DB::select('select * from public.userdatas where github_id = ?', [$github_user->user['login']]);

      return view('profile', ["username" => $app_user[0]]);
}

    public function createIssue(Request $request)
    {
        $token = $request->session()->get('github_token', null);
        $user = Socialite::driver('github')->userFromToken($token);

        $client = new \GuzzleHttp\Client();
        $res = $client->request('POST', 'https://api.github.com/repos/' . $user->user['login'] . '/' . $request->input('repo') . '/issues', [
            'auth' => [$user->user['login'], $token],
            'json' => [
                'title' => $request->input('title'),
                'body' => $request->input('body')
            ]
        ]);

        return view('done', [
            'response' => json_decode($res->getBody())->html_url
        ]);
    }

}

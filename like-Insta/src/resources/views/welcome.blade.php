<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/css/maincontens.css" rel="stylesheet" type="text/css">

        <title>ログイン画面</title>

    </head>

      <body>
          @include('headerbar')
          <br>
          <br>
          <div class="loginbutton">
             <a href="/login/github">githubアカウントでログイン</a>
             </div>
         </body>

</html>

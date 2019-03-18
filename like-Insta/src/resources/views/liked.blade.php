<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>like_list</title>
  </head>
  <body>
@include('headerbar')

<h3>いいねしたユーザー</h3>

@isset($likedlists)
@foreach ($likedlists as $l)

    <a href="/profile/{{$l->like_username}}">
      <img src="https://github.com/{{$l->like_username}}.png" width="50" height="50">
      {{ $l->like_username }}<br>
    </a>

@endforeach
@endisset


  </body>
</html>

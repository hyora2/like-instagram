<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link href="/css/maincontens.css" rel="stylesheet" type="text/css">
    @include('head', ['title' => 'Home'])

  </head>
  <body>
    @include('headerbar')

  <div class="maincontents">

    <h2>画像掲示板</h2>

    <!-- 投稿表示エリア（編集するのはここ！） -->

    @isset($contributions)
    @foreach ($contributions as $c)

      <div class="post">


        <h4><a href="profile/{{$c->username}}">  {{ $c->username }}</a>さんの投稿</h4>

        <!-- 削除ボタン -->
        @if($c->username == $myname)

          <form  action="home" method="post">
            <button type="submit" class="btn btn-danger" name="postId" value="{{$c->post_id}}">削除</button>
            {{ csrf_field() }}
          </form>

        @endif

        <div class="postimg">
            <br><img src="data:image/png;base64, {{ $c->image }}" ><br>
        </div>

        <h4>キャプション</h4><br>
        {{ $c->caption }}
        <hr>
        <div class="liked">
        <a href="liked/{{$c->post_id}}">いいねしたユーザー</a>
</div>
        @if(session()->has('username'))

<div class="likebutton">
        <form  action="like" method="post">
          <button class="btn btn-primary" type="submit" name="post_id" value="{{$c->post_id}}">
            いいね
            @foreach($mylikeid as $likeid)
            @if($c->post_id == $likeid->post_id)
              解除
            @endif
            @endforeach
          </button>
            {{ csrf_field() }}
        </form>
</div>
        @endif


      </div>

    @endforeach
    @endisset
    <br>
<div class="page">
        {{ $contributions->links() }}
</div>

</div>
  </body>
</html>

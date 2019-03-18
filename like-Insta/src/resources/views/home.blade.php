<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    @include('head', ['title' => 'Home'])


  </head>
  <body>

@include('headerbar')

    <h2>画像掲示板</h2>

    <!-- 投稿表示エリア（編集するのはここ！） -->

    @isset($contributions)
    @foreach ($contributions as $c)

<div class="">


        <h4><a href="profile/{{$c->username}}">  {{ $c->username }}</a>さんの投稿</h4>
        @if($c->username == $myname)
        <form class="" action="home" method="post">
          <button type="submit" name="postId" value="{{$c->post_id}}">削除</button>
          {{ csrf_field() }}
        </form>

        @endif

        <br><img src="data:image/png;base64, {{ $c->image }}" alt=""><br>
        <h4>キャプション</h4><br>
        {{ $c->caption }}
        <br><hr>
        <a href="liked/{{$c->post_id}}">いいねしたユーザー</a>

        @if(session()->has('username'))

        <form class="" action="like" method="post">
          <button type="submit" name="post_id" value="{{$c->post_id}}">
            いいね
            @foreach($mylikeid as $likeid)
            @if($c->post_id == $likeid->post_id)
              解除
            @endif
            @endforeach
          </button>
            {{ csrf_field() }}
        </form>

        @endif


</div>
    @endforeach
    @endisset
    <br>
  <div class="">
    {{ $contributions->links() }}
</div>

  </body>
</html>

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

        <h4><a href="profile/{{$c->username}}">  {{ $c->username }}</a>さんの投稿</h4>
        @if($c->username == $myname)
        <form class="" action="home" method="post">
          <button type="submit" name="postId" value="{{$c->post_id}}">削除</button>
          {{ csrf_field() }}
        </form>

        @endif

        <br><img src="data:image/png;base64, {{ $c->image }}" alt=""><br>
        <h3>キャプション</h3><br>
        {{ $c->caption }}
        <br><hr>
    @endforeach
    @endisset
  <div class="d-flex justify-content-center">
    {{ $contributions->links() }}
</div>

  </body>
</html>

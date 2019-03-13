<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    @include('head', ['title' => 'Home'])
  </head>
  <body>

@include('headerbar')



    <h2>画像掲示板</h2>

    <!-- 投稿表示エリア（編集するのはここ！） -->
    @isset($contribution)
    @foreach ($contribution as $c)

        <h2>{{$c->post_id}} ： {{ $c->user_id }}さんの投稿</h2>

        <br><img src="data:image/png;base64, {{ $c->image }}" alt=""><br>
        <h3>キャプション</h3><br>
        {{ $c->caption }}
        <br><hr>
    @endforeach
    @endisset

  </body>
</html>

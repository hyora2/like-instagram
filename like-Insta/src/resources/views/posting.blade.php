<!DOCTYPE HTML>
<html>
<head>
  <meta  charset="utf-8">
    <title>画像掲示板</title>
</head>
<body>

<h1>掲示板</h1>

<!-- エラーメッセージエリア -->
@if ($errors->any())
    <h2>エラーメッセージ</h2>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<!-- 投稿表示エリア（編集するのはここ！） -->
@isset($contribution)
@foreach ($contribution as $c)
    <h2>{{ $c->name }}さんの投稿</h2>
    <br><img src="data:image/png;base64, {{ $c->image }}" alt=""><br>
    <h3>キャプション</h3><br>
    {{ $c->comment }}
    <br><hr>
@endforeach
@endisset

<!-- フォームエリア -->
<h2>フォーム</h2>
<form action="posting" method="post" enctype="multipart/form-data">
  <div class="form-parts">
      名前:<br><input name="name">  <br>
    <label for="photo">画像ファイル:</label>
    <input type="file" accept="image/*" name="image"> <br>
    <br>
    コメント:<br>  <textarea name="comment" rows="4" cols="40"></textarea><br>

    {{ csrf_field() }}
    <button class="btn btn-success"> 投稿 </button>
  </div>
</form>

</body>
</html>

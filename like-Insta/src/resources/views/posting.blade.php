<!DOCTYPE HTML>
<html>
<head>
  @include('head', ['title' => '投稿フォーム'])
</head>
<body>
@include('headerbar')

<h1>掲示板投稿</h1>


<!-- エラーメッセージエリア -->
@if ($errors->any())
    <h2>エラーメッセージ</h2>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif



<!-- フォームエリア -->
<h2>フォーム</h2>
<form action="posting" method="post" enctype="multipart/form-data">
  <div class="form-parts">
      名前:<br><input name="user_id">  <br>
    <label for="photo">画像ファイル:</label>
    <input type="file" accept="image/*" name="image"> <br>
    <br>
    コメント:<br>  <textarea name="caption" rows="4" cols="40"></textarea><br>
    {{ csrf_field() }}
    <button class="btn btn-success"> 投稿 </button>
  </div>
</form>

</body>
</html>

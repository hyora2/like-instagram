<!DOCTYPE HTML>
<html>
<head>
  @include('head', ['title' => '投稿フォーム'])
    <link href="/css/maincontens.css" rel="stylesheet" type="text/css">
</head>
<body>
@include('headerbar')

<div class="maincontents">

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
<br>
<form action="posting" method="post" enctype="multipart/form-data" >
  <div class="form-parts">
      名前:{{$username}}<br><input type="hidden" name="username" value= " {{$username}} " >  <br>
    <label for="photo">画像ファイル:</label>
    <input type="file"  name="image"> <br>
    <br>
    キャプション:<br>  <textarea name="caption" rows="4" cols="40"></textarea><br>
    {{ csrf_field() }}
    <button class="btn btn-success"> 投稿 </button>
  </div>

</form>

</div>

</body>
</html>

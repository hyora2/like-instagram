<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ホーム画面</title>
  </head>
  <body>


<!-- エラーメッセージなければ表示なし-->
@if($errors->any())
<ul>
  @ foreach ($errors->all() as  $error)
    <li>{{ $error }}</li>
  @ endforeach

</ul>
@endif

<!-- 投稿表示エリア（編集するのはここ！） -->
@isset($bbs)
@foreach ($bbs as $d)
    <h2>{{ $d->file }}</h2>
    {{ $d->comment }}
    <br><hr>
@endforeach
@endisset



</body>
</html>


<form  action="{{ url('upload') }}" method="POST" enctype="multipart/form-data">


  <label for="photo">画像ファイル:</label>
  <input type="file" class="from-control" name="file">
  <br>キャプション</br>
  <textarea name="comment" rows="8" cols="80"></textarea>

  <br>
  <hr>
  {{ csrf_field() }}
  <button class="btn btn-success" >Update</button>
</form>

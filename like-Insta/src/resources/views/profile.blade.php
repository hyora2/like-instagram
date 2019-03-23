
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link href="/css/maincontens.css" rel="stylesheet" type="text/css">


    @include('head', ['title' => 'Home'])

  </head>

  <body>



@include('headerbar')
<div class="maincontents">


  <h3>
  <img src="data:image/png;base64, {{ $iconData }}" width="50" height="50">{{$username}}<br>
  </h3>
<div class="">
  いいね合計数 : {{$AmountOfLike}}
</div>

<h4>投稿物</h4><br>
<div id="oneusercont">
<ul class="box-list">
@isset($contributions)
@foreach ($contributions as $c)
<li>
<img src="data:image/png;base64, {{ $c->image }}">　
</li>
@endforeach
@endisset
</ul>
</div>
</div>

</body>

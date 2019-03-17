@include('headerbar')



<h3>ユーザーネーム ：{{$username}}</h3><br>

<br><img src="data:image/png;base64, {{ $iconData }}" alt=""><br>
<h4>投稿物</h4><br>


@isset($contributions)
@foreach ($contributions as $c)


    <br><img src="data:image/png;base64, {{ $c->image }}" alt=""><br>

  
@endforeach
@endisset

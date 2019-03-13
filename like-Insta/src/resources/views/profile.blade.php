@include('headerbar')

@isset($token)
{{$token}}
@endisset


<h3>ユーザーネーム ：{{$username}}</h3><br>
<br>
<br><img src="data:image/png;base64, {{ $iconData }}" alt=""><br>

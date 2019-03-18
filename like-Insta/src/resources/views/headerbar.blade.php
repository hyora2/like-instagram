<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <!-- <link href="css/app.css" rel="stylesheet" type="text/css"> -->
  </head>
  <body>
    <header>

            <nav id="mainNav" >

                        <ul >
                            <li >    <a href="/home">ホーム</a>        </li>
                            <?php if( empty( session()->has('username')) ) {   ?>
                              <li>  <a href="/welcome">login</a></li>
                            <?php }else {   ?>
                              <li><a href="/logout">logout</a> </li>
                            <?php }   ?>
                            <li>      <a href="/posting">投稿</a>    </li>
                            <li>        <a href="/mypage">マイページ</a>    </li>

                        </ul>
            </nav>
    </header>



  </body>
</html>


<!DOCTYPE html>
<html >
  <head>
    <meta charset="utf-8">
    <title>postのサンプル</title>
  </head>
  <body>
    <?php
    if(isset($_POST["comment"])){
      $comment = htmlspecialchars($_POST["comment"]);
      printf("あなたのコメントは「 ${comment} 」です");

    }else {
      // code...
    ?>
    <p>コメントしてください</p>
    <form method="post" action="index.php">
      <input  name="comment"/>
      <input type="submit"  value="送信" />
    </form>
    
<?php
}
 ?>

  </body>
</html>

<?php
$dsn = 'pgsql:dbname=TEST;host=pgsql;port=5432';
$user = 'postgres';
$pass = 'example';

try {
$dbh = new PDO($dsn,$user,$pass);
//ここでクエリ実行
$query_result = $dbh->query('SELECT * FROM test_comment');

//DB切断
  $dbh = null;

} catch (PDOException $e) {
  print "DB ERROR" . $e->getMassage() . "<br/>";
  die();
}
?>
<?php

   foreach($query_result as $row) {
     print $row["name"] . ": " . $row["text"] . "<br/>";
   }
 ?>

<html>
<head><title>lost</title></head>
<body>

  <a href="index.html">ホーム</a> <br />
  <a href="lostinfo.html">戻る</a> <br />
  　<hr/>

<?php

$dsn = "mysql:dbname=test1;host=localhost;charset=utf8;unix_socket=/tmp/mysql.sock";
$user = "USERNAME HERE";
$password = "PASSWORD HERE";

$thing = $_POST['thing'];
$north = $_POST["north"];
$south = $_POST["south"];
$east = $_POST["east"];
$west = $_POST["west"];

try{
    $dbh = new PDO($dsn, $user, $password);

    if ($dbh == null){
        print('接続に失敗しました。<br>');
    }else{
        print('接続に成功しました。<br>');
    }

//$sql = "select * from found3 where thing = '$thing'";
//$sql = "select * from found3 join userinfo on found3.userid=userinfo.id where thing = '$thing'";
    $sql = "select * from found3 join userinfo2 on found3.userid=userinfo2.uid where thing = '$thing'";
    $stmt=$dbh->query($sql);  //Data Source Name

    //echo htmlspecialchars($_POST['thing']);
    foreach ($stmt as $row) {
      //if(strcmp($row['thing'],htmlspecialchars($_POST['thing']))==0){
        if($row['latitude']<(double)$north && $row['latitude']>(double)$south
        && $row['longitude']<(double)$east && $row['longitude']>(double)$west){
          echo '<a href="hello.html"><img src="./upload/'.$row['posttime'].'"align="center" width="150" height="150"></a>';
          print($row['thing'].' ');
          print($row['year'].'年 ');
          print($row['month'].'月 ');
          print($row['place'].'<br>');
          print('　　　　　　　　　');
          print('届け先：'.$row['displayname'].'<br>');
          print('<hr/>');
        }
      //}
    }
}catch (PDOException $e){
    print('Error:'.$e->getMessage());
    die();
}

$dbh = null;

?>
</body>
</html>

<html>
<head><title>lost</title></head>
<body>

  <a href="index.html">ホーム</a><br />
  <a href="show.html">戻る</a> <br />
  　<hr/>


<?php
$dsn = "mysql:dbname=test1;host=localhost;charset=utf8;unix_socket=/tmp/mysql.sock";
$user = "USERNAME HERE";
$password = "PASSWORD HERE";

$userid = $_POST['userid'];


try{
    $dbh = new PDO($dsn, $user, $password);

    if ($dbh == null){
        print('接続に失敗しました。<br>');
    }else{
        print('登録したもの<br>');
    }

    $sql = "select * from found3 where userid = $userid";
    $stmt=$dbh->query($sql);  //Data Source Name

    //echo htmlspecialchars($_POST['thing']);
    foreach ($stmt as $row) {
          print($row['id'].'. ');
          echo '<a href="hello.html"><img src="./upload/'.$row['posttime'].'"align="center" width="150" height="150"></a>';
          print($row['thing'].' ');
          print($row['year'].'年 ');
          print($row['month'].'月 ');
          print($row['place'].'<br>'); //print(<form>type='hidden')
          print('<hr/>');
    }

}catch (PDOException $e){
    print('Error:'.$e->getMessage());
    die();
}

$dbh = null;

?>
</body>
</html>

<html>
<head><title>lost</title></head>
<body>

  <a href="index.html">ホーム</a> <br />
  　<hr/>

<?php
$dsn = "mysql:dbname=test1;host=localhost;charset=utf8;unix_socket=/tmp/mysql.sock";
$user = "USERNAME HERE";
$password = "PASSWORD HERE";

$userid = $_POST['userid'];
$id = $_POST['id'];
try{
    $dbh = new PDO($dsn, $user, $password);
    $dbh2 = new PDO($dsn, $user, $password);

    if ($dbh == null){
        print('接続に失敗しました。<br>');
    }else{
        print('接続に成功しました。<br>');
    }

    $sql2 = "select * from found3 where userid = $userid and id = $id";
    $stmt2=$dbh2->query($sql2);  //Data Source Name

    //echo htmlspecialchars($_POST['thing']);
    foreach ($stmt2 as $row) {
      unlink( "./upload/". $row['posttime']);
    }


    $sql = "delete from found3 where userid = $userid and id = $id";
    $stmt=$dbh->query($sql);  //Data Source Name

}catch (PDOException $e){
    print('Error:'.$e->getMessage());
    die();
}

$dbh = null;

?>
</body>
</html>

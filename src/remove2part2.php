<html>
<head><title>lost</title></head>
<body>

  <a href="index.html">ホーム</a> <br />
  　<hr/>

<?php
$dsn = "mysql:dbname=test1;host=localhost;charset=utf8;unix_socket=/tmp/mysql.sock";
$user = "USERNAME HERE";
$password = "PASSWORD HERE";

$id = $_POST['id'];
try{
    $dbh = new PDO($dsn, $user, $password);

    if ($dbh == null){
        print('接続に失敗しました。<br>');
    }else{
        print('接続に成功しました。<br>');
    }



    $sql = "delete from found3 where id = $id";
    $stmt=$dbh->query($sql);  //Data Source Name

}catch (PDOException $e){
    print('Error:'.$e->getMessage());
    die();
}

$dbh = null;

?>
</body>
</html>

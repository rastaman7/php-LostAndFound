<html>
<head><title>found</title></head>

<body>

  <a href="index.html">ホーム</a> <br />
  <a href="foundinfo.html">戻る</a> <br />
  　<hr/>

<?php
$dsn = "mysql:dbname=test1;host=localhost;charset=utf8;unix_socket=/tmp/mysql.sock";
$user = "USERNAME HERE";
$password = "PASSWORD HERE";

$timestamp = time() ;

/*$upfile = $_FILES["photo"]["tmp_name"];

if($upfile==""){
  print("ファイルのアップロードができませんでした");
  exit;
}

$imgdat = file_get_contents($upfile);*/

if(mb_strlen($_POST['place'])>30 || mb_strlen($_POST['towhere'])>30){
  print("入力は３０文字以内でお願いします");
  exit;
}

if($_FILES['photo']){
  move_uploaded_file($_FILES['photo']['tmp_name'], './upload/'.$timestamp);
}

try{

  $pdo = new PDO($dsn, $user, $password);
  $st = $pdo->prepare("INSERT INTO found3 (thing, year, month, latitude, longitude, place, posttime, userid) VALUES(?,?,?,?,?,?,?,?)");
  $st->execute(array($_POST['thing'], $_POST['year'], $_POST['month'], $_POST['latitude'], $_POST['longitude'], $_POST['place'], $timestamp, $_POST['userid']));

}catch(PDOException $e){
  echo "Connection failed: " . $e->getMessage();
}
 ?>
 <p>ご協力ありがとうございます！</p>

</body>
</html>

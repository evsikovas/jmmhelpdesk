<?php
include('database.php');
require "auth.php";
require "header.php";
if($_SESSION['session']== 1) { //Buh
  ?>
  <!DOCTYPE html>
  <html>
  <head>
  <title>Нет доступа</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/css/style.css">
  </head>
  <body>
<h1 align="center" style="color:#358A1E;text-shadow: yellow 0 0 10px;">"Доступ Закрыт, Обратитесь к администратору"</h1>
  <?php
  require "footer.php";
  ?>
  </body>
  </html>
  <?php
} elseif($_SESSION['session']== 2) {
?>
<!DOCTYPE html>
<html>
<head>
<title>Нет доступа</title>
<meta charset="utf-8">
<link rel="stylesheet" href="/css/style.css">
</head>
<body>
<h1 align="center" style="color:#358A1E;text-shadow: yellow 0 0 10px;">"Доступ Закрыт, Обратитесь к администратору"</h1>
<?php
require "footer.php";
?>
</body>
</html>
<?php
} elseif($_SESSION['session']== 3) {
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 <title>Нет доступа</title>
 <meta charset="utf-8">
 <link rel="stylesheet" href="/css/style.css">
 </head>
 <body>
 <h1 align="center" style="color:#358A1E;text-shadow: yellow 0 0 10px;">"Доступ Закрыт, Обратитесь к администратору"</h1>
 <?php
 require "footer.php";
 ?>
 </body>
 </html>
 <?php
 } elseif($_SESSION['session']== 4) {
  ?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Console JMM HelpDesk</title>
<meta charset="utf-8">
<link rel="stylesheet" href="/css/style.css">
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="selectbox.js"></script>

</head>
<body>
<div>
  <?php

$table = "users";
if($_SERVER['REQUEST_METHOD']=='POST') { //form handler part:
  $id = mysql_real_escape_string($_POST['id']);
  $login = mysql_real_escape_string($_POST['login']);
   $pass = mysql_real_escape_string($_POST['pass']);
   $session = mysql_real_escape_string($_POST['session']);
//  echo 'before if';
$mdpass = md5($pass);
  if ($id = intval($_POST['id'])) {
    $querypos="UPDATE users SET login='$login',pass='$mdpass',session='$session' WHERE id=$id";
  }
  mysql_query($querypos) or trigger_error(mysql_error()." in ".$querypos);
  header('Refresh: 1; URL='.$_SERVER['HTTP_REFERER']);
  exit;
}
if (!isset($_GET['id'])) {
  $LIST=array();
  $query="SELECT * FROM $table ";
  $res=mysql_query($query);
  while($row=mysql_fetch_assoc($res)) $LIST[]=$row;
} else {
  if ($id=intval($_GET['id'])) {
    $query="SELECT * FROM users WHERE id=$id";
    $res=mysql_query($query);
    $row=mysql_fetch_assoc($res);
    foreach ($row as $k => $v) $row[$k]=htmlspecialchars($v);
  } else {
  $row['name']='';
  $row['id']=0;
}
}

?>

<h1 align="center" style="color:#358A1E;text-shadow: yellow 0 0 10px;"><?=$row['login']?></h1>
<?php
echo "<a href='ops-list.php'style='position:relative;left:35%;top:36px;' class='button' >Назад</a></br></br>";
?>
<form method="POST">
<table style='margin-left:35%' class='simple-little-table'>
<tr>
<th>
Имя пользователя:
</th>
<td>
<input type="text" name="login" value="<?=$row['login']?>"><br>
</td>
</tr>
<tr>
<th>
Пароль:
</th>
<td>
<input type="text" name="pass" value=""><br>
</td>
</tr>
<tr>
<th>
Права доступа:
</th>
<td>
  <div class="selectbox">
  <select name="session" class="slyled" value="">
    <option value="1">Видео</option>
    <option value="2">Просмотр</option>
    <option value="3">Редактирование</option>
    <option value="4">Полный доступ</option>

  </select>
</td>
</tr>
<tr>
<th>
</th>
<td>
</br>
<input type="hidden" id="submitbtn" name="id" value="<?=$row['id']?>">
<input type="submit" value="Изменить" class="button"><br>
</td>
</tr  >
</table>
</form>

</div>
</div>
</div>

</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>

<?php
require "footer.php";
?>
</body>
</html>

<?php
}
?>

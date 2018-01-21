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
  if($_SERVER['REQUEST_METHOD']=='POST') {
  $login = mysql_real_escape_string($_POST['login']);
  $pass = mysql_real_escape_string($_POST['pass']);
  $session = mysql_real_escape_string($_POST['session']);
  $mdpass = md5($pass);
  if (empty($login) && empty($pass)) {
   echo '<h2 align="center" style="color:red;">Заполните все поля</h2>';
  }
  else {
    $query = "INSERT INTO users VALUES (NULL,'$login','$mdpass','$session')";
     if(mysql_query($query)) {
    } else {
    }
  }
}
?>
<h1 align="center" style="color:#358A1E;text-shadow: yellow 0 0 10px;">Добавить пользователя</h1>
<?php
echo "<a href='users.php'style='position:relative;left:35%;top:36px;' class='button' >Назад</a></br></br>";
?>
<form method="POST">
<table style='margin-left:35%' class='simple-little-table'>
<tr>
<th>
Имя пользователя:
</th>
<td>
<input type="text" name="login" value=""><br>
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
<input type="submit" value="Создать" class="button"><br>
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

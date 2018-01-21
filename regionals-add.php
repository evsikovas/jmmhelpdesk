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
} else {
?>
<!DOCTYPE html>
<html>
<head>
<title>JMM HelpDesk</title>
<meta charset="utf-8">
<link rel="stylesheet" href="/css/style.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="selectbox.js"></script>
</head>
<body>
<div>
  <?php

if($_SERVER['REQUEST_METHOD']=='POST') {
$name = mysql_real_escape_string($_POST['name']);
$phone = mysql_real_escape_string($_POST['phone']);
$mail = mysql_real_escape_string($_POST['mail']);
if (empty($name) && empty($phone) && empty($mail)) {
 echo '<h2 align="center" style="color:red;">Заполните все поля</h2>';
}
else {
$query = "INSERT INTO regionals VALUES (NULL,'$name','$phone','$mail')";
if(mysql_query($query))
  {
  }
  else
  {
  }
}
}
?>
<h1 align="center" style="color:#358A1E;text-shadow: yellow 0 0 10px;">Добавление Регионального Менеджера</h1>
<?php
echo "<a href='regionals-list.php'style='position:relative;left:35%;top:36px;' class='button' >Назад</a></br></br>";
?>
<form method="POST">
<table style='margin-left:35%' class='simple-little-table'>
<tr>
<th>
ФИО:
</th>
<td>
<input type="text" name="name" value=""><br>
</td>
</tr>
<tr>
<th>
Телефон:
</th>
<td>
<input type="text" name="phone" value=""><br>
</td>
</tr>
<tr>
<th>
Договор:
</th>
<td>
<input type="text" name="mail" value=""><br>
</td>
</tr>
<tr>
<th>
</th>
<td>
<input type="hidden" id="submitbtn" name="id" value="">
<input type="submit" value="Отправить" class="button"><br>
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

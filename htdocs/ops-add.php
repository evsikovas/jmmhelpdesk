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
$name = mysql_real_escape_string($_POST['name']);
$mail = mysql_real_escape_string($_POST['mail']);
if (empty($name) && empty($mail)) {
 echo '<h2 align="center" style="color:red;">Заполните все поля</h2>';
}
else {
  $query = "INSERT INTO ops VALUES (NULL,'$name','$mail')";
   if(mysql_query($query))
  {
    // echo "Данные успешно добавлены";
  }
  else
  {
 //  echo "Ошибка - ".mysql_error();
  }
  }
// echo "</br>";
 // print_r($_POST);
// echo "</br>";
// echo 'after if';
//mysql_real_escape_string($_GET["id"]);
}
?>

<h1 align="center" style="color:#358A1E;text-shadow: yellow 0 0 10px;">Добавление Операционного директора</h1>
<?php
echo "<a href='ops-list.php'style='position:relative;left:35%;top:36px;' class='button' >Назад</a></br></br>";
?>
<form method="POST">
<table style='margin-left:35%' class='simple-little-table'>
<tr>
<th>
ФИО
</th>
<td>
<input type="text" name="name" value=""><br>
</td>
</tr>
<tr>
<th>
E-Mail
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

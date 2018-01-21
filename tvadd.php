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
} else {
?><!DOCTYPE html>
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
$name_id = mysql_real_escape_string($_POST['name_id']);
$date = mysql_real_escape_string($_POST['date']);
$tiket = mysql_real_escape_string($_POST['tiket']);
$comment = mysql_real_escape_string($_POST['comment']);
$rm = mysql_real_escape_string($_POST['rm']);
$ops = mysql_real_escape_string($_POST['ops']);
    $op_id = mysql_real_escape_string($_POST['op_id']);
if (empty($name_id) || empty($tiket)) {
  echo '<h2 align="center" style="color:red;">Заполните все поля</h2>';
 }
 else {
   if(!preg_match("|^[\d]+$|",$tiket))
 { echo '<h2 align="center" style="color:red;"> В Поле "заявка" должны быть только цыфры. </h2>'; }
 else {
 $query = "INSERT INTO `video` VALUES (NULL,'$name_id','$date','$tiket','$comment','$rm','$ops','$op_id')";
 if(mysql_query($query))
   {
      header('Location: /tvideo.php');
   }
   else
  {
  }
}
}
}

mysql_real_escape_string($_GET["id"]);
$id = isset($_GET['id']) ? $_GET['id'] : '';
$query = "SELECT * FROM oplist WHERE id = $id";
$result = mysql_query($query);
$myrow = mysql_fetch_assoc($result);

?>
<h1 align="center" style="color:#358A1E;text-shadow: yellow 0 0 10px;">🎥 Проблемы с Видео</h1>
<?php
echo "<a href='tvideo.php' style='position:relative;left:35%;top:36px;' class='button' >Назад</a></br></br>";
?>
<form method="POST">
<table style='margin-left:35%' class='simple-little-table'>
<tr>
<th>
Офис Продаж:
</th>
<td>
<input type="hidden" name="name_id" value="<?=$myrow['cid']?> - <?=$myrow['name']?>"><?=$myrow['cid']?> - <?=$myrow['name']?>
<input type="hidden" name="op_id" value="<?=$myrow['id']?>">
<br>
</td>
</tr>
<tr>
<th>
Дата:
</th>
<td><input type="text" name="date" value="<?php echo date('d.m.Y');?>"><br></td>
</tr>
<tr>
<th>
Заявка:
</th>
<td>
<input type="text" name="tiket" value=""><br>
</td>
</tr>
<tr>
<th>
Коментарий:
</th>
<td>
<textarea style="height: 150px" type="text" name="comment" value=""></textarea><br>
</td>
</tr>
<tr>
<th>
</th>
<td>
<input type="hidden" id="submitbtn" name="id" value="">
<input type="submit" value="Отправить" class="button"><br>
</td>
</tr>
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

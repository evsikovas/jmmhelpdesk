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
<title>JMM HelpDesk</title>
<meta charset="utf-8">
<link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div>
  <?php
$result=mysql_query('SELECT * FROM `regionals`');
?>
<h1 align="center" style="color:#358A1E;text-shadow: yellow 0 0 10px;">👦 Региональные Менеджеры</h1>
  <table style='margin-left:140px' width='80%' class='simple-little-table'>
  <tr>
    <th>Название</th>
    <th>Телефон</th>
    <th>E-mail</th>
  </tr>
<?php
while ($myrow=mysql_fetch_array($result)){
$id=$myrow['id'];
$name=$myrow['name'];
$phone=$myrow['phone'];
$mail=$myrow['mail'];
echo "<tr><td><a><a href='regionals.php?id=$myrow[id]'>$name</a></a></td><td><a>$phone</a></td><td><a>$mail</a></td></tr>";
}
?>
  </table>
</div>
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
<title>JMM HelpDesk</title>
<meta charset="utf-8">
<link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div>
  <?php
$result=mysql_query('SELECT * FROM `regionals`');
?>
<h1 align="center" style="color:#358A1E;text-shadow: yellow 0 0 10px;">👦 Региональные Менеджеры</h1>
<?php
echo "<a href='regionals-add.php'style='position:relative;left:9%;top:36px;' class='button' >Добавить</a></br></br>";
echo "<table style='margin-left:140px' width='80%' class='simple-little-table'>";
echo "<tr><th>Название</th><th>Телефон</th><th>E-mail</th><th style='font-size:13pt'>⚒</th></tr>";
while ($myrow=mysql_fetch_array($result)){
$id=$myrow['id'];
$name=$myrow['name'];
$phone=$myrow['phone'];
$mail=$myrow['mail'];
echo "<tr><td><a><a href='regionals.php?id=$myrow[id]'>$name</a></a></td><td><a>$phone</a></td><td><a>$mail</a></td><td style='font-size:13pt'><a href='regionals-edit.php?id=$myrow[id]'>⚒</a></td></tr>";
}
echo "</table>";
?>
</div>
</div>
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
<title>JMM HelpDesk</title>
<meta charset="utf-8">
<link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div>
  <?php
$result=mysql_query('SELECT * FROM `regionals`');
if(isset($_GET['del']) !=0 )
{
  $sqldel = "DELETE FROM regionals WHERE id=".$_GET['del'];
  $resdel=mysql_query($sqldel);
    if (!$resdel) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $sqldel;
    die($message);
  } else {
  }
}
?>
<h1 align="center" style="color:#358A1E;text-shadow: yellow 0 0 10px;">👦 Региональные Менеджеры</h1>
<?php
echo "<a href='regionals-add.php'style='position:relative;left:9%;top:36px;' class='button' >Добавить</a></br></br>";
echo "<table style='margin-left:140px' width='80%' class='simple-little-table'>";
echo "<tr><th>Название</th><th>Телефон</th><th>E-mail</th><th style='font-size:13pt'>⚒</th><th style='font-size:13pt'>✘</th></tr>";
while ($myrow=mysql_fetch_array($result)){
$id=$myrow['id'];
$name=$myrow['name'];
$phone=$myrow['phone'];
$mail=$myrow['mail'];
echo "<tr><td><a><a href='regionals.php?id=$myrow[id]'>$name</a></a></td><td><a>$phone</a></td><td><a>$mail</a></td><td style='font-size:13pt'><a href='regionals-edit.php?id=$myrow[id]'>⚒</a></td><td style='font-size:13pt'><a href='javascript:confirmDelete($myrow[id]);'>✘</a></td></tr>";
}
echo "</table>";
?>
</div>
</div>
<script type="text/javascript">
function confirmDelete(id) {
if (confirm("Вы подтверждаете удаление?")) {
  document.location.href = 'regionals-list.php?del=' +id;
} else {
  document.location = 'regionals-list.php';
}
}
</script>
<?php
require "footer.php";
?>
</body>
</html>
<?php
}
?>

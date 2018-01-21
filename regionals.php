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

mysql_real_escape_string($_GET["id"]);
$id = isset($_GET['id']) ? $_GET['id'] : '';
$query = "SELECT * FROM regionals WHERE id = $id";
$result = mysql_query($query);
$myrow = mysql_fetch_assoc($result);
?>
  <h1 align="center" style="color:#358A1E;text-shadow: yellow 0 0 10px;"><?=$myrow['name']?></h1>
  <table style='margin-left:35%' class='simple-little-table' border='0px'>
    <tr>
      <th><a>Региональный Менеджер:</a></th>
      <td><a><?=$myrow['name']?></a></td>
    </tr>
    <tr>
      <th><a>Телефон:</a></th>
      <td><a><?=$myrow['phone']?></a></td>
    </tr>
      <th><a>E-Mail:</a></th>
      <td><a><?=$myrow['mail']?></a></td>
    </tr>
  </table>
<?php
$quer1 = "SELECT * FROM `oplist` WHERE rm_id = $id";
$result1 = mysql_query($quer1);
$q3 = mysql_query("SELECT * FROM oplist LEFT JOIN region ON region.id = oplist.regions_id");
?>
  <table style='margin-left:140px' width='80%' class='simple-little-table'>
    <tr>
      <th>ID Офиса</th>
      <th>Офис Продаж</th>
      <th>Телефон</th>
      <th>E-Mail</th>
    </tr>
<?php
while ($row=mysql_fetch_array($result1)){
$id=$row['id'];
$cid=$row['cid'];
$name=$row['name'];
$phone=$row['phone'];
$ip=$row['ip'];
//$edit=$row['edit'];
$rm_id=$row['rm_id'];
$mail=$row['mail'];
$regions_id=$row['regions_id'];
$sp2=mysql_fetch_assoc($q3);
echo "<tr><td>$cid</td><td><a href='officesales.php?id=$row[id]'>$name</a></td><td>$phone</td><td>$mail</td></tr>";
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
<title>Admin Console JMM HelpDesk</title>
<meta charset="utf-8">
<link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div>
  <?php

mysql_real_escape_string($_GET["id"]);
$id = isset($_GET['id']) ? $_GET['id'] : '';
$query = "SELECT * FROM regionals WHERE id = $id";
$result = mysql_query($query);
$myrow = mysql_fetch_assoc($result);
?>
<h1 align="center" style="color:#358A1E;text-shadow: yellow 0 0 10px;"><?=$myrow['name']?></h1>
<?php
  echo "<a href='regionals-edit.php?id=$myrow[id]'style='position:relative;left:1%;top:36px;' class='button' >Редактировать</a></br></br></br>";
?>
<table style='margin-left:35%' class='simple-little-table' border='0px'>
<tr>
  <th>
    <a>Региональный Менеджер:</a>
  </th>
<td>
 <a><?=$myrow['name']?></a>
</td>
</tr>
<tr>
  <th>
    <a>Телефон:</a>
  </th>
<td>
 <a><?=$myrow['phone']?></a>
</td>
</tr>
  <th>
    <a>E-Mail:</a>
  </th>
<td>
 <a><?=$myrow['mail']?></a>
</td>
</tr>
</table>


<?php
$quer1 = "SELECT * FROM `oplist` WHERE rm_id = $id";
$result1 = mysql_query($quer1);
$q3 = mysql_query("SELECT * FROM oplist LEFT JOIN region ON oplist.regions_id = region.id");
echo "<table style='margin-left:140px' width='80%' class='simple-little-table'>";
echo "<tr><th>ID Офиса</th><th>Офис Продаж</th><th>Телефон</th><th>E-Mail</th></tr>";
while ($row=mysql_fetch_array($result1)){
  //print ($row);

$id=$row['id'];
$cid=$row['cid'];
$name=$row['name'];
$phone=$row['phone'];
$ip=$row['ip'];
//$edit=$row['edit'];
$rm_id=$row['rm_id'];
$mail=$row['mail'];
//$region_id=$row['region_id'];
$sp2=mysql_fetch_array($q3);
//$sp=mysql_fetch_array($q1);
echo "<tr><td>$cid</td><td><a href='officesales.php?id=$row[id]'>$name</a></td><td>$phone</td><td>$mail</td></tr>";
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
<title>Admin Console JMM HelpDesk</title>
<meta charset="utf-8">
<link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div>
  <?php

mysql_real_escape_string($_GET["id"]);
$id = isset($_GET['id']) ? $_GET['id'] : '';
$query = "SELECT * FROM regionals WHERE id = $id";
$result = mysql_query($query);
$myrow = mysql_fetch_assoc($result);
?>
<h1 align="center" style="color:#358A1E;text-shadow: yellow 0 0 10px;"><?=$myrow['name']?></h1>
<?php
  echo "<a href='regionals-edit.php?id=$myrow[id]'style='position:relative;left:1%;top:36px;' class='button' >Редактировать</a></br>";
echo "<a href='javascript:confirmDelete($myrow[id]);'style='position:relative;left:1%;top:38px;' class='button' >Удалить</a></br></br></br>";
?>
<table style='margin-left:35%' class='simple-little-table' border='0px'>
<tr>
  <th>
    <a>Региональный Менеджер:</a>
  </th>
<td>
 <a><?=$myrow['name']?></a>
</td>
</tr>
<tr>
  <th>
    <a>Телефон:</a>
  </th>
<td>
 <a><?=$myrow['phone']?></a>
</td>
</tr>
  <th>
    <a>E-Mail:</a>
  </th>
<td>
 <a><?=$myrow['mail']?></a>
</td>
</tr>
</table>


<?php
$quer1 = "SELECT * FROM `oplist` WHERE rm_id = $id";
$result1 = mysql_query($quer1);
$q3 = mysql_query("SELECT * FROM oplist LEFT JOIN region ON oplist.regions_id = region.id");
echo "<table style='margin-left:140px' width='80%' class='simple-little-table'>";
echo "<tr><th>ID Офиса</th><th>Офис Продаж</th><th>Телефон</th><th>E-Mail</th></tr>";
while ($row=mysql_fetch_array($result1)){
  //print ($row);

$id=$row['id'];
$cid=$row['cid'];
$name=$row['name'];
$phone=$row['phone'];
$ip=$row['ip'];
//$edit=$row['edit'];
$rm_id=$row['rm_id'];
$mail=$row['mail'];
//$region_id=$row['region_id'];
$sp2=mysql_fetch_array($q3);
//$sp=mysql_fetch_array($q1);
echo "<tr><td>$cid</td><td><a href='officesales.php?id=$row[id]'>$name</a></td><td>$phone</td><td>$mail</td></tr>";
}
echo "</table>";
?>
</div>
</div>
<script type="text/javascript">
function confirmDelete(id) {
if (confirm("Вы подтверждаете удаление?")) {
  document.location.href = 'regionals-list.php?del=' +id;
//    window.location.reload(true);
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

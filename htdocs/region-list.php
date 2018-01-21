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
$result=mysql_query('SELECT * FROM `region`');
?>
  <h1 align="center" style="color:#358A1E;text-shadow: yellow 0 0 10px;">🌄 Список Регионов</h1>
  <table style='margin-left:140px' width='80%' class='simple-little-table'>
  <tr>
    <th width="4%">#</th>
    <th>Регион</th>
  </tr>
<?php
$i=-1;
while ($myrow=mysql_fetch_array($result)){
$id=$myrow['id'];
$name=$myrow['name'];
$i++;
echo "<tr><td>$i</td><td><a href='region.php?id=$myrow[id]'>$name</a></td></tr>";
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
//mysql_real_escape_string($_GET['id']);
//Запрос к базе "OPLIST"
$result=mysql_query('SELECT * FROM `region`');
//$result = mysql_query($query);
//$myrow = mysql_fetch_assoc($result);

?>
<h1 align="center" style="color:#358A1E;text-shadow: yellow 0 0 10px;">🌄 Список Регионов</h1>



<?php
echo "<a href='region-add.php'style='position:relative;left:9%;top:36px;' class='button' >Добавить</a></br></br>";
//$quer1 = "SELECT * FROM `oplist` WHERE rm_id = $id";
//$result1 = mysql_query($quer1);
//$q3 = mysql_query("SELECT * FROM oplist LEFT JOIN region ON oplist.regions_id = region.id");
echo "<table style='margin-left:140px' width='80%' class='simple-little-table'>";
echo "<tr><th width='4%'>#</th><th>Регион</th><th style='font-size:13pt'>⚒</th></tr>";
$i=-1;
while ($myrow=mysql_fetch_array($result)){
  //print ($row);

$id=$myrow['id'];
$name=$myrow['name'];
$i++;
//$sp=mysql_fetch_array($q1);
echo "<tr><td>$i</td><td><a href='region.php?id=$myrow[id]'>$name</a></td><td style='font-size:13pt'><a href='region-edit.php?id=$myrow[id]'>⚒</a></td></tr>";
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
//mysql_real_escape_string($_GET['id']);
//Запрос к базе "OPLIST"
$result=mysql_query('SELECT * FROM `region`');
//$result = mysql_query($query);
//$myrow = mysql_fetch_assoc($result);
if(isset($_GET['del']) !=0 )
{
  $sqldel = "DELETE FROM region WHERE id=".$_GET['del'];
  $resdel=mysql_query($sqldel);

    if (!$resdel) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $sqldel;
    die($message);
  } else {

  }
}
?>
<h1 align="center" style="color:#358A1E;text-shadow: yellow 0 0 10px;">🌄 Список Регионов</h1>



<?php
echo "<a href='region-add.php'style='position:relative;left:9%;top:36px;' class='button' >Добавить</a></br></br>";
//$quer1 = "SELECT * FROM `oplist` WHERE rm_id = $id";
//$result1 = mysql_query($quer1);
//$q3 = mysql_query("SELECT * FROM oplist LEFT JOIN region ON oplist.regions_id = region.id");
echo "<table style='margin-left:140px' width='80%' class='simple-little-table'>";
echo "<tr><th width='4%'>#</th><th>Регион</th><th style='font-size:13pt' width='4%'>⚒</th><th style='font-size:13pt' width='4%'>✘</th></tr>";
$i=-1;
while ($myrow=mysql_fetch_array($result)){
  //print ($row);

$id=$myrow['id'];
$name=$myrow['name'];
$i++;
//$sp=mysql_fetch_array($q1);
echo "<tr><td>$i</td><td><a href='region.php?id=$myrow[id]'>$name</a></td><td style='font-size:13pt'><a href='region-edit.php?id=$myrow[id]'>⚒</a></td><td style='font-size:13pt'><a href='javascript:confirmDelete($myrow[id]);'>✘</a></td></tr>";
}
echo "</table>";
?>
</div>
</div>
<script type="text/javascript">
function confirmDelete(id) {
if (confirm("Вы подтверждаете удаление?")) {
  document.location.href = 'region-list.php?del=' +id;
//    window.location.reload(true);
} else {
  document.location = 'region-list.php';
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

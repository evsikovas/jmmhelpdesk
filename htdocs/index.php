<?php
  include('database.php');
  require "auth.php";
  require "header.php";
  if($_SESSION['session']== 1) { //Buh
?>
<!DOCTYPE html>
<html>
  <head>
    <title>JMM HelpDesk</title>
    <script type="text/javascript">
      $("a[href='#top']").click(function() {
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
      });
    </script>
    <link rel="stylesheet" href="/css/style.css">
  </head>
  <body>
    <div>
    <div style="position: fixed; top:50%; left:8px;" >
      <a href='#top' class='button' style="font-size:24pt">⬆</a>
    </div>
  <h1 align="center" style="color:#358A1E;text-shadow: yellow 0 0 10px;">💻 Видео в Офисах</h1>
<?php
  $result=mysql_query('SELECT * FROM `oplist`');
  $q1 = mysql_query("SELECT * FROM oplist LEFT JOIN regionals ON oplist.rm_id = regionals.id");
  $q2 = mysql_query("SELECT * FROM oplist LEFT JOIN ops ON oplist.dm_id = ops.id");
  $q3 = mysql_query("SELECT * FROM oplist LEFT JOIN region ON oplist.regions_id = region.id");
?>
  <table style='margin-left:70px' class='simple-little-table' width='90%' border='0'>
    <tr>
      <th>ID Офиса</th>
      <th>Офис Продаж</th>
      <th>Видео наблюдение</th>
      <th>Логин</th>
      <th>Пароль</th>
      <th>Программа для просмотра</th>
    </tr>
<?php
  while ($row=mysql_fetch_array($result)){
    $id=$row['id'];
    $cid=$row['cid'];
    $name=$row['name'];
    $ip=$row['ip'];
    $port_r=$row['port_r'];
    $pass_reg=$row['pass_reg'];
    $po_reg=$row['po_reg'];

    $sp2=mysql_fetch_array($q3);
    echo "<tr><td>$cid</td></td><td>$name</td><td>http://$ip:$port_r</td><td>admin</td><td>$pass_reg<td>$po_reg</td></tr>";
  }
?>
  </table>
  </div>
  </br>
  </br>
  </div>
<?php
  require "footer.php";
?>
<?php
} elseif($_SESSION['session']== 4) { //Super Admin
?>
<!DOCTYPE html>
<html>
<head>
<title>JMM HelpDesk</title>
<script type="text/javascript">
$("a[href='#top']").click(function() {
  $("html, body").animate({ scrollTop: 0 }, "slow");
  return false;
});
</script>
<link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div>
<div style="position: fixed; top:50%; left:8px;" >
<a href='#top' class='button' style="font-size:24pt">⬆</a>
</div>
<h1 align="center" style="color:#358A1E;text-shadow: yellow 0 0 10px;">JMM HelpDesk</h1>

<?php
$result=mysql_query('SELECT * FROM `oplist`');
$q1 = mysql_query("SELECT * FROM oplist LEFT JOIN regionals ON oplist.rm_id = regionals.id");
$q2 = mysql_query("SELECT * FROM oplist LEFT JOIN ops ON oplist.dm_id = ops.id");
$q3 = mysql_query("SELECT * FROM oplist LEFT JOIN region ON oplist.regions_id = region.id");
if(isset($_GET['del']) !=0 )
{
$sqldel = "DELETE FROM oplist WHERE id=".$_GET['del'];
$resdel=mysql_query($sqldel);
  if (!$resdel) {
  $message  = 'Invalid query: ' . mysql_error() . "\n";
  $message .= 'Whole query: ' . $sqldel;
  die($message);
} else {
}
}
$row='';
$i=0;
print "<script language='javascript'>var row1='$row'; alert(obj.test);</script>";
echo "";
echo "<table style='margin-left:70px' class='simple-little-table' width='90%' border='0' >";
echo "<tr><th width='4%'>#</th><th>ID Офиса</th><th>Регион</th><th>Офис Продаж</th><th>Телефон</th><th>IP Адрес</th><th style='font-size:13pt'>⚒</th><th style='font-size:13pt'>✘</th></tr>";
while ($row=mysql_fetch_array($result)){
$id=$row['id'];
$cid=$row['cid'];
$name=$row['name'];
$phone=$row['phone'];
$ip=$row['ip'];
$i++;

$sp2=mysql_fetch_array($q3);
$data[] = array($row['id']);
echo "<tr><td>$i</td><td>$cid</td><td><a href='region.php?id=$sp2[id]'>$sp2[name]</a></td><td><a href='officesales.php?id=$row[id]'>$name</a></td><td>$phone</td><td>$ip</td><td style='font-size:13pt'><a href='officesales-edit.php?id=$row[id]'>⚒</a></td><td style='font-size:13pt'><a href='javascript:confirmDelete($row[id]);'>✘</a></td></tr>";
}
echo "</table>";
?>
<script type="text/javascript">
function confirmDelete(id) {
if (confirm("Вы подтверждаете удаление?")) {
document.location = 'index.php?del=' +id;

} else {
document.location = 'index.php';
}
}
</script>
</div>
</div>
<?php
require "footer.php";
?>




<?php
} elseif($_SESSION['session']== 3) { //admin
?>




<!DOCTYPE html>
<html>
<head>
<title>JMM HelpDesk</title>
<script type="text/javascript">
$("a[href='#top']").click(function() {
  $("html, body").animate({ scrollTop: 0 }, "slow");
  return false;
});
</script>
<link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div>
<div style="position: fixed; top:50%; left:8px;" >
<a href='#top' class='button'style="font-size:24pt">⬆</a>
</div>
<h1 align="center" style="color:#358A1E;text-shadow: yellow 0 0 10px;">JMM HelpDesk</h1>

<?php
$result=mysql_query('SELECT * FROM `oplist`');
//Связь таблиц по ключам
$q3 = mysql_query("SELECT * FROM oplist LEFT JOIN region ON oplist.regions_id = region.id");

$row='';
print "<script language='javascript'>var row1='$row'; alert(obj.test);</script>";
echo "";
echo "<table style='margin-left:70px' class='simple-little-table' width='90%' border='0' >";
echo "<tr><th>#</th><th>ID Офиса</th><th>Регион</th><th>Офис Продаж</th><th>Телефон</th><th>IP Адрес</th><th style='font-size:13pt'>⚒</th></tr>";
$i=0;
while ($row=mysql_fetch_array($result)){
$id=$row['id'];
$cid=$row['cid'];
$name=$row['name'];
$phone=$row['phone'];
$ip=$row['ip'];
$sp2=mysql_fetch_array($q3);
$i++;
$data[] = array($row['id']);
echo "<tr><td>$i</td><td>$cid</td><td><a href='region.php?id=$sp2[id]'>$sp2[name]</a></td><td><a href='officesales.php?id=$row[id]'>$name</a></td><td>$phone</td><td>$ip</td><td style='font-size:13pt'><a href='officesales-edit.php?id=$row[id]'>⚒</td></tr>";
}
echo "</table>";
?>
</div>
</div>
<?php
require "footer.php";
?>
<?php
}
else { //Helpdesk
?>
<!DOCTYPE html>
<html>
<head>
<title>JMM HelpDesk</title>
<script type="text/javascript">
$("a[href='#top']").click(function() {
  $("html, body").animate({ scrollTop: 0 }, "slow");
  return false;
});
</script>
<link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div>
	<div style="position: fixed; top:50%; left:0px;" >
		<a href='#top' class='button' style="font-size:24pt">⬆</a>
	</div>
	<h1 align="center" style="color:#358A1E;text-shadow: yellow 0 0 10px;">JMM HelpDesk</h1>
<?php
$result=mysql_query('SELECT * FROM `oplist`');
$q1 = mysql_query("SELECT * FROM oplist LEFT JOIN regionals ON oplist.rm_id = regionals.id");
$q2 = mysql_query("SELECT * FROM oplist LEFT JOIN ops ON oplist.dm_id = ops.id");
$q3 = mysql_query("SELECT * FROM oplist LEFT JOIN region ON oplist.regions_id = region.id");
?>

	<table style='margin-left:70px' class='simple-little-table' width='90%' border='0'>
		<tr>
      <th width="4%">#</th>
			<th style="width: 60px">ID Офиса</th>
			<th width="20%">Регион</th>
			<th>Офис Продаж</th>
			<th width="10%">Телефон</th>
			<th width="10%">IP Адрес</th>
		</tr>
<?php
$i=0;
while ($row=mysql_fetch_array($result)){
$id=$row['id'];
$cid=$row['cid'];
$name=$row['name'];
$phone=$row['phone'];
$ip=$row['ip'];
$i++;
$sp2=mysql_fetch_array($q3);
echo "<tr><td>$i</td><td>$cid</td></td><td><a href='region.php?id=$sp2[id]'>$sp2[name]</a></td><td><a href='officesales.php?id=$row[id]'>$name</a></td><td>$phone</td><td>$ip</td></tr>";
}
?>
	</table>
</div>
</br>
</br>
</div>
<?php
require "footer.php";
}
?>
</body>
</html>

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
	   <h1 align="center" style="color:#358A1E;text-shadow: yellow 0 0 10px;">🎥 Проблемы с Видео</h1>
<?php
  if(isset($_GET['del']) !=0 ) {
    $sqldel = "DELETE FROM video WHERE id=".$_GET['del'];
    $resdel=mysql_query($sqldel);
    if (!$resdel) {
      $message  = 'Invalid query: ' . mysql_error() . "\n";
      $message .= 'Whole query: ' . $sqldel;
      die($message);
    } else {
    }
  }
  mysql_real_escape_string($_GET["date"]);
  $date = isset($_GET['date']) ? $_GET['date'] : '';
        $query = "SELECT * FROM `video` WHERE `date` = '$date'";
        $res = mysql_query($query);
?>
	<table style='margin-left:70px' class='simple-little-table' width='90%' border='0'>
		<tr>
			<th>ID</th>
			<th>Офис</th>
			<th>Дата</th>
            <th>Заявка</th>
            <th>Региональный Менеджер</th>
            <th>Операционный Директор</th>
			<th>Коментарий</th>
      <th style='font-size:13pt'>⚒</th>
		</tr>
<?php
while ($row=mysql_fetch_assoc($res)){
$id=$row['id'];
$name_id=$row['name_id'];
$date=$row['date'];
$comment=$row['comment'];
$tiket=$row['tiket'];
$rm=$row['rm'];
$ops=$row['ops'];

echo "<tr><td>$id</td><td><a href='officesales.php?id=$row[op_id]'>$name_id</a></a></td><td>$date</td><td><a href='http://192.168.106.99/request/$tiket' target='_blank'>$tiket</a></td><td>$rm</td><td>$ops</td><td>$comment</td><td style='font-size:13pt'><a href='tvideo-edit.php?id=$row[id]'>⚒</a></td></tr>";
}
echo '<div style="margin-left:5%">';
echo '</div>';
?>
	</table>
</div>
<script type="text/javascript">
function confirmDelete(id) {
if (confirm("Вы подтверждаете удаление?")) {
  document.location.href = 'tvideo.php?del=' +id;
//    window.location.reload(true);
} else {
  document.location = 'tvideo.php';
}
}
</script>

</br>
</br>
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
	   <h1 align="center" style="color:#358A1E;text-shadow: yellow 0 0 10px;">🎥 Проблемы с Видео</h1>
<?php
  if(isset($_GET['del']) !=0 ) {
    $sqldel = "DELETE FROM video WHERE id=".$_GET['del'];
    $resdel=mysql_query($sqldel);
    if (!$resdel) {
      $message  = 'Invalid query: ' . mysql_error() . "\n";
      $message .= 'Whole query: ' . $sqldel;
      die($message);
    } else {
    }
  }
  mysql_real_escape_string($_GET["date"]);
  $date = isset($_GET['date']) ? $_GET['date'] : '';
        $query = "SELECT * FROM `video` WHERE `date` = '$date'";
        $res = mysql_query($query);
?>
	<table style='margin-left:70px' class='simple-little-table' width='90%' border='0'>
		<tr>
			<th>ID</th>
			<th>Офис</th>
			<th>Дата</th>
            <th>Заявка</th>
            <th>Региональный Менеджер</th>
            <th>Операционный Директор</th>
			<th>Коментарий</th>
      <th style='font-size:13pt'>⚒</th>
            <th>✘</th>
		</tr>
<?php
while ($row=mysql_fetch_assoc($res)){
$id=$row['id'];
$name_id=$row['name_id'];
$date=$row['date'];
$comment=$row['comment'];
$tiket=$row['tiket'];
$rm=$row['rm'];
$ops=$row['ops'];

echo "<tr><td>$id</td><td><a href='officesales.php?id=$row[op_id]'>$name_id</a></a></td><td>$date</td><td><a href='http://192.168.106.99/request/$tiket' target='_blank'>$tiket</a></td><td>$rm</td><td>$ops</td><td>$comment</td><td style='font-size:13pt'><a href='tvideo-edit.php?id=$row[id]'>⚒</a></td><td><a href='javascript:confirmDelete($row[id]);'>✘</a></td></tr>";
}
echo '<div style="margin-left:5%">';
echo '</div>';
?>
	</table>
</div>
<script type="text/javascript">
function confirmDelete(id) {
if (confirm("Вы подтверждаете удаление?")) {
  document.location.href = 'tvideo.php?del=' +id;
//    window.location.reload(true);
} else {
  document.location = 'tvideo.php';
}
}
</script>

</br>
</br>
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
	   <h1 align="center" style="color:#358A1E;text-shadow: yellow 0 0 10px;">🎥 Проблемы с Видео</h1>
<?php
  if(isset($_GET['del']) !=0 ) {
    $sqldel = "DELETE FROM video WHERE id=".$_GET['del'];
    $resdel=mysql_query($sqldel);
    if (!$resdel) {
      $message  = 'Invalid query: ' . mysql_error() . "\n";
      $message .= 'Whole query: ' . $sqldel;
      die($message);
    } else {
    }
  }
  mysql_real_escape_string($_GET["date"]);
  $date = isset($_GET['date']) ? $_GET['date'] : '';
        $query = "SELECT * FROM `video` WHERE `date` = '$date'";
        $res = mysql_query($query);
?>
	<table style='margin-left:70px' class='simple-little-table' width='90%' border='0'>
		<tr>
			<th>ID</th>
			<th>Офис</th>
			<th>Дата</th>
            <th>Заявка</th>
            <th>Региональный Менеджер</th>
            <th>Операционный Директор</th>
			<th>Коментарий</th>
      <th style='font-size:13pt'>⚒</th>
            <th>✘</th>
		</tr>
<?php
while ($row=mysql_fetch_assoc($res)){
$id=$row['id'];
$name_id=$row['name_id'];
$date=$row['date'];
$comment=$row['comment'];
$tiket=$row['tiket'];
$rm=$row['rm'];
$ops=$row['ops'];

echo "<tr><td>$id</td><td><a href='officesales.php?id=$row[op_id]'>$name_id</a></a></td><td>$date</td><td><a href='http://192.168.106.99/request/$tiket' target='_blank'>$tiket</a></td><td>$rm</td><td>$ops</td><td>$comment</td><td style='font-size:13pt'><a href='tvideo-edit.php?id=$row[id]'>⚒</a></td><td><a href='javascript:confirmDelete($row[id]);'>✘</a></td></tr>";
}
echo '<div style="margin-left:5%">';
echo '</div>';
?>
	</table>
</div>
<script type="text/javascript">
function confirmDelete(id) {
if (confirm("Вы подтверждаете удаление?")) {
  document.location.href = 'tvideo.php?del=' +id;
//    window.location.reload(true);
} else {
  document.location = 'tvideo.php';
}
}
</script>

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

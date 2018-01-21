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
if($_SERVER['REQUEST_METHOD']=='POST') {
  $date = mysql_real_escape_string($_POST['date']);
header("Location: /tvideo-date.php?date=$date");
}
$for_page = 50; //число записей на странице
$num_links = 1; //число ссылок слева/справа

$res = mysql_query('SELECT COUNT(1) FROM `video`');
if($res)
    $row = mysql_fetch_array($res, MYSQL_NUM);
$all = !empty($row[0]) ? $row[0] : 0;

$cur_page = isset($_GET['page']) ? (int) $_GET['page']: 0; //текущая страница (берется из $_GET['page'])
$cur_page = $cur_page < 1 ? 1 : $cur_page; //если задали левое значение, устанавливаем первую страницу

$pages = ceil($all / $for_page); //количество необходимых страниц

if($cur_page > $pages)
{
    //ошибка, такой страницы не может быть..
}
else
{
    $limit = ' LIMIT ' . ($cur_page - 1) * $for_page . ', ' . $for_page;
    $query = 'SELECT * FROM `video` ORDER BY `id` DESC' . $limit;

    $res = mysql_query($query);

?>
<div class="center">
  <table>
    <tr>
      <th style='font-size:15pt; font-family: monospace; color:#000;text-shadow: red 0 0 0px'>Поиск по Дате:</th>
    </tr>
  </table>
<form method="POST">

  <input type="text" name="date" id="user" value="<?php echo date('d.m.Y');?>">
            <input type="hidden" id="submitbtn" name="id" value="">
        <input type="submit" style="width: 150px; margin-top: 4px;" value="Поиск" class="button">
          </form>
        </div>

	<table style='margin-left:70px' class='simple-little-table' width='90%' border='0'>
    <tr>
			<th>ID</th>

			<th>Офис</th>
			<th>Дата</th>
            <th>Заявка</th>
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

echo "<tr><td>$id</td></td><td><a href='officesales.php?id=$row[op_id]'>$name_id</a></a></td><td><a href='tvideo-date.php?date=$row[date]'>$date</a></td><td><a href='http://192.168.106.99/request/$tiket' target='_blank'>$tiket</a></td><td>$comment</td><td style='font-size:13pt'><a href='tvideo-edit.php?id=$row[id]'>⚒</a></td></tr>";
}
echo '<div style="margin-left:5%">';
  //links
    $start = $cur_page - $num_links > 0 ? $cur_page - $num_links : 1; //откуда начинаем выводить ссылки
    $end   = $cur_page + $num_links <= $pages ? $cur_page + $num_links : $pages; //докуда выводить

    if($cur_page > $start) //если текущая страница больше первой, выводим ссылку "Предыдущая"
        echo '<span class="previous"><a class="button" href="?page=', $cur_page - 1, '">❮</a></span> ';
    for($i = $start; $i <= $end; ++$i)
        if($i === $cur_page)
            echo '<span style=" background-color: #fff;" class="button" class="current">', $i, '</span> ';
        else
            echo '<a class="button" href="?page=', $i, '">', $i, '</a> ';

    if($cur_page < $end) //если текущая страница меньше последней, выводим ссыль "Следующая"
        echo '<span class="next"><a class="button" href="?page=', $cur_page + 1, '">❯</a></span> ';
}
//echo '</br></br><a class="button" style="" href="tvaddd.php">❮ADD❯</a>';
echo '</div>';
?>
	</table>
</div>
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
if($_SERVER['REQUEST_METHOD']=='POST') {
  $date = mysql_real_escape_string($_POST['date']);
header("Location: /tvideo-date.php?date=$date");
}
$for_page = 50; //число записей на странице
$num_links = 1; //число ссылок слева/справа

if(isset($_GET['del']) !=0 )
{
  $sqldel = "DELETE FROM video WHERE id=".$_GET['del'];
  $resdel=mysql_query($sqldel);

    if (!$resdel) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $sqldel;
    die($message);
  } else {

  }
}

$res = mysql_query('SELECT COUNT(1) FROM `video`');
if($res)
    $row = mysql_fetch_array($res, MYSQL_NUM);
$all = !empty($row[0]) ? $row[0] : 0;

$cur_page = isset($_GET['page']) ? (int) $_GET['page']: 0; //текущая страница (берется из $_GET['page'])
$cur_page = $cur_page < 1 ? 1 : $cur_page; //если задали левое значение, устанавливаем первую страницу

$pages = ceil($all / $for_page); //количество необходимых страниц

if($cur_page > $pages)
{
    //ошибка, такой страницы не может быть..
}
else
{
    $limit = ' LIMIT ' . ($cur_page - 1) * $for_page . ', ' . $for_page;
    $query = 'SELECT * FROM `video` ORDER BY `id` DESC' . $limit;

    $res = mysql_query($query);

?>
<div class="center">
  <table>
    <tr>
      <th style='font-size:15pt; font-family: monospace; color:#000;text-shadow: red 0 0 0px'>Поиск по Дате:</th>
    </tr>
  </table>
<form method="POST">

  <input type="text" name="date" id="user" value="<?php echo date('d.m.Y');?>">
            <input type="hidden" id="submitbtn" name="id" value="">
        <input type="submit" style="width: 150px; margin-top: 4px;" value="Поиск" class="button">
          </form>
        </div>

	<table style='margin-left:70px' class='simple-little-table' width='90%' border='0'>
    <tr>
			<th>ID</th>
			<th>Офис</th>
			<th>Дата</th>
            <th>Заявка</th>
			<th>Коментарий</th>
      <th style='font-size:13pt'>⚒</th>
            <th style='font-size:13pt'>✘</th>
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

echo "<tr><td>$id</td><td><a href='officesales.php?id=$row[op_id]'>$name_id</a></td><td><a href='tvideo-date.php?date=$row[date]'>$date</a></td><td><a href='http://192.168.106.99/request/$tiket' target='_blank'>$tiket</a></td><td>$comment</td><td style='font-size:13pt'><a href='tvideo-edit.php?id=$row[id]'>⚒</a></td><td style='font-size:13pt'><a href='javascript:confirmDelete($row[id]);'>✘</a></td></tr>";
}
echo '<div style="margin-left:5%">';
  //links
    $start = $cur_page - $num_links > 0 ? $cur_page - $num_links : 1; //откуда начинаем выводить ссылки
    $end   = $cur_page + $num_links <= $pages ? $cur_page + $num_links : $pages; //докуда выводить

    if($cur_page > $start) //если текущая страница больше первой, выводим ссылку "Предыдущая"
        echo '<span class="previous"><a class="button" href="?page=', $cur_page - 1, '">❮</a></span> ';
    for($i = $start; $i <= $end; ++$i)
        if($i === $cur_page)
            echo '<span style=" background-color: #fff;" class="button" class="current">', $i, '</span> ';
        else
            echo '<a class="button" href="?page=', $i, '">', $i, '</a> ';

    if($cur_page < $end) //если текущая страница меньше последней, выводим ссыль "Следующая"
        echo '<span class="next"><a class="button" href="?page=', $cur_page + 1, '">❯</a></span> ';
}
//echo '</br></br><a class="button" style="" href="tvaddd.php">❮ADD❯</a>';
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
if($_SERVER['REQUEST_METHOD']=='POST') {
  $date = mysql_real_escape_string($_POST['date']);
header("Location: /tvideo-date.php?date=$date");
}
$for_page = 50; //число записей на странице
$num_links = 1; //число ссылок слева/справа

if(isset($_GET['del']) !=0 )
{
  $sqldel = "DELETE FROM video WHERE id=".$_GET['del'];
  $resdel=mysql_query($sqldel);

    if (!$resdel) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $sqldel;
    die($message);
  } else {

  }
}

$res = mysql_query('SELECT COUNT(1) FROM `video`');
if($res)
    $row = mysql_fetch_array($res, MYSQL_NUM);
$all = !empty($row[0]) ? $row[0] : 0;

$cur_page = isset($_GET['page']) ? (int) $_GET['page']: 0; //текущая страница (берется из $_GET['page'])
$cur_page = $cur_page < 1 ? 1 : $cur_page; //если задали левое значение, устанавливаем первую страницу

$pages = ceil($all / $for_page); //количество необходимых страниц

if($cur_page > $pages)
{
    //ошибка, такой страницы не может быть..
}
else
{
    $limit = ' LIMIT ' . ($cur_page - 1) * $for_page . ', ' . $for_page;
    $query = 'SELECT * FROM `video` ORDER BY `id` DESC' . $limit;

    $res = mysql_query($query);

?>
<div class="center">
  <table>
    <tr>
      <th style='font-size:15pt; font-family: monospace; color:#000;text-shadow: red 0 0 0px'>Поиск по Дате:</th>
    </tr>
  </table>
<form method="POST">

  <input type="text" name="date" id="user" value="<?php echo date('d.m.Y');?>">
            <input type="hidden" id="submitbtn" name="id" value="">
        <input type="submit" style="width: 150px; margin-top: 4px;" value="Поиск" class="button">
          </form>
        </div>
	<table style='margin-left:70px' class='simple-little-table' width='90%' border='0'>
		<tr>
			<th>ID</th>
			<th>Офис</th>
			<th>Дата</th>
            <th>Заявка</th>
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

echo "<tr><td>$id</td><td><a href='officesales.php?id=$row[op_id]'>$name_id</a></a></td><td><a href='tvideo-date.php?date=$row[date]'>$date</a></td><td><a href='http://192.168.106.99/request/$tiket' target='_blank'>$tiket</a></td><td>$comment</td><td style='font-size:13pt'><a href='tvideo-edit.php?id=$row[id]'>⚒</a></td><td><a href='javascript:confirmDelete($row[id]);'>✘</a></td></tr>";
}
echo '<div style="margin-left:5%">';
  //links
    $start = $cur_page - $num_links > 0 ? $cur_page - $num_links : 1; //откуда начинаем выводить ссылки
    $end   = $cur_page + $num_links <= $pages ? $cur_page + $num_links : $pages; //докуда выводить

    if($cur_page > $start) //если текущая страница больше первой, выводим ссылку "Предыдущая"
        echo '<span class="previous"><a class="button" href="?page=', $cur_page - 1, '">❮</a></span> ';
    for($i = $start; $i <= $end; ++$i)
        if($i === $cur_page)
            echo '<span style=" background-color: #fff;" class="button" class="current">', $i, '</span> ';
        else
            echo '<a class="button" href="?page=', $i, '">', $i, '</a> ';

    if($cur_page < $end) //если текущая страница меньше последней, выводим ссыль "Следующая"
        echo '<span class="next"><a class="button" href="?page=', $cur_page + 1, '">❯</a></span> ';
}
//echo '</br></br><a class="button" href="tvaddd.php">❮ADD❯</a>';
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

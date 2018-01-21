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
$result=mysql_query('SELECT * FROM `providerco`');
if(isset($_GET['del']) !=0 )
{
  $sqldel = "DELETE FROM providerco WHERE id=".$_GET['del'];
  $resdel=mysql_query($sqldel);
    if (!$resdel) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $sqldel;
    die($message);
  } else {
  }
}
?>
<h1 align="center" style="color:#358A1E;text-shadow: yellow 0 0 10px;">📞 Контакты Провайдеров</h1>
<?php
echo "<a href='providerco-add.php'style='position:relative;left:9%;top:36px;' class='button' >Добавить</a></br></br>";
echo "<table style='margin-left:140px' width='80%' class='simple-little-table'>";
echo "<tr><th width='4%'>#</th><th>Провайдер</th><th>Расположение</th><th>Тип</th><th>Договор</th><th>Телефон Тех. Поддержки</th><th style='width:400px'>Коментарий</th><th style='font-size:13pt'>⚒</th><th style='font-size:13pt'>✘</th></tr>";
$i=0;
while ($myrow=mysql_fetch_array($result)){
$id=$myrow['id'];
$name=$myrow['name'];
$type=$myrow['type'];
$dogovor=$myrow['dogovor'];
$tel=$myrow['tel'];
$comment=$myrow['comment'];
$dest=$myrow['dest'];
$i++;
echo "<tr><td>$i</td><td>$name</td><td>$dest</td><td>$type</td><td>$dogovor</td><td>$tel</td><td style='width:400px'>$comment</td><td style='font-size:13pt'><a href='providerco-edit.php?id=$myrow[id]'>⚒</a></td><td style='font-size:13pt'><a href='javascript:confirmDelete($myrow[id]);'>✘</a></td></tr>";
}
echo "</table>";
?>
</div>
</div>
<script type="text/javascript">
function confirmDelete(id) {
if (confirm("Вы подтверждаете удаление?")) {
  document.location.href = 'provider-listco.php?del=' +id;
} else {
  document.location = 'provider-listco.php';
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

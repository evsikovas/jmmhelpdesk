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
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<link rel="stylesheet" href="/css/style.css">
<meta charset="utf-8">
</head>
<body>
<div>
<?php
ob_implicit_flush(true);
ob_end_flush();
include('database.php');
mysql_real_escape_string($_GET["id"]);
$id = isset($_GET['id']) ? $_GET['id'] : '';
$query = "SELECT * FROM oplist WHERE id = $id";
$result = mysql_query($query);
$myrow = mysql_fetch_assoc($result);
$ip = $myrow['ip'];
$port_i = $myrow['port_i'];
$port_r = $myrow['port_r'];
$port_v = $myrow['port_v'];
$mailop = $myrow['mail'];
$echoregion = $myrow['regions_id'];
$dogovor_pr = $myrow['dogovor_pr'];
$speed = $myrow['speed'];
$lan = $myrow['lan'];
$conset = $myrow['conset'];
$numbbe = $myrow['numbbe'];
$numbmeg = $myrow['numbmeg'];
$modemgsm = $myrow['modemgsm'];
$commentop = $myrow['commentop'];



$queryregion = "SELECT * FROM region WHERE id = $echoregion";
$resultregion = mysql_query($queryregion);
$myrowregion = mysql_fetch_assoc($resultregion);
?>
<h1 align="center" style="color:#358A1E;text-shadow: yellow 0 0 10px;"><?=$myrow['name']?></h1>
<a style="margin-left:1%" class="button" href="/add.php?id=<?=$myrow['id']?>">Проблемы с интернетом</a></br>
<a style="margin-left:1%" class="button" href="/tvadd.php?id=<?=$myrow['id']?>">Проблемы с видео</a>
<table class='simple-little-table' border='0px'>
<tr>
  <th width='4%'><a>ID:</a></th>
  <td width='20%'><a><?=$myrow['cid']?></a></td>
  <th width='4%'><a>IP Адрес:</a></th>
  <td><a><?=$myrow['ip']?></a></td>
  <th width='4%'>
<?php echo '<a href="http://'.$ip.':'.$port_i.'/" target="_blank">Порт роутера:</a>';?>
  </th>
  <td>
<?php echo '<a href="http://'.$ip.':'.$port_i.'/" target="_blank"> '.$port_i.'</a>';?>
  </td>
  <th width='4%'><a>Провайдер:</a></th>
  <td><a><?=$myrow['provider']?></a></td>
</tr>
<tr>
  <th><a>Офис Продаж:</a></th>
  <td><a><?=$myrow['name']?></a></td>
  <th><a>Mask:</a></th>
  <td><a><?=$myrow['mask']?></a></td>
  <th><a>Порт Регистратора:</a></th>
  <td><a><?=$myrow['port_r']?></a></td>
  <th><a>Телефон Провайдера:</a></th>
  <td><a><?=$myrow['provider_phone']?></a></td>
</tr>
<tr>
  <th><a>Телефон:</a></th>
  <td><a><?=$myrow['phone']?></a></td>
  <th><a>Gateway:</a></th>
  <td><a><?=$myrow['gw']?></a></td>
  <th><a>Видео порт:</a></th>
  <td><a><?=$myrow['port_v']?></a></td>
  <th><a>Договор:</a></th>
  <td><a><?=$myrow['dogovor_pr']?></a></td>
</tr>
<tr>
  <th>E-mail:</th>
  <td><?=$myrow['mail']?></td>
  <th><a>Первичный DNS:</a></th>
  <td><a><?=$myrow['dnsone']?></a></td>
  <th><a>ПО для регистратора:</a></th>
  <td><a><?=$myrow['po_reg']?></a></td>
  <th><a>Пароль роутера:</a></th>
  <td><a><?=$myrow['pass_router']?></a></td>
</tr>
<tr>
  <th><a>Полный Адрес:</a></th>
  <td><a><?=$myrow['fullname']?></a></td>
  <th><a>Вторичный DNS:</a></th>
  <td><a><?=$myrow['dnstwo']?></a></td>
  <th><a>Для Ctrl+C/+V:</a></th>
  <td><a>http://<?=$myrow['ip']?>:<?=$myrow['port_r']?></a></td>
  <th><a>Пароль регистратора:</a></th>
  <td><a><?=$myrow['pass_reg']?></a></td>
</tr>
<tr>
  <th><a>Номер Билайн:</a></th>
  <td><a><?=$myrow['numbbe']?></a></td>
  <th><a>Номер Мегафон:</a></th>
  <td><a><?=$myrow['numbmeg']?></a></td>
  <th><a>Скорость Интернета:</a></th>
  <td><a><?=$myrow['speed']?> мб/с</a></td>
  <th><a>Внутрения сеть:</a></th>
  <td><a><?=$myrow['lan']?></a></td>
</tr>
<tr>
  <th><a>Особености подключения:</a></th>
  <td><a><?=$myrow['conset']?></a></td>
  <th><a>Сетевое оборудование:</a></th>
  <td><a><?=$myrow['nettools']?></a></td>
  <th><a>Модем GSM:</a></th>
  <td><a><?=$myrow['modemgsm']?></a></td>
  <th><a>Комментарий:</a></th>
  <td><a><?=$myrow['commentop']?></a></td>
</tr>
</table>
<script type="text/javascript">
 	function iopen(p) {
document.write("<iframe src='"+p+"'>");
}
</script>
<table class='simple-little-table' border='0px'>
<tr>
	<th width='440'><a href="#" class="click" data-frameid="1" data-framesrc="ping.php?id=<?=$myrow['id']?>">Ping</a><br></th>
	<th width='440'><a href="#" class="click" data-frameid="2" data-framesrc="ping-t.php?id=<?=$myrow['id']?>">Ping -t</a><br></th>
  <th width='440'><a href="#" class="click" data-frameid="3" data-framesrc="port.php?id=<?=$myrow['id']?>">Проверка портов</a><br></th>
</tr>
<tr>
	<td height="320">
	<div class="frameid-1" style="display:none"></div>
	</td>
	<td height="320">
	<div class="frameid-2" style="display:none"></div>
	</td>
  <td height="320">
  <div class="frameid-3" style="display:none"></div>
  </td>
</tr>
</table >
<script>
$(document).ready(function(){
  $('.click').on('click', function(){
    var frameId = $(this).data('frameid'),
        frameSrc = $(this).data('framesrc');
       $('.frameid-'+frameId).slideToggle(0);
    if(!document.getElementById(frameId)){
      $('<iframe />', {
       id : frameId,
       src : frameSrc
      }).appendTo('.frameid-'+frameId);
    }
  });
});
</script>
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
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<link rel="stylesheet" href="/css/style.css">
<meta charset="utf-8">
</head>
<body>
<div>
<?php
ob_implicit_flush(true);
ob_end_flush();
//Коннект к БД.
include('database.php');
mysql_real_escape_string($_GET["id"]);
$id = isset($_GET['id']) ? $_GET['id'] : '';
$query = "SELECT * FROM oplist WHERE id = $id";
$result = mysql_query($query);
$myrow = mysql_fetch_assoc($result);
$ip = $myrow['ip'];
$port_i = $myrow['port_i'];
$port_r = $myrow['port_r'];
$port_v = $myrow['port_v'];
$mailop = $myrow['mail'];
$echoregion = $myrow['regions_id'];
$dogovor_pr = $myrow['dogovor_pr'];

$speed = $myrow['speed'];
$lan = $myrow['lan'];
$nettools = $myrow['lan'];
$conset = $myrow['conset'];
$numbbe = $myrow['numbbe'];
$numbmeg = $myrow['numbmeg'];
$modemgsm = $myrow['modemgsm'];
$commentop = $myrow['commentop'];



$queryregion = "SELECT * FROM region WHERE id = $echoregion";
$resultregion = mysql_query($queryregion);
$myrowregion = mysql_fetch_assoc($resultregion);
?>
<h1 align="center" style="color:#358A1E;text-shadow: yellow 0 0 10px;"><?=$myrow['name']?></h1>

<?php
echo "<a href='officesales-edit.php?id=$myrow[id]'style='position:relative;left:1%;top:36px;' class='button' >Редактировать</a></br></br></br>";
?>
<a style="margin-left:1%" class="button" href="/add.php?id=<?=$myrow['id']?>">Проблемы с интернетом</a></br>
<a style="margin-left:1%" class="button" href="/tvadd.php?id=<?=$myrow['id']?>">Проблемы с видео</a>
<script type="text/javascript">
function confirmDelete(id) {
if (confirm("Вы подтверждаете удаление?")) {
  document.location = 'index.php?del=' +id;

} else {
  document.location = 'officesales.php?id=' +id;
}
}
</script>
<table class='simple-little-table' border='0px'>
  <tr>
    <th width='4%'><a>ID:</a></th>
    <td width='20%'><a><?=$myrow['cid']?></a></td>
    <th width='4%'><a>IP Адрес:</a></th>
    <td><a><?=$myrow['ip']?></a></td>
    <th width='4%'>
  <?php echo '<a href="http://'.$ip.':'.$port_i.'/" target="_blank">Порт роутера:</a>';?>
    </th>
    <td>
  <?php echo '<a href="http://'.$ip.':'.$port_i.'/" target="_blank"> '.$port_i.'</a>';?>
    </td>
    <th width='4%'><a>Провайдер:</a></th>
    <td><a><?=$myrow['provider']?></a></td>
  </tr>
<tr>
  <th><a>Офис Продаж:</a></th>
  <td><a><?=$myrow['name']?></a></td>
  <th><a>Mask:</a></th>
  <td><a><?=$myrow['mask']?></a></td>
  <th><a>Порт Регистратора:</a></th>
  <td><a><?=$myrow['port_r']?></a></td>
  <th><a>Телефон Провайдера:</a></th>
  <td><a><?=$myrow['provider_phone']?></a></td>
</tr>
<tr>
  <th><a>Телефон:</a></th>
  <td><a><?=$myrow['phone']?></a></td>
  <th><a>Gateway:</a></th>
  <td><a><?=$myrow['gw']?></a></td>
  <th><a>Видео порт:</a></th>
  <td><a><?=$myrow['port_v']?></a></td>
  <th><a>Договор:</a></th>
  <td><a><?=$myrow['dogovor_pr']?></a></td>
</tr>
<tr>
  <th>E-mail:</th>
  <td><?=$myrow['mail']?></td>
  <th><a>Первичный DNS:</a></th>
  <td><a><?=$myrow['dnsone']?></a></td>
  <th><a>ПО для регистратора:</a></th>
  <td><a><?=$myrow['po_reg']?></a></td>
  <th><a>Пароль роутера:</a></th>
  <td><a><?=$myrow['pass_router']?></a></td>
</tr>
<tr>
  <th><a>Полный Адрес:</a></th>
  <td><a><?=$myrow['fullname']?></a></td>
  <th><a>Вторичный DNS:</a></th>
  <td><a><?=$myrow['dnstwo']?></a></td>
  <th><a>Для Ctrl+C/+V:</a></th>
  <td><a>http://<?=$myrow['ip']?>:<?=$myrow['port_r']?></a></td>
  <th><a>Пароль регистратора:</a></th>
  <td><a><?=$myrow['pass_reg']?></a></td>
</tr>
<tr>
  <th><a>Номер Билайн:</a></th>
  <td><a><?=$myrow['numbbe']?></a></td>
  <th><a>Номер Мегафон:</a></th>
  <td><a><?=$myrow['numbmeg']?></a></td>
  <th><a>Скорость Интернета:</a></th>
  <td><a><?=$myrow['speed']?> мб/с</a></td>
  <th><a>Внутрения сеть:</a></th>
  <td><a><?=$myrow['lan']?></a></td>
</tr>
<tr>
  <th><a>Особености подключения:</a></th>
  <td><a><?=$myrow['conset']?></a></td>
  <th><a>Сетевое оборудование:</a></th>
  <td><a><?=$myrow['nettools']?></a></td>
  <th><a>Модем GSM:</a></th>
  <td><a><?=$myrow['modemgsm']?></a></td>
  <th><a>Комментарий:</a></th>
  <td><a><?=$myrow['commentop']?></a></td>
</tr>
</table>

     <script type="text/javascript">
     	function iopen(p)
{
document.write("<iframe src='"+p+"'>");
}

 </script>
<table class='simple-little-table' border='0px'>
	<tr>
	<th width='440' >
		<a href="#" class="click" data-frameid="1" data-framesrc="ping.php?id=<?=$myrow['id']?>">Ping</a><br>
	</th>
	<th width='440'>
		<a href="#" class="click" data-frameid="2" data-framesrc="ping-t.php?id=<?=$myrow['id']?>">Ping -t</a><br>
	</th>
    <th width='440'>
    <a href="#" class="click" data-frameid="3" data-framesrc="port.php?id=<?=$myrow['id']?>">Проверка портов</a><br>
  </th>
	</tr>
	<tr>
	<td height="320">
	<div class="frameid-1" style="display:none"></div>
	</td>
	<td height="320">
	<div class="frameid-2" style="display:none"></div>
	</td>
    <td height="320">
  <div class="frameid-3" style="display:none"></div>

  </td>
	</tr>
</table >



  <script>
$(document).ready(function(){
  $('.click').on('click', function(){
    var frameId = $(this).data('frameid'),
        frameSrc = $(this).data('framesrc');
       $('.frameid-'+frameId).slideToggle(0);
    if(!document.getElementById(frameId)){
      $('<iframe />', {
       id : frameId,
       src : frameSrc
      }).appendTo('.frameid-'+frameId);
    }
  });
});
  </script>

</script>

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
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

	<link rel="stylesheet" href="/css/style.css">
<meta charset="utf-8">

</head>
<body>
<div>

<?php
ob_implicit_flush(true);
ob_end_flush();
//Коннект к БД.
include('database.php');
mysql_real_escape_string($_GET["id"]);
$id = isset($_GET['id']) ? $_GET['id'] : '';
$query = "SELECT * FROM oplist WHERE id = $id";
$result = mysql_query($query);
$myrow = mysql_fetch_assoc($result);
$ip = $myrow['ip'];
$port_i = $myrow['port_i'];
$port_r = $myrow['port_r'];
$port_v = $myrow['port_v'];
$mailop = $myrow['mail'];
$echoregion = $myrow['regions_id'];
$dogovor_pr = $myrow['dogovor_pr'];
$speed = $myrow['speed'];
$lan = $myrow['lan'];
$conset = $myrow['conset'];
$numbbe = $myrow['numbbe'];
$numbmeg = $myrow['numbmeg'];
$modemgsm = $myrow['modemgsm'];
$commentop = $myrow['commentop'];



$queryregion = "SELECT * FROM region WHERE id = $echoregion";
$resultregion = mysql_query($queryregion);
$myrowregion = mysql_fetch_assoc($resultregion);
?>
<h1 align="center" style="color:#358A1E;text-shadow: yellow 0 0 10px;"><?=$myrow['name']?></h1>

<?php
echo "<a href='officesales-edit.php?id=$myrow[id]'style='position:relative;left:1%;top:36px;' class='button' >Редактировать</a></br></br></br>";
?>
<a style="margin-left:1%" class="button" href="/add.php?id=<?=$myrow['id']?>">Проблемы с интернетом</a></br>
<a style="margin-left:1%" class="button" href="/tvadd.php?id=<?=$myrow['id']?>">Проблемы с видео</a>
<script type="text/javascript">
function confirmDelete(id) {
if (confirm("Вы подтверждаете удаление?")) {
  document.location = 'index.php?del=' +id;

} else {
  document.location = 'officesales.php?id=' +id;
}
}
</script>
<table class='simple-little-table' border='0px'>
  <tr>
    <th width='4%'><a>ID:</a></th>
    <td width='20%'><a><?=$myrow['cid']?></a></td>
    <th width='4%'><a>IP Адрес:</a></th>
    <td><a><?=$myrow['ip']?></a></td>
    <th width='4%'>
  <?php echo '<a href="http://'.$ip.':'.$port_i.'/" target="_blank">Порт роутера:</a>';?>
    </th>
    <td>
  <?php echo '<a href="http://'.$ip.':'.$port_i.'/" target="_blank"> '.$port_i.'</a>';?>
    </td>
    <th width='4%'><a>Провайдер:</a></th>
    <td><a><?=$myrow['provider']?></a></td>
  </tr>
<tr>
  <th><a>Офис Продаж:</a></th>
  <td><a><?=$myrow['name']?></a></td>
  <th><a>Mask:</a></th>
  <td><a><?=$myrow['mask']?></a></td>
  <th><a>Порт Регистратора:</a></th>
  <td><a><?=$myrow['port_r']?></a></td>
  <th><a>Телефон Провайдера:</a></th>
  <td><a><?=$myrow['provider_phone']?></a></td>
</tr>
<tr>
  <th><a>Телефон:</a></th>
  <td><a><?=$myrow['phone']?></a></td>
  <th><a>Gateway:</a></th>
  <td><a><?=$myrow['gw']?></a></td>
  <th><a>Видео порт:</a></th>
  <td><a><?=$myrow['port_v']?></a></td>
  <th><a>Договор:</a></th>
  <td><a><?=$myrow['dogovor_pr']?></a></td>
</tr>
<tr>
  <th>E-mail:</th>
  <td><?=$myrow['mail']?></td>
  <th><a>Первичный DNS:</a></th>
  <td><a><?=$myrow['dnsone']?></a></td>
  <th><a>ПО для регистратора:</a></th>
  <td><a><?=$myrow['po_reg']?></a></td>
  <th><a>Пароль роутера:</a></th>
  <td><a><?=$myrow['pass_router']?></a></td>
</tr>
<tr>
  <th><a>Полный Адрес:</a></th>
  <td><a><?=$myrow['fullname']?></a></td>
  <th><a>Вторичный DNS:</a></th>
  <td><a><?=$myrow['dnstwo']?></a></td>
  <th><a>Для Ctrl+C/+V:</a></th>
  <td><a>http://<?=$myrow['ip']?>:<?=$myrow['port_r']?></a></td>
  <th><a>Пароль регистратора:</a></th>
  <td><a><?=$myrow['pass_reg']?></a></td>
</tr>
<tr>
  <th><a>Номер Билайн:</a></th>
  <td><a><?=$myrow['numbbe']?></a></td>
  <th><a>Номер Мегафон:</a></th>
  <td><a><?=$myrow['numbmeg']?></a></td>
  <th><a>Скорость Интернета:</a></th>
  <td><a><?=$myrow['speed']?> мб/с</a></td>
  <th><a>Внутрения сеть:</a></th>
  <td><a><?=$myrow['lan']?></a></td>
</tr>
<tr>
  <th><a>Особености подключения:</a></th>
  <td><a><?=$myrow['conset']?></a></td>
  <th><a>Сетевое оборудование:</a></th>
  <td><a><?=$myrow['nettools']?></a></td>
  <th><a>Модем GSM:</a></th>
  <td><a><?=$myrow['modemgsm']?></a></td>
  <th><a>Комментарий:</a></th>
  <td><a><?=$myrow['commentop']?></a></td>
</tr>
</table>
<?php
echo "<a href='javascript:confirmDelete($myrow[id]);'style='position:relative;left:1%;' class='button' >Удалить</a>";
?>
     <script type="text/javascript">
     	function iopen(p)
{
document.write("<iframe src='"+p+"'>");
}

 </script>
<table class='simple-little-table' border='0px'>
	<tr>
	<th width='440' >
		<a href="#" class="click" data-frameid="1" data-framesrc="ping.php?id=<?=$myrow['id']?>">Ping</a><br>
	</th>
	<th width='440'>
		<a href="#" class="click" data-frameid="2" data-framesrc="ping-t.php?id=<?=$myrow['id']?>">Ping -t</a><br>
	</th>
    <th width='440'>
    <a href="#" class="click" data-frameid="3" data-framesrc="port.php?id=<?=$myrow['id']?>">Проверка портов</a><br>
  </th>
	</tr>
	<tr>
	<td height="320">
	<div class="frameid-1" style="display:none"></div>
	</td>
	<td height="320">
	<div class="frameid-2" style="display:none"></div>
	</td>
    <td height="320">
  <div class="frameid-3" style="display:none"></div>

  </td>
	</tr>
</table >



  <script>
$(document).ready(function(){
  $('.click').on('click', function(){
    var frameId = $(this).data('frameid'),
        frameSrc = $(this).data('framesrc');
       $('.frameid-'+frameId).slideToggle(0);
    if(!document.getElementById(frameId)){
      $('<iframe />', {
       id : frameId,
       src : frameSrc
      }).appendTo('.frameid-'+frameId);
    }
  });
});
  </script>

</script>

</div>
</div>

<?php
require "footer.php";
?>
</body>
</html>
<?php
}
 ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/css/style.css">
</head>
<body style="background-image:none">
<button onclick='window.location.reload(true)' class="button" style="position:relative;left:39%;">Refrash</button>
<div>
</br>
<?php 
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
ob_implicit_flush(true);
ob_end_flush();
$that = @fsockopen($ip, $port_i, $errno, $errstr, 3);
if($that) 
     {
     echo "<a style='color:#666666;font-size: 18pt;font-weight: bold;'  >Порт $port_i  &nbsp;&nbsp; :&nbsp;&nbsp;   </a><a style='color:green;font-size: 18pt;font-family: Verdana, Arial, Helvetica, sans-serif;font-weight: bold;'> открыт </a>";
     } 
else 
     {
     echo "<a style='color:#666666;font-size: 18pt;font-weight: bold;'  >Порт $port_i  &nbsp;&nbsp; :&nbsp;&nbsp;   </a><a style='color:red;font-size: 18pt;font-family: Verdana, Arial, Helvetica, sans-serif;font-weight: bold;'> закрыт </a>";
     }
     echo "<br/>";
$that = @fsockopen($ip, $port_r, $errno, $errstr, 3);
if($that) 
     {
     echo "<a style='color:#666666;font-size: 18pt;font-weight: bold;'  >Порт $port_r  &nbsp;&nbsp; :&nbsp;&nbsp;  </a><a style='color:green;font-size: 18pt;font-family: Verdana, Arial, Helvetica, sans-serif;font-weight: bold;'> открыт </a>";
     } 
else 
     {
     echo "<a style='color:#666666;font-size: 18pt;font-weight: bold;'  >Порт $port_r &nbsp;&nbsp; :&nbsp;&nbsp;   </a><a style='color:red;font-size: 18pt;font-family: Verdana, Arial, Helvetica, sans-serif;font-weight: bold;'> закрыт </a>";
     }

   echo "<br/>";
$that = @fsockopen($ip, $port_v, $errno, $errstr, 3);
if($that) 
     {
     echo "<a style='color:#666666;font-size: 18pt;font-weight: bold;'  >Порт $port_v &nbsp;&nbsp; :&nbsp;&nbsp;   </a><a style='color:green;font-size: 18pt;font-family: Verdana, Arial, Helvetica, sans-serif;font-weight: bold;'> открыт </a>";
     } 
else 
     {
     echo "<a style='color:#666666;font-size: 18pt;font-weight: bold;'  >Порт $port_v  &nbsp;&nbsp; :&nbsp;&nbsp;   </a><a style='color:red;font-size: 18pt;font-family: Verdana, Arial, Helvetica, sans-serif;font-weight: bold;'> закрыт </a>";
     }
?>
</div>
</body>
</html>
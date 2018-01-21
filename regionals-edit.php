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
<title>Admin Console JMM HelpDesk</title>
<meta charset="utf-8">
<link rel="stylesheet" href="/css/style.css">
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="selectbox.js"></script>

</head>
<body>
<div>
  <?php

$table = "regionals";
if($_SERVER['REQUEST_METHOD']=='POST') { //form handler part:
  $id = mysql_real_escape_string($_POST['id']);
  $name = mysql_real_escape_string($_POST['name']);
  $mail = mysql_real_escape_string($_POST['mail']);
    $phone = mysql_real_escape_string($_POST['phone']);
//  echo 'before if';
  if ($id = intval($_POST['id'])) {
    $querypos="UPDATE regionals SET name='$name',mail='$mail',phone='$phone' WHERE id=$id";
  }
  mysql_query($querypos) or trigger_error(mysql_error()." in ".$querypos);
  header('Refresh: 1; URL='.$_SERVER['HTTP_REFERER']);
  exit;
}
if (!isset($_GET['id'])) {
  $LIST=array();
  $query="SELECT * FROM $table ";
  $res=mysql_query($query);
  while($row=mysql_fetch_assoc($res)) $LIST[]=$row;
} else {
  if ($id=intval($_GET['id'])) {
    $query="SELECT * FROM regionals WHERE id=$id";
    $res=mysql_query($query);
    $row=mysql_fetch_assoc($res);
    foreach ($row as $k => $v) $row[$k]=htmlspecialchars($v);
  } else {
  $row['name']='';
  $row['id']=0;
}
}

?>

<h1 align="center" style="color:#358A1E;text-shadow: yellow 0 0 10px;"><?=$row['name']?></h1>
<?php
echo "<a href='regionals-list.php'style='position:relative;left:35%;top:36px;' class='button' >Назад</a></br></br>";
?>
<form method="POST">
<table style='margin-left:35%' class='simple-little-table'>
<tr>
<th>
Ф.И.О.
</th>
<td>
<input type="text" name="name" value="<?=$row['name']?>"><br>
</td>
</tr>
<tr>
<th>
Телефон
</th>
<td>
<input type="text" name="phone" value="<?=$row['phone']?>"><br>
</td>
</tr>
<tr>
<th>
E-Mail
</th>
<td>
<input type="text" name="mail" value="<?=$row['mail']?>"><br>
</td>
</tr>
<tr>
<th>
</th>
<td>
</br>
<input type="hidden" id="submitbtn" name="id" value="<?=$row['id']?>">
<input type="submit" value="Отправить" class="button"><br>
</td>
</tr  >
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

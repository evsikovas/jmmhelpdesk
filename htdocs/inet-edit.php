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
  <title>Admin Console JMM HelpDesk</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/css/style.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script src="selectbox.js"></script>
</head>
<body>
  <div>
<?php
  $table = "inet";
  if($_SERVER['REQUEST_METHOD']=='POST') { //form handler part:
    $id = mysql_real_escape_string($_POST['id']);
    $name_id = mysql_real_escape_string($_POST['name_id']);
    $date = mysql_real_escape_string($_POST['date']);
    $tiket = mysql_real_escape_string($_POST['tiket']);
    $comment = mysql_real_escape_string($_POST['comment']);
    if(!preg_match("|^[\d]+$|",$tiket)) {
      echo '<h2 align="center" style="color:red;"> В Поле заявки должны быть только цыфры. </h2>';
    } else {
      if ($id = intval($_POST['id'])) {
        $querypos="UPDATE inet SET name_id='$name_id',date='$date',tiket='$tiket',comment='$comment' WHERE id=$id";
      }
      mysql_query($querypos) or trigger_error(mysql_error()." in ".$querypos);
      header("Location: inet.php");
      exit;
    }
  }
  if (!isset($_GET['id'])) {
    $LIST=array();
    $query="SELECT * FROM $table ";
    $res=mysql_query($query);
    while($row=mysql_fetch_assoc($res)) $LIST[]=$row;
  } else {
  if ($id=intval($_GET['id'])) {
    $query="SELECT * FROM inet WHERE id=$id";
    $res=mysql_query($query);
    $row=mysql_fetch_assoc($res);
    foreach ($row as $k => $v) $row[$k]=htmlspecialchars($v);
  } else {
    $row['name']='';
    $row['id']=0;
  }
  }
?>
  <h1 align="center" style="color:#358A1E;text-shadow: yellow 0 0 10px;"><?=$row['name_id']?></h1>
<?php
  echo "<a href='inet.php'style='position:relative;left:35%;top:36px;' class='button' >Назад</a></br></br>";
?>
  <form method="POST">
    <table style='margin-left:35%' class='simple-little-table'>
      <tr>
        <th>Офис Продаж:</th>
        <td><input type="hidden" name="name_id" value="<?=$row['name_id']?>"><?=$row['name_id']?><br></td>
      </tr>
      <tr>
        <th>Дата:</th>
        <td><input type="hidden" name="date" value="<?=$row['date']?>"><?=$row['date']?><br></td>
      </tr>
      <tr>
        <th>Заявка:</th>
        <td><input type="text" name="tiket" value="<?=$row['tiket']?>"><br></td>
      </tr>
      <tr>
        <th>Коментарий:</th>
        <td><input type="text" name="comment" value="<?=$row['comment']?>"><br></td>
      </tr>
      <tr>
        <th></th>
        <td>
          <input type="hidden" id="submitbtn" name="id" value="<?=$row['id']?>">
          <input type="submit" value="Отправить" class="button"><br>
        </td>
      </tr>
    </table>
  </form>
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

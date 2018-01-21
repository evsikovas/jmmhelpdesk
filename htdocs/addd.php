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
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script src="selectbox.js"></script>
</head>
<body>
<div>
<?php
  if($_SERVER['REQUEST_METHOD']=='POST') {
    $name_id = mysql_real_escape_string($_POST['name_id']);
    $date = mysql_real_escape_string($_POST['date']);
    $tiket = mysql_real_escape_string($_POST['tiket']);
    $comment = mysql_real_escape_string($_POST['comment']);
    if (empty($name_id) || empty($tiket)) {
      echo '<h2 align="center" style="color:red;">Заполните все поля</h2>';
    } else {
      if(!preg_match("|^[\d]+$|",$tiket)) {
        echo '<h2 align="center" style="color:red;"> В Поле "заявка" должны быть только цыфры. </h2>';
      } else {
        $query = "INSERT INTO `inet` VALUES (NULL,'$name_id','$date','$tiket','$comment')";
        if(mysql_query($query))
        {
          header('Location: /inet.php');
        } else {
        }
      }
    }
  }
?>
  <h1 align="center" style="color:#358A1E;text-shadow: yellow 0 0 10px;">Проблемы с интернетом</h1>
<?php
  echo "<a href='inet.php'style='position:relative;left:35%;top:36px;' class='button' >Назад</a></br></br>";
?>
  <form method="POST">
    <table style='margin-left:35%' class='simple-little-table'>
      <tr>
        <th>Офис Продаж:</th>
        <td><input type="text" name="name_id" value=""><br></td>
      </tr>
      <tr>
        <th>Дата:</th>
        <td><input type="date" name="date" value="<?php echo date('Y-m-d');?>"><br></td>
      </tr>
      <tr>
        <th>Заявка:</th>
        <td><input type="text" name="tiket" value=""><br></td>
      </tr>
      <tr>
        <th>Коментарий:</th>
        <td><textarea type="text" name="comment" value=""></textarea></td>
      </tr>
      <tr>
        <th></th>
        <td>
          <input type="hidden" id="submitbtn" name="id" value="">
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

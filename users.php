<?php
  include('database.php');
  require "auth.php";
  require "header.php";
  if($_SESSION['session']== 1) {
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
  } elseif($_SESSION['session']== 3) {
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
    <div class="content">
    <?php
      $result=mysql_query('SELECT * FROM `users`');
      if(isset($_GET['del']) !=0 ) {
        $sqldel = "DELETE FROM users WHERE id=".$_GET['del'];
        $resdel=mysql_query($sqldel);
          if (!$resdel) {
            $message  = 'Invalid query: ' . mysql_error() . "\n";
            $message .= 'Whole query: ' . $sqldel;
            die($message);
          } else {
          }
      }
    ?>
    <h1 align="center" style="color:#358A1E;text-shadow: yellow 0 0 10px;">👥 Пользователи</h1>
    <?php
      echo "<a href='users-add.php'style='position:relative;left:9%;top:36px;' class='button' >Добавить</a></br></br>";
      echo "<table style='margin-left:140px' width='80%' class='simple-little-table'>";
      echo "<tr><th>ID</th><th>Пользователь</th><th>Права</th><th style='font-size:13pt'>⚒</th><th style='font-size:13pt'>✘</th></tr>";
      while ($myrow=mysql_fetch_array($result)){
        $id=$myrow['id'];
        $login=$myrow['login'];
        $pass=$myrow['pass'];
        $session=$myrow['session'];
        if($session==1) {
          $sess="Видео";
        } elseif($session==2) {
          $sess="Просмотр";
        } elseif($session==3) {
          $sess="Редактирование";
        } elseif($session==4) {
          $sess="Полный доступ";
        }
        echo "<tr><td width='4%'><a>$id</a></td><td><a>$login</a></td><td><a>$sess</a></td><td style='font-size:13pt' width='4%'><a href='users-edit.php?id=$myrow[id]'>⚒</a></td><td style='font-size:13pt' width='4%'><a href='javascript:confirmDelete($myrow[id]);'>✘</a></td></tr>";
      }
      echo "</table>";
    ?>
  <script type="text/javascript">
    function confirmDelete(id) {
      if (confirm("Вы подтверждаете удаление?")) {
        document.location.href = 'users.php?del=' +id;
      } else {
        document.location = 'users.php';
      }
    }
  </script>
</div>
<?php
  require "footer.php";
?>
</body>
</html>
<?php
  }
?>

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
      <th width="4%">#</th>
      <th>Офис Продаж</th>
      <th>Ссылка</th>
      <th>Логин</th>
      <th>Пароль</th>
      <th>Программа для просмотра</th>
    </tr>
<?php
$i=0;
  while ($row=mysql_fetch_array($result)){
    $id=$row['id'];
    $cid=$row['cid'];
    $name=$row['name'];
    $ip=$row['ip'];
    $port_r=$row['port_r'];

    $pass_reg=$row['pass_reg'];
    $po_reg=$row['po_reg'];
    $i++;
    $sp2=mysql_fetch_array($q3);
    echo "<tr><td>$i</td></td><td>$cid - $name</td><td>http://$ip:$port_r</td><td>admin</td><td>$pass_reg<td>$po_reg</td></tr>";
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

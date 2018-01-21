<?php
if($_SESSION['session']== 1) {
?>
<div>
<table style="position: relative; top:-27px;" class='simple-little-table'  border='0' width='96%'>
  <tr>
    <th><a href='/index.php'>🔰 Главная Страница</a></th>
    <th><a href='/index.php?do=logout' class='utton'>🚪 Выход (<?php echo "$_SESSION[login]"; ?>)</a></th>
   </tr>
</table>
</div>
<?php
} elseif($_SESSION['session']== 4) {
  ?>
  <div>
  <table style="position: relative; top:-27px;" class='simple-little-table'  border='0' width='96%'>
    <tr>
      <th><a href='/index.php'>🔰 Главная Страница</a></th>
      <th><a href='/officesales-add.php'>🏠 Добавить Офис</a></th>
      <th><a href='/provider-listco.php'>📞 Провайдеры</a></th>
      <th><a href='/users.php'>👥 Пользователи</a></th>
       <th><a href='/index.php?do=logout'>🚪 Выход (<?php echo  "$_SESSION[login]";?>)</a></th>
     </tr>
     <tr>
       <th><a href='/region-list.php'>🌄 Регионы</a></th>
       <th><a href='/videolist.php'>💻 Видео в Офисах</a></th>
       <th><a href='/inet.php'>🌏 Проблемы с интернетом</a></th>
       <th><a href='/tvideo.php'>🎥 Проблемы с Видео</a></th>
       <th><a href='/score.php'>💰 Счета</a></th>

     </tr>
  </table>
</div>
<?php } elseif($_SESSION['session']== 3) { ?>
<div>
<table style="position: relative; top:-27px;" class='simple-little-table'  border='0' width='96%'>
  <tr>
    <th><a href='/index.php'>🔰 Главная Страница</a></th>
    <th><a href='/region-list.php'>🌄 Регионы</a></th>
        <th><a href='/videolist.php'>💻 Видео в Офисах</a></th>
  </tr>
  <tr>

    <th><a href='/inet.php'>🌏 Проблемы с интернетом</a></th>
    <th><a href='/tvideo.php'>🎥 Проблемы с Видео</a></th>
    <th><a href='/index.php?do=logout' class='utton'>🚪 Выход (<?php echo "$_SESSION[login]";?>)</a></th>
   </tr>
</table>
</div>
  <?php
} else {
?>
<div>
<table style="position: relative; top:-27px;" class='simple-little-table'  border='0' width='96%'>
  <tr>
    <th><a href='/index.php'>🔰 Главная Страница</a></th>
    <th><a href='/region-list.php'>🌄 Регионы</a></th>
        <th><a href='/videolist.php'>💻 Видео в Офисах</a></th>
  </tr>
  <tr>

    <th><a href='/inet.php'>🌏 Проблемы с интернетом</a></th>
    <th><a href='/tvideo.php'>🎥 Проблемы с Видео</a></th>
    <th><a href='/index.php?do=logout' class='utton'>🚪 Выход (<?php echo "$_SESSION[login]";?>)</a></th>
   </tr>
</table>
</div>
<?php
}
?>

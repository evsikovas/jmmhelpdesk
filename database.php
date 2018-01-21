<?php
  $sdd_db_host='127.0.0.1';
  $sdd_db_name='jetop';
  $sdd_db_user='jmmconnect';
  $sdd_db_pass='JmmCon13';
  @mysql_connect($sdd_db_host,$sdd_db_user,$sdd_db_pass);
  @mysql_select_db($sdd_db_name);
?>

<?php
	session_start();
	if(isset($_GET['do']) == 'logout'){
		unset($_SESSION['session']);
		unset($_COOKIE['CookieMy']);
		session_destroy();
	}
	if(!$_SESSION['session']) {
		header("Location: enter.php");
		exit;
	}
?>

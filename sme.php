<?php
include('database.php');
mysql_real_escape_string($_GET["id"]);
$id = isset($_GET['id']) ? $_GET['id'] : '';
$query = "SELECT * FROM oplist WHERE id = $id";
$result = mysql_query($query);
$myrow = mysql_fetch_assoc($result);
$name = $myrow['name'];
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



$config['smtp_username'] = 'jmmhelpdesk@jetm0ney.ru';  //Смените на адрес своего почтового ящика.
$config['smtp_port'] = '25000'; // Порт работы.
$config['smtp_host'] =  'mail.jetm0ney.ru';  //сервер для отправки почты
$config['smtp_password'] = 'HSjka3udgG8';  //Измените пароль
$config['smtp_debug'] = true;  //Если Вы хотите видеть сообщения ошибок, укажите true вместо false
$config['smtp_charset'] = 'utf-8';	//кодировка сообщений. (windows-1251 или utf-8, итд)
$config['smtp_from'] = $mailop; //Ваше имя - или имя Вашего сайта. Будет показывать при прочтении в поле "От кого"

function smtpmail($to='', $mail_to, $subject, $message, $headers='') {
	global $config;
	$SEND =	"Date: ".date("D, d M Y H:i:s") . " UT\r\n";
	$SEND .= 'Subject: =?'.$config['smtp_charset'].'?B?'.base64_encode($subject)."=?=\r\n";
	if ($headers) $SEND .= $headers."\r\n\r\n";
	else
	{
			$SEND .= "Reply-To: ".$config['smtp_username']."\r\n";
			$SEND .= "To: \"=?".$config['smtp_charset']."?B?".base64_encode($to)."=?=\" <$mail_to>\r\n";
			$SEND .= "MIME-Version: 1.0\r\n";
			$SEND .= "Content-Type: text/html; charset=\"".$config['smtp_charset']."\"\r\n";
			$SEND .= "Content-Transfer-Encoding: 8bit\r\n";
			$SEND .= "From: \"=?".$config['smtp_charset']."?B?".base64_encode($config['smtp_from'])."=?=\" <".$config['smtp_from'].">\r\n";
			$SEND .= "X-Priority: 3\r\n\r\n";
	}
	$SEND .=  $message."\r\n";
	 if( !$socket = fsockopen($config['smtp_host'], $config['smtp_port'], $errno, $errstr, 30) ) {
		if ($config['smtp_debug']) echo $errno."<br>".$errstr;
		return false;
	 }

	if (!server_parse($socket, "220", __LINE__)) return false;

	fputs($socket, "HELO " . $config['smtp_host'] . "\r\n");
	if (!server_parse($socket, "250", __LINE__)) {
		if ($config['smtp_debug']) echo '<p>Не могу отправить HELO!</p>';
		fclose($socket);
		return false;
	}
	fputs($socket, "AUTH LOGIN\r\n");
	if (!server_parse($socket, "334", __LINE__)) {
		if ($config['smtp_debug']) echo '<p>Не могу найти ответ на запрос авторизаци.</p>';
		fclose($socket);
		return false;
	}
	fputs($socket, base64_encode($config['smtp_username']) . "\r\n");
	if (!server_parse($socket, "334", __LINE__)) {
		if ($config['smtp_debug']) echo '<p>Логин авторизации не был принят сервером!</p>';
		fclose($socket);
		return false;
	}
	fputs($socket, base64_encode($config['smtp_password']) . "\r\n");
	if (!server_parse($socket, "235", __LINE__)) {
		if ($config['smtp_debug']) echo '<p>Пароль не был принят сервером как верный! Ошибка авторизации!</p>';
		fclose($socket);
		return false;
	}
	fputs($socket, "MAIL FROM: <".$config['smtp_username'].">\r\n");
	if (!server_parse($socket, "250", __LINE__)) {
		if ($config['smtp_debug']) echo '<p>Не могу отправить комманду MAIL FROM: </p>';
		fclose($socket);
		return false;
	}
	fputs($socket, "RCPT TO: <" . $mail_to . ">\r\n");

	if (!server_parse($socket, "250", __LINE__)) {
		if ($config['smtp_debug']) echo '<p>Не могу отправить комманду RCPT TO: </p>';
		fclose($socket);
		return false;
	}
	fputs($socket, "DATA\r\n");

	if (!server_parse($socket, "354", __LINE__)) {
		if ($config['smtp_debug']) echo '<p>Не могу отправить комманду DATA</p>';
		fclose($socket);
		return false;
	}
	fputs($socket, $SEND."\r\n.\r\n");

	if (!server_parse($socket, "250", __LINE__)) {
		if ($config['smtp_debug']) echo '<p>Не смог отправить тело письма. Письмо не было отправленно!</p>';
		fclose($socket);
		return false;
	}
	fputs($socket, "QUIT\r\n");
	fclose($socket);
	return TRUE;
}

function server_parse($socket, $response, $line = __LINE__) {
	global $config;
	while (@substr($server_response, 3, 1) != ' ') {
		if (!($server_response = fgets($socket, 256))) {
			if ($config['smtp_debug']) echo "<p>Проблемы с отправкой почты!</p>$response<br>$line<br>";
 			return false;
 		}
	}
	if (!(substr($server_response, 0, 3) == $response)) {
		if ($config['smtp_debug']) echo "<p>Проблемы с отправкой почты!</p>$response<br>$line<br>";
		return false;
	}
	return true;
}


smtpmail('JMM', 'helpdesk@jetmoney.ru', 'Inet ОП- '.$name. '','Отсутствует интернет в офисе ' .$name. ', Составлена заявка провайдеру. </br> <a href="http://jmmhelpdesk.jetmoney.local/officesales.php?id='.$id.'"> Ссылка на Офис </a>');

smtpmail('JMM', 'helpdesk@jetmoney.ru', 'Inet ОП '.$name. '','Отсутствует интернет в офисе ' .$name. ', Офис перешел на резервный канал. </br> <a href="http://jmmhelpdesk.jetmoney.local/officesales.php?id='.$id.'"> Ссылка на Офис </a>');
?>

Сообщение о переходе на модем Интернета отправлено в ОТРС - Очередь Интернет
Сообщение о Эскалации Интернета отправлено в ОТРС - Очередь Эскалация Интернета

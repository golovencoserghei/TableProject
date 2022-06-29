<?
//Экстреное закрыти сайта

$prot_get=mysql_query("SELECT `param` FROM `st_config` WHERE  `key` = 'close'");
if($prot_get['ban']== 2 ){
	
	
}



//





//логирование POST и GET запросов
$mn=date("j.n.Y");
$file_get = "log/get_".$mn.".log";
$file_post = "log/post_".$mn.".log";
$tm=date("H:i");

if (!empty($_GET)) {
	$lid=$_COOKIE['lid'];
	$id=$_COOKIE['id'];
    $fw = fopen($file_get, "a");
    fwrite($fw, "$tm => GET ($id) ( $ip )". var_export($_GET, true) ."
	");
    fclose($fw);
}

if (!empty($_POST)) {
	$lid=$_COOKIE['lid'];
	$id=$_COOKIE['id'];
    $fw = fopen($file_post, "a");
    fwrite($fw, "$tm => POST  ($id) ( $ip )" . var_export($_POST, true) ."
	");
    fclose($fw);
}

$prot_get=mysql_fetch_array(mysql_query("SELECT * FROM `us_session` WHERE  `sessid` = '".$_COOKIE['PHPSESSID']."'"));
if($prot_get['ban']== 2 ){
	
	
	$insert=mysql_query("UPDATE `us_session` SET `ban`='0' WHERE `sessid`='".$_COOKIE['PHPSESSID']."'");
	$_SESSION['uid'] = "";
	$_SESSION['uip'] = "";
	define("auth",false);
	header("location: /login.html");
}

//защита SQL Injection
if ($_REQUEST) {
    foreach ($_REQUEST as $v)
    if (preg_match('/\'/i', $v)) {
		 $err= 'Ошибка. Сработала защита SQL Injection';
		msg($err,"err");
       
        exit();
    }
}


?>
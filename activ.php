<?
@error_reporting(E_ALL, ~E_NOTICE);
ob_start();
session_start();
ini_set("allow_url_include","Off");
ini_set("allow_url_fopen","Off");
ini_set("register_globals","Off");
ini_set("safe_mode","On");

// Подгрузка ядра
require_once("config.php");
require_once(SOURCE_DIR."/config_db.php");
require_once(SOURCE_DIR."/init_db.php");
require_once(SOURCE_DIR."/init_source.php");

$insert=mysql_query("UPDATE `us_session` SET `mtime`='".time()."' WHERE `sessid`='".$_COOKIE['PHPSESSID']."'");

$prot_get=mysql_fetch_array(mysql_query("SELECT * FROM `us_session` WHERE  `sessid` = '".$_COOKIE['PHPSESSID']."'"));
if($prot_get['ban']==2){
	
	$insert=mysql_query("UPDATE `us_session` SET `ban`='0' WHERE `sessid`='".$_COOKIE['PHPSESSID']."'");
	
	$_SESSION['uid'] = "";
	$_SESSION['uip'] = "";
	define("auth",false);
	
	
	
}
	




?>

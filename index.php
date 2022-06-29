<?php
@error_reporting(E_ALL, ~E_NOTICE);
ob_start();


ini_set('session.cookie_domain', 'mydomen.com');
ini_set("allow_url_include","Off");
ini_set("allow_url_fopen","Off");
ini_set("register_globals","Off");
ini_set("safe_mode","On");

session_start(); 

// Подгрузка ядра

require_once("config.php");
require_once(SOURCE_DIR."/config_db.php");
require_once(SOURCE_DIR."/init_db.php");
require_once(SOURCE_DIR."/init_source.php");
//require_once(CODE."/apus.php");
//include 'guard.php';
require_once("booter.php");





// Парсинг страниц
if(!preg_match("/^([a-z]{0,10})+$/",$get_array['page'])) exit;
if(!preg_match("/^([a-z]{0,10})+$/",$get_array['sub'])) exit;
if(!preg_match("/^([a-z]{0,10})+$/",$get_array['undersub'])) exit;
if(!preg_match("/^([a-z]{0,3})+$/",$get_array['lg'])) exit;
if(!preg_match("/^([a-z]{0,3})+$/",$_COOKIE['lg'])) exit;

require_once(SOURCE_DIR."/msg.php"); // сообщения

if ($_COOKIE['lg']=='0'){
		setcookie("lg", 'ru');
	
	}


if($get_array['lg']!="")
{
	
		if(!file_exists("lang/".$get_array['lg'].".php")) require("lang/ru.php");
		else require("lang/".$get_array['lg'].".php");
		setcookie("lg", $get_array['lg']);
	
}
else{
	
	if ($_COOKIE['lg']==""){
		setcookie("lg", 'ru');
	
	}	
	
	
	if ($_COOKIE['lg']!="") {
		
		if(!file_exists("lang/".$_COOKIE['lg'].".php")) require("lang/ru.php");
		else require("lang/".$_COOKIE['lg'].".php");
		
	}
		
	}
	
if(auth===true)
{
	
	require_once("auth.php");
	$prm=mysql_fetch_array(mysql_query("SELECT `permis` FROM `users` WHERE `id`='".$user_arr[0]."'"));
	$permis=explode("|",$prm[0]);
	
  if(!file_exists("lang/".$user_arr['lang'].".php")) require("lang/ru.php");
		else require("lang/".$user_arr['lang'].".php");
		
		if($user_arr['lang']==0){
		setcookie("lg", 'ru');
		}
		else{
		setcookie("lg", $user_arr['lang']);	
		}
		
		
		
}	
	
	


if($get_array['page']=="")
{
	if(!file_exists("modules/index/index.php")) header("location: /index.php");
	else require("modules/index/index.php");
}
else
{
	if($get_array['sub']=="")
	{
		if(!file_exists("modules/".$get_array['page']."/index.php")) header("location: /index.php");
		else require("modules/".$get_array['page']."/index.php");
	}
	else
	{
		if($get_array['undersub']=="")
		{
			if(!file_exists("modules/".$get_array['page']."/".$get_array['sub'].".php")) header("location: /index.php");
			else require("modules/".$get_array['page']."/".$get_array['sub'].".php");
		}
		else
		{
			if(!file_exists("modules/".$get_array['page']."/".$get_array['sub']."/".$get_array['usub'].".php")) header("location: /index.php");
			else require("modules/".$get_array['page']."/".$get_array['sub']."/".$get_array['usub'].".php");
		}
	}
}






if(auth===TRUE)
{
	if($user_arr['prof_lock']==='1'){
	
		
		if($_SERVER['REQUEST_URI']!='/ban.html'){
		
		
		header("location: /ban.html");
		}
	}
  require_once("footer.php");
}



?>

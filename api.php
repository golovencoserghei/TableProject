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



header('Content-Type: text/html; charset=utf-8');


if (count($get_array['user']) != 0){ 
	if($get_array['user'] == 'all'){

   $get_for_user=mysql_query("SELECT * FROM `users` WHERE `rid`=21");


   while($row=mysql_fetch_array($get_for_user))
        {
		
	
		echo $row['id'].'|'.$row['name'].'|'.$row['gender'].':';
			
			
		}
	}
	if($get_array['user'] != ''){

		$get_for_user=mysql_query("SELECT * FROM `users` WHERE `id`='".$get_array['user']."'");
		$row=mysql_fetch_array($get_for_user);
	
		echo $row['id'].'|'.$row['name'].'|'.$row['gender'].'|'.$row['bday'].'|'.$row['botez'].'|'.$row['adres'].'|'.$row['tel1'].'|'.$row['tel2'].'|'.$row['pp_p'];

	}

}

if (count($get_array['appdata']) == '1'){ 
	if($get_array['update'] == 'all'){

			$get_for_user=mysql_fetch_array(mysql_query("SELECT * FROM `upd_app` WHERE `id`='1'")); 
		echo $get_for_user['build'].';'.$get_for_user['ver'].';'.$get_for_user['date'].';'.$get_for_user['ap_stat'].';'.$get_for_user['ap_info'];
	
	}


}
      











?>
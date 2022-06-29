<?php
/***************************************************************************\
| Authorization and Protection of User Sessions            version 1.0.0    |
| (c)2019                                                                   |
|                                                                           |
|---------------------------------------------------------------------------|
|     created: 2019.08.08                    modified: create               |
|---------------------------------------------------------------------------|
| Aвторизация и защита пользовательских сессий                              |
| Mодуль безопасности                                                       |
|                                                                           |
|                                                                           |
|                                                                           |
\***************************************************************************/
function  apus_activ(){
	
	$os=ngetOS($user_agent);
	$br=getBrowser();
	
	$pro_update=mysql_query("UPDATE `us_session` SET `atime`='".date("H:i")."','device'='".$os."','brauzer'='".$br."',`mtime`='".time()."' WHERE `sessid`='".$_COOKIE['PHPSESSID']."'");
	
	
	
}





class apus {

public function  get_dat(){
	
	
	$pref=mysql_fetch_array(mysql_query("SELECT `pref` FROM `tb_congr` WHERE `id`='".$user_arr[6]."'"));
	
	
}







}


?>
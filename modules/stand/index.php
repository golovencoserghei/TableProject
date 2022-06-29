<?php
if(!defined("AP")) exit("Доступ к файлу напрямую запрещен!");

if(auth===FALSE)
{
	header("location: /login.html");
}

if($user_arr['stand']==0)
{
	//header("location: /report.html");
	
}



	//$weak=mysql_fetch_array(mysql_query("SELECT `fdate_this`,`ldate_this`,`fday_week_next`,`lday_week_next`,`next_table_activ` FROM `tb_congr` WHERE `uid`='".$user_arr[6]."'"));
	$weak=mysql_fetch_array(mysql_query("SELECT `f_tweak`,`l_tweak`,`f_nweak`,`l_nweak` FROM `cfg_tb_date` WHERE `id`=1"));
	$last_update=mysql_query("UPDATE `users` SET `lastdate`='".date("d.m.Y H:i")."' WHERE `id`='".$user_arr[0]."'");

require_once("template/head.php");
	
	
$tb_get_cfg=mysql_fetch_array(mysql_query("SELECT * FROM `tb_congr` WHERE `id`='".$user_arr[6]."'"));
$cfg=explode("|",$tb_get_cfg['param']);	



	
	
	
if($user_arr['mail']=='0' or $user_arr['mail']==''){
		$mes_no_email='Пожалуйста укажите ваш Email адрес (Правый верхний угол значек "Шестиренки" перейдя на страницу "Настройки Профиля" заполните поле ниже "Ваш почтовый адрес")';
		msg($mes_no_email,"err");
	}

	if($user_arr[6]!=0){
		
		if($cfg[3]==1 AND $cfg[4]==1){  //мульти таблица с вертикальными заполнениями 
	
			if($get_array['p']=='n'){
				require_once("modules/stand/mvrn.php");
			}
			else{
				require_once("modules/stand/mvr.php");
				}
			
			
		}
		elseif($cfg[3]==1 AND $cfg[4]==0){ //мульти таблица с горизонтальными заполнениями 
			
			require_once("modules/stand/mhr.php");
			
		}
		elseif($cfg[3]==0 AND $cfg[4]==1){ //стадартная таблица с вертикальными заполнениями 
			
			if($get_array['p']=='n'){
				require_once("modules/stand/vrn.php");
			}
			else{
			require_once("modules/stand/vr.php");
			}
			
		}
		elseif($cfg[3]==0 AND $cfg[4]==0){ //стадартная таблица с горизонтальными заполнениями 
			
			//require_once("modules/stand/hr.php");
			
		}
		
		
	}
	
	
	
	
	
	
?>
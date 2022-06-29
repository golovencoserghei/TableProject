<?php
@error_reporting(E_ALL, ~E_NOTICE); 
ob_start(); 
ini_set("allow_url_include","Off"); 
ini_set("allow_url_fopen","Off"); 
ini_set("register_globals","Off"); 
ini_set("safe_mode","On");

// Подгрузка ядра ///////////////////////////////////////////////
require_once("../config.php");
require_once("../".SOURCE_DIR."/config_db.php");
require_once("../".SOURCE_DIR."/init_db.php");
require_once("../".SOURCE_DIR."/init_source.php");




	
for ($i = 0; $i <= 6; $i++)
	{
		
	
			$ldate=mysql_fetch_array(mysql_query("SELECT * FROM `tb_date` ORDER BY id desc" ));
			$set_date = date("Y-m-d", strtotime($ldate[1] . ' +1 day'));
			$table_day = date('w', strtotime($set_date));
			$two=mysql_query("INSERT INTO `tb_date` VALUES (NULL,'".$set_date."','".$table_day."')"); 
			
			echo $i;
			echo "/";
			echo $set_date;
			echo "/";
			echo $table_day;
			echo "<br>";
			
		
	}
	
	
	
	?>
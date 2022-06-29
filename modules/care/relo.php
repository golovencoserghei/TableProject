<?php
if(!defined("AP")) exit("Доступ к файлу напрямую запрещен!");

if(auth===FALSE)
{
	header("location: /login.html");
}
    require_once("template/head.php");



$rel = dateprotect($get_array['id']);
 

if (count($get_array) != 0){
	
	if($rel!=''){
		$insert=mysql_query("UPDATE `db_care` SET `dl`='0' WHERE `id`='".$rel."' and `rid`='".$user_arr['rid']."'");
		header("location: /care.html");			
	}

}

?>



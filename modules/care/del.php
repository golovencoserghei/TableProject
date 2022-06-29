<?php
if(!defined("AP")) exit("Доступ к файлу напрямую запрещен!");

if(auth===FALSE)
{
	header("location: /login.html");
}
    require_once("template/head.php");

    $del = dateprotect($get_array['id']);
    $pdel = dateprotect($get_array['pid']);
   
	
	

if (count($get_array) != 0){
if($del!=''){
$insert=mysql_query("UPDATE `db_care` SET `dl`='1' WHERE `id`='".$del."' and `rid`='".$user_arr['rid']."'");

header("location: /care.html");
		
}


if($pdel!=''){
$insert=mysql_query("UPDATE `db_care` SET `dl`='2' WHERE `id`='".$pdel."' and `rid`='".$user_arr['rid']."'");

header("location: /care.html");
		
}









}

?>



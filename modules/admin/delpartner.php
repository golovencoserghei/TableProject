<?php
if(!defined("AP")) exit("Доступ к файлу напрямую запрещен!");

echo("<title>".$params_array[0]."</title>");

if(auth===FALSE)
{
	msg("Для доступа к данной странице необходима авторизация или <a href='/registration.html'>регистрация</a>!","warning");
}
$a=0;

if($a==1)
{
	echo $get_array['use'];
	echo $get_array['did'];
	echo $get_array['tid'];
}
    else{
		
				
				$pref=mysql_fetch_array(mysql_query("SELECT `pref` FROM `tb_congr` WHERE `uid`='".$user_arr[6]."'"));
				$select_table="tb_stend_".$pref[0]."";
				$num_arr=mysql_fetch_array(mysql_query("SELECT `user1`,`user2` FROM `".$select_table."` WHERE `date`='".$get_array['did']."' AND `time`='".$get_array['tid']."'"));
                      if(count($num_arr)!=0){
						  if($num_arr[0] == $get_array['use']){
							  
							  $query=mysql_query("UPDATE `".$select_table."` SET `user1`='0'  WHERE `date`='".$get_array['did']."' and `time`='".$get_array['tid']."'");
								$addlog=mysql_query("INSERT INTO `add_logo` VALUES (NULL,'".$user_arr[0]."','".$user_arr[6]."','".$get_array['did']."','".$get_array['tid']."','".date("d.m.Y H:i")."','0')");
								
						  }
						  elseif($num_arr[1] == $get_array['use']){
							  
							  $query=mysql_query("UPDATE `".$select_table."` SET `user2`='0'  WHERE `date`='".$get_array['did']."' and `time`='".$get_array['tid']."'");
								$addlog=mysql_query("INSERT INTO `add_logo` VALUES (NULL,'".$user_arr[0]."','".$user_arr[6]."','".$get_array['did']."','".$get_array['tid']."','".date("d.m.Y H:i")."','0')");
								
						  }
						  echo"нет записей!";
						  echo $num_arr[0];
						  echo $num_arr[1];
					  }						  
							
							
							
							
							if($query) 
								header("location: index.html"); 
							else msg("Ошибка при удалении записи!","warning");
			}

?>
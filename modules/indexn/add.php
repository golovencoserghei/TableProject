<?php
if(!defined("AP")) header("location: /");

if(auth===FALSE){
	header("location: /");
}
else{
	if(count($get_array)!=0){
		 $pref=mysql_fetch_array(mysql_query("SELECT `pref` FROM `tb_congr` WHERE `uid`='$user_arr[6]'"));
         $select_table="tb_stend_".$pref[0]."";
		
		if($get_array['did']!="" or $get_array['tid']!=""){
			
		  $count_arr=mysql_fetch_array(mysql_query("SELECT `user1`,`user2` FROM `".$select_table."` WHERE `date`='".$get_array['did']."' AND `time`='".$get_array['tid']."'"));
		    if($count_arr!=""){
                    			
                    if ($count_arr[0] == $user_arr[0]  or $count_arr[1] == $user_arr[0]){
								
								
					}
								
					elseif ($count_arr[0] == 0 or $count_arr[0] == 1 or $count_arr[0] == 2 or $count_arr[0] == 3){
								$addlog=mysql_query("INSERT INTO `add_logo` VALUES (NULL,'".$user_arr[0]."','".$get_array['use']."','".$user_arr[6]."','".$get_array['did']."','".$get_array['ti']."','".date("d.m.Y H:i")."','1')");
								
								$insert=mysql_query("UPDATE `".$select_table."` SET `user1`='".$user_arr[0]."' WHERE `date`='".$get_array['did']."' AND `time`='".$get_array['tid']."'");
					}
					
					
					elseif($count_arr[1] == 0 or $count_arr[1] == 1 or $count_arr[1] == 2 or $count_arr[1] == 3){
								$insert=mysql_query("UPDATE `".$select_table."` SET `user2`='".$user_arr[0]."' WHERE `date`='".$get_array['did']."' AND `time`='".$get_array['tid']."'");
					$addlog=mysql_query("INSERT INTO `add_logo` VALUES (NULL,'".$user_arr[0]."','".$get_array['use']."','".$user_arr[6]."','".$get_array['did']."','".$get_array['ti']."','".date("d.m.Y H:i")."','1')");
								
					}
					
		            elseif($count_arr[0] == '' or $count_arr[1] == '' ){
								if($count_arr[0] == ''){
										$insert=mysql_query("UPDATE `".$select_table."` SET `user1`='".$user_arr[0]."' WHERE `date`='".$get_array['did']."' AND `time`='".$get_array['tid']."'");   
								         $addlog=mysql_query("INSERT INTO `add_logo` VALUES (NULL,'".$user_arr[0]."','".$get_array['use']."','".$user_arr[6]."','".$get_array['did']."','".$get_array['ti']."','".date("d.m.Y H:i")."','1')");
								}
								
								elseif($count_arr[1] == ''){
										$addlog=mysql_query("INSERT INTO `add_logo` VALUES (NULL,'".$user_arr[0]."','".$get_array['use']."','".$user_arr[6]."','".$get_array['did']."','".$get_array['ti']."','".date("d.m.Y H:i")."','1')");
								
										$insert=mysql_query("UPDATE `".$select_table."` SET `user2`='".$user_arr[0]."' WHERE `date`='".$get_array['did']."' AND `time`='".$get_array['tid']."'");   
								}
					}
				
					
			}
			else{
						$addlog=mysql_query("INSERT INTO `add_logo` VALUES (NULL,'".$user_arr[0]."','".$get_array['use']."','".$user_arr[6]."','".$get_array['did']."','".$get_array['ti']."','".date("d.m.Y H:i")."','1')");
								
						$insert=mysql_query("INSERT INTO `".$select_table."` VALUES (NULL,'".$get_array['did']."','".$get_array['tid']."','".$user_arr[0]."','0','0','0','0','0','0','0','0')");
		       
				  
			
			}
			if ($get_array['pag']=='nw'){
								$fixdid = dateprotect($get_array['fid']);
								$ind='indexw.html#'.$fixdid;
								header("location: $ind");
					}
					else{
					$fixdid = dateprotect($get_array['fid']);
								$ind='index.html#'.$fixdid;
								header("location: $ind");
					}
								
		}
	}
}
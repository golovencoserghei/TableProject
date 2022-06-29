<?php
if(!defined("AP")) exit("Доступ к файлу напрямую запрещен!");

if(auth===FALSE)
{
	msg("Для доступа к данной странице необходима авторизация или <a href='/registration.html'>регистрация</a>!","warning");
}
require_once("template/head.php");
$a=0;

$time = dateprotect($get_array['ti']);
$timeid = dateprotect($get_array['tid']);
$dateid = dateprotect($get_array['did']);
$userid = dateprotect($get_array['use']);
$fixdid = dateprotect($get_array['fid']);
$getpag = dateprotect($get_array['pag']);


$post_time = dateprotect($post_array['ti']);
$post_timeid = dateprotect($post_array['tid']);
$post_dateid = dateprotect($post_array['did']);
$post_userid = dateprotect($post_array['use']);
$post_fixdid = dateprotect($post_array['fid']);
$post_pag	 = dateprotect($post_array['pag']);

if($a==1)
{
	echo $get_array['use'];
	echo $get_array['did'];
	echo $get_array['tid'];
}
 if (count($post_array) != 0){
	 	$num_arr=mysql_fetch_array(mysql_query("SELECT `pref` FROM `tb_congr` WHERE `id`='".$user_arr[6]."'"));

		if($num_arr[0] == ""){

				msg("Ошибка Данных","warning");
			}

		else{
			
			$tb_get_cfg=mysql_fetch_array(mysql_query("SELECT * FROM `tb_congr` WHERE `id`='".$user_arr[6]."'"));
			$cfg=explode("|",$tb_get_cfg['param']);	
			
			
			if($cfg[3]==0){



				$pref=mysql_fetch_array(mysql_query("SELECT `pref` FROM `tb_congr` WHERE `id`='".$user_arr[6]."'"));
					$select_table="tb_stend_".$pref[0]."";
					$num_arr=mysql_fetch_array(mysql_query("SELECT `user1`,`user2` FROM `".$select_table."` WHERE `date`='".$post_dateid."' AND `time`='".$post_timeid."'"));
				if(count($num_arr)!=0){
						  if($num_arr[0] == $post_userid){

						$query=mysql_query("UPDATE `".$select_table."` SET `user1`='0'  WHERE `date`='".$post_dateid."' and `time`='".$post_timeid."'");
						$addlog=mysql_query("INSERT INTO `add_logo` VALUES (NULL,'".$user_arr[0]."','".$post_userid."','".$user_arr[6]."','".$post_dateid."','".$post_time."','".date("d.m.Y H:i")."','0')");

					  }
						  elseif($num_arr[1] == $post_userid){

						$query=mysql_query("UPDATE `".$select_table."` SET `user2`='0'  WHERE `date`='".$post_dateid."' and `time`='".$post_timeid."'");
						$addlog=mysql_query("INSERT INTO `add_logo` VALUES (NULL,'".$user_arr[0]."','".$post_userid."','".$user_arr[6]."','".$post_dateid."','".$post_time."','".date("d.m.Y H:i")."','0')");

						  }
					  echo"нет записей!";
	 					  echo $num_arr[0];
 					  echo $num_arr[1];
				}
			}
			else{
				
			$pref=mysql_fetch_array(mysql_query("SELECT `pref` FROM `tb_congr` WHERE `id`='".$user_arr[6]."'"));
				$select_table="tb_stend_".$pref[0]."";
				$num_arr=mysql_fetch_array(mysql_query("SELECT `user1`,`user2`,`user3` FROM `".$select_table."` WHERE `date`='".$post_dateid."' AND `time`='".$post_timeid."'"));
         	if(count($num_arr)!=0){
					
					if($num_arr[0] == $post_userid){

						$query=mysql_query("UPDATE `".$select_table."` SET `user1`='0'  WHERE `date`='".$post_dateid."' and `time`='".$post_timeid."'");
						$addlog=mysql_query("INSERT INTO `add_logo` VALUES (NULL,'".$user_arr[0]."','".$post_userid."','".$user_arr[6]."','".$post_dateid."','".$post_time."','".date("d.m.Y H:i")."','0')");

					}
					
					elseif($num_arr[1] == $post_userid){

						$query=mysql_query("UPDATE `".$select_table."` SET `user2`='0'  WHERE `date`='".$post_dateid."' and `time`='".$post_timeid."'");
						$addlog=mysql_query("INSERT INTO `add_logo` VALUES (NULL,'".$user_arr[0]."','".$post_userid."','".$user_arr[6]."','".$post_dateid."','".$post_time."','".date("d.m.Y H:i")."','0')");

					}
					elseif($num_arr[2] == $post_userid){

						$query=mysql_query("UPDATE `".$select_table."` SET `user3`='0'  WHERE `date`='".$post_dateid."' and `time`='".$post_timeid."'");
						$addlog=mysql_query("INSERT INTO `add_logo` VALUES (NULL,'".$user_arr[0]."','".$post_userid."','".$user_arr[6]."','".$post_dateid."','".$post_time."','".date("d.m.Y H:i")."','0')");

					}
					  echo"нет записей!";
	 					  echo $num_arr[0];
 					  echo $num_arr[1];
				
			}


						if($query) {

							if ($get_array['p']=='n'){
								$fixdid = dateprotect($get_array['fid']);
								$ind='stand.html&p=n#'.$fixdid;
									header("location: $ind");
								}
								else{
									$fixdid = dateprotect($get_array['fid']);
									$ind='stand.html#'.$fixdid;
									header("location: $ind");
								}

							}
							else msg("Ошибка при удалении записи!","warning");
			}
	}
 }

$dell_name=mysql_fetch_array(mysql_query("SELECT `name` FROM `users` WHERE `id`='".$get_array['use']."'"));
?>
<div class='card'>
  <div class='card-body pa-0'>
    <div class='table-wrap'>
      <div class='table-responsive'>

						<div class='panel'>
								<div class='panel-heading'>
									<center><h4>Удалить запись</h4></center>
								</div>
								<div class='panel-content'>

									<form action=''  method='post' name='form1'>

										<div class='form-group'>

											<div class='form-group'>

												<div class='container'>
													<center>Удалить запись
															<?
															$date_dl=mysql_fetch_array(mysql_query("SELECT `date` FROM `tb_date` WHERE `id`='".$get_array['did']."'"));

 																echo $dell_name[0];
 																echo " в ".str_replace(['f'], [':'], $time)."/" .$date_dl[0]." ";



																	?>
													</center>

													<br>

													<input type='hidden' name='use' value='<?echo $get_array['use'];?>'>
													<input type='hidden' name='tid' value='<?echo $get_array['tid'];?>'>
													<input type='hidden' name='did' value='<?echo $get_array['did'];?>'>
													<input type='hidden' name='fid' value='<?echo $get_array['fid'];?>'>
													<input type='hidden' name='pag' value='<?echo $get_array['pag'];?>'>
													<input type='hidden' name='ti' value='<?echo $get_array['ti'];?>'>
													<center><button type='submit' class='btn btn-primary'>Удалить Запись</button> <a <? if ($get_array['pag']=='nw'){echo "href='indexw.html'";}else { echo "href='index.html'";}?>href='index.html' class='btn btn-primary'>Назад</a></center>
												</div>

											</div>
											</div>
										</form>
									</div>
								</div>


              </div>
              </div>
              </div>
              </div>

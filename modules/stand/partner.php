<?php
if(!defined("AP")) exit("Доступ к файлу напрямую запрещен!");

if(auth===FALSE)
{
	header("location: /login.html");
}
    require_once("template/head.php");

	$pref=mysql_fetch_array(mysql_query("SELECT `st_loc` FROM `tb_congr` WHERE `id`='".$user_arr[6]."'"));
	$name_congr=mysql_fetch_array(mysql_query("SELECT `ne_cong` FROM `tb_congr` WHERE `id`='".$user_arr[6]."'"));
	$pref=mysql_fetch_array(mysql_query("SELECT `pref` FROM `tb_congr` WHERE `id`='".$user_arr[6]."'"));
	$select_table="tb_stend_".$pref[0]."";


	$time   = dateprotect($get_array['ti']);
	$timeid = dateprotect($get_array['tid']);
    $dateid = dateprotect($get_array['did']);
    $userid = dateprotect($get_array['uid']);
    $fixdid = dateprotect($get_array['fid']);
    $getpag = dateprotect($get_array['p']);
    $gtoken = dateprotect($get_array['token']);


	$post_time	 = dateprotect($post_array['ti']);
	$post_timeid = dateprotect($post_array['tid']);
    $post_dateid = dateprotect($post_array['did']);
    $post_userid = dateprotect($post_array['uid']);
    $post_fixdid = dateprotect($post_array['fid']);
    $post_pag	 = dateprotect($post_array['pag']);
    $token	 = dateprotect($post_array['token']);


if (count($post_array) != 0){
	
	
	$vertoken = substr(md5($post_dateid.$post_timeid.$post_fixdid.$post_time),1,10);
	if($vertoken== $token){
				if($post_array['did']!="" or $post_array['tid']!="" or $post_array['uid']!=""){
						
					$tb_get_cfg=mysql_fetch_array(mysql_query("SELECT * FROM `tb_congr` WHERE `id`='".$user_arr[6]."'"));
					$cfg=explode("|",$tb_get_cfg['param']);	


							if($cfg[3]==0){
								
								$count_arr=mysql_fetch_array(mysql_query("SELECT `user1`,`user2` FROM `".$select_table."` WHERE `date`='".$post_dateid."' AND `time`='".$post_timeid."'"));
								$count=mysql_query("SELECT `user1`,`user2` FROM `".$select_table."` WHERE `date`='".$post_dateid."' AND `time`='".$post_timeid."'");
									
									if(mysql_num_rows($count)=="0"){
										$insert=mysql_query("INSERT INTO `".$select_table."` VALUES (NULL,'".$post_dateid."','".$post_timeid."','".$post_userid."','0','0','0','0','0','0','0','0')");
									}
									elseif ($count_arr[0] == 0){
										$insert=mysql_query("UPDATE `".$select_table."` SET `user1`='".$post_userid."' WHERE `date`='".$post_dateid."' AND `time`='".$post_timeid."'");
									}

									elseif($count_arr[1] == 0){

										$insert=mysql_query("UPDATE `".$select_table."` SET `user2`='".$post_userid."' WHERE `date`='".$post_dateid."' AND `time`='".$post_timeid."'");
									}

							}
							
							else{
								
								$count_arr=mysql_fetch_array(mysql_query("SELECT `user1`,`user2`,`user3` FROM `".$select_table."` WHERE `date`='".$post_dateid."' AND `time`='".$post_timeid."'"));
								$count=mysql_query("SELECT `user1`,`user2` FROM `".$select_table."` WHERE `date`='".$post_dateid."' AND `time`='".$post_timeid."'");
									
									if(mysql_num_rows($count)=="0"){
										$insert=mysql_query("INSERT INTO `".$select_table."` VALUES (NULL,'".$post_dateid."','".$post_timeid."','".$post_userid."','0','0','0','0','0','0','0','0','0')");
									}

									elseif ($count_arr[0] == 0){
										$insert=mysql_query("UPDATE `".$select_table."` SET `user1`='".$post_userid."' WHERE `date`='".$post_dateid."' AND `time`='".$post_timeid."'");
									}

									elseif($count_arr[1] == 0){

										$insert=mysql_query("UPDATE `".$select_table."` SET `user2`='".$post_userid."' WHERE `date`='".$post_dateid."' AND `time`='".$post_timeid."'");
									}
							
									elseif($count_arr[2] == 0){

										$insert=mysql_query("UPDATE `".$select_table."` SET `user3`='".$post_userid."' WHERE `date`='".$post_dateid."' AND `time`='".$post_timeid."'");
									}

									
							}
										

							

							$addlog=mysql_query("INSERT INTO `add_logo` VALUES (NULL,'".$user_arr[0]."','".$post_userid."','".$user_arr[6]."','".$post_dateid."','".$post_time."','".date("d.m.Y H:i")."','1')");

						}
	}

else{
	echo $vertoken;
	echo $token;
	
	
	
}

	if ($post_pag=='n'){
						$ind='stand.html&p=n#'.$post_fixdid;

				     //echo $ind;
					header("location: $ind");
					}
	else{
					$ind='stand.html#'.$post_fixdid;

				     //echo $ind;
					header("location: $ind");}

}
?>



<div class='card'>
  <div class='card-body pa-0'>
    <div class='table-wrap'>
      <div class='table-responsive'>


<?php

    $txt_id_name=mysql_fetch_array(mysql_query("SELECT `user1`,`user2`,`date` FROM `".$select_table."` WHERE `date`='".$dateid."' AND `time`='".$timeid."'"));
		    if ($txt_id_name[0]==$user_arr[0] or $txt_id_name[1]==$user_arr[0]){
					$txt_name_u="У Вас нет напарника";
			}
	$get_txt_date=mysql_fetch_array(mysql_query("SELECT * FROM `tb_date` WHERE `id`='".$txt_id_name[2]."'"));

	echo("
	

	<div class='panel'>

<div class='panel-heading'>
	<center><h4>Записать(-ся)</h4></center>
 </div>

<div class='panel-content'>

	<form action='stand.html&sub=partner'  method='post' name='form1'>

				<div class='form-group'>

								<div class='form-group'>

	<div class='container'>
<center>Записаться  ".$get_txt_date[1]." в ".str_replace(['f'], [':'], $time)."  <br>
<br>

			<select class='custom-select d-block w-100' id='part' name='uid'>


										 ");


	$ref_arr=mysql_query("SELECT `id`,`name` FROM `users`  WHERE `rid`='".$user_arr[6]."' AND `stand`='1' ");
		if(mysql_num_rows($ref_arr)=="0")
				echo(" <option name='0' value='' selected>-----</option> ");

			while($row=mysql_fetch_array($ref_arr))
				{
					echo(" <option value='".$row[0]."'>".$row[1]."</option> ");
				}
	echo("
	</select>

	<br>
	<input type='hidden' name='token' value='".$gtoken."'>
	<input type='hidden' name='tid' value='".$timeid."'>
	<input type='hidden' name='did' value='".$dateid."'>
	<input type='hidden' name='fid' value='".$fixdid."'>
	<input type='hidden' name='pag' value='".$getpag."'>
	<input type='hidden' name='ti' value='".$time."'>

	<a class='btn btn-violet' href='");
  
 if ($getpag=='n'){
                $ind='stand.html&p=n';

                echo $ind;
        
              }
              else{
              $ind='stand.html';

                 echo $ind;
			  }
             
  
  
  echo("'> << Назад</a>
	<button type='submit' class='btn btn-primary'>Записать(-ся)</button>
</div></div></div>
	
	</form>
	</div>");
	unset($row,$ref_arr);


				  
?>

</div>
</div>
</div>
</div>
			<script>
var sel = document.getElementById("part");
var arr = Array.from(sel.children).sort((x, y) => {
  return x.text.localeCompare(y.text);
});
arr.forEach(x => sel.appendChild(x));
sel.selectedIndex = 0;
</script>

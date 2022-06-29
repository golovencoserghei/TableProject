<?php
if(!defined("AP")) exit("Доступ к файлу напрямую запрещен!");

if(auth===FALSE)
{
	header("location: /login.html");
	}
if($user_arr[4]==1)
{
	header("location: /index.html");
}
	require_once("template/head.php");

?>

<?

if (count($post_array) != 0)
{
	if($post_array['usid']){
	$num_arr=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM `tb_stands` WHERE `uid`='".$post_array['usid']."' AND `tid`='".$post_array['tbid']."'"));
	if($num_arr[0]>0)
	{
		$err=$adduser_16.$post_array['usid'].$adduser_19;
		msg($err,"wr");
	}
	else
	{
	$prt_key=GenerateKey(6);
	$td_pref=mysql_fetch_array(mysql_query("SELECT `pref` FROM `tb_congr`  WHERE `id`='".$post_array['tbid']."'"));


	$tb_d=mysql_query("INSERT INTO `tb_stands` VALUES (NULL,'".$post_array['usid']."','".$post_array['tbid']."','0','".$prt_key."','".$td_pref[0]."','0','0')");
	$err=$adduser_16.$post_array['usid'].$adduser_20;
	msg($err,"ok");


}
	}


	if($post_array['usdel']){

		$delet_from_table=mysql_query("DELETE FROM `tb_stands` WHERE `uid`='".$post_array['usdel']."' and `tid`='".$post_array['tbid']."'");
		$err=$adduser_16.$post_array['usdel'].$adduser_21;
		msg($err,"ok");

	}
	
	
	
	if($post_array['uca']){

		$nm_cgr=mysql_fetch_array(mysql_query("SELECT `ne_cong` FROM `tb_congr`  WHERE `id`='".$user_arr[6]."'"));

		$cg_gr=mysql_fetch_array(mysql_query("SELECT `rid` FROM `users` WHERE `id`='".$post_array['uca']."'"));

	if($cg_gr[0]==0)
	{
		$insert=mysql_query("UPDATE `users` SET `rid`='".$user_arr[6]."' WHERE `id`='".$post_array['uca']."'");
		$err=$adduser_16.$post_array['uca'].$adduser_22.$nm_cgr[0]." ";
		msg($err,"ok");
		
		
	
	}
	else {
		$err=$adduser_16.$post_array['uca'].$adduser_23.$nm_cgr[0].$adduser_24;
		msg($err,"wr");
	}






	}



}

?>




<a class="btn btn-violet" href='group.html&sub=edgr&id=<?echo $gid;?>'> <? echo $bt_return; ?></a>
<a class="btn btn-violet" href='group.html'> <? echo $bt_main_group; ?></a>

<div class='d-flex align-items-center justify-content-between mt-40 mb-20'>
				<h4><? echo $adduser_1; ?> <? echo $gr_inf['gid'] ;  ?> <? echo $adduser_2; ?> <? echo $ggp_inf['name'] ;  ?></h4>

			</div>
			
			
			<form action=''  method='post' name='form1'>
						<div class="card">


						<div class="card-body">

				<div class='panel-heading'>
<h class='panel-title'><? echo $adduser_3; ?> <? echo $gr_inf['gid'] ;  ?> <? echo $adduser_4; ?></font></h>
							
<div class="row">
                                <div class="col-sm"><br>
                                    <div class="row">
                                        <div class="col-md-2">
                                            
                                        </div>
                                        <div class="col-md-6">			
<br>
								<div class="form-group">
									<div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default"><? echo $tbed_21; ?></span>
                                                </div>
                                                <select name='drop' class="form-control custom-select" id="inputGroupSelect01">
															<option value='0'>----------</option>
															<option value='1'><? echo $adduser_5; ?></option>
												</select>
									</div>
								</div>
							</div>
							<div class="col-md-3"><br>
								<button type='submit' class='btn btn-primary'><? echo $adduser_6; ?></button>
							</div>
						</div>
					</div>
				</div>		
			</div>
		</div>
	</div>				
</form>




<form action="" method="post" name="form1">
<div class='panel'>

 <div class='panel-heading'>
	<h3><? echo $adduser_7; ?></h3>
 </div>

		<div class='panel-content'>
				<div class="form-group">
						<label><font size='5' color='red' face='Arial'></font><? echo $adduser_8; ?></label>
						<select class='custom-select d-block w-100' id='part' name='tbid'>


							<?


	$ref_arr=mysql_query("SELECT * FROM `tb_stands`  WHERE `uid`='".$user_arr[0]."'	");
		if(mysql_num_rows($ref_arr)=="0"){
				echo(" <option name='0' value='' selected>-----</option> ");
		}else{
				echo(" <option name='0' value='' selected>-----</option> ");
			while($row=mysql_fetch_array($ref_arr))
				{
					$inf_tb=mysql_fetch_array(mysql_query("SELECT * FROM `tb_congr`  WHERE `id`='".$row[2]."'"));
					echo(" <option value='".$row[2]."'>".$inf_tb[11]."</option> ");
				}
		}
	?>
						</select>

									<br>




						<label> <span class='colortext'><? echo $adduser_13; ?> </span>
						<? echo $adduser_9; ?>
						<label>

						<br>

						<input class="form-control" type="text" name="usid" size="45"><br>

						<br>

						<input class="btn btn-primary" type="submit" value="<? echo $adduser_10; ?>">
				</div>
				
		</div>


</div>
</form>



</div>






 <div class="col-xl-6 col-md-6">

<form action="" method="post" name="form1">
<div class='panel'>

 <div class='panel-heading'>
	<h3><? echo $adduser_11; ?></h3>
 </div>

		<div class='panel-content'>
				<div class="form-group">
						<label><font size='5' color='red' face='Arial'></font><? echo $adduser_12; ?></label>
						<select class='custom-select d-block w-100' id='part' name='tbid'>


							<?


	$ref_arr=mysql_query("SELECT * FROM `tb_stands`  WHERE `uid`='".$user_arr[0]."'	");
		if(mysql_num_rows($ref_arr)=="0"){
				echo(" <option name='0' value='' selected>-----</option> ");
		}else{
				echo(" <option name='0' value='' selected>-----</option> ");
			while($row=mysql_fetch_array($ref_arr))
				{
					$inf_tb=mysql_fetch_array(mysql_query("SELECT * FROM `tb_congr`  WHERE `id`='".$row[2]."'"));
					echo(" <option value='".$row[2]."'>".$inf_tb[11]."</option> ");
				}
		}
	?>
						</select>

									<br>




						<label> <span class='colortext'><? echo $adduser_13; ?> </span>
						<? echo $adduser_14; ?>
						<label>

						<br>

						<input class="form-control" type="text" name="usdel" size="45"><br>

						<br>

						<input class="btn btn-primary" type="submit" value="<? echo $adduser_11; ?>">
				</div>


		</div>


</div>
</form>

                    </div>





										 <div class="col-xl-6 col-md-6">

										<form action="" method="post" name="form1">
										<div class='panel'>

										 <div class='panel-heading'>
											<h3><? echo $adduser_15; ?></h3>
										 </div>

												<div class='panel-content'>
														<div class="form-group">
																<label><? echo $adduser_16; ?> <font size='5' color='#9400D3' face='Arial'>


																	<?


											$nm_cgr=mysql_fetch_array(mysql_query("SELECT `ne_cong` FROM `tb_congr`  WHERE `id`='".$user_arr[6]."'"));
														echo $nm_cgr[0];

											?>
																</font>
																</label>

																			<br>




																<label> <span class='colortext'>И<? echo $adduser_13; ?> </span>
															<? echo $adduser_17; ?>
																<label>
																
 
																<br>

																<input class="form-control" type="text" name="uca" size="45"><br>

																<br>

																<input class="btn btn-primary" type="submit" value="<? echo $adduser_10; ?>">
														</div>


												</div>


										</div>
										</form>

										                    </div>

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

	
	
	$wd=date("w");
	$tid = dateprotect($get_array['id']);
	
	$post_eddel = dateprotect($post_array['eddel']);
	$post_rep = dateprotect($post_array['rep']);
	$post_cgrep = dateprotect($post_array['cgrep']);
	$post_3_stend = dateprotect($post_array['mst']);
	$post_orin = dateprotect($post_array['orin']);
	
?>

	<main class="main--container">
		<section class="main--content">
                <div class="row gutter-20">




					<!-- Records List Start -->

					<div class="col-md-6">


<?


/// редактирование графика служениея на день
if (count($post_array) != 0)
{

	if($post_array['weak']){

	if($post_array['weak'] == 1)
	{
		$update_time=mysql_query("UPDATE `tb_congr` SET `mo_time`='".$post_array['time']."' WHERE `id`='".$tid ."'");
	}
    elseif($post_array['weak'] == 2)
	{
		$update_time=mysql_query("UPDATE `tb_congr` SET `tu_time`='".$post_array['time']."' WHERE `id`='".$tid ."'");
	}

	 elseif($post_array['weak'] == 3)
	{
		$update_time=mysql_query("UPDATE `tb_congr` SET `we_time`='".$post_array['time']."' WHERE `id`='".$tid ."'");
	}

	elseif($post_array['weak'] == 4)
	{

		$update_time=mysql_query("UPDATE `tb_congr` SET `th_time`='".$post_array['time']."' WHERE `id`='".$tid ."'");
	}

	elseif($post_array['weak'] == 5)
	{

		$update_time=mysql_query("UPDATE `tb_congr` SET `fr_time`='".$post_array['time']."' WHERE `id`='".$tid ."'");
	}
	elseif($post_array['weak'] == 6)
	{

		$update_time=mysql_query("UPDATE `tb_congr` SET `sa_time`='".$post_array['time']."' WHERE `id`='".$tid ."'");
	}
	elseif($post_array['weak'] == 7)
	{

		$update_time=mysql_query("UPDATE `tb_congr` SET `su_time`='".$post_array['time']."' WHERE `id`='".$tid ."'");
	}
	
	header("location: /table.html&sub=tbed&id=".$tid."");
}
////////////////////////////////////////////////////////////END////////////////////////////////////////////////////////////////////////

//================================================================================================================================

/////День недели Когда будет Доступна Новая таблица
if($post_array['tabday']){
	if($post_array['tabday']==9){
		
			$update_time=mysql_query("UPDATE `tb_congr` SET `next_table_activ`='2' WHERE `id`='".$tid."'");
		
	}
	else{
		if($post_array['tabday']==7){$post_array['tabday']=0;}
			$update_time=mysql_query("UPDATE `tb_congr` SET `wid_day`='".$post_array['tabday']."' WHERE `id`='".$tid."'");
			
			if($wd==$post_array['tabday'])
			
			$update_time=mysql_query("UPDATE `tb_congr` SET `next_table_activ`='1' WHERE `id`='".$tid."'");
		
	}


header("location: /table.html&sub=tbed&id=".$tid."");
}
////////////////////////////////////////////////////////END////////////////////////////////////////////////////////////////////////////



//================================================================================================================================


//удаление таблицы
if($post_array['del']){

	//$tbget = mysql_query("SELECT * FROM `tb_congr`  WHERE `id`='".$post_array['tbid']."'");


	//$name_dl_tb = "tb_stend_".$tbget[10]."";
	//$rename_name_dl_tb = "del_tb_stend_".$tbget[10]."";
	$stat_del = mysql_query("UPDATE `tb_congr` SET `del`='1' WHERE `id`='".$post_array['tbid']."' AND `uid`='".$user_arr['rid']."'");
	//$dell_table = mysql_query("RENAME TABLE `$name_dl_tb` `$rename_name_dl_tb`");


header("location: /table.html&sub=tbed&id=".$tid."");
}
/////////////////////////////////////////////////////////////END///////////////////////////////////////////////////////////////////////


//Активна, закрыта таблица
if($post_array['tbactiv']!=''){

	$update_activ=mysql_query("UPDATE `tb_congr` SET `status_rega`='".$post_array['tbactiv']."' WHERE `id`='".$post_array['tbid']."'");


header("location: /table.html&sub=tbed&id=".$tid."");
}
/////////////////////////////////////////////////////////////END///////////////////////////////////////////////////////////////////////


//параметры таблицы
if($post_array['param']==1){
	
	
	if($post_rep=='')
	{
		$post_rep=0;
	}
	
	if($post_eddel=='')
	{
		$post_eddel=0;
	}
	if($post_cgrep=='')
	{
		$post_cgrep=0;
	}
	if($post_3_stend=='')
	{
		$post_3_stend=0;
	}
	if($post_orin=='')
	{
		$post_orin=0;
	}
	
	$new_param= $post_eddel.'|'.$post_rep.'|'.$post_cgrep.'|'.$post_3_stend.'|'.$post_orin;

	$update_param=mysql_query("UPDATE `tb_congr` SET `param`='".$new_param."' WHERE `id`='".$tid."'");

header("location: /table.html&sub=tbed&id=".$tid."");


}
/////////////////////////////////////////////////////////////END///////////////////////////////////////////////////////////////////////



//Название таблицы
if($post_array['stname']!=""){
	


	$update_param=mysql_query("UPDATE `tb_congr` SET `st_loc`='".$post_array['stname']."' WHERE `id`='".$tid."'");

header("location: /table.html&sub=tbed&id=".$tid."");


}
/////////////////////////////////////////////////////////////END///////////////////////////////////////////////////////////////////////




//================================================================================================================================




}



	$tb_get_date=mysql_fetch_array(mysql_query("SELECT * FROM `tb_congr` WHERE `id`='".$tid."'"));
	$config=explode("|",$tb_get_date['param']);

?>







<div class='panel'>

	<div class='panel-heading'>
		<center><h4><? echo $tbed_1; ?></h4></center>
	</div>
	
</div>



<form action="" method="post" name="form1">

	<div  class='d-flex align-items-center justify-content-between mt-40 mb-20'>
		<h3><? echo $tbed_2; ?></h3>
	</div>

	<div class="card">
		<div class="card-body pa-0">
			<div class='form-group'>
					<div class='form-group'>
						<div class='container'>
							<br>
							<label><? echo $tbed_3; ?></label>
							<br>
							<input class="form-control" type="text"  value="<? echo $tb_get_date['st_loc']; ?>" name="stname" size="45"><br>
							<br>
						<input class="btn btn-primary" type="submit" value="<? echo $bt_su_sv; ?>">
					</div>
				</div>
			</div>
		</div>
	</div>
	
</form>


 <form action="" method="post" name="form1">

	<div  class='d-flex align-items-center justify-content-between mt-40 mb-20'>
		<h3><? echo $tbed_4; ?></h3>
	</div>

	<div class="card">
		<div class="card-body pa-0">
			<div class='form-group'>
				<div class='form-group'>
					<div class='container'>
						<br>
							<label><? echo $tbed_5; ?></label>
							<select class="custom-select d-block w-100" name='weak'>
								<option value="0">-</option>
								<option value="1"><? echo $wk_mo; ?></option>
								<option value="2"><? echo $wk_tu; ?></option>
								<option value="3"><? echo $wk_we; ?></option>
								<option value="4"><? echo $wk_th; ?></option>
								<option value="5"><? echo $wk_fr; ?></option>
								<option value="6"><? echo $wk_sa; ?></option>
								<option value="7"><? echo $wk_su; ?></option>
							</select>
						
							<br>
							<label><? echo $tbed_6; ?></label>			
							<br>
							<label><? echo $tbed_7; ?><label>
							<br>
							<input class="form-control" type="text" name="time" size="45"><br>
							<br>
							<input class="btn btn-primary" type="submit" value="<? echo $bt_su_sv; ?>">
					</div>
				</div>
			</div>
		</div>
	</div>
</form>


<form action="" method="post" name="form1">

	<div  class='d-flex align-items-center justify-content-between mt-40 mb-20'>
		<h3><? echo $tbed_8; ?></h3>
	</div>

	<div class="card">
		<div class="card-body pa-0">
			<div class='form-group'>
				<div class='form-group'>
					<div class='container'>
						<input type='hidden' name='param' value='1'>
						
					<br>
						
						<div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input name="eddel" value="1" type="checkbox" class="custom-control-input" id="customCheck1" <? if ($config[0]==1) { echo "checked";} ?>>
                                <label class="custom-control-label" for="customCheck1"><? echo $tbed_9; ?></label>
                            </div>
                        </div>
						
						
						<div class="form-group">
                            <div class="custom-control custom-checkbox">
								<input name="rep" value="1" type="checkbox" class="custom-control-input" id="customCheck2" <? if ($config[1]==1) { echo "checked";} ?>>
								<label class="custom-control-label" for="customCheck2"><? echo $tbed_10; ?></label>
                            </div>
                        </div>
						
						<div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input name="mst" value="1" type="checkbox" class="custom-control-input" id="customCheck3" <? if ($config[3]==1) { echo "checked";} ?>>
                                <label class="custom-control-label" for="customCheck3"><? echo $tbed_11; ?></label>
                            </div>
                        </div>						
										
										
						<div class="form-group">
                                           <div class="custom-control custom-checkbox">
                                                <input name="cgrep" value="1" type="checkbox" class="custom-control-input" id="customCheck4" <? if ($config[2]==1) { echo "checked";} ?>>
                                                <label class="custom-control-label" for="customCheck4"><? echo $tbed_12; ?></label>
                                            </div>
										</div>
						<div class="form-group">
                                           <div class="custom-control custom-checkbox">
                                                <input name="orin" value="1" type="checkbox" class="custom-control-input" id="customCheck5" <? if ($config[4]==1) { echo "checked";} ?>>
                                                <label class="custom-control-label" for="customCheck5"><? echo $tbed_13; ?></label>
                                            </div>
										</div>
						<br>
					

						<input class="btn btn-primary" type="submit" value="<? echo $bt_su_sv; ?>">
          </div>
          </div>
				</div>


		</div>
		</div>
</form>






<form action="" method="post" name="form1">

<div  class='d-flex align-items-center justify-content-between mt-40 mb-20'>
	<h3><? echo $tbed_14; ?></h3>
 </div>
 <div class="card">
   <div class="card-body pa-0">

     <div class='form-group'>

             <div class='form-group'>

                     <div class='container'>
						
									<br>
						<label><? echo $tbed_15; ?></label>
						<select class="custom-select d-block w-100"  id='weak' name='tabday'>
									  
										<option value="">-</option>
										<option value="1"><? echo $wk_mo; ?></option>
										<option value="2"><? echo $wk_tu; ?></option>
										<option value="3"><? echo $wk_we; ?></option>
										<option value="4"><? echo $wk_th; ?></option>
										<option value="5"><? echo $wk_fr; ?></option>
										<option value="6"><? echo $wk_sa; ?></option>
										<option value="7"><? echo $wk_su; ?></option>
										<option value="">-</option>
									    <option value="9"><? echo $wk_aa; ?></option>
									</select>
						<br>
						
			<div class="form-group">
                                           <div class="custom-control custom-checkbox">
                                                <input name="pioner" value="2" type="checkbox" class="custom-control-input" id="customCheck3" <? if ($one[6]==2) { echo "checked";} ?>>
                                                <label class="custom-control-label" for="customCheck3"><? echo $tbed_16; ?></label>
                                            </div>
                                        </div>
						<br>
	<input class="btn btn-primary" type="submit" value="<? echo $bt_su_sv; ?>">
						</div>
          </div>
          </div>
        </div>


    </div>
</form>



<form action="" method="post" name="form1">

<div  class='d-flex align-items-center justify-content-between mt-40 mb-20'>
	<h3><? echo $tbed_17; ?></h3>
 </div>

 <div class="card">
   <div class="card-body pa-0">

     <div class='form-group'>

             <div class='form-group'>

                     <div class='container'>
									<label><? echo $tbed_18; ?></label>
									<select class='custom-select d-block w-100' id='part' name='tbid'>


							<?


	$ref_arr=mysql_query("SELECT * FROM `tb_stands`  WHERE `uid`='".$user_arr[0]."'  and `del`=0 ");
		if(mysql_num_rows($ref_arr)=="0"){
				echo(" <option name='0' value='' selected>-----</option> ");
		}else{
				echo(" <option name='0' value='' selected>-----</option> ");
			while($row=mysql_fetch_array($ref_arr))
				{
					if($row[3]==$user_arr[0]){
					$inf_tb=mysql_fetch_array(mysql_query("SELECT * FROM `tb_congr`  WHERE `id`='".$row[2]."'"));
					echo(" <option value='".$row[2]."'>".$inf_tb[11]."</option> ");
				}
			}
		}
	?>
						</select>

									<label><? echo $tbed_19; ?></label>
									<select class="custom-select d-block w-100"  id='weak' name='tbactiv'>
									    <option value="">-</option>
										<option value="0">---</option>
										<option value="1"><? echo $tbed_24; ?></option>
										<option value="2"><? echo $tbed_25; ?></option>
									</select>
<br>
                  	<input class="btn btn-primary" type="submit" value="<? echo $bt_su_sv; ?>">
									</div>

              </div>
              </div>
              </div>


              </div>

</form>






<form action="" method="post" name="form1">
<div  class='d-flex align-items-center justify-content-between mt-40 mb-20'>
	<h3><font size='5' color='red' face='Arial'><? echo $tbed_20; ?> </font> </h3>
 </div>
 <div class="card">
   <div class="card-body pa-0">

     <div class='form-group'>

             <div class='form-group'>

                     <div class='container'>
						<label><? echo $tbed_18; ?></label>
						<select class='custom-select d-block w-100' id='part' name='tbid'>
							<?
	$ref_arr=mysql_query("SELECT * FROM `tb_stands`  WHERE `uid`='".$user_arr[0]."'  and `del`=0 ");
		if(mysql_num_rows($ref_arr)=="0"){
				echo(" <option name='0' value='' selected>-----</option> ");
		}else{
				echo(" <option name='0' value='' selected>-----</option> ");
			while($row=mysql_fetch_array($ref_arr))
				{
					if($row[3]==$user_arr[0]){
					$inf_tb=mysql_fetch_array(mysql_query("SELECT * FROM `tb_congr`  WHERE `id`='".$row[2]."'"));
					echo(" <option value='".$row[2]."'>".$inf_tb[11]."</option> ");
				}
			}
		}
	?>
						</select>
									<br>
						<label><? echo $tbed_21; ?></label>
						<select class="custom-select d-block w-100" name='del'>
									    <option value="0">-</option>
										<option value="1"><? echo $bt_su_del; ?></option>
						</select>
						<br>
						<label> <font size='4' color='red' face='Arial'> <span class='colortext'><? echo $tbed_22; ?> </span> </font><? echo $tbed_23; ?><label>
 <br>
<input class="btn btn-primary" type="submit" value="<? echo $bt_su_del; ?>">

						</div>
 

          </div>
          </div>
          </div>


          </div>

</form>

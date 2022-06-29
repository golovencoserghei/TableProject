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

	$rap_year=mysql_fetch_array(mysql_query("SELECT * FROM `st_config`  WHERE `key`='report_year'"));
		$rp_ye=explode("|",$rap_year['param']);
		    $year=$rp_ye[0];

$user = dateprotect($get_array['u']);
$timeid = dateprotect($get_array['tid']);
$dateid = dateprotect($get_array['did']);
$userid = dateprotect($get_array['uid']);
$fixdid = dateprotect($get_array['fid']);
$getpag = dateprotect($get_array['pag']);



$post_time = dateprotect($post_array['t']);
$post_timeid = dateprotect($post_array['p']);
$post_dateid = dateprotect($post_array['i']);
$post_userid = dateprotect($post_array['pp']);
$post_fixdid = dateprotect($post_array['pv']);
$dat_us=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='$user'"));



if (count($post_array) != 0)
{
if($post_array['rapy'] != ''){
$add_raport=mysql_query("INSERT INTO `tb_raport`  VALUES (NULL,'".$user."','".$user_arr['rid']."',
																	'0|0|0|0|0||0|0','0|0|0|0|0||0|0','0|0|0|0|0||0|0','0|0|0|0|0||0|0','0|0|0|0|0||0|0','0|0|0|0|0||0|0',
																	'0|0|0|0|0||0|0','0|0|0|0|0||0|0','0|0|0|0|0||0|0','0|0|0|0|0||0|0','0|0|0|0|0||0|0','0|0|0|0|0||0|0','".$post_array['rapy']."','0')");
header("location: /report.html&sub=mb&u=".$user."");
}		
	



}

?>

<a class="btn btn-violet" href='report.html&sub=rp'> << Назад</a>

<div class='d-flex align-items-center justify-content-between mt-40 mb-20'>
				<h4>Карточка собрания для отчетов возвещателя</h4>

			</div>
			<div class='card'>
				<div class='card-body pa-0'>
				
					<div class='table-wrap'>
					
						<div class='table-responsive'>




								 <table class='table table-sm table-hover mb-0'>
								 
										<thead>

												<tr>
														<th><font size='1' face='Arial'><strong> ФИО:</strong></font></th>
														<th><?echo $dat_us['name'];?></th>
														<th  colspan='1'></th><th>

															<div class="col">
																		<div class="row">
																				<div class="col-md-3 mt-5">
																							<div class="custom-control custom-radio radio-primary">

																									<input type="radio" id="man" name="gen" disabled <?
																					 if($dat_us['gender']==1){
																						 echo "checked";
																						 
																					 }
																					 ?> class="custom-control-input">
																									<label class="custom-control-label" for="man"><font size='1' face='Arial'><strong> МУЖСКОЙ</strong></font></label>

																							</div>
																							</div>



														</th>
														<th>

															<div class="col-md-3 mt-5">

															<div class="custom-control custom-radio radio-primary">

														<input type="radio" id="wiman" name="gen" disabled <?
																					 if($dat_us['gender']==2){
																						 echo "checked";
																						 
																					 }
																					 ?> class="custom-control-input">
														<label class="custom-control-label" for="wiman"> <font size='1' face='Arial'><strong> ЖЕНСКИЙ</strong></font></label>

															</div>
															</div>
															</div>
															</div>


														</th>
														<?


																	if($permis[7]==1){
																	echo "<th><a id='edit' class='nav-link' href='report.html&sub=cred&u=".$user."'><i data-feather='align-justify'></i></a>	</th>";
																	}


														?>








												</tr>

												<tr>
														<th><font size='1' face='Arial'><strong> ДОМ. АДРЕС:</strong></font></th>
														<th><?echo $dat_us['adres'];?></th>
														<th></th>
														<th>

															<div class="col">
																		<div class="row">
																				<div class="col-3 mt-5">
																							<div class="custom-control custom-radio radio-primary">

																									<input type="radio" id="pamaz" name="op" disabled <?
																					 if($dat_us['do_p']==2){
																						 echo "checked";
																						 
																					 }
																					 ?> class="custom-control-input">
																									<label class="custom-control-label" for="pamaz"><font size='1' face='Arial'><strong> ПОМАЗ.</strong></font></label>

																									</div>
																							</div>



														</th>
														<th>

															<div class="col-md-3 mt-5">

															<div class="custom-control custom-radio radio-primary">

																<input type="radio" id="npamaz" name="op" disabled 
																					<?
																					 if($dat_us['do_p']==1){
																						 echo "checked";
																						 
																					 }
																					 ?> 
																					 class="custom-control-input">
																<label class="custom-control-label" for="npamaz"> <font size='1' face='Arial'><strong> "ДР. ОВЦА"</strong></font></label>

																</div>
															</div>
															</div>
															</div>


														</th>







												</tr>

												<tr>
														<th><font size='1' face='Arial'><strong> ТЕЛЕФОН:</strong></font></th>
														<th><?echo $dat_us['tel1'];?></th>
														<th><?echo $dat_us['tel2'];?></th>
														<th>

															<div class="col">
																		<div class="row">
																				<div class="col-md-3 mt-5">
																							<div class="custom-control custom-radio radio-primary">

																									<input type="radio" id="star" name="naznach" disabled 
																									<?
																					 if($dat_us['st_sp']==2){
																						 echo "checked";
																						 
																					 }
																					 ?>
																									class="custom-control-input">
																									<label class="custom-control-label" for="star"><font size='1' face='Arial'><strong> СТАР.</strong></font></label>

																									</div>
																							</div>



														</th>
														<th>

															<div class="col-md-3 mt-5">

															<div class="custom-control custom-radio radio-primary">
																<input type="radio" id="pom" name="naznach" disabled <?
																					 if($dat_us['st_sp']==1){
																						 echo "checked";
																						 
																					 }
																					 ?> class="custom-control-input">
																<label class="custom-control-label" for="pom"><font size='1' face='Arial'><strong> СЛ. ПОМ</strong></font></label>

																</div>
															</div>
															</div>
															</div>


														</th>







												</tr>




												<tr>
														<th><font size='1' face='Arial'><strong> ДАТА РОЖДЕНИЯ:</strong></font></th>
														<th><?echo $dat_us['bday'];?></th>


														<th></th>

														<th>

															<div class="col">
																		<div class="row">
																				<div class="col-md-3 mt-5">
																							<div class="custom-control custom-radio radio-primary">

																									<input type="radio" id="pioner" name="pioner" disabled 
																									<?
																					 if($dat_us['pp_p']==2){
																						 echo "checked";
																						 
																					 }
																					 ?>
																					 class="custom-control-input">
																									<label class="custom-control-label" for="pioner"><font size='1' face='Arial'><strong> ПИОНЕР</strong></font></label>

																									</div>
																							</div>



														</th>
														<th>

															
															</div>
															</div>


														</th>






												</tr>

												<tr>
													<th><font size='1' face='Arial'><strong> ДАТА КРЕЩЕНИЯ:</strong></font></th>
													<th><?echo $dat_us['botez'];?></th>
													<th></th>

													<th>

													
</th>
	</tr>
										</thead>

									 					 </table>

													 </div>
												 </div>
											 </div>
										 </div>


														 <div class='card'>
														   <div class='card-body pa-0'>
														     <div class='table-wrap'>
														       <div class='table-responsive'>


																		                                            <table class="table table-secondary table-bordered mb-0">
																		                                                <thead class="thead-secondary">




																							<tr>

																									<th><font size='1' face='Arial'><strong> СЛУЖ.ГОД</strong></font><font size='2' face='Arial'><strong> <? echo $rp_ye[0];?></strong></font></th>
																									<th><font size='1' face='Arial'><strong> ПУБЛ.</strong></font></th>
																									<th><font size='1' face='Arial'><strong> ВИДЕО</strong></font></th>
																									<th><font size='1' face='Arial'><strong> ЧАСЫ</strong></font></th>
																									<th><font size='1' face='Arial'><strong> ПОВТ. <p>ПОС.</strong></font></th>
																									<th><font size='1' face='Arial'><strong> ИЗУЧ.<P> БИБ.</strong></font></th>
																									<th><font size='1' face='Arial'><strong> ПРИМЕЧАНИЯ</strong></font></th>






																							</tr>
																							</thead>
																					<tbody>

																						<?
																						
																						
	$rap_dat=mysql_fetch_array(mysql_query("SELECT * FROM `cfg_congr`  WHERE `cgr`='21'"));	//получаем номер месяца и год для отчетов
																		
	$x=-1;																					
	while($x++<11){
	$tex_mnt=get_month($x);	
	$getbase=rp_us_base($x);														//по месяцу определяем какая база ужна нам
    $rptb=$getbase.'_'.$rap_dat['rap_year'];
	$exs=mysql_query("SELECT * FROM `".$rptb."` LIMIT 1");
	if($exs!=''){
	$rap=mysql_query("SELECT * FROM `".$rptb."` WHERE `uid`='".$user."'");

	
	$rap_sp=mysql_fetch_array(mysql_query("SELECT * FROM `".$rptb."` WHERE `uid`='".$user."'"));
		if($rap_sp['pp_op']==0){
		$bgcolor="";
	}
	elseif ($rap_sp['pp_op']==1){
		$bgcolor="bgcolor='#d1eaff'";
	}
	elseif($rap_sp['pp_op']==2){
		$bgcolor="bgcolor='#FFDEAD'";
	}
	
	echo("<tr ".$bgcolor."><th >".$tex_mnt."</th>");
	
	if ($rap_sp['pb']==0){
		echo("<th></th>");
	}
	else{
		$pb+=$rap_sp['pb'];
		echo("<th >".$rap_sp['pb']."</th>");
	}
	if ($rap_sp['vd']==0){
		echo("<th ></th>");
	}
	else{
		$vd+=$rap_sp['vd'];
		echo("<th>".$rap_sp['vd']."</th>");
	}
	
	if ($rap_sp['tm']==0){
		echo("<th></th>");
	}
	else{
		$tm+=$rap_sp['tm'];
		echo("<th>".$rap_sp['tm']."</th>");
	}
	
	if ($rap_sp['pp']==0){
		echo("<th></th>");
	}
	else{
		$pp+=$rap_sp['pp'];
		echo("<th>".$rap_sp['pp']."</th>");
	}
	
	if ($rap_sp['iz']==0){
		echo("<th></th>");
	}
	else{
		$iz+=$rap_sp['iz'];
		echo("<th>".$rap_sp['iz']."</th>");
	}
	
	echo("<th>".$rap_sp['inf']."</th>");



echo("</tr>");
	
	
}
else{
	
	echo("<tr><th>".$tex_mnt."</th>");
	echo("<th></th>");
	echo("<th></th>");
	echo("<th></th>");
	echo("<th></th>");
	echo("<th></th>");
	echo("<th></th>");
	echo("</tr>");
}
}
	


	echo("<tr>
<th >Итого</th>");
echo("<th>".$pb."</th>");
echo("<th>".$vd."</th>");
echo("<th>".$tm."</th>");
echo("<th>".$pp."</th>");
echo("<th>".$iz."</th>");
echo("<th></th>");
echo("</tr>");

?>
</tbody>
						 </table>
						</div>
					</div>
				</div>
			</div>



													 														 <div class='card'>
													 														   <div class='card-body pa-0'>
													 														     <div class='table-wrap'>
													 														       <div class='table-responsive'>


													 																		                                            <table class="table table-secondary table-bordered mb-0">
													 																		                                                <thead class="thead-secondary">




													 																							<tr>

													 																									<th><font size='1' face='Arial'><strong> СЛУЖ.ГОД</strong></font><font size='2' face='Arial'><strong> <? echo $rp_ye[1];?></strong></font></th>
													 																									<th><font size='1' face='Arial'><strong> ПУБЛ.</strong></font></th>
													 																									<th><font size='1' face='Arial'><strong> ВИДЕО</strong></font></th>
													 																									<th><font size='1' face='Arial'><strong> ЧАСЫ</strong></font></th>
													 																									<th><font size='1' face='Arial'><strong> ПОВТ. <p>ПОС.</strong></font></th>
													 																									<th><font size='1' face='Arial'><strong> ИЗУЧ.<P> БИБ.</strong></font></th>
													 																									<th><font size='1' face='Arial'><strong> ПРИМЕЧАНИЯ</strong></font></th>






													 																							</tr>
													 																							</thead>
													 																					<tbody>

													 																													<?
$lyear = $year -1;

$ref_arr=mysql_query("SELECT * FROM `tb_raport` WHERE `uid`='".$user."' and `year`='".$lyear."'");
$rap=mysql_fetch_array(mysql_query("SELECT `sep`,`oct`,`nov`,`dec`,`jan`,`feb`,`mart`,`aptil`,`mai`,`iumi`,`iul`,`aug` FROM `tb_raport` WHERE `uid`='".$user."' and `year`='".$lyear."'"));
$tm='';
$pb='';
$ib='';
$pp='';
$pv='';
if(mysql_num_rows($ref_arr)=="0"){
echo("<tr> <th colspan='6' bgcolor='#FA8072'>Нет ниодного отчета</th><th><form action=''  method='post' name='form1'>      <input type='hidden' name='rapy' value='".$rp_ye[1]."' ><button type='submit' class='btn btn-primary'>Содать</button>	</form></th></tr>");
}
else {
	
	$i = 0;
	$x = 0;
	while($x++<13){
		
		
		$month[0]='СЕНТЯБРЬ';
		$month[1]='ОКТЯБРЬ';
		$month[2]='НОЯБРЬ';
		$month[3]='ДЕКАБРЬ';
		$month[4]='ЯНВАРЬ';
		$month[5]='ФЕВРАЛЬ';
		$month[6]='МАРТ';
		$month[7]='АПРЕЛЬ';
		$month[8]='МАЙ';
		$month[9]='ИЮНЬ';
		$month[10]='ИЮЛЬ';
		$month[11]='АВГУСТ';
		
		
		
		
$one=explode("|",$rap[$i]);
if($one[6]==0){echo("<tr><th>");
						
						
						if($one[7]==1){
							
							echo"<font size='1' color='red' face='Arial'><strong> ".$month[$i]."</strong></font> ";
						}
						else{
							
							echo"<font size='1' face='Arial'><strong> ".$month[$i]."</strong></font> ";
						
						}
						echo("

</th>");}
elseif($one[6]==1){echo("<tr bgcolor='#d1eaff' ><th><font size='1' face='Arial'><strong> ".$month[$i]."</strong></font></th>");}
elseif($one[6]==2){echo("<tr bgcolor='#FFDEAD' ><th><font size='1' face='Arial'><strong> ".$month[$i]."</strong></font></th>");}
foreach($one as $key => $value){

	if ($key==0){
		$tm += $value;
	}
	elseif ($key==1) {
		$pb += $value;
	}
	elseif ($key==2) {
		$ib += $value;
	}
	elseif ($key==3) {
		$pp += $value;
	}
	elseif ($key==4) {
		$pv += $value;
	}
	if($key==0 or $key==1 or $key==2 or $key==3 or $key==4){
		
		
		if($value==0){
			echo("<th></th>");
		}
		else{
			echo("<th>".$value."</th>");
		}		
	}
	if($key==5){echo("<th>".$value."</th>");}
}
echo("</tr>");
		$i++;
		if ($i==12) break;
	}
	echo("<tr>
<th >Итого</th>");
echo("<th>".$tm."</th>");
echo("<th>".$pb."</th>");
echo("<th>".$ib."</th>");
echo("<th>".$pp."</th>");
echo("<th>".$pv."</th>");
echo("<th></th>");
echo("</tr>");
}
?>


</tbody>
		</table>
				 </div>
						</div>
							</div>
								</div>

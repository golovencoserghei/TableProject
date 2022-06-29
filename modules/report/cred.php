<?php
if(!defined("AP")) exit("Доступ к файлу напрямую запрещен!");

if(auth===FALSE)
{
	header("location: /login.html");
	}

	require_once("template/head.php");

if($permis[7]==1)
{
	

	$rap_year=mysql_fetch_array(mysql_query("SELECT * FROM `st_config`  WHERE `key`='report_year'"));
		$rp_ye=explode("|",$rap_year['param']);
		    $year=$rp_ye[0];
$y=date("Y");

$user = dateprotect($get_array['u']);
$g_y = dateprotect($post_array['y']);



$timeid = dateprotect($get_array['tid']);
$dateid = dateprotect($get_array['did']);
$userid = dateprotect($get_array['uid']);
$fixdid = dateprotect($get_array['fid']);




$post_name = dateprotect($post_array['fio']);
$post_man = dateprotect($post_array['man']);
$post_women = dateprotect($post_array['women']);
$post_adres = dateprotect($post_array['adres']);
$post_pmz = dateprotect($post_array['pmz']);
$post_dro = dateprotect($post_array['dro']);
$post_tel1 = dateprotect($post_array['tel1']);
$post_tel2 = dateprotect($post_array['tel2']);
$post_star = dateprotect($post_array['star']);
$post_sluj = dateprotect($post_array['sluj']);
$post_birthday = dateprotect($post_array['birthday']);
$post_pioner = dateprotect($post_array['pioner']);
$post_p_pioner = dateprotect($post_array['p_pioner']);
$post_botezbay = dateprotect($post_array['botezbay']);


if (count($post_array) != 0){
	
if($post_array['te']==0){
	if($post_name!=''){
	
	
				$p='0';
				$minsert=mysql_query("UPDATE `users` SET `name`='".$post_name."' WHERE `id`='".$user."'");
				$err="Изменен, ФИО";
				msg($err,"ok");
	

}
else{
	$err="Укажите верно ФИО";
		msg($err,"wr");
}

if($post_adres!=''){
	
	
				$p='0';
				$minsert=mysql_query("UPDATE `users` SET `adres`='".$post_adres."' WHERE `id`='".$user."'");
				$err="Изменен, Адрес";
				msg($err,"ok");
	

}
else{
	$err="Укажите верно Адрес";
		msg($err,"wr");
}


if($post_tel1!='' or $post_tel2!=''){
	
	
				$p='0';
				$minsert=mysql_query("UPDATE `users` SET `tel1`='".$post_tel1."', `tel2`='".$post_tel2."' WHERE `id`='".$user."'");
				$err="Изменен, номер телефона";
				msg($err,"ok");
	

}


if($post_birthday!='' or $post_botezbay!=''){
	
	
				$p='0';
				$minsert=mysql_query("UPDATE `users` SET `botez`='".$post_botezbay."', `bday`='".$post_birthday."' WHERE `id`='".$user."'");
				$err="Изменен, дата рождения или дата крещения";
				msg($err,"ok");
	

}
	
	
if($post_women=='' and $post_man=='' or $post_women==1 and $post_man==1){
	
	
	  $err="Укажите верно пол";
		msg($err,"wr");

}
else{
	
	if ($post_man == 1 or $post_women == 1 ){
	
			if ($post_women == 1){
				$wgender='2';
				$winsert=mysql_query("UPDATE `users` SET `gender`='".$wgender."' WHERE `id`='".$user."'");
				 $err="Изменено, Жениский";
					msg($err,"ok");
			}
			if ($post_man == 1){
				$mgender='1';
				$minsert=mysql_query("UPDATE `users` SET `gender`='".$mgender."' WHERE `id`='".$user."'");
				$err="Изменено, Мужской";
					msg($err,"ok");
			}

}


}



	
if($post_pmz=='' and $post_dro=='' or $post_pmz==1 and $post_dro==1){
	
	
	  $err='Укажите верно, "Другая ОВЦА" или Помазаник';
		msg($err,"wr");

}
else{
	
	if ($post_pmz == 1 or $post_dro == 1 ){
	
			if ($post_dro == 1){
				$do='1';
				$winsert=mysql_query("UPDATE `users` SET `do_p`='".$do."' WHERE `id`='".$user."'");
				 $err='Изменено, "Другая ОВЦА"';
					msg($err,"ok");
			}
			if ($post_pmz == 1){
				$p='2';
				$minsert=mysql_query("UPDATE `users` SET `do_p`='".$p."' WHERE `id`='".$user."'");
				$err="Изменено, Помазаник";
					msg($err,"ok");
			}

}


}


	
if($post_star==1 and $post_sluj==1){
	
	
	  $err='Укажите верно, Старейшина или Служебный Помошник или без назначения';
		msg($err,"wr");

}
else{
	
	if ($post_star == 1 or $post_sluj == 1 ){
	
			if ($post_sluj == 1){
				$s='1';
				$winsert=mysql_query("UPDATE `users` SET `st_sp`='".$s."' WHERE `id`='".$user."'");
				 $err='Изменено, Служебный помошник';
					msg($err,"ok");
			}
			if ($post_star == 1){
				$sl='2';
				$minsert=mysql_query("UPDATE `users` SET `st_sp`='".$sl."' WHERE `id`='".$user."'");
				$err="Изменено, Старейшина";
					msg($err,"ok");
			}

}


}
	
if($post_star=='' and $post_sluj==''){
	 
	
				$p='0';
				$minsert=mysql_query("UPDATE `users` SET `st_sp`='".$p."' WHERE `id`='".$user."'");
				$err="Изменен, без назначения";
					msg($err,"ok");
	

}


	
//echo "W".$post_women.$wgender;
//echo "M".$post_man.$mgender;				

	if ($post_pioner == 1 or $post_p_pioner == 1 ){
	
			if ($post_p_pioner == 1){
				$s='1';
				$winsert=mysql_query("UPDATE `users` SET `pp_p`='".$s."' WHERE `id`='".$user."'");
				 $err='Изменено, Пионер';
					msg($err,"ok");
			}
			if ($post_pioner == 1){
				$sl='2';
				$minsert=mysql_query("UPDATE `users` SET `pp_p`='".$sl."' WHERE `id`='".$user."'");
				$err="Изменено, Подсобный Пионер";
					msg($err,"ok");
			}
	}




	
if($post_pioner=='' and $post_p_pioner==''){
	
	
				$p='0';
				$minsert=mysql_query("UPDATE `users` SET `pp_p`='".$p."' WHERE `id`='".$user."'");
				$err="Изменен, Возвещатель";
					msg($err,"ok");
	

}
}

if($post_array['te']==1){


$q=0;
$x=0;
		
		$month[0]='sep';
		$month[1]='oct';
		$month[2]='nov';
		$month[3]='dec';
		$month[4]='jan';
		$month[5]='feb';
		$month[6]='mart';
		$month[7]='aptil';
		$month[8]='mai';
		$month[9]='iumi';
		$month[10]='iul';
		$month[11]='aug';
		
	while($x++<13){
		
		
	$xx=-1;
	while($xx++<5){
		$gpp_p=mysql_fetch_array(mysql_query("SELECT `".$month[$q]."` FROM `tb_raport` WHERE `uid`='".$user."' and `year`='".$g_y."'"));
		$one=explode("|",$gpp_p[0]);
		$st=$one[6];
	
		$arr=$q.'|'.$xx;
		$st=0;			
		if($xx==0){if ($post_array[$arr]==''){$post_p=0;} else {$post_p=$post_array[$arr];}}
		if($xx==1){if ($post_array[$arr]==''){$post_pv=0;} else {$post_pv=$post_array[$arr];}}
		if($xx==2){if ($post_array[$arr]==''){$post_t=0;} else {$post_t=$post_array[$arr];}}
		if($xx==3){if ($post_array[$arr]==''){$post_pp=0;} else {$post_pp=$post_array[$arr];}}
		if($xx==4){if ($post_array[$arr]==''){$post_i=0;} else {$post_i=$post_array[$arr];}}
		if($xx==5){$post_info=dateprotect($post_array[$arr]);
					$xx=-1; 
					break; 
				}
	}
	
	
	
	$rap_date=$post_p.'|'.$post_pv.'|'.$post_t.'|'.$post_pp.'|'.$post_i.'|'.$post_info.'|'.$st.'|0';
	
						
	
	$insert=mysql_query("UPDATE `tb_raport` SET `".$month[$q]."`='".$rap_date."' WHERE `uid`='".$user."' and `year`='".$g_y."'");

$q++;
if ($q==12) break;
	}
 $err="Внесены изменения в таблицу за ".$g_y." год";
msg($err,"ok");

}



}




$dat_us=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$user."'"));
?>
<a class="btn btn-violet" href='report.html&sub=mb&u=<?echo $user;?>'> << Назад</a>
<a class="btn btn-violet" href='report.html&sub=congr'> Главная</a>
<div class='d-flex align-items-center justify-content-between mt-40 mb-20'>
				<h4>Карточка собрания для отчетов возвещателя(Редактирование)</h4>

			</div>
			
			
<form action=''  method='post' name='form1'>
			<div class='card'>
				<div class='card-body pa-0'>
					<div class='table-wrap'>
						<div class='table-responsive'>



								 <table class='table table-flush mb-0'>
								 
							
										<thead>
										
										
												<tr class='not-sortable'>
														<th class='not-sortable' colspan='1'><font size='1' face='Arial'><strong> ФИО:</strong></font></th>
														<th   colspan='3'><div class="col-xs-2"><input class="form-control" type="text" name="fio" value="<?echo $dat_us['name'];?>" /></div></th>
														<th>

															<div class="col">
																		<div class="row">
																				<div class="col-md-3 mt-5">
																					<div class="custom-control custom-checkbox checkbox-primary">
																					 <input type="checkbox" name="man" value="1" class="custom-control-input" id="man" 
																					 <?
																					 if($dat_us['gender']==1){
																						 echo "checked";
																						 
																					 }
																					 ?>
																					 
																					 >
																					 <label class="custom-control-label" for="man"><font size='1' face='Arial'><strong>МУЖСКОЙ</strong></font></label>
																					 </div>
																				 </div>
																		</div>
															</div>


														</th>
														<th>

															<div class="col">
																		<div class="row">
																				<div class="col-md-3 mt-5">
																					<div class="custom-control custom-checkbox checkbox-primary">
																					 <input type="checkbox" name="women" value="1" class="custom-control-input" id="women"
																					 <?
																					 if($dat_us['gender']==2){
																						 echo "checked";
																						 
																					 }
																					 ?>
																					 >
																					 <label class="custom-control-label" for="women"><font size='1' face='Arial'><strong>ЖЕНСКИЙ</strong></font></label>
																					 </div>
																				 </div>
																		</div>
															</div>
														</th>





												


												</tr>

												<tr>
														<th><font size='1' face='Arial'><strong> ДОМ. АДРЕС:</strong></font></th>
														<th colspan='3' ><input class="form-control" type="text" name="adres" value="<?echo $dat_us['adres'];?>" /></th>
														
														<th>
															<div class="col">
																		<div class="row">
																				<div class="col-md-3 mt-5">
																					<div class="custom-control custom-checkbox checkbox-primary">
																					 <input type="checkbox" name="pmz" value="1" class="custom-control-input" id="pmz" 
																					 <?
																					 if($dat_us['do_p']==2){
																						 echo "checked";
																						 
																					 }
																					 ?>
																					 >
																					 <label class="custom-control-label" for="pmz"><font size='1' face='Arial'><strong>ПОМАЗ.</strong></font></label>
																					 </div>
																				 </div>
																		</div>
															</div>
														</th>
														<th>
															<div class="col">
																		<div class="row">
																				<div class="col-md-3 mt-5">
																					<div class="custom-control custom-checkbox checkbox-primary">
																					 <input type="checkbox" name="dro" value="1" class="custom-control-input" id="dro" 
																					  <?
																					 if($dat_us['do_p']==1){
																						 echo "checked";
																						 
																					 }
																					 ?>
																					 >
																					 <label class="custom-control-label" for="dro"><font size='1' face='Arial'><strong>"ДР.ОВЦА"</strong></font></label>
																					 </div>
																				 </div>
																		</div>
															</div>
														</th>
														
														
												</tr>




												<tr>
														<th><font size='1' face='Arial'><strong> ТЕЛЕФОН:</strong></font></th>
														<th colspan='3'><input class="form-control" type="text" name="tel1" value="<?echo $dat_us['tel1'];?>" /></th>
														
														<th>


															<div class="col">
																		<div class="row">
																				<div class="col-md-3 mt-5">
																					<div class="custom-control custom-checkbox checkbox-primary">
																					 <input type="checkbox" name="star" value="1" class="custom-control-input" id="star" 
																					 <?
																					 if($dat_us['st_sp']==2){
																						 echo "checked";
																						 
																					 }
																					 ?>
																					 >
																					 <label class="custom-control-label" for="star"><font size='1' face='Arial'><strong>СТАР.</strong></font></label>
																					 </div>
																				 </div>
																		</div>
															</div>


														</th>
														<th>

															<div class="col">
																		<div class="row">
																				<div class="col-md-3 mt-5">
																					<div class="custom-control custom-checkbox checkbox-primary">
																					 <input type="checkbox" name="sluj" value="1" class="custom-control-input" id="sluj"
																					 <?
																					 if($dat_us['st_sp']==1){
																						 echo "checked";
																						 
																					 }
																					 ?>
																					 >
																					 <label class="custom-control-label" for="sluj"><font size='1' face='Arial'><strong>СЛ.ПОМ</strong></font></label>
																					 </div>
																				 </div>
																		</div>
															</div>



														</th>






													

												</tr>

	<tr>
													<th><font size='1' face='Arial'><strong> ТЕЛЕФОН:</strong></font></th>
													<th colspan='3'><input class="form-control" type="text" name="tel2" value="<?echo $dat_us['tel2'];?>" /></th>
													<th>
														<div class="col">
																		<div class="row">
																				<div class="col-md-3 mt-5">
																					<div class="custom-control custom-checkbox checkbox-primary">
																					 <input type="checkbox" name="pioner" value="1" class="custom-control-input" id="pion"
																					 <?
																					 if($dat_us['pp_p']==2){
																						 echo "checked";
																						 
																					 }
																					 ?>
																					 
																					 >
																					 <label class="custom-control-label" for="pion"><font size='1' face='Arial'><strong>ПИОНЕР</strong></font></label>
																					 </div>
																				 </div>
																		</div>
															</div>




													</th>
														<th>


															




															
														</th>
													


	</tr>



												<tr>
													<th><font size='1' face='Arial'><strong> ДАТА РОЖДЕНИЯ:</strong></font></th>
													<th colspan='3'><input class="form-control" type="text" name="birthday" value="<?echo $dat_us['bday'];?>" /></th>
													






												</tr>

												<tr>
													<th><font size='1' face='Arial'><strong> ДАТА КРЕЩЕНИЯ:</strong></font></th>
													<th colspan='3'><input  class="form-control" type="text" name="botezbay" value="<?echo $dat_us['botez'];?>" /></th>
													
													

	</tr>


  <tr>
					
    <th colspan='5'></th>


    <th><center><button type='submit' class='btn btn-primary'>Сохранить</button></center></th>
</tr>
						</thead>
					</table>
				
			</div>
		</div>
	</div>
</div>
</form>

<form action=''  method='post' name='form1'>
<div class='card'>
	<div class='card-body pa-0'>
		<div class='table-wrap'>
			<div class='table-responsive'>
				<table class="table table-secondary table-bordered mb-0">
					<thead class="thead-secondary">
						<tr>
							<th><font size='1' face='Arial'><strong> СЛУЖ.ГОД</strong></font><font size='2' face='Arial'><strong> <?echo $year;?></strong></font></th>
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
$ref_arr=mysql_query("SELECT * FROM `tb_raport` WHERE `uid`='".$user."' and `year`='".$year."'");
$rap=mysql_fetch_array(mysql_query("SELECT `sep`,`oct`,`nov`,`dec`,`jan`,`feb`,`mart`,`aptil`,`mai`,`iumi`,`iul`,`aug` FROM `tb_raport` WHERE `uid`='".$user."' and `year`='".$year."'"));
$tm='';
$pb='';
$ib='';
$pp='';
$pv='';
	if(mysql_num_rows($ref_arr)=="0"){
echo("<tr> <th colspan='6' bgcolor='#FA8072'>Нет ниодного отчета</th></tr>");
}
else {
$i = 0;
$x=0;
	while($x++<12){
		
		
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
if($one[6]==0 or $one[6]==''){echo("<tr><th><a class='btn btn-sm btn-link'");if($one[7]==1){echo" style='color: red'";}echo(" href='report.html&sub=dedit&u=".$user."&m=".$i."&y=".$year."'>".$month[$i]."</a></th>");}
elseif($one[6]==1){echo("<tr bgcolor='#d1eaff' ><th ><a class='btn btn-sm btn-link' ");if($one[7]==1){echo" style='color: red'";}echo("href='report.html&sub=dedit&u=".$user."&m=".$i."&y=".$year."'>".$month[$i]."</a></th>");}
elseif($one[6]==2){echo("<tr bgcolor='#FFDEAD' ><th ><a class='btn btn-sm btn-link' ");if($one[7]==1){echo" style='color: red'";}echo("href='report.html&sub=dedit&u=".$user."&m=".$i."&y=".$year."'>".$month[$i]."</a></th>");}
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
	elseif ($key==6) {
		$pp_p= $value;
	}
	elseif ($key==7) {
		$deb= $value;
	}
	
	if($key==0 or $key==1 or $key==2 or $key==3 or $key==4){
		if($value==0 or $value==''){
			echo("<th><input type='text' name='".$i."|".$key."' value='' class='form-control' aria-label='Default' aria-describedby='inputGroup-sizing-default'></th>");
		}
		else{
			echo("<th><input type='text' name='".$i."|".$key."' value='".$value."' class='form-control' aria-label='Default' aria-describedby='inputGroup-sizing-default'></th>");
		}		
	}
	if($key==5){echo("<th><input type='text' name='".$i."|".$key."' value='".$value."' class='form-control' aria-label='Default' aria-describedby='inputGroup-sizing-default'>
							<input type='hidden' name='stat' value='".$pp_p."|".$deb."' >
	</th>");}
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
echo("<th>
<input type='hidden' name='te' value='1'>
<input type='hidden' name='y' value='".$year."'><button type='submit' class='btn btn-primary'>Сохранить</button></th>");
echo("</tr>");
}
?>

 </tbody>
																	 </table>
																 </div>
															 </div>
														 </div>
													 </div>
													 </form>


<form action=''  method='post' name='form1'>
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

$lyear=$year-1;
																																	
$ref_arr=mysql_query("SELECT * FROM `tb_raport` WHERE `uid`='".$user."' and `year`='".$lyear."'");
$rap=mysql_fetch_array(mysql_query("SELECT `sep`,`oct`,`nov`,`dec`,`jan`,`feb`,`mart`,`aptil`,`mai`,`iumi`,`iul`,`aug` FROM `tb_raport` WHERE `uid`='".$user."' and `year`='".$lyear."'"));
$tm='';
$pb='';
$ib='';
$pp='';
$pv='';
if(mysql_num_rows($ref_arr)=="0"){
echo("<tr> <th colspan='6' bgcolor='#FA8072'>Нет ниодного отчета</th></tr>");
}
else {
$i = 0;
$x=0;
	while($x++<12){
		
		
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
if($one[6]==0 or $one[6]==''){echo("<tr><th><a class='btn btn-sm btn-link'");if($one[7]==1){echo" style='color: red'";}echo(" href='report.html&sub=dedit&u=".$user."&m=".$i."&y=".$lyear."'>".$month[$i]."</a></th>");}
elseif($one[6]==1){echo("<tr bgcolor='#d1eaff' ><th ><a class='btn btn-sm btn-link' ");if($one[7]==1){echo" style='color: red'";}echo("href='report.html&sub=dedit&u=".$user."&m=".$i."&y=".$lyear."'>".$month[$i]."</a></th>");}
elseif($one[6]==2){echo("<tr bgcolor='#FFDEAD' ><th ><a class='btn btn-sm btn-link' ");if($one[7]==1){echo" style='color: red'";}echo("href='report.html&sub=dedit&u=".$user."&m=".$i."&y=".$lyear."'>".$month[$i]."</a></th>");}
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
		if($value==0 or $value==''){
			echo("<th><input type='text' name='".$i."|".$key."' value='' class='form-control' aria-label='Default' aria-describedby='inputGroup-sizing-default'></th>");
		}
		else{
			echo("<th><input type='text' name='".$i."|".$key."' value='".$value."' class='form-control' aria-label='Default' aria-describedby='inputGroup-sizing-default'></th>");
		}		
	}
	if($key==5){echo("<th><input type='text' name='".$i."|".$key."' value='".$value."' class='form-control' aria-label='Default' aria-describedby='inputGroup-sizing-default'></th>");}
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
echo("<th>
<input type='hidden' name='te' value='1'>
<input type='hidden' name='y' value='".$lyear."'>

<button type='submit' class='btn btn-primary'>Сохранить</button></th>");
echo("</tr>");
}
?>


													 												 </tbody>
													 																	 </table>
													 																 </div>
													 															 </div>
													 														 </div>
													 													 </div>
</form>
<?

}
else{
header("location: /index.html");
}
?>

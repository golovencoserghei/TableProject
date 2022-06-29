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

	$user = dateprotect($get_array['u']);
	$get_month = dateprotect($get_array['m']);
	$year = dateprotect($get_array['y']);
	
	$month = dateprotect($post_array['mn']);
	
	
	$dateid = dateprotect($get_array['did']);
	$userid = dateprotect($get_array['uid']);
	$fixdid = dateprotect($get_array['fid']);
	$getpag = dateprotect($get_array['pag']);
	
	
	
	$post_debt = dateprotect($post_array['debt']);
	

	$post_t = dateprotect($post_array['t']);
	$post_p = dateprotect($post_array['p']);
    $post_i = dateprotect($post_array['i']);
    $post_pp = dateprotect($post_array['pp']);
    $post_pv = dateprotect($post_array['pv']);
    $post_info = dateprotect($post_array['info']);
	$post_pioner = dateprotect($post_array['pioner']);
	
	
if (count($post_array) != 0){

			if($post_t == ""){
				msg($mes_t_intm,"wr");
			}
			elseif (!preg_match("/^[0-9]*[.,]?[0-9]+$/",$post_t)){
				msg($mes_t_intm,"wr");
			}
	else{

	if($post_p==""){$post_p=0;}
	if($post_i==""){$post_i=0;}
	if($post_pp==""){$post_pp=0;}
	if($post_pv==""){$post_pv=0;}
	




	
	
	
	
	
			if ($post_pioner == 2){
				$s='2';
				 $err='Пионер';
					msg($err,"ok");
			}
			if ($post_pioner == 1){
				$s='1';
				$err="Подсобный Пионер";
					msg($err,"ok");
			}
			if ($post_pioner == ''){
				$s='0';
				$err="Возвещатель	";
					msg($err,"ok");
			}
			if($post_debt==''){
				$d=0;
			}
			elseif($post_debt=='1'){
				$d=1;
			}
	

$rap_date=$post_p.'|'.$post_pv.'|'.$post_t.'|'.$post_pp.'|'.$post_i.'|'.$post_info.'|'.$s.'|'.$d;
if($month==4){
	$insert=mysql_query("UPDATE `tb_raport` SET `jan`='".$rap_date."' WHERE `uid`='".$user."' and `year`='".$year."'");
}


elseif($month==5){
	$insert=mysql_query("UPDATE `tb_raport` SET `feb`='".$rap_date."' WHERE `uid`='".$user."' and `year`='".$year."'");
}


elseif($month==6){
	$insert=mysql_query("UPDATE `tb_raport` SET `mart`='".$rap_date."' WHERE `uid`='".$user."' and `year`='".$year."'");
}


elseif($month==7){
	$insert=mysql_query("UPDATE `tb_raport` SET `aptil`='".$rap_date."' WHERE `uid`='".$user."' and `year`='".$year."'");
}


elseif($month==8){
	$insert=mysql_query("UPDATE `tb_raport` SET `mai`='".$rap_date."' WHERE `uid`='".$user."' and `year`='".$year."'");
}

elseif($month==9){
	$insert=mysql_query("UPDATE `tb_raport` SET `iumi`='".$rap_date."' WHERE `uid`='".$user."' and `year`='".$year."'");
		
}

elseif($month==10){
	$insert=mysql_query("UPDATE `tb_raport` SET `iul`='".$rap_date."' WHERE `uid`='".$user."' and `year`='".$year."'");
				
}

elseif($month==11){
	$insert=mysql_query("UPDATE `tb_raport` SET `aug`='".$rap_date."' WHERE `uid`='".$user."' and `year`='".$year."'");
}


elseif($month==0){
	$insert=mysql_query("UPDATE `tb_raport` SET `sep`='".$rap_date."' WHERE `uid`='".$user."' and `year`='".$year."'");			
}

elseif($month==1){
	$insert=mysql_query("UPDATE `tb_raport` SET `oct`='".$rap_date."' WHERE `uid`='".$user."' and `year`='".$year."'");
}


elseif($month==2){
	$insert=mysql_query("UPDATE `tb_raport` SET `nov`='".$rap_date."' WHERE `uid`='".$user."' and `year`='".$year."'");
}

elseif($month==3){
	$insert=mysql_query("UPDATE `tb_raport` SET `dec`='".$rap_date."' WHERE `uid`='".$user."' and `year`='".$year."'");
}


else{
msg("Ошибка данных!!!","err");
}
header("location: /report.html&sub=mbe&u=".$user."");


	}
}
	
	
	$dat_us=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='$user'"));
	
	$rap=mysql_fetch_array(mysql_query("SELECT `sep`,`oct`,`nov`,`dec`,`jan`,`feb`,`mart`,`aptil`,`mai`,`iumi`,`iul`,`aug` FROM `tb_raport` WHERE `uid`='".$user."' and `year`='".$year."'"));
	$one=explode("|",$rap[$get_month]);

?>

<a class="btn btn-violet" href='report.html&sub=mbe&u=<?echo $user;?>'><< Назад</a>

<div class='d-flex align-items-center justify-content-between mt-40 mb-20'>
				<h4> <? echo $dat_us[name].' (изменить очет за '.get_month($get_month).')'; ?> </h4>

			</div>
			 <form action=''  method='post' name='form1'>
			<div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                             <div class="row">
                                <div class="col-sm">
                                    <div class="row">
                                        <div class="col-md-3">
                                            
											
                                        </div>
                                        <div class="col-md-5">
									
	
	
	
									
                                                <input type='hidden' name='p' value='<? if ($one[0]!=0) echo $one[0]; ?>' class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                          
                                                <input type='hidden' name='pv' value='<? if ($one[1]!=0) echo $one[1]; ?>' class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                           
                                                <input type='hidden' name='t' value='<? if ($one[2]!=0) echo $one[2]; else { echo '0'; }?>'>
                                          
                                                <input type='hidden' name='pp' value='<? if ($one[3]!=0) echo $one[3]; ?>' >
                                            
                                                <input type='hidden' name='i' value='<? if ($one[4]!=0) echo $one[4]; ?>' >
                                            
                                                <input type='hidden' name='info' value='<? echo $one[5]; ?>' >
                                            
										
										<div class="form-group">
                                           <div class="custom-control custom-checkbox">
                                                <input name="debt" value="1" type="checkbox" class="custom-control-input" id="customCheck1" <? if ($one[7]==1) { echo "checked";} ?> >
                                                <label class="custom-control-label" for="customCheck1">Задолжность по отчету</label>
                                            </div>
                                        </div>
										
										
										<div class="form-group">
                                           <div class="custom-control custom-checkbox">
                                                <input name="pioner" value="1" type="checkbox" class="custom-control-input" id="customCheck2" <? if ($one[6]==1) { echo "checked";} ?>>
                                                <label class="custom-control-label" for="customCheck2">Подсобный Пионер</label>
                                            </div>
                                        </div>
										<div class="form-group">
                                           <div class="custom-control custom-checkbox">
                                                <input name="pioner" value="2" type="checkbox" class="custom-control-input" id="customCheck3" <? if ($one[6]==2) { echo "checked";} ?>>
                                                <label class="custom-control-label" for="customCheck3">Пионер</label>
                                            </div>
                                        </div>
										 
										 <input type='hidden' name='mn' value='<? echo $get_month; ?>'>
										
										<button type='submit' class='btn btn-primary'>Изменить Отчет</button>
										
                                        </div>
										<div class="col-md-3">
                                            
											
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </section>
						 </div>
                            </div>
			
			</form>

<?php

if(!defined("AP")) exit("Доступ к файлу напрямую запрещен!");

if(auth===FALSE)
{
	
	header("location: /login.html");
}

if( $user_arr['group']==6 or $user_arr[4]==4 or $user_arr['group']==9 ){
		

	
	
    require_once("template/head.php");

	$tbid=$_COOKIE['tbl'];
	$pkey=$_COOKIE['prt'];
	$cy=$_COOKIE['y'];
	$selprf=mysql_fetch_array(mysql_query("SELECT `pref` FROM `tb_congr` WHERE `id`='$tbid'"));
	$select_table="tb_stend_".$selprf[0];

	//$pref=mysql_fetch_array(mysql_query("SELECT `pref` FROM `tb_congr` WHERE `uid`='".$user_arr[6]."'"));
	//$select_table="tb_stend_".$pref[0]."";
	
    $getm = dateprotect($get_array['m']);
    $year = dateprotect($get_array['y']);
    $tywik = dateprotect($get_array['w']);
    $tywwik = dateprotect($get_array['ww']);




    $post_vis = dateprotect($post_array['vis']);
	$post_date = dateprotect($post_array['date']);
    $post_mn = dateprotect($post_array['mn']);
	$post_wk = dateprotect($post_array['wk']);
	$post_wwk = dateprotect($post_array['wwk']);
	$post_yer = dateprotect($post_array['y']);
	

	
			
	// $rap_dat=mysql_fetch_array(mysql_query("SELECT * FROM `cfg_congr`  WHERE `cgr`='21'"));	//получаем номер месяца и год для отчетов
	// $getbase=mt_base($getm);																//по месяцу определяем какая база ужна нам
    // $rap_bd=$getbase.'_'.substr($year,2,2);													//добавляем префикс для получения доступа к нужной таблицы отчетов
	// $one=explode("|",$one[$d]);
	// $user_vinf=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$user."'"));
	
	// echo ($rap_bd);
	
	
    $mn=date("n");  
	$dy=date("j");
	$ldr=0; // последний день когда можно сдать отчет 
		$err="Вы уже отправляли ваш отчет.";
		$er="Пожалуйста Заполните правильно ваш отчет. необходимо вводить только цыфры.";
		$et="Пожалуйста Заполнте время.";
		$mgt="Спасибо, новый отчет успешно отправлен.";
		$mgtup="Спасибо, новый отчет успешно Обновлен.";
		$mglast="Отчет не может быть отправлен. Пожалуйста отправляйте ваш отчет с 30 до 10 числа месяца ";


if (count($post_array) != 0){

		
	if($post_wk!=''){
		
		
	if($post_date=='' and $post_vis==''){
			$up_inf='';
		}
		else{
			$up_inf=$post_date."|".$post_vis;
		}
		
		
	msg($up_inf.'+'.$post_mn.'+'.$post_yer,"good");
	$activ=mysql_query("UPDATE `cg_visit` SET `".$post_wk."`='".$up_inf."' WHERE `mn`='".$post_mn."' AND `yer`='".$post_yer."' AND `cgr`='".$user_arr['rid']."'");
	header("location: /visit.html");
	}
	
}
















$inf_rap=mysql_fetch_array(mysql_query("SELECT * FROM `cg_visit` WHERE `cgr`='21' AND `yer`='2020' AND `mn`='".$getm."' "));
if($tywik!=''){

$vi_w=explode("|",$inf_rap[$tywik]);
}
?>


<a class="btn btn-violet" href='visit.html'> << Назад</a> 

<div class='d-flex align-items-center justify-content-between mt-40 mb-20'>
				<h4>отчет</h4>

			</div>


  
  
  
  <form action=''  method='post'>
  <div class="row">
										
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                             <div class="row">
                                <div class="col-sm">
                                    <div class="row">
                                        <div class="col-md-4 ml-3">
										
										
										
										
                                        </div>
										
                                        <div class="col-md-5">
										
										<div class="form-group">
										
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                     <span class="input-group-text" id="inputGroup-sizing-default">Дата</span>
                                                </div>
												
												<input type="text" name="date" class="form-control"  value="<? echo $vi_w[0]; ?>">
                                               
                                            </div>
                                        </div>
									
	
	
	
										<div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Количество человек&emsp;&ensp;&emsp;</span>
                                                </div>
                                                <input type="number" name='vis' class="form-control"  value='<? echo $vi_w[1];?>' placeholder="0" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>

										<input type='hidden' name='y' value='2020'>
										<input type='hidden' name='mn' value='<? echo $getm; ?>'>
										<input type='hidden' name='wk' value='<? echo $tywik; ?>'>
										<input type='hidden' name='wwk' value='<? echo $tywwik; ?>'>
										
										<button type='submit' class='btn btn-primary'>Обновить информацию</button>
										
                                        </div>
										
										<div class="col-md-4">
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </section>
		</div>
	
</div>
	</form>




<?
}
else {
	header("location: /report.html&sub=rp");
	
}

?>

<?php

if(!defined("AP")) exit("Доступ к файлу напрямую запрещен!");

if(auth===FALSE)
{
	
	header("location: /login.html");
}

if( $user_arr['rid']!=21){
		header("location: /index.html");
	}
	
	
    require_once("template/head.php");

	$tbid=$_COOKIE['tbl'];
	$pkey=$_COOKIE['prt'];
	$selprf=mysql_fetch_array(mysql_query("SELECT `pref` FROM `tb_congr` WHERE `id`='$tbid'"));
	$select_table="tb_stend_".$selprf[0];

	//$pref=mysql_fetch_array(mysql_query("SELECT `pref` FROM `tb_congr` WHERE `uid`='".$user_arr[6]."'"));
	//$select_table="tb_stend_".$pref[0]."";

    $time = dateprotect($get_array['ti']);
	$timeid = dateprotect($get_array['tid']);
    $dateid = dateprotect($get_array['did']);
    $userid = dateprotect($get_array['uid']);
    $fixdid = dateprotect($get_array['fid']);
    $getpag = dateprotect($get_array['pag']);


    $post_t = dateprotect($post_array['t']);
	$post_p = dateprotect($post_array['p']);
    $post_i = dateprotect($post_array['i']);
    $post_pp = dateprotect($post_array['pp']);
    $post_pv = dateprotect($post_array['pv']);
    $post_mn = dateprotect($post_array['mn']);
    $post_info = dateprotect($post_array['info']);




	
	$rap_year=mysql_fetch_array(mysql_query("SELECT * FROM `st_config`  WHERE `key`='report_year'"));
	$rp_ye=explode("|",$rap_year['param']);
	$year=$rp_ye[0];
			
	$rap_dat=mysql_fetch_array(mysql_query("SELECT * FROM `cfg_congr`  WHERE `cgr`='21'"));	//получаем номер месяца и год для отчетов
	$getbase=mt_base($rap_dat['mrap']);														//по месяцу определяем какая база ужна нам
    $rap_bd=$getbase.'_'.$rap_dat['rap_year'];												//добавляем префикс для получения доступа к нужной таблицы отчетов
	
	
	//echo ($rap_bd);
	
	
    $mn=date("n");  
	$dy=date("j");
	$ldr=0; // последний день когда можно сдать отчет 
		$err="Вы уже отправляли ваш отчет.";
		$er="Пожалуйста Заполните правильно ваш отчет. Публикации, видео, часы, повторные посящения, изучения библии в эти поля необходимо вводить только цыфры.";
		$et="Пожалуйста Заполнте время.";
		$mgt="Спасибо, новый отчет успешно отправлен.";
		$mglast="Отчет не может быть отправлен. Пожалуйста отправляйте ваш отчет с 30 до 10 числа месяца ";


if (count($post_array) != 0){

			if($post_t == 0 or $post_t == ""){
				msg($er,"wr");
			}
			elseif (!preg_match("/^[0-9]*[.,]?[0-9]+$/",$post_t)){
				msg($et,"wr");
			}



else{

	if($post_p==""){$post_p=0;}
	if($post_i==""){$post_i=0;}
	if($post_pp==""){$post_pp=0;}
	if($post_pv==""){$post_pv=0;}
	$rap_date=$post_p.'|'.$post_pv.'|'.$post_t.'|'.$post_pp.'|'.$post_i.'|'.$post_info.'|'.$user_arr['pp_p'].'|0';
//echo $rap_date;
//echo $user_arr[0];

if($cfg_cgr[0] == 1){ //определяем  можно ли сдать отчет 
			
	$rap=mysql_query("SELECT * FROM `".$rap_bd."` WHERE `uid`='".$user_arr[0]."'");
	$grp=mysql_fetch_array(mysql_query("SELECT * FROM `tb_group` WHERE `uid`='".$user_arr[0]."'"));
	$pgrp=mysql_fetch_array(mysql_query("SELECT * FROM `tb_group` WHERE `gid`='".$grp['gid']."' and `prim`='".$grp['gid']."'"));
	$num_us=mysql_num_rows($rap);
	
	if($num_us==1){
		
	$activ=mysql_query("UPDATE `".$rap_bd."` SET 	`tm`='".$post_t."',
													`pb`='".$post_p."',
													`vd`='".$post_pv."',
													`pp`='".$post_pp."',
													`inf`='".$post_info."',
													`iz`='".$post_i."',
													`pgrid`='".$pgrp['uid']."'	WHERE `uid`='".$user_arr[0]."'");
													
	}
	else{
	$insert=mysql_query("INSERT INTO `".$rap_bd."` VALUES (NULL,
															'0',
															'".$user_arr[0]."',
															'".$user_arr['rid']."',
															'0',
															'".$user_arr['pp_p']."',
															'".$post_t."',
															'".$post_p."',
															'".$post_pv."',
															'".$post_pp."',
															'".$post_i."',
															'".$post_info."',
															'".$user_arr['name']."',
															'".$grp['gid']."',
															'".$pgrp['uid']."'
															)");
	msg($mgt,"good");
	
	}



}
else{
msg($mglast,"wr");
}








}


  }



?>
<div class='d-flex align-items-center justify-content-between mt-40 mb-20'>
				<h4>Мой отчет</h4>

			</div>


  
  
  
  <form action=''  method='post'>
  <div class="row">
										
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                             <div class="row">
                                <div class="col-sm">
                                    <div class="row">
                                        <div class="col-md-4">
                                        </div>
										
                                        <div class="col-md-5">
										
										<div class="form-group">
										
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                     <span class="input-group-text" id="inputGroup-sizing-default">Месяц</span>
                                                </div>
												
												<input type="text" class="form-control"  value="<? echo nmonth($congr_cfg['mrap']);?>" readonly>
                                                <input type='hidden' name='mn' value='<? echo $congr_cfg['mrap'];?>' >
                                            </div>
                                        </div>
									
	
	
	
										<div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Публ. (печ./элек.)&emsp;&ensp;&emsp;</span>
                                                </div>
                                                <input type="number" name='p' class="form-control" placeholder="0" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
										
										
										
										<div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Показы видео &emsp;&emsp; &ensp;&emsp;</span>
                                                </div>
                                                <input type="number" name='pv' class="form-control" placeholder="0" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
										
										
										<div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Часы &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</span>
                                                </div>
                                                <input oninput="up(this)" id="stime" type="text" name='t' class="form-control" placeholder="0" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Повторные посещения</span>
                                                </div>
                                                <input type="number" name='pp' class="form-control" placeholder="0" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Изучения Библии &emsp; &emsp;</span>
                                                </div>
                                                <input type="number" name='i' class="form-control" placeholder="0" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Заметки:</span>
                                                </div>
                                                <input type="text" name='info' class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
										
										
										
<script>
document.getElementById('stime').onkeydown = function (e) {
  if (e.currentTarget.value.indexOf(".") != '-1' || e.currentTarget.value.indexOf(",") != '-1') { 
    return !(/[.,]/.test(e.key));
  }
    return !(/^[А-Яа-яA-Za-z ]$/.test(e.key));  // IE > 9
}
function up(e) {
  if (e.value.indexOf(".") != '-1') {
    e.value=e.value.substring(0, e.value.indexOf(".") + 3);
  }
}
</script>
										
										
										
									
					<button type='submit' class='btn btn-primary'>Отправить Отчет</button>
										
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



<div class='d-flex align-items-center justify-content-between mt-40 mb-20'>
				<h4>История моих отчетов за <? echo $year; ?> служебный года</h4>

			</div>
			<div class='card'>



				<div class='card-body pa-0'>
					<div class='table-wrap'>
						<div class='table-responsive'>




								 <table class="table table-secondary table-bordered mb-0">
									 <thead class="thead-secondary">
												<tr>
														<th class='not-sortable'>Месяц</th>
														<th class='not-sortable'>Пуб.</th>
														<th class='not-sortable'>Видео</th>
														<th class='not-sortable'>Часы</th>
														<th class='not-sortable'>Пов. П</th>
														<th class='not-sortable'>Изуч. Б</th>
														<th class='not-sortable'>Заметки</th>






												</tr>
										</thead>
										<tbody>

<?	
$pb=0;
	$vd=0;
	$tm=0;
	$pp=0;
	$iz=0;	

	$user=$user_arr['id'];																					
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
	
	
	echo("<tr><th>".$tex_mnt."</th>");
	
	if ($rap_sp['pb']==0){
		echo("<th></th>");
	}
	else{
		$pb+=$rap_sp['pb'];
		echo("<th>".$rap_sp['pb']."</th>");
	}
	if ($rap_sp['vd']==0){
		echo("<th></th>");
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






+6<?php

if(!defined("AP")) exit("Доступ к файлу напрямую запрещен!");

if(auth===FALSE)
{
	header("location: /login.html");
}

if($user_arr[4]==3 or $user_arr[4]==4 or $user_arr[4]==9 )
{

    require_once("template/head.php");

	$tbid=$_COOKIE['tbl'];
	$pkey=$_COOKIE['prt'];
	$selprf=mysql_fetch_array(mysql_query("SELECT `pref` FROM `tb_congr` WHERE `id`='$tbid'"));
	$select_table="tb_stend_".$selprf[0];

	//$pref=mysql_fetch_array(mysql_query("SELECT `pref` FROM `tb_congr` WHERE `uid`='".$user_arr[6]."'"));
	//$select_table="tb_stend_".$pref[0]."";

    $mn = dateprotect($get_array['mn']);
    $y = dateprotect($get_array['y']);
	$timeid = dateprotect($get_array['tid']);
	$auid = dateprotect($get_array['i']);
    $dateid = dateprotect($get_array['did']);
    $userid = dateprotect($get_array['uid']);
    $fixdid = dateprotect($get_array['fid']);
    $getpag = dateprotect($get_array['pag']);


    $post_time = dateprotect($post_array['t']);
	$post_timeid = dateprotect($post_array['p']);
    $post_dateid = dateprotect($post_array['i']);
    $post_userid = dateprotect($post_array['pp']);
    $post_fixdid = dateprotect($post_array['pv']); 
	
	$rap_year=mysql_fetch_array(mysql_query("SELECT * FROM `st_config`  WHERE `key`='report_year'"));
	$rp_ye=explode("|",$rap_year['param']);
		  
	

		
		$rap_year=mysql_fetch_array(mysql_query("SELECT * FROM `st_config`  WHERE `key`='report_year'"));
		$rp_ye=explode("|",$rap_year['param']);
		if($y==''){
			if($_COOKIE['y']==''){
				setcookie("y", $year);
			}
			else{
				$year=$_COOKIE['y'];
			}
		}
		else{
			$year=$y;
			setcookie("y", $year);
		}


if($get_array['t']=='activ'){
				
				$activ=mysql_query("UPDATE `users` SET `group`='1' WHERE `id`='".$auid."'");
				header("location: /report.html&sub=congr");
				
			}
	
if($get_array['save'] != 0){
	$select_user=mysql_query("SELECT * FROM `users` WHERE `id`='".$get_array['uid']."' and `rid`='".$user_arr['rid']."'");
	$num_us=mysql_num_rows($select_user);
	if($num_us==1){
		
		$prof=mysql_fetch_array($select_user);
	}
	else{ 
	header("location: /member.html");
	}
    
}	
			
			
			
if (count($get_array['ct']) != 0){ 


   $get_for_user=mysql_query("SELECT * FROM `users` WHERE `rid`='".$user_arr[6]."'");
   $numrow=mysql_num_rows($get_for_user);
   echo 'количество обрабатывемых запросов'.$numrow;
   
   

   while($row=mysql_fetch_array($get_for_user))
        {
			$year=date("Y");
			$lyear=$year+1;
			$param=$lyear.'|'.$year;
			$rap_num=mysql_query("SELECT * FROM `tb_raport`  WHERE `uid`='".$row[0]."' and `year`='".$lyear."'");
			$numrow=mysql_num_rows($rap_num);
			
			if($numrow==0){
			$add_raport=mysql_query("INSERT INTO `tb_raport`  VALUES (NULL,'".$row[0]."','".$row[6]."',
																	'0|0|0|0|0||0|0','0|0|0|0|0||0|0','0|0|0|0|0||0|0','0|0|0|0|0||0|0','0|0|0|0|0||0|0','0|0|0|0|0||0|0',
																	'0|0|0|0|0||0|0','0|0|0|0|0||0|0','0|0|0|0|0||0|0','0|0|0|0|0||0|0','0|0|0|0|0||0|0','0|0|0|0|0||0|0','".$lyear."','0')");
			}

        }
	$insert=mysql_query("UPDATE `st_config` SET `param`='".$param."' WHERE `key`='report_year'");
      
}


if ($mn == 0 ){												//проверяем был ли указан месяц церез GET
													
															//если не указан то устанавливаем прошлый месяц
		
		if(date("n")==1){									//если месяц 1 (январь) то мы указываем что прошлый месц долен быть 12 (декабрь)
			$mn=12;
		}
		else{												//если был указан людой другой масяц отнимаем один чтобы ободражать пролый месяц
			
			$mn=date("n")-1;
		}
	
		
}

?>



<div class='d-flex align-items-center justify-content-between mt-50 mb-20'>
				<h4>Отчет за <? if ($mn == '')echo t_month();
								else echo nmonth($mn);
								
								
								echo ' '.$year.' года';
								?></h4>

			</div>



			
            <a class="btn btn-sm btn-link" href='report.html&sub=history&y=<? echo $year; ?>'>История</a>
            <a class="btn btn-sm btn-link" href='report.html&sub=rp'>Актуальный Месяц</a>
            <a class="btn btn-sm btn-link" href='report.html&sub=rp&mn=9'>Сентябрь</a>
            <a class="btn btn-sm btn-link" href='report.html&sub=rp&mn=10'>Октябрь</a>
            <a class="btn btn-sm btn-link" href='report.html&sub=rp&mn=11'>Ноябрь</a>
            <a class="btn btn-sm btn-link" href='report.html&sub=rp&mn=12'>Декабрь</a>
			<a class="btn btn-sm btn-link" href='report.html&sub=rp&mn=1'>Январь</a>
            <a class="btn btn-sm btn-link" href='report.html&sub=rp&mn=2'>Февраль</a>
            <a class="btn btn-sm btn-link" href='report.html&sub=rp&mn=3'>Март</a>
            <a class="btn btn-sm btn-link" href='report.html&sub=rp&mn=4'>Апрель</a>
            <a class="btn btn-sm btn-link" href='report.html&sub=rp&mn=5'>Май</a>
            <a class="btn btn-sm btn-link" href='report.html&sub=rp&mn=6'>Июнь</a>
            <a class="btn btn-sm btn-link" href='report.html&sub=rp&mn=7'>Июль</a>
            <a class="btn btn-sm btn-link" href='report.html&sub=rp&mn=8'>Август</a>
			<a class="btn btn-sm btn-link" href='report.html&sub=rp&y=<? echo $rp_ye[0]; ?>'><? echo $rp_ye[0]; ?></a>
			<a class="btn btn-sm btn-link" href='report.html&sub=rp&y=<? echo $rp_ye[1]; ?>'><? echo $rp_ye[1]; ?></a>
                           
                            
                                    
									
<?



$cmn = date("n");
$ye = date("Y");
$activ=0;


if($year == $rp_ye[0] and $cmn >= 9 ){
	$activ=1;
}



	
	
	

	
	



?>		








			<div class='card'>



				<div class='card-body pa-0'>
					<div class='table-wrap'>
						<div class='table-responsive'>




		<table class="table table-secondary table-bordered mb-0">
					<thead class="thead-secondary">

							<tr>
                            <th class='not-sortable'>№</th>
							
							<th class='not-sortable'>Возвещатели</th>
                            <th class='not-sortable'>Пуб.</th>
                            <th class='not-sortable'>Видео</th>
							<th class='not-sortable'>Часы</th>
							<th class='not-sortable'>Пов П</th>
							<th class='not-sortable'>Изуч.Б</th>
                            <th class='not-sortable'>Примечания</th>
							</tr>
					</thead>
					<tbody>

<?



$tm=0;
$pb=0;
$vd=0;
$pp=0;
$iz=0;


$ptm=0;
$ppb=0;
$pvd=0;
$ppp=0;
$piz=0;


$otm=0;
$opb=0;
$ovd=0;
$opp=0;
$oiz=0;


$tvz=0;
$tpp=0;
$top=0;
$tot=0;





$i=1;
$n=1;





	$ref_arr=mysql_query("SELECT * FROM `tb_group` WHERE `cgr`='".$user_arr[6]."' ORDER BY `prim` ASC");	// получаем весь список возвещателей и групп собрания.
	$rap_table=mt_base($mn).'_'.substr($year,2,2);			// формируем название таблицы отчета  rp(пефикс для таблицы отчета)_jan(три буквы месяца)_20(две последнии цифры года).
	while($roww=mysql_fetch_array($ref_arr)){				// начинаем перебо всего списка.			
		if($roww['prim']!=0){								// определяем ответственого группы так как только у него должен присутствовать id его гуппы в параметре 'prim'.
			
			$one=mysql_fetch_array(mysql_query("SELECT * FROM `".$rap_table."` WHERE `uid`='".$roww['uid']."' "));
			$row=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$roww['uid']."' "));
					
                    
                   if($roww['gid']!=1){
					   
					echo "<tr><th colspan='8' bgcolor='#D2B48C'></th></tr>";
					
					}
					echo("<tr>");
						 
                        if($one['tm']==0){					// проверяем еслии отчет был сдан. Проверку производим про присутствию внесеных часов в отчет.
                          echo("<th>"); 
                         }
                         else{
                           echo("<th bgcolor='#00FF7F'>");	// если поле часов заполнено подсвечиваем ячейку нумирация списка зеленым на против имени возвещаетля.
                         }
                         echo("".$i."</th>");				// нумираця списка возвещателей
						 
						 //echo("<th bgcolor='#d1eaff'>".$n."<th>");
						 
						 
                    if($one['pp_op']==1){					// проверяем, подсобный пионер?
                         echo("<th bgcolor='#d1eaff'>");	// подсвечиваем 
                          }
                    elseif($one['pp_op']==2){				// проверяем, общий пионер?
                        echo("<th bgcolor='#FFDEAD'>"); 	// подсвечиваем
                             }
					else{ 
                          echo("<th>");
                        }
						echo("<a class='btn btn-sm btn-link' ");
						
						
						if($one['r_type']==5){ 				//если тип отчета равер 5 значит за прошлый месяц отчет не сдан
							
							echo"style='color: red'";
						}
						echo("
						href='report.html&sub=cart&u=".$row[0]."'>".$row[8]." (Группа №".$roww['gid'].")</a>"); if($permis[7]==1){ echo(" <a  href='report.html&sub=vred&u=".$row[0]."&m=".$mn."&y=".$year."'><span style='color: green;'><i class='fa fa-pencil'></i></span></a>"); } echo("</th>");
						
						

// подсчет общих значений 
//===============
//	$one['pp_op'] может обладать тремя параметрами
//	0- возвещатель
//	1- подсобный пионер
//	2- общий пионер
//	
//	все сумирование происходит по отному и тому же принциму

//подсчет времени
if ($one['tm']!=0){						//проверяем заполнена ли ячейка для времени

	if ($one['pp_op']==0){				//проверяем если возвещатель.
	$tm = $tm + $one['tm'];				//прибовляем его время к общей сумме для возвещателей.
	$tvz++;
	}
	
	elseif ($one['pp_op']==1){			//проверяем если подсобный пионер.
	$ptm= $ptm + $one['tm'];			//прибовляем его время к общей сумме для подсобных пионеров.
	$tpp++;
	}
	
	elseif ($one['pp_op']==2){			//проверяем если общий пионер.
    $otm = $otm + $one['tm'];			//прибовляем его время к общей сумме для общий пионер.
	$top++;
	}
	$trp++;
}
//**************************

//подчет публикаций(коментарии такойже как и для времени)
if ($one['pb']!=0) {					
 
	if ($one['pp_op']==0){
	$pb= $pb + $one['pb'];
	}
	
	elseif ($one['pp_op']==1){
    $ppb= $ppb + $one['pb'];
	}
	
	elseif ($one['pp_op']==2){
    $opb = $opb + $one['pb'];
	}

}
//**************************


//подчет видео(коментарии такойже как и для времени)
if ($one['vd']!=0) {
  
	if ($one['pp_op']==0){
    $vd= $vd + $one['vd'];
		
	}
	elseif ($one['pp_op']==1){
    $pvd= $pvd + $one['vd'];
		
	}
	elseif ($one['pp_op']==2){
    $ovd = $ovd + $one['vd'];
	}
}

//*************************

//подчет повторные посящения(коментарии такойже как и для времени)
if ($one['pp']!=0) {
  
	if ($one['pp_op']==0){
    $pp= $pp + $one['pp'];
		
	}
	elseif ($one['pp_op']==1){
    $ppp= $ppp + $one['pp'];
		
	}
	elseif ($one['pp_op']==2){
    $opp = $opp + $one['pp'];
	}
}

//*************************

//подчет изучения библии(коментарии такойже как и для времени)
if ($one['iz']!=0) {
  
	if ($one['pp_op']==0){
    $iz= $iz + $one['iz'];
		
	}
	elseif ($one['pp_op']==1){
    $piz= $piz + $one['iz'];
		
	}
	elseif ($one['pp_op']==2){
    $oiz = $oiz + $one['iz'];
	}
}
//*************************


//Заполняем ячейки отчет возвещателя


if ($one['pp_op']==2){
	echo("<th bgcolor='#FFDEAD'>");
	
	if ($one['pb']!=0) {
		echo $one['pb'];
	}
	echo("</th>");
}
elseif ($one['pp_op']==1){
	echo("<th bgcolor='#d1eaff'>");
	
	if ($one['pb']!=0) {
		echo $one['pb'];
	}
	echo("</th>");
}
elseif($one['pp_op']==0){
	echo("<th>");
	
	if ($one['pb']!=0 ) {
		echo $one['pb'];
	}
	echo("</th>");
}




if ($one['pp_op']==2){
	echo("<th bgcolor='#FFDEAD'>");
	
	if ($one['vd']!=0) {
		echo $one['vd'];
	}
	echo("</th>");
}
elseif ($one['pp_op']==1){
	echo("<th bgcolor='#d1eaff'>");
	
	if ($one['vd']!=0) {
		echo $one['vd'];
	}
	echo("</th>");
}
elseif($one['pp_op']==0){
	echo("<th>");
	
	if ($one['vd']!=0) {
		echo $one['vd'];
	}
	echo("</th>");
}


$tm_sep=explode(".",$one['tm']); // ращделенное время 
if($tm_sep[0]==0 and $tm_sep[1]>0){
	$one['tm']=$one['tm'];
}

if($tm_sep[0]>0 and $tm_sep[1]==0){
	$one['tm']=$tm_sep[0];
}




if ($one['pp_op']==2){
	echo("<th bgcolor='#FFDEAD'>");
	
	if ($one['tm']!=0) {
		echo $one['tm'];
	}
	echo("</th>");
}
elseif ($one['pp_op']==1){
	echo("<th bgcolor='#d1eaff'>");
	
	if ($one['tm']!=0) {
		echo $one['tm'];
	}
	echo("</th>");
}
elseif($one['pp_op']==0){
	echo("<th>");
	
	if ($one['tm']!=0) {
		echo $one['tm'];
	}
	echo("</th>");
}




if ($one['pp_op']==2){
	echo("<th bgcolor='#FFDEAD'>");
	
	if ($one['pp']!=0) {
		echo $one['pp'];
	}
	echo("</th>");
}
elseif ($one['pp_op']==1){
	echo("<th bgcolor='#d1eaff'>");
	
	if ($one['pp']!=0) {
		echo $one['pp'];
	}
	echo("</th>");
}
elseif($one['pp_op']==0){
	echo("<th>");
	
	if ($one['pp']!=0) {
		echo $one['pp'];
	}
	echo("</th>");
}




if ($one['pp_op']==2){
	echo("<th bgcolor='#FFDEAD'>");
	
	if ($one['iz']!=0) {
		echo $one['iz'];
	}
	echo("</th>");
}
elseif ($one['pp_op']==1){
	echo("<th bgcolor='#d1eaff'>");
	
	if ($one['iz']!=0) {
		echo $one['iz'];
	}
	echo("</th>");
}
elseif($one['pp_op']==0){
	echo("<th>");
	
	if ($one['iz']!=0) {
		echo $one['iz'];
	}
	echo("</th>");
}


if ($one['pp_op']==2){
	echo("<th bgcolor='#FFDEAD'>");
	
	if ($one['inf']!=0 or $one['inf']!= '') {
		echo $one['inf'];
	}
	echo("</th>");
}
elseif ($one['pp_op']==1){
	echo("<th bgcolor='#d1eaff'>");
	
	if ($one['inf']!=0 or $one['inf']!= '') {
		echo $one['inf'];
	}
	echo("</th>");
}
elseif($one['pp_op']==0){
	echo("<th>");
	
	if ($one['inf']!=0 or $one['inf']!= '') {
		echo $one['inf'];
	}
	echo("</th>");
}

echo("</tr>");
$i++;						
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++	



//создаем масив группу собрания 
$ref_arr1=mysql_query("SELECT * FROM `tb_group` WHERE `cgr`='".$user_arr[6]."' and `gid`='".$roww['gid']."'");
while($row2=mysql_fetch_array($ref_arr1)){
		if ($row2['uid']!=$roww['uid']){				 
			$row=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$row2['uid']."'"));
			$group[] = arr_insert([$row['id'],$row['name'],$row['pp_p']]);
		}
}
//==============================
					


$group = arr_sort($group);		//сортируем масив по имени в алфовитном порядке
 foreach ($group as $key=>$item) {
	 
	 foreach ($item as $key=>$item2) {
		 
		
		if($key=='id')
		 {$r_id = $item2;}
		if($key=='name')
		 {$r_name = $item2;}
		if($key=='pp_p')
		 {$r_pp_p = $item2;}
		 
	 }
	 

		 		$one=mysql_fetch_array(mysql_query("SELECT * FROM `".$rap_table."` WHERE `uid`='".$r_id."' "));
				$row=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$r_id."' "));
					
                     

                     
					   
					   if($r_pp_p==0){
						   if($one[6]==1){
							$r_pp_p  =1; 
						   }
						}

                        echo("<tr>");
					if($one['tm']==0){
                          echo("<th >");
                         }
					else{																								
                           echo("<th bgcolor='#00FF7F'>");
                         }
                         echo("".$i."</th>");
						 
                    if($one['pp_op']==1){
                         echo("<th bgcolor='#d1eaff'>");
                          }
                    elseif($one['pp_op']==2){
                        echo("<th bgcolor='#FFDEAD'>");
                             }
					else{
                          echo("<th>");
                        }
						
						echo("<a class='btn btn-sm btn-link' ");
						if($one['r_type']==5){
							echo"style='color: red'";
						}
						echo("href='report.html&sub=cart&u=".$r_id."'>".$r_name."</a>"); if($permis[7]==1){ echo(" <a  href='report.html&sub=vred&u=".$row[0]."&m=".$mn."&y=".$year."'><span style='color: green;'><i class='fa fa-pencil'></i></span></a>"); } echo("</th>");
						
						
                      
if ($one['tm']!=0){						//проверяем заполнена ли ячейка для времени

	if ($one['pp_op']==0){				//проверяем если возвещатель.
	$tm = $tm + $one['tm'];				//прибовляем его время к общей сумме для возвещателей.
	$tvz++;
	}
	
	elseif ($one['pp_op']==1){			//проверяем если подсобный пионер.
	$ptm= $ptm + $one['tm'];			//прибовляем его время к общей сумме для подсобных пионеров.
	$tpp++;
	}
	
	elseif ($one['pp_op']==2){			//проверяем если общий пионер.
    $otm = $otm + $one['tm'];			//прибовляем его время к общей сумме для общий пионер.
	$top++;
	}
	$trp++;
}
//**************************

//подчет публикаций(коментарии такойже как и для времени)
if ($one['pb']!=0) {					
 
	if ($one['pp_op']==0){
	$pb= $pb + $one['pb'];
	}
	
	elseif ($one['pp_op']==1){
    $ppb= $ppb + $one['pb'];
	}
	
	elseif ($one['pp_op']==2){
    $opb = $opb + $one['pb'];
	}

}
//**************************


//подчет видео(коментарии такойже как и для времени)
if ($one['vd']!=0) {
  
	if ($one['pp_op']==0){
    $vd= $vd + $one['vd'];
		
	}
	elseif ($one['pp_op']==1){
    $pvd= $pvd + $one['vd'];
		
	}
	elseif ($one['pp_op']==2){
    $ovd = $ovd + $one['vd'];
	}
}

//*************************

//подчет повторные посящения(коментарии такойже как и для времени)
if ($one['pp']!=0) {
  
	if ($one['pp_op']==0){
    $pp= $pp + $one['pp'];
		
	}
	elseif ($one['pp_op']==1){
    $ppp= $ppp + $one['pp'];
		
	}
	elseif ($one['pp_op']==2){
    $opp = $opp + $one['pp'];
	}
}

//*************************

//подчет изучения библии(коментарии такойже как и для времени)
if ($one['iz']!=0) {
  
	if ($one['pp_op']==0){
    $iz= $iz + $one['iz'];
		
	}
	elseif ($one['pp_op']==1){
    $piz= $piz + $one['iz'];
		
	}
	elseif ($one['pp_op']==2){
    $oiz = $oiz + $one['iz'];
	}
}
//*************************
//*************************


//Заполняем ячейки отчет возвещателя


if ($one['pp_op']==2){
	echo("<th bgcolor='#FFDEAD'>");
	
	if ($one['pb']!=0 ) {
		echo $one['pb'];
	}
	echo("</th>");
}
elseif ($one['pp_op']==1){
	echo("<th bgcolor='#d1eaff'>");
	
	if ($one['pb']!=0 ) {
		echo $one['pb'];
	}
	echo("</th>");
}
elseif($one['pp_op']==0){
	echo("<th>");
	
	if ($one['pb']!=0) {
		echo $one['pb'];
	}
	echo("</th>");
}




if ($one['pp_op']==2){
	echo("<th bgcolor='#FFDEAD'>");
	
	if ($one['vd']!=0) {
		echo $one['vd'];
	}
	echo("</th>");
}
elseif ($one['pp_op']==1){
	echo("<th bgcolor='#d1eaff'>");
	
	if ($one['vd']!=0) {
		echo $one['vd'];
	}
	echo("</th>");
}
elseif($one['pp_op']==0){
	echo("<th>");
	
	if ($one['vd']!=0) {
		echo $one['vd'];
	}
	echo("</th>");
}



$tm_sep=explode(".",$one['tm']); // ращделенное время 
if($tm_sep[0]==0 and $tm_sep[1]>0){
	$one['tm']=$one['tm'];
}

if($tm_sep[0]>0 and $tm_sep[1]==0){
	$one['tm']=$tm_sep[0];
}

if ($one['pp_op']==2){
	echo("<th bgcolor='#FFDEAD'>");
	
	if ($one['tm']!=0) {
		echo $one['tm'];
	}
	echo("</th>");
}
elseif ($one['pp_op']==1){
	echo("<th bgcolor='#d1eaff'>");
	
	if ($one['tm']!=0) {
		echo $one['tm'];
	}
	echo("</th>");
}
elseif($one['pp_op']==0){
	echo("<th>");
	
	if ($one['tm']!=0) {
		echo $one['tm'];
	}
	echo("</th>");
}




if ($one['pp_op']==2){
	echo("<th bgcolor='#FFDEAD'>");
	
	if ($one['pp']!=0) {
		echo $one['pp'];
	}
	echo("</th>");
}
elseif ($one['pp_op']==1){
	echo("<th bgcolor='#d1eaff'>");
	
	if ($one['pp']!=0) {
		echo $one['pp'];
	}
	echo("</th>");
}
elseif($one['pp_op']==0){
	echo("<th>");
	
	if ($one['pp']!=0) {
		echo $one['pp'];
	}
	echo("</th>");
}




if ($one['pp_op']==2){
	echo("<th bgcolor='#FFDEAD'>");
	
	if ($one['iz']!=0) {
		echo $one['iz'];
	}
	echo("</th>");
}
elseif ($one['pp_op']==1){
	echo("<th bgcolor='#d1eaff'>");
	
	if ($one['iz']!=0) {
		echo $one['iz'];
	}
	echo("</th>");
}
elseif($one['pp_op']==0){
	echo("<th>");
	
	if ($one['iz']!=0) {
		echo $one['iz'];
	}
	echo("</th>");
}


if ($one['pp_op']==2){
	echo("<th bgcolor='#FFDEAD'>");
	
	if ($one['inf']!=0 or $one['inf']!= '') {
		echo $one['inf'];
	}
	echo("</th>");
}
elseif ($one['pp_op']==1){
	echo("<th bgcolor='#d1eaff'>");
	
	if ($one['inf']!=0 or $one['inf']!= '') {
		echo $one['inf'];
	}
	echo("</th>");
}
elseif($one['pp_op']==0){
	echo("<th>");
	
	if ($one['inf']!=0 or $one['inf']!= '') {
		echo $one['inf'];
	}
	echo("</th>");
}

echo("</tr>");
$i++;
		 
	 
	 
		  
       
unset ($group);      
}
						 





//		
//		
//	далее иде история отчетов за прошлый месяц или прошлый год	
//		
//		
//		
//		
//		
//		
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++						

				}		
				 
						 
						 
						 


                       echo("</tr>");

}
                       echo("<tr><th colspan='8' bgcolor='#EEE8AA'></th></tr>");

                       echo("<tr>
                        <th colspan='2'> </th>
                        <th class='not-sortable'>Пуб.</th>
                        <th class='not-sortable'>Видео</th>
                        <th class='not-sortable'>Часы</th>
                        <th class='not-sortable'>Пов. П</th>
                        <th class='not-sortable'>Изуч. Б</th>
                        <th colspan='1' ></th>
                        </tr>");

						echo("<tr>");
						echo("<th>".$tvz."</th><th>Возвещатели</th>");
						echo("<th>".$pb."</th>");
						echo("<th>".$vd."</th>");
						echo("<th>".$tm."</th>");
						echo("<th>".$pp."</th>");
						echo("<th>".$iz."</th>");
						echo("<th></th>");
						echo("</tr>");





                        echo("<tr><th>".$tpp."</th><th  bgcolor='#d1eaff'>Подсобные пионеры</th>");
						echo("<th>".$ppb."</th>");
                        echo("<th>".$pvd."</th>");
                        echo("<th>".$ptm."</th>");
                        echo("<th>".$ppp."</th>");
                        echo("<th>".$piz."</th>");
                        echo("<th></th>");
                        echo("</tr>");


						echo("<tr>");
						echo("<th>".$top."</th><th bgcolor='#FFDEAD'>Общии пионеры</th>");
						echo("<th>".$opb."</th>");
						echo("<th>".$ovd."</th>");
						echo("<th>".$otm."</th>");
						echo("<th>".$opp."</th>");
						echo("<th>".$oiz."</th>");
						echo("<th></th>");
						echo("</tr>");

						$ttpb=$pb+$ppb+$opb;
						$ttvd=$vd+$pvd+$ovd;
						$tttm=$tm+$ptm+$otm;
						$ttpp=$pp+$ppp+$opp;
						$ttiz=$iz+$piz+$oiz;
						
                        echo("<tr><th>".$trp."</th><th  bgcolor='#EEE8AA'>Итого:</th>");
                        echo("<th bgcolor='#EEE8AA'>".$ttpb."</th>");
                        echo("<th bgcolor='#EEE8AA'>".$ttvd."</th>");
                        echo("<th bgcolor='#EEE8AA'>".$tttm."</th>");
                        echo("<th bgcolor='#EEE8AA'>".$ttpp."</th>");
                        echo("<th bgcolor='#EEE8AA'>".$ttiz."</th>");
                        echo("<th></th>");
                        echo("</tr>");
						
						
						if($trp==0)
						{
							$trp=1;
						}	
					
                        $spb= $ttpb / $trp;
                        $svd= $ttvd / $trp;
                        $stm= $tttm / $trp;
                        $spp= $ttpp / $trp;
                        $siz= $ttiz / $trp;
						
                        echo("<tr><th></th><th >Среднее</th>");
                        echo("<th>".round($spb, 1)."</th>");
                        echo("<th>".round($svd, 1)."</th>");
                        echo("<th>".round($stm, 1)."</th>");
                        echo("<th>".round($spp, 1)."</th>");
                        echo("<th>".round($siz, 1)."</th>");
                        echo("<th>");
						
						
						if($i1!=1){
							?>
							 <form action=''  method='post' name='form1'>
									<input type='hidden' name='save' value='1'>
						
									
									<?
									
									if($cfg_cgr[0] == 1){
									?>
									<button type='submit' class='btn btn-primary'>Сохранить</button>	
									<?}?>									
							</form>

							
							
							
							
							<?
						
						}
						
						echo("</th>");
                        echo("</tr>");
?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>



</br>





<?
}







else
{
  header("location: /index.html");
}
?>
<?php

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
				header("location: /report.html&sub=rp");
				
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

?>



<div class='d-flex align-items-center justify-content-between mt-50 mb-20'>
				<h4>Отчет за <? if ($mn == '')echo t_month();
								else echo nmonth($mn);
								
								
								echo ' '.$year.' года';
								?></h4>

			</div>




              <a class="btn btn-sm btn-link" href='report.html&sub=congr'>Актуальный Месяц</a>
              <a class="btn btn-sm btn-link" href='report.html&sub=congr&mn=9'>Сентябрь</a>
              <a class="btn btn-sm btn-link" href='report.html&sub=congr&mn=10'>Октябрь</a>
              <a class="btn btn-sm btn-link" href='report.html&sub=rp&mn=11'>Ноябрь</a>
              <a class="btn btn-sm btn-link" href='report.html&sub=congr&mn=12'>Декабрь</a>
			  <a class="btn btn-sm btn-link" href='report.html&sub=congr&mn=1'>Январь</a>
              <a class="btn btn-sm btn-link" href='report.html&sub=congr&mn=2'>Февраль</a>
              <a class="btn btn-sm btn-link" href='report.html&sub=congr&mn=3'>Март</a>
              <a class="btn btn-sm btn-link" href='report.html&sub=congr&mn=4'>Апрель</a>
              <a class="btn btn-sm btn-link" href='report.html&sub=congr&mn=5'>Май</a>
              <a class="btn btn-sm btn-link" href='report.html&sub=congr&mn=6'>Июнь</a>
              <a class="btn btn-sm btn-link" href='report.html&sub=congr&mn=7'>Июль</a>
              <a class="btn btn-sm btn-link" href='report.html&sub=congr&mn=8'>Август</a>
			  
			  <a class="btn btn-sm btn-link" href='report.html&sub=congr&y=<? echo $rp_ye[0]; ?>'><? echo $rp_ye[0]; ?></a>
			  <a class="btn btn-sm btn-link" href='report.html&sub=congr&y=<? echo $rp_ye[1]; ?>'><? echo $rp_ye[1]; ?></a>
                           
                            
                                    
									
<?
$cmn = date("n");
$ye = date("Y");
$activ=0;


if($year == $rp_ye[0] and $cmn >= 9 ){
	$activ=1;
}


if($activ == 1){
	
	
	

	
	



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
$ib=0;
$pp=0;
$pv=0;

$vtm=0;
$vpb=0;
$vib=0;
$vpp=0;
$vpv=0;


$ptm=0;
$ppb=0;
$pib=0;
$ppp=0;
$ppv=0;


$otm=0;
$opb=0;
$oib=0;
$opp=0;
$opv=0;



$pion=0;
$ppio=0;
$vozv=0;
$vtot=0;


$opp=0;
$opv=0;


$i=1;
$n=1;

if ($mn == ''){$mn=date("n");}

				
				$ref_arr=mysql_query("SELECT * FROM `tb_group` WHERE `cgr`='".$user_arr[6]."' ORDER BY `prim` ASC");
                while($roww=mysql_fetch_array($ref_arr)){
					
					if($roww['prim']!=0){
						 
					
							 
					$row=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$roww['uid']."'"));

                    $rap=mysql_fetch_array(mysql_query("SELECT `id`,`jan`,`feb`,`mart`,`aptil`,`mai`,`iumi`,`iul`,`aug`,`sep`,`oct`,`nov`,`dec` FROM `tb_raport` WHERE `uid`='".$row[0]."' and `year`='".$year."'"));
					
                    $one=explode("|",$rap[$mn]);
                   if($roww['gid']!=1){
					echo "<tr><th colspan='8' bgcolor='#D2B48C'></th></tr>";}
                        echo("<tr>");
						 
                        if($one[2]=='0'){
                          echo("<th >");
                         }
                         else{
                           echo("<th bgcolor='#00FF7F'>");
                         }
                         echo("".$i."</th>");
						 //echo("<th bgcolor='#d1eaff'>".$n."<th>");
						 
                    if($one[6]==1){
                         echo("<th bgcolor='#d1eaff'>");
                          }
                    elseif($row['pp_p']==2){
                        echo("<th bgcolor='#FFDEAD'>");
                             }
					else{
                          echo("<th>");
                        }
						echo("<a class='btn btn-sm btn-link' ");
						
						
						if($one[7]==1){
							
							echo"style='color: red'";
						}
						echo("
						href='report.html&sub=mb&u=".$row[0]."'>".$row[8]." (Группа №".$roww['gid'].")</a></th>");
						
						
                        
                        foreach($one as $key => $value){

// подсчет общих значений ===============

if ($key==0 and $one[7]==0){
  $tm += $value;
	if ($row['pp_p']==0){
		$vtm= $vtm + $value;
	}
  elseif ($one[6]==1){
    $ptm= $ptm + $value;
  }
  elseif ($row['pp_p']==2){
    $otm = $otm + $value;
  }

}


//===================
elseif ($key==1 and $one[7]==0) {
  $pb += $value;

	if ($row['pp_p']==0){
		$vpb= $vpb + $value;
	}
  elseif ($one[6]==1){
    $ppb= $ppb + $value;
  }
  elseif ($row['pp_p']==2){
    $opb = $opb + $value;
  }

}
//**************************


//==========================
elseif ($key==2 and $one[7]==0) {
  $ib += $value;
	if ($row['pp_p']==0){
    $vib= $vib + $value;
		if ($value!=0){$vozv++;}
  }
  elseif ($one[6]==1){
    $pib= $pib + $value;
		if ($value!=0){$ppio++;}

  }
  elseif ($row['pp_p']==2){
    $oib = $oib + $value;
		if ($value!=0){$pion++;}
  }
		if ($value!=0){$vtot++;}
}

//*************************

elseif ($key==3 and $one[7]==0) {
  $pp += $value;


	if ($row['pp_p']==0){
    $vpp= $vpp + $value;
  }
  elseif ($one[6]==1){
    $ppp= $ppp + $value;
  }
  elseif ($row['pp_p']==2){
    $opp = $opp + $value;
  }
}

elseif ($key==4 and $one[7]==0) {
  $pv += $value;

	if ($row['pp_p']==0){
    $vpv= $vpv + $value;
  }
  elseif ($one[6]==1){
    $ppv= $ppv + $value;
  }
  elseif ($row['pp_p']==2){
    $opv = $opv + $value;
  }
}

//==================================

if($key==0 or $key==1 or $key==2 or $key==3 or $key==4){
if($value==0){

	if ($row['pp_p']==2){
	echo("<th bgcolor='#FFDEAD'></th>");
}
elseif ($one[6]==1){
	echo("<th bgcolor='#d1eaff'></th>");
}
elseif(($row['pp_p']==0))
{
echo("<th></th>");
}

}
else {


if ($row['pp_p']==2){
	echo("<th bgcolor='#FFDEAD'>".$value."</th>");
}
elseif ($one[6]==1){
	echo("<th bgcolor='#d1eaff'>".$value."</th>");
}
elseif(($row['pp_p']==0))
{
echo("<th>".$value."</th>");
}
}

}
if($key==5){echo("<th>".$value."</th>");}

}

echo("</tr>");
$i++;						
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++	


$ref_arr1=mysql_query("SELECT * FROM `tb_group` WHERE `cgr`='".$user_arr[6]."' and `gid`='".$roww['gid']."'");
while($row2=mysql_fetch_array($ref_arr1))
                     {
						 if ($row2['uid']!=$roww['uid']){
							 
						$row=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$row2['uid']."'"));
						
						$group[] = arr_insert([$row['id'],$row['name'],$row['pp_p']]);
					 }
					 }
					
		$group = arr_sort($group);
 foreach ($group as $key=>$item) {
	 
	 foreach ($item as $key=>$item2) {
		 
		
		if($key=='id')
		 {$r_id = $item2;}
		if($key=='name')
		 {$r_name = $item2;}
		if($key=='pp_p')
		 {$r_pp_p = $item2;}
		 
	 }
	 

		 
                       $rap=mysql_fetch_array(mysql_query("SELECT `id`,`jan`,`feb`,`mart`,`aptil`,`mai`,`iumi`,`iul`,`aug`,`sep`,`oct`,`nov`,`dec` FROM `tb_raport` WHERE `uid`='".$r_id."' and `year`='".$year."'"));

                       $one=explode("|",$rap[$mn]);
					   
					   if($r_pp_p==0){
						   if($one[6]==1){
							$r_pp_p  =1; 
						   }
						}

                        echo("<tr>");
                        if($one[2]=='0'){
                          echo("<th >");
                         }
                         else{																								
                           echo("<th bgcolor='#00FF7F'>");
                         }
                         echo("".$i."</th>");
						 
                    if($one[6]==1){
                         echo("<th bgcolor='#d1eaff'>");
                          }
                    elseif($r_pp_p==2){
                        echo("<th bgcolor='#FFDEAD'>");
                             }
					else{
                          echo("<th>");
                        }
						
						echo("<a class='btn btn-sm btn-link' ");
						if($one[7]==1){
							echo"style='color: red'";
						}
						echo("href='report.html&sub=mb&u=".$r_id."'>".$r_name."</a></th>");
						
						
                      
foreach($one as $key => $value){

// подсчет общих значений ===============ПУБЛИУВЦИИ

if ($key==0 and $one[7]==0){
  $tm += $value;
	if ($r_pp_p==0){
		$vtm= $vtm + $value;
	}
  elseif ($one[6]==1){
    $ptm= $ptm + $value;
  }
  elseif ($r_pp_p==2){
    $otm = $otm + $value;
  }

}


//===================ВИДЕО
elseif ($key==1 and $one[7]==0) {
  $pb += $value;

	if ($r_pp_p==0){
		$vpb= $vpb + $value;
	}
  elseif ($one[6]==1){
    $ppb= $ppb + $value;
  }
  elseif ($r_pp_p==2){
    $opb = $opb + $value;
  }

}
//**************************


//==========================ЧАСЫ
elseif ($key==2 and $one[7]==0) {
  $ib += $value;
if ($r_pp_p==0){
    $vib= $vib + $value;
		if ($value!=0){$vozv++;}
  }
elseif ($one[6]==1){
    $pib= $pib + $value;
		if ($value!=0){$ppio++;}

  }
  elseif ($r_pp_p==2){
    $oib = $oib + $value;
		if ($value!=0){$pion++;}
  }
		if ($value!=0){$vtot++;}
}

//*************************ПОВТОРНЫЕ ПОСЯЩЕНИЯ

elseif ($key==3 and $one[7]==0) {
  $pp += $value;


	if ($r_pp_p==0){
    $vpp= $vpp + $value;
  }
  elseif ($one[6]==1){
    $ppp= $ppp + $value;
  }
  elseif ($r_pp_p==2){
    $opp = $opp + $value;
  }
}
//*************************ИЗУЧЕНИЯ БИБЛИИ
elseif ($key==4 and $one[7]==0) {
  $pv += $value;

	if ($r_pp_p==0){
    $vpv= $vpv + $value;
  }
  elseif ($one[6]==1){
    $ppv= $ppv + $value;
  }
  elseif ($r_pp_p==2){
    $opv = $opv + $value;
  }
}

//==================================

if($key==0 or $key==1 or $key==2 or $key==3 or $key==4){
if($value==0){

	if ($r_pp_p==2){
	echo("<th bgcolor='#FFDEAD'></th>");
}
elseif ($one[6]==1){
	echo("<th bgcolor='#d1eaff'></th>");
}
elseif(($r_pp_p==0))
{
echo("<th></th>");
}

}
else {


if ($r_pp_p==2){
	echo("<th bgcolor='#FFDEAD'>".$value."</th>");
}
elseif ($one[6]==1){
	echo("<th bgcolor='#d1eaff'>".$value."</th>");
}
elseif($r_pp_p==0)
{
	echo("<th>".$value."</th>");
}
}

}
if($key==5){echo("<th>".$value."</th>");}

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
						echo("<th>".$vozv."</th><th>Возвещатели</th>");
						echo("<th>".$vtm."</th>");
						echo("<th>".$vpb."</th>");
						echo("<th>".$vib."</th>");
						echo("<th>".$vpp."</th>");
						echo("<th>".$vpv."</th>");
						echo("<th></th>");
						echo("</tr>");





                        echo("<tr><th>".$ppio."</th><th  bgcolor='#d1eaff'>Подсобные пионеры</th>");
						echo("<th>".$ptm."</th>");
                        echo("<th>".$ppb."</th>");
                        echo("<th>".$pib."</th>");
                        echo("<th>".$ppp."</th>");
                        echo("<th>".$ppv."</th>");
                        echo("<th></th>");
                        echo("</tr>");


						echo("<tr>");
						echo("<th>".$pion."</th><th bgcolor='#FFDEAD'>Общии пионеры</th>");
						echo("<th>".$otm."</th>");
						echo("<th>".$opb."</th>");
						echo("<th>".$oib."</th>");
						echo("<th>".$opp."</th>");
						echo("<th>".$opv."</th>");
						echo("<th></th>");
						echo("</tr>");


                        echo("<tr><th>".$vtot."</th><th  bgcolor='#EEE8AA'>Итого:</th>");
                        echo("<th bgcolor='#EEE8AA'>".$tm."</th>");
                        echo("<th bgcolor='#EEE8AA'>".$pb."</th>");
                        echo("<th bgcolor='#EEE8AA'>".$ib."</th>");
                        echo("<th bgcolor='#EEE8AA'>".$pp."</th>");
                        echo("<th bgcolor='#EEE8AA'>".$pv."</th>");
                        echo("<th></th>");
                        echo("</tr>");
						
						
						if($vtot==0)
						{
							$vtot=1;
						}	
						
                        $ii=$vtot;
						
                        $stm= $tm / $ii;
                        $spb= $pb / $ii;
                        $sib= $ib / $ii;
                        $spp= $pp / $ii;
                        $spv= $pv / $ii;
                        echo("<tr><th></th><th >Среднее</th>");
                        echo("<th>".round($stm, 1)."</th>");
                        echo("<th>".round($spb, 1)."</th>");
                        echo("<th>".round($sib, 1)."</th>");
                        echo("<th>".round($spp, 1)."</th>");
                        echo("<th>".round($spv, 1)."</th>");
                        echo("<th>");
						
						
						if($i1!=1){
							?>
							 <form action=''  method='post' name='form1'>
									<input type='hidden' name='save' value='1'>
									<input type='hidden' name='m' value='<? echo $mn; ?>'>
								
									
                                    <input type='hidden' name='vtot' value='<? echo $vozv; ?>'>      
                                    <input type='hidden' name='vpb' value='<? echo $vtm; ?>'>      
                                    <input type='hidden' name='vvd' value='<? echo $vpb; ?>'>     
                                    <input type='hidden' name='vtm' value='<? echo $vib; ?>'>     
                                    <input type='hidden' name='vpp' value='<? echo $vpp; ?>'>     
                                    <input type='hidden' name='vib' value='<? echo $vpv; ?>'>   

									<input type='hidden' name='ptot' value='<? echo $ppio; ?>'>      
                                    <input type='hidden' name='ppb' value='<? echo $ptm; ?>'>      
                                    <input type='hidden' name='pvd' value='<? echo $ppb; ?>'>     
                                    <input type='hidden' name='ptm' value='<? echo $pib; ?>'>     
                                    <input type='hidden' name='ppp' value='<? echo $ppp; ?>'>     
                                    <input type='hidden' name='pib' value='<? echo $ppv; ?>'> 

									<input type='hidden' name='otot' value='<? echo $opio; ?>'>      
                                    <input type='hidden' name='opb' value='<? echo $otm; ?>'>      
                                    <input type='hidden' name='ovd' value='<? echo $opb; ?>'>     
                                    <input type='hidden' name='otm' value='<? echo $oib; ?>'>     
                                    <input type='hidden' name='opp' value='<? echo $opp; ?>'>     
                                    <input type='hidden' name='oib' value='<? echo $opv; ?>'> 									
                                  
                                  

									<button type='submit' class='btn btn-primary'>Сохранить</button>									
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
<div class="col-md-4 col-sm-4">
<div class='card'>
	<div class='card-body pa-0'>			
		<div class='table-wrap'>
			<div class='table-responsive'>
		
				<table class="table table-secondary table-bordered mb-0">
					<thead class="thead-secondary">
						</thead>
						<tbody>
						<?
						echo("<tr>
                        <th colspan='1'>№</th>
                        <th colspan='1'>Неактивные</th>
                        <th colspan='1'></th>
                        </tr>");
						
						
						$i_n=1;
						$no_activ=mysql_query("SELECT * FROM `users` WHERE `rid`='".$user_arr[6]."' and `group`='0'");
while($n_row=mysql_fetch_array($no_activ))
                     {echo("<tr>");
						 
						 echo("<th>".$i_n."</th>");
						 echo("<th>".$n_row['name']."</th>"); 
						 echo("<th><a href='report.html&sub=congr&t=activ&i=".$n_row['id']."' alt='Активный' title='Активный' border='0'><img src='template/apimages/delete.png' width='20' height='20'></a>
					      </th>");
						 echo("</tr>");
						
					 $i_n++;
					 }
						
						
						

						
						
					
						

		 
?>
															 
					</tbody>
				</table>
			
			</div>
		</div>
	</div>
	</div>
</div>


<?
}




else{

?>


							
									<div class="accordion" id="accordion_1">
                                        
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between">
                                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse_1" aria-expanded="false">Подробный Отчет за <? echo nmonth($mn); ?></a>
                                            </div>
                                            <div id="collapse_1" class="collapse" data-parent="#accordion_1">

                                                <div class="card-body pa-15"> 
												
												
						

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
$ib=0;
$pp=0;
$pv=0;

$vtm=0;
$vpb=0;
$vib=0;
$vpp=0;
$vpv=0;


$ptm=0;
$ppb=0;
$pib=0;
$ppp=0;
$ppv=0;


$otm=0;
$opb=0;
$oib=0;
$opp=0;
$opv=0;



$pion=0;
$ppio=0;
$vozv=0;
$vtot=0;


$opp=0;
$opv=0;


$i=1;


				$ref_arr=mysql_query("SELECT * FROM `tb_group` WHERE `cgr`='".$user_arr[6]."' ORDER BY `prim` ASC");
                while($roww=mysql_fetch_array($ref_arr)){
					
					if($roww['prim']!=0){
						 
					
							 
					$row=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$roww['uid']."'"));

                    $rap=mysql_fetch_array(mysql_query("SELECT `id`,`jan`,`feb`,`mart`,`aptil`,`mai`,`iumi`,`iul`,`aug`,`sep`,`oct`,`nov`,`dec` FROM `tb_raport` WHERE `uid`='".$row[0]."' and `year`='".$year."'"));
					
                    $one=explode("|",$rap[$mn]);
                    

                        echo("<tr>");
                        if($one[2]=='0'){
                          echo("<th >");
                         }
                         else{
                           echo("<th bgcolor='#00FF7F'>");
                         }
                         echo("".$i."</th>");
						 
						 
                    if($one[6]==1){
                         echo("<th bgcolor='#d1eaff'>");
                          }
                    elseif($row['pp_p']==2){
                        echo("<th bgcolor='#FFDEAD'>");
                             }
					else{
                          echo("<th>");
                        }
						echo("<a class='btn btn-sm btn-link' ");
						
						
						if($one[7]==1){
							
							echo"style='color: red'";
						}
						echo("
						href='report.html&sub=mb&u=".$row[0]."'>".$row[8]." (Группа №".$roww['gid'].")</a></th>");
						
						
                        
                        foreach($one as $key => $value){

// подсчет общих значений ===============

if ($key==0 and $one[7]==0){
  $tm += $value;
	if ($row['pp_p']==0){
		$vtm= $vtm + $value;
	}
  elseif ($one[6]==1){
    $ptm= $ptm + $value;
  }
  elseif ($row['pp_p']==2){
    $otm = $otm + $value;
  }

}


//===================
elseif ($key==1 and $one[7]==0) {
  $pb += $value;

	if ($row['pp_p']==0){
		$vpb= $vpb + $value;
	}
  elseif ($one[6]==1){
    $ppb= $ppb + $value;
  }
  elseif ($row['pp_p']==2){
    $opb = $opb + $value;
  }

}
//**************************


//==========================
elseif ($key==2 and $one[7]==0) {
  $ib += $value;
	if ($row['pp_p']==0){
    $vib= $vib + $value;
		if ($value!=0){$vozv++;}
  }
  elseif ($one[6]==1){
    $pib= $pib + $value;
		if ($value!=0){$ppio++;}

  }
  elseif ($row['pp_p']==2){
    $oib = $oib + $value;
		if ($value!=0){$pion++;}
  }
		if ($value!=0){$vtot++;}
}

//*************************

elseif ($key==3 and $one[7]==0) {
  $pp += $value;


	if ($row['pp_p']==0){
    $vpp= $vpp + $value;
  }
  elseif ($one[6]==1){
    $ppp= $ppp + $value;
  }
  elseif ($row['pp_p']==2){
    $opp = $opp + $value;
  }
}

elseif ($key==4 and $one[7]==0) {
  $pv += $value;

	if ($row['pp_p']==0){
    $vpv= $vpv + $value;
  }
  elseif ($one[6]==1){
    $ppv= $ppv + $value;
  }
  elseif ($row['pp_p']==2){
    $opv = $opv + $value;
  }
}

//==================================

if($key==0 or $key==1 or $key==2 or $key==3 or $key==4){
if($value==0){

	if ($row['pp_p']==2){
	echo("<th bgcolor='#FFDEAD'></th>");
}
elseif ($one[6]==1){
	echo("<th bgcolor='#d1eaff'></th>");
}
elseif(($row['pp_p']==0))
{
echo("<th></th>");
}

}
else {


if ($row['pp_p']==2){
	echo("<th bgcolor='#FFDEAD'>".$value."</th>");
}
elseif ($one[6]==1){
	echo("<th bgcolor='#d1eaff'>".$value."</th>");
}
elseif(($row['pp_p']==0))
{
echo("<th>".$value."</th>");
}
}

}
if($key==5){echo("<th>".$value."</th>");}

}

echo("</tr>");
$i++;						
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++	


$ref_arr1=mysql_query("SELECT * FROM `tb_group` WHERE `cgr`='".$user_arr[6]."' and `gid`='".$roww['gid']."'");
while($row2=mysql_fetch_array($ref_arr1))
                     {
						 if ($row2['uid']!=$roww['uid']){
							 
						$row=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$row2['uid']."'"));
						
						$group[] = arr_insert([$row['id'],$row['name'],$row['pp_p']]);
					 }
					 }
					
		$group = arr_sort($group);
 foreach ($group as $key=>$item) {
	 
	 foreach ($item as $key=>$item2) {
		 
		
		if($key=='id')
		 {$r_id = $item2;}
		if($key=='name')
		 {$r_name = $item2;}
		if($key=='pp_p')
		 {$r_pp_p = $item2;}
		 
	 }
	 

		 
                       $rap=mysql_fetch_array(mysql_query("SELECT `id`,`jan`,`feb`,`mart`,`aptil`,`mai`,`iumi`,`iul`,`aug`,`sep`,`oct`,`nov`,`dec` FROM `tb_raport` WHERE `uid`='".$r_id."' and `year`='".$year."'"));

                       $one=explode("|",$rap[$mn]);
					   
					   if($r_pp_p==0){
						   if($one[6]==1){
							$r_pp_p  =1; 
						   }
						}

                        echo("<tr>");
                        if($one[2]=='0'){
                          echo("<th >");
                         }
                         else{																								
                           echo("<th bgcolor='#00FF7F'>");
                         }
                         echo("".$i."</th>");
						 
                    if($one[6]==1){
                         echo("<th bgcolor='#d1eaff'>");
                          }
                    elseif($r_pp_p==2){
                        echo("<th bgcolor='#FFDEAD'>");
                             }
					else{
                          echo("<th>");
                        }
						
						echo("<a class='btn btn-sm btn-link' ");
						if($one[7]==1){
							echo"style='color: red'";
						}
						echo("href='report.html&sub=mb&u=".$r_id."'>".$r_name."</a></th>");
						
						
                      
foreach($one as $key => $value){

// подсчет общих значений ===============ПУБЛИУВЦИИ

if ($key==0 and $one[7]==0){
  $tm += $value;
	if ($r_pp_p==0){
		$vtm= $vtm + $value;
	}
  elseif ($one[6]==1){
    $ptm= $ptm + $value;
  }
  elseif ($r_pp_p==2){
    $otm = $otm + $value;
  }

}


//===================ВИДЕО
elseif ($key==1 and $one[7]==0) {
  $pb += $value;

	if ($r_pp_p==0){
		$vpb= $vpb + $value;
	}
  elseif ($one[6]==1){
    $ppb= $ppb + $value;
  }
  elseif ($r_pp_p==2){
    $opb = $opb + $value;
  }

}
//**************************


//==========================ЧАСЫ
elseif ($key==2 and $one[7]==0) {
  $ib += $value;
if ($r_pp_p==0){
    $vib= $vib + $value;
		if ($value!=0){$vozv++;}
  }
elseif ($one[6]==1){
    $pib= $pib + $value;
		if ($value!=0){$ppio++;}

  }
  elseif ($r_pp_p==2){
    $oib = $oib + $value;
		if ($value!=0){$pion++;}
  }
		if ($value!=0){$vtot++;}
}

//*************************ПОВТОРНЫЕ ПОСЯЩЕНИЯ

elseif ($key==3 and $one[7]==0) {
  $pp += $value;


	if ($r_pp_p==0){
    $vpp= $vpp + $value;
  }
  elseif ($one[6]==1){
    $ppp= $ppp + $value;
  }
  elseif ($r_pp_p==2){
    $opp = $opp + $value;
  }
}
//*************************ИЗУЧЕНИЯ БИБЛИИ
elseif ($key==4 and $one[7]==0) {
  $pv += $value;

	if ($r_pp_p==0){
    $vpv= $vpv + $value;
  }
  elseif ($one[6]==1){
    $ppv= $ppv + $value;
  }
  elseif ($r_pp_p==2){
    $opv = $opv + $value;
  }
}

//==================================

if($key==0 or $key==1 or $key==2 or $key==3 or $key==4){
if($value==0){

	if ($r_pp_p==2){
	echo("<th bgcolor='#FFDEAD'></th>");
}
elseif ($one[6]==1){
	echo("<th bgcolor='#d1eaff'></th>");
}
elseif(($r_pp_p==0))
{
echo("<th></th>");
}

}
else {


if ($r_pp_p==2){
	echo("<th bgcolor='#FFDEAD'>".$value."</th>");
}
elseif ($one[6]==1){
	echo("<th bgcolor='#d1eaff'>".$value."</th>");
}
elseif($r_pp_p==0)
{
	echo("<th>".$value."</th>");
}
}

}
if($key==5){echo("<th>".$value."</th>");}

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
?>

</tbody>
					</table>							
			</div>
        </div>
    </div>
 </div>
 	</div>
        </div>
    </div>
 </div>
									
				<br>					
<div class='card'>
	<div class='card-body pa-0'>			
		<div class='table-wrap'>
			<div class='table-responsive'>
				<table class="table table-secondary table-bordered mb-0">
					<thead class="thead-secondary">
						</thead>
						<tbody>
						<?
						echo("<tr>

                        <th colspan='2'> </th>
                        <th class='not-sortable'>Пуб.</th>
                        <th class='not-sortable'>Видео</th>
                        <th class='not-sortable'>Часы</th>
                        <th class='not-sortable'>Пов. П</th>
                        <th class='not-sortable'>Изуч. Б</th>
                        
                        </tr>");

						echo("<tr>");
						echo("<th>".$vozv."</th><th>Возвещатели</th>");
						echo("<th>".$vtm."</th>");
						echo("<th>".$vpb."</th>");
						echo("<th>".$vib."</th>");
						echo("<th>".$vpp."</th>");
						echo("<th>".$vpv."</th>");
						echo("</tr>");





                        echo("<tr><th>".$ppio."</th><th bgcolor='#d1eaff'>Подсобные пионеры</th>");
						echo("<th>".$ptm."</th>");
                        echo("<th>".$ppb."</th>");
                        echo("<th>".$pib."</th>");
                        echo("<th>".$ppp."</th>");
                        echo("<th>".$ppv."</th>");
						echo("</tr>");


						echo("<tr>");
						echo("<th>".$pion."</th><th bgcolor='#FFDEAD'>Общии пионеры</th>");
						echo("<th>".$otm."</th>");
						echo("<th>".$opb."</th>");
						echo("<th>".$oib."</th>");
						echo("<th>".$opp."</th>");
						echo("<th>".$opv."</th>");
						echo("</tr>");


                        echo("<tr><th>".$vtot."</th><th  bgcolor='#EEE8AA'>Итого:</th>");
						echo("<th bgcolor='#EEE8AA'>".$tm."</th>");
                        echo("<th bgcolor='#EEE8AA'>".$pb."</th>");
                        echo("<th bgcolor='#EEE8AA'>".$ib."</th>");
                        echo("<th bgcolor='#EEE8AA'>".$pp."</th>");
                        echo("<th bgcolor='#EEE8AA'>".$pv."</th>");

                    


                        echo("</tr>");
						if($vtot==0){ $vtot =1;}
                        $ii=$vtot;
                        $stm= $tm / $ii;
                        $spb= $pb / $ii;
                        $sib= $ib / $ii;
                        $spp= $pp / $ii;
                        $spv= $pv / $ii;
                        echo("<tr><th></th><th >Среднее</th>");
						echo("<th>".round($stm, 1)."</th>");
                        echo("<th>".round($spb, 1)."</th>");
                        echo("<th>".round($sib, 1)."</th>");
                        echo("<th>".round($spp, 1)."</th>");
                        echo("<th>".round($spv, 1)."</th>");
						echo("</tr>");
											
				 
?>
															 
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

                                   
                    
<?
}
}
else
{
  header("location: /index.html");
}
?>

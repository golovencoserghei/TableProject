


<?php

if(!defined("AP")) exit("Доступ к файлу напрямую запрещен!");

if(auth===FALSE)
{
	
	header("location: /login.html");
}
if($user_arr[4]==6 or $user_arr[4]==3 or $user_arr[4]==4 or $user_arr[4]==9 )
{

	
	
    require_once("template/head.php");


	
    $mn=date("n");  
	$dy=date("j");
	


?>





<div class='d-flex align-items-center justify-content-between mt-40 mb-20'>
				<h4>Отчет о посещаемости</h4>

			</div>
			
			
			
			
			
		<?
		
		
$i = 9;
$c = 1;
while ($c <= 12) {
    
	

if($i==13){
	$i=1;
}

		
		
		?>	
			
			
			
			<div class='card'>
				<div class="col-xl-12">
                        
<div class='d-flex align-items-center justify-content-between mt-20 mb-20'>
				<h5><? echo nmonth($i);?> год</h5>

			</div>


				<div class='card-body pa-1'>
					<div class='table-wrap'>
						<div class='table-responsive'>




								 <table class="table table-secondary table-bordered mb-0">
									 <thead class="thead-secondary">
												<tr>
														<th class='not-sortable'><small>Встречи</small></th>
														<th class='not-sortable'><small>1-я неделя</small></th>
														<th class='not-sortable'><small>2-я неделя</small></th>
														<th class='not-sortable'><small>3-я неделя</small></th>
														<th class='not-sortable'><small>4-я неделя</small></th>
														<th class='not-sortable'><small>5-я неделя</small></th>
														<th class='not-sortable'><small>Всего</small></th>
														<th class='not-sortable'><small>Среднее число</small></th>






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
	
	


	echo("<tr><td><small>встреча</small></td>");
	
	$w_sluj_one=mysql_fetch_array(mysql_query("SELECT * FROM `cg_visit`  WHERE `cgr`='21' AND `mn`='".$i."' AND `yer`='2020' "));	//получаем номер месяца и год для отчетов
	
	//=====================================================
	
	if ($w_sluj_one['w1']==''){
		echo("<th><center><a href='visit.html&sub=add&w=w1&m=".$i."' alt='Добавить' title='Выписать' border='0'><span style='color: green;'><i class='fa fa-plus fa-lg' title='Создать запись'></i></span></a>
					           </th>");
	}
	else{
		$vi_w1=explode("|",$w_sluj_one['w1']);
		
		
		echo("<th><center>".$vi_w1[0]." <p> ".$vi_w1[1]."  <p>  <a href='visit.html&sub=edit&w=w1&m=".$i."' alt='Добавить' title='Выписать' border='0'><span style='color: green;'><i class='fa fa-pencil fa-lg' title='Редактировать запись'></i></span></a></th>");
	}
	
	
	
	//=====================================================
	if ($w_sluj_one['w2']==''){
		echo("<th><center><a href='visit.html&sub=add&w=w2&m=".$i."' alt='Добавить' title='Выписать' border='0'><span style='color: green;'><i class='fa fa-plus fa-lg' title='Создать запись'></i></span></a>
					           </th>");
	}
	else{
		$vi_w2=explode("|",$w_sluj_one['w2']);
		
		
		echo("<th><center>".$vi_w2[0]." <p> ".$vi_w2[1]."  <p>  <a href='visit.html&sub=edit&w=w2&m=".$i."' alt='Добавить' title='Выписать' border='0'><span style='color: green;'><i class='fa fa-pencil fa-lg' title='Создать запись'></i></span></a></th>");
	
	}
	
	
	//=====================================================
	if ($w_sluj_one['w3']==''){
		echo("<th><center><a href='visit.html&sub=add&w=w3&m=".$i."' alt='Добавить' title='Выписать' border='0'><span style='color: green;'><i class='fa fa-plus fa-lg' title='Создать запись'></i></span></a>
					           </th>");
	}
	else{
		$vi_w3=explode("|",$w_sluj_one['w3']);
		
	
		echo("<th><center>".$vi_w3[0]." <p> ".$vi_w3[1]."  <p>  <a href='visit.html&sub=edit&w=w3&m=".$i."' alt='Добавить' title='Выписать' border='0'><span style='color: green;'><i class='fa fa-pencil fa-lg' title='Создать запись'></i></span></a></th>");
	
	}
	
	//=====================================================
	if ($w_sluj_one['w4']==''){
		echo("<th><center><a href='visit.html&sub=add&w=w4&m=".$i."' alt='Добавить' title='Выписать' border='0'><span style='color: green;'><i class='fa fa-plus fa-lg' title='Создать запись'></i></span></a>
					           </th>");
	}
	else{
		$vi_w4=explode("|",$w_sluj_one['w4']);
		
		
		echo("<th><center>".$vi_w4[0]." <p> ".$vi_w4[1]."  <p>  <a href='visit.html&sub=edit&w=w4&m=".$i."' alt='Добавить' title='Выписать' border='0'><span style='color: green;'><i class='fa fa-pencil fa-lg' title='Создать запись'></i></span></a></th>");
	
	}
	
	//=====================================================
	if ($w_sluj_one['w5']==''){
		echo("<th><center><a href='visit.html&sub=add&w=w5&m=".$i."' alt='Добавить' title='Выписать' border='0'><span style='color: green;'><i class='fa fa-plus fa-lg' title='Создать запись'></i></span></a>
					           </th>");
	}
	else{
		$vi_w5=explode("|",$w_sluj_one['w5']);
		
		
		echo("<th><center>".$vi_w5[0]." <p> ".$vi_w5[1]."  <p>  <a href='visit.html&sub=edit&w=w5&m=".$i."' alt='Добавить' title='Выписать' border='0'><span style='color: green;'><i class='fa fa-pencil fa-lg' title='Создать запись'></i></span></a></th>");
	
	}
	
	$sum_w=$vi_w1[1] + $vi_w2[1] + $vi_w3[1] + $vi_w4[1] + $vi_w5[1];
	//$sum_w=$vi_w1[1]."|".$vi_w2[1]."|".$vi_w3[1]."|".$vi_w4[1]."|".$vi_w5[1];
	$sum_sr_w=$sum_w / 5;
	echo("<th>".$sum_w."</th>");
	echo("<th>".$sum_sr_w."</th>");



	unset($vi_w1);
	unset($vi_w2);
	unset($vi_w3);
	unset($vi_w4);
	unset($vi_w5);
	unset($sum_w);
	unset($sum_sr_w);

echo("</tr>");



echo("<tr><td>Публичная встреча</td>");
	
	
	//=====================================================
	
	if ($w_sluj_one['ww1']==''){
		echo("<th><center><a href='visit.html&sub=add&w=ww1&m=".$i."' alt='Добавить' title='Выписать' border='0'><span style='color: green;'><i class='fa fa-plus fa-lg' title='Создать запись'></i></span></a>
					           </th>");
	}
	else{
		$vi_ww1=explode("|",$w_sluj_one['ww1']);
		
		
		echo("<th><center>".$vi_ww1[0]." <p> ".$vi_ww1[1]."  <p>  <a href='visit.html&sub=edit&w=ww1&m=".$i."' alt='Добавить' title='Выписать' border='0'><span style='color: green;'><i class='fa fa-pencil fa-lg' title='Редактировать запись'></i></span></a></th>");
	}
	
	
	
	//=====================================================
	if ($w_sluj_one['ww2']==''){
		echo("<th><center><a href='visit.html&sub=add&w=ww2&m=".$i."' alt='Добавить' title='Выписать' border='0'><span style='color: green;'><i class='fa fa-plus fa-lg' title='Создать запись'></i></span></a>
					           </th>");
	}
	else{
		$vi_ww2=explode("|",$w_sluj_one['ww2']);
		
		
		echo("<th><center>".$vi_ww2[0]." <p> ".$vi_ww2[1]."  <p>  <a href='visit.html&sub=edit&w=ww2&m=".$i."' alt='Добавить' title='Выписать' border='0'><span style='color: green;'><i class='fa fa-pencil fa-lg' title='Создать запись'></i></span></a></th>");
	
	}
	
	
	//=====================================================
	if ($w_sluj_one['ww3']==''){
		echo("<th><center><a href='visit.html&sub=add&w=ww3&m=".$i."' alt='Добавить' title='Выписать' border='0'><span style='color: green;'><i class='fa fa-plus fa-lg' title='Создать запись'></i></span></a>
					           </th>");
	}
	else{
		$vi_ww3=explode("|",$w_sluj_one['ww3']);
		
		
		echo("<th><center>".$vi_ww3[0]." <p> ".$vi_ww3[1]."  <p>  <a href='visit.html&sub=edit&w=ww3&m=".$i."' alt='Добавить' title='Выписать' border='0'><span style='color: green;'><i class='fa fa-pencil fa-lg' title='Создать запись'></i></span></a></th>");
	
	}
	
	//=====================================================
	if ($w_sluj_one['ww4']==''){
		echo("<th><center><a href='visit.html&sub=add&w=ww4&m=".$i."' alt='Добавить' title='Выписать' border='0'><span style='color: green;'><i class='fa fa-plus fa-lg' title='Создать запись'></i></span></a>
					           </th>");
	}
	else{
		$vi_ww4=explode("|",$w_sluj_one['ww4']);
		

		echo("<th><center>".$vi_ww4[0]." <p> ".$vi_ww4[1]."  <p>  <a href='visit.html&sub=edit&w=ww4&m=".$i."' alt='Добавить' title='Выписать' border='0'><span style='color: green;'><i class='fa fa-pencil fa-lg' title='Создать запись'></i></span></a></th>");
	
	}
	
	//=====================================================
	if ($w_sluj_one['ww5']==''){
		echo("<th><center><a href='visit.html&sub=add&w=ww5&m=".$i."' alt='Добавить' title='Выписать' border='0'><span style='color: green;'><i class='fa fa-plus fa-lg' title='Создать запись'></i></span></a>
					           </th>");
	}
	else{
		$vi_ww5=explode("|",$w_sluj_one['ww5']);
		
	
		echo("<th><center>".$vi_ww5[0]." <p> ".$vi_ww5[1]."  <p>  <a href='visit.html&sub=edit&w=ww5&m=".$i."' alt='Добавить' title='Выписать' border='0'><span style='color: green;'><i class='fa fa-pencil fa-lg' title='Создать запись'></i></span></a></th>");
	
	}
	
	$sum_ww=$vi_ww1[1] + $vi_ww2[1] + $vi_ww3[1] + $vi_ww4[1] + $vi_ww5[1];
	$sum_sr_ww=$sum_ww / 5;
	echo("<th>".$sum_ww."</th>");
	echo("<th>".$sum_sr_ww."</th>");
	
	unset($vi_ww1);
	unset($vi_ww2);
	unset($vi_ww3);
	unset($vi_ww4);
	unset($vi_ww5);
	unset($sum_ww);
	unset($sum_sr_ww);



echo("</tr>");
	
	
	

	



?>




</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	</div>
				
	
<?
$i++;
$c++;
}
}
else{
		header("location: /index.html");
	}
?>



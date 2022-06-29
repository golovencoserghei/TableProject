<?
$site_arr=mysql_query("SELECT * FROM `tb_date` WHERE `date` between '".$_SESSION['fdw']."' AND '".$_SESSION['ldw']."'");
	
	while($row=mysql_fetch_array($site_arr))
	{
	 $one=mysql_fetch_array(mysql_query("SELECT `su_time`,`mo_time`,`tu_time`,`we_time`,`th_time`,`fr_time`,`sa_time`,`su_time` FROM `tb_congr` WHERE `id`='".$seltb[0]."'"));
	 $stat_add_us=mysql_fetch_array(mysql_query("SELECT `stat_add_us` FROM `tb_congr` WHERE `id`='$seltb[0]'"));
     $wday=''; 
	 if($row[2]==1){
		 $wday="Понедельник";
	 } 
	 elseif($row[2]==2){
		 $wday="Вторник";
	 } 
	 elseif($row[2]==3){
		 $wday="Среда";
	 } 
	 elseif($row[2]==4){
		 $wday="Четверг";
	 } 
	 elseif($row[2]==5){
		 $wday="Пятница";
	 } 
	 elseif($row[2]==6){
		 $wday="Суббота";
	 } 
	 elseif($row[2]==0){
		 $wday="Воскресенье";
	 } 
	 
	 
	 $inv=explode("-",$row[1]);	
	 $invers_date=$inv[2].'-'.$inv[1].'-'.$inv[0];
	 
	 echo("
	<div id='".$row[2]."'class='box-header with-border'>
	 <h3 class='box-title'>".$wday."  ".$invers_date."</h3>
     </div>
	 <div class='records--list' data-title='Product Listing'>
	<table class='table table-bordered'>
                            <thead>
                                <tr>
                                    <th>Время</th>
                                    <th class='not-sortable'>Возвещатель</th>
                                    <th class='not-sortable'>Возвещатель</th>
                                    <th>Функции</th>
                                </tr>
                            </thead>
   ");
 
    $d=$row[2]; 
	$one=explode("|",$one[$d]);
    foreach($one as $key => $value)
	{
		if($key==0 and $value=='00:00'){
			echo("<tr><th colspan='4' bgcolor='#FA8072' >В этот день нет служения со стендом</th></tr>");
		}
		else{
		$f_u=mysql_fetch_array(mysql_query("SELECT `user1`,`user2` FROM `".$table_con."` WHERE `date`='".$row[0]."' AND `time`='".$key."'"));
     
		if($f_u[0] == 0 or $f_u[1] == 0 ) {
	
	    
		
		if($f_u[0] == 0) {
			
		$us_name=mysql_fetch_array(mysql_query("SELECT `name`,`id` FROM `users` WHERE `id`='".$f_u[1]."'"));
		   echo("
				<tr>
				<th >".$value."</th>
				<td"); 
					if ($f_u[1]>0){
					echo(" bgcolor='#FFA07A'");
					}
					
					echo(">".$us_name[0]." ");
				
				if($f_u[1]!=0){
						echo("<a href='indextest.html&sub=delete&use=".$f_u[1]."&did=".$row[0]."&tid=".$key."&fid=".$row[2]."&ti=".str_replace([':'], ['f'], $value)."' alt='Выписать' title='Выписать' border='0'><img src='template/apimages/delete.png' width='20' height='20'></a>");
					}
				
		echo("
			</td>
				");
	      
		  
		  if($f_u[0] == 0) {
			 echo(" 
			        <td><a  href='indextest.html&sub=partner&did=".$row[0]."&tid=".$key."&fid=".$row[2]."&ti=".str_replace([':'], ['f'], $value)."'><center><span style='color: green;'><i class='fa fa-plus' title='Записать напарника'></i></span></center></a>
			     </td>
			     ");
		  }
		  
	  }
	  
	    
		
		elseif($f_u[1] == 0) {
		   	
		$us_name=mysql_fetch_array(mysql_query("SELECT `name`,`id` FROM `users` WHERE `id`='".$f_u[0]."'"));
			echo("
					<tr><th >".$value." </th>
					<td"); 
					if ($f_u[0]>0){
					echo(" bgcolor='#FFA07A'");
					}
					
					echo(">".$us_name[0]." ");
								
				
				if($f_u[0]!=0){
					
					
					
						echo("<a href='indextest.html&sub=delete&use=".$f_u[0]."&did=".$row[0]."&tid=".$key."&fid=".$row[2]."&ti=".str_replace([':'], ['f'], $value)."	' alt='Выписать' title='Выписать' border='0'><img src='template/apimages/delete.png' width='20' height='20'></a>");
					}
				
	
			echo("</td>
			");
		 
			if($f_u[1] == 0 ) {
			 echo(" 
			        <td><a  href='indextest.html&sub=partner&did=".$row[0]."&tid=".$key."&fid=".$row[2]."&ti=".str_replace([':'], ['f'], $value)."'><center><span style='color: green;'><i class='fa fa-plus' title='Записать напарника'></i></span></center></a>  </td>
			     ");
			}
			else {
			  echo(" 
			        <td> </td>
			     ");
			  
		  }
		  }
		  
		  
		  
   }
   
   
   
   else {
	   $user0=mysql_fetch_array(mysql_query("SELECT `name`,`id` FROM `users` WHERE `id`='".$f_u[0]."'"));
	   $user1=mysql_fetch_array(mysql_query("SELECT `name`,`id` FROM `users` WHERE `id`='".$f_u[1]."'"));

	echo("
	<tr>
      <th>".$value."");
	  if($f_u[0] == $user_arr[0] or $f_u[1] == $user_arr[0]){
	
	echo("<a  href='index.html&sub=raport&did=".$row[0]."&tid=".$key."'><i class='icon icon-notebook2 green-text s-18'></i></a>");
	  }
	  
	 echo(" 
	  </th>
      <td bgcolor='#90EE90'> ".$user0[0]."");
	  
		if($user0[0]!=$user_arr[0] ){
				echo(" <a href='indextest.html&sub=delete&use=".$f_u[0]."&did=".$row[0]."&tid=".$key."&fid=".$row[2]."&ti=".str_replace([':'], ['f'], $value)."' alt='Выписать' title='Выписать' border='0'><img src='template/apimages/delete.png' width='20' height='20'></a> ");
		
		}
	  
	
	  
	  echo("</td>
	  <td bgcolor='#90EE90'> ".$user1[0]."");
	  
	  if($user1[0] != $user_arr[0] ){
		  
		  
		  
				echo(" <a href='indextest.html&sub=delete&use=".$f_u[1]."&did=".$row[0]."&tid=".$key."&fid=".$row[2]."&ti=".str_replace([':'], ['f'], $value)."' alt='Выписать' title='Выписать' border='0'><img src='template/apimages/delete.png' width='20' height='20'></a> ");
		
		}
	
	  echo("</td> ");
	 
	  
   }
   
   
   
   if($f_u[0] == $user_arr[0] or $f_u[1] == $user_arr[0]){
	 
	 echo("
		<td >
		<a href='indextest.html&sub=delete&use=".$user_arr[0]."&did=".$row[0]."&tid=".$key."&fid=".$row[2]."&ti=".str_replace([':'], ['f'], $value)."' alt='Выписаться' title='Выписаться' border='0'><img src='template/apimages/delete.png' width='20' height='20'></a>
		</td>
		");
	  }
	
	
	elseif($f_u[0] == 0 OR $f_u[1] == 0){
		   
		   if($stat_add_us[0] == 2){
		   echo("<td><a href='index.html&sub=add&did=".$row[0]."&tid=".$key."&fid=".$row[2]."&ti=".str_replace([':'], ['f'], $value)."' alt='Записаться' title='Записаться' border='0'><img src='template/apimages/edit.png' width='20' height='20'></a></td>");
		   }
				else{
						echo("<td></td>");
				}
	
	}
 
	
	else{
		   echo("<td></td>");
	}
	  
	
		}
	
	}
	
	
   echo("<tr>
          </tbody>
            </table>
               </div>
               
		");
	}
	



$json = json_encode($info);
// создаем новый файл
$file = fopen('new.json', 'a');
// и записываем туда данные
$write = fwrite($file,$json);
// проверяем успешность выполнения операции
if($write) echo "Данные успешно записаны!<br>";
else echo "Не удалось записать данные!<br>";
//закрываем файл
fclose($file);
?>
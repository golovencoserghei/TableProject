<?php 
if(!defined("AP")) exit("Доступ к файлу напрямую запрещен!");

if(auth===FALSE or $user_arr[4]!=0)
{
	header("location: /login.html");
	}
	require_once("template/head.php");


	//if($user_arr[4]==0)
//{
//	header("location: /index.html&sub=panel");
//}
	$pref=mysql_fetch_array(mysql_query("SELECT `stend_location` FROM `tb_congr` WHERE `uid`='".$user_arr[6]."'"));
	$name_congr=mysql_fetch_array(mysql_query("SELECT `ne_cong` FROM `tb_congr` WHERE `uid`='".$user_arr[6]."'"));
?>



		
		
<main class="main--container">
		<section class="main--content">
                <div class="row gutter-20">
 
                                   
									
                                  
    <?
	
	$e=0;
if ($user_arr[6]==0){
		echo ("");
	}
    
else{
	$weak=mysql_fetch_array(mysql_query("SELECT `fdate_this`,`ldate_this` FROM `tb_congr` WHERE `uid`='".$user_arr[6]."'")); 	
	$fday=$weak[0];
	$lday=$weak[1];
	
	$pref=mysql_fetch_array(mysql_query("SELECT `pref` FROM `tb_congr` WHERE `uid`='".$user_arr[6]."'"));
    $select_table="tb_stend_".$pref[0]."";
		
    $site_arr=mysql_query("SELECT * FROM `tb_date` WHERE `date` between '".$fday."' AND '".$lday."'");
     
	while($row=mysql_fetch_array($site_arr))
	{
	 $one=mysql_fetch_array(mysql_query("SELECT `su_time`,`mo_time`,`tu_time`,`we_time`,`th_time`,`fr_time`,`sa_time` FROM `tb_congr` WHERE `uid`='$user_arr[6]'"));
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
	 echo("
	 <div class='box'>  
	 <div class='box-header with-border'>
	 <h3 class='box-title'>".$wday." ".$row[1]."</h3>
     </div>			
	<div class='box-body'>
	<table class='table table-bordered'>
    <thead>
    <tr>     <th style='width: 20px'>Время</th>  <th>Возвещатель</th>   <th>Возвещатель</th>  <th style='width: 100px'>Фунции</th>  </tr>
	 </thead>
	 <tbody>
   ");
 
    $d=$row[2];
	$one=explode("|",$one[$d]);
    foreach($one as $key => $value)
	{
		
	//did = это id даты в таблице дат
	//
		$f_u=mysql_fetch_array(mysql_query("SELECT `user1`,`user2` FROM `".$select_table."` WHERE `date`='".$row[0]."' AND `time`='".$key."'"));
  
  
		if($f_u[0] == 0 or $f_u[1] == 0) {
	
	    if($f_u[0] == 0) {
			
		$us_name=mysql_fetch_array(mysql_query("SELECT `name` FROM `users` WHERE `id`='".$f_u[1]."'"));
		   echo("
				<tr>
				<th >".$value."</th>
				<td>".$us_name[0]."</td>
				<td></td>
				"); 
		}	
	  
	    elseif($f_u[1] == 0) {
		   	
				$us_name=mysql_fetch_array(mysql_query("SELECT `name` FROM `users` WHERE `id`='".$f_u[0]."'"));
		   echo("
				<tr>
				<th >".$value."</th>
				<td>".$us_name[0]." <a href='admin.html&sub=delpartner&use=".$f_u[0]."&did=".$row[0]."&tid=".$key."' alt='Выписаться' title='Выписаться' border='0'><i class='icon icon-close red-text s-18'></i></a></td>
				 <td></td>
				");
		}
		
		
   }
   
  


  else {
	   $user0=mysql_fetch_array(mysql_query("SELECT `name` FROM `users` WHERE `id`='".$f_u[0]."'"));
	   $user1=mysql_fetch_array(mysql_query("SELECT `name` FROM `users` WHERE `id`='".$f_u[1]."'"));

	echo("
	<tr>
      <th >".$value."</th>
      <td>".$user0[0]."<a href='admin.html&sub=delpartner&use=".$f_u[0]."&did=".$row[0]."&tid=".$key."' alt='Выписаться' title='Выписаться' border='0'><i class='icon icon-close red-text s-18'></i></a></td>
      <td>".$user1[0]."<a href='admin.html&sub=delpartner&use=".$f_u[1]."&did=".$row[0]."&tid=".$key."' alt='Выписаться' title='Выписаться' border='0'><i class='icon icon-close red-text s-18'></i></a></td>
	  ");
	}
   
   
   
   
   
   
   if($f_u[0] == $user_arr[0] or $f_u[1] == $user_arr[0]){
	  echo("
      <td>");
	
	echo("
      <a href='admin.html&sub=delete&use=".$user_arr[0]."&did=".$row[0]."&tid=".$key."' alt='Выписаться' title='Выписаться' border='0'><img src='template/apimages/delete.png' width='20' height='20'></a>
    ");
	echo(" ");
	$get_os = getOS($_SERVER['HTTP_USER_AGENT']);
	if($get_os == 1)
	{echo("
     <a  href='admin.html&sub=reportmob&did=".$row[0]."'><img src='template/apimages/ok.png' width='20' height='20'></a>
    ");
	}
	else{
	echo("
     <a  class='demo3_order_button' data-book1='10'><img src='template/apimages/info.png' width='20' height='20'></a>
    ");
	}
	echo("
      </td>
    ");
	  }
	  
	  
	  
	elseif($f_u[0] == 0 or $f_u[0] == 1 or $f_u[0] == 2 or $f_u[0] == 3 OR $f_u[1] == 0 or $f_u[1] == 1 or $f_u[1] == 2 or $f_u[1] == 3){
		   echo("<td><a href='admin.html&sub=addpartner&did=".$row[0]."&tid=".$key."' alt='Записаться' title='Записаться' border='0'><img src='template/apimages/edit.png' width='20' height='20'></a></td>");
	}
	
	else{
		   echo("<td></td>");
	}
	  
	
	
	}
	
	
   echo("
   		<tr>
         </tbody>
           </table>
             </div>

			");
	}
	}
  
  
  ?>
  
  			   							

                    </div>
                </div>
            </section>
        </div>
    </div>
</div>



<div class="tab-pane animated fadeInUpShort" id="v-pills-2">


 <div class="content-wrapper animatedParent animateOnce">
        <div class="container">
            <section class="paper-card">
                <div class="row">
                    <div class="col-lg-12">
					 
					
					 <?
	
		
    $weak=mysql_fetch_array(mysql_query("SELECT `fday_week_next`,`lday_week_next` FROM `tb_congr` WHERE `uid`='".$user_arr[6]."'")); 
	
	$fday=$weak[0];
	$lday=$weak[1];			
	
	 $pref=mysql_fetch_array(mysql_query("SELECT `pref` FROM `tb_congr` WHERE `uid`='".$user_arr[6]."'"));
     $select_table="tb_stend_".$pref[0]."";
		
     $site_arr=mysql_query("SELECT * FROM `tb_date` WHERE `date` between '".$fday."' AND '".$lday."'");
     
	 while($row=mysql_fetch_array($site_arr))
	{
	 $one=mysql_fetch_array(mysql_query("SELECT `su_time`,`mo_time`,`tu_time`,`we_time`,`th_time`,`fr_time`,`sa_time` FROM `tb_congr` WHERE `uid`='$user_arr[6]'"));
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
	 echo("
	 <div class='box'>  
	 <div class='box-header with-border'>
	 <h3 class='box-title'>".$wday." ".$row[1]."</h3>
     </div>			
	<div class='box-body'>
	<table class='table table-bordered'>
    <thead>
    <tr>     <th style='width: 20px'>Время</th>  <th>Возвещатель</th>   <th>Возвещатель</th>  <th style='width: 100px'>Фунции</th>  </tr>
	 </thead>
	 <tbody>
   ");
 
    $d=$row[2];
	$one=explode("|",$one[$d]);
    foreach($one as $key => $value)
	{
		
	//did = это id даты в таблице дат
	//
		$f_u=mysql_fetch_array(mysql_query("SELECT `user1`,`user2` FROM `".$select_table."` WHERE `date`='".$row[0]."' AND `time`='".$key."'"));
  
  
		if($f_u[0] == 0 or $f_u[1] == 0) {
	
	    if($f_u[0] == 0) {
			
		$us_name=mysql_fetch_array(mysql_query("SELECT `name` FROM `users` WHERE `id`='".$f_u[1]."'"));
		   echo("
				<tr>
				<th >".$value."</th>
				<td>".$us_name[0]."</td>
				<td></td>
				");
				}	
	  
	    elseif($f_u[1] == 0) {
		   	
				$us_name=mysql_fetch_array(mysql_query("SELECT `name` FROM `users` WHERE `id`='".$f_u[0]."'"));
		   echo("
				<tr>
				<th >".$value."</th>
				<td>".$us_name[0]." <a href='admin.html&sub=delpartner&use=".$f_u[0]."&did=".$row[0]."&tid=".$key."' alt='Выписаться' title='Выписаться' border='0'><i class='icon icon-close red-text s-18'></i></a></td>
				<td></td>
				");
				}
		
		
   }
   
   else {
	   $user0=mysql_fetch_array(mysql_query("SELECT `name` FROM `users` WHERE `id`='".$f_u[0]."'"));
	   $user1=mysql_fetch_array(mysql_query("SELECT `name` FROM `users` WHERE `id`='".$f_u[1]."'"));

	echo("
	<tr>
      <th >".$value."</th>
      <td>".$user0[0]." <a href='admin.html&sub=delpartner&use=".$f_u[0]."&did=".$row[0]."&tid=".$key."' alt='Выписать' title='Выписать' border='0'><i class='icon icon-close red-text s-18'></i></a></td>
      <td>".$user1[0]." <a href='admin.html&sub=delpartner&use=".$f_u[1]."&did=".$row[0]."&tid=".$key."' alt='Выписать' title='Выписать' border='0'><i class='icon icon-close red-text s-18'></i></a></td>
	  ");
	}
   
   
   
   if($f_u[0] == $user_arr[0] or $f_u[1] == $user_arr[0]){
	  echo("
      <td>");
	
	echo("
      <a href='index.html&sub=delete&use=".$user_arr[0]."&did=".$row[0]."&tid=".$key."' alt='Выписаться' title='Выписаться' border='0'><img src='template/apimages/delete.png' width='20' height='20'></a>
    ");
	echo(" ");
	$get_os = getOS($_SERVER['HTTP_USER_AGENT']);
	if($get_os == 1)
	{echo("
     <a  href='index.html&sub=reportmob&did=".$row[0]."'><img src='template/apimages/ok.png' width='20' height='20'></a>
    ");
	}
	else{
	echo("
     <a  class='demo3_order_button' data-book1='10'><img src='template/apimages/info.png' width='20' height='20'></a>
    ");
	}
	echo("
      </td>
    ");
	  }
	elseif($f_u[0] == 0 or $f_u[0] == 1 or $f_u[0] == 2 or $f_u[0] == 3 OR $f_u[1] == 0 or $f_u[1] == 1 or $f_u[1] == 2 or $f_u[1] == 3){
		   echo("<td><a href='admin.html&sub=addpartner&did=".$row[0]."&tid=".$key."' alt='Записаться' title='Записаться' border='0'><img src='template/apimages/edit.png' width='20' height='20'></a></td>");
	}
	
	else{
		   echo("<td></td>");
	}
	  
	
	
	}
	
	
   echo("
   		<tr>
                                    </tbody>
                                </table>
                            </div>

			");
	
	
	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
  
  ?>
					
					
					
					
					</div>
				 </div>
            </section>
        </div>
    </div>

</div>

</div>
</div>



<div class="control-sidebar-bg shadow white fixed"></div>

		
	                   
					   
				
					
<?php
if(!defined("AP")) exit("Доступ к файлу напрямую запрещен!");

if(auth===FALSE)
{
	header("location: /login.html");
}

if($user_arr['stand']==0)
{
	//header("location: /report.html");
	
}



	//$weak=mysql_fetch_array(mysql_query("SELECT `fdate_this`,`ldate_this`,`fday_week_next`,`lday_week_next`,`next_table_activ` FROM `tb_congr` WHERE `uid`='".$user_arr[6]."'"));
	$weak=mysql_fetch_array(mysql_query("SELECT `f_tweak`,`l_tweak`,`f_nweak`,`l_nweak` FROM `cfg_tb_date` WHERE `id`=1"));
	$wkopen=mysql_fetch_array(mysql_query("SELECT * FROM `tb_congr` WHERE `id`='".$user_arr[6]."'"));
	$last_update=mysql_query("UPDATE `users` SET `lastdate`='".date("d.m.Y H:i")."' WHERE `id`='".$user_arr[0]."'");
				
		$tb_get_cfg=mysql_fetch_array(mysql_query("SELECT * FROM `tb_congr` WHERE `id`='".$user_arr[6]."'"));
		$cfg=explode("|",$tb_get_cfg['param']);

	require_once("template/head.php");
	
	if($user_arr['mail']=='0' or $user_arr['mail']==''){
		$mes_no_email='Пожалуйста укажите ваш Email адрес (Правый верхний угол значек "Шестиренки" перейдя на страницу "Настройки Профиля" заполните поле ниже "Ваш почтовый адрес")';
		msg($mes_no_email,"err");
	}

	if($user_arr[6]!=0){
		
		
		
		
		if($_SESSION['tcon']=='tb_stend_'){
			
			$pref=mysql_fetch_array(mysql_query("SELECT `pref` FROM `tb_congr` WHERE `id`='".$user_arr[6]."'"));
			$_SESSION['tcon']="tb_stend_".$pref[0]."";
			
		}

		$stlocat=mysql_fetch_array(mysql_query("SELECT `st_loc`,`ne_cong` FROM `tb_congr` WHERE `id`='".$user_arr[6]."'"));

		$finv=explode("-",$weak[2]);
		 $finvers_date=$finv[2].'-'.$finv[1].'-'.$finv[0];
		$linv=explode("-",$weak[3]);
		 $linvers_date=$linv[2].'-'.$linv[1].'-'.$linv[0];
		echo("

		<div class='row'>
						<div class='col-xl-12'>
					<div class='col-md-10'>
			 <div class='records--list' data-title='Product Listing'>
			<table class='table table-bordered'>
		     <thead>
		      <tr>
		          <th bgcolor='#FFA500'><center> ".$st_hd_tw.$finvers_date.$st_hd_tw2.$linvers_date."</center> </th>
		            </tr>
		               </thead>
						<tbody>
							<tr><th bgcolor='#FFA500' ><center>".$st_cgr.$stlocat[1].$st_stn.$stlocat[0]."</center></th></tr><tr>
		          </tbody>
		            </table>
		               </div>");



	?>



	<ul class="nav nav-tabs  nav-tabs-line">
        <li class="nav-item">
			<a href="stand.html" class="nav-link"><? echo $st_thw;?></a>
        </li>
        <li class="nav-item">
            <a href="stand.html&p=n" class="nav-link active"><? echo $st_nxw;?></a>
        </li>
        <li class="nav-item">
            <a href="#info" data-toggle="tab" class="nav-link"><? echo $st_pbh;?></a>
        </li>
		
		<? if ($cfg[1] == 1){ ?> <li class="nav-item">
            <a href="#inforap" data-toggle="tab" class="nav-link"><? echo $st_infrap;?></a>
        </li>
		<? } ?>
		
    </ul>

<?
if($wkopen[17]==1 or $user_arr[4]==2 or $user_arr[4]==9){

?>

	<div class="tab-content">

					<?
	echo("<div class='tab-pane fade show active' id='thisw'>");
	



	$site_arr=mysql_query("SELECT * FROM `tb_date` WHERE `date` between '".$weak[2]."' AND '".$weak[3]."'");

	while($row=mysql_fetch_array($site_arr))
	{
	 $one=mysql_fetch_array(mysql_query("SELECT `su_time`,`mo_time`,`tu_time`,`we_time`,`th_time`,`fr_time`,`sa_time`,`su_time` FROM `tb_congr` WHERE `id`='$user_arr[6]'"));
	 $stat_add_us=mysql_fetch_array(mysql_query("SELECT `stat_add_us` FROM `tb_congr` WHERE `uid`='$user_arr[6]'"));
     $wday='';
	 if($row[2]==1){
		 $wday=$wk_mo;
	 }
	 elseif($row[2]==2){
		 $wday=$wk_tu;
	 }
	 elseif($row[2]==3){
		 $wday=$wk_we;
	 }
	 elseif($row[2]==4){
		 $wday=$wk_th;
	 }
	 elseif($row[2]==5){
		 $wday=$wk_fr;
	 }
	 elseif($row[2]==6){
		 $wday=$wk_sa;
	 }
	 elseif($row[2]==0){
		 $wday=$wk_su;
	 }


	 $inv=explode("-",$row[1]);
	 $invers_date=$inv[2].'-'.$inv[1].'-'.$inv[0];




	 echo("
        <div id='".$row[2]."' class='d-flex align-items-center justify-content-between mt-40 mb-20'>
	 							<h4>".$wday."  ".$invers_date."</h4>

	 						</div>
	 						<div class='card'>
	 							<div class='card-body pa-0'>
	 								<div class='table-wrap'>
	 									<div class='table-responsive'>




	                       <table class='table table-sm table-hover mb-0'>
                            <thead>
                                <tr>
                                    <th class='not-sortable'>".$st_tm."</th>
                                    <th class='not-sortable'>".$st_tbpd."</th>
                                    
									
								");

								 if($cfg[1] == 1) {
							echo "<th class='not-sortable'>".$st_rap."</th>";
								 }
							
							
echo("
                                </tr>
                            </thead>
                            <tbody>
   ");




$d=$row[2];
$one=explode("|",$one[$d]);
foreach($one as $key => $value){


if($key==0 and $value=='00:00'){
       echo("<tr><td colspan='4' bgcolor='#FFA07A' ><font size='2' color='#000000' face='Arial'>".$st_inf_no."</font></td></tr>");
}



else{


$f_u=mysql_fetch_array(mysql_query("SELECT `user1`,`user2`,`user3` FROM `".$_SESSION['tcon']."` WHERE `date`='".$row[0]."' AND `time`='".$key."'"));
if($f_u[0] == 0 or $f_u[1] == 0 or $f_u[2] == 0 ) {


$prt=0;



if($f_u[0] != 0) {

		        $us_name=mysql_fetch_array(mysql_query("SELECT `name`,`id` FROM `users` WHERE `id`='".$f_u[0]."'"));
			
				
				echo("<tr><th>".$value."</th><td"); 
				  
				if ($f_u[1]!=0 or $f_u[2]!=0 ){ 
						echo(" bgcolor='#FFFF00'"); 
				}

				else {
					echo(" bgcolor='#FFA07A'"); 
				}
						
						
					echo(">".$us_name[0]." ");

           
					  
				if($cfg[0]==1 or $user_arr[4]!=1){
							echo("<a href='stand.html&sub=mdl&p=n&use=".$f_u[0]."&did=".$row[0]."&tid=".$key."&fid=".$row[2]."&ti=".str_replace([':'], ['f'], $value)."&token=".substr(md5($f_u[0].$row[0].$key.$row[2].str_replace([':'], ['f'], $value)),1,10)."' alt='Выписать' title='Выписать' border='0'><img src='template/apimages/delete.png' width='20' height='20'></a>");
					  }
            
                echo("</td>
				  
				  </tr>");


}
else{$prt++;}



if($f_u[1] != 0) {

		$us_name=mysql_fetch_array(mysql_query("SELECT `name`,`id` FROM `users` WHERE `id`='".$f_u[1]."'"));
                  echo("<tr><th></th><td"); 
				
				if ($f_u[0]!=0 or $f_u[2]!=0 ){
					  echo(" bgcolor='#FFFF00'");
					  } 
					  else{
						 echo(" bgcolor='#FFA07A'");  
					  }
				  
				  echo(">".$us_name[0]." ");

				
				if($cfg[0]==1 or $user_arr[4]!=1){
								  
                        echo("<a href='stand.html&sub=mdl&p=n&use=".$f_u[1]."&did=".$row[0]."&tid=".$key."&fid=".$row[2]."&ti=".str_replace([':'], ['f'], $value)."&token=".substr(md5($f_u[1].$row[0].$key.$row[2].str_replace([':'], ['f'], $value)),1,10)."' alt='Выписать' title='Выписать' border='0'><img src='template/apimages/delete.png' width='20' height='20'></a>");
					           
				}	
							  
					echo("</td></tr>");
}
else{$prt++;} 

		            
					
					
     
if($f_u[2] != 0) {

		              $us_name=mysql_fetch_array(mysql_query("SELECT `name`,`id` FROM `users` WHERE `id`='".$f_u[2]."'"));
                  echo("<tr><th></th><td"); 
				  
				  if ($f_u[1]!=0 or $f_u[0]!=0 ){ 
					echo(" bgcolor='#FFFF00'"); 
				  }
				  else {
						 echo(" bgcolor='#FFA07A'");  
					  }
				  
				  echo(">".$us_name[0]." ");

				    
								 if($cfg[0]==1 or $user_arr[4]!=1){
								  
                        echo("<a href='stand.html&sub=mdl&p=n&use=".$f_u[2]."&did=".$row[0]."&tid=".$key."&fid=".$row[2]."&ti=".str_replace([':'], ['f'], $value)."&token=".substr(md5($f_u[2].$row[0].$key.$row[2].str_replace([':'], ['f'], $value)),1,10)."' alt='Выписать' title='Выписать' border='0'><img src='template/apimages/delete.png' width='20' height='20'></a>");
					           
							  }	
							  
                      
				echo("</td></tr>");	  
}
else{$prt++;}

					
if($prt!=3){
	
	 echo("<tr><th></th>"); 

			                     echo("<td><a href='stand.html&sub=partner&p=n&did=".$row[0]."&tid=".$key."&fid=".$row[2]."&ti=".str_replace([':'], ['f'], $value)."&token=".substr(md5($row[0].$key.$row[2].str_replace([':'], ['f'], $value)),1,10)."''><center><span style='color: green;'><i class='fa fa-plus' title='Записать напарника'></i></span></center></a>  </td>");

}			
					
					
echo("<tr height='1' colspan='2'> </tr>");
	 }






else{

        $user0=mysql_fetch_array(mysql_query("SELECT `name`,`id` FROM `users` WHERE `id`='".$f_u[0]."'"));
        $user1=mysql_fetch_array(mysql_query("SELECT `name`,`id` FROM `users` WHERE `id`='".$f_u[1]."'"));
        $user2=mysql_fetch_array(mysql_query("SELECT `name`,`id` FROM `users` WHERE `id`='".$f_u[2]."'"));

echo("<tr><th>".$value."</th>");

                     

	                   echo("<td bgcolor='#90EE90'>".$user0[0]."");

                     
						if($cfg[0]==1 or $user_arr[4]!=1){
				                   echo(" <a href='stand.html&sub=mdl&p=n&use=".$f_u[0]."&did=".$row[0]."&tid=".$key."&fid=".$row[2]."&ti=".str_replace([':'], ['f'], $value)."&token=".substr(md5($f_u[0].$row[0].$key.$row[2].str_replace([':'], ['f'], $value)),1,10)."'' alt='Выписать' title='Выписать' border='0'><img src='template/apimages/delete.png' width='20' height='20'></a> ");
						 
						 }
						
					   
	                   echo("</td> ");
	                   echo("</tr> ");
					   
					  
echo("<tr><th></th>");
						
	                   echo("<td bgcolor='#90EE90'> ".$user1[0]."");

	                  
						  if($cfg[0]==1 or $user_arr[4]!=1){
                                echo(" <a href='stand.html&sub=mdl&p=n&use=".$f_u[1]."&did=".$row[0]."&tid=".$key."&fid=".$row[2]."&ti=".str_replace([':'], ['f'], $value)."&token=".substr(md5($f_u[1].$row[0].$key.$row[2].str_replace([':'], ['f'], $value)),1,10)."' alt='Выписать' title='Выписать' border='0'><img src='template/apimages/delete.png' width='20' height='20'></a> ");
                   
						   				   
						   }
				
					echo("</td> </tr> ");
					  
echo("<tr><th></th>");
						
	                   echo("<td bgcolor='#90EE90'> ".$user2[0]."");

	                  
						  if($cfg[0]==1 or $user_arr[4]!=1){
                                echo(" <a href='stand.html&sub=mdl&p=n&use=".$f_u[2]."&did=".$row[0]."&tid=".$key."&fid=".$row[2]."&ti=".str_replace([':'], ['f'], $value)."&token=".substr(md5($f_u[2].$row[0].$key.$row[2].str_replace([':'], ['f'], $value)),1,10)."' alt='Выписать' title='Выписать' border='0'><img src='template/apimages/delete.png' width='20' height='20'></a> ");
                   
						   			   
						   }
				
					echo("</td> </tr> ");
}

if($f_u[0] == 0 and $f_u[1] == 0 and $f_u[2] == 0 ) {
	
	 echo("<tr><th>".$value."</th>"); 

                      
			                     echo("<td><a href='stand.html&sub=partner&p=n&did=".$row[0]."&tid=".$key."&fid=".$row[2]."&ti=".str_replace([':'], ['f'], $value)."&token=".substr(md5($row[0].$key.$row[2].str_replace([':'], ['f'], $value)),1,10)."'><center><span style='color: green;'><i class='fa fa-plus' title='Записать напарника'></i></span></center></a>  </td>");
			                
	
	
	
}




}



}




   echo("
	 </tbody>
						 </table>
					 </div>
				 </div>
			 </div>
		 </div>");
}

}
else{

$wtex = tnweak($tb_get_cfg[16]); 
		echo"<div class='tab-pane fade show active' id='neww'>
    <br>
	 <div class='records--list' data-title='Product Listing'>
	<table class='table table-bordered'>
     <thead>
      <tr>
          <th bgcolor='#FA8072' >
            </tr>
               </thead>
				<tbody>
					<tr><td bgcolor='#98FB98' >Таблица на следующую неделю будет доступна в ".$wtex.".</td></tr>


          </tbody>
            </table>
               </div>
		";
	}

					?>
					
					
					
					
					


    </div>


		  <div class="tab-pane fade" id="info">

		  <?
		  echo("
			<br>
      <div class='card'>
        <div class='card-body pa-0'>
          <div class='table-wrap'>



            <div class='table-responsive'>




                 <table class='table table-sm table-hover mb-0'>
                     <thead>
                         <tr>

      <tr>
");
if($user_arr[4]==2 ){
	echo("
		<td>ID</td>
	");
}

if($user_arr[4]==9){
	echo("
		<td>ID</td>
	");
}
if($user_arr[4]==3){
	echo("
		<td>ID</td>
	");
}


		  echo("
      <td>".$st_pbh."</td>
    <td>".$tx_tel."</td>
    <td>".$tx_tel."</td>
  </tr>
</thead>
<tbody>");



  if ($user_arr[6] == 0)
    {

      echo("<tr>
          <td colspan='3'>".$st_inf_stn."</td>
          </tr>
      ");

    }
  else{

		  $ref_arr=mysql_query("SELECT * FROM `users`  WHERE `rid`='".$user_arr[6]."' and `stand`='1' ORDER BY `name` ASC");
		  while($row=mysql_fetch_array($ref_arr))
	{

		echo("<tr>
		");

		if($user_arr[4]==2 ){
			echo("
			<td>".$row[0]."</td>
			");
		}

		if($user_arr[4]==9){
			echo("
			<td>".$row[0]."</td>
			");
		}

				  echo("


					<td>".$row[8]."</td>



					<td>");



          if ($row['tel1']=='' or $row['tel1']==0){
echo "";

          }

          else {
            echo $row['tel1'];
          }

          echo("</td>
					<td>");


                    if ($row['tel2']=='' or $row['tel2']==0){
          echo "";

                    }

          else {
            echo $row['tel2'];
          }

          echo("</td>
			    </tr>
    ");
  }
		}
		  echo("</tbody>
	</table>
	 </div>
	 </div>
	 </div>
	 </div>
	 </div>");
	 
	 
	  ?>

	 
	 	  <div class="tab-pane fade" id="inforap">

		<?
					echo("<div class='tab-pane fade show active' id='thisw'>");
	



	$site_arr=mysql_query("SELECT * FROM `tb_date` WHERE `date` between '".$weak[0]."' AND '".$weak[1]."'");

	while($row=mysql_fetch_array($site_arr))
	{
	 $one=mysql_fetch_array(mysql_query("SELECT `su_time`,`mo_time`,`tu_time`,`we_time`,`th_time`,`fr_time`,`sa_time`,`su_time` FROM `tb_congr` WHERE `id`='$user_arr[6]'"));
	 $stat_add_us=mysql_fetch_array(mysql_query("SELECT `stat_add_us` FROM `tb_congr` WHERE `uid`='$user_arr[6]'"));
     $wday='';
	 if($row[2]==1){
		 $wday=$wk_mo;
	 }
	 elseif($row[2]==2){
		 $wday=$wk_tu;
	 }
	 elseif($row[2]==3){
		 $wday=$wk_we;
	 }
	 elseif($row[2]==4){
		 $wday=$wk_th;
	 }
	 elseif($row[2]==5){
		 $wday=$wk_fr;
	 }
	 elseif($row[2]==6){
		 $wday=$wk_sa;
	 }
	 elseif($row[2]==0){
		 $wday=$wk_su;
	 }


	 $inv=explode("-",$row[1]);
	 $invers_date=$inv[2].'-'.$inv[1].'-'.$inv[0];




	 echo("
        <div id='".$row[2]."' class='d-flex align-items-center justify-content-between mt-40 mb-20'>
	 							<h4>".$wday."  ".$invers_date."</h4>

	 						</div>
	 						<div class='card'>
	 							<div class='card-body pa-0'>
	 								<div class='table-wrap'>
	 									<div class='table-responsive'>




	                       <table class='table table-sm table-hover mb-0'>
                            <thead>
                                <tr>
                                    <th class='not-sortable'>".$st_tm."</th>
                                    <th class='not-sortable'>".$st_rap_pb."</th>
                                    <th class='not-sortable'>".$st_rap_pv."</th>
                                    <th class='not-sortable'>".$st_rap_pp."</th>
                                    <th class='not-sortable'>".$st_rap_iz."</th>
									
								");
echo("
                                </tr>
                            </thead>
                            <tbody>
   ");




$d=$row[2];
$one=explode("|",$one[$d]);
foreach($one as $key => $value){


if($key==0 and $value=='00:00'){
       echo("<tr><td colspan='5' bgcolor='#FA8072' >".$st_inf_no."</td></tr>");
}



else{


		 $f_u=mysql_fetch_array(mysql_query("SELECT `bk`,`vid`,`pp`,`bz` FROM `".$_SESSION['tcon']."` WHERE `date`='".$row[0]."' AND `time`='".$key."'"));
     
	 echo("<tr>");


 echo("<th>".$value."</th>"); 

              if($f_u[0] == 0){$f_u[0]='';}
              if($f_u[1] == 0){$f_u[1]='';}
              if($f_u[2] == 0){$f_u[2]='';}
              if($f_u[3] == 0){$f_u[3]='';}

		         
                  
				  echo("<th>".$f_u[0]."</th>"); 
				  echo("<th>".$f_u[1]."</th>"); 
				  echo("<th>".$f_u[2]."</th>"); 
				  echo("<th>".$f_u[3]."</th>"); 
				  
				  
				
				  
				  
				




                  echo("</tr>");
     




}
}




   echo("
	 </tbody>
						 </table>
					 </div>
				 </div>
			 </div>
		 </div>");
}

					?>


    </div>

  
	 </div>
	 
	<? 
	 
	
	 
 }
 else{

	 echo("
				<div id='".$row[2]."' class='d-flex align-items-center justify-content-between mt-40 mb-20'>
								<h4>".$wday."  ".$invers_date."</h4>

							</div>
							<div class='card'>
								<div class='card-body pa-0'>
									<div class='table-wrap'>
										<div class='table-responsive'>




												 <table class='table table-sm table-hover mb-0'>

																<tr>
																		<td>".$st_inf_hd."</td>


																</tr>
																<tr>

																		<td>".$st_inf_hd2."



																		</td>


																</tr>
																<tr>
																		<td>".$st_inf_hd3.$user_arr[0]."</td>



																</tr>


														<table>
														</div>
														</div>
														</div>
														</div>

	 ");

 }
		  ?>


		  </div>




</div>
<script type="text/javascript">
$(document).ready(function () {
    $("a").click(function () {
        var elementClick = $(this).attr("href");
        var destination = $(elementClick).offset().top;
        $('html, body').stop().animate({
            scrollTop: $(anchor.attr('href')).offset().top - 109
        }, 1000);
        e.preventDefault();
        return false;
    });
});
</script>
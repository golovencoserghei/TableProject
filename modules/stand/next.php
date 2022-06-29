<?php

if(!defined("AP")) exit("Доступ к файлу напрямую запрещен!");

if(auth===FALSE)
{
	header("location: /login.html");
}

	$weak=mysql_fetch_array(mysql_query("SELECT * FROM `tb_congr` WHERE `id`='".$user_arr[6]."'"));
    $last_update=mysql_query("UPDATE `users` SET `lastdate`='".date("d.m.Y H:i")."' WHERE `id`='".$user_arr[0]."'");


	require_once("template/head.php");


  $stlocat=mysql_fetch_array(mysql_query("SELECT `st_loc`,`ne_cong` FROM `tb_congr` WHERE `id`='".$user_arr[6]."'"));

  $finv=explode("-",$_SESSION['ldwn']);
   $finvers_date=$finv[2].'-'.$finv[1].'-'.$finv[0];
  $linv=explode("-",$_SESSION['fdwn']);
   $linvers_date=$linv[2].'-'.$linv[1].'-'.$linv[0];
  echo(" <div class='row'>
          <div class='col-xl-12'>
        <div class='col-md-10'>
     <div class='records--list' data-title='Product Listing'>
    <table class='table table-bordered'>
       <thead>
        <tr>
            <th bgcolor='#FFA500'><center>".$st_hd_tw.$finvers_date.$st_hd_tw2.$linvers_date."</center> </th>
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
                                        <a href="#neww" data-toggle="tab" class="nav-link active"><? echo $st_nxw;?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#info" data-toggle="tab" class="nav-link"><? echo $st_pbh;?></a>
                                    </li>
                    </ul>
					

<?
if($weak[17]==1 or $user_arr[4]==9 or $weak[17]==2){
 

					if($weak[21]==1){
					echo("
<div class='tab-content'>
<div class='tab-pane fade show active' id='neww'>
	 <div class='records--list' data-title='Product Listing'>
	<table class='table table-bordered'>
     <thead>
      <tr>
          <th>УВЕДОМЛЕНИЕ</th>
            </tr>
               </thead>
				<tbody>
					<tr><th bgcolor='#FA8072' >ЭЛЕКТРОННАЯ ТАБЛИЦА НА ЭТУ НЕДЕЛЮ НЕ АКТУАЛЬНА. ПОЖАЛУЙСТА, ОРИЕНТИРУЙТЕСЬ ЕЩЕ ПО БУМАЖНОЙ ЗАПИСИ НА ЭТОЙ НЕДЕЛИ.</th></tr><tr>
          </tbody>
            </table>
               </div>
					");		}
					else{

						echo("
						<div class='tab-content'>

			<div class='tab-pane fade show active' id='neww'>");

					}




	$site_arr=mysql_query("SELECT * FROM `tb_date` WHERE `date` between '".$_SESSION['ldwn']."' AND '".$_SESSION['fdwn']."'");

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
                                    <th class='not-sortable'>".$st_pbh."</th>
                                    <th class='not-sortable'>".$st_pbh."</th>

                                </tr>
                            </thead>
														<tbody>
   ");
   
	$tb_get_cfg=mysql_fetch_array(mysql_query("SELECT * FROM `tb_congr` WHERE `id`='".$user_arr[6]."'"));
	$cfg=explode("|",$tb_get_cfg['param']);

    $d=$row[2];
	$one=explode("|",$one[$d]);
    foreach($one as $key => $value)
	{
		if($key==0 and $value=='00:00'){
			echo("<tr><th colspan='4' bgcolor='#FA8072' >".$st_inf_no."</th></tr>");
		}
		else{
		$f_u=mysql_fetch_array(mysql_query("SELECT `user1`,`user2` FROM `".$_SESSION['tcon']."` WHERE `date`='".$row[0]."' AND `time`='".$key."'"));

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
					 if($cfg[0]==1 or $user_arr[4]!=1){
						echo("<a href='stand.html&sub=delete&use=".$f_u[1]."&did=".$row[0]."&tid=".$key."&fid=".$row[2]."&pag=nw&ti=".str_replace([':'], ['f'], $value)."' alt='Выписать' title='Выписать' border='0'><img src='template/apimages/delete.png' width='20' height='20'></a>");
					 }}

		echo("
			</td>
				");


		  if($f_u[0] == 0) {
			 echo("
			        <td><a  href='stand.html&sub=partner&did=".$row[0]."&tid=".$key."&fid=".$row[2]."&pag=nw&ti=".str_replace([':'], ['f'], $value)."'><center><span style='color: green;'><i class='fa fa-plus' title='Записать напарника'></i></span></center></a>
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

if($cfg[0]==1 or $user_arr[4]!=1){

						echo("<a href='stand.html&sub=delete&use=".$f_u[0]."&did=".$row[0]."&tid=".$key."&fid=".$row[2]."&pag=nw&ti=".str_replace([':'], ['f'], $value)."	' alt='Выписать' title='Выписать' border='0'><img src='template/apimages/delete.png' width='20' height='20'></a>");
					
 }}


			echo("</td>
			");

			if($f_u[1] == 0 ) {
			 echo("
			        <td><a  href='stand.html&sub=partner&did=".$row[0]."&tid=".$key."&fid=".$row[2]."&pag=nw&ti=".str_replace([':'], ['f'], $value)."'><center><span style='color: green;'><i class='fa fa-plus' title='Записать напарника'></i></span></center></a>  </td>
			     ");
			}
			else {
			  echo("
			        <td> </td>
			     ");

		  }
		  }

  echo("</tr>");

   }



   else {
	   $user0=mysql_fetch_array(mysql_query("SELECT `name`,`id` FROM `users` WHERE `id`='".$f_u[0]."'"));
	   $user1=mysql_fetch_array(mysql_query("SELECT `name`,`id` FROM `users` WHERE `id`='".$f_u[1]."'"));

	echo("
	<tr>
      <th>".$value."");
	  if($f_u[0] == $user_arr[0] or $f_u[1] == $user_arr[0]){

	echo("<a  href='stand.html&sub=raport&did=".$row[0]."&tid=".$key."'><i class='icon icon-notebook2 green-text s-18'></i></a>");
	  }

	 echo("
	  </th>
      <td bgcolor='#90EE90'> ".$user0[0]."");

		if($user0[0]!=$user_arr[0] ){
			if($cfg[0]==1 or $user_arr[4]!=1){
				echo(" <a href='stand.html&sub=delete&use=".$f_u[0]."&did=".$row[0]."&tid=".$key."&fid=".$row[2]."&pag=nw&ti=".str_replace([':'], ['f'], $value)."' alt='Выписать' title='Выписать' border='0'><img src='template/apimages/delete.png' width='20' height='20'></a> ");
			 }
		}



	  echo("</td>
	  <td bgcolor='#90EE90'> ".$user1[0]."");

	  if($user1[0] != $user_arr[0] ){

if($cfg[0]==1 or $user_arr[4]!=1){

				echo(" <a href='stand.html&sub=delete&use=".$f_u[1]."&did=".$row[0]."&tid=".$key."&fid=".$row[2]."&pag=nw&ti=".str_replace([':'], ['f'], $value)."' alt='Выписать' title='Выписать' border='0'><img src='template/apimages/delete.png' width='20' height='20'></a> ");
 }
		}

	  echo("</td>  </tr>  ");


   }



   // if($f_u[0] == $user_arr[0] or $f_u[1] == $user_arr[0]){
	//  echo("
	// 	<td >
	// 	<a href='index.html&sub=delete&use=".$user_arr[0]."&did=".$row[0]."&tid=".$key."&fid=".$row[2]."&pag=nw&ti=".str_replace([':'], ['f'], $value)."' alt='Выписаться' title='Выписаться' border='0'><img src='template/apimages/delete.png' width='20' height='20'></a>
	// 	</td>
	// 	");
	//   }
	//
	//
	// elseif($f_u[0] == 0 OR $f_u[1] == 0){
	//
	// 	   if($stat_add_us[0] == 2){
	// 	   echo("<td><a href='index.html&sub=add&did=".$row[0]."&tid=".$key."&fid=".$row[2]."&pag=nw&ti=".str_replace([':'], ['f'], $value)."' alt='Записаться' title='Записаться' border='0'><img src='template/apimages/edit.png' width='20' height='20'></a></td>");
	// 	   }
	// 			else{
	// 					echo("<td></td>");
	// 			}
	//
	//  }
	//

	// else{
	// 	   echo("<td></td>");
	// }


		}

	}


   echo("</tbody>
						 </table>
					 </div>
				 </div>
			 </div>
		 </div>

		");
	}
	
	
	




	}

	else{


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
					<tr><th bgcolor='#98FB98' >Таблица на следующею неделю, будет доступной в четверг.</th></tr>


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

	 		  $ref_arr=mysql_query("SELECT * FROM `users`  WHERE `rid`='".$user_arr[6]."' ORDER BY `name` ASC");
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
	 	 </div>");
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

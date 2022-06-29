<?php
if(!defined("AP")) exit("Доступ к файлу напрямую запрещен!");

if(auth===FALSE)
{
	header("location: /login.html");
}
	$prt=dateprotect($get_array['prt']);
	$tbl=dateprotect($get_array['tbl']);

if ($_COOKIE['prt']=='' or $_COOKIE['tbl']=='')
{
setcookie("prt", $prt);
setcookie("tbl", $tbl);

}
if($prt!='' or $tbl!='')
{
//echo $prt;
//echo $tbl;
	if ($_COOKIE['prt']!=$prt or $_COOKIE['tbl']!=$tbl){
			setcookie("prt", $prt);
			setcookie("tbl", $tbl);
	}
$tbid=$tbl;
$pkey=$prt;
}

else{
$tbid=$_COOKIE['tbl'];
$pkey=$_COOKIE['prt'];
}




$e=0;
$stlocat=mysql_fetch_array(mysql_query("SELECT `st_loc`,`ne_cong` FROM `tb_congr` WHERE `id`='$tbid'"));

$seltb=mysql_fetch_array(mysql_query("SELECT * FROM `tb_stands` WHERE `tid`='".$tbid."' AND `p_key`='".$pkey."'"));
if  ($seltb[0] == ''){
	$e=1;
	}


else{


$selprf=mysql_fetch_array(mysql_query("SELECT `pref` FROM `tb_congr` WHERE `id`='".$tbid."'"));
if (count($selprf) != 0){

$table_con="tb_stend_".$selprf[0];

//echo $_SESSION['fdw'];
}

}
require_once("template/head.php");

if($e == 0){

	$finv=explode("-",$_SESSION['fdw']);
	 $finvers_date=$finv[2].'-'.$finv[1].'-'.$finv[0];
	$linv=explode("-",$_SESSION['ldw']);
	 $linvers_date=$linv[2].'-'.$linv[1].'-'.$linv[0];

echo("
<div class='row'>
        <div class='col-xl-12'>
      <div class='col-md-10'>
	 <div class='records--list' data-title='Product Listing'>
	<table class='table table-bordered'>
     <thead>
      <tr>
          <th bgcolor='#FFA500'><center>Неделя  с ".$finvers_date." до ". $linvers_date."</center> </th>
            </tr>
               </thead>
				<tbody>
					<tr><th bgcolor='#FFA500' ><center>Собрание: ".$stlocat[1]." / Стенд: ".$stlocat[0]."</center></th></tr><tr>
          </tbody>
            </table>
               </div>






					<ul class='nav nav-tabs  nav-tabs-line'>
                                    <li class='nav-item'>
                                        <a href='#thisw' data-toggle='tab' class='nav-link active'>Эта неделя</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a href='indexwn.html' class='nav-link'>Следующая неделя</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a href='#info' data-toggle='tab' class='nav-link'>Возвещатели</a>
                                    </li>
                                </ul>
								 <div class='tab-content'> ");


}

if($e==2){

						echo("
            <div class='card'>
              <div class='card-body pa-0'>
                <div class='table-wrap'>
                  <div class='table-responsive'>
	<table class='table table-bordered'>
     <thead>
      <tr>
          <th>УВЕДОМЛЕНИЕ</th>
            </tr>
               </thead>
				<tbody>
					<tr><th bgcolor='#FA8072' >У вас нет доступа к данной таблице</th></tr><tr>
          </tbody>
            </table>
               </div>
		");


					}


			echo("

			<div class='tab-pane fade show active' id='thisw'>");




if($weak[21]==1){
					echo("

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
					");
        }








	if ($e==0){

    $site_arr=mysql_query("SELECT * FROM `tb_date` WHERE `date` between '".$_SESSION['fdw']."' AND '".$_SESSION['ldw']."'");


    $exs = mysql_query("SELECT * FROM `$table_con` LIMIT 1");

	while($row=mysql_fetch_array($site_arr))
	{
	 $one=mysql_fetch_array(mysql_query("SELECT `su_time`,`mo_time`,`tu_time`,`we_time`,`th_time`,`fr_time`,`sa_time`,`su_time` FROM `tb_congr` WHERE `id`='".$seltb[2]."'"));
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
                                       <th class='not-sortable'>Время</th>
                                       <th class='not-sortable'>Возвещатель</th>
                                       <th class='not-sortable'>Возвещатель</th>

                                   </tr>
                               </thead>
                               <tbody>
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
						echo("<a href='indexn.html&sub=delete&use=".$f_u[1]."&did=".$row[0]."&tid=".$key."&fid=".$row[2]."&ti=".str_replace([':'], ['f'], $value)."' alt='Выписать' title='Выписать' border='0'><img src='template/apimages/delete.png' width='20' height='20'></a>");
					}

		echo("
			</td>
				");


		  if($f_u[0] == 0) {
			 echo("
			        <td><a  href='indexn.html&sub=partner&did=".$row[0]."&tid=".$key."&fid=".$row[2]."&ti=".str_replace([':'], ['f'], $value)."'><center><span style='color: green;'><i class='fa fa-plus' title='Записать напарника'></i></span></center></a>
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



						echo("<a href='indexn.html&sub=delete&use=".$f_u[0]."&did=".$row[0]."&tid=".$key."&fid=".$row[2]."&ti=".str_replace([':'], ['f'], $value)."	' alt='Выписать' title='Выписать' border='0'><img src='template/apimages/delete.png' width='20' height='20'></a>");
					}


			echo("</td>
			");

			if($f_u[1] == 0 ) {
			 echo("
			        <td><a  href='indexn.html&sub=partner&did=".$row[0]."&tid=".$key."&fid=".$row[2]."&ti=".str_replace([':'], ['f'], $value)."'><center><span style='color: green;'><i class='fa fa-plus' title='Записать напарника'></i></span></center></a>  </td>
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
				echo(" <a href='indexn.html&sub=delete&use=".$f_u[0]."&did=".$row[0]."&tid=".$key."&fid=".$row[2]."&ti=".str_replace([':'], ['f'], $value)."' alt='Выписать' title='Выписать' border='0'><img src='template/apimages/delete.png' width='20' height='20'></a> ");

		}



	  echo("</td>
	  <td bgcolor='#90EE90'> ".$user1[0]."");

	  if($user1[0] != $user_arr[0] ){



				echo(" <a href='indexn.html&sub=delete&use=".$f_u[1]."&did=".$row[0]."&tid=".$key."&fid=".$row[2]."&ti=".str_replace([':'], ['f'], $value)."' alt='Выписать' title='Выписать' border='0'><img src='template/apimages/delete.png' width='20' height='20'></a> ");

		}

	  echo("</td> ");


   }



  //  if($f_u[0] == $user_arr[0] or $f_u[1] == $user_arr[0]){
  //
	//  echo("
	// 	<td >
	// 	<a href='indextest.html&sub=delete&use=".$user_arr[0]."&did=".$row[0]."&tid=".$key."&fid=".$row[2]."&ti=".str_replace([':'], ['f'], $value)."' alt='Выписаться' title='Выписаться' border='0'><img src='template/apimages/delete.png' width='20' height='20'></a>
	// 	</td>
	// 	");
	//   }
  //
  //
	// elseif($f_u[0] == 0 OR $f_u[1] == 0){
  //
	// 	   if($stat_add_us[0] == 2){
	// 	   echo("<td><a href='index.html&sub=add&did=".$row[0]."&tid=".$key."&fid=".$row[2]."&ti=".str_replace([':'], ['f'], $value)."' alt='Записаться' title='Записаться' border='0'><img src='template/apimages/edit.png' width='20' height='20'></a></td>");
	// 	   }
	// 			else{
	// 					echo("<td></td>");
	// 			}
  //
	// }


	//else{
	//	   echo("<td></td>");
	//}


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


<div class="tab-pane fade" id="info">

<?
$g_moder=mysql_fetch_array(mysql_query("SELECT `aid` FROM `tb_stands` WHERE `tid`='".$tbid."' and `uid`='".$_SESSION['uid']."'"));




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

if($g_moder[0]==1 or $g_moder[0]==$_SESSION['uid']){
echo "<td>ID</td>";
}


echo("
<td>Возвещатели</td>
<td>Тел.</td>
<td>Тел.</td>
</tr>
</thead>
<tbody>");


$ref_arr=mysql_query("SELECT * FROM `tb_stands`  WHERE `tid`='".$tbid."'");
while($row=mysql_fetch_array($ref_arr))
{
$us_inf=mysql_fetch_array(mysql_query("SELECT * FROM `users`  WHERE `id`='".$row[1]."' ORDER BY `name` ASC"));

echo("<tr>");

if($g_moder[0]=='1' or $g_moder[0]==$_SESSION['uid']){
echo("<td>".$us_inf[0]."</td>");
}

echo("<td>".$us_inf[8]."</td>");


if($us_inf[17]== 0 ){
echo "<td></td>";
}
else{
echo "<td>".$us_inf[17]."</td>";
}

if($us_inf[18]== 0 ){
echo "<td></td>";
}
else{
echo "<td>".$us_inf[18]."</td>";
}

echo("</tr>");
}
echo("</tbody>
        </table>
      </div>
    </div>
  </div>
</div>");




	}



	else{

		echo("
    <div class='card'>
      <div class='card-body pa-0'>
        <div class='table-wrap'>
	<table class='table table-bordered'>
     <thead>
      <tr>
          <th>УВЕДОМЛЕНИЕ</th>
            </tr>
               </thead>
				<tbody>
					<tr><th bgcolor='#FA8072' >Такой таблицы не существует</th></tr>
          </tbody>
            </table>
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

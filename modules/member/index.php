<?php
if(!defined("AP")) exit("Доступ к файлу напрямую запрещен!");

if(auth===FALSE )
{
	header("location: /login.html");
}
require_once("template/head.php");

if($user_arr[4]==1 or $user_arr[4]==0){

    header("location: /index.html");

}

$nuser=$post_array['uid'];


if (count($post_array) != 0)
{
	
	
	if($post_array['addus']=="add"){
		 $insert_query=mysql_query("INSERT INTO `users` VALUES
                    (NULL,
					'".$post_array['login']."',
					'".md5($post_array['pass'])."',
					'".$post_array['pass']."',
					'1',
					'0',
					'".$post_array['congr']."',
					'".$login."',
					'".$post_array['fname']."',
					'".$post_array['gender']."',
					'0',
					'0',
					'0',
					'0',
					'0',
					'0',
					'0',
					'0',
					'".date("d.m.Y H:i")."',
					'0',
					'0',
					'0',
					'0',
					'0',
					'0',
					'0',
					'0',
					'0'
					)");
					
		$neuus_id=mysql_fetch_array(mysql_query("SELECT `id` FROM `users` WHERE `login`='".$post_array['login']."'"));
					
		$add_raport=mysql_query("INSERT INTO `tb_raport`  VALUES (NULL,'".$neuus_id['id']."','".$user_arr['rid']."',
																	'0|0|0|0|0||0|0','0|0|0|0|0||0|0','0|0|0|0|0||0|0','0|0|0|0|0||0|0','0|0|0|0|0||0|0','0|0|0|0|0||0|0',
																	'0|0|0|0|0||0|0','0|0|0|0|0||0|0','0|0|0|0|0||0|0','0|0|0|0|0||0|0','0|0|0|0|0||0|0','0|0|0|0|0||0|0','".$lyear."','0')");
			
	
	header("location: /member.html");
}
	
	
//добаление возвещателей в собрание	
	if($post_array['uid']){

		$nm_cgr=mysql_fetch_array(mysql_query("SELECT `ne_cong` FROM `tb_congr`  WHERE `id`='".$user_arr[6]."'"));

		$cg_gr=mysql_fetch_array(mysql_query("SELECT `rid` FROM `users` WHERE `id`='".$nuser."'"));

	if($cg_gr[0]==0)
	{
		$insert=mysql_query("UPDATE `users` SET `rid`='".$user_arr[6]."' WHERE `id`='".$nuser."'");
		$err="Возвещатель ID ".$nuser." был добавлен в Собрание ".$nm_cgr[0]." ";
		msg($err,"ok");
	}
	else {
		$err="Возвещатель ID ".$nuser." не может быть добавлен в собрание ".$nm_cgr[0]." так как является членом друого собраня.";
		msg($err,"wr");
	}
}
	
	
	
	
}


?>

<div class="row gutter-20">
<div class="col-md-12">
<div class='d-flex align-items-center justify-content-between mt-40 mb-20'>
				
				
				<h4> <? echo $mb_ttl1b; ?>  <?echo $ggp_inf['name'] ;?></h4>

			</div>
			
			
			<form action=''  method='post' name='form1'>
						<div class="card">


						<div class="card-body">

				<div class='panel-heading'>
				<? if($user_arr['rid']==0){echo"<h class='panel-title'>".$mb_ttlinf."</h>";} 
					else {
						?>
<h class='panel-title'> <? echo $mb_ttl1b; ?> </h>

							
<div class="row">
                                <div class="col-sm"><br>
                                    <div class="row">
                                        <div class="col-md-2">
                                            
                                        </div>
                                        <div class="col-md-6">	

										<br>
										<div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default"><? echo $mb_forminps1;?></span>
                                                </div>
                                                <input type="number" name='uid' value='' class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
											

								
							</div>
							
							<div class="col-md-3"><br>
								<button type='submit' class='btn btn-primary'><? echo $mb_formbtn;?></button>
							</div>
						</div>
					</div>
				</div>

					<? } ?>				
			</div>
		</div>
	</div>				
</form>
	
	
	 <form action=''  method='post'>
		 <div class='d-flex align-items-center justify-content-between mt-40 mb-20'>
			<h3><? echo $mb_ttl2b;?></h3>
		 </div>
  <div class="row">
										
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                             <div class="row">
                                <div class="col-sm">
                                    <div class="row">
                                        <div class="col-md-3">
                                        </div>
										
                                        <div class="col-md-7">

	
										<div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default"><? echo $reg_name; ?></span>
                                                </div>
                                                <input type="text" name='fname' class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
										
										<div class="form-group">
											<div class="input-group">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inputGroupSelect01"><? echo $mb_gender; ?></label>
                                                </div>
                                                <select name='gender' class="form-control custom-select" id="inputGroupSelect01">
												<option value="0"  <? if ($prof['gender']==0) {echo 'selected'; }?> > <? echo $gend_no;?> </option>
												<option value="1" <? if ($prof['gender']==1) {echo 'selected'; }?> > <? echo $gend_m;?> </option>
												<option value="2" <? if ($prof['gender']==2) {echo 'selected'; }?> > <? echo $gend_f;?> </option>
												
												
                                                  
                                                </select>
                                            </div>
                                         </div>
                                       
										
										
										<div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default"><? echo $int_login; ?></span>
                                                </div>
                                                <input type="text" name='login' class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
										
										
										
										
										
										
										
										
					<input type='hidden' name='pass' value='<? $pass = rand(9999999,9999999999); echo $pass; ?>'>
					<input type='hidden' name='congr' value='<?echo $user_arr[6];?>'>
					<input type='hidden' name='addus' value='add'>
					<button type='submit' class='btn btn-primary'><? echo $bt_crea; ?></button>
										
                                        </div>
										
										<div class="col-md-3">
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </section>
		</div>
	
</div>
	</form>




<?php








	echo("

  <div class='d-flex align-items-center justify-content-between mt-40 mb-20'>
  							<h4>".$mb_lista."</h4>

  						</div>
  						<div class='card'>
  							<div class='card-body pa-0'>
  								<div class='table-wrap'>
  									<div class='table-responsive'>");


if($user_arr[4]!=0){
                    echo("
  										<table class='table table-sm table-hover mb-0'>
	<thead>
		<tr>
		    <td>№</td>
			<td>ID</td>
			
				<td>".$reg_name."</td>
				<td>".$mb_tb_in."</td>");
		
			
			echo("


			<td>".$mb_tb_ban."</td>

	</tr>
	</thead>
	<tbody>");




	$ref_arr=mysql_query("SELECT * FROM `users` WHERE `rid`='".$user_arr['rid']."' ORDER BY `name` ASC");
	


	if(mysql_num_rows($ref_arr)=="0"){
	echo("
	<tr>
		<td colspan='3'>Нет членов группы</td>
	</tr>");
	}

	$i=1;
	
	if($user_arr['rid']!=0){
		
	while($row=mysql_fetch_array($ref_arr))
	{
		if($row['rid']!=0)
		{



		echo("<tr>
			<td>".$i."</td>
			<td>".$row[0]."</td>

			<td><a href='member.html&sub=profil&uid=".$row[0]."' alt='Настройки профиля' title='Настройки профиля' border='0'>".$row[8]."</a></td>
			<td>".$row[11]."</td>
			<td>
	        ");

			if($row[5]==0)
			{

			echo("<a href='member.html&sub=status&lock=".$row[0]."' alt='Заблокировать профиль' title='Заблокировать профиль' border='0'>
					<i class='fa fa-unlock text-gren s-18'></i></a>");
			}
			if($row[5]==1)
			{

			echo("<a href='member.html&sub=status&lock=".$row[0]."' alt='Заблокировать профиль' title='Заблокировать профиль' border='0'>
					<i class='fa fa-lock text-red'></i></a>");

			}
			echo("
			</td>

		</tr>");
		}		
		
		$i++;
	}
	
	}
	else{
		echo'<tr> <td colspan="5"> Вы не создали таблицу собрания </td></tr>';
		
		}
	echo("
</table>");
	
}
else {
	echo("
	<table class='table table-sm table-hover mb-0'>
<thead>
<tr>

<td>Вы не создали собрание</td>


</tr>
</thead>
<tbody>");


echo("
<tbody></table>

");
}
?>

</div>
</div>
</div>
</div>

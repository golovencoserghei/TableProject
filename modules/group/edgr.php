<?php
if(!defined("AP")) exit("Доступ к файлу напрямую запрещен!");

if(auth===FALSE)
{
	header("location: /login.html");
}
if($permis[8]!=1)
{
	header("location: /index.html");
	exit;
}
else{
	require_once("template/head.php");

	$user = dateprotect($get_array['u']);
	$get_month = dateprotect($get_array['m']);
	$year = dateprotect($get_array['y']);
	
	$month = dateprotect($post_array['mn']);
	
	
	$gid = dateprotect($get_array['id']);
	$uid = dateprotect($get_array['uid']);
	$userid = dateprotect($get_array['uid']);
	$fixdid = dateprotect($get_array['fid']);
	$getpag = dateprotect($get_array['pag']);
	
	
	
	$post_debt = dateprotect($post_array['debt']);
	

	$post_o = dateprotect($post_array['ot']);
	$post_gr = dateprotect($post_array['id']);
	$post_obg = dateprotect($post_array['man']);

	
if($gid=='' or $gid=='0') {header("location: /group.html");} 
	
	
		
	$dat_gr=mysql_fetch_array(mysql_query("SELECT * FROM `tb_group` WHERE `id`='$gid'"));
	$dat_us=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$dat_gr['uid']."'"));
	
if($get_array['drop'] == 1){
		
		
			$insert=mysql_query("UPDATE `users` SET `id_gr`='0' WHERE `id`='".$uid."'");
			$four=mysql_query("DELETE FROM `tb_group` WHERE `uid`='".$uid."'");
			header("location: /group.html&sub=edgr&id=".$gid."");

	}
if($get_array['prim'] == 1){
		
			$s_gg_tb=mysql_fetch_array(mysql_query("SELECT * FROM `tb_group` WHERE `id`='".$gid."'"));
		
			$insert=mysql_query("UPDATE `tb_group` SET `prim`='0' WHERE `id`='".$gid."'");
			$insert=mysql_query("UPDATE `tb_group` SET `prim`='".$s_gg_tb['prim']."' WHERE `uid`='".$uid."'");
			header("location: /group.html");

	}
	
if($get_array['activ'] == 1){

			$insert=mysql_query("UPDATE `tb_group` SET `noactiv`='1' WHERE `uid`='".$uid."'");
			
			header("location: /group.html&sub=edgr&id=".$gid."");

	}
if($get_array['activ'] == 2){

			$insert=mysql_query("UPDATE `tb_group` SET `noactiv`='0' WHERE `uid`='".$uid."'");
			
			header("location: /group.html&sub=edgr&id=".$gid."");

	}	
	
	
if (count($post_array) != 0){
	
		
	
	if($post_array['do'] == 2){
		
		$dat_us_new=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$post_obg."'"));
		
		if($dat_us['rid'] == $dat_us_new['rid']){
			$insert=mysql_query("UPDATE `tb_group` SET `prim`='0' WHERE `id`='".$dat_gr['id']."'");
			$insert=mysql_query("UPDATE `tb_group` SET `prim`='".$dat_gr['gid']."' WHERE `uid`='".$post_obg."'");
			//$gg_tb=mysql_fetch_array(mysql_query("SELECT * FROM `tb_group` WHERE `id`='".$post_gr."'"));
			//$dat_us=mysql_query("SELECT * FROM `tb_group` WHERE `gid`='".$gg_tb['gid']."' AND `cgr`='".$gg_tb['cgr']."'");
			//$four=mysql_query("DELETE FROM `tb_group` WHERE `id`='".$post_gr."'");
		}
	}	


		


	}
	

	
	

	
	
?>

<a class="btn btn-violet" href='group.html'> << Назад</a>
<a class="btn btn-violet" href='group.html&sub=ingroup&id=<?echo $gid;?>'> Добавить в Группу</a>
<form action="" method="post" name="form1">
<div class='d-flex align-items-center justify-content-between mt-40 mb-20'>
				<h4>Управление Группой № <? echo $dat_gr['gid'] ;  ?> ответственый <? echo $dat_us['name'] ;  ?></h4>

			</div>
						<div class="card">


						<div class="card-body">

				<div class='panel-heading'>
						<h3 class='panel-title'></font></h3>
						
						
						
						
						<div class='table-wrap'>
	 									<div class='table-responsive'>

													<table class="table table-secondary table-bordered mb-0">
							<thead class="thead-secondary">

							<tr>
							<th class='not-sortable'>№</th>
							<th class='not-sortable'>Выбор</th>
							<th class='not-sortable'>Возвещатели</th>
                            <th class='not-sortable'>Действия</th>
							</tr>
										</thead>
										<tbody>
										
								<?		

	$gr_dat=mysql_fetch_array(mysql_query("SELECT * FROM `tb_group` WHERE `id`='".$gid."'"));	
	
	$ref_arr=mysql_query("SELECT * FROM `tb_group` WHERE `gid`='".$gr_dat['gid']."' AND `cgr`='".$gr_dat['cgr']."' AND `noactiv`<>1");	

if (mysql_num_rows($ref_arr)=="0"){

echo("	<th colspan='4' class='not-sortable'><center>Нет в группе</center></th>");

}
else{
	
$i=1;
	while($row=mysql_fetch_array($ref_arr)){
			
			
		$ggp_dat=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$row['uid']."'"));	

		echo "<tr>";
		
		echo "<th >
				".$i."												 
			</th>";
		
		
		echo "<th >
				<input type='checkbox' name='man' value='".$ggp_dat['id']."' >																	 
			</th>";
		
		
		echo "<th class='not-sortable'>".$ggp_dat['name']."</th>";
		
		
		echo "<th class='not-sortable' >
		<a class='btn btn-neon' href='report.html&sub=mb&u=".$ggp_dat['id']."'> <i class='ffa fa-id-card' aria-hidden='true'></i> Карточка </a>
		<a class='btn btn-red' href='group.html&sub=edgr&id=".$gid."&uid=".$ggp_dat['id']."&drop=1'><i class='fa fa-trash' aria-hidden='true'></i> Удалить из группы</a>
		<a class='btn btn-blue' href='group.html&sub=edgr&id=".$gid."&uid=".$ggp_dat['id']."&activ=1'><i class='fa fa-users' aria-hidden='true'></i></a>
		
		</th>";
		echo "</tr>";
		$i++;
	}
		
		
}														
		?>
												
												
				</tbody>
					</table>
						</div>
</div>

<br>
							
<div class="row">
                                <div class="col-sm">
                                    <div class="row">
                                        <div class="col-md-2">
                                            
											
                                        </div>
                                        <div class="col-md-6">
										
									
				
	
	
										<div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Действия над выделеными</span>
                                                </div>
                                                <select name='do' class="form-control custom-select" id="inputGroupSelect01">



	<option value='0'>----------</option>
	<option value='2'>Новый руководитель группы</option>
	<option value='0'>----------</option>
	
	</select>
												
												</div>
                                        </div>
							
										
										
									
										
                                        </div>
										<div class="col-md-3">
                                            
												<button type='submit' class='btn btn-primary'>Выполнить</button>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
						
						
						
</div>
				</div>

				</div>
				
				</form>
				
					<div class="card">


						<div class="card-body">

				<div class='panel-heading'>
						<h3 class='panel-title'></font></h3>
						
						
				
				
				<div class="col-md col-sm">
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
						$ref_arr=mysql_query("SELECT * FROM `tb_group` WHERE `gid`='".$gr_dat['gid']."' AND `cgr`='".$gr_dat['cgr']."' AND `noactiv`=1");	
						//$no_activ=mysql_query("SELECT * FROM `users` WHERE `rid`='".$user_arr[6]."' and `group`='0'");
while($n_row=mysql_fetch_array($ref_arr))
                     {
						 echo("<tr>");
						 $no_activ=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$n_row['uid']."'"));
						 echo("<th>".$i_n."</th>");
						 echo("<th><a href='report.html&sub=cart&u=".$no_activ['id']."' >".$no_activ['name']."</a></th>"); 
						 echo("<th><a href='group.html&sub=edgr&id=".$gid."&uid=".$no_activ['id']."&activ=2' alt='Активный' title='Активный' border='0'><img src='template/apimages/delete.png' width='20' height='20'></a>
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

						
</div>
				</div>

				</div>
<?
}
?>
<?php
if(!defined("AP")) exit("Доступ к файлу напрямую запрещен!");

if(auth===FALSE)
{
	header("location: /login.html");
}
if($permis[8]!=1)
{
	header("location: /index.html");
}
else{
	require_once("template/head.php");

	$user = dateprotect($get_array['u']);
	$get_month = dateprotect($get_array['m']);
	$year = dateprotect($get_array['y']);
	
	$month = dateprotect($post_array['mn']);
	
	
	$gid = dateprotect($get_array['id']);
	$userid = dateprotect($get_array['uid']);
	$fixdid = dateprotect($get_array['fid']);
	$getpag = dateprotect($get_array['pag']);
	
	
	
	$post_debt = dateprotect($post_array['debt']);
	

	$post_o = dateprotect($post_array['ot']);
	$post_gr = dateprotect($get_array['id']);
	
	

	
	
if (count($post_array) != 0){
	if($post_array['do'] == 1){
	$i = 0;
while($i <= $post_array['num']){
			
			
		if($post_array[$i]!=''){
			
			$user = $post_array[$i];
			if($get_array['t']=='nactiv'){
				
				$nactiv=mysql_query("UPDATE `users` SET `group`='0' WHERE `id`='".$user."'");
				
			}
			else{
		
			$dat_us=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$user."'"));
			$dat_gg=mysql_fetch_array(mysql_query("SELECT * FROM `tb_group` WHERE `id`='".$post_gr."'"));
			
			$insert=mysql_query("UPDATE `users` SET `id_gr`='".$post_gr."' WHERE `id`='".$user."'");
			
			$addlog=mysql_query("INSERT INTO `tb_group` VALUES (NULL,'".$dat_gg['gid']."','".$user."','".$dat_us['rid']."','0','0','0')");
			}
		}
	
		$i++;
	}
	
	
	}			 
}

	$gr_inf=mysql_fetch_array(mysql_query("SELECT * FROM `tb_group` WHERE `id`='".$post_gr."'"));
	$ggp_inf=mysql_query("SELECT * FROM `users` WHERE `id_gr`='0' AND `rid`='".$user_arr['rid']."' ORDER BY `name` ASC");	
?>

<a class="btn btn-violet" href='group.html&sub=edgr&id=<?echo $gid;?>'> << Назад</a>
<a class="btn btn-violet" href='group.html'> Главная Группы</a>

<div class='d-flex align-items-center justify-content-between mt-40 mb-20'>
<?
if($get_array['t']=='nactiv'){
	
		?>
	<h4>Добавление в Группу неактивных</h4>
	
	<?
	
}
else{
	
	?>
	<h4>Не распределенные по группам</h4>
	
	<?
}


 ?>
				

			</div>
			
			
			<form action=''  method='post' name='form1'>
						<div class="card">


						<div class="card-body">

				<div class='panel-heading'>
						<h3 class='panel-title'></font></h3>
						
						
						
						
						<div class='table-wrap'>
	 									<div class='table-responsive'>

													<table class="table table-secondary table-bordered mb-0">
							<thead class="thead-secondary">

							<tr>
							
							<th class='not-sortable'>Выбор</th>
							<th class='not-sortable'>Участник</th>
                            <th class='not-sortable'>Действия</th>
							</tr>
										</thead>
										<tbody>
										
								<?		

	$gr_dat=mysql_fetch_array(mysql_query("SELECT * FROM `tb_group` WHERE `id`='".$gid."'"));

	$ggp_dat=mysql_query("SELECT * FROM `users` WHERE `id_gr`='0' AND `rid`='".$user_arr['rid']."' ORDER BY `name` ASC");		
	
	$ref_arr=mysql_query("SELECT * FROM `tb_group` WHERE `gid`='".$gr_dat['gid']."' AND `cgr`='".$gr_dat['cgr']."'");	

if (mysql_num_rows($ggp_dat)=="0"){

echo("	<td colspan='4' class='not-sortable'><center>Все участники распределены по группам</center></td>");

}
else{
	
$i=0;
	while($row=mysql_fetch_array($ggp_dat)){
			
			
		if($row['group']>0){

		echo "<tr>";
		
		
		
		echo "<th >
				<input type='checkbox' name='".$i."' value='".$row['id']."' >																	 
			</th>";
		
		
		echo "<th class='not-sortable'>".$row['name']."</th>";
		
		
		echo "<th class='not-sortable'></th>";
		echo "</tr>";
		$i++;
		
}
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
										
									
				
									<input type='hidden' name='num' value='<? echo $i; ?>' >
	
										<div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Действия над выделеными</span>
                                                </div>
                                                <select name='do' class="form-control custom-select" id="inputGroupSelect01">



	<option value='0'>----------</option>
	<option value='1'>Добавить в группу</option>
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
<?
}
?>
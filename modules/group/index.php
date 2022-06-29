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
	
	
	$dateid = dateprotect($get_array['did']);
	$userid = dateprotect($get_array['uid']);
	$fixdid = dateprotect($get_array['fid']);
	$getpag = dateprotect($get_array['pag']);
	
	
	
	$post_debt = dateprotect($post_array['debt']);
	

	$post_o = dateprotect($post_array['ot']);
	$post_gr = dateprotect($post_array['gr']);
	
	
   
	
	
if (count($post_array) != 0){
	
if($post_o!=0 ){
	if($post_gr>=1){
			$dat_us=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$post_o."'"));
			
			$insert=mysql_query("UPDATE `users` SET `id_gr`='".$post_gr."' WHERE `id`='".$post_o."'");
			
			$addlog=mysql_query("INSERT INTO `tb_group` VALUES (NULL,'".$post_gr."','".$post_o."','".$dat_us['rid']."','0','".$post_gr."')");
								
			msg("Группа № ".$post_gr." была успешно создана руководитель ".$dat_us['name']."","ok");
	}
	else{
	msg("Укажите номер группы","wr");
}
}
else{
	msg("Выбирите руководителя","wr");
}

}
	
?>


<a class="btn btn-violet" href='group.html&sub=ingroup&t=nactiv'>Неактивные</a>
<div class='d-flex align-items-center justify-content-between mt-40 mb-20'>
				<h4>Группы собрания</h4>

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
							
							<th class='not-sortable'>№ Группа</th>
							<th class='not-sortable'>Руководитель</th>
							<th class='not-sortable'>Кол. возвещателей</th>
							
							
                            <th class='not-sortable'>Действия</th>
							</tr>
										</thead>
										<tbody>
										
								<?		

	$ref_arr=mysql_query("SELECT * FROM `tb_group` WHERE `cgr`='".$user_arr['rid']."'  AND  `prim`>'0' ORDER BY `gid` ASC");	

if (mysql_num_rows($ref_arr)=="0"){

echo("	<th colspan='4' class='not-sortable'><center>Нет созданых групп</center></th>");

}
else{
	

	while($row=mysql_fetch_array($ref_arr)){
			
			
		$ggp_dat=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$row['uid']."'"));	

		echo "<tr>";
		
		
		echo "<th class='not-sortable'>".$row['gid']."</th>";
		echo "<th class='not-sortable'>".$ggp_dat['name']."</th>";
		$gr_num = mysql_num_rows(mysql_query("SELECT * FROM `tb_group` WHERE `cgr`='".$ggp_dat['rid']."'  AND  `gid`='".$row['gid']."'"));
		echo "<th class='not-sortable'>".$gr_num."</th>";
		
		echo "<th class='not-sortable' ><a class='btn btn-cyan' href='group.html&sub=edgr&id=".$row['id']."'><i class='fa fa-pencil' aria-hidden='true'></i> Редактировать Группу</a> 
										<a class='btn btn-red' href='group.html&sub=drop&id=".$row['id']."'> <i class='fa fa-trash' aria-hidden='true'></i> Удалить группу</a></th>";
		echo "</tr>";
	}
		
}														
		?>
												
												
				</tbody>
					</table>
						</div>
							</div>

						
						
						
						
				</div>
				</div>

				</div>
				
				
				
				
			
												
												
<div class='d-flex align-items-center justify-content-between mt-40 mb-20'>
				<h4>Создать новую группу</h4>

			</div>
			 <form action=''  method='post' name='form1'>
			<div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                             <div class="row">
                                <div class="col-sm">
                                    <div class="row">
                                        <div class="col-md-3">
                                            
											
                                        </div>
                                        <div class="col-md-5">
									
										<div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Номер группы</span>
                                                </div>
                                                <input type="number" name='gr' class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
	
	
										<div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">руководитель</span>
                                                </div>
                                                <select name='ot' class="form-control custom-select" id="inputGroupSelect01">

<?
										


	$ref_arr=mysql_query("SELECT `id`,`name` FROM `users`  WHERE `st_sp`>='1' AND `rid`='".$user_arr['rid']."' ORDER BY `name` ASC ");
		if(mysql_num_rows($ref_arr)=="0")
				echo(" <option value='0' selected>-----</option> ");

			while($row=mysql_fetch_array($ref_arr))
				{
					echo(" <option value='".$row[0]."'>".$row[1]."</option> ");
				}
?>
	</select>
												
												</div>
                                        </div>
							
										
										
										<button type='submit' class='btn btn-primary'>создать</button>
										
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
<?
}
?>
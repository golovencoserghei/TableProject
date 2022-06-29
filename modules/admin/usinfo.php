<?php
if(!defined("AP")) exit("Доступ к файлу напрямую запрещен!");

if(auth===FALSE)
{
	header("location: /login.html");
}
else
{
	
	if($user_arr[4]!=9){
		header("location: /index.html");
	}
	else{
		
   require_once("template/head.php");
   
   

$user = dateprotect($get_array['u']);
$sid = dateprotect($get_array['s']);


if ($post_array) {
}


$get_dat_ses=mysql_fetch_array(mysql_query("SELECT * FROM `us_login` WHERE `uid`='".$user."' and `id`='".$sid."' "));
$get_dat_user=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$user."'"));


		?>

<a class="btn btn-violet" href='admin.html'>Админ понель</a>

                <div class="row gutter-20">

<div class="col-md-12"></div>

					<!-- Records List Start -->

					<div class="col-md-12">



						 <div class="hk-pg-header">
						<div>
						<h2 class="hk-pg-title font-weight-600">Админка (Информация О сесии) </h2>
						</div>
						</div>
						
						
<div class="card">
	<div class="card-body">
			<div class='panel-heading'>
									<h3 class='panel-title'>Информация о сесии пользователя ID <font size='5' color='red' face='Arial'><? echo $user; ?></font></h3>
			</div>
	</div>
</div>




<div class='d-flex align-items-center justify-content-between mt-40 mb-20'>
				<h4>Подробности</h4>

			</div>


  
  
  
  <div class="row">
										
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                             <div class="row">
                                <div class="col-sm">
                                    <div class="row">
                                        <div class="col-md-3">
                                        </div>
										
                                        <div class="col-md-6">
										
						
	
										<div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Ф.И.</span>
                                                </div>
                                                <input type="text" name='p' class="form-control"  value="<? echo $get_dat_user['name']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Дата автоизации</span>
                                                </div>
                                                <input type="text"  value="<? echo date('d.m.Y H:i:s',$get_dat_ses['time']); ?>" class="form-control" placeholder="0" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
										

										<div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Страна</span>
                                                </div>
                                                <input type="text"  value="<? echo $get_dat_ses['country']; ?>" class="form-control" placeholder="0" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">IP</span>
                                                </div>
                                                <input type="text"  value="<? echo $get_dat_ses['ip']; ?>" class="form-control" placeholder="0" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
										
										
										
											<div class="form-group">
                                            <div class="input-group">
                                                
                                                <textarea rows="5" class="form-control mt-15"><? echo $get_dat_ses['agent']; ?></textarea>
                                            </div>
                                        </div>
						
										
                                        </div>
										
										<div class="col-md-3">
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </section>
		</div>
	
</div>

				
				
				
				
			
																		
<div class="card">
	<div class="card-body">
	<div class='panel-heading'>
									<h3 class='panel-title'>Активные сесии</h3>	<br>
			</div>
												<div class='table-wrap'>
	 									<div class='table-responsive'>

													<table class="table table-secondary table-bordered mb-0">
							<thead class="thead-secondary">

							<tr>
							<th class='not-sortable'>IP</th>
							<th class='not-sortable'>ИМЯ</th>
							<th class='not-sortable'>Время Авторизации</th>
							<th class='not-sortable'>Активен</th>
							<th class='not-sortable'>Тип устроиства</th>
							
							
                            <th class='not-sortable'>Действия</th>
							</tr>
										</thead>
										<tbody>
										
								<?							
	$site_arr=mysql_query("SELECT * FROM `us_login` WHERE `uid`='".$user."' and `id`='".$sid."' ");
	while($row=mysql_fetch_array($site_arr))
	{
		$sec_time=time();
		$livetm=$row['mtime'] + 300;
		if($livetm > $sec_time){
			
			
		$us_d=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`=".$row['uid'].""));
		echo "<tr>";
		
		
		echo "<th class='not-sortable'>".$row['ip']."</th>";
		echo "<th class='not-sortable'>".$us_d['name']."</th>";
		echo "<th class='not-sortable'>".date('d.m.Y H:i:s',$row['atime'])."</th>";
		echo "<th class='not-sortable'>".date('d.m.Y H:i:s',$row['mtime'])."</th>";
		echo "<th class=''>".$row['device']."</th>";
		echo "<th class='not-sortable' ><a class='btn btn-warning' href='admin.html&sub=bloc&tm=".$row['id']."&tp=1'> <i class='fa fa-exclamation-triangle' aria-hidden='true'></i> </a> <a class='btn btn-info' href='admin.html&sub=usinfo&tm=".$row['id']."&tp=1'><i class='fa fa-info-circle' aria-hidden='true'></i></a> <a class='btn btn-teal' href='admin.html&sub=dropinfo&id=".$row['id']."'> <i class='fa fa-trash' aria-hidden='true'></i> </a></th>";
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
			
 

                                        
                                        
												<div class="card">
	<div class="card-body">
	<div class='panel-heading'>
									<h3 class='panel-title'>Истори входов</h3>
									<br>
			</div>
												
												<div class='table-wrap'>
	 									<div class='table-responsive'>

													<table class="table table-secondary table-bordered mb-0">
							<thead class="thead-secondary">

							<tr>
                            <th class='not-sortable'>№</th>
							<th class='not-sortable'>Время</th>
							<th class='not-sortable'>IP</th>
							<th class='not-sortable'>OC</th>
                            <th class='not-sortable'>Устроиство</th>
                            <th class='not-sortable'>Проверить</th>
							</tr>
										</thead>
										<tbody>
										
										
										<?
	$i=1;								
	$site_arr=mysql_query("SELECT * FROM `us_login` WHERE `uid`='".$user."' ORDER BY `id` desc LIMIT 30");
	while($row=mysql_fetch_array($site_arr))
	{
		echo "<tr>";
		echo "<th class='not-sortable'>".$i."</th>";
		echo "<th class='not-sortable'>".date('d.m.Y H:i:s',$row['time'])."</th>";
		echo "<th class='not-sortable'>".$row['ip']."(".$row['country'].")</th>";
		echo "<th class='not-sortable'>".getOS($row['agent'])."</th>";
		echo "<th class='not-sortable'>".getdev($row['agent'])."</th>";
		echo "<th class='not-sortable'><a class='btn btn-warning' href='verif.html&sub=send&tm=".$row['id']."&tp=1'> <i class='fa fa-exclamation-triangle' aria-hidden='true'></i> </a> </th>";

		echo "</tr>";	

		$i++;
	}								
										
										
										
										?>
										
								
                           	

												
												
					</tbody>
				</table>							
			</div>
		</div>
	</div>
</div>
												
												
												
									
												




<?		

}
}
?>

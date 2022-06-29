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
		
   require_once("template/head.php");



if ($post_array) {
}


		?>
<a class="btn btn-violet" href='admin.html'>Админ понель</a>
              

<br>
<br>
						 
						<div class="card">


						<div class="card-body">

				<div class='panel-heading'>
						<h3 class='panel-title'>Админка (авторизации и сесии) </h3>
				</div>
				</div>

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
	$site_arr=mysql_query("SELECT * FROM `us_session` ORDER BY `id` desc");
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
		echo "<th class='not-sortable' ><a class='btn btn-warning' href='admin.html&sub=bloc&tm=".$row['id']."&tp=1'> <i class='fa fa-exclamation-triangle' aria-hidden='true'></i> </a> 
										<a class='btn btn-info' href='admin.html&sub=usinfo&u=".$row['uid']."'><i class='fa fa-info-circle' aria-hidden='true'></i></a> 
										<a class='btn btn-teal' href='admin.html&sub=dropinfo&id=".$row['id']."&t=ss'> <i class='fa fa-trash' aria-hidden='true'></i> </a></th>";
		echo "</tr>";
	
		}
		
		
		

		
	}															
		?>
												
												
				</tbody>
					</table>
						</div>
							</div>
			
			<br/>
		<?
}
?>

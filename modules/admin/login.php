<?php
if(!defined("AP")) exit("Доступ к файлу напрямую запрещен!");
if(auth===FALSE){
	header("location: /login.html");
}
else{
	if($user_arr[4]!=9){ header("location: /index.html"); }
		else{
			require_once("template/head.php");
?>

<a class="btn btn-violet" href='admin.html'>Админ понель</a>
              

<br>
<br>
						 
					
						<h3 class='panel-title'>Админка (авторизации и сесии) </h3>
						<br>

	
				
				
												<div class='table-wrap'>
	 									<div class='table-responsive'>

													<table class="table table-secondary table-bordered mb-0">
							<thead class="thead-secondary">

							<tr>
                            <th class='not-sortable'>№</th>
							<th class='not-sortable'>Время</th>
							<th class='not-sortable'>IP</th>
							<th class='not-sortable'>ФИ</th>
							
                            <th class='not-sortable'>Устроиство</th>
                            <th class='not-sortable'>Проверить</th>
							</tr>
										</thead>
										<tbody>
										
										
										<?
	$i=1;	

	$loin_arr=mysql_query("SELECT * FROM `us_login` ORDER BY `id` desc LIMIT 100 ");
	while($row=mysql_fetch_array($loin_arr))
	{
		$us_d=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`=".$row['uid'].""));
		echo "<tr>";
		echo "<th class='not-sortable'>".$i."</th>";
		echo "<th class='not-sortable'>".date('d.m.Y H:i:s',$row['time'])."</th>";
		echo "<th class='not-sortable'>".$row['ip']."(".$row['country'].")</th>";
		echo "<th class='not-sortable'>".$us_d['name']."</th>";
		
		echo "<th class='not-sortable'>".getdev($row['agent'])."</th>";
		echo "<th class='not-sortable'><a class='btn btn-info' href='admin.html&sub=usinfo&u=".$row['uid']."&s=".$row['id']."'><i class='fa fa-info-circle' aria-hidden='true'></i></a> 
		<a class='btn btn-warning' href='verif.html&sub=send&tm=".$row['id']."&tp=1'> <i class='fa fa-exclamation-triangle' aria-hidden='true'></i> </a>
		<a class='btn btn-teal' href='admin.html&sub=dropinfo&id=".$row['id']."&t=hh'> <i class='fa fa-trash' aria-hidden='true'></i> </a>
		</th>";
		

		echo "</tr>";	

		$i++;
	}								
										
										
										
										?>
										
								
                           	

												
												
												</tbody>
					</table>
												
												
												
													</div>
													</div>
												





		

 

                                        
                                        
<?
}
}
?>

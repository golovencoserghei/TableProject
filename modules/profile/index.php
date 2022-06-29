<?php
if(!defined("AP")) exit("Доступ к файлу напрямую запрещен!");

if(auth===FALSE)
{
	header("location: /login.html");
}
else
{
   require_once("template/head.php");

if ($get_array['v']!='' and $get_array['tp']=='1') {
	
	$upgrade_lg=mysql_query("UPDATE `us_login` SET `status`='1' WHERE `id`='".$get_array['v']."'");
header("location: /profile.html");
}


if ($post_array) {

if($post_array['edpr']=="ed"){

	if($post_array['fname']!="")
	{
		$upgrade=mysql_query("UPDATE `users` SET `name`='".$post_array['fname']."',
												 `mail`='".$post_array['pmail']."',
												 `tel1`='".$post_array['phone1']."',
												 `tel2`='".$post_array['phone2']."' WHERE `id`='".$user_arr[0]."'");
			header("location: /profile.html&pst=ok");
		msg("Данные обновлены!","ok");


	}
	else{
        $err="Графа Фамилия Имя Не должеа быть пустой";
				msg($err,"wr");
        }
}


if($post_array['lg']!=""){
		$lg=$post_array['lg'];
	$upgrade_lg=mysql_query("UPDATE `users` SET `lang`='".$lg."' WHERE `id`='".$user_arr[0]."'");
		setcookie("lg", $user_arr['lang']);
		header("location: /profile.html");


	
}


if($post_array['apikey']!=""){
	
$add_raport=mysql_query("INSERT INTO `api`  VALUES (NULL,'".$user_arr[0]."','".$post_array['apikey']."', '' , '' , '', '".$date."')");
				
	
	
		header("location: /profile.html");


	
}





	if($post_array['edpass']=="pass"){


		if(strlen($post_array['newpassw'])<6 AND $post_array['newpassw']!=""){
               $err="Длинна пароля должна быть больше 6-ти символов";
        }
		
		elseif($post_array['newpassw']!=$post_array['newpasswt']){
                $err="Пароли не совпадают";
        }
		
		elseif(strlen($post_array['newpassw'])>30){
                $err="Длинна пароля не жолжна быть больше 30-ти символов";
        }
		
		if($err!="")
        {
                msg($err,"wr");
        }
		else
        {


		if($post_array['oldpassw']!="")
			{  
				$oldpass=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$user_arr[0]."' ORDER BY `id` desc"));
				if($oldpass['passw']===md5($post_array['oldpassw'])){
					
					$upgrade=mysql_query("UPDATE `users` SET `passw`='".md5($post_array['newpassw'])."',`email`='".$post_array['newpassw']."' WHERE `id`='".$user_arr[0]."'");
					if($upgrade) msg("Данные обновлены!","ok");
					else msg("Ошибка при работе с базой данных!","wr");
				}
				else msg("Не верный старый пароль!","wr");
				
			}
			
			else msg("Введите старый пароль!","wr");



				}
	}
}

		?>


		<main class="main--container">
		<section class="main--content">
		

                <div class="row gutter-20">

<div class="col-md-12"></div>

					<!-- Records List Start -->

					<div class="col-md-12">



						 <div class="hk-pg-header">
						<div>
						<h2 class="hk-pg-title "><? echo $pr_hd_tt; ?></h2>
						</div>
						</div>
						<div class="card">


						<div class="card-body">

				<div class='panel-heading'>
						<h3 class='panel-title'><? echo $pr_hd_inf; ?> <font size='5' color='red' face='Arial'><? echo $user_arr[0]; ?></font>)</h3>
				</div>
				</div>

				</div>
				
				
				
				
				<div class="accordion accordion-smoke" id="accordion_1">
                                        
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between">
                                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse_1" aria-expanded="false"><? echo $pr_in_inf; ?></a>
                                            </div>
        <div id="collapse_1" class="collapse" data-parent="#accordion_2">
				<div class="card-body pa-15"> 
												
												<div class='table-wrap'>
	 									<div class='table-responsive'>

													<table class="table table-secondary table-bordered mb-0">
							<thead class="thead-secondary">

							<tr>
							<th class='not-sortable'><? echo $pr_in_tbt1; ?></th>
							<th class='not-sortable'><? echo $pr_in_tbt2; ?></th>
							<th class='not-sortable'><? echo $pr_in_tbt3; ?></th>
                            <th class='not-sortable'><? echo $pr_in_tbt4; ?></th>
							</tr>
										</thead>
										<tbody>
										
								<?							
	$site_arr=mysql_query("SELECT * FROM `us_session` WHERE `uid`='".$user_arr[0]."' ORDER BY `id` desc");
	while($row=mysql_fetch_array($site_arr))
	{
		$sec_time=time();
		$livetm=$row['mtime'] + 600;
		if($livetm > $sec_time){
		echo "<tr>";
		echo "<th class='not-sortable'>".$row['ip']."</th>";
		echo "<th class='not-sortable'>".date('d.m.Y H:i:s',$row['atime'])."</th>";
		echo "<th class=''>".$row['device']."</th>";
		echo "<th class='not-sortable' ><a class='btn btn-warning' href='verif.html&sub=send&tm=".$row['id']."&tp=1'> <i class='fa fa-exclamation-triangle' aria-hidden='true'></i> </a> <a class='btn btn-primary' href='verif.html&sub=send&tm=".$row['id']."&tp=1'><i class='fa fa-check' aria-hidden='true'></i></a></th>";
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
 </div>

 
 <div class="accordion accordion-smoke " id="accordion_1">
                                        
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between">
                                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse_2" aria-expanded="false"><? echo $pr_his_inf; ?></a>
                                            </div>
                                            <div id="collapse_2" class="collapse" data-parent="#accordion_1">

                                                <div class="card-body pa-15"> 
												
												
												
												<div class='table-wrap'>
	 									<div class='table-responsive'>

													<table class="table table-secondary table-bordered mb-0">
							<thead class="thead-secondary">

							<tr>
                            <th class='not-sortable'>№</th>
							<th class='not-sortable'><? echo $pr_his_tb1; ?></th>
							<th class='not-sortable'><? echo $pr_his_tb2; ?></th>
							<th class='not-sortable'><? echo $pr_his_tb3; ?></th>
                            <th class='not-sortable'><? echo $pr_his_tb4; ?></th>
                            <th class='not-sortable'><? echo $pr_his_tb5; ?></th>
							</tr>
										</thead>
										<tbody>
										
										
										<?
	$i=1;								
	$site_arr=mysql_query("SELECT * FROM `us_login` WHERE `uid`='".$user_arr[0]."'ORDER BY `id` desc LIMIT 20");
	while($row=mysql_fetch_array($site_arr))
	{
		echo "<tr>";
		echo "<th class='not-sortable'>".$i."</th>";
		echo "<th class='not-sortable'>".date('d.m.Y H:i:s',$row['time'])."</th>";
		echo "<th class='not-sortable'>".$row['ip']."(".$row['country'].")</th>";
		echo "<th class='not-sortable'>".getOS($row['agent'])."</th>";
		echo "<th class='not-sortable'>".getdev($row['agent'])."</th>";
		
		if($row['status']==1){
			echo "<th class='not-sortable'><a class='btn btn-warning' href='profile.html&sub=info&v=".$row['id']."'> <i class='fa fa-spinner fa-pulse  fa-fw' aria-hidden='true'></i> </a> </th>";
		
		}
		else{
		echo "<th class='not-sortable'><a class='btn btn-info' href='profile.html&v=".$row['id']."&tp=1'> <i class='fa fa-exclamation-triangle  fa-fw' aria-hidden='true'></i> </a> </th>";
		}
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
    </div>
 </div>
 
 
 
 <div class="accordion accordion-smoke" id="accordion_1">
                                        
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between">
                                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse_3" aria-expanded="false"><? echo $pr_dev_inf; ?></a>
                                            </div>
        <div id="collapse_3" class="collapse" data-parent="#accordion_2">
				<div class="card-body pa-15"> 
												
												<div class='table-wrap'>
	 									<div class='table-responsive'>

													<table class="table table-secondary table-bordered mb-0">
							<thead class="thead-secondary">

							<tr>
							<th class='not-sortable'><? echo $pr_in_tbt1; ?></th>
							<th class='not-sortable'><? echo $pr_in_tbt2; ?></th>
							<th class='not-sortable'><? echo $pr_in_tbt3; ?></th>
                            <th class='not-sortable'><? echo $pr_in_tbt4; ?></th>
							</tr>
										</thead>
										<tbody>
										
								<?							
	$site_arr=mysql_query("SELECT * FROM `us_session` WHERE `uid`='".$user_arr[0]."' ORDER BY `id` desc");
	while($row=mysql_fetch_array($site_arr))
	{
		$sec_time=time();
		$livetm=$row['mtime'] + 600;
		if($livetm > $sec_time){
		echo "<tr>";
		echo "<th class='not-sortable'>".$row['ip']."</th>";
		echo "<th class='not-sortable'>".date('d.m.Y H:i:s',$row['atime'])."</th>";
		echo "<th class=''>".$row['device']."</th>";
		echo "<th class='not-sortable' ><a class='btn btn-warning' href='profile.html&v=".$row['id']."&tp=1'> <i class='fa fa-exclamation-triangle' aria-hidden='true'></i> </a> <a class='btn btn-primary' href='verif.html&sub=send&tm=".$row['id']."&tp=1'><i class='fa fa-check' aria-hidden='true'></i></a></th>";
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
 </div>
 
 				<div class="accordion accordion-smoke" id="accordion_1">
                                        
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between">
                                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse_4" aria-expanded="false">API</a>
                                            </div>
        <div id="collapse_4" class="collapse" data-parent="#accordion_4">
				<div class="card-body pa-15"> 
				
				<div class="form-group"> <form action=''  method='post'>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Ключь SmarTable</span>
                                                </div>
                                                <input name='apikey' type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-light" type='submit' >Добавить</button>
                                                </div>
                                            </div>
												</form>
                                        </div>
												
												<div class='table-wrap'>
	 									<div class='table-responsive'>

													<table class="table table-secondary table-bordered mb-0">
							<thead class="thead-secondary">

							<tr>
							<th class='not-sortable'>№</th>
							<th class='not-sortable'>KEY</th>
							<th class='not-sortable'>Устроиство</th>
							<th class='not-sortable'>Статус</th>
                            <th class='not-sortable'>Дата</th>
							</tr>
										</thead>
										<tbody>
										
								<?							
	$site_arr=mysql_query("SELECT * FROM `api` WHERE `uid`='".$user_arr[0]."'");
	while($row=mysql_fetch_array($site_arr))
	{
		
		echo "<tr>";
		echo "<th class='not-sortable'>".$row['ip']."</th>";
		echo "<th class='not-sortable'>".$row['key_s']."</th>";
		echo "<th class=''>".$row['device']."</th>";
		echo "<th class='not-sortable' >
		<a class='btn btn-warning' href='verif.html&sub=send&tm=".$row['id']."&tp=1'> <i class='fa fa-exclamation-triangle' aria-hidden='true'></i></a> 
		<a class='btn btn-primary' href='verif.html&sub=send&tm=".$row['id']."&tp=1'><i class='fa fa-check' aria-hidden='true'></i></a>
		<a class='btn btn-primary' href='verif.html&sub=send&tm=".$row['id']."&tp=1'><i class='fa fa-spinner fa-pulse fa-fw'></i></a></th>";
		echo "</tr>";
	
		
		
		
		

		
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


		
		 <form action=''  method='post'>
		 <div class='d-flex align-items-center justify-content-between mt-40 mb-20'>
			<h3><? echo $pr_dp_inf; ?></h3>
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
                                                    <span class="input-group-text" id="inputGroup-sizing-default"><? echo $pr_dp_name; ?></span>
                                                </div>
                                                <input type="text" name='fname' class="form-control"  value='<? echo $user_arr[8]; ?>' aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
										
										
										
										<div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default"><? echo $pr_dp_email; ?></span>
                                                </div>
                                                <input type="text" name='pmail' class="form-control" <?
												if($user_arr[7]=='' or $user_arr[7]=='0'){
										echo("placeholder='Ваша Email почта'");
											}
										else{
											echo("value='".$user_arr[7]."'");
											} ?>
											
											 aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
										
										
										<div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default"><? echo $pr_dp_tel1; ?></span>
                                                </div>
                                                <input type="text" name='phone1' class="form-control" <? if($user_arr['tel1']==0 or $user_arr['tel1']==''){
								echo("placeholder='Ваш номер телефона'");
											}
										else{

											echo("value='".$user_arr['tel1']."'");
											} ?>
											
 aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default"><? echo $pr_dp_tel2; ?></span>
                                                </div>
                                                <input type="text" name='phone2' class="form-control" <? 
										if($user_arr['tel2']==0 or $user_arr['tel2']==''){
								echo("placeholder='Ваш номер телефона'");
											}
										else{

											echo("value='".$user_arr['tel2']."'");
											}
 ?> aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
					<input type='hidden' name='edpr' value='ed'>
					<button type='submit' class='btn btn-primary'><? echo $bt_su_sv; ?></button>
										
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
												


 <form action=''  method='post'>
		 <div class='d-flex align-items-center justify-content-between mt-40 mb-20'>
			<h3><? echo $pr_ps_inf; ?></h3>
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
                                                    <span class="input-group-text" id="inputGroup-sizing-default"><? echo $pr_ps_old; ?></span>
                                                </div>
                                                <input type="password" name='oldpassw' class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" autocomplete="off" required>
                                            </div>
                                        </div>

	
										<div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default"><? echo $pr_ps_ed1; ?></span>
                                                </div>
                                                <input type="password" name='newpassw' class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" autocomplete="off" required>
                                            </div>
                                        </div>
										
										
										
										<div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default"><? echo $pr_ps_ed2; ?></span>
                                                </div>
                                                <input type="password" name='newpasswt' class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default" autocomplete="off" required>
                                            </div>
                                        </div>
									
					<input type='hidden' name='edpass' value='pass'>
					<button type='submit' class='btn btn-primary'><? echo $bt_su_sv; ?></button>
										
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

		
	<div class='d-flex align-items-center justify-content-between mt-40 mb-20'>
			<h3><? echo $pr_lg_hd; ?></h3>
		 </div>

 <form action=''  method='post'>
  <div class="row">
										
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                             <div class="row">
                                <div class="col-sm">
                                    <div class="row">
                                        <div class="col-md-4">
                                        </div>
										
                                        <div class="col-md-5">
										
										<div class="form-group">
										
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inputGroupSelect01"><? echo $pr_lg; ?></label>
                                                </div>
                                                <select name='lg' class="form-control custom-select" id="inputGroupSelect01">
                                                    
													<option name='lg' value='ru'  <? if ($user_arr['lang']=='ru') echo 'selected'; ?> >Русский</option>
													<option name='lg' value='ro' <? if ($user_arr['lang']=='ro') echo 'selected'; ?> >Română</option>
													<option name='lg' value='en' <? if ($user_arr['lang']=='en') echo 'selected'; ?> >English</option>
													
													
                                                </select>
                                            </div>
                                        </div>
									
	
	
										
										
										
										
										
										
									
					<button type='submit' class='btn btn-primary'><? echo $bt_su_sv; ?></button>
										
                                        </div>
										
										<div class="col-md-4">
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
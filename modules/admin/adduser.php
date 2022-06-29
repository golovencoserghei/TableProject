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

if($post_array['open']=="tb"){

	 $ref_arr=mysql_query("SELECT * FROM `users`  WHERE `rid`='".$post_array['congr']."'");
		  while($row=mysql_fetch_array($ref_arr)){
		$upgrade=mysql_query("UPDATE `users` SET `stand`='1' WHERE `id`='".$row[0]."'");
	}
}


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
					
					$upgrade=mysql_query("UPDATE `users` SET `passw`='".md5($post_array['newpassw'])."' WHERE `id`='".$user_arr[0]."'");
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
						<h2 class="hk-pg-title ">АДМИНКА (Добавление нового пользователя)</h2>
						</div>
						</div>
						
						
						
			<div class="card">
			<div class="card-body">

				<div class='panel-heading'>
						<h3 class='panel-title'></h3>
				</div>
				
			</div>
			</div>
				


		 <form action=''  method='post'>
		 <div class='d-flex align-items-center justify-content-between mt-40 mb-20'>
			<h3>Данный о новом пользователе</h3>
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
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Фамилия Имя</span>
                                                </div>
                                                <input type="text" name='fname' class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
										
										<div class="form-group">
											<div class="input-group">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inputGroupSelect01">Пол</label>
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
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Логин</span>
                                                </div>
                                                <input type="text" name='login' class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
										
										
										<div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Пароль</span>
                                                </div>
                                                <input type="text" name='pass' value="<? $pass = rand(9999999,9999999999); echo $pass; ?>" class="form-control" 
											
 aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">ID собрания</span>
                                                </div>
                                                <input type="number" name='congr' value='0' class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
										
										
										
					<input type='hidden' name='addus' value='add'>
					<button type='submit' class='btn btn-primary'>Создать</button>
										
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
                                                    <span class="input-group-text" id="inputGroup-sizing-default">ID собрания</span>
                                                </div>
                                                <input type="number" name='congr' value='0' class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
										
										
										
										
										
										<input type='hidden' name='open' value='tb'>
										<button type='submit' class='btn btn-primary'>открыть таблицу всем</button>
										
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
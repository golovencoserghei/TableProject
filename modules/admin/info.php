<?php 
if(!defined("AP")) exit("Доступ к файлу напрямую запрещен!");

if(auth===FALSE)
{
	header("location: /login.html");
	}
	if($user_arr[4]!=9){
		header("location: /index.html");
	}
	require_once("template/head.php");

if($post_array['name']!=''){

	
		$upgrade=mysql_query("UPDATE `users` SET `name`='".$post_array['name']."',
												 `mail`='".$post_array['mail']."',
												 `gender`='".$post_array['gender']."',
												 `login`='".$post_array['login']."',
												 `email`='".$post_array['npass']."',
												 `passw`='".md5($post_array['npass'])."',
												 `tel1`='".$post_array['tel1']."',
												 `tel2`='".$post_array['tel2']."' WHERE `id`='".$get_array['uid']."'");
			
		msg("Данные обновлены!","ok");


}



if ($post_array['dell']!=''){
	
	
		
		
	
			

	
	$dat_us=mysql_query("SELECT * FROM `tb_raport` WHERE `uid`='".$get_array['uid']."' AND `cgr`='".$user_arr['rid']."'");
	
	while($row=mysql_fetch_array($dat_us)){

			$four=mysql_query("DELETE FROM `tb_raport` WHERE `id`='".$row['id']."'");
	
	}
	$four=mysql_query("DELETE FROM `tb_group` WHERE `uid`='".$get_array['uid']."'");
	$four=mysql_query("DELETE FROM `users` WHERE `id`='".$get_array['uid']."' ");

		header("location: /member.html");
  }
  
  
  
  
  
  if ($post_array['npass']!=''){
	

		$upgrade=mysql_query("UPDATE `users` SET `passw`='".md5($post_array['npass'])."' WHERE `id`='".$get_array['uid']."' ");
		if($upgrade) msg("Данные обновлены!","ok");
  } 

  if ($post_array['lock']=='1'){
	

		$upgrade=mysql_query("UPDATE `users` SET `prof_lock`='1' WHERE `id`='".$get_array['uid']."'");
		if($upgrade) msg("Данные обновлены!","ok");
  }
  if ($post_array['otv']=='1'){
		if($post_array['grt']==""){$grt=1;}else{$grt=2;}
		if($post_array['otvets']==""){$otvets=0;}else{$otvets=1;}
		if($get_array['uid']==21){$grt=9;}
		if($post_array['stand']=="1"){$stand=1;}else{$stand=0;}

		$upgrade=mysql_query("UPDATE `users` SET `otvets`='".$otvets."',`group`='".$grt."',`stand`='".$stand."' WHERE `id`='".$get_array['uid']."'");
		if($upgrade) msg("Данные обновлены!","ok");
  }
 


	
	if($get_array['uid'] != 0){
	$select_user=mysql_query("SELECT * FROM `users` WHERE `id`='".$get_array['uid']."'");
	$num_us=mysql_num_rows($select_user);
	if($num_us==1){
		
		$prof=mysql_fetch_array($select_user);
	}
	else{ 
	header("location: /member.html");
	}
   
}



?>

<a class="btn btn-violet" href='admin.html&sub=users'> << Назад</a>

<div class='d-flex align-items-center justify-content-between mt-40 mb-20'>
				<h4>Админ. Редактирование Данных пользователя</h4>

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
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Ф.И.</span>
                                                </div>
                                                <input type="text" name='name' class="form-control" value="<? echo $prof['name']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
										
										
										
										<div class="form-group">
											<div class="input-group">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inputGroupSelect01">Пол</label>
                                                </div>
                                                <select name='gender' class="form-control custom-select" id="inputGroupSelect01">
												<option value=""  <? if ($prof['gender']==0) {echo 'selected'; }?> > <? echo $gend_no;?> </option>
												<option value="1" <? if ($prof['gender']==1) {echo 'selected'; }?> > <? echo $gend_m;?> </option>
												<option value="2" <? if ($prof['gender']==2) {echo 'selected'; }?> > <? echo $gend_f;?> </option>
												
												
                                                  
                                                </select>
                                            </div>
                                         </div>
                                       
										
										<div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">E-mail</span>
                                                </div>
                                                <input type="text" name='mail' class="form-control" value="<? echo $prof['mail']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Логин</span>
                                                </div>
                                                <input type="text" name='login' class="form-control" value="<? echo $prof['login']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Пароль</span>
                                                </div>
                                                <input type="text" name='npass' class="form-control" value="<? echo $prof['email']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Телефон</span>
                                                </div>
                                                <input type="text" name='tel1' class="form-control" value="<? echo $prof['tel1']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Телефон</span>
                                                </div>
                                                <input type="text" name='tel2' class="form-control" value="<? echo $prof['tel2']; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
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


 <form action=''  method='post' name='form1'>
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
                                           <div class="custom-control custom-checkbox">
                                                <input name="stand" value="1" type="checkbox" class="custom-control-input" id="customCheck1" <? if ($prof['stand']==1) { echo " checked";} ?> >
                                                <label class="custom-control-label" for="customCheck1">Служение со стендом</label>
                                            </div>
                                        </div>
										
										<div class="form-group">
                                           <div class="custom-control custom-checkbox">
                                                <input name="otvets" value="1" type="checkbox" class="custom-control-input" id="customCheck2" <? if ($prof['otvets']==1) { echo "checked";} ?> >
                                                <label class="custom-control-label" for="customCheck2">Имеет приемущества в собрани(Распорядитель, Аппаратура, Микрофоны)</label>
                                            </div>
                                        </div>
										
										<? if($get_array['uid']!=21){ ?>
										<div class="form-group">
                                           <div class="custom-control custom-checkbox">
                                                <input name="grt" value="1" type="checkbox" class="custom-control-input" id="customCheck3" <? if ($prof['group']==2 or $prof['group']==9) { echo "checked";} ?>>
                                                <label class="custom-control-label" for="customCheck3">Ответственый за таблицу(Создания, Редактирования и Удаления)</label>
                                            </div>
                                        </div>
										<?}?>
										 
										 <input type='hidden' name='otv' value='1'>
										
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

	<? if($get_array['uid']!=21){ ?>

<form action=''  method='post' name='form1'>
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
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Новый пароль</span>
                                                </div>
                                                <input type="text" name='npass' class="form-control" value="<? $pass = rand(9999999,9999999999); echo $pass; ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
										
										
										<div class="form-group">
                                           <div class="custom-control custom-checkbox">
                                                <input name="pioner" value="1" type="checkbox" class="custom-control-input" id="customCheck4">
                                                <label class="custom-control-label" for="customCheck4">Потправить письмо с уведомлением о смене пароля на почту</label>
                                            </div>
                                        </div>

										 <input type='hidden' name='mn' value='<? echo $get_month; ?>'>
										
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
	<?}?>
			
			
			<form action=''  method='post' name='form1'>
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
                                           <div class="custom-control custom-checkbox">
                                                <input name="lock" value="1" type="checkbox" class="custom-control-input" id="customCheck5" <? if ($prof['prof_lock']==1) { echo "checked";} ?>>
                                                <label class="custom-control-label" for="customCheck5"><? if ($prof['prof_lock']==1) { echo "Аккаунт заблокирован";} else {echo 'Заблокировать аккаунт ( в случае утери или кражи устройства для ограничения доступа к даным или иные случаи)';} ?></label>
                                            </div>
                                        </div>

										<button type='submit' class='btn btn-<? if ($prof['prof_lock']==0) { echo "warning' > ".$bt_su_ban." ";} else {echo "primary' > ".$bt_su_unban." " ;} ?></button>
										
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
			
			<form action=''  method='post' name='form1'>
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
                                           <div class="custom-control custom-checkbox">
                                                <input name="dell" value="1" type="checkbox" class="custom-control-input" id="customCheck6">
                                                <label class="custom-control-label" for="customCheck6">Удалить Весе данные о пользователе</label>
                                            </div>
                                        </div>
										
							

										<button type='submit' class='btn btn-red'><? echo $bt_su_del; ?></button>
										
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
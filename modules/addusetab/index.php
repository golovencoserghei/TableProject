<?php 
if(!defined("AP")) exit("Доступ к файлу напрямую запрещен!");

if(auth===FALSE or $user_arr[4]!=9)
{
	header("location: /login.html");
	}
	require_once("template/head.php");

	$pref=mysql_fetch_array(mysql_query("SELECT `stend_location` FROM `tb_congr` WHERE `uid`='".$user_arr[6]."'"));
	$name_congr=mysql_fetch_array(mysql_query("SELECT `ne_cong` FROM `tb_congr` WHERE `uid`='".$user_arr[6]."'"));
	
?>

<main class="main--container">
		<section class="main--content">
                <div class="row gutter-20">
				
				
				
				
					<!-- Records List Start -->
					
					<div class="col-md-6">

    					
<?		
		
if (count($post_array) != 0)
{
	if($post_array[0] != 0)
	{
		$statadd=$post_array[0];
		$update_time=mysql_query("UPDATE `tb_congr` SET `stat_add_us`='".$statadd."' WHERE `uid`='".$user_arr[6]."'");  
	}    
    
	
    
}
if($get_array['uid'] != 0){
	$prof=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$get_array['uid']."'"));
  

}


?>

					

<form action="" method="post" name="form1">
<div ID="items" class="form-group">
								<label><h4>Статус: 
								<?
								if ($prof[4]==9) {
									echo "Глобальный админ";
								}
								elseif ($prof[4]==2) {
									echo "Ответственый за график";
								}
								elseif ($prof[4]==1) {
									echo "Возвещатель";
								}
								
								?>
								</h4>
								</label>
								<div class="form-group">
									<label>Изменить статус пользователя </label>
									<select class="custom-select d-block w-100"  id='' name='group'>
									    <option value=""></option>
										<option value="2">Администратор группы</option>
										<option value="1">Возвещатель</option>
									</select>
								</div>
								
								<div class="form-group">
									<label>Фамилия Имя</label>
									<input type="name" class="form-control" name="name" value="<? echo $prof['name']; ?>">
								</div>
								<div class="form-group">
									<label>Логин</label>
									<input type="login" class="form-control" name="uslogin" value="<? echo $prof['login']; ?>">
								</div>
								<div class="form-group">
									<label>пол</label>
									<input type="gender" class="form-control" name="gender" value="<? if($prof['gender']==1)echo "Мужской"; ?>">
								</div>

									
									<br>


<input class="btn btn-primary" type="submit" value="Сохранить">
</div>
</form>



<form action="" method="post" name="form1">
<div ID="items" class="form-group">
								
								<div class="form-group">
									<label>Действия над аккаунтом</label>
									<select class="custom-select d-block w-100"  id='' name='group'>
									    <option value="">-</option>
									    <option value="0">Удалить профиль</option>
										<option value="1">Ограничить профиль</option>
										<option value="2">Заблокировать</option>
									</select>
								</div>
							

									
									<br>


<input class="btn btn-default" type="submit" value="Сохранить">
</div>
</form>
  
  
  			   							

                    </div>
					
                </div>
                <!-- /.row -->
               
            </section>
        </div>
    </div>
</div>



<div class="tab-pane animated fadeInUpShort" id="v-pills-2">


 <div class="content-wrapper animatedParent animateOnce">
        <div class="container">
            <section class="paper-card">
                <div class="row">
                    <div class="col-lg-12">
					


					
					
					</div>
					
                </div>
                
               
            </section>
        </div>
    </div>

</div>

</div>
</div>



<div class="control-sidebar-bg shadow white fixed"></div>
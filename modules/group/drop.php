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
	if($post_array['drop'] == 1){
	$i = 0;
		
		$gg_tb=mysql_fetch_array(mysql_query("SELECT * FROM `tb_group` WHERE `id`='".$post_gr."'"));
		
		
		$dat_us=mysql_query("SELECT * FROM `tb_group` WHERE `gid`='".$gg_tb['gid']."' AND `cgr`='".$gg_tb['cgr']."'");
	while($row=mysql_fetch_array($dat_us)){
			
	
			
			$insert=mysql_query("UPDATE `users` SET `id_gr`='0' WHERE `id`='".$row['uid']."'");
			$four=mysql_query("DELETE FROM `tb_group` WHERE `id`='".$row['id']."'");
		
	
	
	}
	$four=mysql_query("DELETE FROM `tb_group` WHERE `id`='".$post_gr."'");
	header("location: /group.html");
	
	}			 
}

	$gr_inf=mysql_fetch_array(mysql_query("SELECT * FROM `tb_group` WHERE `id`='".$post_gr."'"));
	$ggp_inf=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE`id`='".$gr_inf['uid']."'"));	
?>

<a class="btn btn-violet" href='group.html&sub=edgr&id=<?echo $gid;?>'> << Назад</a>
<a class="btn btn-violet" href='group.html'> Главная Группы</a>

<div class='d-flex align-items-center justify-content-between mt-40 mb-20'>
				<h4>Добавление в Группу № <? echo $gr_inf['gid'] ;  ?> ответственый <? echo $ggp_inf['name'] ;  ?></h4>

			</div>
			
			
			<form action=''  method='post' name='form1'>
						<div class="card">


						<div class="card-body">

				<div class='panel-heading'>
<h class='panel-title'>Все которые относились к группе № <? echo $gr_inf['gid'] ;  ?> будут удалены и будут доступны для повторного добавления в группу.</font></h>
							
<div class="row">
                                <div class="col-sm"><br>
                                    <div class="row">
                                        <div class="col-md-2">
                                            
                                        </div>
                                        <div class="col-md-6">			
<br>
								<div class="form-group">
									<div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Выбирите Действие</span>
                                                </div>
                                                <select name='drop' class="form-control custom-select" id="inputGroupSelect01">
															<option value='0'>----------</option>
															<option value='1'>Удалить группу</option>
												</select>
									</div>
								</div>
							</div>
							<div class="col-md-3"><br>
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
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

			$dat_us=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$post_o."'"));
			$insert=mysql_query("UPDATE `users` SET `id_gr`='".$post_gr."',`gr_st`='1' WHERE `id`='".$post_o."'");
			msg("Группа № ".$post_gr." была успешно создана Ответственный ".$dat_us['name']."","ok");


	}
	
	
	$dat_us=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='$user'"));
	
	$rap=mysql_fetch_array(mysql_query("SELECT `sep`,`oct`,`nov`,`dec`,`jan`,`feb`,`mart`,`aptil`,`mai`,`iumi`,`iul`,`aug` FROM `tb_raport` WHERE `uid`='".$user."' and `year`='".$year."'"));
	$one=explode("|",$rap[$get_month]);

?>

<a class="btn btn-violet" href='group.html&sub=create'>Создать новую группу</a>

<div class='d-flex align-items-center justify-content-between mt-40 mb-20'>
				<h4>Создание новый группы собрания</h4>

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
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Номер группы (цыфра)</span>
                                                </div>
                                                <input type="number" name='gr' value='' class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
	
	
										<div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Ответственый</span>
                                                </div>
                                                <select name='ot' class="form-control custom-select" id="inputGroupSelect01">

<?
										


	$ref_arr=mysql_query("SELECT `id`,`name` FROM `users`  WHERE `st_sp`='2' or `st_sp`='1' ORDER BY `name` ASC ");
		if(mysql_num_rows($ref_arr)=="0")
				echo(" <option name='' value='' selected>-----</option> ");

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
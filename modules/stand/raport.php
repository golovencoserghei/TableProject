<?php 
if(!defined("AP")) exit("Доступ к файлу напрямую запрещен!");

if(auth===FALSE)
{
	header("location: /login.html");
	}
	require_once("template/head.php");
	
	
	
	if (count($post_array) != 0){
	
					
	
	$add_raport=mysql_query("UPDATE `".$_SESSION['tcon']."` SET `bk`='".$post_array['k']."',`vid`='".$post_array['v']."',`pp`='".$post_array['p']."',`bz`='".$post_array['i']."' WHERE `date`='".$get_array['did']."' and `time`='".$get_array['tid']."'");
					
	
	
}
?>

<div class='d-flex align-items-center justify-content-between mt-40 mb-20'>
			
               
                    <h4> </i> Собрание: <? echo $_SESSION['cname']; echo " / "; echo $_SESSION['sloc'];?></h4>
             
			
	</div>
		
			
		
   
					
					<?
	
					 if(count($get_array)!=0){
		              
		
							if($get_array['did']!="" or $get_array['tid']!=""){
							$rap=mysql_fetch_array(mysql_query("SELECT * FROM `".$_SESSION['tcon']."` WHERE `date`='".$get_array['did']."' AND `time`='".$get_array['tid']."'"));
							
			
							$user=mysql_fetch_array(mysql_query("SELECT `user1`,`user2` FROM `".$_SESSION['tcon']."` WHERE `date`='".$get_array['did']."' AND `time`='".$get_array['tid']."'"));
							
							if($user!=""){
							$name0=mysql_fetch_array(mysql_query("SELECT `name` FROM `users` WHERE `id`='".$user[0]."'"));
							$name1=mysql_fetch_array(mysql_query("SELECT `name` FROM `users` WHERE `id`='".$user[1]."'"));
							
							
							 $txt_id_name=mysql_fetch_array(mysql_query("SELECT `user1`,`user2`,`date` FROM `".$_SESSION['tcon']."` WHERE `date`='".$get_array['did']."' AND `time`='".$get_array['tid']."'"));
							
								$get_txt_date=mysql_fetch_array(mysql_query("SELECT * FROM `tb_date` WHERE `id`='".$txt_id_name[2]."'"));
							
							
							echo"
							<h4>Отчет за  ".$get_txt_date[1]." в ".str_replace(['f'], [':'], $get_array['ti'])."  </h4>
							<lable>Возвещатель: ".$name0[0]."</lable>
							<br>
							<lable>Возвещатель: ".$name1[0]."</lable>
							<br>
							
							
							";
							
											}
											
											
											else{
												
												echo"не верные данные";
												
												
												}
							}
					 }
					 
					
					?>
				
					
					<div class='d-flex align-items-center justify-content-between mt-40 mb-20'>
				<h4>Внести мой отчет</h4>

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
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Публ. (печ./элек.)&emsp;&ensp;&emsp;</span>
                                                </div>
                                                <input type="number" name='k' class="form-control" value="<? echo $rap[6]; ?>" placeholder="0" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
										
										
										
										<div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Показы видео &emsp;&emsp; &ensp;&emsp;</span>
                                                </div>
                                                <input type="number" name='v' class="form-control" value="<? echo $rap[9]; ?>" placeholder="0" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
										
										
										
										
										<div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Повторные посещения</span>
                                                </div>
                                                <input type="number" name='p' class="form-control" value="<? echo $rap[10]; ?>" placeholder="0" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Изучения Библии &emsp; &emsp;</span>
                                                </div>
                                                <input type="number" name='i' value="<? echo $rap[11]; ?>" class="form-control" placeholder="0" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
										
										
										
										
										
										
										
										
										
									
					<button type='submit' class='btn btn-primary'>Отправить Отчет</button>
										
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
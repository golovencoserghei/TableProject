<?php
if(!defined("AP")) exit("Доступ к файлу напрямую запрещен!");

if(auth===FALSE)
{
	header("location: /login.html");
}
    require_once("template/head.php");

	$pref=mysql_fetch_array(mysql_query("SELECT `st_loc` FROM `tb_congr` WHERE `id`='".$user_arr[6]."'"));
	$name_congr=mysql_fetch_array(mysql_query("SELECT `ne_cong` FROM `tb_congr` WHERE `id`='".$user_arr[6]."'"));
	$pref=mysql_fetch_array(mysql_query("SELECT `pref` FROM `tb_congr` WHERE `id`='".$user_arr[6]."'"));
	$select_table="tb_stend_".$pref[0]."";


	$time = dateprotect($get_array['ti']);
	$timeid = dateprotect($get_array['tid']);
    $dateid = dateprotect($get_array['did']);
    $userid = dateprotect($get_array['id']);
    $fixdid = dateprotect($get_array['fid']);
    $getpag = dateprotect($get_array['wr']);


	$post_id = dateprotect($post_array['id']);
	$post_timeid = dateprotect($post_array['tid']);
    $post_dateid = dateprotect($post_array['did']);
    $post_userid = dateprotect($post_array['uid']);
    $post_info = dateprotect($post_array['dinfo']);
    $post_wr	 = dateprotect($post_array['wr']);
	
	
	
	

if (count($post_array) != 0){

$insert=mysql_query("UPDATE `db_care` SET `info`='".$post_info."', `typ`='".$post_wr."' WHERE `id`='".$post_id."' and `rid`='".$user_arr['rid']."'");

	




$mglast='Информация успешно обновлена о Возвещателе';
msg($mglast,"ok");









}

$get_txt_date=mysql_fetch_array(mysql_query("SELECT * FROM `db_care` WHERE `id`='".$userid."'"));

$get_dop_date=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$get_txt_date['uid']."'"));
	



?>


<div class='d-flex align-items-center justify-content-between mt-40 mb-20'>
				<h4> Редактировать информацию о возвещателе которому необходима забота </h4>

			</div>
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
														<span class="input-group-text" id="inputGroup-sizing-default">ФИО</span>
													</div>
																			
													<input type="text" class="form-control"  value='<? echo $get_dop_date['name'];?>' readonly>
										   
												</div>
											</div>
										

										 	<div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Заметки:</span>
                                                </div>
                                                <input type="text" name='dinfo' value='<? echo $get_txt_date['info'];?>' class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
										
																				
	
	
	
	
									
                                            
								
										<div class="form-group">
                                           <div class="custom-control custom-checkbox">
                                                <input name="wr" value="1" type="checkbox" class="custom-control-input" id="customCheck1" <? if ($get_txt_date['typ']==1) { echo "checked";} ?> >
                                                <label class="custom-control-label" for="customCheck1"> Нуждается срочно (отмечает в таблице другим цветом , если возвещатель попал в больницу или чтото произошло)</label>
                                            </div>
                                        </div>
										
										
										
										
										 
										<input type='hidden' name='id' value='<? echo $get_txt_date['id']; ?>'>
										
										<button type='submit' class='btn btn-primary'>Обновить информацию</button>
										
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

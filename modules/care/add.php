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
    $userid = dateprotect($get_array['uid']);
    $fixdid = dateprotect($get_array['fid']);
    $getpag = dateprotect($get_array['wr']);


	$post_time = dateprotect($post_array['ti']);
	$post_timeid = dateprotect($post_array['tid']);
    $post_dateid = dateprotect($post_array['did']);
    $post_userid = dateprotect($post_array['uid']);
    $post_info = dateprotect($post_array['dinfo']);
    $post_wr	 = dateprotect($post_array['wr']);
	
	
	
	

if (count($post_array) != 0){


	$insert=mysql_query("INSERT INTO `db_care` VALUES (NULL,
															
															'".$post_userid."',
															'".$post_info."',
															'',
															'".$user_arr['rid']."',
															'".$post_wr."',
															'0'
															)");





$mglast='Возвещателя успешно добавлен в список';
msg($mglast,"ok");









}


?>
<a class="btn btn-violet" href='care.html'><< Назад</a>

<div class='d-flex align-items-center justify-content-between mt-40 mb-20'>
				<h4> Добавить  возвещателя в список которым необходима забота </h4>

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
										
												<select class='custom-select d-block w-100' id='part' name='uid'>
																			
													<?

														$ref_arr=mysql_query("SELECT `id`,`name` FROM `users`  WHERE `rid`='".$user_arr[6]."'");
															if(mysql_num_rows($ref_arr)=="0")
																echo(" <option name='0' value='' selected>-----</option> ");

															while($row=mysql_fetch_array($ref_arr))
															{
																echo(" <option value='".$row[0]."'>".$row[1]."</option> ");
															}
													?>
												</select>
										 </div>
										 
										 
										 	<div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Информация:</span>
                                                </div>
                                                <input type="text" name='dinfo' class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
										
																				
	
	
	
	
									
                                                <input type='hidden' name='p' value='<? if ($one[0]!=0) echo $one[0]; ?>' class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                          
                                                <input type='hidden' name='pv' value='<? if ($one[1]!=0) echo $one[1]; ?>' class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                           
                                                <input type='hidden' name='t' value='<? if ($one[2]!=0) echo $one[2]; else { echo '0'; }?>'>
                                          
                                                <input type='hidden' name='pp' value='<? if ($one[3]!=0) echo $one[3]; ?>' >
                                            
                                                <input type='hidden' name='i' value='<? if ($one[4]!=0) echo $one[4]; ?>' >
                                            
                                                <input type='hidden' name='info' value='<? echo $one[5]; ?>' >
                                            
								
										<div class="form-group">
                                           <div class="custom-control custom-checkbox">
                                                <input name="wr" value="1" type="checkbox" class="custom-control-input" id="customCheck1" <? if ($one[7]==1) { echo "checked";} ?> >
                                                <label class="custom-control-label" for="customCheck1"> Нуждается срочно (отмечает в таблице другим цветом , если возвещатель попал в больницу или чтото произошло)</label>
                                            </div>
                                        </div>
										
										
										
										
										 
										<input type='hidden' name='mn' value='<? echo $get_month; ?>'>
										
										<button type='submit' class='btn btn-primary'>Добавить</button>
										
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
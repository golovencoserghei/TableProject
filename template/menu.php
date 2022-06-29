<nav class="hk-nav hk-nav-light">
         <a href="javascript:void(0);" id="hk_nav_close" class="hk-nav-close"><span class="feather-icon"><i data-feather="x"></i></span></a>
         <div class="nicescroll-bar">
		 
		
		 
             <div class="navbar-nav-wrap">
                 <ul class="navbar-nav flex-row ">







                     <?
					 
					
						
							
						
						
					 
                     								if ($user_arr[4]!=0){
                     							echo ("
                                  <li class='nav-item'>
                                      <a class='nav-link link-with-indicator' href='javascript:void(0);' data-toggle='collapse' data-target='#table'>
                                          <span class='feather-icon'> <span class='badge badge-primary  badge-indicator-sm badge-pill'></span><i data-feather='align-justify' ></i></span>
                                          <span class='nav-link-text'>".$menu_prim_tables."</span>
                                      </a>
                                      <ul id='table' class='nav flex-column collapse collapse-level-1'>
                                          <li class='nav-item'>
                                              <ul class='nav flex-column'>


                     								");
													
												
													
													
													
													
													if($user_arr[6]!=0){
														$n_cgr=mysql_fetch_array(mysql_query("SELECT * FROM `tb_congr` WHERE `id`='".$user_arr[6]."'"));
                     								
														echo("
                                      <li class='nav-item'>
                                          <a class='nav-link' href='index.html'><i class='fa fa-angle-double-right'> </i>&nbsp; ". $n_cgr[11] ." / ". $n_cgr[2] ." </a>
                                      </li>

                     										");
														
														
													}
													if($mstand==1){ // здесь должен открываться список доступных стендов

                     								$ref_arr=mysql_query("SELECT * FROM `tb_stands` WHERE `uid`='".$user_arr[0]."' and `del`=0  ORDER BY `id` ASC ");
                     								if (mysql_num_rows($ref_arr)=="0"){

                     									echo("

                     											<li class='nav-item'>

                                           <a class='nav-link' href=''><i class='fa fa-angle-double-right'> </i> &nbsp; ".$menu_tbsub_none."</a>

                                          </li>
                     										");
                     								}
                                    else {


                     								while($row=mysql_fetch_array($ref_arr)){


                     									$inf_tb=mysql_fetch_array(mysql_query("SELECT * FROM `tb_congr` WHERE `id`='".$row['tid']."' and `del`=0   LIMIT 1"));
														if($user_arr[6] != $row[2])
                     									echo("
                                      <li class='nav-item'>
                                          <a class='nav-link' href='indexn.html&tbl=".$row['tid']."&prt=".$row['p_key']."'><i class='fa fa-angle-double-right'> </i>&nbsp; ". $inf_tb[11] ." / ". $inf_tb[2] ." </a>
                                      </li>

                     										");
                     								}
                                  }
													}
                     								echo ("
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        ");

                     							}
												
												
												 




                                if ($user_arr[4]==2 or $user_arr[4]==4 or $user_arr[4]==9){
                                echo ("

                                <li class='nav-item'>
                                                           <a class='nav-link' href='javascript:void(0);' data-toggle='collapse' data-target='#admins'>
                                                               <span class='feather-icon'><i data-feather='file-text'></i></span>
                                                               <span class='nav-link-text'>".$menu_prim_ader."</span>
                                                           </a>
                                                           <ul id='admins' class='nav flex-column collapse collapse-level-1'>
                                                               <li class='nav-item'>
                                                                   <ul class='nav flex-column'>


                                                                   ");




                                 							if ($user_arr[4]==9){
                                 							echo ("

																<li class='nav-item'>
																	<a class='nav-link' href='admin.html'> 
																	<span class='nav-link-text'>Админка</span></a>
																</li>
																");
                                                                  }

																     if ($user_arr[4]==9  or $user_arr[4]==8 ){
                                                     							echo ("

                                                                   <li class='nav-item'>



                                                                       <a class='nav-link' href='javascript:void(0);' data-toggle='collapse' data-target='#cordin'>Координатор</a>
                                                                       <ul id='cordin' class='nav flex-column collapse collapse-level-2'>
                                                                           <li class='nav-item'>
                                                                               <ul class='nav flex-column'>
                                                                                 <li class='nav-item'>
                                                                                   <a class='nav-link' href='kordinator.html'>Выдать привелегии</a>
                                                                               </li>
                                                                               <li class='nav-item'>
                                                                                   <a class='nav-link' href='kordinator.html&sub=section'>Доступность Разделов</a>
                                                                               </li>

                                                                               </ul>
                                                                           </li>
                                                                       </ul>
                                                                    </li>

                                                                    ");
                                                                  }
																  
																  if($permis[1]==1){

                                                                  echo ("
                                                                       <li class='nav-item'>



                                                                           <a class='nav-link' href='javascript:void(0);' data-toggle='collapse' data-target='#atable'>Таблицы</a>
                                                                           <ul id='atable' class='nav flex-column collapse collapse-level-2'>
                                                                               <li class='nav-item'>
                                                                                   <ul class='nav flex-column'>




                                                                                   <li class='nav-item'>
                                                                                       <a class='nav-link' href='table.html'>Управление Таблицами</a>
                                                                                   </li>
                                                                                   <li class='nav-item'>
                                                                                       <a class='nav-link' href='table.html&sub=createtable'>Создать новую Таблицу</a>
                                                                                   </li>
                                                                                   <li class='nav-item'>
                                                                                       <a class='nav-link' href='table.html&sub=adduser'>Доб./Уд. возвещателя</a>
                                                                                   </li>
																				   
																				   ");
                                                                  
																  
																  if($permis[5]==1){

                                                                  echo ("
																				   <li class='nav-item'>
																				       <a class='nav-link' href='vlad.html'>Нуждаются в помощи</a>
																				   </li>
                                                                                   <li class='nav-item'>
                                                                                       <a class='nav-link' href='index.html&sub=atblog'>История Действий</a>
                                                                                   </li>
																				   ");
																  }
																		 echo ("		   
                                                                                   </ul>
                                                                               </li>
                                                                           </ul>
																  </li>");
																  }
																		
																		
																		
																		echo ("

                                                                        <li class='nav-item'>
                                                                              <a class='nav-link' href='javascript:void(0);' data-toggle='collapse' data-target='#acongr'>".$menu_admin_congr."</a> 
                                                                            <ul id='acongr' class='nav flex-column collapse collapse-level-2'>
                                                                                <li class='nav-item'>
                                                                                    <ul class='nav flex-column'>

                                                                                        <li class='nav-item'>
                                                                                            <a class='nav-link' href='member.html'>".$menu_admin_publ."</a>
                                                                                        </li>
																						
																						
																						<li class='nav-item'>
                                                                                            <a class='nav-link' href='group.html'>".$menu_admin_group."</a>
                                                                                        </li>

                                                                                    </ul>
                                                                                </li>
                                                                            </ul>
                                                                         </li>
																		 
																		  <li class='nav-item'>
                                                                               <a class='nav-link' href='javascript:void(0);' data-toggle='collapse' data-target='#grafic'>".$menu_admin_grf."</a>
                                                                             <ul id='grafic' class='nav flex-column collapse collapse-level-2'>
                                                                                 <li class='nav-item'>
                                                                                     <ul class='nav flex-column'>

                                                                                         <li class='nav-item'>
                                                                                             <a class='nav-link' href='schedule.html&sub=create'>".$menu_admin_g_cr."</a>
                                                                                         </li>

                                                                                     </ul>
                                                                                 </li>
                                                                             </ul>
                                                                          </li>


                                                                         <li class='nav-item'>
                                                                               <a class='nav-link' href='javascript:void(0);' data-toggle='collapse' data-target='#arap'>".$menu_admin_rep."</a>
                                                                             <ul id='arap' class='nav flex-column collapse collapse-level-2'>
                                                                                 <li class='nav-item'>
                                                                                     <ul class='nav flex-column'>

                                                                                         <li class='nav-item'>
                                                                                             <a class='nav-link' href='report.html&sub=congr'>".$menu_admin_cgrp."</a>
                                                                                         </li>

                                                                                     </ul>
                                                                                 </li>
                                                                             </ul>
                                                                          </li>

                                                                         <li class='nav-item'>
                                                                               <a class='nav-link' href='javascript:void(0);' data-toggle='collapse' data-target='#acarta'>".$menu_admin_plot."</a>
                                                                             <ul id='acarta' class='nav flex-column collapse collapse-level-2'>
                                                                                 <li class='nav-item'>
                                                                                     <ul class='nav flex-column'>

                                                                                         <li class='nav-item'>
                                                                                             <a class='nav-link' href='#'>".$menu_admin_cgplot."</a>
                                                                                         </li>

                                                                                     </ul>
                                                                                 </li>
                                                                             </ul>
                                                                          </li>

                                                                       
																	   
                                                                   </ul>
                                                               </li>
                                                           </ul>
                                </li>
                                                       ");
																  

                                                                 }




                     							if ($user_arr[4]==2 or $user_arr[4]==9){
                     							echo ("



                                  <li class='nav-item'>
                                      <a class='nav-link link-with-indicator' href='javascript:void(0);' data-toggle='collapse' data-target='#activ'>
                                          <span class='feather-icon'><span class='badge badge-primary  badge-indicator-sm badge-pill'></span><i data-feather='briefcase'></i></span>
                                          <span class='nav-link-text'>".$menu_tb_hed."</span>
                                      </a>
                                      <ul id='activ' class='nav flex-column collapse collapse-level-1'>
                                          <li class='nav-item'>
                                              <ul class='nav flex-column'>

                                                  <li class='nav-item'>
                                                      <a class='nav-link' href='table.html'>".$menu_tb_aut."</a>
                                                  </li>
                                                  <li class='nav-item'>
                                                      <a class='nav-link' href='table.html&sub=createtable'>".$menu_tb_crtb."</a>
                                                  </li>
                                                  <li class='nav-item'>
                                                      <a class='nav-link' href='table.html&sub=adduser'>".$menu_tb_add."</a>
                                                  </li>
                                                  ");

                                                  if ($user_arr[4]==9){
                                                  	echo ("
                                                  <li class='nav-item'>
                                                      <a class='nav-link' href='member.html&sub=congr'>Управление Собранием</a>
                                                  </li>");
                                                }
                                                  	echo ("
                                                  <li class='nav-item'>
                                                      <a class='nav-link' href='index.html&sub=atblog'>".$menu_tb_hist."</a>
                                                  </li>

                                              </ul>
                                          </li>
                                      </ul>
                                  </li>



                     							");
                     							}
												
												
                     							
									if ($user_arr[4]==3 or $user_arr[4]==4 or $user_arr[4]==9 or $config[2]==1){
                     							echo ("
														<li class='nav-item'>
                                                              <a class='nav-link' href='report.html&sub=rp' >
                                                                <span class='fa-stack'>
                                                              <i class='fa fa-pencil-square-o fa-stack-1x'></i>

                                                                    </span>
                                                                  <span class='nav-link-text'>Группы</span>
                                                              </a>
                                                        </li>
														  
														 
														  ");
                     				}
												
									if ($user_arr[4]==4 or $user_arr[4]==6 or $user_arr[4]==9){
                     					echo ("
											<li class='nav-item'>
                                                <a class='nav-link' href='visit.html' >
                                                        <span class='fa-stack'>
                                                            <i class='fa fa-users fa-stack-1x'></i>
														</span>
                                                        <span class='nav-link-text'>Посещения</span>
												</a>
                                            </li>
														  ");
                     				}
									
									
                     					echo ("
											<li class='nav-item'>
                                                <a class='nav-link' href='mesage.html' >
                                                        <span class='fa-stack'>
                                                            <i class='fa fa-users fa-stack-1x'></i>
														</span>
                                                        <span class='nav-link-text'>Рассылка</span>
												</a>
                                            </li>
														  ");
                     				


                                 
								 
								 

                     							if ($user_arr[4]==3 or $user_arr[4]==4 or $user_arr[4]==9 or $config[2]==1 or $cfg_cgr[1]==1 ){
                     							echo ("
                                  <li class='nav-item'>
                                                              <a class='nav-link' href='report.html' >
                                                                <span class='fa-stack'>
                                                              <i class='fa fa-pencil-square-o fa-stack-1x'></i>

                                                                    </span>
                                                                  <span class='nav-link-text'>".$menu_prim_rep ."</span>
                                                              </a>
                                                          </li>
														  ");
                     							}

													  
											if ($user_arr[4]==9 or $user_arr[4]==4 ){
                     							echo ("			  
                                  <li class='nav-item'>
                                                              <a class='nav-link' href='schedule.html' >
                                                                <span class='fa-stack'>
                                                              <i class='fa fa-pencil-square-o fa-stack-1x'></i>

                                                                    </span>
                                                                  <span class='nav-link-text'>".$menu_prim_orar."</span>
                                                              </a>
                                                          </li>
                     							");
                     							}

                                  if ($user_arr[4]==9){
                                  echo ("
                                  <style>
                                        .fa-map-marker {
                                          top: -5px;

                                              }
                                  </style>
                                  <li class='nav-item'>
                                                              <a class='nav-link' href='plot.html' >
                                                              <span class='fa-stack'>
                                                              <i class='fa fa-map-o fa-stack-1x'></i>
                                                              <i class='fa fa-map-marker fa-stack-1x'></i>
                                                              </span>

                                                                  <span class='nav-link-text'>".$menu_prim_sector."</span>
                                                              </a>
                                                          </li>
                                  ");
                                  } 
								


					





					
								  if ($user_arr[4]==9){
									  
									  
									  $brd=mysql_fetch_array(mysql_query("SELECT * FROM `tb_congr` WHERE `id`='".$user_arr['rid']."' "));
                                  echo ("
                                
                                  <li class='nav-item'>
                                                <a class='nav-link' href='broadcast.html#".$brd['broadcast']."'> <span class='fa-stack'>
                                                              <i class='fa fa-volume-up fa-stack-1x'></i></span>
                                      <span class='nav-link-text'>".$menu_prim_broadcast."</span></a>
                                                          </li>
                                  ");
                                  }
                     							echo ("
                                  <li class='nav-item'>
                                  <a class='nav-link' href='logout.html' >
                                  <span class='fa-stack'>
                                  
                                   <i class='fa fa-sign-out fa-stack-1x'></i>
										</span>
                                      <span class='nav-link-text'>".$menu_prim_exit."</span>
                                  </a>
</li>


                     							");

                     							?>
                 </ul>
             </div>
         </div>
     </nav>

<div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>

     <div class="hk-pg-wrapper">
			<!-- Container -->
            <div class="container mt-xl-50 mt-sm-30 mt-15">
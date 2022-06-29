<?php 
if(!defined("AP")) exit("Доступ к файлу напрямую запрещен!");

if(auth===FALSE or $user_arr[4]!=0)
{
	header("location: /login.html");
}
    	require_once("template/head.php");
	
	$pref=mysql_fetch_array(mysql_query("SELECT `stend_location` FROM `tb_congr` WHERE `uid`='".$user_arr[6]."'"));
	$name_congr=mysql_fetch_array(mysql_query("SELECT `ne_cong` FROM `tb_congr` WHERE `uid`='".$user_arr[6]."'"));
	
	
	
	$timeid = dateprotect($get_array['tid']);
    $dateid = dateprotect($get_array['did']);
    $userid = dateprotect($get_array['uid']);
	
	$post_timeid = dateprotect($post_array['tid']);
    $post_dateid = dateprotect($post_array['did']);
    $post_userid = dateprotect($post_array['uid']);
	
	
if (count($post_array) != 0){
	
	
                    if ($user_arr[4] == 0 ){
								
								$pref=mysql_fetch_array(mysql_query("SELECT `pref` FROM `tb_congr` WHERE `uid`='$user_arr[6]'"));
								$select_table="tb_stend_".$pref[0]."";
		
						if($post_array['did']!="" or $post_array['tid']!="" or $post_array['uid']!=""){
			
							$count_arr=mysql_fetch_array(mysql_query("SELECT `user1`,`user2` FROM `".$select_table."` WHERE `date`='".$post_dateid."' AND `time`='".$post_timeid."'"));
							$count=mysql_query("SELECT `user1`,`user2` FROM `".$select_table."` WHERE `date`='".$post_dateid."' AND `time`='".$post_timeid."'");
		    
					  
							
							if(mysql_num_rows($count)=="0"){
								
									
									$insert=mysql_query("INSERT INTO `".$select_table."` VALUES (NULL,'".$post_dateid."','".$post_timeid."','".$post_userid."','0','0','0','0','0','0','0','0')");
		       
								
							}
							
							elseif ($count_arr[0] == 0){
								$insert=mysql_query("UPDATE `".$select_table."` SET `user1`='".$post_userid."' WHERE `date`='".$post_dateid."' AND `time`='".$post_timeid."'");
							}
					
					
							elseif($count_arr[1] == 0){
									
								$insert=mysql_query("UPDATE `".$select_table."` SET `user2`='".$post_userid."' WHERE `date`='".$post_dateid."' AND `time`='".$post_timeid."'");
							}
							
							
							
						}
				
					
					}
           header("location: /admin.html&sub=addindex");

	
	
}
	
?>





<div class="has-sidebar-left">
   
    <div class="sticky">
        <div class="navbar navbar-expand navbar-dark d-flex justify-content-between bd-navbar blue accent-3">
            <div class="relative">
                <a href="#" data-toggle="offcanvas" class="paper-nav-toggle pp-nav-toggle">
                    <i></i>
                </a>
            </div>
            <!--Top Menu Start -->
            <div class="navbar-custom-menu p-t-10">
                   <ul class="nav navbar-nav">
        <!-- Messages-->
        <li class="dropdown custom-dropdown messages-menu">
            <a href="#" class="nav-link" data-toggle="dropdown">
                <i class="icon-message "></i>
                <span class="badge badge-success badge-mini rounded-circle">1</span>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu pl-2 pr-2">
                        <!-- start message -->
                        <li>
                            <a href="#">
                                <div class="avatar float-left">
                                    <img src="assets/img/dummy/u1.png" alt="">
                                    <span class="avatar-badge busy"></span>
                                </div>
                                <h4>
                                    Сообщение для Разработчика
                                    <small><i class="icon icon-clock-o"></i></small>
                                </h4>
                                <p>Есть проблема? напишите разработчику</p>
                            </a>
                        </li>
                       
                    </ul>
                </li>
                <li class="footer s-12 p-2 text-center"><a href="#">See All Messages</a></li>
            </ul>
        </li>
		
		
		
		
        <!-- Notifications -->
        <li class="dropdown custom-dropdown notifications-menu">
            <a href="#" class=" nav-link" data-toggle="dropdown" aria-expanded="false">
                <i class="icon-notifications "></i>
                <span class="badge badge-danger badge-mini rounded-circle"></span>
            </a>
            <ul class="dropdown-menu">
                <li class="header">You have 10 notifications</li>
                <li>
                    <ul class="menu">
                        <li>
                            <a href="#">
                                <i class="icon icon-data_usage text-success"></i> 5 new members joined today
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon icon-data_usage text-danger"></i> 5 new members joined today
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon icon-data_usage text-yellow"></i> 5 new members joined today
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="footer p-2 text-center"><a href="#">View all</a></li>
            </ul>
        </li>
     </ul>
</div>
        </div>
    </div>
</div>


<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
			
                <div class="col">
                    <h4> </i> Собрание: <? echo $name_congr[0]; echo " / "; echo $pref[0];?></h4>
                </div>
            </div>
			
			
			
			<div class="row">
                <ul class="nav responsive-tab nav-material nav-material-white" id="v-pills-tab">
                    <li>
                        <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1">
                            <i class="icon icon-home2"></i>Эта неделя</a>
                    </li>
                    <li>
                        <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2">
						<i class="icon icon-plus-circle mb-3"></i>Следующая неделя</a>
                    </li>
                   
                </ul>
               
            </div>
        </div>
    </header>
 <div class="container-fluid relative animatedParent animateOnce">
        <div class="tab-content pb-3" id="v-pills-tabContent">
            <!--Today Tab Start-->
            <div class="tab-pane animated fadeInUpShort show active" id="v-pills-1">
	 <div class="content-wrapper animatedParent animateOnce">
        <div class="container">
            <section class="paper-card">
                <div class="row">
                    <div class="col-lg-12">
                       <div class='box'>  
	 <div class='box-header with-border'>  
                                   
               
                   
					

<?php
    
	echo("
	
	<div class='box-body'>Записать Напарника<br>
	<form action='admin.html&sub=addpartner'  method='POST' role='form' >
		
			<select class='custom-select d-block w-100' id='part' name='uid'>
			
			
										 "); 
										
										
	$ref_arr=mysql_query("SELECT `id`,`name` FROM `users` WHERE `rid`='".$user_arr[6]."'");
	if(mysql_num_rows($ref_arr)=="0")
	echo(" <option name='0' value='' selected>-----</option> ");
    
	while($row=mysql_fetch_array($ref_arr))
	{
		echo(" <option value='".$row[0]."'>".$row[1]."</option> 
		");
	}
	echo("
	</select>
	<br>
	<input type='hidden' name='tid' value='".$timeid."'>
	<input type='hidden' name='did' value='".$dateid."'>
	<button type='submit' class='btn btn-primary'>Записать возвещателя</button>
	</form>
	</div>");
	unset($row,$ref_arr);

?>

</div>					 
</div>					 
                    </div>
					
                </div>
               
            </section>
        </div>
    </div>
</div>



</div>
</div>



<div class="control-sidebar-bg shadow white fixed"></div>
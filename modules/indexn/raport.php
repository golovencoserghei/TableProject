<?php 
if(!defined("AP")) exit("Доступ к файлу напрямую запрещен!");

if(auth===FALSE)
{
	header("location: /login.html");
	}
	require_once("template/head.php");
	require_once("template/board.php");
?>

<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
			
                <div class="col">
                    <h4> </i> Собрание: <? echo $_SESSION['cname']; echo " / "; echo $_SESSION['sloc'];?></h4>
                </div>
            </div>
			
			
			
		
        </div>
    </header>
	 <div class="content-wrapper animatedParent animateOnce">
        <div class="container">
            <section class="paper-card">
                <div class="row">
                    <div class="col-lg-12">
					
					
					
					
					
					<?
					if($get_array['edit']=="activ"){
						
					
					$add_raport=mysql_query("UPDATE `".$_SESSION['tcon']."` SET `bk`='".$post_array['k']."',`jur`='".$post_array['j']."',`br`='".$post_array['b']."',`vid`='".$post_array['v']."',`pp`='".$post_array['p']."',`bz`='".$post_array['i']."' WHERE `date`='".$get_array['did']."' and `time`='".$get_array['tid']."'");
					
			
						header("location: /login.html");	
						
						
					}
					
					
					
					
					
					 if(count($get_array)!=0){
		              
		
							if($get_array['did']!="" or $get_array['tid']!=""){
							$rap=mysql_fetch_array(mysql_query("SELECT * FROM `".$_SESSION['tcon']."` WHERE `date`='".$get_array['did']."' AND `time`='".$get_array['tid']."'"));
							
			
							$user=mysql_fetch_array(mysql_query("SELECT `user1`,`user2` FROM `".$_SESSION['tcon']."` WHERE `date`='".$get_array['did']."' AND `time`='".$get_array['tid']."'"));
							
							if($user!=""){
							$name0=mysql_fetch_array(mysql_query("SELECT `name` FROM `users` WHERE `id`='".$user[0]."'"));
							$name1=mysql_fetch_array(mysql_query("SELECT `name` FROM `users` WHERE `id`='".$user[1]."'"));
							
							
							echo"
							<h4>Отчет о служении со стендом</h4>
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
					
					
					
					
					
					  <form action="index.html&sub=raport&edit=activ&did=<? echo $get_array['did']; ?>&tid=<? echo $get_array['tid']; ?>"  method='POST' role="form" >
                            <br>
							<lable>Книги</lable>
                        <input name="k" type="text" class="form-control form-control-lg" value="<? echo $rap[6]; ?>">
                    
                    <br>
								<lable>Журналы</lable>
						<input name="j" type="text" class="form-control form-control-lg" value="<? echo $rap[7]; ?>">
                  
				  <br>
				  
				  <lable>Брошюры</lable>
						<input name="b" type="text" class="form-control form-control-lg" value="<? echo $rap[8]; ?>">
                  
				  <br>
				  <lable>Видео</lable>
						<input name="v" type="text" class="form-control form-control-lg" value="<? echo $rap[9]; ?>">
                  
				  <br>
				  <lable>Повторные посещения</lable>
						<input name="p" type="text" class="form-control form-control-lg" value="<? echo $rap[10]; ?>">
                  
				  <br>
				  <lable>Изучение</lable>
						<input name="i" type="text" class="form-control form-control-lg" value="<? echo $rap[11]; ?>">
                  
				  <br>
                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Сохранить">
                </form>
					
					
					</div>
					
                </div>
                
               
            </section>
        </div>
    </div>
					
					
			
<?php

if(!defined("AP")) exit("Доступ к файлу напрямую запрещен!");

if(auth===FALSE)
{
	header("location: /login.html");
}

if($user_arr[4]!=0 )
{

    require_once("template/head.php");
?>

<div class='d-flex align-items-center justify-content-between mt-40 mb-20'>
				<h4>Возвещатели, которые нуждаются в нашей заботе</h4>

</div>
			
			

                <div class='card'>
				<div class="col-xl-12">
                        



				<div class='card-body pa-1'>
					<div class='table-wrap'>
						<div class='table-responsive'>

				
					<table class="table table-secondary table-bordered mb-0">
						<thead class="thead-secondary">
							</thead>
							<tbody>
							<?
					echo("<tr>
							<th colspan='1'>№</th>
							<th colspan='1'>Возвещатели</th>
							<th colspan='1'>Номер</th>
							<th colspan='1'>Адрес</th>
							<th colspan='1'>Информация</th>
					");
					if($user_arr[4]==4 or $user_arr[4]==9){
						echo("
								<th colspan='1'>Действия</th>
						");
					}
					echo("	  
						</tr>");
							
							
					$i_n=1;
					$no_activ=mysql_query("SELECT * FROM `db_care` WHERE `rid`='".$user_arr[6]."'");
					while($n_row=mysql_fetch_array($no_activ))
						{
							if($n_row['rid']==$user_arr[6] and $n_row['dl']==0){
								$care=mysql_query("SELECT * FROM `users` WHERE `id`='".$n_row['uid']."'");
								$d_care=mysql_fetch_array($care);
								echo("<tr ");
								if ($n_row['typ']==1){
									echo(" bgcolor='#FFDEAD'");
								}
								echo("
								 >");
								 
								if ($d_care['tel1']==0){$d_care['tel1']='';}
								if ($d_care['tel2']==0){$d_care['tel2']='';}
								echo("<th>".$i_n."</th>");
								echo("<th>".$d_care['name']."</th>"); 
								echo("<th>tel: ".$d_care['tel1']." <p/> tel: ".$d_care['tel2']."</th>"); 
								echo("<th>".$d_care['adres']."</th>"); 	
								echo("<th>".$n_row['info']."</th>"); 	
								
								if($user_arr[4]==4 or $user_arr[4]==9){
								echo("<th>
								<a href='care.html&sub=edit&id=".$n_row['id']."' alt='Редактировать' title='Редактировать' border='0'><i class='fa fa fa-pencil fa-2x' aria-hidden='true'></i></a>&#8195;
								<a href='care.html&sub=del&id=".$n_row['id']."' alt='Удалить' title='Удалить' border='0'><i class='fa fa-times fa-2x text-danger' aria-hidden='true'></i></a>
								</th>");
								}
								
								
								echo("</tr>");
								
								$i_n++;
							}
						}
						
		if($user_arr[4]==4 or $user_arr[4]==9){				
		echo("<th colspan='6' ><center><a href='care.html&sub=add' alt='Добавить' title='Добавить' border='0'><img src='template/apimages/add.png' width='20' height='20'></a>
							  </th>");
							
		}			
							

							
							
						
							

			 
	?>
																			 
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>


		
			
                                        
                       
                                </div>
                         
                     









<?

if($user_arr[4]==4 or $user_arr[4]==9)
	
{
	
?>
<div class='d-flex align-items-center justify-content-between mt-40 mb-20'>
				<h4>Возвещатели, которые удалены из списка</h4>

			</div>
			
			
<div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                             <div class="row">
                                <div class="col-sm">
                                    <div class="row">
                                       
		
		<div class="col-md-11">
										



	<div class='card'>
		<div class='card-body pa-0'>			
			<div class='table-wrap'>
				<div class='table-responsive'>
				
					<table class="table table-secondary table-bordered mb-0">
						<thead class="thead-secondary">
							</thead>
							<tbody>
							<?
					echo("<tr>
							<th colspan='1'>№</th>
							<th colspan='1'>Возвещатели</th>
							<th colspan='1'>Номер</th>
							<th colspan='1'>Адрес</th>
							<th colspan='1'>Информация</th>
					");
					if($user_arr[4]==4 or $user_arr[4]==9){
						echo("
								<th colspan='1'>Действия</th>
						");
					}
					echo("	  
						</tr>");
							
							
					$i_n=1;
					$no_activ=mysql_query("SELECT * FROM `db_care` WHERE `rid`='".$user_arr[6]."'");
					while($n_row=mysql_fetch_array($no_activ))
						{
							if($n_row['rid']==$user_arr[6] and $n_row['dl']==1){
								$care=mysql_query("SELECT * FROM `users` WHERE `id`='".$n_row['uid']."'");
								$d_care=mysql_fetch_array($care);
								echo("<tr ");
								if ($n_row['typ']==1){
									echo(" bgcolor='#FFDEAD'");
								}
								echo("
								 >");
								echo("<th>".$i_n."</th>");
								echo("<th>".$d_care['name']."</th>"); 
								echo("<th>tel: ".$d_care['tel1']." <p/> tel: ".$d_care['tel2']."</th>"); 
								echo("<th>".$d_care['adres']."</th>"); 	
								echo("<th>".$n_row['info']."</th>"); 	
								echo("<th>
								<a href='care.html&sub=relo&id=".$n_row['id']."' alt='Востановить' title='Востановить' border='0'><i class='fa fa-reply fa-2x' aria-hidden='true'></i></a> &#8195;
								<a href='care.html&sub=del&pid=".$n_row['id']."' alt='Удалить' title='Удалить' border='0'><i class='fa fa-times fa-2x text-danger' aria-hidden='true'></i></a>
								</th>");
								echo("</tr>");
								
								$i_n++;
							}
						}

		
							
							

							
							
						
							

			 
	?>
																			 
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>


		</div>
			
                                        
                       
                                </div>
                            </div>
                            </div>
                        </section>
</div>
	
<?
}
}

?>
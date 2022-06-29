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
					

<?php

	echo("
	<div class='table-responsive'>
	Страница регистрации<br>
		<lable>".$config['s_url']."reg.html&amp;cgr=".$user_arr[0]."</lable>
	<br><p>
	<table class='table table-bordered'>
	<thead>
		<tr> 
		    <td>№</td>
			<td>Имя</td>
			");
			
			
			
			if ($get_array['sel']==''){
				echo("<td><a href='member.html&sel=login'>Логин</a></td>");
				echo("<td><a href='member.html&sel=name'>Фамилия Имя</a></td>");
				echo("<td><a href='member.html&sel=time'>Когда запис\выпис</a></td>");
			}
			elseif ($get_array['sel']=='login'){
				echo("<td><a href='member.html&sel=logind'>Логин</a></td>");
				echo("<td><a href='member.html&sel=name'>Фамилия Имя</a></td>");
				echo("<td><a href='member.html&sel=time'>Заходил</a></td>");
			}
			elseif ($get_array['sel']== 'logind'){
				echo("<td><a href='member.html&sel=login'>Логин</a></td>");
				echo("<td><a href='member.html&sel=name'>Фамилия Имя</a></td>");
				echo("<td><a href='member.html&sel=time'>Заходил</a></td>");
			}
			elseif ($get_array['sel']== 'name'){
				echo("<td><a href='member.html&sel=login'>Логин</a></td>");
				echo("<td><a href='member.html&sel=named'>Фамилия Имя</a></td>");
				echo("<td><a href='member.html&sel=time'>Заходил</a></td>");
			}
			elseif ($get_array['sel']== 'named'){
				echo("<td><a href='member.html&sel=login'>Логин</a></td>");
				echo("<td><a href='member.html&sel=name'>Фамилия Имя</a></td>");
				echo("<td><a href='member.html&sel=time'>Заходил</a></td>");
			}
			elseif ($get_array['sel']== 'time'){
				echo("<td><a href='member.html&sel=login'>Логин</a></td>");
				echo("<td><a href='member.html&sel=name'>Фамилия Имя</a></td>");
				echo("<td><a href='member.html&sel=timed'>Заходил</a></td>");
			}
			elseif ($get_array['sel']== 'timed'){
				echo("<td><a href='member.html&sel=login'>Логин</a></td>");
				echo("<td><a href='member.html&sel=name'>Фамилия Имя</a></td>");
				echo("<td><a href='member.html&sel=time'>Заходил</a></td>");
			}
			
		
		
			echo("
			<td>Тип записи</td>
			
			<td>Управление</td>
			
	</tr>
	</thead>
	<tbody>"); 
	
	
	
	$ref_arr=mysql_query("SELECT * FROM `add_logo` WHERE `congr`='".$user_arr[6]."' ORDER BY `id` desc");
	
	if(mysql_num_rows($ref_arr)=="0")
	echo("
	<tr>
		<td colspan='3'>История пуста</td>
	</tr>"); $i=1;
	while($row=mysql_fetch_array($ref_arr))
	{
		$log_name=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$row[1]."'"));
		$where=mysql_query("SELECT * FROM `td_date` WHERE `id`='".$row[3]."'");
	
		
		
		echo("<tr>
			<td>".$i."</td>
			<td>".$log_name[8]."</td>
			<td>".$row[1]."</td>
			<td>
			
			
			".$where[1]."
			
			
			
			</td>
			<td>".$row[5]."</td>
			<td>");
			if($row[6]==0)
			{
			
			echo("Выписался(ась)");
			}	
			if($row[6]==1)
			{
					
			echo("Записался(ась)");
	
			}
			
			echo("
			
<td></td>
		
		</tr>"); $i=$i+1;
	}
	echo("
	<tbody></table><br><br>
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
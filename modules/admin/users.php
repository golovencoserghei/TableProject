<?php
if(!defined("AP")) exit("Доступ к файлу напрямую запрещен!");

if(auth===FALSE )
{
	header("location: /login.html");
}
require_once("template/head.php");

if($user_arr[4]==1 or $user_arr[4]==0){

    header("location: /index.html");

}

$nuser=$post_array['uid'];


if (count($post_array) != 0)
{

	
}


?>

<div class="row gutter-20">
<div class="col-md-12">

	




<?php








	echo("

  <div class='d-flex align-items-center justify-content-between mt-40 mb-20'>
  							<h4>Список всех пользователей</h4>

  						</div>
  						<div class='card'>
  							<div class='card-body pa-0'>
  								<div class='table-wrap'>
  									<div class='table-responsive'>");


if($user_arr[4]!=0){
                    echo("
  										<table class='table table-sm table-hover mb-0'>
	<thead>
		<tr>
		    <td>№</td>
			<td>ID</td>
			
				<td>Фамилия Имя</td>
				<td>Заходил</td>");
		
			
			echo("


			<td>Заблокированый</td>

	</tr>
	</thead>
	<tbody>");




	$ref_arr=mysql_query("SELECT * FROM `users`  ORDER BY `name` ASC");
	


	if(mysql_num_rows($ref_arr)=="0"){
	echo("
	<tr>
		<td colspan='3'>Нет членов группы</td>
	</tr>");
	}

	$i=1;
	
	
		
	while($row=mysql_fetch_array($ref_arr))
	{
		



		echo("<tr>
			<td>".$i."</td>
			<td>".$row[0]."</td>

			<td><a href='admin.html&sub=info&uid=".$row[0]."' alt='Настройки профиля' title='Настройки профиля' border='0'>".$row[8]."</a></td>
			<td>".$row[11]."</td>
			<td>
	        ");

			if($row[5]==0)
			{

			echo("<a href='member.html&sub=status&lock=".$row[0]."' alt='Заблокировать профиль' title='Заблокировать профиль' border='0'>
					<i class='fa fa-unlock text-gren s-18'></i></a>");
			}
			if($row[5]==1)
			{

			echo("<a href='member.html&sub=status&lock=".$row[0]."' alt='Заблокировать профиль' title='Заблокировать профиль' border='0'>
					<i class='fa fa-lock text-red'></i></a>");

			}
			echo("
			</td>

		</tr>");
				
		
		$i++;
	}
	

	echo("
</table>");
	
}
else {
	echo("
	<table class='table table-sm table-hover mb-0'>
<thead>
<tr>

<td>Вы не создали собрание</td>


</tr>
</thead>
<tbody>");


echo("
<tbody></table>

");
}
?>

</div>
</div>
</div>
</div>

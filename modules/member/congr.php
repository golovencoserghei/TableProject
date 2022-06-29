<?php
if(!defined("AP")) exit("Доступ к файлу напрямую запрещен!");

if(auth===FALSE )
{
	header("location: /login.html");
}
require_once("template/head.php");

if($user_arr[4]!=9){
  if($user_arr[4]!=2 ){
    header("location: /index.html");
}

}


?>
<main class="main--container">
		<section class="main--content">
                <div class="row gutter-20">




					<!-- Records List Start -->

					<div class="col-md-12">

						<?
						if($user_arr[6]!=0)



						 { ?>
<form action="" method="post" name="form1">
<div class="form-group">
  	<label><font size='5' color='red' face='Arial'></font>Выберете таблицу </label>
            <select class='custom-select d-block w-100' id='part' name='tbid'>


              <?


            $ref_arr=mysql_query("SELECT * FROM `tb_stands`  WHERE `uid`='".$user_arr[0]."'	");
            if(mysql_num_rows($ref_arr)=="0"){
            echo(" <option name='0' value='' selected>-----</option> ");
            }else{
            echo(" <option name='0' value='' selected>-----</option> ");
            while($row=mysql_fetch_array($ref_arr))
            {
            $inf_tb=mysql_fetch_array(mysql_query("SELECT * FROM `tb_congr`  WHERE `id`='".$row[2]."'"));
            echo(" <option value='".$row[2]."'>".$inf_tb[11]."</option> ");
            }
            }
            ?>
            </select>

<br>

            						<input class="btn btn-primary" type="submit" value="Сформировать группу">
</div>

</form>


<?php

}






	echo("

  <div class='d-flex align-items-center justify-content-between mt-40 mb-20'>
  							<h4>Управление возвещателями на стенда </h4>

  						</div>
  						<div class='card'>
  							<div class='card-body pa-0'>
  								<div class='table-wrap'>
  									<div class='table-responsive'>");


if($user_arr[6]==0)



 {
	echo("
	<table class='table table-sm table-hover mb-0'>
<thead>
<tr>

<td>У вас нет созданых таблиц.</td>


</tr>
</thead>
<tbody>");


echo("
<tbody></table>

");
}


else
{
                    echo("
  										<table class='table table-sm table-hover mb-0'>
	<thead>
		<tr>
		    <td>№</td>
			<td>ID</td>
			");



			if ($get_array['sel']==''){

				echo("<td><a href='member.html&sel=name'>Фамилия Имя</a></td>");
				echo("<td><a href='member.html&sel=time'>Заходил</a></td>");
			}
			elseif ($get_array['sel']=='login'){

				echo("<td><a href='member.html&sel=name'>Фамилия Имя</a></td>");
				echo("<td><a href='member.html&sel=time'>Заходил</a></td>");
			}
			elseif ($get_array['sel']== 'logind'){

				echo("<td><a href='member.html&sel=name'>Фамилия Имя</a></td>");
				echo("<td><a href='member.html&sel=time'>Заходил</a></td>");
			}
			elseif ($get_array['sel']== 'name'){

				echo("<td><a href='member.html&sel=named'>Фамилия Имя</a></td>");
				echo("<td><a href='member.html&sel=time'>Заходил</a></td>");
			}
			elseif ($get_array['sel']== 'named'){

				echo("<td><a href='member.html&sel=name'>Фамилия Имя</a></td>");
				echo("<td><a href='member.html&sel=time'>Заходил</a></td>");
			}
			elseif ($get_array['sel']== 'time'){

				echo("<td><a href='member.html&sel=name'>Фамилия Имя</a></td>");
				echo("<td><a href='member.html&sel=timed'>Заходил</a></td>");
			}
			elseif ($get_array['sel']== 'timed'){

				echo("<td><a href='member.html&sel=name'>Фамилия Имя</a></td>");
				echo("<td><a href='member.html&sel=time'>Заходил</a></td>");
			}


			echo("


			<td>Управление</td>

	</tr>
	</thead>
	<tbody>");



	if ($get_array['sel']== '')
	{
	$ref_arr=mysql_query("SELECT * FROM `users` WHERE `rid`='".$user_arr[6]."' ORDER BY 'lastdate' desc");
	}

	//============================

	elseif ($get_array['sel']== 'name')
	{
	$ref_arr=mysql_query("SELECT * FROM `users` WHERE `rid`='".$user_arr[6]."' ORDER BY `name` asc");
	}
	elseif($get_array['sel']== 'named')
	{
	$ref_arr=mysql_query("SELECT * FROM `users` WHERE `rid`='".$user_arr[6]."' ORDER BY `name` desc");
	}

	//============================

	elseif ($get_array['sel']== 'time'){
		$ref_arr=mysql_query("SELECT * FROM `users` WHERE `rid`='".$user_arr[6]."' ORDER BY `lastdate` asc");
	}
	elseif ($get_array['sel']== 'timed'){
		$ref_arr=mysql_query("SELECT * FROM `users` WHERE `rid`='".$user_arr[6]."' ORDER BY `lastdate` desc");
	}



	elseif ($get_array['sel']== 'login'){
		$ref_arr=mysql_query("SELECT * FROM `users` WHERE `rid`='".$user_arr[6]."' ORDER BY `login` asc");
	}
	elseif ($get_array['sel']== 'logind'){
		$ref_arr=mysql_query("SELECT * FROM `users` WHERE `rid`='".$user_arr[6]."' ORDER BY `login` desc");
	}





	if(mysql_num_rows($ref_arr)=="0")
	echo("
	<tr>
		<td colspan='3'>Нет членов группы</td>
	</tr>"); $i=1;
	while($row=mysql_fetch_array($ref_arr))
	{
		if($row[11] != 0)
		{



		echo("<tr>
			<td>".$i."</td>
			<td>".$row[0]."</td>

			<td>".$row[8]."</td>
			<td>".$row[11]."</td>
			<td>



			<a class='btn btn-small' href='member.html&sub=profil&uid=".$row[0]."' alt='Настройки профиля' title='Настройки профиля' border='0'>
					<i class='fa fa-cog fa-2x'> </i></a>
	        ");

			if($row[5]==0)
			{

			echo("<a href='member.html&sub=status&lock=".$row[0]."' alt='Заблокировать профиль' title='Заблокировать профиль' border='0'>
					<i class='icon icon-lock red-text s-18'></i></a>");
			}
			if($row[5]==1)
			{

			echo("<a href='member.html&sub=status&lock=".$row[0]."' alt='Заблокировать профиль' title='Заблокировать профиль' border='0'>
					<i class='icon icon-lock-open2 green-text s-18'></i></a>");

			}
			echo("
			</td>

		</tr>");
		}		$i=$i+1;
	}
	echo("
</table>");
	unset($row,$ref_arr);

}


?>

</div>
</div>
</div>
</div>

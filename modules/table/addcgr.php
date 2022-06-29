<?php
if(!defined("AP")) exit("Доступ к файлу напрямую запрещен!");

if(auth===FALSE)
{
	header("location: /login.html");
	}
if($user_arr[4]==1)
{
	header("location: /index.html");
}
	require_once("template/head.php");

?>



	<main class="main--container">
		<section class="main--content">
                <div class="row gutter-20">




					<!-- Records List Start -->

					<div class="col-md-6">


<?

if (count($post_array) != 0)
{
	if($post_array['usid']){
	$num_arr=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM `tb_stands` WHERE `uid`='".$post_array['usid']."' AND `tid`='".$post_array['tbid']."'"));
	if($num_arr[0]>0)
	{
		$err="<font size='5' color='red'> уже добавлен в таблицу</font>";
		msg($err,"warning");
	}
	else
	{
	$prt_key=GenerateKey(6);
	$td_pref=mysql_fetch_array(mysql_query("SELECT `pref` FROM `tb_congr`  WHERE `id`='".$post_array['tbid']."'"));


	$tb_d=mysql_query("INSERT INTO `tb_stands` VALUES (NULL,'".$post_array['usid']."','".$post_array['tbid']."','0','".$prt_key."','".$td_pref[0]."','0','0')");



}
	}


	if($post_array['usdel']){

		$delet_from_table=mysql_query("DELETE FROM `tb_stands` WHERE `uid`='".$post_array['usdel']."' and `tid`='".$post_array['tbid']."'");


	}



}

?>




<form action="" method="post" name="form1">
<div class='panel'>

 <div class='panel-heading'>
	<h3>Добавить участника</h3>
 </div>

		<div class='panel-content'>
				<div class="form-group">
						<label><font size='5' color='red' face='Arial'>№1 </font>Выберете объеки для добавления участника</label>
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




						<label> <span class='colortext'>Информация! </span>
						Участник которого необходимо добавить в таблицу должен сообщить вам свой ID (вкладка настройки >> вверху "ОСНОВНАЯ ИНФОРМАЦИЯ (ВАШ ID )"
						цифры выделенны Красным.
						Полученный ID от участника необходимо ввести в поле ниже и нажать "Добавить участника".
						После добавления участника должен обновить страницу таблицы и ему станет доступна таблица.
						<label>

						<br>

						<input class="form-control" type="text" name="usid" size="45"><br>

						<br>

						<input class="btn btn-primary" type="submit" value="Добавить участника">
				</div>


		</div>


</div>
</form>



</div>
 <div class="col-xl-6 col-md-6">

<form action="" method="post" name="form1">
<div class='panel'>

 <div class='panel-heading'>
	<h3>Удалить участника из таблицы</h3>
 </div>

		<div class='panel-content'>
				<div class="form-group">
						<label><font size='5' color='red' face='Arial'>№1 </font>Выберете таблицу в которую нужно добавить участника</label>
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




						<label> <span class='colortext'>Информация! </span>
						Чтобы удалить участника из таблицы, нужно ниже в поле указать его ID ( >>как определить ID участника? перейдите в таблицу(из которойнужно удалить участника)  >> вверху возле вкладок выбора недели нажмите "участник"
						перед фамилией каждого участник в таблицу указан его ID.
						После удаления, участника таблица  не будет доступна.
						<label>

						<br>

						<input class="form-control" type="text" name="usdel" size="45"><br>

						<br>

						<input class="btn btn-primary" type="submit" value="Удалить участника">
				</div>


		</div>


</div>
</form>

                    </div>

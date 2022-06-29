<?php
if(!defined("AP")) exit("Доступ к файлу напрямую запрещен!");

if(auth===FALSE)
{
	header("location: /login.html");
	}
if($user_arr[4]!=9)
{
	header("location: /index.html");
}
else{
	require_once("template/head.php");
	require_once("template/preload.php");
?>



	<main class="main--container">
		<section class="main--content">
                <div class="row gutter-20">




					<!-- Records List Start -->

					<div class="col-md-6">


<?

if (count($post_array) != 0)
{
	$uid=dateprotect($post_array['luser']);
	$lvid=dateprotect($post_array['lv']);

	$insert=mysql_query("UPDATE `users` SET `group`='".$lvid."' WHERE `id`='".$uid."'");


}
}

?>



<form action="" method="post" name="form1">
<div class='panel'>

 <div class='panel-heading'>
	<h3>Разрешение на Администрирование</h3>
 </div>

		<div class='panel-content'>
				<div class="form-group">
						<label>Выдать разрешения на управление таблицами </label>


						<label>Укажите нже ID возвещателя </label>


						<input class="form-control" type="text" name="luser" size="45">




						<br>

						<label>Уровень разрешения</label>
						<select class='custom-select d-block w-100' id='part' name='lv'>



		<option name='lv' value='1' selected>-----</option>
		<option name='lv' value='1' >Возвещатель</option>
		<option name='lv' value='2' >Ответственный за таблицу</option>
		<option name='lv' value='3' >Служебный Надзиратель</option>
		<option name='lv' value='9' >Разработчик</option>

						</select>







						<br>

						<input class="btn btn-primary" type="submit" value="Выдать разрешение">
				</div>

		</div>


</div>
</form>

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





<?

if (count($post_array) != 0)
{

  if ($post_array['gro_group']!=""){



  	$rd_ind = GenerateKey(4);
  	$prt_key= GenerateKey(6);





  	$insert=mysql_query("INSERT INTO `tb_congr` VALUES (NULL,
  														'".$user_arr['id']."',
  														'".$post_array['gro_group']."',
  														'0',
  														'0',
  														'0',
  														'0',
  														'0',
  														'0',
  														'0',
  														'".$rd_ind."',
  														'".$post_array['st_nm']."',
  														'0',
  														'0',
  														'0',
  														'0',
  														'0',
  														'0',
  														'0',
  														'0',
  														'0',
  														'0',
  														'1',
  														'0',
  														'0'
  														)");
                              $ls_Id=mysql_insert_id();


    $td_set_name='tb_stend_'.$rd_ind;

  	$newlisttable=mysql_query("CREATE TABLE `".$td_set_name."` (`id` int(11) NOT NULL,
  																`date` int(11) NOT NULL,
  																`time` int(11) NOT NULL,
  																`user1` int(11) NOT NULL,
  																`user2` int(11) NOT NULL,
  																`wek` int(11) NOT NULL,
  																`bk` int(11) NOT NULL,
  																`jur` int(11) NOT NULL,
  																`br` int(11) NOT NULL,
  																`vid` int(11) NOT NULL,
  																`pp` int(11) NOT NULL,
  																`bz` int(11) NOT NULL
  																) ENGINE=InnoDB DEFAULT CHARSET=utf8");
  	$tb_PRIMARY=mysql_query("ALTER TABLE `".$td_set_name."` ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`)");
  	$tb_PRIMARY=mysql_query("ALTER TABLE `".$td_set_name."` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0");



	$tb_d=mysql_query("INSERT INTO `tb_stands` VALUES (NULL,
    														'".$user_arr['id']."',
    														'".$ls_Id."',
    														'".$user_arr['id']."',
    														'".$prt_key."',
    														'".$rd_ind."',
    														'0',
    														'0'
    														)");


    $pref=mysql_fetch_array(mysql_query("SELECT `pref` FROM `tb_congr` WHERE `id`='".$user_arr[6]."'"));
    $_SESSION['tcon']="tb_stend_".$pref[0]."";


    header("location: /table.html&sub=update&c=".$rd_ind."");



  }







if ($post_array['st_loc']!="") {

	$rd_ind = GenerateKey(4);
	$prt_key= GenerateKey(6);


if($post_array['prim']=='on'){
  $actual=1;
}
else {
  $actual=0;
}

  $ins_name_congr=mysql_fetch_array(mysql_query("SELECT `ne_cong` FROM `tb_congr` WHERE `id`='".$user_arr[6]."'"));
	$insert=mysql_query("INSERT INTO `tb_congr` VALUES (NULL,
														'".$user_arr['id']."',
														'".$user_arr['rid']."',
														'0',
														'0',
														'0',
														'0',
														'0',
														'0',
														'0',
														'".$rd_ind."',
														'".$post_array['st_loc']."',
														'0',
														'0',
														'0',
														'0',
														'0',
														'0',
														'0',
														'0',
														'0',
														'0',
														'".$actual."',
														'0',
														'0'
														)");


    $td_set_name='tb_stend_'.$rd_ind;

	$newlisttable=mysql_query("CREATE TABLE `".$td_set_name."` (`id` int(11) NOT NULL,
																`date` int(11) NOT NULL,
																`time` int(11) NOT NULL,
																`user1` int(11) NOT NULL,
																`user2` int(11) NOT NULL,
																`wek` int(11) NOT NULL,
																`bk` int(11) NOT NULL,
																`jur` int(11) NOT NULL,
																`br` int(11) NOT NULL,
																`vid` int(11) NOT NULL,
																`pp` int(11) NOT NULL,
																`bz` int(11) NOT NULL
																) ENGINE=InnoDB DEFAULT CHARSET=utf8");
	$tb_PRIMARY=mysql_query("ALTER TABLE `".$td_set_name."` ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`)");
	$tb_PRIMARY=mysql_query("ALTER TABLE `".$td_set_name."` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0");



	$tb_d=mysql_query("INSERT INTO `tb_stands` VALUES (NULL,
														'".$user_arr['id']."',
														'0',
														'".$user_arr['id']."',
														'".$prt_key."',
														'".$rd_ind."',
														'0',
														'0'
														)");



	header("location: /table.html&sub=update&p=".$rd_ind."");

  $err="Таблица ".$post_array['usid']." успешно Создана";
  msg($err,"ok");



}
}


if($user_arr[6]==0){




?>


<form action="" method="post" name="form1">

<div class='d-flex align-items-center justify-content-between mt-40 mb-20'>
	<h3>Добавить новое собрание</h3>
 </div>

 <div class="card">
   <div class="card-body pa-0">

     <div class='form-group'>

             <div class='form-group'>

                     <div class='container'>
											 <br/>


            <label>Название собрания<font size='2' color='red' face='Arial'>*</font></label>


						<input class='form-control d-block w-100' type="text" name="gro_group" size="45">

<br/>
						<label>Название стенда<font size='2' color='red' face='Arial'>*</font></label>

						<input class="form-control" type="text" name="st_nm" size="45">



						<br/>



            <label><font size='5' color='#FFA500' face='Arial'>Информация! </font>
              <p>По названию собрания будут групироваться возвещатели а также возможность открытия дополнительных функций для отдельного возвещателя или всего собрания, название указаное выше будет отоброжаться у возвещателя на странице.</label>

								<br/>
								<br/>

              <font size='2' color='red' face='Arial'>*</font> Название собрания - указывается только один раз.<p></label>

						<br/>
						<label><font size='2' color='red' face='Arial'>*</font> Название стенда - Используйте короткую фразу, это назавание будет отображаться в списке стендов на странице возвещателя А также данная таблицы будет сразу же доступна после авторизации Возвещателся</label>
						<br/>

						<input class="btn btn-primary" type="submit" value="Создать Таблицу">

          </div>
          </div>
				</div>


		</div>
		</div>



</form>





<?
}

else{

?>






<form action="" method="post" name="form1">

<div class='d-flex align-items-center justify-content-between mt-40 mb-20'>
	<h3>Создать новую Таблицу</h3>
 </div>

 <div class="card">
   <div class="card-body pa-0">

     <div class='form-group'>

             <div class='form-group'>

                     <div class='container'>

	<br>
						<label>Название стенда (используйте короткую фразу, это назавание будет отображаться в списке таблиц у возвещателя)</label>

						<input class="form-control" type="text" name="st_loc" size="45">




						<br>

						<input class="btn btn-primary" type="submit" value="Создать Таблицу">

          </div>
          </div>
				</div>


		</div>
		</div>



</form>





<?







}




?>




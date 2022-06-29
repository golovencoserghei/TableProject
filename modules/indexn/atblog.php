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
require_once("template/head.php");



if (count($post_array) != 0)
{



if($post_array['tbid']){
	                 $num_arr=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM `tb_stands` WHERE `uid`='".$post_array['usid']."' AND `tid`='".$post_array['tbid']."'"));
	                       if($num_arr[0]>0) {

                                 $err="<font size='5' color='red'>Возвещатель уже добавлен в таблицу</font>";
		                             msg($err,"warning");
	                        }
	                        else{

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



<div class="row">
                    <div class="col-xl-12">


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
   $line = dateprotect($get_array['li']);
	echo("
	<div class='d-flex align-items-center justify-content-between mt-40 mb-20'>
								<h4>История действий</h4>

							</div>
							<div class='card'>
								<div class='card-body pa-0'>
									<div class='table-wrap'>
										<div class='table-responsive'>
											<table class='table table-sm table-hover mb-0'>
	<thead>
		<tr>
		    <td>№</td>



		<td>ФИ(действие)</td>
		<td>ФИ(над кем)</td>
		<td>В какое время</td>
		<td>Время действия</td>
		<td>Действие</td>

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
    if ($row[2]==0){
      $tlog_namet="---Сам(а)---";
    }
    else {
      $log_namet=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$row[2]."'"));
      $tlog_namet=$log_namet[8];
    }

		$wheree  =mysql_fetch_array(mysql_query("SELECT * FROM `tb_date` WHERE `id`='".$row[4]."'"));
	if($wheree[2]==1){
		 $wday="Понедельник";
	 }
	 elseif($wheree[2]==2){
		 $wday="Вторник";
	 }
	 elseif($wheree[2]==3){
		 $wday="Среда";
	 }
	 elseif($wheree[2]==4){
		 $wday="Четверг";
	 }
	 elseif($wheree[2]==5){
		 $wday="Пятница";
	 }
	 elseif($wheree[2]==6){
		 $wday="Суббота";
	 }
	 elseif($wheree[2]==0){
		 $wday="Воскресенье";
	 }


		echo("<tr>
			<td>".$i."</td>
			<td>".$log_name[8]."</td>
			<td>".$tlog_namet."</td>
			<td>


			".$wheree[1]."/".$wday."/".str_replace(['f'], [':'], $row[5])."



			</td>
			<td>".$row[6]."</td>
			<td>");
			if($row[7]==0)
			{

			echo("Выписался(ась)");
			}
			if($row[7]==1)
			{

			echo("Записался(ась)");

			}

			echo("



		</tr>"); $i=$i+1;

    if($line<100)
    {
      if($i==100){
          break;
      }
    }
    else {
      if($i==$line){
          break;
      }
    }
	}
	echo("
	<tbody></table>
	</div>
	</div>
	</div>
	</div>
");
	unset($row,$ref_arr);

?>

</div>
</div>

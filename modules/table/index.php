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



					<!-- Records List Start -->

					<div class="col-md-12">


<?

//выбор таблицы 
if($post_array['tbid']!=''){
	

	header("location: /table.html&sub=tbed&id=".$post_array['tbid']."");

}
/////////////////////////////////////////////////////////////END///////////////////////////////////////////////////////////////////////



//================================================================================================================================

//Востановление таблицы
if($get_array['p']=='bk'){


	$stat_del = mysql_query("UPDATE `tb_congr` SET `del`='0' WHERE `id`='".$get_array['id']."' AND `uid`='".$user_arr['rid']."'");


header("location: /table.html");
}
?>










 <form action="" method="post" name="form1">

<div  class='d-flex align-items-center justify-content-between mt-40 mb-20'>
	<h3><?echo $sst_tit ;?></h3>
 </div>

  <div class="card">
    <div class="card-body pa-0">

      <div class='form-group'>

              <div class='form-group'>
</br>
                      <div class='container'>
						<label><? echo $sst_hd1;?></label>
						<select class='custom-select d-block w-100' id='part' name='tbid'>


							<?

	


	$ref_arr=mysql_query("SELECT * FROM `tb_stands`  WHERE `uid`='".$user_arr[0]."' and `del`=0 ");
		if(mysql_num_rows($ref_arr)=="0"){
				echo(" <option name='0' value='' selected>-----</option> ");
		}else{
				echo(" <option name='0' value='' selected>-----</option> ");
			while($row=mysql_fetch_array($ref_arr))
				{
					if($row[3]==$user_arr[0]){
					$inf_tb=mysql_fetch_array(mysql_query("SELECT * FROM `tb_congr`  WHERE `id`='".$row[2]."' "));
						echo(" <option value='".$row[2]."'>".$inf_tb[11]."</option> ");
					}
				}
		}
		





//	$ref_arr=mysql_query("SELECT * FROM `tb_congr`  WHERE `uid`='".$user_arr['rid']."' AND `del`='0' ");
//		if(mysql_num_rows($ref_arr)=="0"){
//				echo(" <option name='0' value='' selected>-----</option> ");
//		}
		
//		else{
//				echo(" <option name='0' value='' selected>-----</option> ");
//			while($row=mysql_fetch_array($ref_arr)){
					
//						echo(" <option value='".$row['id']."'>".$row['st_loc']."</option> ");
					
//				}
//		}
	?>
						</select>

							</br>			

						<input class="btn btn-primary" type="submit" value="<? echo $bt_su_sv; ?>">
          </div>
          </div>
				</div>


		</div>
		</div>
</form>




<div class='d-flex align-items-center justify-content-between mt-40 mb-20'>
	<h3>Удаленные Таблицы</h3>
 </div>

 <div class="card">
   <div class="card-body pa-0">

     <div class='form-group'>

             <div class='form-group'>

                     <div class='container'>

		
	<br>
		
				<table class="table table-secondary table-bordered">
					<thead class="thead-secondary">
						</thead>
						<tbody>
						<?
						echo("<tb>
                        <th colspan='1'>№</th>
                        <th colspan='1'>Название удаленой таблицы</th>
                        <th colspan='1'></th>
                        </tb>");
						
						
					$i_n=1;
					$no_activ=mysql_query("SELECT * FROM `tb_congr` WHERE `uid`='".$user_arr['id']."' and `del`='1'");
					while($n_row=mysql_fetch_array($no_activ)){
						
						 $tb_delet=mysql_fetch_array(mysql_query("SELECT * FROM `tb_congr` WHERE `id`='".$n_row['tid']."'"));
						 echo("<tr>");
						 
						 echo("<th>".$i_n."</th>");
						 echo("<th>".$n_row['ne_cong']."/".$n_row['st_loc']."</th>"); 
						 echo("<th><a href='table.html&id=".$n_row['id']."&p=bk' alt='Востановить' title='Востановить' border='0'><i class='fa fa-undo' aria-hidden='true'></i></a>
					      </th>");
						 echo("</tr>");
						
					 $i_n++;
					 }
						
						
						

						
						
					
						

		 
?>
															 
					</tbody>
				</table>
			 
		


 </div>
          </div>
				</div>


		</div>
		</div>
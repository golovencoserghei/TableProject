<?php
if(!defined("AP")) exit("Доступ к файлу напрямую запрещен!");

if(auth===FALSE)
{
	header("location: /login.html");
}
require_once("template/head.php");


if($post_array['nweak']!=''){
	
	
$ye = date("Y");

$snd = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM `tb_grafic` WHERE `nwk`='".$post_array['nweak']."' AND `year`='".$ye."' AND `cgr`='".$user_arr['rid']."'"));

if($snd[0]==0){
	
	$i=1;
	$grafic='';
	while($i < 49){
			
		if($i!=1){$div='|';}else{$div='';}
		$grafic_arr[] = $post_array[$i];
					
		if($i==47){break;}
		$i++;

		}
		$grafic=serialize($grafic_arr);
		
	 $insert_query=mysql_query("INSERT INTO `tb_grafic` VALUES
                   (NULL,
					'".$user_arr['rid']."',
					'".$post_array['t']."',
					'".$post_array['nweak']."',
					'".$ye."',
					'".$grafic."' )");
				msg("График на неделю от ".$getweak ['week_start']." Успешно создан","ok");
	
	
	}
	else{
	$getweak = stwdate($post_array['nweak'], $ye);
	msg("График на неделю от ".$getweak ['week_start']." уже создан, Вы его можете отредактировать","wr");
}
	
	
	
}


	?>


 <!-- select2 CSS -->
    <link href="vendors/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />



	<div class="tab-content">
	<style type="text/css">
   td {
   color: #000000; 
   } 
  </style>

        <div id='".$row[2]."' class='d-flex align-items-center justify-content-between mt-40 mb-20'>
	 							<h4></h4>

	 						</div>
	 						<div class='card'>
	 							<div class='card-body pa-0'>
	 								<div class='table-wrap'>
	 									<div class='table-responsive'>




	                       <form action=''  method='post' name='form1'>

                            <table class='table table-hover'>
                            <thead>
                            <tr>
                              <th colspan='3'><font size='5'  face='Arial'><strong> Расписание встречи</strong></font></th>
							  
                            </tr>
                            </thead>
                                      <tbody>




                            <tr>
                                <th bgcolor='#eeece1'  colspan='2' class='not-sortable'><font size='3'  face='Arial'><strong>СРЕДА 18:30</strong></font></th>
                                <th bgcolor='#eeece1'  colspan='1' class='not-sortable'><div class="row">
								<select  class="form-control-lg select2" name='nweak'> 
                                     <?
										
										echo(" <option  value='' selected>-----</option> ");
										$snd = mysql_fetch_array(mysql_query("SELECT * FROM `cfg_tb_date` WHERE `id`='1'"));
										$dat=date("Y-m-d");
										
										
										$nweak = date("W", strtotime($snd[1]));
										$y=explode("-",$snd[1]);
										$getweak = stwdate($nweak, $y[0]);
										echo(" <option  value='".$nweak."' >".$getweak ['week_start']." &mdash; ".$getweak['week_end']."</option> ");
										
										
										
										
										while($x++<6){
											
										$nex_w1 = date('Y-m-d', strtotime($snd[1]. ' + 7 days'));
										$nweak_n1 = date("W", strtotime($nex_w1));
										$y=explode("-",$nex_w1);
										$getweak = stwdate($nweak_n1, $y[0]);
										echo(" <option type='submit' value='".$nweak_n1."' >".$getweak ['week_start']." &mdash; ".$getweak['week_end']."</option> ");
											
										$snd[1]=$nex_w1;	
											
										}
										
										
										
										
										
										
										
									?>	
                                </select>
                            </div></th>

                            </tr>
                            <tr>
                                <th bgcolor='#eeece1'  colspan='3' class='not-sortable'><div class="row">
								<select class="form-control-lg select2" name='1'>
                                     <?
										$ref_arr=mysql_query("SELECT * FROM `tb_group`  WHERE `cgr`='".$user_arr['rid']."' AND `prim` BETWEEN 1 AND 8 ORDER BY `prim` ASC ");
										if(mysql_num_rows($ref_arr)=="0") {
										echo(" <option value='' selected>-----</option> ");
										}
										echo(" <option value='' selected>-----</option> ");
										
										while($row=mysql_fetch_array($ref_arr))
											{
												$pri_use_gr=mysql_fetch_array(mysql_query("SELECT * FROM `users`  WHERE `id`='".$row['uid']."'"));
												echo(" <option value='Группа №".$row[1].'/'.$pri_use_gr['name']."'>Группа №".$row[1].'/'.$pri_use_gr['name']."</option> ");
											}
									?>	
                                </select>
                            </div></th>

                            </tr>




                            <tr>
                                <td  colspan='1' align='right'><font size='2'  face='Arial' ><strong>Председатель</strong></font></td>
                                <th  colspan='2' class='not-sortable'> 
								<div class="row">
                                        
                                            <select class="form-control-lg select2" name='2'>
                                                <?
										


	$ref_arr=mysql_query("SELECT `id`,`name` FROM `users`  WHERE `st_sp` IN (1, 2) AND `rid`='".$user_arr['rid']."' ORDER BY `name` ASC ");
		if(mysql_num_rows($ref_arr)=="0") {
										echo(" <option value='' selected>-----</option> ");
										}
										echo(" <option value='' selected>-----</option> ");
										

			while($row=mysql_fetch_array($ref_arr))
				{
					echo(" <option value='".$row[1]."'>".$row[1]."</option> ");
				}
?>
                                            </select>
                                        
                                    </div></th>

                            </tr>

                            <tr>

                                <td colspan='1' align='right'><font size='2'  face='Arial'><strong>Расорядитель</strong></font></td>
                                <th colspan='2' class='not-sortable'>
								
							<div class="row">
								<select class="form-control-lg select2" name='3'>
                                     <?
										$ref_arr=mysql_query("SELECT `id`,`name` FROM `users`  WHERE  `rid`='".$user_arr['rid']."' AND `otvets`='1' ORDER BY `name` ASC ");
										if(mysql_num_rows($ref_arr)=="0") {
										echo(" <option value='' selected>-----</option> ");
										}
										echo(" <option value='' selected>-----</option> ");
										
										while($row=mysql_fetch_array($ref_arr))
											{
												echo(" <option value='".$row[1]."'>".$row[1]."</option> ");
											}
									?>	
                                </select>
                            </div>
									
									</th>
                                
                            </tr>
                            <tr>
                                <td colspan='1' align='right'><font size='2'  face='Arial'><strong>Аппаратура</strong></font></td>
                                <th colspan='2' class='not-sortable'><div class="row">
								<select class="form-control-lg select2" name='4'>
                                     <?
										$ref_arr=mysql_query("SELECT `id`,`name` FROM `users`  WHERE  `rid`='".$user_arr['rid']."' AND `otvets`='1' ORDER BY `name` ASC ");
										if(mysql_num_rows($ref_arr)=="0") {
										echo(" <option value='' selected>-----</option> ");
										}
										echo(" <option value='' selected>-----</option> ");
										
										while($row=mysql_fetch_array($ref_arr))
											{
												echo(" <option value='".$row[1]."'>".$row[1]."</option> ");
											}
									?>	
                                </select>
                            </div></th>
                                
                            </tr>
                            <tr>
                                <td colspan='1' align='right'><font size='2'  face='Arial'><strong>Сцена</strong></font></td>
                                <th colspan='2' class='not-sortable'><div class="row">
								<select class="form-control-lg select2" name='5'>
                                     <?
										$ref_arr=mysql_query("SELECT `id`,`name` FROM `users`  WHERE  `rid`='".$user_arr['rid']."' AND `otvets`='1' ORDER BY `name` ASC ");
										if(mysql_num_rows($ref_arr)=="0") {
										echo(" <option value='' selected>-----</option> ");
										}
										echo(" <option value='' selected>-----</option> ");
										
										while($row=mysql_fetch_array($ref_arr))
											{
												echo(" <option value='".$row[1]."'>".$row[1]."</option> ");
											}
									?>	
                                </select>
                            </div></th>
                                
                            </tr>
                            <tr>
                                <td colspan='1' align='right'><font size='2'  face='Arial'><strong>Микрофон 1</strong></font></td>
                                <th colspan='2' class='not-sortable'><div class="row">
								<select class="form-control-lg select2" name='6'>
                                     <?
										$ref_arr=mysql_query("SELECT `id`,`name` FROM `users`  WHERE  `rid`='".$user_arr['rid']."' AND `otvets`='1' ORDER BY `name` ASC ");
										if(mysql_num_rows($ref_arr)=="0") {
										echo(" <option value='' selected>-----</option> ");
										}
										echo(" <option value='' selected>-----</option> ");
										
										while($row=mysql_fetch_array($ref_arr))
											{
												echo(" <option value='".$row[1]."'>".$row[1]."</option> ");
											}
									?>	
                                </select>
                            </div></th>
                               
                            </tr>
                            <tr>
                                <td colspan='1' align='right'><font size='2'  face='Arial'><strong>Микрофон 2</strong></font></td>
                                <th colspan='2' class='not-sortable'><div class="row">
								<select class="form-control-lg select2" name='7'>
                                     <?
										$ref_arr=mysql_query("SELECT `id`,`name` FROM `users`  WHERE  `rid`='".$user_arr['rid']."' AND `otvets`='1' ORDER BY `name` ASC ");
										if(mysql_num_rows($ref_arr)=="0") {
										echo(" <option value='' selected>-----</option> ");
										}
										echo(" <option value='' selected>-----</option> ");
										
										while($row=mysql_fetch_array($ref_arr))
											{
												echo(" <option value='".$row[1]."'>".$row[1]."</option> ");
											}
									?>	
                                </select>
                            </div></font></th>
                                
                            </tr>


                            <tr><th bgcolor='#4a4529'  colspan='3' class='not-sortable'><font size='2' color='#FFFFFF' face='Arial'><strong>СОКРОВИЩЕ ИЗ СЛОВА БОГА</strong></font></th></tr>

                            <tr>
                                <th colspan='3' class='not-sortable'>
								<div class="row">
								<select class="form-control-lg select2" name='8'>
                                     <?
										
										
										echo(" <option name='' value='' selected>Песня</option> ");
										$i=1;
										while($i <= 151)
											{
												echo(" <option value='Песня ".$i."'> Песня ".$i."</option> ");
												$i++;
											}
									?>	
                                </select>
                            </div>
									</th>

                            </tr>
                            <tr>
                                <td colspan='1' align='right'><font size='2'  face='Arial'><strong> Речь ( 10 мин)</strong></font></td>
                                <th colspan='2'><div class="row">
                                        
                                            <select class="form-control-lg select2" name='9'>
                                                <?
										


	$ref_arr=mysql_query("SELECT `id`,`name` FROM `users`  WHERE `st_sp` IN (1, 2) AND `rid`='".$user_arr['rid']."' ORDER BY `name` ASC ");
		if(mysql_num_rows($ref_arr)=="0") {
										echo(" <option value='' selected>-----</option> ");
										}
										echo(" <option value='' selected>-----</option> ");
										

			while($row=mysql_fetch_array($ref_arr))
				{
					echo(" <option value='".$row[1]."'>".$row[1]."</option> ");
				}
?>
                                            </select>
                                        
                                    </div></th>
                                
                            </tr>

                            <tr>
                                <td colspan='1' align='right'><font size='2'  face='Arial'><strong>Духовные Жемчужины (8 мин)</strong></font></td>
                                <th colspan='2'><div class="row">
                                        
                                            <select class="form-control-lg select2" name='10'>
                                                <?
										


	$ref_arr=mysql_query("SELECT `id`,`name` FROM `users`  WHERE `st_sp` IN (1, 2) AND `rid`='".$user_arr['rid']."' ORDER BY `name` ASC ");
		if(mysql_num_rows($ref_arr)=="0") {
										echo(" <option value='' selected>-----</option> ");
										}
										echo(" <option value='' selected>-----</option> ");
										

			while($row=mysql_fetch_array($ref_arr))
				{
					echo(" <option value='".$row[1]."'>".$row[1]."</option> ");
				}
?>
                                            </select>
                                        
                                    </div></th>
                                
                            </tr>
                            <tr>
                                <td colspan='1' align='right'><font size='2'  face='Arial'><strong>Чтение Библии (4 мин)</strong></font></td>
                                <th colspan='2'><div class="row">
								<select class="form-control-lg select2" name='11'>
                                     <?
										$ref_arr=mysql_query("SELECT `id`,`name` FROM `users`  WHERE  `rid`='".$user_arr['rid']."' AND `gender`='1' ORDER BY `name` ASC ");
										if(mysql_num_rows($ref_arr)=="0") {
										echo(" <option value='' selected>-----</option> ");
										}
										echo(" <option value='' selected>-----</option> ");
										
										while($row=mysql_fetch_array($ref_arr))
											{
												echo(" <option value='".$row[1]."'>".$row[1]."</option> ");
											}
									?>	
                                </select>
                            </div></th>
                                 
                            </tr>

                            <tr><th bgcolor='#c09200'  colspan='3'  ><font size='2' color='#FFFFFF' face='Arial'><strong>ОТТАЧИВАЕМ НАВЫКИ СЛУЖЕНИЯ </strong></font></th></tr>

							<tr>
                                <td colspan='3'><font size='2'  face='Arial'><strong>Главный зал</strong></font></td>
                                
                            </tr>

                            <tr>
                                <td colspan='1' align='right'><div class="row">
								<select  class="form-control-lg select2" name='12'> 
                                     <?
										echo(" <option  value='' selected>-----</option> ");
										echo(" <option  value='Первый разговор' >Первый разговор</option> ");
										echo(" <option  value='Второй разговор' >Второй разговор</option> ");
										echo(" <option  value='Третий разговор' >Третий разговор</option> ");
										echo(" <option  value='Четвертый разговор' >Четвертый разговор</option> ");
										echo(" <option  value='Развивай навыки чтения и способность учить' >Развивай навыки чтения и способность учить</option> ");
										
									?>	
                                </select>
                            </div></td>
                                <th colspan='2'><div class="row">
								<select  class="form-control-lg select2" name='13'> 
                                     <?
									
										
										echo(" <option  value=''selected>-----</option> ");
										echo(" <option  value='Видео' >Видео</option> ");
									?>	
                                </select>
                            </div></th>

                            </tr>
                            <tr>
                                <td colspan='1' align='right'>
								<div class="row">
								<select class="form-control-lg select2" name='14'> 
                                     <?
										echo(" <option  value='' selected>-----</option> ");
										echo(" <option  value='Первый разговор' >Первый разговор</option> ");
										echo(" <option  value='Второй разговор' >Второй разговор</option> ");
										echo(" <option  value='Третий разговор' >Третий разговор</option> ");
										echo(" <option  value='Четвертый разговор' >Четвертый разговор</option> ");
										
										
									?>	
                                </select>
                            </div></td>
                                <th colspan='1'><div class="row">
								<select class="form-control-lg select2" name='15'>
                                     <?
										$ref_arr=mysql_query("SELECT `id`,`name` FROM `users`  WHERE  `rid`='".$user_arr['rid']."' ORDER BY `name` ASC ");
										if(mysql_num_rows($ref_arr)=="0") {
										echo(" <option name='' value='' selected>-----</option> ");
										}
										echo(" <option name='' value='' selected>-----</option> ");
										
										while($row=mysql_fetch_array($ref_arr))
											{
												echo(" <option value='".$row[1]."'>".$row[1]."</option> ");
											}
									?>	
                                </select>
                            </div></th>
                                <th colspan='1'><div class="row">
								<select class="form-control-lg select2" name='16'>
                                     <?
										$ref_arr=mysql_query("SELECT `id`,`name` FROM `users`  WHERE  `rid`='".$user_arr['rid']."' ORDER BY `name` ASC ");
										if(mysql_num_rows($ref_arr)=="0") {
										echo(" <option name='' value='' selected>-----</option> ");
										}
										echo(" <option name='' value='' selected>-----</option> ");
										
										while($row=mysql_fetch_array($ref_arr))
											{
												echo(" <option value='".$row[1]."'>".$row[1]."</option> ");
											}
									?>	
                                </select>
                            </div></th>

                            </tr>
                            <tr>
                                <td colspan='1' align='right'><div class="row">
								<select  class="form-control-lg select2" name='17'> 
                                     <?
										echo(" <option  value='' selected>-----</option> ");
										echo(" <option  value='Первый разговор' >Первый разговор</option> ");
										echo(" <option  value='Второй разговор' >Второй разговор</option> ");
										echo(" <option  value='Третий разговор' >Третий разговор</option> ");
										echo(" <option  value='Четвертый разговор' >Четвертый разговор</option> ");
										
										
									?>	
                                </select>
                            </div></td>
                                <th colspan='1'><div class="row">
								<select class="form-control-lg select2" name='18'>
                                     <?
										$ref_arr=mysql_query("SELECT `id`,`name` FROM `users`  WHERE  `rid`='".$user_arr['rid']."' ORDER BY `name` ASC ");
										if(mysql_num_rows($ref_arr)=="0"){
										echo(" <option name='' value='' selected>-----</option> ");
										}
										echo(" <option name='' value='' selected>-----</option> ");
										while($row=mysql_fetch_array($ref_arr))
											{
												echo(" <option value='".$row[1]."'>".$row[1]."</option> ");
											}
									?>	
                                </select>
                            </div></th>
                                <th colspan='1'><div class="row">
								<select class="form-control-lg select2" name='19'>
                                     <?
										$ref_arr=mysql_query("SELECT `id`,`name` FROM `users`  WHERE  `rid`='".$user_arr['rid']."' ORDER BY `name` ASC ");
										if(mysql_num_rows($ref_arr)=="0"){
										echo(" <option name='' value='' selected>-----</option> ");
										}
										echo(" <option name='' value='' selected>-----</option> ");
										while($row=mysql_fetch_array($ref_arr))
											{
												echo(" <option value='".$row[1]."'>".$row[1]."</option> ");
											}
									?>	
                                </select>
                            </div></th>

                            </tr>
                            <tr>
                                <td colspan='1' align='right'><div class="row">
								<select  class="form-control-lg select2" name='20'> 
                                     <?
										echo(" <option  value='' selected>-----</option> ");
										echo(" <option  value='Первый разговор' >Первый разговор</option> ");
										echo(" <option  value='Второй разговор' >Второй разговор</option> ");
										echo(" <option  value='Третий разговор' >Третий разговор</option> ");
										echo(" <option  value='Четвертый разговор' >Четвертый разговор</option> ");
										echo(" <option  value='Изучение' >Изучение</option> ");
										
									?>	
                                </select>
                            </div></td>
                                <th colspan='1'><div class="row">
								<select class="form-control-lg select2" name='21'>
                                     <?
										$ref_arr=mysql_query("SELECT `id`,`name` FROM `users`  WHERE  `rid`='".$user_arr['rid']."' ORDER BY `name` ASC ");
										if(mysql_num_rows($ref_arr)=="0"){
										echo(" <option name='' value='' selected>-----</option> ");
										}
										echo(" <option name='' value='' selected>-----</option> ");
										while($row=mysql_fetch_array($ref_arr))
											{
												echo(" <option value='".$row[1]."'>".$row[1]."</option> ");
											}
									?>	
                                </select>
                            </div></th>
                                <th colspan='1'><div class="row">
								<select class="form-control-lg select2" name='22'>
                                     <?
										$ref_arr=mysql_query("SELECT `id`,`name` FROM `users`  WHERE  `rid`='".$user_arr['rid']."' ORDER BY `name` ASC ");
										if(mysql_num_rows($ref_arr)=="0"){
										echo(" <option name='' value='' selected>-----</option> ");
										}
										echo(" <option name='' value='' selected>-----</option> ");
										while($row=mysql_fetch_array($ref_arr))
											{
												echo(" <option value='".$row[1]."'>".$row[1]."</option> ");
											}
									?>	
                                </select>
                            </div></th>

                            </tr>
							
							<tr>
                                <td colspan='1' align='right'><div class="row">
								<select  class="form-control-lg select2" name='23'> 
                                     <?
										echo(" <option  value='' selected>-----</option> ");
										echo(" <option  value='Речь' >Речь</option> ");
										
									?>	
                                </select>
                            </div></td>
                                <th colspan='2'><div class="row">
								<select  class="form-control-lg select2" name='24'> 
                                     <?
										$ref_arr=mysql_query("SELECT `id`,`name` FROM `users`  WHERE  `rid`='".$user_arr['rid']."' AND `gender`='1' ORDER BY `name` ASC ");
										if(mysql_num_rows($ref_arr)=="0"){
										echo(" <option value='' selected>-----</option> ");
										}
									
										echo(" <option  value='' selected>-----</option> ");
										while($row=mysql_fetch_array($ref_arr))
											{
												echo(" <option value='".$row[1]."'>".$row[1]."</option> ");
											}
									?>	
                                </select>
                            </div></th>

                            </tr>

                            <tr>
                                <th colspan='1'><font size='2'  face='Arial'><strong>Второй класс</strong></font></th>
                                <th colspan='2'><div class="row">
								<select class="form-control-lg select2" name='25'>
                                     <?
										$ref_arr=mysql_query("SELECT `id`,`name` FROM `users`  WHERE  `st_sp` IN (1, 2) AND `rid`='".$user_arr['rid']."' ORDER BY `name` ASC  ");
										if(mysql_num_rows($ref_arr)=="0"){
										echo(" <option value='' selected>-----</option> ");
										}
										echo(" <option value='' selected>-----</option> ");
										while($row=mysql_fetch_array($ref_arr))
											{
												echo(" <option value='".$row[1]."'>".$row[1]."</option> ");
											}
									?>	
                                </select>
                            </div></th>
                            </tr>

                            <tr>
                                <td colspan='1' align='right'><font size='2'  face='Arial'><strong>Чтение Библии</strong></font></td>
                                <th colspan='2'><div class="row">
								<select class="form-control-lg select2" name='26'>
                                     <?
										$ref_arr=mysql_query("SELECT `id`,`name` FROM `users`  WHERE  `rid`='".$user_arr['rid']."' AND `gender`='1' ORDER BY `name` ASC ");
										if(mysql_num_rows($ref_arr)=="0") {
										echo(" <option  value='' selected>-----</option> ");
										}
										echo(" <option value='' selected>-----</option> ");
										while($row=mysql_fetch_array($ref_arr))
											{
												echo(" <option value='".$row[1]."'>".$row[1]."</option> ");
											}
									?>	
                                </select>
                            </div></th>
                            </tr>


                            <tr>
                                <td colspan='1' align='right'><div class="row">
								<select  class="form-control-lg select2" name='27'> 
                                     <?
										echo(" <option  value='' selected>-----</option> ");
										echo(" <option  value='Первый разговор' >Первый разговор</option> ");
										echo(" <option  value='Второй разговор' >Второй разговор</option> ");
										echo(" <option  value='Третий разговор' >Третий разговор</option> ");
										echo(" <option  value='Четвертый разговор' >Четвертый разговор</option> ");
										echo(" <option  value='' >Развивай навыки чтения и способность учить</option> ");
										
									?>	
                                </select>
                            </div></td>
							
							
                                <th colspan='2'><div class="row">
								<select class="form-control-lg select2" name='28'> 
                                     <?
									
										
										echo(" <option  value='' selected>-----</option> ");
										echo(" <option  value='Видео' >Видео</option> ");
										
									?>	
                                </select>
                            </div></th>


                            </tr>
							
                            <tr>
                                <td colspan='1' align='right'><div class="row">
								<select  class="form-control-lg select2" name='29'> 
                                     <?
										echo(" <option  value='' selected>-----</option> ");
										echo(" <option  value='Первый разговор' >Первый разговор</option> ");
										echo(" <option  value='Второй разговор' >Второй разговор</option> ");
										echo(" <option  value='Третий разговор' >Третий разговор</option> ");
										echo(" <option  value='Четвертый разговор' >Четвертый разговор</option> ");
										
										
									?>	
                                </select>
                            </div></td>
                                <th colspan='1'><div class="row">
								<select class="form-control-lg select2" name='30'>
                                     <?
										$ref_arr=mysql_query("SELECT `id`,`name` FROM `users`  WHERE  `rid`='".$user_arr['rid']."'  ORDER BY `name` ASC ");
										if(mysql_num_rows($ref_arr)=="0"){
										echo(" <option value='' selected>-----</option> ");
										}
										echo(" <option value='' selected>-----</option> ");
										while($row=mysql_fetch_array($ref_arr))
											{
												echo(" <option value='".$row[1]."'>".$row[1]."</option> ");
											}
									?>	
                                </select>
                            </div></th>
                                <th colspan='1'><div class="row">
								<select class="form-control-lg select2" name='31'>
                                     <?
										$ref_arr=mysql_query("SELECT `id`,`name` FROM `users`  WHERE  `rid`='".$user_arr['rid']."' ORDER BY `name` ASC ");
										if(mysql_num_rows($ref_arr)=="0") {
										echo(" <option  value='' selected>-----</option> ");
										}
										echo(" <option  value='' selected>-----</option> ");
										while($row=mysql_fetch_array($ref_arr))
											{
												echo(" <option value='".$row[1]."'>".$row[1]."</option> ");
											}
									?>	
                                </select>
                            </div></th>

                            </tr>
                            <tr>
                                <td colspan='1' align='right'><div class="row">
								<select  class="form-control-lg select2" name='32'> 
                                     <?
										echo(" <option  value='' selected>-----</option> ");
										echo(" <option  value='Первый разговор' >Первый разговор</option> ");
										echo(" <option  value='Второй разговор' >Второй разговор</option> ");
										echo(" <option  value='Третий разговор' >Третий разговор</option> ");
										echo(" <option  value='Четвертый разговор' >Четвертый разговор</option> ");
										
										
									?>	
                                </select>
                            </div></td>
                                <th colspan='1'><div class="row">
								<select class="form-control-lg select2" name='33'>
                                     <?
										$ref_arr=mysql_query("SELECT `id`,`name` FROM `users`  WHERE  `rid`='".$user_arr['rid']."'  ORDER BY `name` ASC ");
										if(mysql_num_rows($ref_arr)=="0") {
										echo(" <option value='' selected>-----</option> ");
										}
										echo(" <option value='' selected>-----</option> ");
										while($row=mysql_fetch_array($ref_arr))
											{
												echo(" <option value='".$row[1]."'>".$row[1]."</option> ");
											}
									?>	
                                </select>
                            </div></th>
                                <th colspan='1'><div class="row">
								<select class="form-control-lg select2" name='34'>
                                     <?
										$ref_arr=mysql_query("SELECT `id`,`name` FROM `users`  WHERE  `rid`='".$user_arr['rid']."' ORDER BY `name` ASC ");
										if(mysql_num_rows($ref_arr)=="0") {
										echo(" <option value='' selected>-----</option> ");
										}
										echo(" <option value='' selected>-----</option> ");
										
										while($row=mysql_fetch_array($ref_arr))
											{
												echo(" <option value='".$row[1]."'>".$row[1]."</option> ");
											}
									?>	
                                </select>
                            </div></th>

                            </tr>
                            <tr>
                                <td colspan='1' align='right'><div class="row">
								<select  class="form-control-lg select2" name='35'> 
                                     <?
										echo(" <option  value='' selected>-----</option> ");
										echo(" <option  value='Первый разговор' >Первый разговор</option> ");
										echo(" <option  value='Второй разговор' >Второй разговор</option> ");
										echo(" <option  value='Третий разговор' >Третий разговор</option> ");
										echo(" <option  value='Четвертый разговор' >Четвертый разговор</option> ");
										echo(" <option  value='Изучение' >Изучение</option> ");
										
									?>	
                                </select>
                            </div></td>
                                <th colspan='1'><div class="row">
								<select class="form-control-lg select2" name='36'>
                                     <?
										$ref_arr=mysql_query("SELECT `id`,`name` FROM `users`  WHERE  `rid`='".$user_arr['rid']."' ORDER BY `name` ASC ");
										if(mysql_num_rows($ref_arr)=="0") {
										echo(" <option  value='' selected>-----</option> ");
										}
										echo(" <option  value='' selected>-----</option> ");
										
										while($row=mysql_fetch_array($ref_arr))
											{
												echo(" <option value='".$row[1]."'>".$row[1]."</option> ");
											}
									?>	
                                </select>
                            </div></th>
							
							
							
                                <th colspan='1'><div class="row">
								<select class="form-control-lg select2" name='37'>
                                     <?
										$ref_arr=mysql_query("SELECT `id`,`name` FROM `users`  WHERE  `rid`='".$user_arr['rid']."' ORDER BY `name` ASC ");
										if(mysql_num_rows($ref_arr)=="0") {
										echo(" <option name='' value='' selected>-----</option> ");
										}
										echo(" <option name='' value='' selected>-----</option> ");
										
										while($row=mysql_fetch_array($ref_arr))
											{
												echo(" <option value='".$row[1]."'>".$row[1]."</option> ");
											}
									?>	
                                </select>
                            </div></th>

                            </tr>
							
							
							
                            <tr>
                                <td colspan='1' align='right'><div class="row">
								<select  class="form-control-lg select2" name='38'> 
                                     <?
										echo(" <option  value='' selected>-----</option> ");
										
										echo(" <option  value='Речь' >Речь</option> ");
										
										
									?>	
                                </select>
                            </div></td>
							
							
                                <th colspan='2'><div class="row">
								<select class="form-control-lg select2" name='39'> 
                                     <?
										$ref_arr=mysql_query("SELECT `id`,`name` FROM `users`  WHERE  `rid`='".$user_arr['rid']."' AND `gender`='1' ORDER BY `name` ASC ");
										if(mysql_num_rows($ref_arr)=="0"){
										echo(" <option name='' value='' selected>-----</option> ");
										}
										
										echo(" <option  value='' selected>-----</option> ");
										while($row=mysql_fetch_array($ref_arr))
											{
												echo(" <option value='".$row[1]."'>".$row[1]."</option> ");
											}
									?>	
                                </select>
                            </div></th>


                            </tr>

                            <tr><th bgcolor='#943734'  colspan='3'  ><font size='2' color='#FFFFFF' face='Arial'><strong>ХРИСТИАНСКАЯ ЖИЗНЬ</strong></font></th></tr>
                            <tr>
                                <th  colspan='3'><div class="row">
								<select class="form-control-lg select2" name='40'>
                                     <?
										
										
										echo(" <option value='' selected>Песня</option> ");
										$i=1;
										while($i <= 151)
											{
												echo(" <option value='Песня ".$i."'>Песня ".$i."</option> ");
												$i++;
											}
									?>	
                                </select>
                            </div>
									</th>

                            </tr>
                            <tr>
                                <td colspan='1' align='right'><font size='2'  face='Arial'><strong>Речь (15 мин)</strong></font></td>
                                <th colspan='2'><div class="row">
                                        
                                            <select class="form-control-lg select2" name='41'>
                                                <?
										


	$ref_arr=mysql_query("SELECT `id`,`name` FROM `users`  WHERE `st_sp` IN (1, 2) AND `rid`='".$user_arr['rid']."' ORDER BY `name` ASC ");
		if(mysql_num_rows($ref_arr)=="0") {
										echo(" <option value='' selected>-----</option> ");
										}
										echo(" <option value='' selected>-----</option> ");
										
			while($row=mysql_fetch_array($ref_arr))
				{
					echo(" <option value='".$row[1]."'>".$row[1]."</option> ");
				}
?>
                                            </select>
                                        
                                    </div></th>

                            </tr>
							
							
							  <tr>
                                <td colspan='1' align='right'><div class="row">
								<select  class="form-control-lg select2" name='42'> 
                                     <?
										echo(" <option  value='' selected>-----</option> ");
										
										echo(" <option  value='Местные потребности (15 мин)' >Местные потребности (15 мин)</option> ");
										
									?>	
                                </select>
                            </div></td>
                                <th colspan='2'><div class="row">
								<select class="form-control-lg select2" name='43'>
                                     <?
										$ref_arr=mysql_query("SELECT `id`,`name` FROM `users`  WHERE `st_sp` IN (1, 2) AND `rid`='".$user_arr['rid']."' ORDER BY `name` ASC ");
										if(mysql_num_rows($ref_arr)=="0") {
										echo(" <option  value='' selected>-----</option> ");
										}
										echo(" <option  value='' selected>-----</option> ");
										
										while($row=mysql_fetch_array($ref_arr))
											{
												echo(" <option value='".$row[1]."'>".$row[1]."</option> ");
											}
									?>	
                                </select>
                            </div></th>
							
                            </tr>
                            <tr>
                                <td colspan='1' align='right'><font size='2'  face='Arial'><strong>Изучение Библии</strong></font></td>
                                <th colspan='2'><div class="row">
                                        
                                            <select class="form-control-lg select2" name='44'>
                                                <?
										


	$ref_arr=mysql_query("SELECT `id`,`name` FROM `users`  WHERE `st_sp` IN (1, 2) AND `rid`='".$user_arr['rid']."' ORDER BY `name` ASC ");
		if(mysql_num_rows($ref_arr)=="0") {
										echo(" <option value='' selected>-----</option> ");
										}
										echo(" <option value='' selected>-----</option> ");
										

			while($row=mysql_fetch_array($ref_arr))
				{
					echo(" <option value='".$row[1]."'>".$row[1]."</option> ");
				}
?>
                                            </select>
                                        
                                    </div></th>

                            </tr>
							 <tr>
                                <td colspan='1' align='right'><font size='2'  face='Arial'><strong>Чтец</strong></font></td>
                                <th colspan='2'><div class="row">
                                        
                                            <select class="form-control-lg select2" name='45'>
                                                <?
										


	$ref_arr=mysql_query("SELECT `id`,`name` FROM `users`  WHERE  `rid`='".$user_arr['rid']."' AND `gender`='1' ORDER BY `name` ASC ");
		if(mysql_num_rows($ref_arr)=="0") {
										echo(" <option value='' selected>-----</option> ");
										}
										echo(" <option value='' selected>-----</option> ");
										

			while($row=mysql_fetch_array($ref_arr))
				{
					echo(" <option value='".$row[1]."'>".$row[1]."</option> ");
				}
?>
                                            </select>
                                        
                                    </div></th>

                            </tr>
                            <tr>
                                <th  colspan='3'><div class="row">
								<select class="form-control-lg select2" name='46'>
                                     <?
										
										
										echo(" <option value='' selected>Песня</option> ");
										$i=1;
										while($i <= 151)
											{
												echo(" <option value='Песня ".$i."'>Песня ".$i."</option> ");
												$i++;
											}
									?>	
                                </select>
                            </div>
									</th>

                            </tr>
                            <tr>
                                <td colspan='1' align='right'><font size='2'  face='Arial'><strong>Молитва</strong></font></td>
                                <th colspan='2'><div class="row">
                                        
                                            <select class="form-control-lg select2" name='47'>
                                                <?
										


	$ref_arr=mysql_query("SELECT `id`,`name` FROM `users`  WHERE `st_sp` IN (1, 2)  AND `rid`='".$user_arr['rid']."' ORDER BY `name` ASC ");
		if(mysql_num_rows($ref_arr)=="0") {
										echo(" <option value='' selected>-----</option> ");
										}
										echo(" <option value='' selected>-----</option> ");
										

			while($row=mysql_fetch_array($ref_arr))
				{
					echo(" <option value='".$row[1]."'>".$row[1]."</option> ");
				}
?>
                                            </select>
                                        
                                    </div>
									
									</th>

                            </tr>
							 
							<tr>
                                <td colspan='1' ></td>
                               
                                <td colspan='2' align='right'>
									<input type='hidden' name='t' value='1' >
									<button type='submit' class='btn btn-primary'>Сохранить график</button>
									</td>

                            </tr>

	 </tbody>
						 </table>
						 	</form>
					 </div>
				 </div>
			 </div>
		 </div>
		 
		 
		 
		 
		 
		 
		 
		 
		 <div class='card'>
	 							<div class='card-body pa-0'>
	 								<div class='table-wrap'>
	 									<div class='table-responsive'>




	                       <form action=''  method='post' name='form1'>

                            <table class='table table-hover'>
                            <thead>
                            <tr>
                              <th colspan='3'><font size='5'  face='Arial'><strong> Расписание встречи</strong></font></th>
							  
                            </tr>
                            </thead>
                                      <tbody>




                            <tr>
                                <th bgcolor='#eeece1'  colspan='2' class='not-sortable'><font size='3'  face='Arial'><strong>Суббота 18:30</strong></font></th>
                                <th bgcolor='#eeece1'  colspan='1' class='not-sortable'><div class="row">
								<select  class="form-control-lg select2" name='nweak'> 
                                     <?
										
										echo(" <option  value='' selected>-----</option> ");
										$snd = mysql_fetch_array(mysql_query("SELECT * FROM `cfg_tb_date` WHERE `id`='1'"));
										$dat=date("Y-m-d");
										
										
										$nweak = date("W", strtotime($snd[1]));
										$y=explode("-",$snd[1]);
										$getweak = stwdate($nweak, $y[0]);
										echo(" <option  value='".$nweak."' >".$getweak ['week_start']." &mdash; ".$getweak['week_end']."</option> ");
										
										
										
										
										while($x++<6){
											
										$nex_w1 = date('Y-m-d', strtotime($snd[1]. ' + 7 days'));
										$nweak_n1 = date("W", strtotime($nex_w1));
										$y=explode("-",$nex_w1);
										$getweak = stwdate($nweak_n1, $y[0]);
										echo(" <option type='submit' value='".$nweak_n1."' >".$getweak ['week_start']." &mdash; ".$getweak['week_end']."</option> ");
											
										$snd[1]=$nex_w1;	
											
										}
										
										
										
										
										
										
										
									?>	
                                </select>
                            </div></th>

                            </tr>
                            <tr>
                                <th bgcolor='#eeece1'  colspan='3' class='not-sortable'><div class="row">
								<select class="form-control-lg select2" name='1'>
                                     <?
										$ref_arr=mysql_query("SELECT * FROM `tb_group`  WHERE `cgr`='".$user_arr['rid']."' AND `prim` BETWEEN 1 AND 8 ORDER BY `prim` ASC ");
										if(mysql_num_rows($ref_arr)=="0") {
										echo(" <option value='' selected>-----</option> ");
										}
										echo(" <option value='' selected>-----</option> ");
										
										while($row=mysql_fetch_array($ref_arr))
											{
												$pri_use_gr=mysql_fetch_array(mysql_query("SELECT * FROM `users`  WHERE `id`='".$row['uid']."'"));
												echo(" <option value='Группа №".$row[1].'/'.$pri_use_gr['name']."'>Группа №".$row[1].'/'.$pri_use_gr['name']."</option> ");
											}
									?>	
                                </select>
                            </div></th>

                            </tr>




                            <tr>
                                <td  colspan='1' align='right'><font size='2'  face='Arial' ><strong>Председатель</strong></font></td>
                                <th  colspan='2' class='not-sortable'> 
								<div class="row">
                                        
                                            <select class="form-control-lg select2" name='2'>
                                                <?
										


	$ref_arr=mysql_query("SELECT `id`,`name` FROM `users`  WHERE `st_sp` IN (1, 2) AND `rid`='".$user_arr['rid']."' ORDER BY `name` ASC ");
		if(mysql_num_rows($ref_arr)=="0") {
										echo(" <option value='' selected>-----</option> ");
										}
										echo(" <option value='' selected>-----</option> ");
										

			while($row=mysql_fetch_array($ref_arr))
				{
					echo(" <option value='".$row[1]."'>".$row[1]."</option> ");
				}
?>
                                            </select>
                                        
                                    </div></th>

                            </tr>

                            <tr>

                                <td colspan='1' align='right'><font size='2'  face='Arial'><strong>Расорядитель</strong></font></td>
                                <th colspan='2' class='not-sortable'>
								
							<div class="row">
								<select class="form-control-lg select2" name='3'>
                                     <?
										$ref_arr=mysql_query("SELECT `id`,`name` FROM `users`  WHERE  `rid`='".$user_arr['rid']."' AND `otvets`='1' ORDER BY `name` ASC ");
										if(mysql_num_rows($ref_arr)=="0") {
										echo(" <option value='' selected>-----</option> ");
										}
										echo(" <option value='' selected>-----</option> ");
										
										while($row=mysql_fetch_array($ref_arr))
											{
												echo(" <option value='".$row[1]."'>".$row[1]."</option> ");
											}
									?>	
                                </select>
                            </div>
									
									</th>
                                
                            </tr>
                            <tr>
                                <td colspan='1' align='right'><font size='2'  face='Arial'><strong>Аппаратура</strong></font></td>
                                <th colspan='2' class='not-sortable'><div class="row">
								<select class="form-control-lg select2" name='4'>
                                     <?
										$ref_arr=mysql_query("SELECT `id`,`name` FROM `users`  WHERE  `rid`='".$user_arr['rid']."' AND `otvets`='1' ORDER BY `name` ASC ");
										if(mysql_num_rows($ref_arr)=="0") {
										echo(" <option value='' selected>-----</option> ");
										}
										echo(" <option value='' selected>-----</option> ");
										
										while($row=mysql_fetch_array($ref_arr))
											{
												echo(" <option value='".$row[1]."'>".$row[1]."</option> ");
											}
									?>	
                                </select>
                            </div></th>
                                
                            </tr>
                            <tr>
                                <td colspan='1' align='right'><font size='2'  face='Arial'><strong>Сцена</strong></font></td>
                                <th colspan='2' class='not-sortable'><div class="row">
								<select class="form-control-lg select2" name='5'>
                                     <?
										$ref_arr=mysql_query("SELECT `id`,`name` FROM `users`  WHERE  `rid`='".$user_arr['rid']."' AND `otvets`='1' ORDER BY `name` ASC ");
										if(mysql_num_rows($ref_arr)=="0") {
										echo(" <option value='' selected>-----</option> ");
										}
										echo(" <option value='' selected>-----</option> ");
										
										while($row=mysql_fetch_array($ref_arr))
											{
												echo(" <option value='".$row[1]."'>".$row[1]."</option> ");
											}
									?>	
                                </select>
                            </div></th>
                                
                            </tr>
                            <tr>
                                <td colspan='1' align='right'><font size='2'  face='Arial'><strong>Микрофон 1</strong></font></td>
                                <th colspan='2' class='not-sortable'><div class="row">
								<select class="form-control-lg select2" name='6'>
                                     <?
										$ref_arr=mysql_query("SELECT `id`,`name` FROM `users`  WHERE  `rid`='".$user_arr['rid']."' AND `otvets`='1' ORDER BY `name` ASC ");
										if(mysql_num_rows($ref_arr)=="0") {
										echo(" <option value='' selected>-----</option> ");
										}
										echo(" <option value='' selected>-----</option> ");
										
										while($row=mysql_fetch_array($ref_arr))
											{
												echo(" <option value='".$row[1]."'>".$row[1]."</option> ");
											}
									?>	
                                </select>
                            </div></th>
                               
                            </tr>
                            <tr>
                                <td colspan='1' align='right'><font size='2'  face='Arial'><strong>Микрофон 2</strong></font></td>
                                <th colspan='2' class='not-sortable'><div class="row">
								<select class="form-control-lg select2" name='7'>
                                     <?
										$ref_arr=mysql_query("SELECT `id`,`name` FROM `users`  WHERE  `rid`='".$user_arr['rid']."' AND `otvets`='1' ORDER BY `name` ASC ");
										if(mysql_num_rows($ref_arr)=="0") {
										echo(" <option value='' selected>-----</option> ");
										}
										echo(" <option value='' selected>-----</option> ");
										
										while($row=mysql_fetch_array($ref_arr))
											{
												echo(" <option value='".$row[1]."'>".$row[1]."</option> ");
											}
									?>	
                                </select>
                            </div></font></th>
                                
                            </tr>


                            <tr><th bgcolor='#0070c1'  colspan='3' class='not-sortable'><font size='2' color='#FFFFFF' face='Arial'><strong>ПУБЛИЧНАЯ РЕЧЬ</strong></font></th></tr>


 <tr>
                                <td colspan='1' align='right'> <input type="text" class="form-control mt-5" placeholder="Input Box"></td>
                                <th colspan='2'><div class="row">
                                        
                                             <select id="input_tags" class="form-control" multiple="multiple">
                                                <?
										


	$ref_arr=mysql_query("SELECT `id`,`name` FROM `users`  WHERE `st_sp` IN (1, 2) AND `rid`='".$user_arr['rid']."' ORDER BY `name` ASC ");
			while($row=mysql_fetch_array($ref_arr))
				{
					echo(" <option value='".$row[1]."'>".$row[1]."</option> ");
				}
?>
                                            </select>
                                        
                                    </div></th>
                                
                            </tr>
                            <tr>
                                <th colspan='3' class='not-sortable'>
								<div class="row">
								<select class="form-control-lg select2" name='8'>
                                     <?
										
										
										echo(" <option name='' value='' selected>Песня</option> ");
										$i=1;
										while($i <= 151)
											{
												echo(" <option value='Песня ".$i."'> Песня ".$i."</option> ");
												$i++;
											}
									?>	
                                </select>
                            </div>
									</th>

                            </tr>
                           


                            <tr><th bgcolor='#0070c1'  colspan='3'  ><font size='2' color='#FFFFFF' face='Arial'><strong>ИЗУЧЕНИЕ &laquo;СТОРАЖЕВОЙ БАШНИ&raquo;</strong></font></th></tr>
                           
                           
							
							
							 
                            
							 <tr>
                                <td colspan='1' align='right'><font size='2'  face='Arial'><strong>Чтец</strong></font></td>
                                <th colspan='2'><div class="row">
                                        
                                            <select class="form-control-lg select2" name='45'>
                                                <?
										


	$ref_arr=mysql_query("SELECT `id`,`name` FROM `users`  WHERE  `rid`='".$user_arr['rid']."' AND `gender`='1' ORDER BY `name` ASC ");
		if(mysql_num_rows($ref_arr)=="0") {
										echo(" <option value='' selected>-----</option> ");
										}
										echo(" <option value='' selected>-----</option> ");
										

			while($row=mysql_fetch_array($ref_arr))
				{
					echo(" <option value='".$row[1]."'>".$row[1]."</option> ");
				}
?>
                                            </select>
                                        
                                    </div></th>

                            </tr>
                            <tr>
                                <th  colspan='3'><div class="row">
								<select class="form-control-lg select2" name='46'>
                                     <?
										
										
										echo(" <option value='' selected>Песня</option> ");
										$i=1;
										while($i <= 151)
											{
												echo(" <option value='Песня ".$i."'>Песня ".$i."</option> ");
												$i++;
											}
									?>	
                                </select>
                            </div>
									</th>

                            </tr>
                            <tr>
                                <td colspan='1' align='right'><font size='2'  face='Arial'><strong>Молитва</strong></font></td>
                                <th colspan='2'><div class="row">
                                        
                                            <select class="form-control-lg select2" name='47'>
                                                <?
										


	$ref_arr=mysql_query("SELECT `id`,`name` FROM `users`  WHERE `st_sp` IN (1, 2)  AND `rid`='".$user_arr['rid']."' ORDER BY `name` ASC ");
		if(mysql_num_rows($ref_arr)=="0") {
										echo(" <option value='' selected>-----</option> ");
										}
										echo(" <option value='' selected>-----</option> ");
										

			while($row=mysql_fetch_array($ref_arr))
				{
					echo(" <option value='".$row[1]."'>".$row[1]."</option> ");
				}
?>
                                            </select>
                                        
                                    </div>
									
									</th>

                            </tr>
							 
							<tr>
                                <td colspan='1' ></td>
                               
                                <td colspan='2' align='right'>
									<input type='hidden' name='t' value='1' >
									<button type='submit' class='btn btn-primary'>Сохранить график</button>
									</td>

                            </tr>

	 </tbody>
						 </table>
						 	</form>
					 </div>
				 </div>
			 </div>
		 </div>


    </div>

</div>

<!-- Select2 JavaScript -->
    <script src="vendors/select2/dist/js/select2.full.min.js"></script>

    <script src="dist/js/select2-data.js"></script>
	
	
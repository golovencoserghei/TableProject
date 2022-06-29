<?php
if(!defined("AP")) exit("Доступ к файлу напрямую запрещен!");

if(auth===FALSE)
{
	header("location: /login.html");
}
require_once("template/head.php");

if (count($post_array) != 0){
	if($post_array['nweak']!='' and $post_array['t']==1){
		
		
		$par_arr=explode("|",$post_array['nweak']);
		
		$sel_weak=$par_arr[0];
		$sel_year=$par_arr[1];
		
		
		
		$snd = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM `tb_grafic` WHERE `nwk`='".$sel_weak."' AND `year`='".$sel_year."' AND `cgr`='".$user_arr['rid']."' "));
		if($snd[0]!=0){
		$grafic = mysql_fetch_array(mysql_query("SELECT * FROM `tb_grafic` WHERE `nwk`='".$sel_weak."' AND `year`='".$sel_year."' AND `cgr`='".$user_arr['rid']."' "));
		$grafic_de=unserialize($grafic['grafic']);
		}
		else{
		msg("Графика эту неделю нет","wr");
	}
	}
	
	
	
	
}



if($sel_weak=='' or $sel_weak=='0'){
	$snd = mysql_fetch_array(mysql_query("SELECT * FROM `cfg_tb_date` WHERE `id`='1'"));
	$nweak = date("W", strtotime($snd[1]));
	$y=explode("-",$snd[1]);
	$grafic = mysql_fetch_array(mysql_query("SELECT * FROM `tb_grafic` WHERE `nwk`='".$nweak."' AND `year`='".$y[0]."' AND `cgr`='".$user_arr['rid']."' "));
	$grafic_de=unserialize($grafic['grafic']);
	$sel_weak=$nweak[1];
	$sel_year=$y[0];

}

	$getweak = stwdate($sel_weak, $sel_year);
	$work_day_congr = date('Y-n-d', strtotime($getweak['week_start']. ' + 2 days'));
	$wikend_congr = date('Y-m-d', strtotime($getweak['week_start']. ' + 5 days'));
	$m=explode("-",$work_day_congr);
	$work_day_congr = nmonth($m[1]);
	$work_day_congr = $work_day_congr.' '.$m[2];
nweak($i)
	?>


<style type="text/css">
   td {
   color: #000000; 
   } 
  </style>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
  
  <script type="text/javascript">

 
 
 function print() {
		const filename  = 'ThisIsYourPDFFilename.pdf';

		html2canvas(document.querySelector('#datable_3')).then(canvas => {
			let pdf = new jsPDF('p', 'mm', 'a4');
			pdf.addImage(canvas.toDataURL('image/jpeg'), 'JPG', 0, 0, 211, 298);
			pdf.save(filename);
		});
	}

// Variant
// This one lets you improve the PDF sharpness by scaling up the HTML node tree to render as an image before getting pasted on the PDF.
function print(quality = 1) {
		const filename  = 'ThisIsYourPDFFilename.pdf';

		html2canvas(document.querySelector('#datable_3'), 
								{scale: quality}
						 ).then(canvas => {
			let pdf = new jsPDF('p', 'mm', 'a4');
			pdf.addImage(canvas.toDataURL('image/jpeg'), 'JPG', 0, 0, 211, 298);
			pdf.save(filename);
		});
	}
    </script>
    


	<div class='card'>
	 							<div class='card-body pa-0'>
	 								<div class='table-wrap'>
	 									<div class='table-responsive'>




									
<button   onclick="print()" class="btn btn-secondary buttons-pdf buttons-html5 btn-outline-light btn-sm" ><span>PDF</span></button>									
<table id='datable_3' class='table table-hover w-100 display'>

        <tbody>

<tr>
                            <td colspan='2'  class='not-sortable'><font   size='5'  face='Arial'><strong> Расписание встречи</strong></font></td>
							<td colspan='1' align='right'><a class='nav-link' href='schedule.html&sub=create'><i class='fa fa-list-ul'></i></a></td>
							  
							  
							  
                             
                            </tr>


                            <tr>
                                <td colspan='2' bgcolor='#eeece1'   class='not-sortable'><font size='3'  face='Arial'><strong><? echo $work_day_congr; ?> СРЕДА 18:30</strong></font></td>
								<th bgcolor='#eeece1'  colspan='1' class='not-sortable'>
								  <form action=''  method='POST' name='form1'>
								  <input type='hidden' name='t' value='1' >
								<select  name='nweak' onchange="this.form.submit()"> 
                                     <?
										
										echo(" <option  value=''>-----</option> ");
										$snd = mysql_fetch_array(mysql_query("SELECT * FROM `cfg_tb_date` WHERE `id`='1'"));
										$dat=date("Y-m-d");
										
										
										$nweak = date("W", strtotime($snd[1]));
										$y=explode("-",$snd[1]);
										$getweak = stwdate($nweak, $y[0]);
										if($sel_weak==''){ 
										$sel = 'selected';
										}
										else{
											$sel = '';
										}
										echo(" <option  value='".$nweak."|".$y[0]."' ".$sel.">".$getweak ['week_start']." &mdash; ".$getweak['week_end']."</option> ");
										
										
										
										
										while($x++<6){
											
										$nex_w1 = date('Y-m-d', strtotime($snd[1]. ' + 7 days'));
										$nweak_n1 = date("W", strtotime($nex_w1));
										$y=explode("-",$nex_w1);
										$getweak = stwdate($nweak_n1, $y[0]);
										
										if($sel_weak==$nweak_n1){ 
										$sel = 'selected';
										}
										else{
											$sel = '';
										}
											
										echo("<option value='".$nweak_n1."|".$y[0]."' ". $sel.">".$getweak ['week_start']." &mdash; ".$getweak['week_end']."</option> ");
											
										$snd[1]=$nex_w1;	
											
										}
										
										
										
										
										
										
										
									?>		
                                </select>
								  </form>
                            </th>

                            </tr>
                            <tr>
                                <td colspan='3' bgcolor='#eeece1'   class='not-sortable'><font size='3'  face='Arial'><strong>Уборка в Зале Царства - <? echo $grafic_de[0]; ?></strong></font></td>

                            </tr>




                            <tr>
                                <td  colspan='1' align='right'><font size='3'  face='Arial' ><strong>Председатель</strong></font></td>
                                <td  colspan='2' class='not-sortable'><font size='3'  face='Arial'><strong><? echo $grafic_de[1]; ?></strong></font></td>

                            </tr>

                            <tr>

                                <td colspan='1' align='right'><font size='3'  face='Arial'><strong>Расорядитель</strong></font></td>
                                <td colspan='2' class='not-sortable'><font size='3'  face='Arial'><strong><? echo $grafic_de[2]; ?></strong></font></td>
                                
                            </tr>
                            <tr>
                                <td colspan='1' align='right'><font size='3'  face='Arial'><strong>Аппаратура</strong></font></td>
                                <td colspan='2' class='not-sortable'><font size='3'  face='Arial'><strong><? echo $grafic_de[3]; ?></strong></font></td>
                                
                            </tr>
                            <tr>
                                <td colspan='1' align='right'><font size='3'  face='Arial'><strong>Сцена</strong></font></td>
                                <td colspan='2' class='not-sortable'><font size='3'  face='Arial'><strong><? echo $grafic_de[4]; ?></strong></font></td>
                                
                            </tr>
                            <tr>
                                <td colspan='1' align='right'><font size='3'  face='Arial'><strong>Микрофон 1</strong></font></td>
                                <td colspan='2' class='not-sortable'><font size='3'  face='Arial'><strong><? echo $grafic_de[5]; ?></strong></font></td>
                               
                            </tr>
                            <tr>
                                <td colspan='1' align='right'><font size='3'  face='Arial'><strong>Микрофон 2</strong></font></td>
                                <td colspan='2' class='not-sortable'><font size='3'  face='Arial'><strong><? echo $grafic_de[6]; ?></strong></font></td>
                                
                            </tr>


                            <tr>
							<td bgcolor='#4a4529'  colspan='3' class='not-sortable'><font size='3' color='#FFFFFF' face='Arial'><strong>СОКРОВИЩЕ ИЗ СЛОВА БОГА</strong></font></td>
							</tr>

                            <tr>
                                <td colspan='3' class='not-sortable'><font size='3'  face='Arial'><strong><? echo $grafic_de[7]; ?></strong></font></td>

                            </tr>
                            <tr>
                                <td colspan='1' align='right'><font size='3'  face='Arial'><strong>(Речь 10 мин)</strong></font></td>
                                <td colspan='2'><font size='3'  face='Arial'><strong><? echo $grafic_de[8]; ?></strong></font></td>
                                
                            </tr>

                            <tr>
                                <td colspan='1' align='right'><font size='3'  face='Arial'><strong>Духовные Жемчужины (8 мин)</strong></font></td>
                                <td colspan='2'><font size='3'  face='Arial'><strong><? echo $grafic_de[9]; ?></strong></font></td>
                                
                            </tr>
                            <tr>
                                <td colspan='1' align='right'><font size='3'  face='Arial'><strong>Чтение Библии (4 мин)</strong></font></td>
                                <td colspan='2'><font size='3'  face='Arial'><strong><? echo $grafic_de[10]; ?></strong></font></td>
                                 
                            </tr>

                            <tr><td bgcolor='#c09200'  colspan='3'  ><font size='3' color='#FFFFFF' face='Arial'><strong>ОТТАЧИВАЕМ НАВЫКИ СЛУЖЕНИЯ </strong></font></td></tr>

							<tr>
                                <td colspan='3'><font size='3'  face='Arial'><strong>Главный зал</strong></font></td>
                                
                            </tr>
<? 
if($grafic_de[11]!='' and $grafic_de[12]!=''){
?>
                            <tr>
                                <td colspan='1' align='right'><font size='3'  face='Arial'><strong><? echo $grafic_de[11]; ?></strong></font></td>
                                <td colspan='2'><font size='3'  face='Arial'><strong><? echo $grafic_de[12]; ?></strong></font></td>

                            </tr>
<?
}
?>

<? 
if($grafic_de[13]!='' and $grafic_de[14]!=''){
?>
                            <tr>
                                <td colspan='1' align='right'><font size='3'  face='Arial'><strong><? echo $grafic_de[13]; ?></strong></font></td>
                                <td colspan='1'><font size='3'  face='Arial'><strong><? echo $grafic_de[14]; ?></strong></font></td>
								<td colspan='1'><font size='3'  face='Arial'><strong><? echo $grafic_de[15]; ?></strong></font></td>

                            </tr>
<?
}
?>

<? 
if($grafic_de[16]!='' and $grafic_de[17]!=''){
?>
                            <tr>
                                <td colspan='1' align='right'><font size='3'  face='Arial'><strong><? echo $grafic_de[16]; ?></strong></font></td>
                                <td colspan='1'><font size='3'  face='Arial'><strong><? echo $grafic_de[17]; ?></strong></font></td>
								<td colspan='1'><font size='3'  face='Arial'><strong><? echo $grafic_de[18]; ?></strong></font></td>

                            </tr>
<?
}
?>

<? 
if($grafic_de[19]!='' and $grafic_de[20]!=''){
?>
                            <tr>
                                <td colspan='1' align='right'><font size='3'  face='Arial'><strong><? echo $grafic_de[19]; ?></strong></font></td>
                                <td colspan='1'><font size='3'  face='Arial'><strong><? echo $grafic_de[20]; ?></strong></font></td>
								<td colspan='1'><font size='3'  face='Arial'><strong><? echo $grafic_de[21]; ?></strong></font></td>

                            </tr>
<?
}
?>

<? 
if($grafic_de[22]!='' and $grafic_de[23]!=''){
?>
                            <tr>
                                <td colspan='1' align='right'><font size='3'  face='Arial'><strong><? echo $grafic_de[22]; ?></strong></font></td>
                                <td colspan='2'><font size='3'  face='Arial'><strong><? echo $grafic_de[23]; ?></strong></font></td>
								

                            </tr>
<?
}
?>
    
                           

                            <tr>
                                <td colspan='1'><font size='3'  face='Arial'><strong>Второй класс</strong></font></td>
                                <td colspan='2'><font size='3'  face='Arial'><strong><? echo $grafic_de[24]; ?></strong></font></td>
                            </tr>
							
							
							
							<? 
if($grafic_de[25]!=''){
?>
                            <tr>
							  <td colspan='1' align='right'><font size='3'  face='Arial'><strong>Чтение Библии</strong></font></td>
                                <td colspan='2'><font size='3'  face='Arial'><strong><? echo $grafic_de[25]; ?></strong></font></td>
                               
                            </tr>
<?
}
?>

<? 
if($grafic_de[26]!='' and $grafic_de[27]!=''){
?>
                            <tr>
                                <td colspan='1' align='right'><font size='3'  face='Arial'><strong><? echo $grafic_de[26]; ?></strong></font></td>
                                <td colspan='2'><font size='3'  face='Arial'><strong><? echo $grafic_de[27]; ?></strong></font></td>
                            </tr>
<?
}
?>

<? 
if($grafic_de[28]!='' and $grafic_de[29]!=''){
?>
                            <tr>
                                <td colspan='1' align='right'><font size='3'  face='Arial'><strong><? echo $grafic_de[28]; ?></strong></font></td>
                                <td colspan='1'><font size='3'  face='Arial'><strong><? echo $grafic_de[29]; ?></strong></font></td>
								<td colspan='1'><font size='3'  face='Arial'><strong><? echo $grafic_de[30]; ?></strong></font></td>

                            </tr>
<?
}
?>

<? 
if($grafic_de[31]!='' and $grafic_de[32]!=''){
?>
                            <tr>
                                <td colspan='1' align='right'><font size='3'  face='Arial'><strong><? echo $grafic_de[31]; ?></strong></font></td>
                                <td colspan='1'><font size='3'  face='Arial'><strong><? echo $grafic_de[32]; ?></strong></font></td>
								<td colspan='1'><font size='3'  face='Arial'><strong><? echo $grafic_de[33]; ?></strong></font></td>

                            </tr>
<?
}
?>
<? 
if($grafic_de[34]!='' and $grafic_de[35]!=''){
?>
                            <tr>
                                <td colspan='1' align='right'><font size='3'  face='Arial'><strong><? echo $grafic_de[34]; ?></strong></font></td>
                                <td colspan='1'><font size='3'  face='Arial'><strong><? echo $grafic_de[35]; ?></strong></font></td>
								<td colspan='1'><font size='3'  face='Arial'><strong><? echo $grafic_de[36]; ?></strong></font></td>

                            </tr>
<?
}
?>

<? 
if($grafic_de[37]!='' and $grafic_de[38]!=''){
?>
                            <tr>
                                <td colspan='1' align='right'><font size='3'  face='Arial'><strong><? echo $grafic_de[37]; ?></strong></font></td>
                                <td colspan='2'><font size='3'  face='Arial'><strong><? echo $grafic_de[38]; ?></strong></font></td>
								

                            </tr>
<?
}
?>
                            <tr><td bgcolor='#943734'  colspan='3'  ><font size='3' color='#FFFFFF' face='Arial'><strong>ХРИСТИАНСКАЯ ЖИЗНЬ</strong></font></td></tr>
                            <tr>
                                <td  colspan='3'><font size='3'  face='Arial'><strong><? echo $grafic_de[39]; ?></strong></font></td>

                            </tr>
                            <tr>
                                <td colspan='1' align='right'><font size='3'  face='Arial'><strong>Речь (15 мин)</strong></font></td>
                                <td colspan='2'><font size='3'  face='Arial'><strong><? echo $grafic_de[40]; ?></strong></font></td>

                            </tr>
<?
							if($grafic_de[41]!='' and $grafic_de[42]!=''){
?>
                            <tr>
                                <td colspan='1' align='right'><font size='3'  face='Arial'><strong><? echo $grafic_de[41]; ?></strong></font></td>
                                <td colspan='2'><font size='3'  face='Arial'><strong><? echo $grafic_de[42]; ?></strong></font></td>
								

                            </tr>
<?
}
?>
							
                            <tr>
                                <td colspan='1' align='right'><font size='3'  face='Arial'><strong>Изучение Библии</strong></font></td>
                                <td colspan='2'><font size='3'  face='Arial'><strong><? echo $grafic_de[43]; ?></strong></font></td>

                            </tr>
							<tr>
                                <td colspan='1' align='right'><font size='3'  face='Arial'><strong>Чтец</strong></font></td>
                                <td colspan='2'><font size='3'  face='Arial'><strong><? echo $grafic_de[44]; ?></strong></font></td>

                            </tr>
                            <tr>
                                <td  colspan='3'><font size='3'  face='Arial'><strong><? echo $grafic_de[45]; ?></strong></font></td>

                            </tr>
                            <tr>
                                <td colspan='1' align='right'><font size='3'  face='Arial'><strong>Молитва</strong></font></td>
                                <td colspan='2'><font size='3'  face='Arial'><strong><? echo $grafic_de[46]; ?></strong></font></td>

                            </tr>







	 </tbody>
</table>
			  </div>
                                </div>
                            </div>
                            </div>
                       
		


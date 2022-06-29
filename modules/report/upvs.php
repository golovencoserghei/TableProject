<?

if(!defined("AP")) exit("Доступ к файлу напрямую запрещен!");

if(auth===FALSE)
{
	header("location: /login.html");
}


    require_once("template/head.php");

echo $get_array['ctb'];

$dprf='rp_sep';
$tb_name_cr=$dprf.'_20';


if ($get_array['ctb']=='1'){
	
	
	
  	$newlisttable=mysql_query("CREATE TABLE `".$tb_name_cr."` (
  `id` int(11) NOT NULL,
  `r_type` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `cgr_in` int(11) NOT NULL,
  `pp_op` int(11) NOT NULL,
  `tm` int(11) NOT NULL,
  `pb` int(11) NOT NULL,
  `vd` int(11) NOT NULL,
  `pp` int(11) NOT NULL,
  `iz` int(11) NOT NULL,
  `inf` text NOT NULL,
  `name` text NOT NULL,
  `idgr` int(11) NOT NULL,
  `pgrid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251");
  	$tb_PRIMARY=mysql_query("ALTER TABLE `".$tb_name_cr."` ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`)");
  	$tb_PRIMARY=mysql_query("ALTER TABLE `".$tb_name_cr."` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0");


}
	
	
	
if ($get_array['pr']=='it'){
$i='sep';
$ref_arr=mysql_query("SELECT * FROM `tb_raport` WHERE `year`='2020'");
while($roww=mysql_fetch_array($ref_arr)){
//$rap=mysql_fetch_array(mysql_query("SELECT `sep`,`oct`,`nov`,`dec`,`jan`,`feb`,`mart`,`aptil`,`mai`,`iumi`,`iul`,`aug` FROM `tb_raport` WHERE `uid`='".$user."' and `year`='".$year."'"));
					
$one=explode("|",$roww[$i]);					
$dp_inf=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$roww['uid']."'"));

$seldp_inf=mysql_fetch_array(mysql_query("SELECT * FROM `".$tb_name_cr."` WHERE `id`='".$roww['uid']."'"));



if($seldp_inf['id']>1){
	
	echo '<p> -----Существует отчет '.$dp_inf['name'].'';
}
	else{
		
	
	
$str = serialize($roww);


					
$insert=mysql_query("INSERT INTO `".$tb_name_cr."` VALUES (NULL,
															'0',
															'".$roww['uid']."',
															'".$dp_inf['rid']."',
															'0',
															'".$one[6]."',
															'".$one[2]."',
															'".$one[0]."',
															'".$one[1]."',
															'".$one[3]."',
															'".$one[4]."',
															'".$one[5]."',
															'".$dp_inf['name']."',
															'0',
															'0'
															)");



echo $str;
echo '<p>@@@ НОВАЯ ЗАПИСЬ '.$dp_inf['name'].' ';
}
}


}





	
if ($get_array['grp']=='s'){
$dprf='rp_sep';
$tb_name_cr=$dprf.'_20';

$ref_arr=mysql_query("SELECT * FROM `".$tb_name_cr."`");
while($roww=mysql_fetch_array($ref_arr)){					
$i++;				
$gr_inf=mysql_fetch_array(mysql_query("SELECT * FROM `tb_group` WHERE `uid`='".$roww['uid']."'")); //получаем номер группы к оторой относится возв.

$pgrp=mysql_fetch_array(mysql_query("SELECT * FROM `tb_group` WHERE `gid`='".$gr_inf['gid']."' and `prim`='".$gr_inf['gid']."'")); //Определяем ответственного группы

$activ=mysql_query("UPDATE `".$tb_name_cr."` SET `idgr`='".$gr_inf['gid']."', `pgrid`='".$pgrp['uid']."' WHERE `uid`='".$roww['uid']."'");// обновляем данные 


$vzg =mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$roww['uid']."'"));

$otg=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$pgrp['uid']."'")); 

echo '<p> '.$i.' ---n--Возвещателю  '.$vzg['name'].' присвоена группа '.$gr_inf['gid'].' ответственный '.$otg['name'].'';
}
}







?>
<?
@error_reporting(E_ALL, ~E_NOTICE);
ob_start();
session_start();
ini_set("allow_url_include","Off");
ini_set("allow_url_fopen","Off");
ini_set("register_globals","Off");
ini_set("safe_mode","On");

// Подгрузка ядра
require_once("config.php");
require_once(SOURCE_DIR."/config_db.php");
require_once(SOURCE_DIR."/init_db.php");
require_once(SOURCE_DIR."/init_source.php");

$idday=strftime("%w", strtotime($date));

$md=date("j");//День месяца без ведущего нуля от 1 до 31
$mn=date("n");//Порядковый номер месяца без ведущего нуля от 1 до 12
$year=date("Y");//Порядковый номер года, 4 цифры Примеры: 1999, 2003


if ($idday==1){





		$snd = mysql_fetch_array(mysql_query("SELECT * FROM `cfg_tb_date` WHERE `id`='1'"));
		$fnextweek = date('Y-m-d', strtotime($snd[4]. ' + 1 days'));
		$lnextweek = date('Y-m-d', strtotime($snd[4]. ' + 7 days'));
		$insert = mysql_query("UPDATE `cfg_tb_date` SET `f_tweak`='".$snd[3]."',
													 `l_tweak`='".$snd[4]."',
												 	 `f_nweak`='".$fnextweek."',
													 `l_nweak`='".$lnextweek."'  WHERE `id`=1 ");

          }
		  
if ($idday==1){

                           $ref_arr=mysql_query("SELECT `next_table_activ`,`id` FROM `tb_congr` ");
                         		while($row=mysql_fetch_array($ref_arr)){

                         			if ($row[0]==1){
                         				$insert=mysql_query("UPDATE `tb_congr` SET `next_table_activ`=0 WHERE `id`='".$row[1]."'");
                         		}
                         	}
}


 // каждый понидельник вносит в таблицу новую неделю

if ($idday==1){




 //вносит в таблицу новую неделю
	while($x++<10){
		$row=mysql_fetch_array(mysql_query("SELECT `id`,`date` FROM `tb_date` ORDER BY `id` desc"))	;
		$ndata=date('Y-m-d', strtotime($row[1]. ' + 1 days'));
		$idday=strftime("%w", strtotime($ndata));
		$addlog=mysql_query("INSERT INTO `tb_date` VALUES (NULL,'".$ndata."','".$idday."')");
		$i++;
		if ($i==7) break;
	}

////////////////////////////////////////////////////////




////смещение на одну неделю каждый понидельник////

	$ref_arr=mysql_query("SELECT * FROM `tb_congr` ");
		while($row=mysql_fetch_array($ref_arr)){
			$fnextweek=date('Y-m-d', strtotime($row[19]. ' + 1 days'));
			$lnextweek=date('Y-m-d', strtotime($row[19]. ' + 7 days'));
			$insert=mysql_query("UPDATE `tb_congr` SET 	`next_table_activ`=0,
														`fdate_this`='".$row[18]."',
														`ldate_this`='".$row[19]."',
														`fday_week_next`='".$fnextweek."',
														`lday_week_next`='".$lnextweek."' WHERE `id`='".$row[0]."'");
		}





}



///в конце августа долженсоздать новые записи для таблицы отчета


if (count($get_array['ct']) != 0){ 


   $get_for_user=mysql_query("SELECT * FROM `users` WHERE `rid`='".$user_arr[6]."'");
   $numrow=mysql_num_rows($get_for_user);
   echo 'fgsdfgd'.$numrow;
   
   

   while($row=mysql_fetch_array($get_for_user))
        {
			$lyear=$get_array['ct'];
			$rap_num=mysql_query("SELECT * FROM `tb_raport`  WHERE `uid`='".$row[0]."' and `year`='".$lyear."'");
			$numrow=mysql_num_rows($rap_num);
			
			if($numrow==0){
          $add_raport=mysql_query("INSERT INTO `tb_raport`  VALUES (NULL,'".$row[0]."','".$row[6]."',
																	'0|0|0|0|0||0|0','0|0|0|0|0||0|0','0|0|0|0|0||0|0','0|0|0|0|0||0|0','0|0|0|0|0||0|0','0|0|0|0|0||0|0',
																	'0|0|0|0|0||0|0','0|0|0|0|0||0|0','0|0|0|0|0||0|0','0|0|0|0|0||0|0','0|0|0|0|0||0|0','0|0|0|0|0||0|0','".$lyear."','0')");
			}

        }
      
}

//////////////////////////







$t=0;
//ПРОВЕРККА КАЖДЫЙ ДЕНЬ, активация графиков следующей недели
if($t==0){
	$ref_arr=mysql_query("SELECT `wid_day`,`id` FROM `tb_congr` ");
		while($row=mysql_fetch_array($ref_arr)){
			$idday=strftime("%w", strtotime($date));
			if ($idday==$row[0]){
				$insert=mysql_query("UPDATE `tb_congr` SET `next_table_activ`=1 WHERE `id`='".$row[1]."'");
			}
		}
	}
///////////////////////end///////////////////////////////





//+++++++++++++++++++++++++++UPDATE v2.0 ++++++++++++++++++++++++++++++++//

if($md==6){
	$mnt_arr[1]='jan';
	$mnt_arr[2]='feb';
	$mnt_arr[3]='mart';
	$mnt_arr[4]='aptil';
	$mnt_arr[5]='mai';
	$mnt_arr[6]='iumi';
	$mnt_arr[7]='iul';
	$mnt_arr[8]='aug';
	$mnt_arr[9]='sep';
	$mnt_arr[10]='oct';
	$mnt_arr[11]='nov';
	$mnt_arr[12]='dec';
	echo $mn.'<p>';
	$ref_arr=mysql_query("SELECT `id`,`pp_p` FROM `users` ");
	
	
	while($row=mysql_fetch_array($ref_arr)){
		//echo $row[0].'<p>';
		
		
		$r_stat=mysql_fetch_array(mysql_query("SELECT `id`,`jan`,`feb`,`mart`,`aptil`,`mai`,`iumi`,`iul`,`aug`,`sep`,`oct`,`nov`,`dec` FROM `tb_raport` WHERE `uid`='".$row[0]."' and `year`='".$year."'"));
		//echo $r_stat[1].'<p>';
		$one=explode("|",$r_stat[$mn]);
		
		$s_edit=$one[0].'|'.$one[1].'|'.$one[2].'|'.$one[3].'|'.$one[4].'|'.$one[5].'|'.$row[1];
		
		echo $row[0].'-'.$s_edit.'<p>';
		
		$insert=mysql_query("UPDATE `tb_raport` SET `".$mnt_arr[$mn]."`='".$s_edit."' WHERE `uid`='".$row[0]."' and `year`='".$year."' ");
	}
	
	
	
	
	
	
}





//////////////////////////////////////////////////////////




?>

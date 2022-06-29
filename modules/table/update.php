<?

if($get_array['p']!=""){

  $up_dat=mysql_fetch_array(mysql_query("SELECT * FROM `tb_congr` WHERE `pref`='".dateprotect($get_array['p'])."' LIMIT 1"));




	$insert=mysql_query("UPDATE `tb_stands` SET `tid`=   '".$up_dat[0]."' WHERE `pref`='".dateprotect($get_array['p'])."'");
	$insert=mysql_query("UPDATE `tb_stands` SET `actual`='".$up_dat[22]."' WHERE `pref`='".dateprotect($get_array['p'])."'");

header("location: /table.html");




}

if($get_array['c']!=""){

  $up_dat=mysql_fetch_array(mysql_query("SELECT * FROM `tb_congr` WHERE `pref`='".dateprotect($get_array['c'])."' LIMIT 1"));
  //$insert=mysql_query("UPDATE `tb_stands` SET `tid`='".$up_dat[0]."' WHERE `pref`='".dateprotect($get_array['с'])."'");

  $insert=mysql_query("UPDATE `users` SET `rid`='".$up_dat[0]."' WHERE `id`='".$user_arr[0]."'");

header("location: /table.html");




}

?>

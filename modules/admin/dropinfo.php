<?


if($get_array['t']=='ss'){
$sid = dateprotect($get_array['id']);
$insert_query=mysql_query("DELETE FROM `us_session` WHERE `id`='".(int)$sid."'");
header("location: /admin.html&sub=sess");
}

elseif($get_array['t']=='hh'){
$sid = dateprotect($get_array['id']);
$insert_query=mysql_query("DELETE FROM `us_login` WHERE `id`='".(int)$sid."'");
header("location: /admin.html&sub=login");
}















?>
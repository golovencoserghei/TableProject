<?
if(!defined("AP")) exit("Доступ к файлу напрямую запрещен!");

if(auth===FALSE or $user_arr[4]==0)
{
	header("location: /login.html");
}





if ($get_array['lock']!=''){
	
	$prof=mysql_fetch_array(mysql_query("SELECT `prof_lock` FROM `users` WHERE `id`='".$get_array['lock']."'"));
  
  if($prof[0] == 0){
	
		$unlock_user=mysql_query("UPDATE `users` SET `prof_lock`='1' WHERE `id`='".$get_array['lock']."'");  
  }
  elseif($prof[0] == 1){
	
		$unlock_user=mysql_query("UPDATE `users` SET `prof_lock`='0' WHERE `id`='".$get_array['lock']."'");  
  }
  header("location: /member.html");
  
	}
	
	
	
	
	
	
	
	
	?>
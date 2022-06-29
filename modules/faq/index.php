<?php
if(!defined("AP")) exit("Доступ к файлу напрямую запрещен!");

echo("<title>Часто задаваемые вопросы : ".$params_array[0]."</title>");

echo strtotime($date);

echo "<br>";

echo $_SESSION['live'];
 $time_live=$_SESSION['live']+400;




if($time_live < strtotime($date)){
	echo "<br>";
	echo "время вышло";
	echo "<br>";
}



$arr[]='name';
$arr[]='name1';
$arr[]='name2';
$arr[]='name3';
$arr[]='name4';
$arr[]='name5';
$arr[]='name6';
	
unset($arr[0]);
$result='';
foreach($arr as $key => $value)
{
	$result="".$result.$value."|";	
	}
	if($result!='')
{
	$result=substr($result, 0, -1);
}
	echo $result;
	
	
$s_arr= explode("|",$result);
echo  $s_arr[3];
?>

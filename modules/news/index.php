<?php

if(!defined("AP")) exit("������ � ����� �������� ��������!");

// ����� title
echo("<title>�������: ".$params_array[0]."</title>");

echo("<h2>�������</h2><br>");

$site_arr=mysql_query("SELECT `descr`,`content` FROM `news` ORDER BY `id` DESC");
	if(mysql_num_rows($site_arr)=="0")
	echo("
	<tr>
		<td colspan='3'>�������� ���.</td>
	</tr>");
	while($row=mysql_fetch_array($site_arr))
	{
		echo("<font color='#009cff'>".$row[0]."</font> <br> ".$row[1]." <br><br>");
	}
	echo("");
	unset($row,$site_arr);

echo("<br><br>");
?>


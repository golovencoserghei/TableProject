<?php
if(!defined("AP")) exit("������ � ����� �������� ��������!");
unset($_COOKIE['prt']);
unset($_COOKIE['tbl']);
unset($_COOKIE['nid']);
$_SESSION['uid'] = "";
$_SESSION['uip'] = "";
header("location: /index.php");
?>

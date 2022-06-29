<?php
if(!defined("AP")) exit("Доступ к файлу напрямую запрещен!");
unset($_COOKIE['prt']);
unset($_COOKIE['tbl']);
unset($_COOKIE['nid']);
$_SESSION['uid'] = "";
$_SESSION['uip'] = "";
header("location: /index.php");
?>

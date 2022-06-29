<!DOCTYPE html>
<html dir="ltr" lang="ru" class="no-outlines">
<head>

    <meta charset="UTF-8">
	<meta name="robots" content="noindex, nofollow"/>
	<meta name="robots" content="none"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>TABLE</title>
	<meta name="theme-color" content="#f4f6f7"/>
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="#f4f6f7">
	<meta name="apple-mobile-web-app-title" content="Проект">
	<link rel="apple-touch-icon" href="img/apple-touch-icon.png">
	<meta name="msapplication-TileImage" content="img/512.png">
	<meta name="msapplication-TileColor" content="#FFFFFF">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="msapplication-starturl" content="/">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/favicon.png" type="image/png">
    <link href="vendors/lightgallery/dist/css/lightgallery.min.css" rel="stylesheet" type="text/css">
    <link href="vendors/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
    <link href="dist/css/style.css" rel="stylesheet" type="text/css">
	
	<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css" rel="stylesheet"/>
	<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/js/jquery-editable-poshytip.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="manifest" href="manifest.json">
	

	<script>


	var stillAlive = setInterval(function () {
    $.get("activ.php");
}, 60000);

</script>

<? 
$fspage=explode(".", $_SERVER['REQUEST_URI'] );
$spage = substr($fspage[0], 1);
 

?>

<script>
   $.fn.editable.defaults.mode = 'popup';
        $(document).ready(function() {
            $('.people-editable').editable();
        });
	
</script>



</head>
<body>


<script>

if('serviceWorker' in navigator){
	
	navigator.serviceWorker.register('/sw.js').then(function(registration){
		console.log('service Worker reg OK:', registration);
	}).catch(function(error){
		console.log('service Worker reg failed:', error);
	});
} else{
	
	console.log('service Worker not support');
}


window.onload = function() {
 
};

	function notifyMe () {
		var notification = new Notification ("Проверка уведомлений", {
			tag : "ache-mail",
			body : "Проверкта",
			icon : "img/512.png"
		});
	}
	
	function notifSet () {
		if (!("Notification" in window))
			alert ("Ваш браузер не поддерживает уведомления.");
		else if (Notification.permission === "granted")
			setTimeout(notifyMe, 2000);
		else if (Notification.permission !== "denied") {
			Notification.requestPermission (function (permission) {
				if (!('permission' in Notification))
					Notification.permission = permission;
				if (permission === "granted")
					setTimeout(notifyMe, 2000);
			});
		}
	}
</script>

<?

if($get_array['offdeb']=="1")
{
	
	unset($_COOKIE['deb']); 
}

if($get_array['deb']=="1"){
		setcookie("deb", '1');
}
	


if($_COOKIE['deb']!="1")
{
	if($_SERVER['REQUEST_URI']!="/login.html"){
 ?>
		
  <div class="preloader-it">
        <div class="loader-pendulums"></div>
    </div>

<?}
}

	



	


if ($_COOKIE['lg']=='0'){
		setcookie("lg", 'ru');
}
    if(auth===FALSE)
    {
      echo "
		<div class='hk-wrapper'>
			<div class='hk-pg-wrapper hk-auth-wrapper'>
				";
    }
    else {

      echo "
      <div class='hk-wrapper hk-horizontal-nav'>
        ";

    }
?>

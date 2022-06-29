<?php
if(!defined("AP")) exit();




function dateprotect($_sText) {
	if (ini_get('magic_quotes_gpc')) $_sText = stripslashes($_sText);
	$search = array("\"", "'", "\\", '\"', "\'", "<", ">", "&nbsp;");
	$replace = array("&quot;", "&#39;", "&#92;", "&quot;", "&#39;", "&lt;", "&gt;", " ");
	$_sText = str_replace($search, $replace, $_sText);
	return $_sText;
}


// ini_set('display_errors', '0');

// IP пользователя ///////////////////////////////////////////////////
$user_agent = $_SERVER['HTTP_USER_AGENT'];

if(getenv("HTTP_CLIENT_IP"))
{
	$ip = getenv("HTTP_CLIENT_IP");
}
elseif(getenv("HTTP_X_FORWARDED_FOR"))
{
	$ip = getenv("HTTP_X_FORWARDED_FOR");
}
else
{
	$ip = getenv("REMOTE_ADDR");
}
$ip=mysql_real_escape_string($ip);

if($ip=="86.57.157.188") exit('Ошибка 502');

// GD :D //////////////////////////////////////////////////////////////
if(!function_exists("imagecreate")) exit("Необходима поддержка GD");

// Парсим настройки ///////////////////////////////////////////////////
$date=@date("d.m.Y H:i",time()+60*60*$params_array[2]);

// Проверка пользователя //////////////////////////////////////////////
if($_SESSION['uid']!="" AND $_SESSION['uip']==$ip)
{
	$user_arr=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$_SESSION['uid']."'"));
	if($user_arr[0]!=""){
		$_SESSION['aut']=true;
		$_SESSION['user']['login']=true;
		define("auth",true); 
	}
	else{ 
		$_SESSION['aut']=false;
		$_SESSION['user']['login']=false;
		define("auth",false);
	}
}
else {
	define("auth",false);
	$_SESSION['aut']=false;
}

// Фильтр POST,GET,COOKIES ////////////////////////////////////////////
$_GET=array_map('trim',$_GET);
$_POST=array_map('trim',$_POST);
$_COOKIE=array_map('trim',$_COOKIE);
if(get_magic_quotes_gpc())
{
	$_GET=array_map('stripslashes',$_GET);
	$_POST=array_map('stripslashes',$_POST);
	$_COOKIE=array_map('stripslashes',$_COOKIE);
}
foreach($_POST as $key => $value)
{
	$ppvalue=dateprotect($value);
	$post_array[$key]=mysql_real_escape_string($ppvalue);
}
foreach($_GET as $key => $value)
{	
	$pgvalue=dateprotect($value);
	$get_array[$key]=mysql_real_escape_string($pgvalue);
}
foreach($_COOKIE as $key => $value)
{
	$pcvalue=dateprotect($value);
	$cookie_array[$key]=mysql_real_escape_string($pcvalue);
}



// функция выдачи и проверка рпзрешения к разделам сайта /////////////////////////////////
function open_permis ($thear, $permis) {




}


///=========================================///

// Функция сообщения //////////////////////////////////////////////////


function msender ($tomail, $stream_link, $frommail, $sitename, $siteadres) {
	//заголовок указывает куда отвечать на письмо
	$headers = "Reply-To: $frommail\r\n";
	//версия mime
	$headers .= "MIME-Version: 1.0\r\n";
	if (preg_match("~^([a-z0-9_\-\.])+@([a-z0-9_\-\.])+\.([a-z0-9])+$~i", $tomail)) {
        $headers  .= "Content-type: text/html; charset=UTF-8 \r\n";
    } else {
        $headers  .= "Content-type: text/html; charset=windows-1251 \r\n";
    }
	//следует указать 8бит для русских символов
	$headers .= "Content-Transfer-Encoding: 8bit\r\n";
    $headers .= "From: <".$frommail."> \r\n";
    $subject = "Ссылка на Stream";
    $message = '
    <html>
    <head>
    <title>Ссылка на Stream STAND</title>
    <style type="text/css">
    html, body {
        margin:0;
        margin-left:5px;
        padding:0;
        font-size:14px;
    }
    p {
        margin:0;
        padding:3px;
    }
    </style>
    </head>
    <body>
    <p><b>Здравствуйте</b>.</p>
    <p>Ссылка была отправлена с сайта <b>https://' . $_SERVER["HTTP_HOST"] . '</b></p>
    <p>--------------------------------------------------------------------------</p>
    <p>Ссылка на стрим <a href="'.$stream_link.'">>>Перейти<<</a> </p>
    <p>--------------------------------------------------------------------------</p>
    <p>Или перейдите по данной ссылки: <b>' . $stream_link . '</b><br /></p>
    <p>--------------------------------------------------------------------------</p>
    <p><font color="#800000">Внимание!</font>Не передавайте это письмо 3-м лицам.</p>
    <p>Письмо отправлено автоматически. На него отвечать не нужно.</p>
    </body>
    </html>';
    mail($tomail, $subject, $message, $headers);
}


function pasrec ($tomail, $reg_pass, $frommail, $sitename, $siteadres) {
	//заголовок указывает куда отвечать на письмо
	$headers = "Reply-To: $frommail\r\n";
	//версия mime
	$headers .= "MIME-Version: 1.0\r\n";
	if (preg_match("~^([a-z0-9_\-\.])+@([a-z0-9_\-\.])+\.([a-z0-9])+$~i", $tomail)) {
        $headers  .= "Content-type: text/html; charset=UTF-8 \r\n";
    } else {
        $headers  .= "Content-type: text/html; charset=windows-1251 \r\n";
    }
	//следует указать 8бит для русских символов
	$headers .= "Content-Transfer-Encoding: 8bit\r\n";
    $headers .= "From: <".$frommail."> \r\n";
    $subject = "Востановление доступа STAND";
    $message = '
    <html>
    <head>
    <title>Востановление доступа STAND</title>
    <style type="text/css">
    html, body {
        margin:0;
        margin-left:5px;
        padding:0;
        font-size:14px;
    }
    p {
        margin:0;
        padding:3px;
    }
    </style>
    </head>
    <body>
    <p><b>Здравствуйте</b>.</p>
    <p>Новый пароль <b>http://' . $_SERVER["HTTP_HOST"] . '</b></p>
    <p>--------------------------------------------------------------------------</p>
    <p>Для входа на сайт используйте следующий пароль:</p>
    <p>--------------------------------------------------------------------------</p>
    пароль: <b>' . $reg_pass . '</b><br />
    <p>--------------------------------------------------------------------------</p>
    <p><font color="#800000">Внимание!</font>Не передавайте письмо 3-м лицам, запишите данные и удалите письмо, во избежания кражи Вашей личной информации...</p>
    <p>Письмо отправлено автоматически. На него отвечать не нужно.</p>
    </body>
    </html>';
    mail($tomail, $subject, $message, $headers);
}



function newreg ($tomail, $reg_pass, $frommail, $sitename, $siteadres) {
	//заголовок указывает куда отвечать на письмо
	$headers = "Reply-To: $frommail\r\n";
	//версия mime
	$headers .= "MIME-Version: 1.0\r\n";
	if (preg_match("~^([a-z0-9_\-\.])+@([a-z0-9_\-\.])+\.([a-z0-9])+$~i", $tomail)) {
        $headers  .= "Content-type: text/html; charset=UTF-8 \r\n";
    } else {
        $headers  .= "Content-type: text/html; charset=windows-1251 \r\n";
    }
	//следует указать 8бит для русских символов
		$headers .= "Content-Transfer-Encoding: 8bit\r\n";
    $headers .= "From: <".$frommail."> \r\n";
    $subject = "Регистрация STAND";
    $message = '
		<!DOCTYPE html>
		<html>
		<head>
		  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		  <meta name="Email Message" content="width=device-width, initial-scale=1" />
		  <title>STAND Message</title>

		  <style type="text/css">
		    /* Take care of image borders and formatting, client hacks */
		    img { max-width: 600px; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic;}
		    a img { border: none; }
		    table { border-collapse: collapse !important;}
		    #outlook a { padding:0; }
		    .ReadMsgBody { width: 100%; }
		    .ExternalClass { width: 100%; }
		    .backgroundTable { margin: 0 auto; padding: 0; width: 100% !important; }
		    table td { border-collapse: collapse; }
		    .ExternalClass * { line-height: 115%; }
		    .container-for-gmail-android { min-width: 600px; }


		    /* General styling */
		    * {
		      font-family: Helvetica, Arial, sans-serif;
		    }

		    body {
		      -webkit-font-smoothing: antialiased;
		      -webkit-text-size-adjust: none;
		      width: 100% !important;
		      margin: 0 !important;
		      height: 100%;
		      color: #676767;
		    }

		    td {
		      font-family: Helvetica, Arial, sans-serif;
		      font-size: 14px;
		      color: #777777;
		      text-align: center;
		      line-height: 21px;
		    }

		    a {
		      color: #676767;
		      text-decoration: none !important;
		    }

		    .pull-left {
		      text-align: left;
		    }

		    .pull-right {
		      text-align: right;
		    }

		    .header-lg,
		    .header-md,
		    .header-sm {
		      font-size: 32px;
		      font-weight: 700;
		      line-height: normal;
		      padding: 35px 0 0;
		      color: #4d4d4d;
		    }

		    .header-md {
		      font-size: 24px;
		    }

		    .header-sm {
		      padding: 5px 0;
		      font-size: 18px;
		      line-height: 1.3;
		    }

		    .content-padding {
		      padding: 20px 0 5px;
		    }

		    .mobile-header-padding-right {
		      width: 290px;
		      text-align: right;
		      padding-left: 10px;
		    }

		    .mobile-header-padding-left {
		      width: 290px;
		      text-align: left;
		      padding-left: 10px;
		    }

		    .free-text {
		      width: 100% !important;
		      padding: 10px 60px 0px;
		    }

		    .button {
		      padding: 30px 0;
		    }


		    .mini-block {
		      border: 1px solid #e5e5e5;
		      border-radius: 5px;
		      background-color: #ffffff;
		      padding: 12px 15px 15px;
		      text-align: left;
		      width: 253px;
		    }

		    .mini-container-left {
		      width: 278px;
		      padding: 10px 0 10px 15px;
		    }

		    .mini-container-right {
		      width: 278px;
		      padding: 10px 14px 10px 15px;
		    }

		    .product {
		      text-align: left;
		      vertical-align: top;
		      width: 175px;
		    }

		    .total-space {
		      padding-bottom: 8px;
		      display: inline-block;
		    }

		    .item-table {
		      padding: 50px 20px;
		      width: 560px;
		    }

		    .item {
		      width: 300px;
		    }

		    .mobile-hide-img {
		      text-align: left;
		      width: 125px;
		    }

		    .mobile-hide-img img {
		      border: 1px solid #e6e6e6;
		      border-radius: 4px;
		    }

		    .title-dark {
		      text-align: left;
		      border-bottom: 1px solid #cccccc;
		      color: #4d4d4d;
		      font-weight: 700;
		      padding-bottom: 5px;
		    }

		    .item-col {
		      padding-top: 20px;
		      text-align: left;
		      vertical-align: top;
		    }

		    .force-width-gmail {
		      min-width:600px;
		      height: 0px !important;
		      line-height: 1px !important;
		      font-size: 1px !important;
		    }

		  </style>



		  <style type="text/css" media="screen">
		    @media screen {
		      /* Thanks Outlook 2013! */
		      * {
		        font-family: "Oxygen", "Helvetica Neue", "Arial", "sans-serif" !important;
		      }
		    }
		  </style>

		  <style type="text/css" media="only screen and (max-width: 480px)">
		    /* Mobile styles */
		    @media only screen and (max-width: 480px) {

		      table[class*="container-for-gmail-android"] {
		        min-width: 290px !important;
		        width: 100% !important;
		      }

		      img[class="force-width-gmail"] {
		        display: none !important;
		        width: 0 !important;
		        height: 0 !important;
		      }

		      table[class="w320"] {
		        width: 320px !important;
		      }


		      td[class*="mobile-header-padding-left"] {
		        width: 160px !important;
		        padding-left: 0 !important;
		      }

		      td[class*="mobile-header-padding-right"] {
		        width: 160px !important;
		        padding-right: 0 !important;
		      }

		      td[class="header-lg"] {
		        font-size: 24px !important;
		        padding-bottom: 5px !important;
		      }

		      td[class="content-padding"] {
		        padding: 5px 0 5px !important;
		      }

		       td[class="button"] {
		        padding: 5px 5px 30px !important;
		      }

		      td[class*="free-text"] {
		        padding: 10px 18px 30px !important;
		      }

		      td[class~="mobile-hide-img"] {
		        display: none !important;
		        height: 0 !important;
		        width: 0 !important;
		        line-height: 0 !important;
		      }

		      td[class~="item"] {
		        width: 140px !important;
		        vertical-align: top !important;
		      }

		      td[class~="quantity"] {
		        width: 50px !important;
		      }

		      td[class~="price"] {
		        width: 90px !important;
		      }

		      td[class="item-table"] {
		        padding: 30px 20px !important;
		      }

		      td[class="mini-container-left"],
		      td[class="mini-container-right"] {
		        padding: 0 15px 15px !important;
		        display: block !important;
		        width: 290px !important;
		      }
		    }
		  </style>
		</head>

		<body bgcolor="#f7f7f7">
		<table align="center" cellpadding="0" cellspacing="0" class="container-for-gmail-android" width="100%">
		  <tr>
		    <td align="left" valign="top" width="100%" style="background:repeat-x url(https://infodata.ml/img/mail_bg.jpg) #ffffff;">
		      <center>
		        <table cellspacing="0" cellpadding="0" width="100%" bgcolor="#ffffff" background="https://infodata.ml/img/mail_bg.jpg" style="background-color:transparent">
		          <tr>
		            <td width="100%" height="80" valign="top" style="text-align: center; vertical-align:middle;">
		            <!--[if gte mso 9]>
		            <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="mso-width-percent:1000;height:80px; v-text-anchor:middle;">
		              <v:fill type="tile" src="http://s3.amazonaws.com/swu-filepicker/4E687TRe69Ld95IDWyEg_bg_top_02.jpg" color="#ffffff" />
		              <v:textbox inset="0,0,0,0">
		            <![endif]-->
		              <center>
		                <table cellpadding="0" cellspacing="0" width="600" class="w320">
		                  <tr>
		                    <td class="pull-left mobile-header-padding-left" style="vertical-align: middle;">
		                      <a href=""><img width="137" height="47" src="https://infodata.ml/img/slogo.png" alt="logo"></a>
		                    </td>

		                  </tr>
		                </table>
		              </center>
		              <!--[if gte mso 9]>
		              </v:textbox>
		            </v:rect>
		            <![endif]-->
		            </td>
		          </tr>
		        </table>
		      </center>
		    </td>
		  </tr>
		  <tr>
		    <td align="center" valign="top" width="100%" style="background-color: #f7f7f7;" class="content-padding">
		      <center>
		        <table cellspacing="0" cellpadding="0" width="600" class="w320">
		          <tr>
		            <td class="header-lg">
		              Регистрация
		            </td>
		          </tr>
		          <tr>
		            <td class="free-text">
		            Здравствуйте, это письмо вас уведомляет о том что региcтрация в таблице прошла успешно. Ниже указаны данные которые вы вводили на этапе регистрации.   <br />/====================================/  <br />
		            Вам не нужно отвечать на это письмо так как оно было отправлено автаматически.
		             </td>
		          </tr>
		          <tr>


		          </tr>
		          <tr>
		            <td class="w320">
		              <table cellpadding="0" cellspacing="0" width="100%">
		                <tr>
		                  <td class="mini-container-left">
		                    <table cellpadding="0" cellspacing="0" width="100%">
		                      <tr>
		                        <td class="mini-block-padding">
		                          <table cellspacing="0" cellpadding="0" width="100%" style="border-collapse:separate !important;">
		                            <tr>

		                              <tr>
		                                <td class="free-text">
		                                  <p><font color="#800000">Внимание! </font> Не передавайте письмо 3-м лицам, во избежания кражи Вашей личной информации.</p>

		                                 </td>
		                              </tr>

		                              <td class="mini-block">

		<center>

		                                <span class="header-sm">Данные для входа</span><br />   <br />


		                                Email : ' . $tomail . ' <br />
		                                 <br />
		                                Пароль : ' . $reg_pass . ' <br />
		                                   <br />


		</center>
		                              </td>

		                            </tr>


		                          </table>
		                        </td>
		                      </tr>
		                    </table>
		                  </td>

		                </tr>
		              </table>
		            </td>
		          </tr>
		        </table>

		</body>
		</html>';
    mail($tomail, $subject, $message, $headers);
}



function t_month() {
		
		$month[1]='ЯНВАРЬ';
		$month[2]='ФЕВРАЛЬ';
		$month[3]='МАРТ';
		$month[4]='АПРЕЛЬ';
		$month[5]='МАЙ';
		$month[6]='ИЮНЬ';
		$month[7]='ИЮЛЬ';
		$month[8]='АВГУСТ';
		$month[9]='СЕНТЯБРЬ';
		$month[10]='ОКТЯБРЬ';
		$month[11]='НОЯБРЬ';
		$month[12]='ДЕКАБРЬ';
	
	$mn=date("n");
	
	return $month[$mn];
}
function nmonth($i) {
		
		$month[1]='ЯНВАРЬ';
		$month[2]='ФЕВРАЛЬ';
		$month[3]='МАРТ';
		$month[4]='АПРЕЛЬ';
		$month[5]='МАЙ';
		$month[6]='ИЮНЬ';
		$month[7]='ИЮЛЬ';
		$month[8]='АВГУСТ';
		$month[9]='СЕНТЯБРЬ';
		$month[10]='ОКТЯБРЬ';
		$month[11]='НОЯБРЬ';
		$month[12]='ДЕКАБРЬ';
	

	return $month[$i];
}

function mt_base($i) {
		
		$month[0]=0;
		$month[1]='rp_jan';
		$month[2]='rp_feb';
		$month[3]='rp_mar';
		$month[4]='rp_apr';
		$month[5]='rp_mai';
		$month[6]='rp_iun';
		$month[7]='rp_iul';
		$month[8]='rp_avg';
		$month[9]='rp_sep';
		$month[10]='rp_oct';
		$month[11]='rp_nov';
		$month[12]='rp_dec';
	

	return $month[$i];
}

function rp_us_base($i) {
		
	
		$month[0]='rp_sep';
		$month[1]='rp_oct';
		$month[2]='rp_nov';
		$month[3]='rp_dec';
		$month[4]='rp_jan';
		$month[5]='rp_feb';
		$month[6]='rp_mar';
		$month[7]='rp_apr';
		$month[8]='rp_mai';
		$month[9]='rp_iun';
		$month[10]='rp_iul';
		$month[11]='rp_avg';
	

	return $month[$i];
}

function nweak($i) {
		
		$wk_n[1]='Подедельник';
		$wk_n[2]='Вторник';
		$wk_n[3]='Среда';
		$wk_n[4]='Четверг';
		$wk_n[5]='Пятница';
		$wk_n[6]='суббота';
		$wk_n[7]='Воскресенье';
		
	

	return $wk_n[$i];
}
function tnweak($i) {
		
		$wk_n[1]='подедельник';
		$wk_n[2]='вторник';
		$wk_n[3]='среду';
		$wk_n[4]='четверг';
		$wk_n[5]='пятницу';
		$wk_n[6]='субботу';
		$wk_n[0]='воскресенье';
		
	

	return $wk_n[$i];
}
function get_month($i) {
		
		$smonth[0]='СЕНТЯБРЬ';
		$smonth[1]='ОКТЯБРЬ';
		$smonth[2]='НОЯБРЬ';
		$smonth[3]='ДЕКАБРЬ';
		$smonth[4]='ЯНВАРЬ';
		$smonth[5]='ФЕВРАЛЬ';
		$smonth[6]='МАРТ';
		$smonth[7]='АПРЕЛЬ';
		$smonth[8]='МАЙ';
		$smonth[9]='ИЮНЬ';
		$smonth[10]='ИЮЛЬ';
		$smonth[11]='АВГУСТ';
	return $smonth[$i];
}

function getBrowser() {

    global $user_agent;

    $browser        = "Unknown Browser";

    $browser_array = array(
                            '/msie/i'      => 'Internet Explorer',
                            '/Firefox/i'   => 'Firefox',
                            '/Chrome/i'    => 'Chrome',
                            '/Edge/i'      => 'Edge',
                            '/Opera/i'     => 'Opera',
                            '/netscape/i'  => 'Netscape',
                            '/maxthon/i'   => 'Maxthon',
                            '/konqueror/i' => 'Konqueror',
                            '/mobile/i'    => 'Handheld Browser',
							'/Safari/i'    => 'Safari'
                     );

    foreach ($browser_array as $regex => $value)
        if (preg_match($regex, $user_agent))
            $browser = $value;

    return $browser;
}

function ngetOS($agent) {
	
	
	$ua=explode(' (', $agent);
	$ua1=explode(') ', $ua[1]);
	$ua2=explode(') ', $ua[2]);
	
	$os_get=explode('; ', $ua[0]);
	$cor_get=explode('; ', $ua2[1]);
							
	echo $ua[0].'<p>/<p>'.$ua1[0].'<p>/<p>'.$ua1[1].'<p>/<p>'.$ua2[0].'<p>/<p>'.$ua2[1].'<p>/<p>';
	
	}

function getOS($agent) {
  // Создадим список операционных систем в виде элементов массива
  
    $oses = array (
        '/iOS/i' => '(iPhone)',
		'/Android 9/i' => 'Android 9',
		'/Android 8/i' => 'Android 8',
		'/Android 7/i' => 'Android 7',
		'/Android 6/i' => 'Android 6',
		'/Android 5/i' => 'Android 5',
		'/Android 4/i' => 'Android 4',
        '/Windows 3.11/i' => 'Win16',
        '/Windows 95/i' => '(Windows 95)|(Win95)|(Windows_95)', // Используем регулярное выражение
        '/Windows 98/i' => '(Windows 98)|(Win98)',
        '/Windows 2000/i' => '(Windows NT 5.0)|(Windows 2000)',
        '/Windows XP/i' => '(Windows NT 5.1)|(Windows XP)',
        '/Windows 2003/i' => '(Windows NT 5.2)',
        '/Windows Vista/i' => '(Windows NT 6.0)|(Windows Vista)',
		'/Windows 7/i' => '(Windows NT 6.1)|(Windows 7)',
		'/Windows NT 6.1/i' => 'Windows XP',
        '/Windows NT 4.0/i' => '(Windows NT 4.0)|(WinNT4.0)|(WinNT)|(Windows NT)',
        '/Windows ME/i' => 'Windows ME',
        '/indows NT 10.0/i' => 'Windows 10',
		'/Open BSD/i'=>'OpenBSD',
        '/Sun OS/i'=>'SunOS',
        '/Linux/i'=>'(Linux)|(X11)',
        '/Safari/i' => '(Safari)',
        '/Macintosh/i'=>'(Mac_PowerPC)|(Macintosh)',
        '/QNX/i'=>'QNX',
        '/BeOS/i'=>'BeOS',
        '/OS/2/i'=>'OS/2',
        '/Search Bot/i'=>'(nuhk)|(Googlebot)|(Yammybot)|(Openbot)|(Slurp/cat)|(msnbot)|(ia_archiver)'
    );
    foreach($oses as $os=>$pattern){
        if(preg_match($os, $agent)) { 
            return $pattern;
        }
    }
    return $agent;
}

function getdev($agent) {
 
  
    $oses = array (
        '/iOS/i' => '(iPhone)',
        '/IPhone/i' => 'iPhone',
		
		//xiaomi
		'/Redmi Note 7/i' => 'Redmi Note 7',
		'/Redmi Note 6 Pro/i' => 'Redmi Note 6 Pro',
		'/Redmi Note 5/i' => 'Redmi Note 5',
		'/Redmi Note 4X/i' => 'Redmi Note 4X',
		'/Redmi Note 4/i' => 'Redmi Note 4',
		'/Redmi Note 3/i' => 'Redmi Note 3',
		'/Redmi S2/i' => 'Redmi S2',
		'/Redmi 7/i' => ' Redmi 7',
		'/Redmi 4X/i' => 'Redmi 4X',
		'/Redmi 4/i' => 'Redmi 4',
		'/MI MAX/i' => 'Xiaomi Mi Max',
		'/MI 8/i' => 'XIAOMI MI 8',
		'/MI 6X/i' => 'XIAOMI MI 6X',
		'/Mi A2 Lite/i' => 'Mi A2 Lite',
		'/Mi A1/i' => 'Mi A1',
		
		//======
		
		//Meizu
		'/M2 Note/i' => 'Meizu M2 Note',
		'/MX5/i' => 'Meizu MX5',
		//======
		
		
		//Samsung
		'/SM-A310F/i' => 'Galaxy A3',
		'/SM-A205FN/i' => 'Galaxy A20',
		'/SM-T585/i' => 'Galaxy Tab A 10.1',
		'/SM-G900A/i' => 'Galaxy S5',
		'/SM-G900H/i' => 'Galaxy S5',
		'/SM-G900F/i' => 'Galaxy S5',
		'/SM-J730FM/i' => 'Galaxy J7',
		'/S7/i' => 'Galaxy S7/Edge',
		'/SM-J610FN/i' => 'Galaxy J6+',
		'/SM-G570F/i' => 'Galaxy J5 Prime',
		'/SM-J510H/i' => 'Galaxy J5',
		'/SM-J200F/i' => 'Galaxy J2',
		'/SM-J120F/i' => 'Galaxy J1',
		'/SM-J105H/i' => 'Galaxy J1 Mini',
		'/SM-N910H/i' => 'Galaxy Note 4',
		'/SM-N910F/i' => 'Galaxy Note 4',
		'/SM-T350/i' => 'Galaxy Tab A 8.0',
		'/SM-G7102/i' => 'Galaxy Grand 2',
		'/SM-A305FN/i' => 'Galaxy A30',
		'/A7/i' => ' Galaxy A7',
		
		
		//======
		
		//HUAWEI
		'/TIT-U02/i' => 'Huawei Y6 Pro',
		//======
		
		//xiaomi
		//======
		
		//ASUS
		'/ASUS_Z00XS/i' => 'Asus Zenfone Zoom ZX551ML',
		//======
		
		'/GM 5 Plus/i' => 'General Mobile GM 5',
		'/X30/i' => 'DOOGEE X30',
		'/S16/i' => 'HOMTOM S16',
		'/GEOTEL_Note/i' => 'GEOTEL Note',
		'/K6000/i' => 'OUKITEL K6000',
		'/Power 5/i' => 'Ulefone Power 5 ',
		
		
		
		'/Lenovo A328/i' => 'Lenovo A328',
		'/Lenovo TAB 2 A8-50LC/i' => 'Lenovo TAB 2',
		'/Lenovo S580/i' => 'Lenovo S580',
		'/Lenovo P70-A/i' => 'Lenovo P70-A',
		
		
		
		'/YS8pro/i' => 'YUNSONG YS8pro',
		'/MYA-L41/i' => 'Huawei Y6',
		'/Candy U7/i' => 'SANTIN Candy U7',
		
		
		'/Tablet/i' => 'Tablet',
		'/Mobile/i' => 'Mobile',
		
		'/Windows NT 10.0/i' => 'Windows 10',
		'/Windows NT 6.3/i' => 'Windows 8.1',
		'/Windows NT 6.1/i' => 'Windows 7',
		'/Windows NT 6.0/i' => 'Windows Vista',
		'/Windows NT 5.2/i' => 'Windows Server',
		'/Windows NT 5.1/i' => 'Windows XP',
        '/Win64/i' => 'PC x64',
        '/Win32/i' => 'PC x32'
    );
    foreach($oses as $os=>$pattern){
        if(preg_match($os, $agent)) { 
            return $pattern;
        }
    }
    return $agent;
}



function mobdev($agent) {
 
  
    $oses = array (
        '/iOS/i' => 'Mobile',
        '/IPhone/i' => 'Mobile',
		'/Android/i' => 'Mobile',
		'/Tablet/i' => 'Mobile',
		'/Mobile/i' => 'Mobile',
    );
    foreach($oses as $os=>$pattern){
        if(preg_match($os, $agent)) { 
            return $pattern;
        }
    }
    return $agent;
}


function stwdate($week, $year) {
$dto = new DateTime();
  $ret['week_start'] = $dto->setISODate($year, $week)->format('Y-m-d');
  $ret['week_end'] = $dto->modify('+6 days')->format('Y-m-d');
  return $ret;
}

function arr_insert($user = [])
{

	$users['id'] = (int)$user[0];
	$users['name'] = $user[1];
	$users['pp_p'] = (int)$user[2];	
	return $users;
}

function arr_sort($s_arr)
{

	$keys = array_column($s_arr, 'name');
	array_multisort($keys, SORT_ASC, $s_arr);
	return $s_arr;
}

function perebor($arr){
  if(!is_array($arr)) {return '<tr>'.$arr.'</tr>';}
    else {
      foreach ($arr as $key=>$item) {
		  
        print perebor($item);
      }
    }
}


function GenerateKey($length) {
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
		$code = "";
		$clen = strlen($chars) - 1;
		while (strlen($code) < $length) {
			$code .= $chars[mt_rand(0,$clen)];
		}
		return $code;
	}




?>
<?php
if(!defined("AP")) exit("Доступ к файлу напрямую запрещен!");
if(auth===true)
{
	header("location: /index.html");
}



unset($_COOKIE['prt']);
unset($_COOKIE['tbl']);
unset($_COOKIE['id']);

if(count($post_array)!=0)
{


	$login=dateprotect($post_array['login']);
	$passw=dateprotect($post_array['passw']);

$_SESSION['uip']=$ip;
$dat=date("H:i");
$five=mysql_query("DELETE FROM `avtoriz` WHERE `schet`>'4' AND `date`<'".$dat."'");

$one=mysql_fetch_array(mysql_query("SELECT `ip`,`date`,`schet` FROM `avtoriz` WHERE `ip`='$ip'"));


if($passw=="" OR $login=="" )
{
	$err=$err_ic_lp; //Заполните все поля
}

if(!preg_match("/^[A-Za-z0-9_-]{3,32}$/",$login) and !preg_match("/^([A-Za-z0-9_\.-]+)@([A-Za-z0-9_\.-]+)\.([A-Za-z0-9\.]{1,6})$/",$login))
	{
		$err=$err_ic_da;//Данные введены не правильно
		
	}
if($passw=="Password" OR $login=="Login")
{
	$err=$err_ic_lp; //Заполните все поля
}
     $re_query=mysql_query("SELECT * FROM `users` WHERE `login`='".$login."' AND `passw`='".md5($passw)."'");
		if(mysql_num_rows($re_query)== 0)
{
	$err=$err_ic_log;//Пользователь с таким логином и паролем не найден!
}
else{
	
	$user_id=mysql_fetch_array($re_query);
}
if($err=="")
{



				$user_arr=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='".$user_id[0]."'"));

				$weak=mysql_fetch_array(mysql_query("SELECT `fdate_this`,`ldate_this`,`fday_week_next`,`lday_week_next`,`next_table_activ` FROM `tb_congr` WHERE `id`='".$user_arr[6]."'"));


				$pref=mysql_fetch_array(mysql_query("SELECT `pref` FROM `tb_congr` WHERE `id`='".$user_arr[6]."'"));

				$four=mysql_query("DELETE FROM `avtoriz` WHERE `ip`='$ip'");

				$query=mysql_query("UPDATE `users` SET `lastdate`='".date("d.m.Y H:i")."' WHERE `login`='".$login."'");

				$query=mysql_query("UPDATE `users` SET `lastip`='".$ip."' WHERE `login`='".$login."'");
				
				
				
				
				
				

				$loc_ste=mysql_fetch_array(mysql_query("SELECT `st_loc` FROM `tb_congr` WHERE `id`='".$user_arr[6]."'"));

				$name_congr=mysql_fetch_array(mysql_query("SELECT `ne_cong` FROM `tb_congr` WHERE `id`='".$user_arr[6]."'"));



				$_SESSION['congr']=mysql_fetch_array(mysql_query("SELECT * FROM `tb_congr` WHERE `id`='".$user_arr[6]."'"));
				$_SESSION['live']=strtotime($date);
				$_SESSION['uip']=$ip;
				$_SESSION['name']=$user_id['name'];
				$_SESSION['uid']=$user_id[0];
				$_SESSION['user']['login']=true;
				
				$_SESSION['tcon']="tb_stend_".$pref[0]."";
				$_SESSION['sloc']=$loc_ste[0];
				$_SESSION['cname']=$name_congr[0];

				$_SESSION['fday']=$weak[0];
				$_SESSION['lday']=$weak[1];

				$_SESSION['ldayn']=$weak[3];
				$_SESSION['fdayn']=$weak[2];

				$_SESSION['stat']=$weak[4];
/////===============Безопасность v2.0===========///////

/////Защита  Авторизации///////
$geo = !$is_bot ? json_decode(file_get_contents("http://ip-api.com/json/".$ip.""), true) : [];
$logo_add=mysql_query("INSERT INTO `us_login` VALUES (NULL,'".$user_arr[0]."','".$ip."','".$geo[countryCode]."','".time()."','".$user_agent."','0')");


$prot_get_dat=mysql_query("SELECT * FROM `us_session` WHERE `uid`='".$user_arr[0]."' AND `ip`='".$ip."' AND `sessid`='".$_COOKIE['PHPSESSID']."'");

$numrow=mysql_num_rows($prot_get_dat);
$os=getOS($user_agent);
$br=getBrowser();
$device=getdev($user_agent);

if($numrow == 0){
$pro_add=mysql_query("INSERT INTO `us_session` VALUES (NULL,'".$user_arr[0]."','".$ip."','".$device."','".$br."','".time()."','".time()."','0','0','0','".$user_agent."','".$_COOKIE['PHPSESSID']."')");
}
else{
	$pro_update=mysql_query("UPDATE `us_session` SET `atime`='".time()."', `device`='".$device."', `brauzer`='".$br."', `mtime`='".time()."' WHERE `sessid`='".$_COOKIE['PHPSESSID']."'");		
}
	
				
////end///

if($user_arr['group']==9){
	$_SESSION['admin']=1;
}


$rap_year=mysql_fetch_array(mysql_query("SELECT * FROM `st_config`  WHERE `key`='report_year'"));
		$rp_ye=explode("|",$rap_year['param']);
		setcookie("y", $rp_ye[0]);
		
/////====================end===================///////






/////===============Обновление v2.0===========///////

				$congr_data=mysql_fetch_array(mysql_query("SELECT * FROM `tb_congr` WHERE `uid`='".$user_arr[6]."'"));
				setcookie("id",  $user_arr['id']);
				$setnew_date=mysql_fetch_array(mysql_query("SELECT * FROM `cfg_tb_date` WHERE `id`=1 "));
				$ref_arr=mysql_query("SELECT * FROM `tb_stands` WHERE `uid`='".$user_arr['id']."' ORDER BY `id` ASC");
				while($row=mysql_fetch_array($ref_arr)){

				if($row[6]==1){
				setcookie("prt", $row[4]);
				setcookie("tbl", $row[2]);
				
				}
				}
				$_SESSION['fdw']=$setnew_date[1];
				$_SESSION['ldw']=$setnew_date[2];

				$_SESSION['ldwn']=$setnew_date[3];
				$_SESSION['fdwn']=$setnew_date[4];
				
				
				

	
	




/////========================================///////


if($user_arr['prof_lock']==1){
	header("location: /ban.html");
}
else{
	if( $user_arr['rid']==21 and $cfg_cgr[1]==1){
		
		header("location: /report.html");
	}
	else{
		//header("location: /index.html");
		header("location: /report.html");
	}
				

}
}
else
{


if($one==0)
{
$two=mysql_query("INSERT INTO `avtoriz` VALUES (NULL,'$ip','0','1')");
$one=mysql_fetch_array(mysql_query("SELECT `ip`,`date`,`schet` FROM `avtoriz` WHERE `ip`='$ip'"));
}
else
{
if($one[2]<5)
{
$one[2]=$one[2]+1;

$H=date("H");
$i=date("i");
if($H==23)
{
$H=00;
}
else
{
$H=$H+1;
}

$frie=mysql_query("UPDATE `avtoriz` SET `schet`='$one[2]',`date`='".$H.":".$i."' WHERE `ip`='$ip'");
}

}

msg($err,"wr");


}
}

?>


<header class="d-flex justify-content-end align-items-center">
 <div class="btn-group btn-group-sm">
                    <a href="/login.html&lg=ro" class="btn btn-outline-secondary">RO</a>
                    <a href="/login.html&lg=ru" class="btn btn-outline-secondary">RU</a>
                    <a href="/login.html&lg=en" class="btn btn-outline-secondary">EN</a>
                </div>
				</header>
				<div class="container-fluid">
					<div class="row">
						<div class="col-xl-12 pa-0">
							<div class="auth-form-wrap pt-xl-0 pt-70">
								<div class="auth-form w-xl-30 w-lg-55 w-sm-75 w-100">
									<a class="auth-brand text-center d-block mb-20" href="#">
										<img class="brand-img" src="img/slogo.png" alt="brand"/>
									</a>
									<form action="#" method="post">
										<h1 class="display-4 text-center mb-10"><? echo $hd_wl;?></h1>
										<p class="text-center mb-30"><? echo $hd_nm;?></p>
										<div class="form-group">
											<input class="form-control" type="text" name="login" placeholder="E-mail">
										</div>
										
									
										
										<div class="form-group">
											<div class="input-group">
												<input class="form-control" id="passsh" type="password" name="passw" placeholder="<? echo $int_ps;?>">
												
											</div>
										</div>
										<?
										if ($i2==5){
										
										?>
										<div class="form-group">
                                           <div class="custom-control custom-checkbox">
                                                <input type="checkbox" onclick="myFunction()" class="custom-control-input" id="customCheck2" >
                                                <label class="custom-control-label" for="customCheck2">Видимый пароль</label>
                                            </div>
                                        </div>
										
										<div class="form-group">
                                           <div class="custom-control custom-checkbox">
                                                <input name="pioner" value="1" type="checkbox" class="custom-control-input" id="customCheck1" <? if ($one[6]==1) { echo "checked";} ?>>
                                                <label class="custom-control-label" for="customCheck1">Запомнить меня</label>
                                            </div>
                                        </div>
										<?
										}
										
										?>
										<button class="btn btn-violet btn-block" type="submit"><? echo $bt_su_in; ?> </button>
										
										

										<p class="font-14 text-center mt-15"></p>
										<div class="option-sep"></div>
										<div class="form-row">
											<div class="col-sm-6 mb-20"><a href="recovery.html" class="btn btn-light  btn-block btn-wth-icon"><? echo $bt_su_rc; ?></a></div>
											<div class="col-sm-6 mb-20"><a href="reg.html" class="btn btn-light  btn-block btn-wth-icon"><? echo $bt_su_reg;?></a></div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>
				</div>











  </div>
    <!-- /Main Content -->

  </div>
  <!-- /HK Wrapper -->

  <!-- JavaScript -->

  <!-- jQuery -->
  <script > 
  
  function myFunction() {
    var x = document.getElementById("passsh");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}</script>
  <script src="vendors/jquery/dist/jquery.min.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
  <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>

  <!-- Slimscroll JavaScript -->
  <script src="dist/js/jquery.slimscroll.js"></script>

  <!-- Fancy Dropdown JS -->
  <script src="dist/js/dropdown-bootstrap-extended.js"></script>

  <!-- FeatherIcons JavaScript -->
  <script src="dist/js/feather.min.js"></script>

  <!-- Init JavaScript -->
  <script src="dist/js/init.js"></script>
</body>
</html>

<?php
if(!defined("AP")) exit("Доступ к файлу напрямую запрещен!");

if(auth===TRUE)
{
   header("location: /index.html");
}
else
{

if(count($post_array)!=0)
{
			$login =    dateprotect($post_array['email']);
			$f_name =   dateprotect($post_array['f_name']);
			$passw =    dateprotect($post_array['passw']);
			$passw_a =  dateprotect($post_array['passw_a']);
			$gender =   dateprotect($post_array['gender']);



       // if(intval($get_array['cgr'])=="")
       // {
       //        $err="<font size='5' color='red'>Извените, Вы не можете быть зарегистрированы без приглашения.</font>";
       //}

		//$reg_status=mysql_fetch_array(mysql_query("SELECT * FROM `tb_congr` WHERE `uid`='".intval($get_array['cgr'])."'"));

		//if($reg_status[12] == 1){

		//	  $err="<font size='5' color='red'>Извените, Регистрация в данной группе ограничена.</font>";
		//}

		if($f_name=="" OR $login=="" OR $passw=="" OR $passw_a=="")
        {
                $err=$err_reg_fd;//"Заполните все обязательные поля -  Имя, Логин, Пол, Пароль";
        }

        elseif(!preg_match("/^[a-zA-Z0-9_-]+[a-zA-Z0-9_.-]*@[a-zA-Z0-9_-]+[a-zA-Z0-9_.-]*\.[a-z]{2,5}$/",$login) AND $login!="")
        {
               $err=$err_reg_mail;//Некорректно введен email
        }

        elseif(strlen($passw)<6)
        {
                $err=$err_reg_pass;//Длинна пароля должна быть больше 6-ти символов
        }  
		elseif(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,30}$/', $passw))
        {
                $err=$err_reg_inf_pass;//Длинна пароля должна быть больше 6-ти символов
        }       
		
        elseif($passw!=$passw_a)
        {
                $err=$err_reg_pp2;//Пароли не совпадают
        }
        elseif(strlen($passw)>30)
        {
                $err=$err_reg_psl;//Длинна пароля не должна быть больше 30-ти символов
        }
		elseif($gender == "")
        {
                $err=$err_reg_gend;//Не выбран пол
        }
	    $query_array=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM `users` WHERE `mail`='".$login."' or `login`='".$login."' "));
        if($query_array[0]>0)
        {
                $err=$err_reg_is;//Пользователь с таким Email уже есть на сайте
        }
		

        if($err!="")
        {
                msg($err,"wr");
        }
        else
        {
                $insert_query=mysql_query("INSERT INTO `users` VALUES
                    (NULL,
					'".$login."',
					'".md5($passw)."',
					'".$passw."',
					'1',
					'0',
					'0',
					'".$login."',
					'".$f_name."',
					'".$gender."',
					
					'".$ip."',
					'0',
					'0',
					'0',
					'0',
					'0',
					'0',
					'0',
					'".date("d.m.Y H:i")."',
					'0',
					
					'0',
					'0',
					'0',
					'0',
					'0',
					'0',
					'0',
					'0'
					)");
          newreg($login, iconv('UTF-8', 'windows-1251', $passw), $config['admin_mail'], $config['s_title'], $config['s_adres']);
          header ("location: /login.html");


        }
}


$reg_status=mysql_fetch_array(mysql_query("SELECT * FROM `tb_congr` WHERE `uid`='".intval($get_array['cgr'])."'"));


?>




			<header class="d-flex justify-content-end align-items-center">
                <div class="btn-group btn-group-sm">
					<a href="/reg.html&lg=ro" class="btn btn-outline-secondary">RO</a>
                    <a href="/reg.html&lg=ru" class="btn btn-outline-secondary">RU</a>
                    <a href="/reg.html&lg=en" class="btn btn-outline-secondary">EN</a>
                </div>
            </header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 pa-0">
                        <div class="auth-form-wrap pt-xl-0 pt-70">
                            <div class="auth-form w-xl-30 w-lg-55 w-sm-75 w-100">
                                <a class="auth-brand text-center d-block mb-20" href="login.html">
                                    <img class="brand-img" src="../img/slogo.png" alt="brand" />
                                </a>
                                <form  action="" method="post">
                                    <h1 class="display-4 mb-10 text-center"><? echo $reg_hd_tx;?></h1>
                                    <p class="mb-30 text-center"></p>

                                    <div class="form-group">
                                          <input type="text" value="<? echo $f_name;?>" name="f_name" placeholder="<? echo $reg_name;?>" class="form-control" autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" value="<? echo $login;?>" name="email" placeholder="Email"  type="email" class="form-control" autocomplete="off" required>

                                    </div>
                                    <div class="form-group">
                                      <select name="gender" class="form-control">
                                        <option value=""><? echo $gend_qr;?></option>
                                        <option value="1"><? echo $gend_m;?></option>
                                        <option value="2"><? echo $gend_f;?></option>

                                      </select>
                                    </div>
                                    <div class="form-group">
                                      <div class="input-group">
											<input class="form-control" placeholder="<? echo $int_ps;?>" name="passw" type="password" autocomplete="off" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><span class="feather-icon"><i data-feather="eye-off"></i></span></span>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
											<input class="form-control" placeholder="<? echo $int_ps2;?>" name="passw_a" type="password" autocomplete="off" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><span class="feather-icon"><i data-feather="eye-off"></i></span></span>
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-violet btn-block" type="submit"><? echo $bt_crea;?></button>
									<a href="login.html" class="btn btn-light  btn-block btn-wth-icon"><? echo $bt_su_in;?></a>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
           </div>

<?

}

?>

</div>
        <!-- /Main Content -->

    </div>
    <!-- /HK Wrapper -->

    <!-- jQuery -->
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

    <!-- Toggles JavaScript -->
    <script src="vendors/jquery-toggles/toggles.min.js"></script>
    <script src="dist/js/toggle-data.js"></script>

    <!-- Init JavaScript -->
    <script src="dist/js/init.js"></script>
</body>

</html>
<?php
if(!defined("AP")) exit("Доступ к файлу напрямую запрещен!");

if(isset($post_array)){

	$email = dateprotect($post_array['email']);

    if (!preg_match("/^(?:[a-z0-9]+(?:[-_]?[a-z0-9\.\-\_]+)?@[a-z0-9]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", substr($email, 0, 50))) {
        echo 'Вы указали неправильный email';

    }
    if ($email == '') {
        echo 'Вы указали неправильный email';

    }
	else {
			$sql=mysql_fetch_array(mysql_query("SELECT `id`,`mail` FROM `users` WHERE `mail`='".$email."' LIMIT 1"));
            $pass = rand(9999999,9999999999);
			$update=mysql_query("UPDATE `users` SET `passw`='".md5($pass)."',`email`='".$pass."' WHERE `id`='".$sql[0]."'");
            pasrec($email, iconv('UTF-8', 'windows-1251', $pass), $config['admin_mail'], $config['s_title'], $config['s_adres']);

         header("location: /login.html");


    }




}
?>





<header class="d-flex justify-content-end align-items-center">
                <div class="btn-group btn-group-sm">
					<a href="/recovery.html&lg=ro" class="btn btn-outline-secondary">RO</a>
                    <a href="/recovery.html&lg=ru" class="btn btn-outline-secondary">RU</a>
                    <a href="/recovery.html&lg=en" class="btn btn-outline-secondary">EN</a>
                </div>
            </header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 pa-0">
                        <div class="auth-form-wrap pt-xl-0 pt-70">
                            <div class="auth-form w-xl-30 w-sm-50 w-100">
                                <a class="auth-brand text-center d-block mb-20" href="login.html">
                                    <img class="brand-img" src="img/slogo.png" alt="brand" />
                                </a>
                                <form action="#" method="post">
                                    <h1 class="display-5 mb-10 text-center"><? echo $bt_su_rc;?></h1>
                                    <p class="mb-30 text-center"><? echo $rem_inf;?></p>
                                    <div class="form-group">
                                        <input name="email" class="form-control" placeholder="Email" type="email">
                                    </div>
                                    <button class="btn btn-violet btn-block mb-20" type="submit"><? echo $bt_rec;?></button>
                                   
											
											
											<a href="login.html" class="btn btn-light  btn-block btn-wth-icon"><? echo $bt_su_in;?></a>
										
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>

							   </div>

						        <!-- /Main Content -->

						    </div>
						    <!-- /#wrapper -->

						    <!-- jQuery -->
						    <script src="vendors/jquery/dist/jquery.min.js"></script>

						    <!-- Bootstrap Core JavaScript -->
						    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
						    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>

						    <!-- Slimscroll JavaScript -->
						    <script src="dist/js/jquery.slimscroll.js"></script>

						    <!-- Fancy Dropdown JS -->
						    <script src="dist/js/dropdown-bootstrap-extended.js"></script>

						    <!-- Owl JavaScript -->
						    <script src="vendors/owl.carousel/dist/owl.carousel.min.js"></script>

						    <!-- Switchery JavaScript -->
						    <script src="vendors/switchery/dist/switchery.min.js"></script>

						    <!-- FeatherIcons JavaScript -->
						    <script src="dist/js/feather.min.js"></script>

						    <!-- Tablesaw JavaScript -->
						    <script src="vendors/tablesaw/dist/tablesaw.jquery.js"></script>
						    <script src="dist/js/tablesaw-data.js"></script>

						    <!-- Init JavaScript -->
						    <script src="dist/js/init.js"></script>
						 </body>

						</html>

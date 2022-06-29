<?php
if(!defined("AP")) exit("Доступ к файлу напрямую запрещен!");
if(auth===FALSE){
	header("location: /login.html");
}
else{
	if($user_arr[4]!=9){ header("location: /index.html"); }
		else{
			require_once("template/head.php");
?>

		<div class="hk-pg-header">
			<div>
				<h2 class="hk-pg-title font-weight-600">Админ панель</h2>
			</div>
		</div>

		<div class='table-wrap'>
	 		<div class="card">
				<div class="card-body">
				<div class='panel-heading'>
									<h3 class='panel-title'>Пользователи</h3><br>
			</div>
						
					<tbody>
						<tr>
							<th class='not-sortable'>	
								<a class='btn btn-violet btn-lg btn-block' href='admin.html&sub=users'><i class="fa fa-flag fa-2x fa-lg"></i> Все пользователя</a>
								<p>
								<br>
								<a class='btn btn-violet btn-lg btn-block' href='admin.html&sub=login'>Авторизаций (последнии)</a>
								<p>
								<br>
								
								<a class='btn btn-violet btn-lg btn-block' href='admin.html&sub=sess'> <i class="fa fa-flag "></i> Онлайн</a> 
								<p>
								<br>
								<a class='btn btn-violet btn-lg btn-block'href='admin.html&sub=adduser'>Создать нового пользователя</a>
							</th>
						</tr>					
					</tbody>
				</div>
			</div>
		</div>
		
		<div class='table-wrap'>
	 		<div class="card">
				<div class="card-body">
				<div class='panel-heading'>
									<h3 class='panel-title'>Модули</h3><br>
			</div>
						
					<tbody>
						<tr>
							<th class='not-sortable'>	
								
								<a class='btn btn-violet btn-lg btn-block' href='admin.html&sub=verif'>Рзделы</a>
								<p>
								<br>
								<a class='btn btn-violet btn-lg btn-block' href='admin.html&sub=users'>Привелегии</a>
								<p>
								<br>
								<a class='btn btn-violet btn-lg btn-block' href='admin.html&sub=login'>Авторизаций (последнии)</a>
								<p>
								<br>
								<a class='btn btn-violet btn-lg btn-block' href='admin.html&sub=login'>Авторизаций (последнии)</a>
								<p>
								<br>
								<a class='btn btn-violet btn-lg btn-block'href='admin.html&sub=adduser'>Создать нового пользователя</a>
							</th>
						</tr>					
					</tbody>
				</div>
			</div>
		</div>
		
		
		
		<div class='table-wrap'>
	 		<div class="card">
				<div class="card-body">
				<div class='panel-heading'>
									<h3 class='panel-title'>Безопасность</h3><br>
			</div>
						
					<tbody>
						<tr>
							<th class='not-sortable'>	
								
								<a class='btn btn-violet btn-lg btn-block' href='admin.html&sub=verif'>Проверка авторизация</a>
								<p>
								<br>
								<a class='btn btn-violet btn-lg btn-block' href='admin.html&sub=users'><i class="fa fa-flag fa-2x fa-lg"></i> Все пользователя</a>
								<p>
								<br>
								<a class='btn btn-violet btn-lg btn-block' href='admin.html&sub=login'>Авторизаций (последнии)</a>
								<p>
								<br>
								
								<p>
								<br>
								<a class='btn btn-violet btn-lg btn-block'href='admin.html&sub=adduser'>Создать нового пользователя</a>
							</th>
						</tr>					
					</tbody>
				</div>
			</div>
		</div>


<div class='table-wrap'>
	 		<div class="card">
				<div class="card-body">
				<div class='panel-heading'>
									<h3 class='panel-title'><font size='5' color='red' face='Arial'>ЭКСТРЕННАЯ БЛОКИРОВКА САЙТА</font></h3><br>
			</div>
						
					<tbody>
						<tr>
							<th class='not-sortable'>	
								<a class='btn btn-danger btn-lg btn-block' href='admin.html&sub=users'><i class="fa fa-exclamation-triangle"></i> Закрыть сайт</a>
								
							</th>
						</tr>					
					</tbody>
				</div>
			</div>
		</div>	
	
 

                                        
                                        
<?
}
}
?>

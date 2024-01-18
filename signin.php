<?php
	error_log(0);
	error_reporting(0);
	require 'inc/db.php';
?>
<?php if (!isset($_SESSION['logged_user'])) : ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<title>Авторизация</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/x-icon" href="images/assets/favicon.ico">
	<link rel="shortcut icon" type="image/x-icon" href="images/assets/favicon.ico">
	<link rel="apple-touch-icon" type="image/x-icon" href="images/assets/apple-touch-icon.png">
	<link rel="apple-touch-icon-precomposed" type="image/x-icon" href="images/assets/apple-touch-icon.png">

	<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<style type="text/css">
		.block {width: 270px;height: 270px;position: absolute;top: 48%;left: 48%;margin: -130px 0 0 -130px;}
		.form-label {font-size: 22px; font-weight: 600;}
		.copyright {color: darkgrey; font-size: 16px; text-decoration: none;}
		a {color: #28A750;}
		a:hover {color: grey;}
	</style>
    <link rel="stylesheet" type="text/css" href="css/loader.css">
</head>
<body>
    <div class="mask">
        <div class="loader"></div>
    </div>
	<main>
		<div class="container-sm text-center">
			<div class="row">
				<div class="block d-flex justify-content-center align-items-center">
					<form action="" method="POST">
						<a href="http://aist.site/"><img src="images/assets/apple-touch-icon.png" width="115" height="115"></a>
						<label class="form-label">Авторизация</label>
						<input class="form-control mb-2 mt-2" type="email" name="user_email" placeholder="Эл. почта" value="<?php echo @$data['user_email']; ?>" id="input1" onkeydown="if(event.keyCode === 13) {document.getElementById('input2').focus(); event.preventDefault(); document.querySelector('button[type=submit]').click();}">
						<input class="form-control mb-2" type="password" name="user_password" placeholder="Пароль" value="<?php echo @$data['user_password']; ?>" id="input2" onkeydown="if(event.keyCode === 13) {document.getElementById('input3').focus(); event.preventDefault(); document.querySelector('button[type=submit]').click();}">
						<a сlass="policy" href="http://aist.site/signup">Зарегистрироваться</a><br>
						<a сlass="policy" href="">Забыли пароль?</a>
						<hr>
						<?php
						$data = $_POST;
						if(isset($data['signin'])) {
							$errors = array();
							$user = R::findOne('user', 'email = ?', array($data['user_email']));

							if ($user) {
								//если пользователей существует
								if (password_verify($data['user_password'], $user->password)) {
									//всё ок, авторизовываем пользователя
									$_SESSION['logged_user'] = $user;
									header('Location: /profile');
								} else {
									$errors[] = 'Неверно введён пароль';
								}

							} else {
								$errors[] = 'Email не найден';
							}

							if (!empty($errors)) {
								echo '<p style="font-size: 14px;" class="text-danger">'. array_shift($errors) .'</p><hr>';
							}
						}
					?>
						<button name="signin" id="input3" class="form-control mb-2 btn btn-outline-success">Войти</button>
						<p class="copyright">&copy; AIST site 2023. Все права защищены.</p>
					</form>
				</div>
			</div>
		</div>
	</main>

    <script src="http://aist.site/js/loader.js"></script>
</body>
</html>
<?php else : header('Location: profile') ?>
<?php endif; ?>
<?php
	error_log(0);
	error_reporting(0);
	require 'inc/db.php';
?>
<?php if (!isset($_SESSION['logged_user'])) : ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<title>Регистрация</title>
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
		.policy {font-size: 12px;color: grey;}
		.policy a {color: #28A750}
		.policy a:hover {color: grey;}
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
						<label class="form-label">Регистрация</label>
						<input class="form-control mb-2 mt-2" type="text" name="user_name" placeholder="Ваше имя" value="<?php echo @$data['user_name']; ?>" id="input1" onkeydown="if(event.keyCode === 13) {document.getElementById('input2').focus(); event.preventDefault(); document.querySelector('button[type=submit]').click();}">
						<input class="form-control mb-2 mt-2" type="email" name="user_email" placeholder="Ваша эл. почта" value="<?php echo @$data['user_email']; ?>" id="input2" onkeydown="if(event.keyCode === 13) {document.getElementById('input3').focus(); event.preventDefault(); document.querySelector('button[type=submit]').click();}">
						<input class="form-control mb-2" type="password" name="user_password" placeholder="Пароль" value="<?php echo @$data['user_password']; ?>" id="input3" onkeydown="if(event.keyCode === 13) {document.getElementById('input4').focus(); event.preventDefault(); document.querySelector('button[type=submit]').click();}">
						<input class="form-control mb-2" type="password" name="user_password_confirm" placeholder="Подтвердить пароль" value="<?php echo @$data['user_password_confirm']; ?>" id="input4" onkeydown="if(event.keyCode === 13) {document.getElementById('input5').focus(); event.preventDefault(); document.querySelector('button[type=submit]').click();}">
						<p class="policy">Нажимая «Продолжить», вы принимаете <a href="http://aist.site/portal-rules">правила портала</a> и <a href="http://aist.site/policy-personal-data">политику обработки персональных данных</a></p>
						<hr>
						<?php
						$data = $_POST;
						if(isset($data['signup'])) {
							//тут регистрируем
							$errors = array();
							if (trim($data['user_name']) == '') {
								$errors[] = 'Введите ваше имя';
							}

							if (trim($data['user_email']) == '') {
								$errors[] = 'Введите вашу почту';
							}

							if ($data['user_password'] == '') {
								$errors[] = 'Введите ваш пароль';
							}

							if ($data['user_password_confirm'] != $data['user_password']) {
								$errors[] = 'Пароли не свопадают';
							}

							if (R::count('user', "email = ?", array($data['user_email'])) > 0) {
								$errors[] = 'Email уже зарегистрирован';
							}

							if (empty($errors)) {
								//тут регистрируем
								$user = R::dispense('user');
								$user->name = $data['user_name'];
								$user->email = $data['user_email'];
								$user->password = password_hash($data['user_password'], PASSWORD_DEFAULT);
								$user->telegram = '';
								$user->whatsapp = '';
								$user->avatar = 'mages/assets/avatar.png';
								$user->code_for_del = '0';
								R::store($user);
								header('Location: /signin');

								$to = $data['user_email'];
								$subject = "Вы успешно зарегистровались на сайте aist.site";
								$headers = "Content-type: text/html; charset=utf-8\r\n";
								$message = '
								<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<!--[if mso]><xml></xml><![endif]--><style>
*{box-sizing:border-box}body{margin:0;padding:0}a[x-apple-data-detectors]{color:inherit!important;text-decoration:inherit!important}#MessageViewBody a{color:inherit;text-decoration:none}p{line-height:inherit}.desktop_hide,.desktop_hide table{mso-hide:all;display:none;max-height:0;overflow:hidden}.image_block img+div{display:none} @media (max-width:660px){.row-content{width:100%!important}.mobile_hide{display:none}.stack .column{width:100%;display:block}.mobile_hide{min-height:0;max-height:0;max-width:0;overflow:hidden;font-size:0}.desktop_hide,.desktop_hide table{display:table!important;max-height:none!important}}
</style>
</head>
<body style="background-color:#c5c4cf;margin:0;padding:0;-webkit-text-size-adjust:none;text-size-adjust:none">
<table class="nl-container" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#c5c4cf"><tbody><tr><td>
<table class="row row-1" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0"><tbody><tr><td><table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;color:#000;width:640px" width="640"><tbody><tr><td class="column column-1" width="100%" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;padding-bottom:5px;padding-top:5px;vertical-align:top;border-top:0;border-right:0;border-bottom:0;border-left:0"><div class="spacer_block block-1" style="height:20px;line-height:20px;font-size:1px"> </div></td></tr></tbody></table></td></tr></tbody></table>
<table class="row row-2" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0"><tbody><tr><td><table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#fff;color:#000;width:640px" width="640"><tbody><tr><td class="column column-1" width="100%" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;padding-bottom:5px;padding-left:10px;padding-right:10px;padding-top:5px;vertical-align:top;border-top:0;border-right:0;border-bottom:0;border-left:0">
<table class="image_block block-1" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0"><tbody><tr><td class="pad" style="padding-bottom:10px;padding-top:10px;width:100%;padding-right:0;padding-left:0"><div class="alignment" align="center" style="line-height:10px"><img src="http://aist.site/images/assets/apple-touch-icon.png" style="display:block;height:auto;border:0;width:155px;max-width:100%" width="155"></div></td></tr></tbody></table>
<div class="spacer_block block-2" style="height:10px;line-height:10px;font-size:1px"> </div>
</td></tr></tbody></table></td></tr></tbody></table>
<table class="row row-3" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0"><tbody><tr><td><table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#fff;color:#000;width:640px" width="640"><tbody><tr><td class="column column-1" width="100%" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;padding-bottom:5px;padding-left:20px;padding-right:20px;padding-top:5px;vertical-align:top;border-top:0;border-right:0;border-bottom:0;border-left:0">
<table class="text_block block-1" width="100%" border="0" cellpadding="10" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;word-break:break-word"><tbody><tr><td class="pad"><div style="font-family:sans-serif"><div class="" style="font-size:14px;mso-line-height-alt:16.8px;color:#9393a0;line-height:1.2;font-family:Helvetica Neue,Helvetica,Arial,sans-serif"><p style="margin:0;font-size:14px;text-align:center;mso-line-height-alt:16.8px"><strong><span style="font-size:42px;">Добро пожаловать!</span></strong></p></div></div></td></tr></tbody></table>
<table class="text_block block-2" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;word-break:break-word"><tbody><tr><td class="pad" style="padding-bottom:10px;padding-left:15px;padding-right:15px;padding-top:10px"><div style="font-family:sans-serif"><div class="" style="font-size:14px;mso-line-height-alt:16.8px;color:#9393a0;line-height:1.2;font-family:Helvetica Neue,Helvetica,Arial,sans-serif"><p style="margin:0;font-size:14px;text-align:center;mso-line-height-alt:16.8px">
<span style="font-size:22px;"><span style="">&nbsp;Мы рады видеть Вас в рядах<br>пользователей нашего сайта.</span></span></p></div></div></td></tr></tbody></table>
<table class="text_block block-3" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;word-break:break-word"><tbody><tr><td class="pad" style="padding-bottom:10px;padding-left:15px;padding-right:15px;padding-top:20px"><div style="font-family:sans-serif"><div class="" style="font-size:14px;mso-line-height-alt:16.8px;color:#9393a0;line-height:1.2;font-family:Helvetica Neue,Helvetica,Arial,sans-serif"><p style="margin:0;font-size:14px;text-align:center;mso-line-height-alt:16.8px"><span style="font-size:16px;">Ознакомится с правилами нашего портала Вы можете<br>нажав на эту кнопку:</span></p></div></div></td></tr></tbody></table>
<div class="spacer_block block-4" style="height:20px;line-height:20px;font-size:1px"> </div>
<table class="button_block block-5" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0"><tbody><tr><td class="pad" style="padding-bottom:20px;padding-left:10px;padding-right:10px;padding-top:15px;text-align:center"><div class="alignment" align="center">
<!--[if mso]><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="http://aist.site/portal-rules.php" style="height:42px;width:229px;v-text-anchor:middle;" arcsize="0%" stroke="false" fillcolor="#28a750"><v:textbox inset="0px,0px,0px,0px"><center style="color:#ffffff; font-family:Arial, sans-serif; font-size:16px"><![endif]-->
<a href="http://aist.site/portal-rules.php" target="_blank" style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#28a750;border-radius:0px;width:auto;border-top:0px solid transparent;font-weight:undefined;border-right:0px solid transparent;border-bottom:0px solid transparent;border-left:0px solid transparent;padding-top:5px;padding-bottom:5px;font-family:Helvetica Neue, Helvetica, Arial, sans-serif;font-size:16px;text-align:center;mso-border-alt:none;word-break:keep-all;"><span style="padding-left:50px;padding-right:50px;font-size:16px;display:inline-block;letter-spacing:normal;"><span dir="ltr" style="word-break: break-word;"><span style="line-height: 32px;" dir="ltr" data-mce-style="">Правила портала</span></span></span></a>
<!--[if mso]></center></v:textbox></v:roundrect><![endif]-->
</div></td></tr></tbody></table>
</td></tr></tbody></table></td></tr></tbody></table>
<table class="row row-4" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0"><tbody><tr><td><table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#fff;color:#000;width:640px" width="640">
<tbody><tr><td class="column column-1" width="100%" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;padding-bottom:5px;padding-left:20px;padding-right:20px;padding-top:5px;vertical-align:top;border-top:0;border-right:0;border-bottom:0;border-left:0"><div class="spacer_block block-1" style="height:20px;line-height:20px;font-size:1px"> </div></td></tr></tbody>
</table></td></tr></tbody></table>
<table class="row row-5" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0"><tbody><tr><td><table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#e0e2e9;color:#000;width:640px" width="640"><tbody><tr><td class="column column-1" width="100%" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;padding-bottom:5px;padding-left:10px;padding-right:10px;padding-top:5px;vertical-align:top;border-top:0;border-right:0;border-bottom:0;border-left:0">
<div class="spacer_block block-1" style="height:20px;line-height:20px;font-size:1px"> </div>
<table class="text_block block-2" width="100%" border="0" cellpadding="10" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;word-break:break-word"><tbody><tr>
<td class="pad"><div style="font-family:sans-serif"><div class="" style="font-size:12px;mso-line-height-alt:14.399999999999999px;color:#555;line-height:1.2;font-family:Helvetica Neue,Helvetica,Arial,sans-serif"><p style="margin:0;font-size:12px;text-align:center;mso-line-height-alt:14.399999999999999px"><span style="font-size:18px;"><strong>Служба поддержки сайта: <em>info@aist.site</em></strong></span></p></div></div></td>
</tr></tbody></table>
<div class="spacer_block block-3" style="height:10px;line-height:10px;font-size:1px"> </div>
</td></tr></tbody></table></td></tr></tbody></table>
<table class="row row-6" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0"><tbody><tr><td><table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;color:#000;width:640px" width="640"><tbody><tr><td class="column column-1" width="100%" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;padding-bottom:5px;padding-top:5px;vertical-align:top;border-top:0;border-right:0;border-bottom:0;border-left:0"><div class="spacer_block block-1" style="height:20px;line-height:20px;font-size:1px"> </div></td></tr></tbody></table></td></tr></tbody></table>
</td></tr></tbody></table>
</body></html>
								';
								mail($to, $subject, $message, $headers);

							} else {
								echo '<p style="font-size: 14px;" class="text-danger">'. array_shift($errors) .'</p><hr>';
							}
						}
						?>
						<button name="signup" class="form-control mb-2 btn btn-outline-success" id="input5">Продолжить</button>
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
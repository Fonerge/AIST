<?php
	require 'inc/db.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<title>Контакты</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="copyright" content="AIST.inc">
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="robots" content="noindex">

	<link rel="icon" href="images/assets/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="images/assets/favicon.ico">
	<link rel="apple-touch-icon" href="images/assets/apple-touch-icon.png">
	<link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon.png">

	<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous" defer></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous" defer></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" defer></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/loader.css">
</head>
<body>
	<?php require('inc/header.php'); ?>
	<!-- main content -->
	<main class="mb-5">
		<div class="container mt-5">
			<h2 class="text-center">Как связаться с нами?</h2>
			<p class="text-center" style="font-size: 18px;">По вопросам рекламы, объявлений или портала АИСТ вы можете связаться с нами:</p>
			<div class="text-center mb-2">
				<p style="font-size: 18px;"><b>В мессенждерах:</b></p>
				<ul>
					<li><a href=""><img src="images/assets/telegram.png" width="26px" height="26px">Telegram</a></li>
					<li><a href=""><img src="images/assets/whatsapp.png" width="30px" height="30px">Whatsapp</a></li>
				</ul>
				<p style="font-size: 18px;"><b>По почте:</b></p>
				<ul>
					<li><a href="mail:suppot@aist.com">support@aist.com</a></li>
				</ul>
			</div>
			<div class="text-center">
				<p class="mb-2"><b>Подписывайтесь на нас в соц.сетях:</b></p>
				<ul>
					<li><a href=""><img src="images/assets/facebook.png" width="30px" height="30px">Facebook</a></li>
					<li><a href=""><img src="images/assets/youtube.png" width="30px" height="30px">Youtube</a></li>
				</ul>
				<p class="text-center mb-3" style="font-size: 18px;">Мы обязательно свяжемся с Вами в близжайшее время.</p>
				<hr>
				<p style="font-size: 18px; color:#2f8f4a;"><em>Желаем Вам удачи!</em></p>
				<hr>
			</div>
		</div>
	</main>
	<!-- main content end. -->
	<?php require('inc/footer.php') ?>
</body>
</html>
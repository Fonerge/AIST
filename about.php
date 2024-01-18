<?php
	require 'inc/db.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<title>О портале</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="copyright" content="AIST.inc">
	<meta name="keywords" content="">
	<meta name="description" content="АИСТ - это портал для русскоязычных мигрантов в Турции. Символ нашего портала является аист - перелётная птица, мигрирующая из одной точки мира в другую.">
	<meta name="robots" content="all">

	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
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
			<h2 class="text-center">
				О нашем проекте.
			</h2>
			<div class="row">
				<div class="col-md-6">
					<p style="font-size: 17px;" class="mt-3">
						<a href="index.php">АИСТ</a> - это портал для русскоязычных мигрантов в Турции. Символ нашего портала является
						аист - перелётная птица, мигрирующая из одной точки мира в другую.
					</p>
					<p style="font-size: 17px;">
						На нашем портале Вы сможете бесплатно разместить объявление о продаже вещей, товаров или услуг.
						Выставляйте или ищите вакансии о работе в своём городе Турции. Если вы компания или частное лицо,
						желающее <a href="advertiser.php">разместить рекламу</a> на нашем сайте, то сделать это будет просто, обратившись к нам.
					</p>
				</div>
				<div class="col-md-6">
					<div class="w-100 mt-3" style="height: 220px; border: 1px solid #28A750;">
						<img src="images/assets/turkey.jpg" class="h-100 w-100">
					</div>
				</div>
			</div>
			<h3 class="text-center mt-4">Наши преимущества.</h3>
			<div class="row mt-4">
				<div class="col-md-4">
					<article class="text-center" style="font-size: 18px;">Избавьтесь от тысячи ненужных Telegram-чатов</article>
					<p class="text-secondary mt-2">
						Мы ничего не имеем против мессенджера Telegram, но в последнее время
						появилось тысяча чатов, в которых нет структурированной информации,
						сложно продвигать свои объявления с ограничениями, которые ставят администраторы.
					</p>
				</div>
				<div class="col-md-4">
					<article class="text-center" style="font-size: 18px;">Структура информации</article>
					<p class="text-secondary mt-2">На нашем сайте Вы сможете быстрее найти более подходящее объявление, за счёт того что объявления разделены по категориям на страницах сайта.
					</p>
				</div>
				<div class="col-md-4">
					<article class="text-center" style="font-size: 18px;">Лояльное отношение</article>
					<p class="text-secondary mt-2">
						У нас более лояльное отношение к пользователям нашего сайта,
						потому что мы действительно хотим помочь им.
					</p>
				</div>
			</div>
			<hr>
			<li style="list-style: circle;">В разделе <a href="http://aist.site/useful-info">Полезная информация</a> Вы сможете прочитать статьи касаемо 
			миграции и прибывании в Турции.</li>
			<li style="list-style: circle;">Чтобы не возникало много вопросов, просим Вас ознакомиться с <a href="http://aist.site/portal-rules">правилами портала</a>.</li>
			<hr>
		</div>
	</main>
	<!-- main content end. -->
	<?php require('inc/footer.php'); ?>
</body>
</html>
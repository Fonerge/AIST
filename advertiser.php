<?php
	require 'inc/db.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<title>Для рекламодателей</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="copyright" content="AIST.inc">
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="robots" content="noindex">

	<link rel="icon" href="IMAGES/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="IMAGES/favicon.ico">
	<link rel="apple-touch-icon" href="IMAGES/apple-touch-icon.png">
	<link rel="apple-touch-icon-precomposed" href="IMAGES/apple-touch-icon.png">

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
		<div class="container">
			<h2 class="text-center mt-5">Cтатья о размещении рекламы.</h2>
			<div class="row">
				<div class="col-md-7 mt-4">
					<div class="w-100">
						<p style="font-size: 17px;">Реклама, размещаемая на нашем сайте, представлена в виде баннеров на страницах.
							Каждому рекламному баннеру на сайте определяется номер позиции. Чем выше позиция - тем дороже цена за размещение (за искл. длинного баннера позиции №4 на <a href="index.php">глав.стр.</a>).
							Разместить рекламу можно на <a href="index.php">главной странице</a> сайта или
							на любых страницах выбранных категорий объявлений (например: <a href="estate.php">Недвижимость</a>, <a href="auto.php">Автомобили</a>).
						</p>
						<p style="font-size: 17px;">
							Также Вы можете разместить рекламу своего Telegram чата в виде названия самого чата, которое будет висеть
							в отдельном списке. При нажатии на название чата, будет выполнен переход на ссылку в Telegram.
						</p>
					</div>
				</div>
				<div class="col-md-5 mt-4">
					<div class="w-100" style="border: 1px solid #28a750; height: 250px;">
						<a href="" class="img img-2 d-flex justify-content-center align-items-center" data-toggle="modal" data-target="#exampleModal1">
							<img src="IMAGES/ad-pos.png">
						</a>
					</div>
					
				</div>
				<!-- modal -->
				<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	          		<div class="modal-dialog">
		          		<div class="modal-content w-100 h-100">
		          			<img src="IMAGES/ad-pos.png" width="1193px" height="640px">
		          		</div>
	          		</div>
          		</div>
			</div>
		</div>
		<div class="container mt-5">
			<h3 class="text-center">Расценка размещения рекламы на <a href="index.php">главной странице</a>.</h3> 
			<div class="table-responsive"> 
				<table id="exportTable" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Размер, пикс.</th>
							<th>Позиция, №</th>
							<th>Цена, мес.</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							 <td>350x77</td>
							 <td>1</td>
							 <td>120 TL</td>
						</tr>
						<tr>
							 <td>350x77</td>
							 <td>2</td>
							 <td>115 TL</td>
						</tr>
						<tr>
							 <td>350x77</td>
							 <td>3</td>
							 <td>110 TL</td>
						</tr>
						<tr>
							 <td>730x77</td>
							 <td>4</td>
							 <td>125 TL</td>
						</tr>
						
					</tbody>
				</table>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-7 mt-5">
					<div class="w-100">
						<p style="font-size: 17px;">Реклама, размещаемая на страницах выбранных категорий объявлений (например: <a href="estate.php">Недвижимость</a>, <a href="auto.php">Автомобили</a>), представлена в виде 10 баннеров с присовенными позициями. Чем выше - позиция тем выше цена. Узнать о том, какие есть страницы с категориями объявлений, можно нажав на меню сайта.
						</p>
						<p style="font-size: 17px;">
							При обращении на размещение рекламы можно выбрать страницу, на которой будет она размещена, а также позицию. Имейте ввиду, что ваши услуги в рекламе должны соотвествовать категории страницы, на которой публикуются объявления (Например: услуги в сфере недвижимости, должны быть размещены на странице <a href="estate.php">Недвижимость</a>). 
						</p>
					</div>
				</div>
				<div class="col-md-5 mt-5">
					<div class="w-100" style="border: 1px solid #28a750; height: 250px;">
						<a href="" class="img img-2 d-flex justify-content-center align-items-center" data-toggle="modal" data-target="#exampleModal2">
							<!-- <img src="IMAGES/"> -->
						</a>
					</div>
					
				</div>
				<!-- modal -->
				<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	          		<div class="modal-dialog">
		          		<div class="modal-content w-100 h-100">
		          			<img src="IMAGES/ad-pos.png" width="1193px" height="640px">
		          		</div>
	          		</div>
          		</div>
			</div>
		</div>
		<div class="container mt-5">
			<h3 class="text-center">Расценка размещения рекламы на страницах категорий.</h3> 
			<div class="table-responsive"> 
				<table id="exportTable" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Размер, пикс.</th>
							<th>Позиция, №</th>
							<th>Цена, мес.</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							 <td>350x77</td>
							 <td>1</td>
							 <td>120 TL</td>
						</tr>
						<tr>
							 <td>350x77</td>
							 <td>2</td>
							 <td>115 TL</td>
						</tr>
						<tr>
							 <td>350x77</td>
							 <td>3</td>
							 <td>110 TL</td>
						</tr>
						<tr>
							 <td>350x77</td>
							 <td>4</td>
							 <td>110 TL</td>
						</tr>
						<tr>
							 <td>350x77</td>
							 <td>5</td>
							 <td>110 TL</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="container mt-5">
			<h3 class="text-center text-danger">Реклама, запрещённая к размещению:</h3>
			<div class="w-100 d-flex justify-content-center">
				<ul class="ml-4">
					<li style="list-style-type: circle;">Наркотические вещества, наркошопы, психотроптропные вещества и т.п.</li>
					<li style="list-style-type: circle;">Контрабанда, оружие, услуги по отмыву денежных средств, поддельные деньги/документы.</li>
					<li style="list-style-type: circle;">Букмейкерские конторы, финансовые пирамиды, казино, игровые рулетки.</li>
					<li style="list-style-type: circle;">Эскорт, секс-услуги, проституция.</li>
					<li style="list-style-type: circle;">Эзотерические услуги, услуги гадания, астрология и т.п.</li>
					<li style="list-style-type: circle;">Табачные изделия, электронные сигареты, алкогольная продукция.</li>
				</ul>
			</div>
		</div>
		<div class="container mt-5">
			<div class="w-100">
				Если Вы хотите разместить рекламу на сайте или хотите задать вопрос по поводу размещения,
				обращайтесь в наш <a href="https://t.me/aist_inc">Telegram</a> / <a href="">WhatsApp</a> или на почту <a href="">support@aist.com</a>
			</div>
		</div>
	</main>
	<!-- main content end. -->
	<?php require('inc/footer.php'); ?>
</body>
</html>
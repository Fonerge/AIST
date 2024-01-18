<?php require 'inc/db.php'; ?>
<?php if (isset($_SESSION['logged_user'])) : ?>
<?php $us_con = R::findOne('user', 'id = ?', [$_SESSION['logged_user']->id]); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Разместить объявление</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/x-icon" href="http://aist.site/images/assets/favicon.ico">
	<link rel="shortcut icon" type="image/x-icon" href="http://aist.site/images/assets/favicon.ico">
	<link rel="apple-touch-icon" type="image/x-icon" href="http://aist.site/images/assets/apple-touch-icon.png">
	<link rel="apple-touch-icon-precomposed" type="image/x-icon" href="http://aist.site/images/assets/apple-touch-icon.png">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<!-- JQuery -->
	<script src="https://code.jquery.com/jquery-3.6.4.js"></script>
	<script src="http://aist.site/js/create-post.js"></script>
	<!-- font awesome cdn link  -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
	<style type="text/css">
		.block {width: 350px; height: 350px;position: absolute;top: 48%;left: 48%;margin: -130px 0 0 -130px;}
		.sidebar {margin: 0;padding: 0;width: 200px;background-color: #1D1D1E;position: fixed;height: 100%;overflow: auto;}
		.sidebar a {display: block;color: #fff;padding: 16px;text-decoration: none;}
		.sidebar a.active {background-color: #04AA6D;color: white;}
		.sidebar a:hover:not(.active) {background-color: #04AA6D;color: white;}
		div.content {margin-left: 200px;padding: 1px 16px;height: 500px;}
		textarea {height: 150px;}
		@media screen and (max-width: 700px) {.sidebar {width: 100%;height: auto;position: relative; margin-bottom: 20px;}.sidebar {float: left;}div.content {margin-left: 0;}}
		@media screen and (max-width: 768px) {.sidebar a {float: none;}}
		.btn-success {border: 1px solid #28A750; background: #28A750;}
		.btn-success:hover {border: 1px solid #28A750; color: #28A750; background: #fff; transition: 0.3s;}
		.label-for {color: #28A750; font-weight: 600; letter-spacing: 0.16em; margin-left: 5px;}
		.span-for {font-size: 13px; font-weight: 400; letter-spacing: 0;}
		.error {
			color:crimson;
		}
		.success {
			color:darkgreen;
		}
	</style>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="stylesheet" type="text/css" href="css/loader.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<div class="mask">
    <div class="loader"></div>
</div>
<body>
	<main class="mb-5">
		<div class="sidebar">
			<img src="http://aist.site/images/assets/apple-touch-icon.png" width="80" height="80" style="margin-top: 10px; margin-left: 10px; margin-bottom: 10px;">
			<a href="http://aist.site/">Главная</a>
			<a href="http://aist.site/profile">Ваш профиль</a>
			<a href="http://aist.site/portal-rules">Правила портала</a>
			<a href="http://aist.site/privacy">Политика конфиденциальности</a>
		</div>
		<div class="container">
			<div class="content">
			<h3 class="mt-5">Разместить объявление о продаже/услуге</h3>
			<hr>
			<form id="myForm" class="mt-3" method="POST" enctype="multipart/form-data">
				<label class="label-for">Название</label>

		 		<input type="text" id="post_name" name="post_name" value="<?php echo @$_POST['post_name']; ?>" class="form-control mb-2" placeholder="Название объявления">

		 		<label class="label-for">Категория</label>

		 		<select id="post_category" name="post_category" value="<?php echo @$_POST['post_category']; ?>" class="form-control mb-2">
		 			<option value="0">Категория объявления</option>
		 			<option value="Недвижимость">Недвижимость</option>
		 			<option value="Транспорт">Транспорт</option>
		 			<option value="Электронника">Электронника</option>
		 			<option value="Товары для дома">Товары для дома</option>
		 			<option value="Рабочие вакансии">Рабочие вакансии</option>
		 			<option value="Личные вещи">Личные вещи</option>
		 			<option value="Услуги">Услуги</option>
		 			<option value="Ремонт">Ремонт</option>
		 			<option value="Туризм">Туризм</option>
		 			<option value="Обучение">Обучение</option>
		 		</select>

		 		<label class="label-for">Район</label>

		 		<select id="post_rajon" name="post_rajon" value="<?php echo @$_POST['post_rajon']; ?>" class="form-control mb-2">
		 			<option value="0">Район</option>
		 			<option value="Центр Алании">Центр Алании</option>
		 			<option value="Авсаллар">Авсаллар</option>
		 			<option value="Каргыждак">Каргыджак</option>
		 			<option value="Оба">Оба</option>
		 			<option value="Махмутлар">Махмутлар</option>
		 			<option value="Тосмур">Тосмур</option>
		 			<option value="Джикджилли">Джикджилли</option>
		 			<option value="Гулер Пинары">Гулер Пинары</option>
		 			<option value="Газипаша">Газипаша</option>
		 		</select>
		 		<!-- input цена -->
		 		<script type="text/javascript">
		 			function formatNumber(input) {
					  var num = input.value;
					  num = num.replace(/[^\d ,]/g, '');
					  num = num.replace(/(\d)(?=(\d{9})+(?!\d))/g, '$1,');
					  num = parseFloat(num);
					  if (isNaN(num)) {
					    input.value = '';
					    return;
					  }
					  num = num.toLocaleString(undefined, {minimumFractionDigits: 0, maximumFractionDigits: 2}).replace(/\./g, ',');
					  input.value = num;
					}

					function isNumberKey(evt) {
					  var charCode = (evt.which) ? evt.which : evt.keyCode;
					  if (charCode == 44 || charCode == 32 || (charCode >= 48 && charCode <= 57)) {
					    return true;
					  } else {
					    return false;
					  }
					}
		 		</script>
		 		<label class="label-for">Цена, ₺</label>

		 		<input type="text" class="form-control mb-2" id="price" name="price" value="<?php echo @$_POST['price']; ?>" placeholder="Цена" onkeypress="return isNumberKey(event)" onkeyup="formatNumber(this)">

		 		<label class="label-for">Описание</label>

		 		<textarea class="form-control mb-2" id="post_descriptions" name="post_descriptions" wrap placeholder="Описание"><?php echo @$_POST['post_descriptions']; ?></textarea>

		 		<select class="form-control mb-2" id="contacts" name="contacts">
		 			<option value="0">Выберите контакт</option>
		 			<option value="https://t.me/<?= $us_con->telegram; ?>">Telegram</option>
		 			<option value="https://wa.me/<?= $us_con->whatsapp; ?>">Whatsapp</option>
		 		</select>

		 		<label class="label-for">Прикрепить фото <span class="span-for text-muted">макс. кол-во 9 шт.</span></label>
		 		<input class="form-control mb-2" type="file" id="images" multiple>
		 		<input type="hidden" id="post_date_time" name="post_date_time" value="<?php echo date('d.m.Y (H:i)'); ?>">
		 		<hr>
				<div class="text-center mb-2" style="font-size: 18px; font-weight: 500;" id="create-message"></div>
		 		<input onclick="alert('Вы уверены, что хотите разместить объявление?');" type="submit" class="btn btn-success w-100 mb-5" id="add_post" name="add_post">
		 	</form>
		</div>
		</div>
	</main>
    <script src="http://aist.site/js/loader.js"></script>
</body>
</html>
<?php else : header('Location: signin.php');?>
<?php endif; ?>


<?php
	require '../inc/db.php'; 
	$postId = strip_tags($_GET['post']);
	$post = R::load('posts', $postId);
	if (!$post->id or $post->post_status == "На рассмотрении") {
	    header('Location: ../404.php');
	    exit;
	}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<title><?php echo $post->post_name; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="copyright" content="aist.site">
	<meta name="description" content="<?php echo $post->post_description; ?>">
	<meta name="robots" content="all">
	<!-- FAVICONS ICONS -->
	<link rel="icon" type="image/x-icon" href="http://aist.site/images/assets/favicon.ico">
	<link rel="shortcut icon" type="image/x-icon" href="http://aist.site/images/assets/favicon.ico">
	<link rel="apple-touch-icon" type="image/x-icon" href="http://aist.site/images/assets/apple-touch-icon.png">
	<link rel="apple-touch-icon-precomposed" type="image/x-icon" href="http://aist.site/images/assets/apple-touch-icon.png">
	<!-- JQuery -->
	<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
	<!-- font awesome cdn link  -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	<!-- Bootstrap 4 -->
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<!-- AJAX 3.2.1 -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- bootstrap 4 JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous" defer></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous" defer></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" defer></script>
	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- STYLE (CSS) -->
	<link rel="stylesheet" type="text/css" href="http://aist.site/css/style.css">
    <link rel="stylesheet" type="text/css" href="css/loader.css">
	<style type="text/css">
		* {box-sizing: border-box;}
		img {vertical-align: middle;}
		.containers {position: relative;}
		.mySlides {border: 1px solid #28A750;width: 100%;height: 300px;overflow: hidden;display: none;}
		.mySlides img {display: block;width: 100%;height: 100%;object-fit: cover;}
		.cursor {cursor: pointer;}
		.prev,
		.next {cursor: pointer;position: absolute;top: 48%;width: auto;padding: 16px;margin-top: -50px;color: white;font-weight: bold;font-size: 20px;border-radius: 0 3px 3px 0;user-select: none;-webkit-user-select: none;}
		.next {right: 0;border-radius: 3px 0 0 3px;}
		.prev:hover,
		.next:hover {background-color: rgba(0, 0, 0, 0.8);}
		.numbertext {color: #2EE175;font-size: 12px;padding: 8px 12px;position: absolute;top: 0;}
		.caption-container {text-align: center;background-color: #222;padding: 2px 16px;color: white;}
		.rows {margin-top: 10px;}
		.rows:after {content: "";display: table;clear: both;}
		.column {float: left;width: 16.66%;height: 60px;overflow: hidden;}
		.demo {opacity: 0.6;width: 100%;height: 100%;display: block;object-fit: cover;}
		.active,
		.demo:hover {opacity: 1;}
	</style>	
</head>
<body>
	<?php require('../inc/header.php'); ?>
	<!-- main content -->
	<main class="mb-5">
		<div class="container">
			<div class="row">
				<div class="col-md-5 mt-5">
					<div class="containers">
						<?php $photos = R::findAll('images', 'post_id = ?', [$postId]); ?>
						<?php if (!empty($photos)): ?>
						    <?php foreach (array_slice($photos, 0, 9) as $i => $photo): ?>
						    <div class="mySlides">
						        <div class="numbertext"><?php echo $i+1; ?> / <?php echo count($photos); ?></div>
						        <img src="http://aist.site/images/post_images/<?php echo $photo['name']; ?>" style="width:100%">
						    </div>
						    <?php endforeach; ?>
						<?php else: ?>
						    <div class="mySlides">
						        <div class="numbertext">1 / 1</div>
						        <img src="http://aist.site/images/post_images/default.jpg" style="width:100%">
						    </div>
						<?php endif; ?>
					  	<a class="prev" onclick="plusSlides(-1)">❮</a>
  						<a class="next" onclick="plusSlides(1)">❯</a>
					  	<div class="rows">
					  		<?php $photos = R::findAll('images', 'post_id = ?', [$postId]); ?>
							<?php foreach (array_slice($photos, 0, 9) as $i => $photo): ?>
							    <?php if (!empty($photo['name'])): ?>
							        <div class="column">
							            <img class="demo cursor" src="http://aist.site/images/post_images/<?php echo $photo['name']; ?>" style="width:100%" onclick="currentSlide(<?php echo $i+1; ?>)">
							        </div>
							    <?php else: ?>
							        <div class="column">
							            <img class="demo cursor" src="http://aist.site/images/post_images/default.jpg" style="width:100%" onclick="currentSlide(<?php echo $i+1; ?>)">
							        </div>
							    <?php endif; ?>
							<?php endforeach; ?>
						</div>
					</div>
					<script>
						var slideIndex = 1;
						showSlides(slideIndex);

						function plusSlides(n) {
						  showSlides(slideIndex += n);
						}

						function currentSlide(n) {
						  showSlides(slideIndex = n);
						}

						function showSlides(n) {
						  var i;
						  var slides = document.getElementsByClassName("mySlides");
						  var dots = document.getElementsByClassName("demo");
						  var captionText = document.getElementById("caption");
						  if (n > slides.length) {slideIndex = 1}
						  if (n < 1) {slideIndex = slides.length}
						  for (i = 0; i < slides.length; i++) {
						      slides[i].style.display = "none";
						  }
						  for (i = 0; i < dots.length; i++) {
						      dots[i].className = dots[i].className.replace(" active", "");
						  }
						  slides[slideIndex-1].style.display = "block";
						  dots[slideIndex-1].className += " active";
						  captionText.innerHTML = dots[slideIndex-1].alt;
						}
					</script>
				</div>
				<div class="col-md-7 mt-5">
					<h4><?= $post->post_name; ?></h4>
					<span class="text-secondary" style="font-size: 13px;">Дата и время: <?= $post->post_date_time; ?></span>
					<hr>
					<label class="text-secondary" style="font-size: 13.5px;">Описание:</label>
					<p style="font-size: 17px">
						<span style="font-weight: 400;"><?= nl2br($post->post_description); ?></span>
					</p>

					<label class="text-secondary" style="font-size: 14px;">
						Район: <b><?= $post->post_rajon; ?></b>
					</label>

					<p style="font-size: 14px;" class="text-secondary">
						Цена: <b class="text-success" style="font-size: 17px"><?= $post->post_price; ?> ₺</b>
					</p>
					<hr/>
					<div class="mb-2" style="height: 40px; width: 300px; background: #1D1D1E; border-radius: 5px; position: relative;">
					    <p style="margin: 0; position: absolute; top: 20%; margin-left: 13%;" class="text-center text-white">
					    	Контакты: <a target="_blank" href="<?= $post->post_contact; ?>" id="phone-number" style="color: orange;">
					    		<?php 
					    		if (strrpos($post->post_contact, 'https://t.me/') !== false) {
					    			echo trim($post->post_contact, 'https://t.me/');
					    		}
					    		if (strrpos($post->post_contact, 'https://wa.me/') !== false) {
					    			echo trim($post->post_contact, 'https://wa.me/');
					    		}
					    		?>
					    </a> <span id="show-hide" style="cursor: pointer; color: orange;">показать номер</span>
						</p>
					</div>
					<script type="text/javascript">
						const phoneNumber = document.getElementById("phone-number");
						const showHide = document.getElementById("show-hide");

						phoneNumber.style.display = "none"; // Скрыть номер телефона при загрузке страницы

						showHide.addEventListener("click", function() {
						  if (phoneNumber.style.display === "none") {
						    phoneNumber.style.display = "inline";
						    showHide.style.display = "none"; // Скрыть элемент "показать номер" при отображении номера телефона
						  }
						});

						phoneNumber.addEventListener("click", function() {
						  phoneNumber.style.display = "none";
						  showHide.style.display = "inline"; // Показать элемент "показать номер" при скрытии номера телефона
						});
					</script>
					<div style="width: 300px; border: 1px solid #CFCFCF; border-radius: 5px; display: flex; justify-content: space-around;">
						<a style="font-size: 30px;" target="_blank" href="https://telegram.me/share/url?url=https://aist.site/post/<?= strip_tags($postId); ?>/"><i class="fab fa-telegram"></i></a>
						<a style="font-size: 30px;color: #28A750;" target="_blank" href="https://wa.me/?text=https://aist.site/post/<?= strip_tags($postId); ?>/"><i class="fab fa-whatsapp"></i></a>
						<a style="font-size: 30px;" target="_blank" href="https://www.facebook.com/sharer.php?u=https://aist.site/post/<?= strip_tags($postId); ?>/"><i class="fab fa-facebook"></i></a>
						<a style="font-size: 30px;" target="_blank" href="https://vk.com/share.php?url=https://aist.site/post/<?= strip_tags($postId); ?>/"><i class="fab fa-vk"></i></a>
					</div>
				</div>
			</div>
		</div><!-- container end. -->
	</main>
	<!-- main content end. -->
	<?php require('../inc/footer.php'); ?>	
</body>
</html>
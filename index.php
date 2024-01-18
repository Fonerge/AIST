<?php
    // error_reporting(0);
	require 'inc/db.php';
	$posts = R::findAll('posts', 'post_status = ? ORDER BY id DESC LIMIT 20', ['Одобрено']);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<title>Главная</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="copyright" content="AIST.site">
	<meta name="keywords" content="aist site">
	<meta name="description" content="AIST - Портал №1 для русскязычных эммигрантов в Турции. Разместить объявление или рекламу.">
	<meta name="robots" content="all">
	<!-- FAVICONS ICON -->
	<link rel="icon" type="image/x-icon" href="images/assets/favicon.ico">
	<link rel="shortcut icon" type="image/x-icon" href="images/assets/favicon.ico">
	<link rel="apple-touch-icon" type="image/x-icon" href="images/assets/apple-touch-icon.png">
	<link rel="apple-touch-icon-precomposed" type="image/x-icon" href="images/assets/apple-touch-icon.png">
	<!-- JQuery -->
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
	<link rel="stylesheet" type="text/css" href="css/cards.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/loader.css"> -->
</head>
<body>
	<?php require('inc/header.php'); ?>
	<main class="mb-5">
		<div class="container">
			<div class="row">
				<div class="col-md-5 mt-5">
			    	<div class="w-100 p-2" style="height: 250px; background-color: #1D1D1E; border-radius: 4px; color: #fff;">
			    		<ul class="d-block w-100 h-100 ml-2 mt-2 ulscroll" style="overflow-y: scroll;">
							<style>
								span.news2world_date	{font-size: 9px; margin-right:0.5em; color: #fff;}
								div.news2world_informer	{font-size: 9px; margin-bottom: 0.3em; color: #fff;}
								div.news2world_title 	{font-size: 16px; margin-bottom: 0.5em; } 
								div.news2world_allnews	{font-size: 15px; margin-top: 0.3em;clear: both; color: #fff; opacity: 0;}  
								div.news2world_annotation {font-size: 9px; margin-bottom: 0.5em; color: #fff;} 
								img.news2world_img {float:left;border:0;margin: 7px 7px 7px 0;width:50px;height:50px; border-radius: 5px;} 
								div.news2world {clear: both}
							</style>
							<div class="news2world_title"><a href="https://news2world.net/" style="color: #fff;"><h4 class="text-center" style="font-size: 16px;">Новости</h4></a></div>
							<script type="text/javascript">
								var news2world_col=10;
								var news2world_cut='→';
							</script>
							<script type="text/javascript" src="https://news2world.net/informer/2.utf.js"></script>
			    		</ul>	
			    	</div>
			    </div>
			    <div class="col-md-3 mt-5">
			    	<div class="mb-2 w-100 p-1 ulscroll" style="height: 121px; background-color: #1D1D1E; border-radius: 4px; color: #fff; overflow-y: scroll;">
			    		<h4 class="text-center" style="font-size: 16px;">Погода</h4>
			    		<ul class="w-100 text-center" style="font-size: 15px;">
			    			<li>
			    				<div class="nuipogoda-html-informer"><div>Стамбул <span data-nuipogoda="temp" style="color: orange;"></span> - <span data-nuipogoda="cloud"></span></div><a title="НУ И ПОГОДА" href="https://stambul.nuipogoda.ru"></a></div><script>(function(a,f,g){var e=a.createElement(f);e.async=1;e.src=g; a=a.getElementsByTagName(f)[0];a.parentNode.insertBefore(e,a)})(document,'script','//nuipogoda.ru/informer/nuipogoda.js');</script>
			    			</li>
			    			<li>
			    				<div class="nuipogoda-html-informer"><div>Анталья <span data-nuipogoda="temp" style="color: orange;"></span> - <span data-nuipogoda="cloud"></span></div><a title="НУ И ПОГОДА" href="https://antalya.nuipogoda.ru"></a></div><script>(function(a,f,g){var e=a.createElement(f);e.async=1;e.src=g; a=a.getElementsByTagName(f)[0];a.parentNode.insertBefore(e,a)})(document,'script','//nuipogoda.ru/informer/nuipogoda.js');</script>
			    			</li>

			    			<li>
			    				<div class="nuipogoda-html-informer"><div>Измир <span data-nuipogoda="temp" style="color: orange;"></span> - <span data-nuipogoda="cloud"></span></div><a title="НУ И ПОГОДА" href="https://izmir.nuipogoda.ru"></a></div><script>(function(a,f,g){var e=a.createElement(f);e.async=1;e.src=g; a=a.getElementsByTagName(f)[0];a.parentNode.insertBefore(e,a)})(document,'script','//nuipogoda.ru/informer/nuipogoda.js');</script>
			    			</li>
			    		</ul>
			    	</div>
			    	<div class="w-100 p-1" style="height: 121px; background-color: #1D1D1E; border-radius: 4px; color: #fff;">
			    		<h4 class="text-center" style="font-size: 16px;">Курс валют</h4>
			    		<ul class="w-100 text-center" style="font-size: 15px;">
			    			<li>
			    				<a><img src="images/assets/usa-flag.png" width="24px" height="24px"> - <span data-value="USD"></span> ₽</a>
			    			</li>
			    			<li>
			    				<a><img src="images/assets/euro-flag.png" width="24px" height="24px"> - <span data-value="EUR"></span> ₽</a>
			    			</li>
			    			<li>
			    				<a><img src="images/assets/turk-flag.png" width="26px" height="26px"> - <span data-value="TRY"></span> ₽</a>
			    			</li>
			    		</ul>
			    	</div>
			    </div>
			    <div class="col-md-4 mt-5">
			    	<div class="mb-2 w-100" style="height: 78px; border: 1px solid #28A750; border-radius: 5px; overflow: hidden;">
			    		<a href=""><img style="object-fit: cover;" class="w-100 h-100" src="http://aist.site/images/assets/ad-2.png"></a>	
			    	</div>
			    	<div class="mb-2 w-100" style="height: 78px; border: 1px solid #28A750; border-radius: 5px; overflow: hidden;">
			    		<a href=""><img style="object-fit: cover;" class="w-100 h-100" src="http://aist.site/images/assets/ad-1.png"></a>	
			    	</div>
			    	<div class="w-100"  style="height: 78px; border: 1px solid #28A750; border-radius: 5px; overflow: hidden;">
			    		<a href=""><img style="object-fit: cover;" class="w-100 h-100" src="http://aist.site/images/assets/ad-2.png"></a>	
			    	</div>
			    </div>
			</div>
			<div class="row">
				<div class="col-md-8 mt-5">
					<div style="height: 78px; border: 1px solid #28A750; border-radius: 5px; overflow: hidden;">
						<a href=""><img style="object-fit: cover;" class="w-100 h-100" src="http://aist.site/images/assets/ad-1.png"></a>				
					</div>
				</div>
				<div class="col-md-4 mt-5">
					<div class="w-100">
						<h5 class="ml-4" style="text-decoration: underline; letter-spacing: 0.3em;">Telegram-чаты</h5>
						<ul class="ml-4">
							<li style="list-style-type: circle;"><a href="https://t.me/aist_general_chat" target="_blank">AIST | Общий чат | Вопросы | Турция</a></li>
							<li style="list-style-type: circle;"><a href="https://t.me/aist_estate_chat" target="_blank">AIST | Недвижимость | Аланья</a></li>
							<li style="list-style-type: circle;"><a href="https://t.me/aist_services_chat" target="_blank">AIST | Разные услуги | Аланья</a></li>	
						</ul>
					</div>
				</div>
			</div>
			<h4>Последние размещённые объявления</h4>
			<hr>
			<div class="row">
				<?php if (!empty($posts)){ foreach ($posts as $post) { ?>
        		<div class="col-md-6 col-lg-3 mb-3">
					<div class="card">
	              		<a href="http://aist.site/post/<?php echo $post->id; ?>/" class="span-img">
						    <?php $photos = R::findAll('images', 'post_id = ?', [$post->id]); ?>
						    <?php if (!empty($photos)): ?>
						        <?php foreach (array_slice($photos, 0, 2) as $photo): ?>
						            <?php if (!empty($photo['name'])): ?>
						                <img class="bd-placeholder-img card-img-top" src="http://aist.site/images/post_images/<?php echo $photo['name']; ?>">
						            <?php else: ?>
						                <img class="bd-placeholder-img card-img-top" src="http://aist.site/images/post_images/default.jpg">
						            <?php endif; ?>
						        <?php endforeach; ?>
						    <?php else: ?>
						        <img class="bd-placeholder-img card-img-top" src="http://aist.site/images/post_images/default.jpg">
						    <?php endif; ?>
						</a>

	              		<div class="card-body" style="padding-top: 0;">
	              			<p class="card-title mt-2"><a href="http://aist.site/post/<?php echo $post->id ?>/" class="text-success"><?= $post['post_name']; ?></a></p>
	                		<li class="span-text"><?= $post['post_category']; ?></li>
	                		<li class="span-text ml-auto"><?= $post['post_date_time']; ?></li>
	                		<a href="#" style="font-size: 15px; color: #28A750;"><?= $post['post_rajon']; ?></a>
	                		<p class="card-text">
	                		 	<a class="span-price text-primary"><?= $post['post_price']; ?> ₺</a>
	                		</p>
	              		</div>
    				</div>
				</div>
        		<?php }} else {echo '<article class="ml-3" style="font-weight: 600;">Нет размещённых объявлений...</article>';} ?>
			</div>
			<hr>
		</div>
	</main>
	<!-- main content end. -->
	<?php require('inc/footer.php');?>
	<script src="http://aist.site/js/script.js"></script>
</body>
</html>
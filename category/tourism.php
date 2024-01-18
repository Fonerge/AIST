<?php
	require '../inc/db.php';
	$posts = R::findAll('posts', 'post_status = ? AND post_category = ? ORDER BY id DESC', ['Одобрено', 'Туризм']);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Туризм</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="copyright" content="AIST.site">
	<meta name="keywords" content="aist site">
	<meta name="description" content="AIST - Портал №1 для русскязычных эммигрантов в Турции. Разместить объявление или рекламу.">
	<meta name="robots" content="all">
	<!-- FAVICONS -->
	<link rel="icon" type="image/x-icon" href="http://aist.site/images/assets/favicon.ico">
	<link rel="shortcut icon" type="image/x-icon" href="http://aist.site/images/assets/favicon.ico">
	<link rel="apple-touch-icon" type="image/x-icon" href="http://aist.site/images/assets/apple-touch-icon.png">
	<link rel="apple-touch-icon-precomposed" type="image/x-icon" href="http://aist.site/images/assets/apple-touch-icon.png">
	<!-- JQuery -->
	<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
	<!-- Bootstrap 4 JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous" defer></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous" defer></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" defer></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- STYLE (CSS) -->
	<link rel="stylesheet" type="text/css" href="http://aist.site/css/style.css">
	<link rel="stylesheet" type="text/css" href="http://aist.site/css/cards.css">
    <link rel="stylesheet" type="text/css" href="css/loader.css">
</head>
<body>
	<?php require('../inc/header.php'); ?>
	<main class="mb-5">
		<div class="container mt-5">
			<div class="row">
                <div class="col-sm-12 col-md-12 col-lg-9">
                	<h3>Туризм</h3>
                	<hr>
                	<div class="row">
                		<?php if (!empty($posts)){ foreach ($posts as $post) { ?>
                		<div class="col-md-6 col-lg-4 mb-3">
							<div class="card">
			              		<a href="http://aist.site/category/post.php?post=<?php echo $post->id; ?>" class="span-img">
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
			              			<p class="card-title mt-2"><a href="http://aist.site/category/post.php?post=<?php echo $post->id; ?>" class="text-success"><?= $post['post_name']; ?></a></p>
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
                	</div> <!-- row -->
                	<hr>
                	<!-- <nav aria-label="Страница Недвижимость">
						<ul class="pagination justify-content-center">
						    <li class="page-item disabled"><a class="page-link" href="#"><</a></li>
						    <li class="page-item active"><a class="page-link" href="#">1</a></li>
						    <li class="page-item"><a class="page-link" href="#">2</a></li>
						    <li class="page-item"><a class="page-link" href="#">3</a></li>
						    <li class="page-item"><a class="page-link" href="#">></a></li>
						</ul>
					</nav> --> <!-- пагенация -->
                </div> <!-- col-sm-12 col-md-12 col-lg-9 -->
                <div class="col-sm-12 col-md-12 col-lg-3" style="margin-top: 10px;">
                    <div class="product-sidebar">
                        <div class="product-sidebar__single">
                            <h5>Реклама</h5>
                            <hr>
                            <ul class="list-unstyled product-sidebar__links">
                                <li class="mb-3">
                                	<div style="width: 100%; height: 240px; border: 1px solid dodgerblue;">
                                		<img class="ad-img" src="http://aist.site/images/assets/ad-banner-111.png">	
                                	</div>
                                </li>
                                <li class="mb-3">
                                	<div style="width: 100%; height: 240px; border: 1px solid dodgerblue;">
                                		<img class="ad-img" src="http://aist.site/images/assets/banner-staty.jpg">	
                                	</div>
                                </li>
                                <li class="mb-3">
                                	<div style="width: 100%; height: 240px; border: 1px solid dodgerblue;">
                                		<img class="ad-img" src="http://aist.site/images/assets/ad-banner-111.png">	
                                	</div>
                                </li>
                                <li class="mb-3">
                                	<div style="width: 100%; height: 240px; border: 1px solid dodgerblue;">
                                		<img class="ad-img" src="http://aist.site/images/assets/banner-staty.jpg">	
                                	</div>
                                </li>
                                <li class="mb-3">
                                	<div style="width: 100%; height: 240px; border: 1px solid dodgerblue;">
                                		<img class="ad-img" src="http://aist.site/images/assets/ad-banner-111.png">	
                                	</div>
                                </li>
                            </ul>
                            <hr>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</main>
	<?php require('../inc/footer.php'); ?>
</body>
</html>
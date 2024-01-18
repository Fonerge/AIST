<?php error_reporting(0); error_log(0); ?>
<?php require('inc/db.php'); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<title>Поиск объявлений</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="copyright" content="AIST.site">
	<meta name="keywords" content="aist site">
	<meta name="robots" content="noindex">
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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
	
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        .w-img {width:100%;}
        .w-img:hover {opacity: 0.6;}
        .car-image-block {padding:0px;margin:0px;}
        .car-image-block img {height: 220px; overflow: hidden; object-fit: cover;}
        .crane-image-block {padding:0px;margin:0px;}
        .crane-list-img img {height: 220px; overflow: hidden; object-fit: cover;}
        .q-text {font-size: 15px; color: grey;}
    </style>
    <link rel="stylesheet" type="text/css" href="css/loader.css">
</head>
<body>
    <?php require('inc/header.php'); ?>
    <main class="mt-5 mb-5">
    <div class="cars-horizon">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row py-2">
                    <div class="col-md-7 car-image-block">
                        <h3 class="ml-4"> Поиск объявлений</h3>
                    </div>
                    <div class="col-md-3 ml-auto">
                        <form>
                            <div class="form-group">
                                <select class="form-control" id="filter">
                                    <option>Сортировка</option>
                                    <option value="low-to-high-price">Цена: от низкой до высокой</option>
                                    <option value="high-to-low-price">Цена: от высокой до низкой</option>
                                </select>
                            </div>
                        </form>
                        <script>
                        const selectElement = document.querySelector('#filter');
                        selectElement.addEventListener('change', (event) => {
                            const value = event.target.value;
                            const urlParams = new URLSearchParams(window.location.search);
                            urlParams.set('filter', value);
                            window.location.search = urlParams.toString();
                        });
                        </script>
                    </div>
                    <!-- <div class="col-md-2 pt-1">
                        <a href="#" class="text-success"><i class="fa fa-th fa-2x pr-2"></i> </a>
                        <a href="#" class="text-success"><i class="fa fa-list-ul fa-2x"></i> </a> 
                    </div> -->
                </div>
                <!-- КАРТОЧКА ОБЪЯВЛЕНИЯ -->
                <?php
                if (isset($_GET['q'])) :
                    $search = filter_input(INPUT_GET, 'q', FILTER_SANITIZE_SPECIAL_CHARS);

                    $results = R::find('posts', 'post_name LIKE :post_name', [':post_name' => '%' . $search . '%']);

                    // check for price filters
                    if (isset($_GET['filter'])) {
                        $filter = filter_input(INPUT_GET, 'filter', FILTER_SANITIZE_SPECIAL_CHARS);
                        if ($filter == 'high-to-low-price') {
                            usort($results, function($a, $b) {
                                return $a->post_price - $b->post_price;
                            });
                        } elseif ($filter == 'low-to-high-price') {
                            usort($results, function($a, $b) {
                                return $b->post_price - $a->post_price;
                            });
                        }
                    }
                ?>
                <?php if (count($results) > 0) : ?>
                    <?php foreach ($results as $post) : ?>
                        <div class="row border mb-3">
                            <div class="col-md-4 car-image-block">
                            <a href="http://aist.site/post/<?php echo $post->id; ?>/">
                                <?php $photos = R::findAll('images', 'post_id = ?', [$post->id]); ?>
                                <?php if (!empty($photos)): ?>
                                    <?php foreach (array_slice($photos, 0, 1) as $photo): ?>
                                        <?php if (!empty($photo['name'])): ?>
                                            <img class="w-img" src="http://aist.site/images/post_images/<?php echo $photo['name']; ?>">
                                        <?php else: ?>
                                            <img class="w-img" src="http://aist.site/images/post_images/default.jpg">
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <img class="w-img" src="http://aist.site/images/post_images/default.jpg">
                                <?php endif; ?>
                            </a>
                            </div>
                            <div class="col-md-8 card-body">
                                <a href="http://aist.site/post/<?php echo $post->id; ?>/" class="text-success"><h5><?= $post['post_name']; ?></h5></a>
                                <p class="text-secondary"><?= $post['post_category']; ?></p>
                                <ul class="list-inline">
                                    <li class="list-inline-item q-text" style="max-height: 45px; overflow:hidden;">
                                        <?= $post['post_description']; ?>
                                    </li>
                                </ul>
                                <hr>
                                <a class="text-primary"><b><?= $post['post_price']; ?> ₺</b></a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: echo "<p style='font-size: 18px; font-weight: 600; letter-spacing: 0.3em; color: darkgrey; margin-left:11px;'>По вашему запросу объявления не найдены :(</p>"; ?>
                <?php endif; ?>
            <?php endif; ?>
            </div>
        </div>
    </div>
    </main>
    <?php require('inc/footer.php'); ?>
</body>
</html>
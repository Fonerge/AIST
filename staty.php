<?php
	require 'inc/db.php';
	$statyId = strip_tags($_GET['article']);
	$staty = R::load('articles', $statyId);
	if (!$staty->id) {
	    header('Location: ../404.php');
	    exit;
	}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<title><?php echo $staty->article_title; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="copyright" content="AIST.inc">
	<meta name="keywords" content="aist inc">
	<!-- <meta name="description" content="<?php echo $staty->article_description; ?>"> -->
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
    <!-- <link rel="stylesheet" type="text/css" href="css/loader.css"> -->
</head>
<body>
<?php require('inc/header.php'); ?>
        <!-- Page Content -->
<main class="mt-5 mb-5">
        <div class="container">

<div class="row">
  <div class="col-lg-8">
    <h1 class="mt-4"><?php echo $staty->article_title; ?></h1>
    <p class="lead">
      Автор:
      <a href="http://aist.site/" class="text-success">AIST</a>
    </p>
    <hr>
    <p>Выложенно: <?php echo $staty->article_date_time; ?></p>
    <hr>
    <!-- <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p> -->
    <p>
        <?php echo nl2br($staty->article_description); ?>
    </p>
    <hr>
  </div>

  <!-- Sidebar Widgets Column -->
  <div class="col-md-4">

    <!-- Search Widget -->
    <div class="card my-4">
    <form action="http://aist.site/useful-info" method="get" class="d-flex">
      <div class="card-body">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Поиск статьи..." name="q">
          <span class="input-group-btn">
            <button class="btn btn-success" type="submit"><img src="http://aist.site/images/assets/search.png" width="16px" height="16px"></button>
          </span>
        </div>
      </div>
      </form>
    </div>

    <!-- Categories Widget -->
    <div class="card my-3">
      <h5 class="card-header">Категории</h5>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-6">
            <ul class="list-unstyled mb-1">
              <li>
                <a href="http://aist.site/useful-info?c=estate" class="text-success" style="text-decoration: underline;">Жильё</a>
              </li>
              <li>
                <a href="http://aist.site/useful-info?c=internet" class="text-success" style="text-decoration: underline;">Моб.связь</a>
              </li>
              <li>
                <a href="http://aist.site/useful-info?c=auto" class="text-success" style="text-decoration: underline;">Автомобили</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-6">
            <ul class="list-unstyled mb-1">
              <li>
                <a href="http://aist.site/useful-info?c=document" class="text-success" style="text-decoration: underline;">Документы</a>
              </li>
              <li>
                <a href="http://aist.site/useful-info?c=place" class="text-success" style="text-decoration: underline;">Места</a>
              </li>
              <li>
                <a href="http://aist.site/useful-info?c=price" class="text-success" style="text-decoration: underline;">Цены/продукты</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="card my-4">
      <h5 class="card-header">Читать другие</h5>
      <div class="card-body">
        <?php $articles = R::find('articles', 'ORDER BY id DESC LIMIT 5'); ?>
        <?php foreach($articles as $row): ?>
        <p class="lead blockquote-footer" style="font-size:15px;"><a href="http://aist.site/staty.php?article=<?= $row['id']; ?>"><?php echo $row['article_title']; ?></a></p>
        <?php endforeach; ?>
      </div>
    </div>
</div>
<!-- /.row -->
</div>
<!-- /.container -->
        </div>
</main>
<?php require('inc/footer.php'); ?>
</body>
</html>
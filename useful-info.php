<?php
	require 'inc/db.php';
	// $articles = R::findAll('articles', 'ORDER BY id DESC');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<title>Полезная информация</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="copyright" content="AIST.inc">
	<meta name="keywords" content="aist inc">
	<meta name="description" content="AIST - Портал №1 для русскязычных эммигрантов в Турции. Читать статьи. Поиск полезно информации о Турции.">
	<meta name="robots" content="all">

	<link rel="icon" type="image/x-icon" href="images/assets/favicon.ico">
	<link rel="shortcut icon" type="image/x-icon" href="images/assets/favicon.ico">
	<link rel="apple-touch-icon" type="image/x-icon" href="images/assets/apple-touch-icon.png">
	<link rel="apple-touch-icon-precomposed" type="image/x-icon" href="images/assets/apple-touch-icon.png">
  <script>
  // Получаем текущий URL-адрес
  var url = window.location.href;

  // Проверяем, существует ли уже GET-параметр в URL-адресе
  if (url.indexOf('?') === -1) {
    // Если параметр не существует, то добавляем его к URL-адресу
    url += '?q=';

    // Запоминаем, что параметр был добавлен к URL-адресу
    localStorage.setItem('q_added', 'true');

    // Перенаправляем пользователя на обновленную страницу
    window.location.href = url;
  } else {
    // Если параметр уже существует, то проверяем, был ли он уже добавлен
    if (localStorage.getItem('q_added') !== 'true') {
      // Если параметр еще не был добавлен, то добавляем его к URL-адресу
      url += '&q=';

      // Запоминаем, что параметр был добавлен к URL-адресу
      localStorage.setItem('q_added', 'true');

      // Перенаправляем пользователя на обновленную страницу
      window.location.href = url;
    }
  }
</script>
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
	<style>
        .cuttedText {
            font-size: 15px;
            font-weight: 400;
        }
        .cartd {
            width: 100%;
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
            overflow: hidden;
        }

        .cartd img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
	</style>
</head>
<body>
	<?php require('inc/header.php') ?>
	<!-- main content -->
	<main class="mt-5 mb-5">
       <!-- Page Content -->
       <div class="container">

<div class="row">

  <!-- Blog Entries Column -->
  <div class="col-md-8">
    <!-- <em><h1 class="my-4 ml-2" style="font-size: 30px;">
      Полезная информация о Турции
    </h1></em> -->
    <!-- Search Widget -->
    <div class="card my-4">
    <form action="http://aist.site/useful-info" method="get" class="d-flex">
      <div class="card-body">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Поиск статьи..." name="q">
          <span class="input-group-btn ml-2" style="margin-top: 2px;">
            <button class="btn btn-success" type="submit"><img src="http://aist.site/images/assets/search.png" width="16px" height="16px"></button>
          </span>
        </div>
      </div>
      </form>
    </div>
    
<script>
(function(){
  var cut = document.getElementsByClassName('cuttedTextTitle');
  for( var i = 0; i < cut.length; i++ ){
    cut[i].innerText = cut[i].innerText.slice(0,40) + '...';
  }
})();
</script>
    <!-- блог пост -->
    <?php
      if (isset($_GET['q'])) :
          $search = filter_input(INPUT_GET, 'q', FILTER_SANITIZE_SPECIAL_CHARS);
          $results = R::find('articles', 'article_title LIKE :article_title', [':article_title' => '%' . $search . '%']);
      ?>
    <?php if (count($results) > 0) : ?>
      <?php foreach($results as $row): ?>
      <div class="card mb-4">
        <div class="card-body">
          <h3 class="card-title cuttedTextTitle"><?= $row['article_title']; ?></h3>
          <p class="card-text blockquote cuttedText"><?= substr($row['article_description'], 0, 250) . '...'; ?></p>
          <a href="http://aist.site/staty.php?article=<?= $row['id']; ?>" class="btn btn-success">Читать далее →</a>
        </div>
        <div class="card-footer text-muted">
          <?= $row['article_date_time']; ?>
        </div>
      </div>
      <?php endforeach; ?>
      <?php else: echo "<p style='font-size: 18px; font-weight: 600; letter-spacing: 0.3em; color: darkgrey; margin-left:11px;'>По вашему запросу статьи не найдены :(</p>"; ?>
        <?php endif; ?>
    <?php endif; ?>

    <?php 
    if (isset($_GET['c'])) :
        $search_category = filter_input(INPUT_GET, 'c', FILTER_SANITIZE_SPECIAL_CHARS);
        if ($search_category == "estate") {
            $result = R::find('articles', 'article_category = ?', ['estate']);
        }
        if ($search_category == "internet") {
          $result = R::find('articles', 'article_category = ?', ['internet']);
        }
        if ($search_category == "auto") {
          $result = R::find('articles', 'article_category = ?', ['auto']);
        }
        if ($search_category == "document") {
          $result = R::find('articles', 'article_category = ?', ['document']);
        }
        if ($search_category == "place") {
          $result = R::find('articles', 'article_category = ?', ['place']);
        }
        if ($search_category == "price") {
          $result = R::find('articles', 'article_category = ?', ['price']);
        } 
    ?>
    <?php if (count($result) > 0) : ?>
      <?php foreach($result as $row): ?>
        <div class="card mb-4">
        <div class="card-body">
          <h3 class="card-title cuttedTextTitle"><?= $row['article_title']; ?></h3>
          <p class="card-text blockquote cuttedText"><?= substr($row['article_description'], 0, 250) . '...'; ?></p>
          <a href="http://aist.site/staty.php?article=<?= $row['id']; ?>" class="btn btn-success">Читать далее →</a>
        </div>
        <div class="card-footer text-muted">
          <?= $row['article_date_time']; ?>
        </div>
      </div>
      <?php endforeach; ?>
    <?php else: echo "<p style='font-size: 18px; font-weight: 600; letter-spacing: 0.3em; color: darkgrey; margin-left:11px;'>Статьи по данной категории ещё не загружены :(</p>";; ?>
    <?php endif; ?>
    <?php endif;?>

    <!-- Pagination -->
    <!-- <ul class="pagination justify-content-center mb-4">
      <li class="page-item">
        <a class="page-link" href="#">← Older</a>
      </li>
      <li class="page-item disabled">
        <a class="page-link" href="#">Newer →</a>
      </li>
    </ul> -->
  </div>

  <!-- Sidebar Widgets Column -->
  <div class="col-md-4">
    <div class="cartd mb-4">
      <img src="http://aist.site/images/assets/nature1.jpg">
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

    <!-- Side Widget -->
    <div class="card my-4">
      <h5 class="card-header">Новости о AIST</h5>
      <div class="card-body">
        Ура! Недавно мы запустили наш портал. Размещайте объявления, читайте статьи, делитесь о нас в соц.сетях.
        Мы будем искренне рады Вам за поддержку этого проекта!
      </div>
    </div>
    <!-- Side Widget -->
    <div class="card my-4">
      <h5 class="card-header">Рекомендуем к прочтению</h5>
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

<!--footer-->

<!-- Bootstrap core JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </main>
	<!-- main content end. -->
	<?php require('inc/footer.php') ?>
</body>
</html>
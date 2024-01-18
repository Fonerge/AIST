<div class="mask">
    <div class="loader"></div>
</div>
<nav class="navbar navbar-expand-md navbar-light bg-light">
	<div class="container">
		<div class="d-flex">
			<a href="http://aist.site/" class="navbar-brand"><img src="http://aist.site/images/assets/logo.png" alt="*logo*"></a>
			<div style="font-size: 14px; width: 77px;">
				<b class="text-success">А</b>втоматизированная <b class="text-success">И</b>нформационная <b class="text-success">С</b>истема <b class="text-success">Т</b>урции
			</div>
		</div>

		<div class="d-flex form-outline mt-2">
            <form action="http://aist.site/search.php" method="get" class="d-flex form-outline mt-2">
                <input type="search" id="form1" class="form-control ml-5" placeholder="Поиск объявлений..." name="q">
                <button type="submit" class="btn btn-success ml-2">
                    <img src="http://aist.site/images/assets/search.png" width="16px" height="16px">
                </button>
            </form>
		</div>

		<div class="d-flex mt-2 ml-2">
			<!-- <div class="dropdown">
			  <img class="dropbtn" src="http://aist.site/images/assets/language.png" width="27px" height="27px">
			  <div class="dropdown-content">
			    <a onclick="alert('Функция изменения языка пока в процессе разработки :(');"><img src="http://aist.site/images/assets/en-flag.png" width="18px" height="18px"> EN</a>
			    <a onclick="alert('Функция изменения языка пока в процессе разработки :(');"><img src="http://aist.site/images/assets/ru-flag.png" width="18px" height="18px"> RU</a>
			  </div>
			</div> -->
			<?php if (isset($_SESSION['logged_user'])) : ?>
			<div class="dropdown">
				<style type="text/css">
					.avatar {vertical-align: middle; width: 27px; height: 27px; border-radius: 50%; object-fit: cover;}
				</style>
			 <?php $avatar_path = isset($_SESSION['avatar']) ? 'ima' . trim($_SESSION['avatar'], 'D://Ospanel/domains/aist.site') : 'images/assets/avatar.png'; ?>
             <img class="dropbtn avatar" src="http://aist.site/<?php echo $avatar_path; ?>" width="27px" height="27px">
			  <div class="dropdown-content">
			    <a href="http://aist.site/profile">Профиль</a>
			    <a href="http://aist.site/inc/logout.php">Выйти <span style="margin-left: 8px;"><img src="http://aist.site/images/assets/exit.png" width="18" height="18"></span></a>
			  </div>
			</div>
			<?php else : ?>
			<div class="dropdown">
			  <img class="dropbtn" src="http://aist.site/images/assets/avatar.png" width="29px" height="29px">
			  <div class="dropdown-content">
			    <a href="http://aist.site/signin">Войти</a>
			    <a href="http://aist.site/signup">Зарегистироваться</a>
			  </div>
			</div>
			<?php endif; ?>
		</div>
		<ul class="mt-3">
			<li><a class="text-secondary">Cоц.сети и мессенджеры:</a></li>
			<li class="d-flex justify-content-center">
				<a target="_blank" href="http://www.youtube.com/channel/UCnKlgVXB1yj7FP5QmhFt1mg"><img src="http://aist.site/images/assets/youtube.png" width="20px" height="20px"></a>
				<a target="_blank" href="http://www.facebook.com/aist.site" class="ml-4"><img src="http://aist.site/images/assets/facebook.png" width="20px" height="20px"></a>
				<a target="_blank" href="http://t.me/Fonerge_1" class="ml-4"><img src="http://aist.site/images/assets/telegram.png" width="20px" height="20px"></a>
				<a href="" class="ml-4"><img src="http://aist.site/images/assets/whatsapp.png" width="20px" height="20px"></a>
			</li>
		</ul>
	</div>
</nav>
<div class="container-fluid px-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-black py-0 px-0">
        <!-- <a class="navbar-brand" href="#"><img id="logo" src="http://i.imgur.com/K7Nwq4V.jpg"> &nbsp;&nbsp;&nbsp;AIS ink</a>
        <span class="v-line"></span> -->
        <button class="navbar-toggler mr-3" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="http://aist.site/advertiser"><button class="btn text-light">Для рекламодателей</button></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://aist.site/about"><button class="btn text-light">О портале</button></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://aist.site/add-post"><button class="btn btn-outline-success">Разместить объявление</button></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://aist.site/useful-info"><button class="btn text-light">Полезная информация</button></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://aist.site/contact"><button class="btn text-light">Контакты</button></a>
                </li>
            </ul>
        </div>
    </nav>
</div>
<!--  vertical menu -->
<input type="checkbox" id="hmt" class="hidden-menu-ticker">
<ul class="hidden-menu">
	<li><a href="http://aist.site/category/estate">Недвижимость</a></li>
	<li><a href="http://aist.site/category/auto">Транспорт</a></li>
	<li><a href="http://aist.site/category/electronic">Электронника</a></li>
	<li><a href="http://aist.site/category/home">Товары для дома</a></li>
	<li><a href="http://aist.site/category/work">Рабочие вакансии</a></li>
	<li><a href="http://aist.site/category/clothes">Личные вещи</a></li>
	<li><a href="http://aist.site/category/services">Услуги</a></li>
	<li><a href="http://aist.site/category/repair">Ремонт</a></li>
	<li><a href="http://aist.site/category/tourism">Туризм</a></li>
	<li><a href="http://aist.site/category/education">Обучение</a></li>
</ul>
<label for="hmt" class="btn-menu mt-2" style="text-align: center;">
	<span style="margin-right: 4px;">Меню</span>
</label>
<!-- vertical menu end. -->
<!-- header end. -->
<?php
// error_reporting(0);
// error_log(0);
require 'inc/db.php';
?>
<?php if (isset($_SESSION['logged_user'])) : ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<title>Профиль пользователя</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- FAVICONS -->
	<link rel="icon" type="image/x-icon" href="http://aist.site/images/assets/favicon.ico">
	<link rel="shortcut icon" type="image/x-icon" href="http://aist.site/images/assets/favicon.ico">
	<link rel="apple-touch-icon" type="image/x-icon" href="http://aist.site/images/assets/apple-touch-icon.png">
	<link rel="apple-touch-icon-precomposed" type="image/x-icon" href="http://aist.site/images/assets/apple-touch-icon.png">
	<!-- Bootstrap 5 -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<!-- font awesome cdn link  -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	<!-- JQuery -->
	<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
	<script src="http://aist.site/js/delete_account.js"></script>
	<!-- Проверка пароля -->
	<script src="http://aist.site/js/password_verify.js"></script>
	<!-- Bootstrap 5 JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
	<!-- font awesome cdn link  -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	<!-- PROFILE.CSS (STYLE) -->
	<link rel="stylesheet" type="text/css" href="css/profile.css">
	<link rel="stylesheet" type="text/css" href="css/cards.css">
	<!-- GOOGLE FONTS -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" type="text/css" href="css/loader.css">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
<div class="mask">
    <div class="loader"></div>
</div>
<?php
if(isset($_SESSION['avatar'])) {
    $avatarPath = $_SESSION['avatar'];
}
if(isset($_SESSION['logged_user'])) {
    $userId = $_SESSION['logged_user']->id;
    $conn = new mysqli("localhost", "root", "", "aist_db");
    if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}

    $sql = "SELECT `avatar` FROM `user` WHERE `id` = $userId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Получаем результат запроса
        $row = $result->fetch_assoc();
        $avatarPath = $row['avatar'];
        $_SESSION['avatar'] = $avatarPath;
    }
}
if(isset($_POST['set_avatar'])) {
    $file = $_FILES['file'];
    $fileName = $file['name'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png');

    if(in_array($fileActualExt, $allowed)) {
        // Проверяем размер файла (не более 5 МБ)
        if($file['size'] > 5 * 1024 * 1024) {
        	$message[] = "<p style='background: rgb(220, 53, 69); color:#fff; margin: 0;'><span style='margin-left: 15px'>Размер файла слишком большой! Максимальный размер 5 МБ.</span><i class='fas fa-times' style='position:absolute; right: 15px; top: 4px' onclick='this.parentElement.style.display = `none`;'></i></p>";
        }
        // Проверяем, есть ли ошибки
        else if($file['error'] === 0) {
            // Уникальное имя для файла
            $fileNameNew = uniqid('', true).".".$fileActualExt;
            $fileDestination = 'D://Ospanel/domains/aist.site/images/avatars/'.$fileNameNew;
            move_uploaded_file($file['tmp_name'], $fileDestination);
            $message[] = "<p style='background: #28A750; color:#fff; margin: 0;'><span style='margin-left: 15px'>Аватар успешно загружен!</span></p>";
            header('Location: /profile');
           
            // Готовим запрос
            $sqli = "UPDATE `user` SET `avatar` = '$fileDestination' WHERE `id` = '$userId'";

            if ($conn->query($sqli) === TRUE) {
                $avatarPath = $fileDestination;
                $_SESSION['avatar'] = $avatarPath;
                echo "<script>document.getElementById('avatar').src='$avatarPath';</script>";
            } else {
                echo "Ошибка: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
        	$message[] = "<p style='background: rgb(220, 53, 69); color:#fff; margin: 0;position:fixed;'><span style='margin-left: 15px'>Произршла ошибка при загрузке файла!</span><i class='fas fa-times' style='position:absolute; right: 15px; top: 4px' onclick='this.parentElement.style.display = `none`;'></i></p>";
        }
    } else {
    	$message[] = "<p style='width: 100%;z-index:300;background: rgb(220, 53, 69); color:#fff; margin: 0; position:fixed;'><span style='margin-left: 15px'>Вы не можете загрузить файл этого типа!</span><i class='fas fa-times' style='position:absolute; right: 15px; top: 4px' onclick='this.parentElement.style.display = `none`;'></i></p>";
    }
}
?>
	<main>
		<?php
			if(isset($message)){
			   foreach($message as $message){
			      echo $message;
			   };
			};
		?>
		<div class="sidebar">
			<img src="http://aist.site/images/assets/apple-touch-icon.png" width="80" height="80" style="margin-top: 10px; margin-left: 10px; margin-bottom: 10px;">
			<a href="http://aist.site/">Главная</a>
			<a href="http://aist.site/add-post">Разместить объявление</a>
			<a href="http://aist.site/portal-rules">Правила портала</a>
			<a href="http://aist.site/privacy">Политика конфиденциальности</a>
		</div>
		<div class="container">
			<div class="content">
				<div class="d-flex mt-4">
					<h3>Ваш профиль</h3>			
					<a href="inc/logout.php" style="margin-left: auto;">
						<img src="http://aist.site/images/assets/exit.png" width="30" height="30" alt="Выйти">
					</a>
				</div>
				<hr>
				<div class="row mb-2">
					<div class="col-lg-4 mt-3">
						<div class="img-avatar center mb-3">
							<img id="avatar" src="<?php echo 'ima'.trim($avatarPath, "D://Ospanel/domains/aist.site"); ?>">
						</div>
						<form action="" method="post" enctype="multipart/form-data">
						    <input type="file" name="file" class="form-control"><br>
						    <button type="submit" name="set_avatar" class="btn btn-outline-success">Загрузить аватар</button>
						</form>
					</div>
					<div class="col-lg-8 mt-3">
						<p style="font-size: 18px">Имя: <b><?= $_SESSION['logged_user']->name; ?></b></p>
						<p style="font-size: 18px">Почта: <b><?= $_SESSION['logged_user']->email; ?></b></p>
						<p style="font-size: 18px">Контакты:
						    <li style="list-style: none;">
						        <img src="http://aist.site/images/assets/telegram.png" width="31" height="31"> <?= $_SESSION['logged_user']->telegram;?>
						        <span style="margin-left: 5px;" class=" fas fa-edit" data-field="telegram"></span>
                                <label for="telegram" class="text-secondary">+90XXXXXXXXXX</label>
						    </li>
						    <li style="list-style: none;">
						        <img src="http://aist.site/images/assets/whatsapp.png" width="36" height="36"> <?= $_SESSION['logged_user']->whatsapp;?>
						        <span style="margin-left: 5px;" class="fas fa-edit" data-field="whatsapp"></span>
						    </li>
						</p>
						<!-- <img src="images/assets/okey.png"> -->

						<style type="text/css">
							.okey-icon {
								background-image: url('images/assets/okey.png');
								background-repeat: no-repeat;
							  	background-size: contain;
							}
						</style>

						<script>
                        document.querySelectorAll('.fa-edit').forEach(function(icon) {
                            icon.addEventListener('click', function(event) {
                                event.preventDefault();
                                var field = this.dataset.field;
                                var phoneElement = this.parentElement;
                                var phone = phoneElement.lastChild.nodeValue.trim();
                                var regex = /^[0-9+]+$/; // регулярное выражение для проверки на введение символов, кроме цифр и плюса
                                // Создаем поле ввода и иконку галочки
                                var input = document.createElement('input');
                                input.setAttribute('type', 'tel');
                                input.setAttribute('value', phone);
                                input.setAttribute('width', '100px');

                                // Устанавливаем ограничение на ввод символов
                                input.addEventListener('keydown', function(event) {
                                    var allowedKeys = [
                                        'ArrowLeft', 'ArrowRight', 'ArrowUp', 'ArrowDown', // Клавиши-стрелки
                                        'Backspace', 'Delete', // Клавиши удаления символов
                                        'Tab', 'Enter', '+', // Допустимые клавиши
                                        '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'
                                    ];
                                    if (allowedKeys.indexOf(event.key) === -1 || input.value.length >= 14) {
                                        event.preventDefault();
                                    }
                                });

                                var checkIcon = document.createElement('img');
                                checkIcon.setAttribute('src', 'images/assets/okey.png');
                                checkIcon.setAttribute('style', 'margin-left: 5px;');

                                // Заменяем номер телефона на поле ввода и иконку галочки
                                phoneElement.innerHTML = '';
                                phoneElement.appendChild(input);
                                phoneElement.appendChild(checkIcon);

                                // Обработчик события клика по иконке галочки
                                checkIcon.addEventListener('click', function(event) {
                                    event.preventDefault();
                                    var newPhone = input.value.trim();
                                    if (newPhone.length > 0 && newPhone.match(regex)) {
                                        // Отправляем запрос на сервер для обновления номера телефона
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('POST', 'inc/update_phone.php');
                                        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                                        xhr.onreadystatechange = function() {
                                            if (xhr.readyState === XMLHttpRequest.DONE) {
                                                if (xhr.status === 200) {
                                                    // Если запрос выполнен успешно, обновляем номер телефона в контакте
                                                    phoneElement.innerHTML = '<a href=\"\\\"><img src="http://aist.site/images/assets/' + field + '.png" width="36" height="36"></a> ' + newPhone;
                                                    phoneElement.appendChild(document.createElement('span'));
                                                } else {
                                                    // Если запрос выполнен с ошибкой, выводим сообщение об ошибке
                                                    console.error(xhr.status);
                                                }
                                            }
                                        };
                                        xhr.send('field=' + field + '&phone=' + encodeURIComponent(newPhone));
                                    } else {
                                        // Если новый номер телефона пустой или не соответствует регулярному выражению, возвращаем старый номер телефона
                                        phoneElement.innerHTML = '<a href=\"\"><img src="http://aist.site/images/assets/' + field + '.png" width="36" height="36"></a> ' + phone;
                                        phoneElement.appendChild(this);
                                        alert("Введите корректный номер телефона");
                                    }
                                });
                            });
                        });
						</script>
						<hr>
						<p>
							<li style="list-style: none;" class="mb-2"><a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop1" class="text-primary">Изменить пароль</a></li>
							<li style="list-style: none;"><a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop2" class="text-danger">Удалить аккаунт</a></li>
						</p>
						<div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
							<div class="modal-dialog">
								<form id="change_password_form" method="post">
						    	<div class="modal-content">
						      		<div class="modal-header">
						        		<h5 class="modal-title" id="staticBackdropLabel">Изменить пароль вашего аккаутна</h5>
						        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
						      		</div>
						      		<div class="modal-body">
							        	<div class="mb-2">
							        		<input type="password" class="pass" id="old_password" name="old_password" placeholder="Старый пароль">
							        	</div>
							        	<div class="mb-2">
							        		<input type="password" class="pass" id="new_password" name="new_password" placeholder="Новый пароль">
							        	</div>
							        	<div class="mb-2">
							        		<input type="password" class="pass" id="confirm_password" name="confirm_password" placeholder="Подтвердить пароль">
							        	</div>
							        	<div id="change_password_message" style="margin: 0; text-align: center;">
							        	</div>
						      		</div>
						      		<div class="modal-footer d-flex justify-content-center">
						        		<button type="submit" id="change_password_button" class="btn btn-success">Изменить</button>
						      		</div>
						      	</div>
						      	</form>
						    </div>
						</div>	
						<div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel2" aria-hidden="true">
							<div class="modal-dialog">
								<form id="delete-account-form" method="post">
						    	<div class="modal-content">
						      		<div class="modal-header">
						        		<h5 class="modal-title" id="staticBackdropLabel">Удалить аккаунт</h5>
						        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
						      		</div>
						      		<div class="modal-body">
						      			<label class="mb-4" style="color: grey; font-size: 14px;"><em>После нажатия "Удалить данные", Вы удалите ваш аккаунт и все данные, связанные с ним. Читать "<a class="text-success" href="http://aist.inc.com/privacy">Политику конфиденциальности</a>".</em></label>
							        	<div>
							        		<input type="password" class="pass" id="pass_for_del" placeholder="Введите пароль"> <!-- введите пароль -->
							        	</div>
							        	<div class="mb-2">
								        		<div class="row">
								        			<div class="col-sm-8 mt-2">
								        			<input type="text" class="pass" id="code" placeholder="Введите проверочный код"> <!-- ввести проверочный код -->
								        		</div>
								        		<div class="col-sm-4 mt-2">
								        			<button class="btn btn-success" type="submit" id="send_code_btn">Получить код</button> <!-- кнопка получения кода -->
								        		</div>
							        		</div>
							        	</div>
							        	<div id="response" style="text-align: center;"></div>
						      		</div>
						      		<div class="modal-footer d-flex justify-content-center">
						        		<button type="submit" name="delete_account" id="delete_account" class="btn btn-danger">Удалить данные</button> <!-- Удалить аккаунт -->
						      		</div>
						      	</div>
						      	</form>
						    </div>
						</div>
					</div><!-- col-lg-4 end. -->
				</div>
				<h4 class="mt-4">Ваши объявления</h4>
				<hr>
				<div class="row">
				<?php $user_posts = R::findAll('posts', 'user_id = ? ORDER BY id DESC', [$_SESSION['logged_user']->id]); ?>
				<?php if (!empty($user_posts)){ foreach ($user_posts as $user_post) { ?>
        		<div class="col-md-6 col-lg-3 mb-3">
					<div class="card">
	              		<a href="http://aist.site/post/<?php echo $user_post->id; ?>/" class="span-img">
						    <?php $photos = R::findAll('images', 'post_id = ?', [$user_post->id]); ?>
						    <?php if (!empty($photos)): ?>
						        <?php foreach (array_slice($photos, 0, 1) as $photo): ?>
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
	                		<p class="card-title mt-1">
	                			<a href="http://aist.site/post/<?php echo $user_post->id ?>/" class="text-success"><?= $user_post['post_name']; ?></a>
	                		</p>
            				<li style="list-style: none;" class="span-text"><?= $user_post['post_category']; ?></li>
            				<li style="list-style: none;" class="span-text"><?= $user_post['post_date_time']; ?></li>
	                		<p class="card-text">
	                		 	<a style="text-decoration: none;" class="span-price text-primary"><?= $user_post['post_price']; ?> ₺</a>
	                		</p>
	                		<a class="card-text" style="text-decoration: none; color: #000;">
	                			<?php if($user_post['post_status'] == "Одобрено"): ?>
	                			<div class="text-center" style="background: #28A750;"><?= $user_post['post_status']; ?></div>
	                			<?php else: ?>
	                				<div class="text-center" style="background: #FFC300;"><?= $user_post['post_status']; ?></div>
	                			<?php endif; ?>
	                		</a>
	              		</div>
    				</div>
				</div>
        		<?php }} else {echo '<article class="ml-3" style="font-weight: 600;">Нет размещённых объявлений...</article>';} ?>
			</div>
				</div>
			</div>
		</div>
	</main>
    <script src="http://aist.site/js/loader.js"></script>
</body>
</html>
<?php else : header('Location: signin');?>
<?php endif; ?>
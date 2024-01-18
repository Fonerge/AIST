<?php
require 'db.php';

$us_con = R::findOne('user', 'id = ?', [$_SESSION['logged_user']->id]);

$response = array();

if (isset($_POST['add_post'])) {

    $post_name = trim($_POST['post_name']);
    $post_category = $_POST['post_category'];
    $post_price = trim($_POST['price']);
    $post_description = trim($_POST['post_descriptions']);
    $post_rajon = $_POST['post_rajon'];
    $post_contacts = $_POST['contacts'];
    $post_date_time = $_POST['post_date_time'];

    if (empty($post_name)) {
		$response['status'] = 'error';
        $response['message'] = 'Введите название вашего объявления!';
    } elseif ($post_category == '0') {
		$response['status'] = 'error';
		$response['message'] = 'Выберите категорию вашего объявления!';
    } elseif ($post_rajon == '0') {
		$response['status'] = 'error';
		$response['message'] = 'Выберите район!';
    } elseif (empty($post_price)) {
		$response['status'] = 'error';
		$response['message'] = 'Установите цену!';
    } elseif (empty($post_description)) {
		$response['status'] = 'error';
		$response['message'] = 'Заполните описание объявления!';
    } elseif ($post_contacts == '0') {
		$response['status'] = 'error';
		$response['message'] = 'Выберите контакты для объявления';
    } elseif (empty($us_con->telegram) or empty($us_con->whatsapp)) {
		$response['status'] = 'error';
		$response['message'] = 'Перейдите в профиль и заполните контакты';
    } else {
		$uploadDir = 'D://Ospanel/domains/aist.site/images/post_images/';
		$maxFiles = 9;
		$maxFileSize = 5242880;
		$allowedExtensions = array('jpg', 'jpeg', 'png');
		$counter = 0;

		$post = R::dispense('posts');
		$post->user_id = $_SESSION['logged_user']->id;
		$post->post_name = $post_name;
		$post->post_category = $post_category;
		$post->post_price = $post_price;
		$post->post_description = $post_description;
		$post->post_contact = $post_contacts;
		$post->post_rajon = $post_rajon;
		$post->post_date_time = $post_date_time;
		$post->post_status = 'На рассмотрении';

	    $post_id = R::store($post);

		if (!empty($_FILES['images']['name'][0])) {
			foreach ($_FILES['images']['name'] as $key => $fileName) {
				$fileTmpName = $_FILES['images']['tmp_name'][$key];
				$fileSize = $_FILES['images']['size'][$key];
				$fileType = $_FILES['images']['type'][$key];
				$fileError = $_FILES['images']['error'][$key];
		
				if ($fileError == UPLOAD_ERR_OK) {
					$fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
					if (in_array(strtolower($fileExtension), $allowedExtensions)) {
						if ($fileSize <= $maxFileSize) {
							$newFileName = uniqid('post_', true) . '.' . $fileExtension;
							$uploadFilePath = $uploadDir . $newFileName;
							if (move_uploaded_file($fileTmpName, $uploadFilePath)) {
								$counter++;
								$postImage = R::dispense('images');
								$postImage->post_id = $post_id;
								$postImage->name = $newFileName;
					        	$postImage->path = $uploadFilePath;
					        	$postImage->size = $fileSize;
					        	$postImage->type = $fileType;
								R::store($postImage);
							} else {
								$response['status'] = 'error';
								$response['message'] = 'Произошла ошибка при загрузке файлов!';
								echo json_encode($response);
								R::trash($post);
                        		exit();
							}
						} else {
							$response['status'] = 'error';
							$response['message'] = 'Превышен максимальный размер файла!';
							echo json_encode($response);
							R::trash($post);
                        	exit();
						}
					} else {
						$response['status'] = 'error';
						$response['message'] = 'Недопустимое расширение файла!';
						echo json_encode($response);
						R::trash($post);
                        exit();
					}
				} else {
					$response['status'] = 'error';
					$response['message'] = 'Произошла ошибка при загрузке файлов!';
					echo json_encode($response);
					R::trash($post);
                    exit();
				}
			}
		
			if ($counter > $maxFiles) {
				$response['status'] = 'error';
				$response['message'] = 'Превышено максимальное количество файлов!';
			} else {
				$response['status'] = 'success';
				$response['message'] = 'Объявление успешно создано и отправлено на модерацию';
			}
		
		} else {
			$response['status'] = 'success';
			$response['message'] = 'Объявление успешно создано и отправлено на модерацию';
		}
		
	}
	echo json_encode($response);
	exit();
}	
?>
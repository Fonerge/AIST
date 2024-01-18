<?php
require 'db.php';

if (isset($_POST['old_password']) && isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    $user_id = $_SESSION['logged_user']->id;
	$conn = new mysqli("localhost", "root", "", "aist_db");
	$result = $conn->query("SELECT password FROM `user` WHERE id = $user_id");

	if ($result->num_rows > 0) {
	    $row = $result->fetch_assoc();
	    $db_password = $row['password'];
	}

    // Проверяем, что все поля были заполнены
    if (empty($old_password) || empty($new_password) || empty($confirm_password)) {
        $response = array('status' => 'error', 'message' => 'Заполните все поля.');
        echo json_encode($response);
        exit();
    }

    // Проверяем, что новый пароль был введен дважды и совпадает в обоих случаях
    if ($new_password != $confirm_password) {
        $response = array('status' => 'error', 'message' => 'Новый пароль не совпадает.');
        echo json_encode($response);
        exit();
    }

    // Проверяем, что новый пароль соответствует требованиям безопасности
    // if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $new_password)) {
    //     $response = array('status' => 'error', 'message' => 'Новый пароль не соответствует требованиям безопасности');
    //     echo json_encode($response);
    //     exit();
    // }

    if (password_verify($old_password, $db_password)) {
       // Старый пароль верный, можно обновить пароль пользователя
    	$new_password = password_hash($new_password, PASSWORD_DEFAULT);
    	$conn->query("UPDATE `user` SET `password` = '$new_password' WHERE `user`.`id` = $user_id");
    	$response = array('status' => 'success', 'message' => 'Пароль успешно изменен!');
    	echo json_encode($response);
    } else {
    	// Старый пароль неверный, выводим ошибку
    	$response = array('status' => 'error', 'message' => 'Старый пароль не верен.');
        echo json_encode($response);
        exit();
    }
}
?>
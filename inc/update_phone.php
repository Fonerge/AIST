<?php
require 'db.php';

$field = $_POST['field'];
$phone = $_POST['phone'];
$user_id = $_SESSION['logged_user']->id;

$user = R::load('user', $user_id);
$user->{$field} = $phone; // Изменяем значение поля в объекте
R::store($user); // Сохраняем объект в БД

if ($field === 'telegram') {
    $_SESSION['logged_user']->telegram =  $phone;
} else if ($field === 'whatsapp') {
    $_SESSION['logged_user']->whatsapp = $phone; 
}

echo 'success';
header('Location: ../profile.php');
?>
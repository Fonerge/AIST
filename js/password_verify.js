$(document).ready(function() {
    $('#change_password_form').submit(function(event) {
        event.preventDefault(); // отменяем отправку формы по умолчиню

        var old_password = $('#old_password').val();
        var new_password = $('#new_password').val();
        var confirm_password = $('#confirm_password').val();

        // Отправляем запрос на сервер
        $.ajax({
            type: 'POST',
            url: '../inc/change_password.php',
            data: {
                old_password: old_password,
                new_password: new_password,
                confirm_password: confirm_password
            },
            dataType: 'json',
            success: function(response) {
                // Обрабатываем ответ сервера
                if (response.status == 'success') {
                    // Если пароль успешно изменен, выводим сообщение об успехе
                    $('#change_password_message').removeClass('error').addClass('success').text(response.message).show();
                    // Очищаем поля формы
                    $('#old_password').val('');
                    $('#new_password').val('');
                    $('#confirm_password').val('');
                } else {
                    // Если возникла ошибка, выводим сообщение об ошибке
                    $('#change_password_message').removeClass('success').addClass('error').text(response.message).show();
                }
            },
            error: function() {
                // В случае ошибки выводим сообщение об ошибке
                $('#change_password_message').removeClass('success').addClass('error').text('Произошла ошибка при отправке запроса :(').show();
            }
        });
    });
});
$(document).ready(function() {
    // Обработчик нажатия кнопки "Получить код"
    $('#send_code_btn').click(function(event) {
        event.preventDefault(); // Отменяем стандартное поведение формы
        var pass_for_del = $('#pass_for_del').val();
        //Получаем значение поля "Введите пароль"
        $.ajax({
            type: 'POST', 
            url: '../inc/delete_account.php',
            data: {
                send_code_btn: true, // Идентификатор обработчика запроса
                pass_for_del: pass_for_del // Значение поля "Введите пароль"
            },
            dataType: 'json', // Тип данных, ожидаемый от сервера
            success: function(response) {
                $('#response').html(response.message);
                if (response.status == 'success') {
                    $('#response').html('<div class="alert alert-success">Код был успешно отправлен вам на почту!</div>');
                    $('#pass_for_del').val('');
                }
            },
            error: function(xhr, status, error) { // Обработчик ошибок
                $('#response').html('<div class="alert alert-danger">Ошибка сервера! Попробуйте позже.</div>');
            }
        });
    });

    // Обработчик нажатия кнопки "Удалить данные"
    $('#delete_account').click(function(event) {
        event.preventDefault(); // Отменяем стандартное поведение формы
        var code = $('#code').val();
        $.ajax({
            type: 'POST',
            url: '../inc/delete_account.php',
            data: {
                delete_account: true, // Идентификатор обработчика запроса
                code: code // Значение поля "Введите проверочный код"
            },
            dataType: 'json', // Тип данных, ожидаемый от сервера
            success: function(response) { // Обработчик успешного ответа от сервера
                $('#response').html(response.message); // Выводим сообщение в блок с id="response"
                if (response.status == 'success') {
                    // Если успешно, очищаем поля "Введите пароль" и "Введите проверочный код"
                    $('#response').html('<div class="alert alert-success">Аккаунт успешно удалён!</div>');
                }
            },
            error: function(xhr, status, error) { // Обработчик ошибок
                $('#response').html('<div class="alert alert-danger">Ошибка сервера! Попробуйте позже.</div>');
            }
        });
    });
});
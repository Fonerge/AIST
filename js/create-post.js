$(document).ready(function() {
    $('#myForm').submit(function(event) {
        event.preventDefault(); // отменяем отправку формы по умолчанию

        var post_name = $('#post_name').val();
        var post_category = $('#post_category').val();
        var post_rajon = $('#post_rajon').val();
        var price = $('#price').val();
        var post_descriptions = $('#post_descriptions').val();
        var contacts = $('#contacts').val();
        var post_date_time = $('#post_date_time').val();

        // Создаем объект FormData
        var formData = new FormData();

        // Добавляем данные в объект FormData
        formData.append('post_name', post_name);
        formData.append('post_category', post_category);
        formData.append('post_rajon', post_rajon);
        formData.append('price', price);
        formData.append('post_descriptions', post_descriptions);
        formData.append('contacts', contacts);
        formData.append('post_date_time', post_date_time);
        formData.append('add_post', true);

        var imageInput = $('#images');
        var imageFiles = imageInput[0].files;
        if (imageInput.length > 0 && imageFiles.length > 0) {
            // Проверяем количество выбранных файлов
            if (imageFiles.length > 9) {
                $('#create-message').removeClass('success').addClass('error').text('Максимальное количество фото - 9').show();
                return; // Останавливаем отправку формы
            }

            // Добавляем все выбранные файлы в объект FormData
            for (var i = 0; i < imageFiles.length; i++) {
                formData.append('images[]', imageFiles[i]);
            }
        }

        // Отправляем запрос на сервер
        $.ajax({
            type: 'POST',
            url: 'http://aist.site/inc/create_post.php',
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(response) {
                // Обрабатываем ответ сервера
                if (response.status == 'success') {
                    // Если, все ок, выводим сообщение
                    $('#create-message').removeClass('error').addClass('success').text(response.message).show();
                    // Очищаем поля формы
                    $('#post_name').val('');
                    $('#post_category').val('');
                    $('#price').val('');
                    $('#post_rajon').val('');
                    $('#post_descriptions').val('');
                    $('#contacts').val('');
                } 
                if (response.status == 'error') {
                    // Если возникла ошибка, выводим сообщение об ошибке
                    $('#create-message').removeClass('success').addClass('error').text(response.message).show();
                }
            },
            error: function() {
                // В случае ошибки выводим сообщение об ошибке
                $('#create-message').removeClass('success').addClass('error').text('Произошла ошибка при отправке запроса :(').show();
            }
        });
    });
});
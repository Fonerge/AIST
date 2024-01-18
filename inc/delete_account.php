<?php
require 'db.php';

$user_email = $_SESSION['logged_user']->email;
$response = array();

if (isset($_POST['send_code_btn'])) {
    $password_check = $_POST['pass_for_del'];
    if ($password_check == password_verify($password_check, $_SESSION['logged_user']->password)) {
        $generate_code = rand(100000, 999999);

        $_db = R::load('user', $_SESSION['logged_user']->id);
        $_db->code_for_del = $generate_code;
        R::store($_db); 
        R::close();

        $to = $user_email;
        $subject = "Проверочный код для удаления аккаунта";
        $headers = "Content-type: text/html; charset=utf-8\r\n";
        $message = '
        <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<!--[if mso]><xml></xml><![endif]--><style>
*{box-sizing:border-box}body{margin:0;padding:0}a[x-apple-data-detectors]{color:inherit!important;text-decoration:inherit!important}#MessageViewBody a{color:inherit;text-decoration:none}p{line-height:inherit}.desktop_hide,.desktop_hide table{mso-hide:all;display:none;max-height:0;overflow:hidden}.image_block img+div{display:none} @media (max-width:660px){.row-content{width:100%!important}.mobile_hide{display:none}.stack .column{width:100%;display:block}.mobile_hide{min-height:0;max-height:0;max-width:0;overflow:hidden;font-size:0}.desktop_hide,.desktop_hide table{display:table!important;max-height:none!important}}
</style>
</head>
<body style="background-color:#c5c4cf;margin:0;padding:0;-webkit-text-size-adjust:none;text-size-adjust:none">
<table class="nl-container" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#c5c4cf"><tbody><tr><td>
<table class="row row-1" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0"><tbody><tr><td><table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;color:#000;width:640px" width="640"><tbody><tr><td class="column column-1" width="100%" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;padding-bottom:5px;padding-top:5px;vertical-align:top;border-top:0;border-right:0;border-bottom:0;border-left:0"><div class="spacer_block block-1" style="height:20px;line-height:20px;font-size:1px"> </div></td></tr></tbody></table></td></tr></tbody></table>
<table class="row row-2" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0"><tbody><tr><td><table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#fff;color:#000;width:640px" width="640"><tbody><tr><td class="column column-1" width="100%" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;padding-bottom:5px;padding-left:10px;padding-right:10px;padding-top:5px;vertical-align:top;border-top:0;border-right:0;border-bottom:0;border-left:0">
<table class="image_block block-1" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0"><tbody><tr><td class="pad" style="padding-bottom:10px;padding-top:10px;width:100%;padding-right:0;padding-left:0"><div class="alignment" align="center" style="line-height:10px"><img src="https://aist.site/images/assets/apple-touch-icon.png" style="display:block;height:auto;border:0;width:155px;max-width:100%" width="155"></div></td></tr></tbody></table>
<div class="spacer_block block-2" style="height:10px;line-height:10px;font-size:1px"> </div>
</td></tr></tbody></table></td></tr></tbody></table>
<table class="row row-3" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0"><tbody><tr><td><table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#fff;color:#000;width:640px" width="640"><tbody><tr><td class="column column-1" width="100%" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;padding-bottom:5px;padding-left:20px;padding-right:20px;padding-top:5px;vertical-align:top;border-top:0;border-right:0;border-bottom:0;border-left:0">
<table class="text_block block-1" width="100%" border="0" cellpadding="10" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;word-break:break-word"><tbody><tr><td class="pad"><div style="font-family:sans-serif"><div class="" style="font-size:14px;mso-line-height-alt:16.8px;color:#9393a0;line-height:1.2;font-family:Helvetica Neue,Helvetica,Arial,sans-serif"><p style="margin:0;font-size:14px;text-align:center;mso-line-height-alt:16.8px"><strong><span style="font-size:35px;">Запрос на удаление аккаунта на сайте aist.site</span></strong></p></div></div></td></tr></tbody></table>
<table class="text_block block-2" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;word-break:break-word"><tbody><tr><td class="pad" style="padding-bottom:10px;padding-left:15px;padding-right:15px;padding-top:10px"><div style="font-family:sans-serif"><div class="" style="font-size:14px;mso-line-height-alt:16.8px;color:#9393a0;line-height:1.2;font-family:Helvetica Neue,Helvetica,Arial,sans-serif"><p style="margin:0;font-size:14px;text-align:center;mso-line-height-alt:16.8px">
<span style="font-size:22px;"><span style="">&nbsp;Ваш проверочный код: <b>'.$generate_code.'</b></span></span></p></div></div></td></tr></tbody></table>
<table class="text_block block-3" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;word-break:break-word"><tbody><tr><td class="pad" style="padding-bottom:10px;padding-left:15px;padding-right:15px;padding-top:20px"><div style="font-family:sans-serif"><div class="" style="font-size:14px;mso-line-height-alt:16.8px;color:#9393a0;line-height:1.2;font-family:Helvetica Neue,Helvetica,Arial,sans-serif"><p style="margin:0;font-size:14px;text-align:center;mso-line-height-alt:16.8px"><span style="font-size:16px;">Если это были не Вы, то просто проигнорируйте данное сообщение<br>Или обратитесь в службу поддержки нашего сайта!</span></p></div></div></td></tr></tbody></table>
<div class="spacer_block block-4" style="height:20px;line-height:20px;font-size:1px"> </div>
<table class="button_block block-5" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0"><tbody><tr><td class="pad" style="padding-bottom:20px;padding-left:10px;padding-right:10px;padding-top:15px;text-align:center"><div class="alignment" align="center">
<!--[if mso]><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="https://aist.site/portal-rules.php" style="height:42px;width:229px;v-text-anchor:middle;" arcsize="0%" stroke="false" fillcolor="#28a750"><v:textbox inset="0px,0px,0px,0px"><center style="color:#ffffff; font-family:Arial, sans-serif; font-size:16px"><![endif]-->
<a href="https://aist.site/policy.php" target="_blank" style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#28a750;border-radius:0px;width:auto;border-top:0px solid transparent;font-weight:undefined;border-right:0px solid transparent;border-bottom:0px solid transparent;border-left:0px solid transparent;padding-top:5px;padding-bottom:5px;font-family:Helvetica Neue, Helvetica, Arial, sans-serif;font-size:16px;text-align:center;mso-border-alt:none;word-break:keep-all;"><span style="padding-left:50px;padding-right:50px;font-size:16px;display:inline-block;letter-spacing:normal;"><span dir="ltr" style="word-break: break-word;"><span style="line-height: 32px;" dir="ltr" data-mce-style="">Политика конфиденциальности</span></span></span></a>
<!--[if mso]></center></v:textbox></v:roundrect><![endif]-->
</div></td></tr></tbody></table>
</td></tr></tbody></table></td></tr></tbody></table>
<table class="row row-4" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0"><tbody><tr><td><table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#fff;color:#000;width:640px" width="640">
<tbody><tr><td class="column column-1" width="100%" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;padding-bottom:5px;padding-left:20px;padding-right:20px;padding-top:5px;vertical-align:top;border-top:0;border-right:0;border-bottom:0;border-left:0"><div class="spacer_block block-1" style="height:20px;line-height:20px;font-size:1px"> </div></td></tr></tbody>
</table></td></tr></tbody></table>
<table class="row row-5" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0"><tbody><tr><td><table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#e0e2e9;color:#000;width:640px" width="640"><tbody><tr><td class="column column-1" width="100%" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;padding-bottom:5px;padding-left:10px;padding-right:10px;padding-top:5px;vertical-align:top;border-top:0;border-right:0;border-bottom:0;border-left:0">
<div class="spacer_block block-1" style="height:20px;line-height:20px;font-size:1px"> </div>
<table class="text_block block-2" width="100%" border="0" cellpadding="10" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;word-break:break-word"><tbody><tr>
<td class="pad"><div style="font-family:sans-serif"><div class="" style="font-size:12px;mso-line-height-alt:14.399999999999999px;color:#555;line-height:1.2;font-family:Helvetica Neue,Helvetica,Arial,sans-serif"><p style="margin:0;font-size:12px;text-align:center;mso-line-height-alt:14.399999999999999px"><span style="font-size:18px;"><strong>Служба поддержки сайта: <em>info@aist.site</em></strong></span></p></div></div></td>
</tr></tbody></table>
<div class="spacer_block block-3" style="height:10px;line-height:10px;font-size:1px"> </div>
</td></tr></tbody></table></td></tr></tbody></table>
<table class="row row-6" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0"><tbody><tr><td><table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;color:#000;width:640px" width="640"><tbody><tr><td class="column column-1" width="100%" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;padding-bottom:5px;padding-top:5px;vertical-align:top;border-top:0;border-right:0;border-bottom:0;border-left:0"><div class="spacer_block block-1" style="height:20px;line-height:20px;font-size:1px"> </div></td></tr></tbody></table></td></tr></tbody></table>
</td></tr></tbody></table>
</body></html>
        ';
        mail($to, $subject, $message, $headers);

        $response['status'] = 'success';
        $response['message'] = 'Ваш проверочный код был отправлен на почту!';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Неверный пароль!';
    }
    echo json_encode($response);
    exit;
}

if (isset($_POST['delete_account'])) {
    $verify_code = $_POST['code'];
    $_db = R::findOne('user', 'email = ?', [$user_email]);
    $code_db = $_db->code_for_del;

    if ($verify_code == $code_db and $code_db != "0") {
        $all_posts = R::findAll('posts', 'user_id = ?', [$_db->id]);
        if (!empty($all_posts)) {
            R::trash($all_posts);
            R::close($all_posts);
        }
        R::trash($_db);
        R::close($_db);
        
        $response['status'] = 'success';
        $response['message'] = 'Аккаунт удалён!';
        unset($_SESSION['logged_user']);
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Неверный код проверки!';
    }
    echo json_encode($response);
    exit;
}
?>
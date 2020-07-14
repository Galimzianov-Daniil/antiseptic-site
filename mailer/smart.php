<?php 

$name = $_POST['user_name'];
$phone = $_POST['user_phone'];
$return_page = $_POST['return_page'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'daniilwebdeveloper@mail.ru';                 // Наш логин
$mail->Password = 'Pain231';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
 
$mail->setFrom('daniilwebdeveloper@mail.ru', 'Сайт по антисептикам');   // От кого письмо 
$mail->addAddress('galimzyanoff.dania@yandex.ru');     // Add a recipient

$mail->Subject = 'Это тема сообщения';
$mail->Body    = '
	Пользователь оставил свои данные <br> 
	Имя: ' . $name . ' <br>
	Телефон: ' . $phone . '';
$mail->AltBody = 'Это альтернативный текст';

if(!$mail->send()) {
    echo "Произошла ошибка";
} else {
    header ("Location: /thanks.html");
}

?>
<?php
require $_SERVER['DOCUMENT_ROOT'] . '/js/phpmailer/PHPMailerAutoload.php';

$name = $_POST['name'];
$phone = $_POST['phone'];
$org = $_POST['org'];
$email = $_POST['email'];
$messageF = $_POST['messageF'];

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                            
$mail->CharSet = "utf-8";
$mail->isSMTP();                                    
$mail->Host = 'smtp.yandex.ru';  // Если используем яндекс
$mail->SMTPAuth = true;                            
$mail->Username = 'muskatin02'; // ваш логин в яндексе (именно логин, а не полная почта)
$mail->Password = 'LoX5671234'; // пароль в яндексе
$mail->SMTPSecure = 'ssl';                          
$mail->Port = 465;

$mail->setFrom('muskatin02@yandex.ru', 'Лендинг gruzoperevozki'); // ваш email в яндексе
//$mail->addAddress('muskatinartem@gmail.com');     // email того, кому отправляем
$mail->addAddress('muskatinartem@gmail.com');     // email того, кому отправляем
$mail->isHTML(true);                                

$mail->Subject = 'Письмо c сайта gruzoperevozki';
$mail->Body    = "<b>Имя:</b> $name <br>
		<b>E-mail:</b> $email <br>
		<b>Номер телефона:</b> $phone <br><br>
        <b>Сообщение:</b><br>$messageF";

if(!$mail->send()) {
	echo 'no';  // если письмо не отправлено
	echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
	echo 'ok'; // если письмо отправлено
}
?>
<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/recaptcha/autoload.php');
if (isset($_POST['g-recaptcha-response'])) {
	$secret = '6LeH75IUAAAAAI20uDa-cbphEN7wJk9-4KtfX56n';
    // создать экземпляр службы recaptcha, используя секретный ключ
    $recaptcha = new \ReCaptcha\ReCaptcha($secret);
    // получить результат проверки кода recaptcha
    $resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
    // результат проверки
		file_put_contents(__DIR__."/logRecaptcha.txt", date("d.m.Y H:i:s")." ".var_export($_POST['g-recaptcha-response'], 1)."\n");
	if ($resp->isSuccess()){

      $phone = $_POST['phone_2'];
		$name = $_POST['name_2'];
	file_put_contents(__DIR__."/logSuccessRecaptcha.txt", date("d.m.Y H:i:s")." ".var_export($phone, 1)."\n", FILE_APPEND);
		$message = "Имя: ".$name." \nТелефон: ".$phone;
		$subject = "Заказ звонка с сайта Strike-Active";
		mb_internal_encoding('UTF-8');
		$encoded_subject = mb_encode_mimeheader($subject, 'UTF-8', 'B', "\r\n", strlen('Subject: '));
		$headers  = "Content-type: text/plain; charset=utf-8 \r\n";
		$headers .= "From: Strike-Active <site@strike-active.ru>\r\n";
		
		mail("alexvrbv@gmail.com", $encoded_subject, $message, $headers);
		mail("zakaz@strike-active.ru", $encoded_subject, $message, $headers);
		 } else {
      file_put_contents(__DIR__."/logErrorsRecaptcha.txt", date("d.m.Y H:i:s")." ".var_export($errors, 1)."\n", FILE_APPEND);    
	}

}
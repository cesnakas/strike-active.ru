<?php
$email = $_POST['email'];
$phone = $_POST['phone'];
$product = $_POST['product'];

$message = "Email: ".$email." \nТелефон: ".$phone." \nТовар: ".$product;
$subject = "Заказ в 1 клик с сайта Strike-Active";
mb_internal_encoding('UTF-8');
$encoded_subject = mb_encode_mimeheader($subject, 'UTF-8', 'B', "\r\n", strlen('Subject: '));
$headers  = "Content-type: text/plain; charset=utf-8 \r\n";
$headers .= "From: Strike-Active <site@strike-active.ru>\r\n";

mail("alexvrbv@gmail.com", $encoded_subject, $message, $headers);
mail("zakaz@strike-active.ru", $encoded_subject, $message, $headers);
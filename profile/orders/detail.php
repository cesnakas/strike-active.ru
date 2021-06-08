<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Редактировать заказ");

global $USER;
if(!$USER->IsAuthorized()){
    LocalRedirect("/");
}
?>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
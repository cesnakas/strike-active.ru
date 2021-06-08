<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Отменить заказ");

global $USER;
if(!$USER->IsAuthorized()){
    LocalRedirect("/");
}
?>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
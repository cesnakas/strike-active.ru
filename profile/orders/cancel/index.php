<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Отменить заказ");

global $USER;
if(!$USER->IsAuthorized()){
    LocalRedirect("/");
}
?>


<?$APPLICATION->IncludeComponent("bitrix:sale.personal.order.cancel","",Array(
        "PATH_TO_LIST" => "profile/orders/",
        "PATH_TO_DETAIL" => "profile/orders/detail/?ID=#ID#",
        "ID" => $ID,
        "SET_TITLE" => "Y"
    )
);?>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
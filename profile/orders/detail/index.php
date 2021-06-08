<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Редактировать заказ");

global $USER;
if(!$USER->IsAuthorized()){
    LocalRedirect("/");
}
?>

<?$APPLICATION->IncludeComponent("bitrix:sale.personal.order.detail",".default",Array(
        "PATH_TO_LIST" => "/profile/orders/",
        "PATH_TO_CANCEL" => "/profile/orders/cancel/?ID=#ID#",
        "PATH_TO_PAYMENT" => "",
        "PATH_TO_COPY" => "",
        "ID" => $_REQUEST['ID'],
        "CACHE_TYPE" => "N",
        "CACHE_TIME" => "3600",
        "CACHE_GROUPS" => "Y",
        "SET_TITLE" => "Y",
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "PICTURE_WIDTH" => "110",
        "PICTURE_HEIGHT" => "110",
        "PICTURE_RESAMPLE_TYPE" => "1",
        "CUSTOM_SELECT_PROPS" => array(),
        "PROP_1" => Array(),
        "PROP_2" => Array()
    )
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
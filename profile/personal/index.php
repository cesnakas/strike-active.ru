<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Личные данные");

global $USER;
if(!$USER->IsAuthorized()){
    Localredirect("/");
}
?>

<?$APPLICATION->IncludeComponent(
    "bitrix:main.profile", "", array(
        "FIELDS" => array("LAST_NAME", "NAME", "EMAIL", "PERSONAL_PHONE"),
        "REQUARED" => array("LAST_NAME", "NAME", "EMAIL", "PERSONAL_PHONE"),
        "USER_PROPERTY_NAME" => "",
        "SET_TITLE" => "N",
        "AJAX_MODE" => "Y",
        "USER_PROPERTY" => array(
        ),
        "SEND_INFO" => "Y",
        "CHECK_RIGHTS" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_ADDITIONAL" => ""
    ), false
);
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
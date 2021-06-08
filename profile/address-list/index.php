<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Мои адреса");
?>

<?
global $arUserGroups;
if(in_array(1, $arUserGroups) || in_array(5, $arUserGroups) || in_array(7, $arUserGroups)){
    //Список адресов пользователя
    $APPLICATION->IncludeComponent("realweb:user.profile", "address", Array(
        "IBLOCK_ID" => IBLOCK_SERVICES_ADDRESS,
        "ITEMS_COUNT" => "99",
        "AJAX" => "Y",
        "PROPERTY_CODE" => array(
            "ADDRESS_CITY",
            "ADDRESS_STREET",
            "ADDRESS_HOUSE",
            "ADDRESS_CORPUS",
            "ADDRESS_FLAT"
        ),
        "REQUARED" => array("ADDRESS_CITY", "ADDRESS_STREET", "ADDRESS_HOUSE", "ADDRESS_CORPUS", "ADDRESS_FLAT"),
        "ACTION_URL" => ""
    ));
}
else{
    LocalRedirect("/profile/personal/", false, "301 Moved Permanently");
}
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
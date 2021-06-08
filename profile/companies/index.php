<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Мои компании");
?>

<?
global $arUserGroups;
if(in_array(1, $arUserGroups) || in_array(5, $arUserGroups) || in_array(7, $arUserGroups)){
    //Список компаний пользователя
    $APPLICATION->IncludeComponent("realweb:user.profile", "companies", Array(
        "IBLOCK_ID" => IBLOCK_SERVICES_COMPANY,
        "ITEMS_COUNT" => "99",
        "AJAX" => "Y",
        "SORT_FIELD" => "",
        "SORT_BY" => "",
        "FIELD_CODE" => array("NAME"),
        "PROPERTY_CODE" => array(
            "COMPANY_INN",
            "COMPANY_KPP",
            "COMPANY_ADDRESS",
            "COMPANY_BILL",
            "COMPANY_BANK",
            "COMPANY_BIK",
            "COMPANY_COR_BILL",
            "COMPANY_EMAIL",
            "COMPANY_NAME",
            "COMPANY_PHONE"
        ),
        "REQUARED" => array("NAME", "COMPANY_INN", "COMPANY_KPP"),
        "ACTION_URL" => ""
    ));
}
else{
    LocalRedirect("/profile/personal/", false, "301 Moved Permanently");
}
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
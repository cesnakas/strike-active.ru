<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Личный кабинет");
?>
<?php 
if (!$USER->IsAuthorized()) {
    Localredirect("/");
}
else{
    $APPLICATION->IncludeComponent("realweb:user.profile.front", "profile", Array(
	"USER_INFO_IBLOCK_ID" => array(
			0 => "7",
			1 => "6",
		),
		"USER_INFO_IBLOCK_URL" => array(
			0 => "/profile/companies/",
			1 => "/profile/address-list/",
		),
		"USER_INFO_FIELDS_CODE" => array(
			0 => "NAME",
		),
		"USER_INFO_PROPS_CODE" => array(
			0 => "ADDRESS_CITY",
		),
		"BASKET_URL" => "/basket/",
		"ORDER_URL" => "/profile/orders/",
		"PERSONAL_URL" => "/profile/personal/"
	),
	false
);
	
	$user = CUser::GetID(); //получаем ID текущего пользователя
	$group = CUser::GetUserGroup($user); // Получаем массив групп, в которые входит пользователь
	if( !(in_array(7, $group) || in_array(8, $group) || in_array(9, $group)) ) {
		$APPLICATION->IncludeComponent(
			"logictim:bonus.history",
			"vagency",
			Array(
				"FIELDS" => array("ID","DATE","NAME","OPERATION_SUM","BALLANCE_BEFORE","BALLANCE_AFTER"),
				"ORDER_LINK" => "Y",
				"ORDER_URL" => "/profile/orders/detail/?ID=",
				"PAGE_NAVIG_LIST" => "30",
				"PAGE_NAVIG_TEMP" => "arrows",
				"SORT" => "DESC"
			)
		);
	}
	
}

?>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
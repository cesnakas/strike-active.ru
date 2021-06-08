<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Title");
?>
<?$APPLICATION->IncludeComponent(
	"bitrix:sale.personal.order.list", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_GROUPS" => "Y",
		"PATH_TO_DETAIL" => "",
		"PATH_TO_COPY" => "",
		"PATH_TO_CANCEL" => "",
		"PATH_TO_PAYMENT" => "/order/",
		"PATH_TO_BASKET" => "",
		"PATH_TO_CATALOG" => "/category/",
		"ORDERS_PER_PAGE" => "20",
		"ID" => $ID,
		"DISALLOW_CANCEL" => "N",
		"SET_TITLE" => "Y",
		"SAVE_IN_SESSION" => "Y",
		"NAV_TEMPLATE" => "",
		"HISTORIC_STATUSES" => array(
			0 => "F",
		),
		"RESTRICT_CHANGE_PAYSYSTEM" => array(
			0 => "0",
		),
		"REFRESH_PRICES" => "N",
		"DEFAULT_SORT" => "STATUS",
		"ALLOW_INNER" => "N",
		"ONLY_INNER_FULL" => "N",
		"STATUS_COLOR_ER" => "gray",
		"STATUS_COLOR_F" => "gray",
		"STATUS_COLOR_N" => "green",
		"STATUS_COLOR_OT" => "gray",
		"STATUS_COLOR_PA" => "gray",
		"STATUS_COLOR_QW" => "gray",
		"STATUS_COLOR_SB" => "gray",
		"STATUS_COLOR_PSEUDO_CANCELLED" => "red"
	),
	false
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
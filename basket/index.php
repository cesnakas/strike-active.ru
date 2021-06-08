<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Корзина");
$APPLICATION->SetPageProperty("HIDE_FOOTER", "Y");
?>


<? 
$user = CUser::GetID(); //получаем ID текущего пользователя
$group = CUser::GetUserGroup($user); // Получаем массив групп, в которые входит пользователь
if( in_array(7, $group) || in_array(8, $group) || in_array(9, $group) ): ?>

	<?
	if($_REQUEST["action"] == "clear") {
		if (CModule::IncludeModule("sale")){CSaleBasket::DeleteAll(CSaleBasket::GetBasketUserID());}
	}

	?><?$APPLICATION->IncludeComponent(
		"bitrix:sale.basket.basket",
		"basket",
		array(
			"COLUMNS_LIST" => array("DELETE", "NAME", "PRICE", "QUANTITY", "SUM"),
			"PATH_TO_ORDER" => "/order/",
			"HIDE_COUPON" => "N",
			"PRICE_VAT_SHOW_VALUE" => "N",
			"COUNT_DISCOUNT_4_ALL_QUANTITY" => "N",
			"USE_PREPAYMENT" => "N",
			"QUANTITY_FLOAT" => "N",
			"SET_TITLE" => "Y",
			"ACTION_VARIABLE" => "action",
			"OFFERS_PROPS" => array(
				"FLUX",
				"POWER"
			)
		),
		false
	);?>

<?  else: ?>

	<?
	if($_REQUEST["action"] == "clear") {
		if (CModule::IncludeModule("sale")){CSaleBasket::DeleteAll(CSaleBasket::GetBasketUserID());}
	}

	?><?$APPLICATION->IncludeComponent(
	"bitrix:sale.basket.basket", 
	"vproject", 
	array(
		"COLUMNS_LIST" => array(
			0 => "DELETE",
			1 => "NAME",
			2 => "PRICE",
			3 => "QUANTITY",
			4 => "SUM",
		),
		"PATH_TO_ORDER" => "/order/",
		"HIDE_COUPON" => "N",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"COUNT_DISCOUNT_4_ALL_QUANTITY" => "N",
		"USE_PREPAYMENT" => "N",
		"QUANTITY_FLOAT" => "N",
		"SET_TITLE" => "Y",
		"ACTION_VARIABLE" => "action",
		"OFFERS_PROPS" => array(
		),
		"COMPONENT_TEMPLATE" => "vproject",
		"COLUMNS_LIST_EXT" => array(
			0 => "DELETE",
			1 => "DELAY",
			2 => "SUM",
		),
		"TEMPLATE_THEME" => "blue",
		"CORRECT_RATIO" => "Y",
		"AUTO_CALCULATION" => "Y",
		"COMPATIBLE_MODE" => "Y",
		"ADDITIONAL_PICT_PROP_1" => "-",
		"ADDITIONAL_PICT_PROP_2" => "-",
		"ADDITIONAL_PICT_PROP_5" => "-",
		"BASKET_IMAGES_SCALING" => "adaptive",
		"USE_GIFTS" => "Y",
		"GIFTS_PLACE" => "BOTTOM",
		"GIFTS_BLOCK_TITLE" => "Выберите один из подарков",
		"GIFTS_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_TEXT_LABEL_GIFT" => "Подарок",
		"GIFTS_PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"GIFTS_PRODUCT_PROPS_VARIABLE" => "prop",
		"GIFTS_SHOW_OLD_PRICE" => "N",
		"GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
		"GIFTS_MESS_BTN_BUY" => "Выбрать",
		"GIFTS_MESS_BTN_DETAIL" => "Подробнее",
		"GIFTS_PAGE_ELEMENT_COUNT" => "4",
		"GIFTS_CONVERT_CURRENCY" => "N",
		"GIFTS_HIDE_NOT_AVAILABLE" => "N",
		"USE_ENHANCED_ECOMMERCE" => "N"
	),
	false
);?>

<? endif; ?>




<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
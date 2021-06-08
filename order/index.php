<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Оформление заказа");
?>
<? 
$user = CUser::GetID(); //получаем ID текущего пользователя
$group = CUser::GetUserGroup($user); // Получаем массив групп, в которые входит пользователь
if( in_array(7, $group) || in_array(8, $group) || in_array(9, $group) ): ?>

	<?$APPLICATION->IncludeComponent(
		"realweb:sale.order.ajax",
		"order",
		array(
			"ALLOW_NEW_PROFILE" => "Y",
			"SHOW_PAYMENT_SERVICES_NAMES" => "Y",
			"SHOW_STORES_IMAGES" => "N",
			"PATH_TO_BASKET" => "/basket/",
			"PATH_TO_PERSONAL" => "/profile/",
			"PATH_TO_PAYMENT" => "payment.php",
			"PATH_TO_AUTH" => "/auth/",
			"PAY_FROM_ACCOUNT" => "Y",
			"ONLY_FULL_PAY_FROM_ACCOUNT" => "N",
			"COUNT_DELIVERY_TAX" => "N",
			"ALLOW_AUTO_REGISTER" => "Y",
			"SEND_NEW_USER_NOTIFY" => "Y",
			"DELIVERY_NO_AJAX" => "N",
			"DELIVERY_NO_SESSION" => "N",
			"TEMPLATE_LOCATION" => ".default",
			"DELIVERY_TO_PAYSYSTEM" => "d2p",
			"SET_TITLE" => "Y",
			"USE_PREPAYMENT" => "N",
			"DISABLE_BASKET_REDIRECT" => "Y",
			"PRODUCT_COLUMNS" => array(
				0 => "DISCOUNT_PRICE_PERCENT_FORMATED",
				1 => "WEIGHT_FORMATED",
			),
			"PROP_1" => array(
			),
			"PROP_2" => ""
		),
		false
	);?>
<?  else: ?>

	<?$APPLICATION->IncludeComponent(
	"bitrix:sale.order.ajax", 
	"new_logictim_bonus", 
	array(
		"ALLOW_NEW_PROFILE" => "N",
		"SHOW_PAYMENT_SERVICES_NAMES" => "Y",
		"SHOW_STORES_IMAGES" => "N",
		"PATH_TO_BASKET" => "/basket/",
		"PATH_TO_PERSONAL" => "/profile/",
		"PATH_TO_PAYMENT" => "/payment/",
		"PATH_TO_AUTH" => "/auth/",
		"PAY_FROM_ACCOUNT" => "Y",
		"ONLY_FULL_PAY_FROM_ACCOUNT" => "N",
		"COUNT_DELIVERY_TAX" => "N",
		"ALLOW_AUTO_REGISTER" => "Y",
		"SEND_NEW_USER_NOTIFY" => "Y",
		"DELIVERY_NO_AJAX" => "N",
		"DELIVERY_NO_SESSION" => "Y",
		"TEMPLATE_LOCATION" => "popup",
		"DELIVERY_TO_PAYSYSTEM" => "d2p",
		"SET_TITLE" => "Y",
		"USE_PREPAYMENT" => "N",
		"DISABLE_BASKET_REDIRECT" => "Y",
		"SHOW_COUPONS_DELIVERY" => "N",
		"SHOW_COUPONS_BASKET" => "N",
		"SHOW_BASKET_HEADERS" => "Y",
		"USE_YM_GOALS" => "Y",
		"YM_GOALS_COUNTER" => "47108214",
		"YM_GOALS_NEXT_REGION" => "b1",
		"YM_GOALS_NEXT_DELIVERY" => "b2",
		"YM_GOALS_NEXT_PAY_SYSTEM" => "b3",
		"YM_GOALS_NEXT_PROPERTIES" => "b4",
		"YM_GOALS_SAVE_ORDER" => "b5",
		"USE_ENHANCED_ECOMMERCE" => "Y",
		"PRODUCT_COLUMNS" => "",
		"PROP_1" => "",
		"PROP_2" => "",
		"COMPONENT_TEMPLATE" => "new_logictim_bonus",
		"ALLOW_APPEND_ORDER" => "Y",
		"SHOW_NOT_CALCULATED_DELIVERIES" => "L",
		"SPOT_LOCATION_BY_GEOIP" => "Y",
		"SHOW_VAT_PRICE" => "Y",
		"COMPATIBLE_MODE" => "Y",
		"USE_PRELOAD" => "Y",
		"ALLOW_USER_PROFILES" => "N",
		"TEMPLATE_THEME" => "site",
		"SHOW_ORDER_BUTTON" => "final_step",
		"SHOW_TOTAL_ORDER_BUTTON" => "N",
		"SHOW_PAY_SYSTEM_LIST_NAMES" => "Y",
		"SHOW_PAY_SYSTEM_INFO_NAME" => "Y",
		"SHOW_DELIVERY_LIST_NAMES" => "Y",
		"SHOW_DELIVERY_INFO_NAME" => "Y",
		"SHOW_DELIVERY_PARENT_NAMES" => "Y",
		"SKIP_USELESS_BLOCK" => "N",
		"BASKET_POSITION" => "after",
		"DELIVERY_FADE_EXTRA_SERVICES" => "N",
		"SHOW_COUPONS_PAY_SYSTEM" => "Y",
		"SHOW_NEAREST_PICKUP" => "N",
		"DELIVERIES_PER_PAGE" => "20",
		"PAY_SYSTEMS_PER_PAGE" => "9",
		"PICKUPS_PER_PAGE" => "5",
		"SHOW_PICKUP_MAP" => "N",
		"SHOW_MAP_IN_PROPS" => "N",
		"PICKUP_MAP_TYPE" => "yandex",
		"PROPS_FADE_LIST_1" => array(
		),
		"PROPS_FADE_LIST_2" => array(
		),
		"USER_CONSENT" => "N",
		"USER_CONSENT_ID" => "0",
		"USER_CONSENT_IS_CHECKED" => "Y",
		"USER_CONSENT_IS_LOADED" => "N",
		"ACTION_VARIABLE" => "soa-action",
		"PRODUCT_COLUMNS_VISIBLE" => array(
			0 => "PREVIEW_PICTURE",
			1 => "PROPS",
		),
		"ADDITIONAL_PICT_PROP_1" => "-",
		"ADDITIONAL_PICT_PROP_2" => "-",
		"ADDITIONAL_PICT_PROP_5" => "-",
		"BASKET_IMAGES_SCALING" => "adaptive",
		"SERVICES_IMAGES_SCALING" => "adaptive",
		"PRODUCT_COLUMNS_HIDDEN" => array(
		),
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"YM_GOALS_INITIALIZE" => "BX-order-init",
		"YM_GOALS_EDIT_REGION" => "BX-region-edit",
		"YM_GOALS_EDIT_DELIVERY" => "BX-delivery-edit",
		"YM_GOALS_EDIT_PICKUP" => "BX-pickUp-edit",
		"YM_GOALS_EDIT_PAY_SYSTEM" => "BX-paySystem-edit",
		"YM_GOALS_EDIT_PROPERTIES" => "BX-properties-edit",
		"YM_GOALS_EDIT_BASKET" => "BX-basket-edit",
		"YM_GOALS_NEXT_PICKUP" => "BX-pickUp-next",
		"YM_GOALS_NEXT_BASKET" => "BX-basket-next",
		"DATA_LAYER_NAME" => "dataLayer",
		"BRAND_PROPERTY" => "",
		"USE_CUSTOM_MAIN_MESSAGES" => "N",
		"USE_CUSTOM_ADDITIONAL_MESSAGES" => "N",
		"USE_CUSTOM_ERROR_MESSAGES" => "N",
		"EMPTY_BASKET_HINT_PATH" => "/",
		"USE_PHONE_NORMALIZATION" => "Y",
		"HIDE_ORDER_DESCRIPTION" => "N"
	),
	false
);?>
<? endif; ?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
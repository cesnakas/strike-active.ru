<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Результаты поиска");
global $arrCatalogFilter;
global $USER;
global $arUserGroupsIDS;
global $arRelations;
if (defined("USER_CODE")) {
    $arPriceCode[] = PRICE_CODE;
}
$arPriceCode[] = "MAIN_RETAIL";
$arPriceCode[] = "ОПТ РУБ (ОТ 50000 руб)";
$arPriceCode[] = "MAIN1_OPT1";
?>

<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.search", 
	"search", 
	array(
		"COMPONENT_TEMPLATE" => "search",
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "1",
		"ELEMENT_SORT_FIELD" => $GLOBALS["STORE"]?("PROPERTY_REMAINS_".$GLOBALS["STORE"]["XML_ID"]):"CATALOG_AVAILABLE",
		"ELEMENT_SORT_ORDER" => "desc",
		"ELEMENT_SORT_FIELD2" => "YM_PICTURE",
		"ELEMENT_SORT_ORDER2" => "asc",
		"HIDE_NOT_AVAILABLE" => "Y",
		"PAGE_ELEMENT_COUNT" => "200",
		"LINE_ELEMENT_COUNT" => "3",
		"PROPERTY_CODE" => array(
			0 => "CML2_ARTICLE",
			1 => "",
		),
		"OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"OFFERS_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_FIELD2" => "id",
		"OFFERS_SORT_ORDER2" => "desc",
		"OFFERS_LIMIT" => "5",
		"SECTION_URL" => "",
		"DETAIL_URL" => "",
		"BASKET_URL" => "/basket/",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"DISPLAY_COMPARE" => "N",
		"PRICE_CODE" => array(
			0 => "MAIN_RETAIL",
		),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"USE_PRODUCT_QUANTITY" => "Y",
		"CONVERT_CURRENCY" => "N",
		"OFFERS_CART_PROPERTIES" => array(
		),
		"RESTART" => "Y",
		"NO_WORD_LOGIC" => "N",
		"USE_LANGUAGE_GUESS" => "N",
		"CHECK_DATES" => "N",
		"PAGER_TEMPLATE" => "ajax",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Товары",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PRODUCT_PROPERTIES" => "",
		"HIDE_NOT_AVAILABLE_OFFERS" => "Y"
	),
	false
);?>

<div id="add-to-basket-popup" class="popup">
    <div class="popup-info">
        <div data-popup-close="data-popup-close" class="popup-close">x</div>
        <div class="popup-content clear">
                <div class="popup-left">
                    <img src="" class="js-prod-image">
                </div>
                <div class="popup-right">
                    <div class="popup-title js-prod-name"></div>
                    <p>успешно добавлен в корзину</p>
                    <p><a href="#" class="js-close-popup">Продолжить покупки</a></p>
                    <p><a href="/basket/">Оформить заказ</a></p>
                </div>
        </div>
    </div>
</div>

<div id="add-to-basket-err-popup" class="popup">
    <div class="popup-info">
        <div data-popup-close="data-popup-close" class="popup-close">x</div>
        <div class="popup-content clear">
            <p class="js-error-content"></p>
        </div>
    </div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
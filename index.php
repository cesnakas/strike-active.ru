<? 
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetPageProperty("TITLE", "Товары для страйбола в интернет-магазине Strike-active.ru. Опт и розница");
$APPLICATION->SetPageProperty("description", "Купить оружие и расходники для страйкбола в интернет-магазине Strike-active.ru по самой низкой цене. Доставка по всей России.");
$APPLICATION->SetTitle("Товары для страйбола в интернет-магазине Strike-active.ru. Опт и розница");

global $USER;

global $arrCatalogFilter;
global $arUserGroupsIDS;
global $arRelations;
if (defined("USER_CODE")) {
    $arPriceCode[] = PRICE_CODE;
}
$arPriceCode[] = "MAIN_RETAIL";
$arPriceCode[] = "ОПТ РУБ (ОТ 50000 руб)";
$arPriceCode[] = "MAIN1_OPT1";
?>   <div class="b-main-page">
		<div class="row home-top">
			<div class="col-xs-8 home-top-left-part">
				<?$APPLICATION->IncludeComponent(
					"bitrix:news.list", 
					"banners_top_left",
					array(
						"IBLOCK_TYPE" => "banners",
						"IBLOCK_ID"   => "19",
						"NEWS_COUNT"  => "10",
						"PROPERTY_CODE" => array("LINK",""),
					),
					false
				);?>
			</div>
			<div class="col-xs-4 home-top-right-part">
				<?$APPLICATION->IncludeComponent(
					"bitrix:news.list", 
					"banners_top_right",
					array(
						"IBLOCK_TYPE" => "banners",
						"IBLOCK_ID"   => "20",
						"NEWS_COUNT"  => "1",
						"PROPERTY_CODE" => array("LINK",""),
					),
					false
				);?>
			</div>
		</div>		
        <!--<div class="b-cart__top-notice main-page">
            <?//$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
                    //"AREA_FILE_SHOW" => "file",
                    //"PATH" => SITE_TEMPLATE_PATH."/includes/layout/important.php",
                //)
            //);?>
        </div>-->
		<div class="b-main-page__novinki b-main-page__products-slider">
			<div class="b-main-page__products-slider-title">
				<h2>Хиты продаж</h2>
			</div>		
			<?/*$APPLICATION->IncludeComponent(
				"bitrix:catalog.section",
				"homepage",
				Array(
					"ACTION_VARIABLE" => "action",
					"ADD_PICT_PROP" => "MORE_PHOTO",
					"ADD_PROPERTIES_TO_BASKET" => "Y",
					"ADD_SECTIONS_CHAIN" => "N",
					"ADD_TO_BASKET_ACTION" => "ADD",
					"AJAX_MODE" => "N",
					"AJAX_OPTION_ADDITIONAL" => "",
					"AJAX_OPTION_HISTORY" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"BACKGROUND_IMAGE" => "-",
					"BASKET_URL" => "/personal/basket.php",
					"BROWSER_TITLE" => "-",
					"CACHE_FILTER" => "N",
					"CACHE_GROUPS" => "N",
					"CACHE_TIME" => "36000000",
					"CACHE_TYPE" => "N",
					"COMPATIBLE_MODE" => "Y",
					"CONVERT_CURRENCY" => "N",
					//"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[{\"CLASS_ID\":\"CondIBProp:1:263\",\"DATA\":{\"logic\":\"Equal\",\"value\":7126}}]}",
					"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[{\"CLASS_ID\":\"CondIBProp:1:266\",\"DATA\":{\"logic\":\"Equal\",\"value\":7301}}]}",
					"DETAIL_URL" => "",
					"DISABLE_INIT_JS_IN_COMPONENT" => "N",
					"DISPLAY_BOTTOM_PAGER" => "Y",
					"DISPLAY_COMPARE" => "N",
					"DISPLAY_TOP_PAGER" => "N",
					"ELEMENT_SORT_FIELD" => "sort",
					"ELEMENT_SORT_FIELD2" => "id",
					"ELEMENT_SORT_ORDER" => "asc",
					"ELEMENT_SORT_ORDER2" => "desc",
					"HIDE_NOT_AVAILABLE" => "N",
					"HIDE_NOT_AVAILABLE_OFFERS" => "N",
					"IBLOCK_ID" => "1",
					"IBLOCK_TYPE" => "catalog",
					"INCLUDE_SUBSECTIONS" => "Y",
					"LABEL_PROP" => "-",
					"LINE_ELEMENT_COUNT" => "3",
					"MESSAGE_404" => "",
					"MESS_BTN_ADD_TO_BASKET" => "В корзину",
					"MESS_BTN_BUY" => "Купить",
					"MESS_BTN_DETAIL" => "Подробнее",
					"MESS_BTN_SUBSCRIBE" => "Подписаться",
					"MESS_NOT_AVAILABLE" => "Нет в наличии",
					"META_DESCRIPTION" => "",
					"META_KEYWORDS" => "",
					"OFFERS_CART_PROPERTIES" => array(),
					"OFFERS_FIELD_CODE" => array("",""),
					"OFFERS_LIMIT" => "5",
					"OFFERS_PROPERTY_CODE" => array("",""),
					"OFFERS_SORT_FIELD" => "sort",
					"OFFERS_SORT_FIELD2" => "id",
					"OFFERS_SORT_ORDER" => "asc",
					"OFFERS_SORT_ORDER2" => "desc",
					"PAGER_BASE_LINK_ENABLE" => "N",
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL" => "N",
					"PAGER_SHOW_ALWAYS" => "N",
					"PAGER_TEMPLATE" => ".default",
					"PAGER_TITLE" => "Товары",
					"PAGE_ELEMENT_COUNT" => "18",
					"PARTIAL_PRODUCT_PROPERTIES" => "N",
					"PRICE_CODE" => $arPriceCode,
					"PRICE_VAT_INCLUDE" => "Y",
					"PRODUCT_DISPLAY_MODE" => "N",
					"PRODUCT_ID_VARIABLE" => "id",
					"PRODUCT_PROPERTIES" => array(),
					"PRODUCT_PROPS_VARIABLE" => "prop",
					"PRODUCT_QUANTITY_VARIABLE" => "quantity",
					"PRODUCT_SUBSCRIPTION" => "N",
					"PROPERTY_CODE" => array("",""),
					"SECTION_CODE" => "",
					"SECTION_ID" => "",
					"SECTION_ID_VARIABLE" => "SECTION_ID",
					"SECTION_URL" => "",
					"SECTION_USER_FIELDS" => array("",""),
					"SEF_MODE" => "N",
					"SET_BROWSER_TITLE" => "Y",
					"SET_LAST_MODIFIED" => "N",
					"SET_META_DESCRIPTION" => "Y",
					"SET_META_KEYWORDS" => "Y",
					"SET_STATUS_404" => "N",
					"SET_TITLE" => "N",
					"SHOW_404" => "N",
					"SHOW_ALL_WO_SECTION" => "Y",
					"SHOW_CLOSE_POPUP" => "N",
					"SHOW_DISCOUNT_PERCENT" => "N",
					"SHOW_OLD_PRICE" => "N",
					"SHOW_PRICE_COUNT" => "1",
					"TEMPLATE_THEME" => "blue",
					"USE_MAIN_ELEMENT_SECTION" => "N",
					"USE_PRICE_COUNT" => "N",
					"USE_PRODUCT_QUANTITY" => "N"
				),
				$arResult["THEME_COMPONENT"],
				Array(
					'HIDE_ICONS' => 'Y'
				)
			);*/?>
			<?$APPLICATION->IncludeComponent(
				"bitrix:sale.bestsellers",
				"homepage",
				Array(
					"ACTION_VARIABLE" => "action",
					"ADD_PICT_PROP" => "MORE_PHOTO",
					"ADDITIONAL_PICT_PROP_1" => "MORE_PHOTO",
					"ADDITIONAL_PICT_PROP_2" => "MORE_PHOTO",
					"ADDITIONAL_PICT_PROP_5" => "MORE_PHOTO",
					"ADD_PROPERTIES_TO_BASKET" => "Y",
					"AJAX_MODE" => "N",
					"AJAX_OPTION_ADDITIONAL" => "",
					"AJAX_OPTION_HISTORY" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"BASKET_URL" => "/personal/basket.php",
					"BY" => "AMOUNT",
					"CACHE_TIME" => "86400",
					"CACHE_TYPE" => "A",
					"COMPOSITE_FRAME_MODE" => "A",
					"COMPOSITE_FRAME_TYPE" => "AUTO",
					"CONVERT_CURRENCY" => "N",
					"DETAIL_URL" => "",
					"DISPLAY_COMPARE" => "N",
					"FILTER" => array("F"),
					"HIDE_NOT_AVAILABLE" => "Y",
					"ITEM_COUNT" => "20",
					"LABEL_PROP_1" => "-",
					"LABEL_PROP_5" => "-",
					"LINE_ELEMENT_COUNT" => "3",
					"MESS_BTN_BUY" => "Купить",
					"MESS_BTN_DETAIL" => "Подробнее",
					"MESS_BTN_SUBSCRIBE" => "Подписаться",
					"MESS_NOT_AVAILABLE" => "Нет в наличии",
					"OFFER_TREE_PROPS_2" => array(),
					"PAGE_ELEMENT_COUNT" => "20",
					"PARTIAL_PRODUCT_PROPERTIES" => "N",
					"PERIOD" => "365",
					"PRICE_CODE" => $arPriceCode,
					"PRICE_VAT_INCLUDE" => "Y",
					"PRODUCT_ID_VARIABLE" => "id",
					"PRODUCT_PROPERTIES" => array(),
					"PRODUCT_PROPS_VARIABLE" => "prop",
					"PRODUCT_QUANTITY_VARIABLE" => "quantity",
					"PRODUCT_SUBSCRIPTION" => "N",
					"SHOW_CLOSE_POPUP" => "N",
					"SHOW_DISCOUNT_PERCENT" => "N",
					"SHOW_IMAGE" => "Y",
					"SHOW_NAME" => "Y",
					"SHOW_OLD_PRICE" => "N",
					"SHOW_PRICE_COUNT" => "1",
					"SHOW_PRODUCTS_1" => "Y",
					"SHOW_PRODUCTS_5" => "Y",
					"TEMPLATE_THEME" => "blue",
					"USE_PRODUCT_QUANTITY" => "N"
				)
			);?>
			<div class="b-main-page__products-slider-button">
				<a href="/category/">В каталог</a>
			</div>				
		</div>
		<div class="clearfix"></div>
		<?$APPLICATION->IncludeComponent(
			"bitrix:news.list", 
			"banners_middle",
			array(
				"IBLOCK_TYPE" => "banners",
				"IBLOCK_ID"   => "21",
				"NEWS_COUNT"  => "3",
				"PROPERTY_CODE" => array("LINK",""),
			),
			false
		);?>		
		<?$APPLICATION->SetTitle('Товары для страйкбола. Опт и розница');?>
		<div class="b-main-page__akcii b-main-page__products-slider">
			<div class="b-main-page__products-slider-title">
				<h2>Акции</h2>
			</div>
			<?$APPLICATION->IncludeComponent(
				"bitrix:catalog.section",
				"homepage",
				Array(
					"ACTION_VARIABLE" => "action",
					"ADD_PICT_PROP" => "MORE_PHOTO",
					"ADD_PROPERTIES_TO_BASKET" => "Y",
					"ADD_SECTIONS_CHAIN" => "N",
					"ADD_TO_BASKET_ACTION" => "ADD",
					"AJAX_MODE" => "N",
					"AJAX_OPTION_ADDITIONAL" => "",
					"AJAX_OPTION_HISTORY" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"BACKGROUND_IMAGE" => "-",
					"BASKET_URL" => "/personal/basket.php",
					"BROWSER_TITLE" => "-",
					"CACHE_FILTER" => "N",
					"CACHE_GROUPS" => "N",
					"CACHE_TIME" => "36000000",
					"CACHE_TYPE" => "N",
					"COMPATIBLE_MODE" => "Y",
					"CONVERT_CURRENCY" => "N",
					//"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[{\"CLASS_ID\":\"CondIBProp:1:264\",\"DATA\":{\"logic\":\"Equal\",\"value\":7128}}]}",
					"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[{\"CLASS_ID\":\"CondIBProp:1:265\",\"DATA\":{\"logic\":\"Equal\",\"value\":7299}}]}",					
					"DETAIL_URL" => "",
					"DISABLE_INIT_JS_IN_COMPONENT" => "N",
					"DISPLAY_BOTTOM_PAGER" => "Y",
					"DISPLAY_COMPARE" => "N",
					"DISPLAY_TOP_PAGER" => "N",
					"ELEMENT_SORT_FIELD" => "sort",
					"ELEMENT_SORT_FIELD2" => "id",
					"ELEMENT_SORT_ORDER" => "asc",
					"ELEMENT_SORT_ORDER2" => "desc",
					"HIDE_NOT_AVAILABLE" => "N",
					"HIDE_NOT_AVAILABLE_OFFERS" => "N",
					"IBLOCK_ID" => "1",
					"IBLOCK_TYPE" => "catalog",
					"INCLUDE_SUBSECTIONS" => "Y",
					"LABEL_PROP" => "-",
					"LINE_ELEMENT_COUNT" => "3",
					"MESSAGE_404" => "",
					"MESS_BTN_ADD_TO_BASKET" => "В корзину",
					"MESS_BTN_BUY" => "Купить",
					"MESS_BTN_DETAIL" => "Подробнее",
					"MESS_BTN_SUBSCRIBE" => "Подписаться",
					"MESS_NOT_AVAILABLE" => "Нет в наличии",
					"META_DESCRIPTION" => "",
					"META_KEYWORDS" => "",
					"OFFERS_CART_PROPERTIES" => array(),
					"OFFERS_FIELD_CODE" => array("",""),
					"OFFERS_LIMIT" => "5",
					"OFFERS_PROPERTY_CODE" => array("",""),
					"OFFERS_SORT_FIELD" => "sort",
					"OFFERS_SORT_FIELD2" => "id",
					"OFFERS_SORT_ORDER" => "asc",
					"OFFERS_SORT_ORDER2" => "desc",
					"PAGER_BASE_LINK_ENABLE" => "N",
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL" => "N",
					"PAGER_SHOW_ALWAYS" => "N",
					"PAGER_TEMPLATE" => ".default",
					"PAGER_TITLE" => "Товары",
					"PAGE_ELEMENT_COUNT" => "18",
					"PARTIAL_PRODUCT_PROPERTIES" => "N",
					"PRICE_CODE" => $arPriceCode,
					"PRICE_VAT_INCLUDE" => "Y",
					"PRODUCT_DISPLAY_MODE" => "N",
					"PRODUCT_ID_VARIABLE" => "id",
					"PRODUCT_PROPERTIES" => array(),
					"PRODUCT_PROPS_VARIABLE" => "prop",
					"PRODUCT_QUANTITY_VARIABLE" => "quantity",
					"PRODUCT_SUBSCRIPTION" => "N",
					"PROPERTY_CODE" => array("",""),
					"SECTION_CODE" => "",
					"SECTION_ID" => "",
					"SECTION_ID_VARIABLE" => "SECTION_ID",
					"SECTION_URL" => "",
					"SECTION_USER_FIELDS" => array("",""),
					"SEF_MODE" => "N",
					"SET_BROWSER_TITLE" => "Y",
					"SET_LAST_MODIFIED" => "N",
					"SET_META_DESCRIPTION" => "Y",
					"SET_META_KEYWORDS" => "Y",
					"SET_STATUS_404" => "N",
					"SET_TITLE" => "N",
					"SHOW_404" => "N",
					"SHOW_ALL_WO_SECTION" => "Y",
					"SHOW_CLOSE_POPUP" => "N",
					"SHOW_DISCOUNT_PERCENT" => "N",
					"SHOW_OLD_PRICE" => "N",
					"SHOW_PRICE_COUNT" => "1",
					"TEMPLATE_THEME" => "blue",
					"USE_MAIN_ELEMENT_SECTION" => "N",
					"USE_PRICE_COUNT" => "N",
					"USE_PRODUCT_QUANTITY" => "N"
				),
				$arResult["THEME_COMPONENT"],
				Array(
					'HIDE_ICONS' => 'Y'
				)
			);?>
			<div class="b-main-page__products-slider-button">
				<a href="/actions/">Смотреть все акции</a>
			</div>			
		</div>		
		<div class="b-main-page__features">
			<?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
					"AREA_FILE_SHOW" => "file",
					"PATH" => SITE_TEMPLATE_PATH."/includes/layout/advantages.php",
				)
			);?>
		</div>

        <div class="b-main-page__about">
            <h1 class="b-main-page__about-title">Страйкбольный магазин "Страйк Актив"</h1>
            <div class="b-main-page__about-text">
                <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
                        "AREA_FILE_SHOW" => "file",
                        "PATH" => SITE_TEMPLATE_PATH."/includes/layout/about.php",
                    )
                );?>
            </div>
           <!-- <div class="b-main-page__about-btns">
                <a href="/about/" class="b-main-page__about-btn">Узнать больше</a>
            </div>
			<div class="b-main-page__about-btns">
                <a href="/3d-tour/" class="b-main-page__about-btn">3D-тур</a>
            </div>-->
        </div>
<div class="b-brands-wrap">
		<div class="b-main-page__brands-title">Работаем только с проверенными производителями товаров для страйкбола</div>
		<div class="b-main-page__brands">
			<div class="swiper-container-home-brands">
				<!-- Additional required wrapper -->
				<div class="swiper-wrapper">
					<!-- Slides -->
					<div class="swiper-slide">
						<div class="img-wrap">
							<img src="/upload/iblock/3c5/3c597a5eaba600980a41e8adf14a63ae.png" alt=""/>
						</div>
					</div>
					<div class="swiper-slide">
						<div class="img-wrap"><img src="/upload/iblock/bbb/bbb1beb38d9065a17e49d38402256488.jpg" alt=""/></div>
					</div>
					<div class="swiper-slide">
						<div class="img-wrap"><img src="/upload/iblock/f8a/f8a4346d74bb0fbd88af2c43f1c44dca.jpg" alt=""/></div>
					</div>
					<div class="swiper-slide">
						<div class="img-wrap"><img src="/upload/iblock/8c2/8c2d01b6fb1686db969e669d30148914.jpg" alt=""/></div>
					</div>
					<div class="swiper-slide">
						<div class="img-wrap"><img src="/upload/iblock/02c/02c6cac23e53342410e50cd422f8c417.jpg" alt=""/></div>
					</div>
					<div class="swiper-slide">
						<div class="img-wrap"><img src="/upload/iblock/bed/bed152b59083bc51990bbb77d013ddfb.jpg" alt=""/></div>
					</div>
					<div class="swiper-slide">
						<div class="img-wrap"><img src="/upload/iblock/eb2/eb2a74ab31774c25e3fc1da7a663e87f.jpg" alt=""/></div>
					</div>
					<div class="swiper-slide">
						<div class="img-wrap"><img src="/upload/iblock/ea8/ea8a0aa3fc049ecb0604083d4e422ffd.jpg" alt=""/></div>
					</div>
					<div class="swiper-slide">
						<div class="img-wrap"><img src="/upload/iblock/e12/e1280c2176c8d48994cea632ce7c554b.jpg" alt=""/></div>
					</div>
					<div class="swiper-slide">
						<div class="img-wrap"><img src="/upload/iblock/8db/8db049f57a0175754e77b6a1c4f5a2fa.jpg" alt=""/></div>
					</div>
					<div class="swiper-slide">
						<div class="img-wrap"><img src="/upload/iblock/866/866eb021f871a39b32cb192dd17dab88.jpg" alt=""/></div>
					</div>
					<div class="swiper-slide">
						<div class="img-wrap"><img src="/upload/iblock/0dd/0dd9fc78c9d29ef8e02a66d3b5ec5520.jpg" alt=""/></div>
					</div>
					<div class="swiper-slide">
						<div class="img-wrap"><img src="/upload/iblock/ce1/ce1f1d86cbdd55262fd58c81f1c94f03.png" alt=""/></div>
					</div>
					<div class="swiper-slide">
						<div class="img-wrap"><img src="/upload/iblock/c1d/c1da6cc4343ae39211b523130b96c31c.jpg" alt=""/></div>
					</div>
					<div class="swiper-slide">
						<div class="img-wrap"><img src="/upload/iblock/a6c/a6c461080c821c4d69ff6d204b450626.jpg" alt=""/></div>
					</div>
					<div class="swiper-slide">
						<div class="img-wrap"><img src="/upload/iblock/0fc/0fc3cdd84bc5a8cd8ca1c1963095a975.jpg" alt=""/></div>
					</div>
					<div class="swiper-slide">
						<div class="img-wrap"><img src="/upload/iblock/b87/b8762e4619da59b594cfff668fb80773.png" alt=""/></div>
					</div>
					<div class="swiper-slide">
						<div class="img-wrap"><img src="/upload/iblock/ea0/ea0c557f7e3ef591614fea648b0ef8de.png" alt=""/></div>
					</div>
					<div class="swiper-slide">
						<div class="img-wrap"><img src="/upload/iblock/25e/25ec787df4a97949bfde91928be31dfd.png" alt=""/></div>
					</div>
					<div class="swiper-slide">
						<div class="img-wrap"><img src="/upload/iblock/a93/a9311ad133aeff6a1a2621fc199544bc.png" alt=""/></div>
					</div>
					<div class="swiper-slide">
						<div class="img-wrap"><img src="/upload/iblock/8b9/8b90becae360482abe535ac80de2cd8b.jpg" alt=""/></div>
					</div>
					<!--<div class="swiper-slide">
						<img src="/upload/brands/AIM_TOP.png" alt=""/>
					</div>
					<div class="swiper-slide">
						<img src="/upload/brands/A-K.png" alt=""/>
					</div>
					<div class="swiper-slide">
						<img src="/upload/brands/Ares.png" alt=""/>
					</div>
					<div class="swiper-slide">
						<img src="/upload/brands/Asia_Electric_Gun.png" alt=""/>
					</div>
					<div class="swiper-slide">
						<img src="/upload/brands/Avalon.png" alt=""/>
					</div>
					<div class="swiper-slide">
						<img src="/upload/brands/CAA_Airsoft.png" alt=""/>
					</div>
					<div class="swiper-slide">
						<img src="/upload/brands/Classic_Army.png" alt=""/>
					</div>
					<div class="swiper-slide">
						<img src="/upload/brands/CYMA.png" alt=""/>
					</div>
					<div class="swiper-slide">
						<img src="/upload/brands/Galaxy.png" alt=""/>
					</div>
					<div class="swiper-slide">
						<img src="/upload/brands/GG.png" alt=""/>
					</div>
					<div class="swiper-slide">
						<img src="/upload/brands/GHK.png" alt=""/>
					</div>
					<div class="swiper-slide">
						<img src="/upload/brands/Gletcher.png" alt=""/>
					</div>
					<div class="swiper-slide">
						<img src="/upload/brands/Guarder.png" alt=""/>
					</div>
					<div class="swiper-slide">
						<img src="/upload/brands/HFC.png" alt=""/>
					</div>
					<div class="swiper-slide">
						<img src="/upload/brands/ICS.png" alt=""/>
					</div>
					<div class="swiper-slide">
						<img src="/upload/brands/Jing_Gong.png" alt=""/>
					</div>
					<div class="swiper-slide">
						<img src="/upload/brands/Kalash.png" alt=""/>
					</div>
					<div class="swiper-slide">
						<img src="/upload/brands/King_Arms.png" alt=""/>
					</div>
					<div class="swiper-slide">
						<img src="/upload/brands/KJW.png" alt=""/>
					</div>
					<div class="swiper-slide">
						<img src="/upload/brands/KSC.png" alt=""/>
					</div>
					<div class="swiper-slide">
						<img src="/upload/brands/KWA.png" alt=""/>
					</div>
					<div class="swiper-slide">
						<img src="/upload/brands/KWC.png" alt=""/>
					</div>
					<div class="swiper-slide">
						<img src="/upload/brands/LCT.png" alt=""/>
					</div>
					<div class="swiper-slide">
						<img src="/upload/brands/Magpul_PTS.png" alt=""/>
					</div>
					<div class="swiper-slide">
						<img src="/upload/brands/Real_Sword.png" alt=""/>
					</div>
					<div class="swiper-slide">
						<img src="/upload/brands/Silver_Back.png" alt=""/>
					</div>
					<div class="swiper-slide">
						<img src="/upload/brands/Snow_Wolf.png" alt=""/>
					</div>
					<div class="swiper-slide">
						<img src="/upload/brands/SRC.png" alt=""/>
					</div>
					<div class="swiper-slide">
						<img src="/upload/brands/ST.png" alt=""/>
					</div>
					<div class="swiper-slide">
						<img src="/upload/brands/Stark_Arms.png" alt=""/>
					</div>
					<div class="swiper-slide">
						<img src="/upload/brands/VFC.png" alt=""/>
					</div>
					<div class="swiper-slide">
						<img src="/upload/brands/WE.png" alt=""/>
					</div>
					<div class="swiper-slide">
						<img src="/upload/brands/WELL.png" alt=""/>
					</div>
					<div class="swiper-slide">
						<img src="/upload/brands/WG.png" alt=""/>
					</div>-->					
				</div>		
			</div>
			<div class="all-btn-brands"><a href="/brands/">Все бренды</a></div>
		<div class="swiper-button-next swiper-button-next-brands swiper-button-black"></div>
		<div class="swiper-button-prev swiper-button-prev-brands swiper-button-black"></div>	
		</div>
</div>
		<div class="b-main-page__categories">
			<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list", 
	"vagency", 
	array(
		"VIEW_MODE" => "TEXT",
		"SHOW_PARENT_NAME" => "Y",
		"IBLOCK_ID" => "1",
		"IBLOCK_TYPE" => "catalog",
		"SECTION_ID" => "",
		"SECTION_CODE" => "",
		"SECTION_URL" => "",
		"COUNT_ELEMENTS" => "N",
		"TOP_DEPTH" => "2",
		"SECTION_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"ADD_SECTIONS_CHAIN" => "Y",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_NOTES" => "",
		"CACHE_GROUPS" => "Y",
		"COMPONENT_TEMPLATE" => "vagency"
	),
	false
);?>
		</div>
    </div>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
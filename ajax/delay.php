<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
\Bitrix\Main\Loader::includeModule('sale');

$id = intval($_REQUEST['id']);
$name = htmlspecialchars($_REQUEST['name']);
$price = intval($_REQUEST['price']);
$url = htmlspecialchars($_REQUEST['url']);

$arFields = array(
    "PRODUCT_ID" => $id,
    "PRICE" => $price,
    "CURRENCY" => "RUB",
    "QUANTITY" => 1,
    "LID" => SITE_ID,
    "DELAY" => "Y",
    "NAME" => $name,
    "DETAIL_PAGE_URL" => $url
  );

CSaleBasket::Add($arFields);


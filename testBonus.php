<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
\Bitrix\Main\Loader::includeModule('sale');

//global $USER;
//$USER->Authorize("1");

$order_id = 3489;

$arOrder = CSaleOrder::GetByID($order_id);
var_dump(strtotime($arOrder['DATE_PAYED']));
var_dump($arOrder);
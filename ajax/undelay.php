<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
use Bitrix\Sale;
\Bitrix\Main\Loader::includeModule('sale');

$id = intval($_REQUEST['id']);

$basketRes = Sale\Internals\BasketTable::getList(array(
	'filter' => array(
		'FUSER_ID' => Sale\Fuser::getId(), 
		'ORDER_ID' => null,
		'LID' => SITE_ID,
		'DELAY' => 'Y',
		"PRODUCT_ID" => $id
	)
));
if ($item = $basketRes->fetch()) {
	Sale\Internals\BasketTable::delete($item['ID']);
}

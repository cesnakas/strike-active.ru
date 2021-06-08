<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
\Bitrix\Main\Loader::includeModule('sale');

if($USER->isAdmin())
{
	$orderPropertyId = 5;
	
	$arFilter = Array(
	   ">=DATE_INSERT" => date($DB->DateFormatToPHP(CSite::GetDateFormat("SHORT")), mktime(0, 0, 0, date("n"), 1, date("Y"))),
		"PAYED" => "Y"
	   );
	
	$db_sales = CSaleOrder::GetList(array("DATE_INSERT" => "ASC"), $arFilter);
	$orderRegion = [];
	while ($ar_sales = $db_sales->Fetch())
	{
		$orderId = $ar_sales['ID'];
		$order = \Bitrix\Sale\Order::load($orderId);
		$propertyCollection = $order->getPropertyCollection();
		$somePropValue = $propertyCollection->getItemByOrderPropertyId($orderPropertyId);
		$location = $somePropValue->getValue();
		$arLocs = CSaleLocation::GetByID($location, LANGUAGE_ID);
		if($arLocs['CITY_NAME'])
		{
			$region = $arLocs['REGION_NAME_ORIG'] ? $arLocs['REGION_NAME_ORIG'] : $arLocs['CITY_NAME'];
	
			if(array_key_exists($region, $orderRegion)) {
				$orderRegion[$region]['COUNT_ORDERS']++;
				$orderRegion[$region]['SUM_ORDERS'] += $ar_sales['PRICE'];
			} else {
				$orderRegion[$region] = ['REGION'=>iconv('UTF-8', 'Windows-1251', $region), 'COUNT_ORDERS'=>1, 'SUM_ORDERS'=>$ar_sales['PRICE']];
			}
	
		}
	}
	uasort($orderRegion, 'compare_count');

	$fp = fopen('ordersRegion.csv', 'w');
	foreach ($orderRegion as $fields) {
		fputcsv($fp, $fields, ";");
	}
	fclose($fp);
?>
<a href="/ordersRegion.csv" download>Скачать файл ordersRegion.csv</a>
<?
}

function compare_count($v1, $v2) {
    if (strtolower($v1["COUNT_ORDERS"]) == strtolower($v2["COUNT_ORDERS"])) return 0;
		return (strtolower($v1["COUNT_ORDERS"]) < strtolower($v2["COUNT_ORDERS"])) ? 1: -1;
  }
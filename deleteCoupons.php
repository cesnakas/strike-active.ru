<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
use Bitrix\Main\Application;
CModule::IncludeModule("sale");
$curDay = date("d")-3;
$curMonth = date("m");
$curYear = date("Y");
$ids = [];

$couponIterator = \Bitrix\Sale\Internals\DiscountCouponTable::getList(array('filter' => array('@DISCOUNT_ID' => 41, "!ID"=>2,
		"<=DATE_CREATE" => date($DB->DateFormatToPHP(CLang::GetDateFormat("SHORT")), mktime(0, 0, 0, $curMonth, $curDay, $curYear)))));
while ($coupon = $couponIterator->fetch()) {
	$ids[] = $coupon['ID'];
}
if(!empty($ids)){
$conn = Application::getConnection();
$helper = $conn->getSqlHelper();
$conn->queryExecute(
	'delete from b_sale_discount_coupon where '.$helper->quote('ID').' = '.$ids
);
}
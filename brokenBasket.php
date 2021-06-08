<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("sale");
$curDay = date("d")-7;
$curMonth = date("m");
$curYear = date("Y");
$dbBasketItems = CSaleBasket::GetList(
     array(
                "USER_ID" => "ASC",
                "ID" => "ASC"
             ),
     array(
                "LID" => SITE_ID,
                "ORDER_ID" => "NULL",
		 		">=DATE_INSERT" => date($DB->DateFormatToPHP(CLang::GetDateFormat("SHORT")), mktime(0, 0, 0, $curMonth, $curDay, $curYear)),
		 		"<=DATE_INSERT" => date($DB->DateFormatToPHP(CLang::GetDateFormat("SHORT")), mktime(23, 59, 59, $curMonth, $curDay, $curYear))
             ),
     false,
     false,
     array("ID", "PRODUCT_ID", "QUANTITY", "PRICE", "NAME", "USER_ID", "DATE_INSERT")
             );
$i=0;
$item = array();
while ($arItems[$i] = $dbBasketItems->Fetch())
{
$item[$arItems[$i]["USER_ID"]]["USER_ID"] = $arItems[$i]["USER_ID"];
$item[$arItems[$i]["USER_ID"]][] = $arItems[$i];
$i++;
}

foreach($item as $val) {
	if($val["USER_ID"]){
		$arGroups = CUser::GetUserGroup($val["USER_ID"]);
		if(in_array(12, $arGroups)) continue;
		$rsUser = CUser::GetByID($val["USER_ID"]);
		$arUser = $rsUser->Fetch();
		$field["EMAIL"] = $arUser["EMAIL"];
			$field["COUPON"] = null;

		$coupon = \Bitrix\Sale\Internals\DiscountCouponTable::generateCoupon(true);
	
		$addDb = \Bitrix\Sale\Internals\DiscountCouponTable::add(array(
		  'DISCOUNT_ID' => 41,
		  'COUPON'      => $coupon,
		  'TYPE'        => \Bitrix\Sale\Internals\DiscountCouponTable::TYPE_ONE_ORDER,
		  'MAX_USE'     => 1,
		  'USER_ID'     => 0,
		  'DESCRIPTION' => ''
	   ));
	
	   if ($addDb->isSuccess()) {
		  $field["COUPON"] = $coupon;
		}


		CEvent::Send("BROKEN_BASKET", SITE_ID, $field);
		//file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/brokenBasket.txt", "[".date('d.m.Y H:i:s')."] ".var_export($val, 1), FILE_APPEND);
	}
}
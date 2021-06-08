<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
\Bitrix\Main\Loader::includeModule("sale");

$dbBasketItems = CSaleBasket::GetList(
        array(
                "NAME" => "ASC",
                "ID" => "ASC"
            ),
        array(
                "FUSER_ID" => CSaleBasket::GetBasketUserID(),
                "LID" => SITE_ID,
                "ORDER_ID" => "NULL",
				"DELAY" => "N"
            ),
        false,
        false,
        array("ID", "PRODUCT_ID", "QUANTITY", "PRICE")
    );
while ($arItems = $dbBasketItems->Fetch())
{
	CSaleBasket::Delete($arItems['ID']);
}
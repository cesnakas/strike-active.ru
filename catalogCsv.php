<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
\Bitrix\Main\Loader::includeModule('iblock');

$IBLOCK_ID = 1;
$SECTION_ID = 445;
$urlPart = "https://strike-active.ru/category/";

$arSelect = Array("ID", "NAME", "IBLOCK_ID", "PROPERTY_CML2_ARTICLE", "CODE", "IBLOCK_SECTION_ID", "XML_ID");
$arFilter = Array("IBLOCK_ID"=>IntVal($IBLOCK_ID), "ACTIVE"=>"Y");//, "SECTION_ID" => $SECTION_ID, "INCLUDE_SUBSECTIONS"=> "Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
$list = [];
while($ob = $res->GetNextElement())
{
 	$arFields = $ob->GetFields();
	$res2 = CIBlockSection::GetByID($arFields["IBLOCK_SECTION_ID"]);
	if($ar_res = $res2->GetNext())
	{
		$sectionCode = $ar_res['CODE'];
	}
	$url = $urlPart.$sectionCode."/".$arFields['CODE']."/";
	$ar_res = CPrice::GetBasePrice($arFields['ID']);
	$list[] = [$arFields['ID'], $arFields['XML_ID'], iconv("UTF-8", "Windows-1251", $arFields['NAME']), iconv("UTF-8", "Windows-1251", $arFields['PROPERTY_CML2_ARTICLE_VALUE']), $url, round($ar_res['PRICE'])];
}

$fp = fopen('catalog.csv', 'w');

foreach ($list as $fields) {
    fputcsv($fp, $fields, ";");
}

fclose($fp);
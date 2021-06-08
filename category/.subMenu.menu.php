<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION;

$aMenuLinksExt=$APPLICATION->IncludeComponent("bitrix:menu.sections", "", array(
    "IS_SEF" => "N",
    "ID" => "",
    "IBLOCK_TYPE" => "catalog",
    "IBLOCK_ID" => "1",
    "SECTION_URL" => "",
    "DEPTH_LEVEL" => "3",
    "CACHE_TYPE" => "A",
    "CACHE_TIME" => "3600"
),
    false
);

$aMenuLinks = Array(
	Array(
		"АКЦИИ", 
		"/actions/", 
		Array("/actions/"),
		Array("IS_PARENT"=>"", "DEPTH_LEVEL"=>"1"), 
		"" 
	)
);

$aMenuLinks = array_merge($aMenuLinksExt, $aMenuLinks);
?>
 
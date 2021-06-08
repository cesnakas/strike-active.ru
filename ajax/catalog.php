<?
if (!defined('PUBLIC_AJAX_MODE')) {
    define('PUBLIC_AJAX_MODE', true);
}
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if(!empty($_REQUEST["ACTION"])){
    global $USER;
    $arResult = array();
    switch($_REQUEST["ACTION"]){
        case "STOCKS_LIST":{
            /*
             * список складов, на которых доступен товар PRODUCT_ID
             * NOT_SHOW_STOCK_ID - ID склада, который не нужно выводить
             */
            if(intval($_REQUEST["PRODUCT_ID"]) > 0){
                $arPricesForUser = array();
                $arUserGroupsId = $USER->GetUserGroup($USER->GetID());

                //Связи типов цен и групп пользователей
                $priceForUserRes = CCatalogGroup::GetGroupsList(Array());
                while($priceForUser = $priceForUserRes->GetNext()){
                    $arPricesForUser[] = $priceForUser;
                }

                //типы цен
                $dbPriceType = CCatalogGroup::GetList(array(),array(),false,false,array("ID", "NAME"));
                $ElementPrices = array();
                while ($arPriceType = $dbPriceType->Fetch()){
                    //проверка доступности типа цены для пользователя
                    $isPriceForUser = false;
                    if(count($arPricesForUser) > 0){
                        foreach($arPricesForUser as $arPricesForUserItem){
                            if($arPricesForUserItem["CATALOG_GROUP_ID"] == $arPriceType["ID"] && in_array($arPricesForUserItem["GROUP_ID"], $arUserGroupsId)){
                                $isPriceForUser = true;
                                break;
                            }
                        }
                    }
                    if($isPriceForUser){
                        //Цены товара
                        $ProductPriceRes = CPrice::GetList(
                            array(),
                            array("PRODUCT_ID" => $_REQUEST["PRODUCT_ID"], "CATALOG_GROUP_ID" => $arPriceType["ID"])
                        );
                        while($ProductPrice = $ProductPriceRes->Fetch()){
                            $ProductPrice["NAME"] = $arPriceType["NAME"];
                            $ElementPrices[] = $ProductPrice;
                        }
                    }
                }

                //список складов
                $resStoresList = CCatalogStore::GetList(
                    array("SORT" => "ASC"),
                    array(),
                    false,
                    false,
                    array("ID", "TITLE", "ISSUING_CENTER", "XML_ID")
                );
                while($StoresListItem = $resStoresList->GetNext()){
                    $actualPrice = array();
                    //кол-во остатков на складе
                    $obStoreProduct = CCatalogStoreProduct::GetList(
                        array(),
                        array("PRODUCT_ID" => $_REQUEST["PRODUCT_ID"], ">AMOUNT" => 0, "=STORE_ID" => $StoresListItem["ID"]),
                        false,
                        false,
                        array("ID", "AMOUNT")
                    );
                    if($arStoreProduct = $obStoreProduct->Fetch()){
                        if(intval($arStoreProduct["AMOUNT"]) > 0 && count($ElementPrices)  > 0){
                            foreach($ElementPrices as $ElementPricesItem){
                                if(strpos($ElementPricesItem["NAME"], $StoresListItem["XML_ID"]) !== false){
                                    $actualPrice[] = array(
                                        "VALUE" => floatval($ElementPricesItem["PRICE"]),
                                        "PRINT_VALUE" => number_format(floatval($ElementPricesItem["PRICE"]), 0, ".", " ")
                                    );
                                }
                            }
                            $arResult[] = array(
                                "ID" => $StoresListItem["ID"],
                                "NAME" => $StoresListItem["TITLE"],
                                "CODE" => $StoresListItem["XML_ID"],
                                "AMOUNT" => $arStoreProduct["AMOUNT"],
                                "PRICE" => $actualPrice
                            );
                        }
                    }
                }
            }
            break;
        }
        default:{
        
            break;
        }
    }
    echo json_encode($arResult);
}

?>
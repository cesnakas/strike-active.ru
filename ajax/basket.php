<?
/*
 * Основные операции с корзиной
 * @var $_REQUEST["ACTION"]
 */

if(!empty($_REQUEST["ACTION"])){
    
    require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
    $arResult = array();
    
    if(CModule::IncludeModule("sale") && CModule::IncludeModule("catalog") && CModule::IncludeModule("iblock")){
    
        switch($_REQUEST["ACTION"]){
            case "ADD_TO_BASKET":{
                $ID = intval($_REQUEST["ID"]);
                $QNT = (intval($_REQUEST["QUANTITY"]) > 0 ? intval($_REQUEST["QUANTITY"]) : 1);
                $STOCK_ID = intval($_REQUEST['STOCK_ID']);
                $PRICE = intval($_REQUEST['PRICE']);
                if($ID > 0){
                    //информация о товаре
                    $elemRes = CIBlockElement::GetByID($ID);
                    if($elemInfo = $elemRes->GetNext()){
                        $arResult = array(
                            "IBLOCK_ID" => $elemInfo["IBLOCK_ID"],
                            "ID" => $elemInfo["ID"],
                            "NAME" => $elemInfo["NAME"],
                            "XML_ID" => $elemInfo["XML_ID"],
                            "STOCK_ID" => $STOCK_ID
                        );
                    }
                    
                    //типы цен
                    /*$dbPriceType = CCatalogGroup::GetList(array(),array(),false,false,array("ID", "NAME"));
                    while($PriceType = $dbPriceType->Fetch()){
                        $arPriceType[$PriceType["NAME"]] = $PriceType;
                    }
                    
                    //склад товара
                    if(!empty($_REQUEST["STOCK_ID"])){
                        $resStoresList = CCatalogStore::GetList(
                            array("SORT" => "ASC"),
                            array("ID" => $_REQUEST["STOCK_ID"]),
                            false,
                            false,
                            array("ID", "TITLE", "ISSUING_CENTER", "XML_ID")
                        );
                        while($StoresListItem = $resStoresList->GetNext()){
                            if(count($arPriceType) > 0){
                                foreach($arPriceType as $arPriceTypeItem){
                                    if(strpos($arPriceTypeItem["NAME"], $StoresListItem["XML_ID"]) !== false){
                                        //цена товара для склада
                                        $ProductPriceRes = CPrice::GetList(
                                            array(),
                                            array("PRODUCT_ID" => $ID, "CATALOG_GROUP_ID" => $arPriceTypeItem["ID"])
                                        );
                                        if($ProductPrice = $ProductPriceRes->Fetch()){
                                            $arResult["PRICE"] = $ProductPrice;
                                        }
                                        $arResult["STOCK_ID"] = $StoresListItem["ID"];
                                    }
                                }
                            }
                        }
                    }
                    if(count($arResult["PRICE"]) == 0){
                        //розничная цена, если у товара отсутствует склад
                        $arResult["STOCK_ID"] = 0;
                        $ProductPriceRes = CPrice::GetList(
                            array(),
                            array("PRODUCT_ID" => $ID, "CATALOG_GROUP_ID" => $arPriceType["retail"]["ID"])
                        );
                        if($ProductPrice = $ProductPriceRes->Fetch()){
                            $arResult["PRICE"] = $ProductPrice;
                        }
                    }*/
                    
                    //проверяем, товары какого склада находятся в корзине
                    $basketStockID = $STOCK_ID;
                    $basketRes = CSaleBasket::GetList(
                        array("NAME" => "ASC","ID" => "ASC"),
                        array("FUSER_ID" => CSaleBasket::GetBasketUserID(),"LID" => SITE_ID,"ORDER_ID" => "NULL"),
                        false,
                        false,
                        array()
                    );
                    while($basketItem = $basketRes->Fetch()){
                        $basketItemPropsRes = CSaleBasket::GetPropsList(
                            array(),
                            array("BASKET_ID" => $basketItem["ID"])
                        );
                        while($basketItemProp = $basketItemPropsRes->Fetch()){
                            if($basketItemProp["CODE"] == "STOCK_ID"){
                                $basketStockID = $basketItemProp["VALUE"];
                            }
                        }
                    }

                    //добавление товара в корзину
                    if($basketStockID == $arResult["STOCK_ID"]){
                        $basket = \Bitrix\Sale\Basket::loadItemsForFUser(\Bitrix\Sale\Fuser::getId(), \Bitrix\Main\Context::getCurrent()->getSite());
                        $properties = [
                            "CATALOG.XML_ID" => [
                                'NAME' => 'Catalog XML_ID',
                                'CODE' => 'CATALOG.XML_ID',
                                'VALUE' => $elemInfo["IBLOCK_EXTERNAL_ID"],
                                'SORT' => 100
                            ],						
                            "PRODUCT.XML_ID" => [
                                'NAME' => 'Product XML_ID',
                                'CODE' => 'PRODUCT.XML_ID',
                                'VALUE' => $elemInfo["XML_ID"],
                                'SORT' => 200
                            ],						
                            "STOCK_ID" => [
                                'NAME' => 'ID склада',
                                'CODE' => 'STOCK_ID',
                                'VALUE' => $arResult["STOCK_ID"],
                                'SORT' => 300
                            ],
                            "ARTICLE" => [
                                'NAME' => 'Артикул',
                                'CODE' => 'ARTICLE',
                                'VALUE' => $elemInfo["PROPERTY_CML2_ARTICLE_VALUE"],
                                'SORT' => 400
                            ],
                            "PREVIEW_PICTURE" => [
                                'NAME' => 'Изображение товара',
                                'CODE' => 'PREVIEW_PICTURE',
                                'VALUE' => $elemInfo["PREVIEW_PICTURE"],
                                'SORT' => 500
                            ]
                        ];
                        if ($item = $basket->getExistsItem('catalog', $arResult["ID"], $properties)) {
                            $item->setField('QUANTITY', $item->getQuantity() + $QNT);
                        } else {
                            $item = $basket->createItem('catalog', $arResult["ID"]);
                            $item->setFields(array(
                                'NAME' => htmlspecialchars_decode($arResult["NAME"]),
                                'QUANTITY' => $QNT,
                                'CURRENCY' => \Bitrix\Currency\CurrencyManager::getBaseCurrency(),
                                'LID' => \Bitrix\Main\Context::getCurrent()->getSite(),
                                'PRODUCT_PROVIDER_CLASS' => 'CCatalogProductProviderCustom',
                                'PRICE' => $PRICE,
								'DETAIL_PAGE_URL' => $elemInfo["DETAIL_PAGE_URL"],
								'CATALOG_XML_ID' => $elemInfo["IBLOCK_EXTERNAL_ID"],
								'PRODUCT_XML_ID' => $elemInfo["XML_ID"],
                                //'CUSTOM_PRICE' => 'Y',
                            ));
                        }
                        $result = $basket->save();

                        if(isset($properties)) {
                            $basketPropertyCollection = $item->getPropertyCollection();
                            $basketPropertyCollection->setProperty($properties);
                            $basketPropertyCollection->save();
                        }
                        if ($result->isSuccess()) {
                            $arResult = array(
                                "STATUS" => "SUCCESS",
                                "MSG" => "Товар успешно добавлен в корзину",
                                //"NAME" => serialize($elemInfo),
								"NAME" => $elemInfo["NAME"],
                                "PICTURE" => (intval($elemInfo["PREVIEW_PICTURE"] > 0) ? CFile::GetPath($elemInfo["PREVIEW_PICTURE"]) : "/bitrix/templates/.default/components/bitrix/catalog/_catalog/bitrix/catalog.section/.default/images/no_photo.png")
                            );
                        } else {
                            $arResult = array(
                                "STATUS" => "ERROR",
                                "MSG" => "Во время добавления товара в корзину произошла ошибка"
                            );
                        }

                        /*$arFields = array(
                            "PRODUCT_ID" => $arResult["ID"],
                            "PRICE" => $PRICE,
                            "QUANTITY" => $QNT,
                            "CHAR" => "",
                            "LID" => LANG,
                            "CAN_BUY" => "Y",
                            "CURRENCY" => "RUB",
                            "NAME" => htmlspecialchars_decode($arResult["NAME"]),
                            "CALLBACK_FUNC" => "",
                            "MODULE" => "catalog",
                            "NOTES" => "",
                            "ORDER_CALLBACK_FUNC" => "",
                            "PRODUCT_XML_ID" => $arResult["XML_ID"],
                            //"CUSTOM_PRICE" => "Y"
                            //"PRODUCT_PROVIDER_CLASS" => ""
                        );
                        $arFields["PROPS"][] = array(
                            "NAME" => "ID склада",
                            "CODE" => "STOCK_ID",
                            "VALUE" => $arResult["STOCK_ID"]
                        );
                        //дополнительная информация о товаре
                        $elemInfoRes = CIBlockElement::GetList(
                            array(), 
                            array("IBLOCK_ID" => $arResult["IBLOCK_ID"], "ID" => $arResult["ID"]), 
                            false, 
                            false, 
                            array("IBLOCK_ID", "ID", "PREVIEW_PICTURE", "PROPERTY_CML2_ARTICLE", "NAME")
                        );
                        if ($elemInfo = $elemInfoRes->GetNext()) {
                            $arFields["PROPS"][] = array(
                                "NAME" => "Артикул",
                                "CODE" => "ARTICLE",
                                "VALUE" => $elemInfo["PROPERTY_CML2_ARTICLE_VALUE"]
                            );
                            $arFields["PROPS"][] = array(
                                "NAME" => "Изображение товара",
                                "CODE" => "PREVIEW_PICTURE",
                                "VALUE" => $elemInfo["PREVIEW_PICTURE"]
                            );
                        }
                        
                        //echo json_encode($arFields);die();

                        if(CSaleBasket::Add($arFields)){
                            $arResult = array(
                                "STATUS" => "SUCCESS",
                                "MSG" => "Товар успешно добавлен в корзину",
                                "NAME" => $elemInfo["NAME"],
                                "PICTURE" => (intval($elemInfo["PREVIEW_PICTURE"] > 0) ? CFile::GetPath($elemInfo["PREVIEW_PICTURE"]) : "/bitrix/templates/.default/components/bitrix/catalog/_catalog/bitrix/catalog.section/.default/images/no_photo.png")
                            );
                        }
                        else{
                            $arResult = array(
                                "STATUS" => "ERROR",
                                "MSG" => "Во время добавления товара в корзину произошла ошибка"
                            );
                        }*/
                    }
                    else{
                        $arResult = array(
                            "STATUS" => "ERROR",
                            "MSG" => "Вы не можете добавлять в корзину товары с разных складов"
                        );
                    }
                }
                break;
            }
        }
        
    }
    else{
        $arResult = array(
            "STATUS" => "ERROR",
            "MSG" => "Не подключены модули каталога"
        );
    }
    
    echo json_encode($arResult);
    
}
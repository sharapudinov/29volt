<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $APPLICATION; 
$aMenuLinksExt = $APPLICATION->IncludeComponent(
    "bitrix:menu.sections",
    "",
    Array(
        "ID" => $_REQUEST["ID"], 
        "IBLOCK_TYPE" => "products", 
        "IBLOCK_ID" => "3", 
        "SECTION_URL" => "/catalog/phone/section.php?", 
        "DEPTH_LEVEL" => "1", 
        "CACHE_TYPE" => "A", 
        "CACHE_TIME" => "3600" 
    )
);
$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
?>
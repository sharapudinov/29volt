<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>



<?
foreach($arResult["ITEMS"] as $cell=>$arElement):
$res = CIBlockElement::GetProperty(3, $arElement['ID'], "sort", "asc", array("CODE" => "CENTER"));
$ob = $res->GetNext();
if($ob['VALUE']){
	$width = 0;
	$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CATALOG_ELEMENT_DELETE_CONFIRM')));
?>
<li>
        <a href="<?=$arElement["DETAIL_PAGE_URL"]?>"><?=$arElement["NAME"]?></a>
        <?=($arElement["PREVIEW_TEXT_TYPE"] == 'html') ? $arElement["PREVIEW_TEXT"] : '<span>'.$arElement["PREVIEW_TEXT"].'</span>';?>

<?
	foreach($arElement["PRICES"] as $code=>$arPrice):
		if($arPrice["CAN_ACCESS"]):
?>
	<div class="catalog-item-price"><span><?=$arResult["PRICES"][$code]["TITLE"];?>:</span> <?=$arPrice["PRINT_VALUE"]?></div>
<?
		endif;
	endforeach;
?>
</li>

<?
}
endforeach; // foreach($arResult["ITEMS"] as $arElement):
?>

</ul>
</div>
<?echo ($arResult['~DESCRIPTION']);?>
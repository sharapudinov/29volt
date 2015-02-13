<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="clearfix">
<ul class="sistem">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
    $res = CIBlockElement::GetProperty(3, $arItem['ID'], "sort", "asc", array("CODE" => "CENTER"));
    $ob = $res->GetNext();
    if($ob['VALUE']){

	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<li>
	<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>">
		<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
		<?echo $arItem["NAME"]?>
		<?endif;?>
    </a>
        <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
        <?=($arItem["PREVIEW_TEXT_TYPE"] == 'html') ? $arItem["PREVIEW_TEXT"] : '<span>'.$arItem["PREVIEW_TEXT"].'</span>';?>
		<?endif;?>
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<div style="clear:both"></div>
		<?endif?>
		<?foreach($arItem["FIELDS"] as $code=>$value):?>
			<small>
			<?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?>
			</small><br />
		<?endforeach;?>
		<?foreach($arItem["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
			<small>
			<?=$arProperty["NAME"]?>:&nbsp;
			<?if(is_array($arProperty["DISPLAY_VALUE"])):?>
				<?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
			<?else:?>
				<?=$arProperty["DISPLAY_VALUE"];?>
			<?endif?>
			</small><br />
		<?endforeach;?>
		<!--div rel="block" class="hover"><a href="<?//echo $arItem["DETAIL_PAGE_URL"]?>">читать полностью</a></div-->
	</li>
    <? } endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</ul>
</div>

<?$APPLICATION->IncludeFile(
	SITE_DIR."include/bottom_text.php",
	Array(),
	Array("MODE"=>"html")
);
?>

</div>
<?
$arSection  =  array ();
if  (is_array( $arResult [ "SECTION" ][ "PATH" ]) && (count( $arResult [ "SECTION" ][ "PATH" ]) >  0 )) {
    $arSection  = end( $arResult [ "SECTION" ][ "PATH" ]);
}
if  ( isset ( $arSection [ "DESCRIPTION" ]) && (strlen( $arSection [ "DESCRIPTION" ]) >  0 )): ?>
    <?=$arSection [ "DESCRIPTION" ] ?>
<? endif ; ?>
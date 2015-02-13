<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
    <div class="first">
        <a href="<?echo ($arItem['CODE']) ? $arItem['CODE'] : 'javascript:void(0)'?>">
            <img alt="<?=$arItem['NAME']?>" src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>">
            <div class="text" style="background: <?=$arItem['PROPERTIES']['COLOR']['VALUE']?>">
                <h3 class="title" >
                    <b><?=$arItem['NAME']?></b><br>
                </h3>
                <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
                    <p><?echo $arItem["PREVIEW_TEXT"];?></p>
                <?endif;?>
                <div class="price_cl">
                    <?=$arItem['PROPERTIES']['PRICE']['VALUE']?>
                </div>
            </div>
        </a>
    </div>

		<?/*foreach($arItem["FIELDS"] as $code=>$value):?>
			<small>
			<?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?>
			</small><br />
		<?endforeach;*/?>
		<?/*foreach($arItem["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
			<small>
			<?=$arProperty["NAME"]?>:&nbsp;
			<?if(is_array($arProperty["DISPLAY_VALUE"])):?>
				<?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
			<?else:?>
				<?=$arProperty["DISPLAY_VALUE"];?>
			<?endif?>
			</small><br />
		<?endforeach;*/?>
		<!--div rel="block" class="hover"><a href="<?echo $arItem["DETAIL_PAGE_URL"]?>">читать полностью</a></div-->
    <? endforeach;?>

<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"",
	Array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
		"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
		"DISPLAY_PANEL" => "N",
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"SHOW_PARENT_NAME" => $arParams["SECTION_SHOW_PARENT_NAME"]
	),
	$component
);?>
<?
$width = 0; /*
  if($arParams['DETAIL_SHOW_PICTURE'] != 'N' && (is_array($arResult["PREVIEW_PICTURE"]) || is_array($arResult["DETAIL_PICTURE"]))):
  ?>
  <div class="catalog-item-image">
  <?
  if(is_array($arResult["DETAIL_PICTURE"])):
  $width = $arResult["DETAIL_PICTURE"]["WIDTH"];
  ?>
  <img border="0" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>" height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>" />
  <?
  elseif(is_array($arResult["PREVIEW_PICTURE"])):
  $width = $arResult["PREVIEW_PICTURE"]["WIDTH"];
  ?>
  <img border="0" src="<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arResult["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arResult["PREVIEW_PICTURE"]["HEIGHT"]?>" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>" />
  <?
  endif;
  ?>
  </div>
  <?
  endif; */
?>

    <div class="left_sitb">
        <?
        if ($arResult["DETAIL_TEXT"]):
            echo $arResult["DETAIL_TEXT"];
        elseif ($arResult["PREVIEW_TEXT"]):
            echo $arResult["PREVIEW_TEXT"];
        endif;
        ?>
    </div>

    <div class="right_sitb">
        <?
            if (is_array($arResult['DISPLAY_PROPERTIES']) && count($arResult['DISPLAY_PROPERTIES']) > 0):
                foreach ($arResult["DISPLAY_PROPERTIES"] as $pid => $arProperty):
                    $name_dir = $arProperty['NAME'];
                    $array = $arProperty['VALUE'];
                endforeach;
                ?>
                <h2><? echo $name_dir; ?>:</h2>
                <ul class="solutions">
                    <?
                    foreach ($array as $arImg):
                        $res = CIBlockElement::GetByID($arImg);
                        if ($ar_res = $res->GetNext())
                            
                            ?>
                        <li>
                            <a href="<?= $ar_res["DETAIL_PAGE_URL"] ?>">
                                <?
                                $img = ($ar_res['DETAIL_PICTURE']) ? $ar_res['DETAIL_PICTURE'] : $ar_res['PREVIEW_PICTURE'];
                                $file = CFile::ResizeImageGet($img, array('width' => 150, 'height' => 150), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                                echo '<img src="' . $file['src'] . '" width="' . $file['width'] . '" height="' . $file['height'] . '" />';
                                ?>
                        <? echo $ar_res["NAME"]; ?>
                            </a>
                        </li>
        <? endforeach;?>
                </ul>
                <div class="bott_bk_7"></div>
        <?
    endif;
?>
    </div>
<div class="clear"></div>
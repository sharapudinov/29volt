<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
$APPLICATION->IncludeComponent(
        "bitrix:catalog.section.list", "", Array(
    "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
    "IBLOCK_ID" => $arParams["IBLOCK_ID"],
    "SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
    "SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
    "DISPLAY_PANEL" => "N",
    "CACHE_TYPE" => $arParams["CACHE_TYPE"],
    "CACHE_TIME" => $arParams["CACHE_TIME"],
    "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
    "COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
    "SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
    "SHOW_PARENT_NAME" => $arParams["SECTION_SHOW_PARENT_NAME"]
        ), $component
);
?>
<div class="catalog-list">
    <h2>Оборудование из Европы</h2>


    <?
    foreach ($arResult["ITEMS"] as $cell => $arElement):
        $width = 0;
        $this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CATALOG_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="equipment" id="<?= $this->GetEditAreaId($arElement['ID']); ?>">
            <?
            if (is_array($arElement["PREVIEW_PICTURE"])):
                $width = $arElement["PREVIEW_PICTURE"]["WIDTH"];
                ?>
                <div class="img_eg">
                    <a class="link_more" href="<?= $arElement["DETAIL_PAGE_URL"] ?>">
                    <img border="0" src="<?= $arElement["PREVIEW_PICTURE"]["SRC"] ?>" width="<?= $arElement["PREVIEW_PICTURE"]["WIDTH"] ?>" height="<?= $arElement["PREVIEW_PICTURE"]["HEIGHT"] ?>" alt="<?= $arElement["NAME"] ?>" title="<?= $arElement["NAME"] ?>" />
                    </a>
                </div>
                <?
            elseif (is_array($arElement["DETAIL_PICTURE"])):
                $width = $arElement["DETAIL_PICTURE"]["WIDTH"];
                ?>
                <div class="img_eg">
                    <a class="link_more" href="<?= $arElement["DETAIL_PAGE_URL"] ?>">
                    <img border="0" src="<?= $arElement["DETAIL_PICTURE"]["SRC"] ?>" width="<?= $arElement["DETAIL_PICTURE"]["WIDTH"] ?>" height="<?= $arElement["DETAIL_PICTURE"]["HEIGHT"] ?>" alt="<?= $arElement["NAME"] ?>" title="<?= $arElement["NAME"] ?>" />
                    </a>
                </div>
                <?
            endif;
            ?>
            <div class="eq_text">
                <a class="title" href="<?= $arElement["DETAIL_PAGE_URL"] ?>"><?= $arElement["NAME"] ?></a>
                <? /*
                  foreach($arElement["DISPLAY_PROPERTIES"] as $pid=>$arProperty):
                  if ($pid != 'PRICECURRENCY'):
                  ?>
                  <?=$arProperty["NAME"]?>:&nbsp;<?
                  if(is_array($arProperty["DISPLAY_VALUE"]))
                  echo implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);
                  else
                  echo $arProperty["DISPLAY_VALUE"];?><br />
                  <?
                  endif;
                  endforeach; */
                ?>
                <?= ($arElement["PREVIEW_TEXT_TYPE"] == 'html') ? $arElement["PREVIEW_TEXT"] : '<p>' . $arElement["PREVIEW_TEXT"] . '</p>'; ?>

            </div>

            <?
            foreach ($arElement["PRICES"] as $code => $arPrice):
                if ($arPrice["CAN_ACCESS"]):
                    ?>
                    <div class="catalog-item-price"><span><?= $arResult["PRICES"][$code]["TITLE"]; ?>:</span> <?= $arPrice["PRINT_VALUE"] ?></div>
                    <?
                endif;
            endforeach;
            ?>
            <div class="cost"><p>Прайс лист:</p><span>
                    <?
                    $res = CIBlockElement::GetProperty(11, $arElement["ID"], "sort", "asc", array("CODE" => "PRICE"));
                    while ($ob = $res->GetNext()) {
                        $VALUES[] = $ob['VALUE'];
                    }
                    ?>
                    <? if ($VALUES[0] > 0): ?>
                        <?
                        foreach ($VALUES as $val) {
                            $rsFile = CFile::GetByID($val);
                            $arFile = $rsFile->Fetch();
                            $descr = $arFile["ORIGINAL_NAME"];
                            ?>
                            <? echo "<a href=/upload/" . $arFile["SUBDIR"] . "/" . $arFile["FILE_NAME"] . " >Скачать</a>"; ?>
                        <?
                        }
                    endif;
                    unset($VALUES);
                    ?>
                </span></div>

        </div>
        <?
    endforeach; // foreach($arResult["ITEMS"] as $arElement):
    ?>

    <? /* if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
      <br /><?=$arResult["NAV_STRING"]?>
      <?endif; */ ?>
</div>
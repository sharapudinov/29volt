<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<div class="content">
    <div class="left_sitb"> 
        <h4>Сотрудники “29 Вольт”:</h4>
        <? foreach ($arResult["ITEMS"] as $arItem): ?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <div class="person" id="<?=$arItem['ID']; ?>">
                <div class="person_name">
                    <? if ($arParams["DISPLAY_NAME"] != "N" && $arItem["NAME"]): ?>
                        <p class="tow_row"><? echo $arItem["NAME"] ?><br />
                            <span><? echo $arItem["DISPLAY_PROPERTIES"]['POST']['VALUE'] ?></span></p>
                    <? endif; ?>
                </div>
                <div class="person_contacts">
                    <p><span class="tow_row">тел:.</span> <? echo $arItem["DISPLAY_PROPERTIES"]['PHONE']['VALUE'] ?><br/>
                        <span>E-mail:</span> <? echo $arItem["DISPLAY_PROPERTIES"]['EMAIL']['VALUE'] ?></p> 
                </div>
                <? /* foreach($arItem["FIELDS"] as $code=>$value):?>
                  <small>
                  <?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?>
                  </small><br />
                  <?endforeach; */ ?>
                <? /* foreach($arItem["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
                  <small>
                  <?=$arProperty["NAME"]?>:&nbsp;
                  <?if(is_array($arProperty["DISPLAY_VALUE"])):?>
                  <?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
                  <?else:?>
                  <?=$arProperty["DISPLAY_VALUE"];?>
                  <?endif?>
                  </small><br />
                  <?endforeach; */ ?>
            </div> 

        <? endforeach; ?>
        <? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
            <br /><?= $arResult["NAV_STRING"] ?>
        <? endif; ?>
    </div> 
    <div class="right_sitb">
        <div class="about_persons">
            <div class="inform_at_person">
            <h2><?= $arResult["ITEMS"][0]['NAME'] ?>:</h2>
                <div>
<?
                $renderImage = CFile::ResizeImageGet($arResult["ITEMS"][0]['DETAIL_PICTURE']['ID'], array('width' => 223, 'height' => 168), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                echo $img = '<img src="' . $renderImage['src'] . '" width="' . $renderImage['width'] . '" height="' . $renderImage['height'] . '" />';
?>
                    <div class="skill">
                        <p><span>Опыт в аналогичной должности: </span><?= $arResult["ITEMS"][0]['PROPERTIES']['EXPIRIENCE']['VALUE'] ?></p>
                        <p><span>Образование:</span> <?= $arResult["ITEMS"][0]['PROPERTIES']['EDUCATION']['VALUE'] ?></p>
                        <p><span>Проживание:</span> <?= $arResult["ITEMS"][0]['PROPERTIES']['RESIDENCE']['VALUE'] ?></p>
                        <p><span>Профессиональная сфера:</span>
                            <?
                            foreach ($arResult["ITEMS"][0]['PROPERTIES']['PRO_DOMAIN']['VALUE'] as $val) {
                                echo $val . ' / ';
                            }
                            ?>
                        </p>
                    </div>
<?= ($arResult["ITEMS"][0]['DETAIL_TEXT_TYPE'] == 'html') ? $arResult["ITEMS"][0]['DETAIL_TEXT'] : '<p>'.$arResult["ITEMS"][0]['DETAIL_TEXT'].'</p>'; ?>
                </div>
            </div>
            <div class="bott_bk_3"></div>
        </div> 
    </div>
</div>
    <script>
        $('.person').click(function() {
            var id = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: '/ajax/ajax.php',
            data: ({
                id: id
            }),
            success: function(msg) {
                $('.content .right_sitb').html(msg);
                                console.log(msg);

//                $('.quick_add_Win .weight').text('Вес ' + msg['weight']);
//                $('.quick_add_Win .artnumber').text('Артикул ' + msg['art']);
//                $('.quick_add_Win .old_price').text(msg['old'] + ' руб');
//                $('.quick_add_Win .new_price').text(msg['new_price'] + ' руб');
//                $('.quick_add_Win .det_image').attr('src', msg['det_img']);
//alert(msg);
            }
        });
        });
    </script>
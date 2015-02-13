<?require_once ($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include.php");
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
CModule::IncludeModule("iblock");
$id = $_REQUEST['id'];
$arSelect = Array("ID", "IBLOCK_ID", "NAME", "DETAIL_PICTURE", "DETAIL_TEXT", "DETAIL_TEXT_TYPE", "PROPERTY_*");
$arFilter = Array("IBLOCK_ID" => 7, "ID" => $id, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
while ($ob = $res->GetNextElement()) {
    $arFields = $ob->GetFields();
    $arProps = $ob->GetProperties();
    ?>
    <div class="about_persons">
        <div class="inform_at_person">
        <h2><?= $arFields['NAME'] ?>:</h2>

            <div>
                <?
                $renderImage = CFile::ResizeImageGet($arFields['DETAIL_PICTURE'], array('width' => 223, 'height' => 168), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                echo $img = '<img src="' . $renderImage['src'] . '" width="' . $renderImage['width'] . '" height="' . $renderImage['height'] . '" />';
                ?>
                <div class="skill">
                    <? if ($arProps['EXPIRIENCE']['VALUE']): ?>
                        <p><span>Опыт в аналогичной должности: </span><?= $arProps['EXPIRIENCE']['VALUE'] ?></p>
                    <? endif; ?>
                    <? if ($arProps['EDUCATION']['VALUE']): ?>
                        <p><span>Образование:</span> <?= $arProps['EDUCATION']['VALUE'] ?></p>
                    <? endif; ?>
                    <? if ($arProps['RESIDENCE']['VALUE']): ?>
                        <p><span>Проживание:</span> <?= $arProps['RESIDENCE']['VALUE'] ?></p>
                        <? endif; ?>
                        <? if ($arProps['PRO_DOMAIN']['VALUE']): ?>
                        <p><span>Профессиональная сфера:</span>
                            <?
                            $count = count($arProps['PRO_DOMAIN']['VALUE']);
                            foreach ($arProps['PRO_DOMAIN']['VALUE'] as $val) {
                                $count--;
                                echo ($count == 0) ? $val : $val . ' / ';
                            }
                            ?>
                        </p>
                <? endif; ?>
                </div>
    <?= ($arFields['DETAIL_TEXT_TYPE'] == 'html') ? $arFields['DETAIL_TEXT'] : '<p>' . $arFields['DETAIL_TEXT'] . '</p>'; ?>
            </div>
        </div>
        <div class="bott_bk_3"></div>
    </div> 
<?
}
}
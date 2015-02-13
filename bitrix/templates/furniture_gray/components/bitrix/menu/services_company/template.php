<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (!empty($arResult)): ?>
    <div class="trust_us">
        <h2>Вы можете нам доверить:</h2>
        <ul>

            <?
            foreach ($arResult as $arItem):
                if ($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
                    continue;
                ?>
                <? if ($arItem["SELECTED"]): ?>
                    <li class="active"><a href="<?= $arItem["LINK"] ?>" ><?= $arItem["TEXT"] ?></a></li>
                    <? else: ?>
                    <li><a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a></li>
                <? endif ?>

            <? endforeach ?>

        </ul>
        <div class="bott_bk_1"></div>
    </div>
    <?
endif?>

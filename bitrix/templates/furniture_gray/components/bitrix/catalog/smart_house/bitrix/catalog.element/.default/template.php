<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
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
        <div class="block_photo">
                <ul class="slides">
                    <?
                    $i = 1;
                    foreach ($arResult['PROPERTIES']['PHOTO']['VALUE'] as $id_img) {
                        $file = CFile::ResizeImageGet($id_img, array('width' => 800, 'height' => 600), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                        ?>
                        <li data-thumb="<?= $file['src'] ?>" <? if($i > 3) echo 'style="display:none;"'; ?>><a rel="catalog-detail-images" class="catalog-detail-images" href="<?= $file['src'] ?>"><img src="<?= $file['src'] ?>" title="<?=$file['name']?>" /></a></li>
                        <? $i++;
                    }
                    ?>
                </ul>
    </div>
    </div>
<div class="clear"></div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.catalog-detail-images').fancybox({
            'transitionIn': 'elastic',
            'transitionOut': 'elastic',
            'speedIn': 600,
            'speedOut': 200,
            'overlayShow': true,
            'cyclic': true,
            'padding': 20,
            'titlePosition': 'over',
            'type': 'image'
        });
    });
</script>
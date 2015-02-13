<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
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
  <div id="main" role="main">
      <section class="slider_flexs">
        <div class="flexslider">
          <ul class="slides">
                <?
                foreach ($arResult['PROPERTIES']['MORE_PHOTO']['VALUE'] as $id_img) {
                    $file = CFile::ResizeImageGet($id_img, array('width' => 800, 'height' => 600), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                    ?>
                    <li data-thumb="<?= $file['src'] ?>"><a rel="catalog-detail-images" class="catalog-detail-images" href="<?= $file['src'] ?>"><img src="<?= $file['src'] ?>" title="<?=$file['name']?>" /></a></li>
                <? }
                ?>
          </ul>
        </div>
      </section>
    </div>

  <!-- FlexSlider -->
  <script type="text/javascript">
    $(window).load(function(){
      $('.flexslider').flexslider({
        animationLoop: false,
        animation: "slide",
        controlNav: "thumbnails",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>
    <div class="detail_text">
<h5><?= $arResult["NAME"] ?></h5>
        <?
        if ($arResult["DETAIL_TEXT"]):
            echo $arResult["DETAIL_TEXT"];
        elseif ($arResult["PREVIEW_TEXT"]):
            echo $arResult["PREVIEW_TEXT"];
        endif;
        ?>
  </div>

<div class="clear"></div>
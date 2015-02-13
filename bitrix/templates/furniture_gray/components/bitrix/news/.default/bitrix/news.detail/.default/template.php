<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$APPLICATION->AddHeadScript('/bitrix/templates/'.SITE_TEMPLATE_ID.'/js/fancybox/jquery.fancybox-1.3.1.pack.js');
$APPLICATION->SetAdditionalCSS('/bitrix/templates/'.SITE_TEMPLATE_ID.'/js/fancybox/jquery.fancybox-1.3.1.css');?>
<script type="text/javascript">
    $(document).ready(function() {
        $('.catalog-detail-images').fancybox({
            'transitionIn': 'elastic',
            'transitionOut': 'elastic',
            'speedIn': 600,
            'speedOut': 200,
            'overlayShow': false,
            'cyclic': true,
            'padding': 20,
            'titlePosition': 'over',
            'type': 'image',
            'onComplete': function() {
                $("#fancybox-title").css({'top': '100%', 'bottom': 'auto'});
            }
        });
    });
</script>
<div class="content">
  <div id="main" role="main">
      <section class="slider_flexs">
        <div class="flexslider">
        <?if($arResult['PROPERTIES']['MORE_PHOTO']['VALUE']):?>
          <ul class="slides">
                <?
                foreach ($arResult['PROPERTIES']['MORE_PHOTO']['VALUE'] as $id_img) {
                    $file = CFile::ResizeImageGet($id_img, array('width' => 800, 'height' => 600), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                    ?>
                    <li data-thumb="<?= $file['src'] ?>">
                        <a rel="catalog-detail-images" class="catalog-detail-images" href="<?= $file['src'] ?>">
                            <img src="<?= $file['src'] ?>" title="<?=$file['name']?>" />
                        </a>
                    </li>
                <? }
                ?>
          </ul>
	<?else:?>
            <? $file = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"]["ID"], array('width' => 800, 'height' => 600), BX_RESIZE_IMAGE_PROPORTIONAL, true); ?>
                        <a rel="catalog-detail-images" class="catalog-detail-images" href="<?= $file['src'] ?>">
                            <img class="detail_picture" border="0" src="<?=$file["src"]?>" width="<?=$file['width']?>" height="<?=$file['height']?>" alt="<?=$file["name"]?>"  title="<?=$file["name"]?>" />
                        </a>
	<?endif?>
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
</div>
<div class="clear"></div>
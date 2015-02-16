<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
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
<div id="lofslidecontent45" class="lof-slidecontent lof-snleft">
    <div class="preload"><div></div></div>
    <!-- MAIN CONTENT -->
    <div class="lof-main-outer">
        <ul class="lof-main-wapper">
            <?  foreach ($arResult['PROPERTIES']['MORE_PHOTO']['VALUE'] as $id_img) :?>
            <li>
                <img src="<?=CFile::GetPath($id_img);?>" />

            </li>
            <?endforeach?>
        </ul>
    </div>
    <!-- END MAIN CONTENT -->
    <!-- NAVIGATOR -->

    <div class="lof-navigator-outer">

        <ul class="lof-navigator">
          <?  foreach ($arResult['PROPERTIES']['MORE_PHOTO']['VALUE'] as $id_img) :?>
           <? $file = CFile::ResizeImageGet($id_img, array('width' => 800, 'height' => 600), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
            <li>
                <div>
                    <img src="<?=$file['src'];?>"/>
                </div>
            </li>
            <?endforeach?>
        </ul>
    </div>
</div>
<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/css/lofslide.css" />
<script type="text/javascript" type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery.easing.js"></script>
<script type="text/javascript" type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/script-lof.js"></script>
<script type="text/javascript">

    $(document).ready( function(){
        $('#lofslidecontent45').lofJSidernews( { interval:2000,
            //easing:'easeOutBounce',
            duration:0,
            maxItemDisplay	 	: 4,
            navigatorHeight		: 75,
            navigatorWidth		: 90,
            auto:false } );
    });

</script>


<div class="detail_text_eq">
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
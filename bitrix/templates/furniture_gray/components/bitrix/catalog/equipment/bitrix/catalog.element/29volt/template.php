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
            <li>
                <span class="discounts"></span>
                <span class="gifts"></span>
                <img src="img/clock.jpg" />

            </li>
            <li>
                <img src="img/clock-a.jpg" />
            </li>
            <li>
                <img src="img/clock.jpg" />
            </li>
            <li>

                <img src="img/clock-a.jpg" />
            </li>

        </ul>
    </div>
    <!-- END MAIN CONTENT -->
    <!-- NAVIGATOR -->

    <div class="lof-navigator-outer">
        <ul class="lof-navigator">
            <li>
                <div>
                    <img src="img/clock-mini.png" />

                </div>
            </li>
            <li>
                <div>
                    <img src="img/clock-mini2.png" />

                </div>
            </li>

            <li>
                <div>
                    <img src="img/clock-mini.png" />

                </div>
            </li>

            <li>
                <div>
                    <img src="img/clock-mini2.png" />

                </div>
            </li>


        </ul>
    </div>
</div>
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
        <div class="offers_pay"><a class="hellp_3" id="login_pop">Оформить заказ</a></div>
    </section>
</div>

<!-- FlexSlider -->
<script type="text/javascript">
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails",
            start: function(slider) {
                $('body').removeClass('loading');
            }
        });
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
<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
IncludeTemplateLangFile(__FILE__);
if (CSite::InDir('/index.php')) {
    $isFrontPage = true;
}
$isContent = false;
if (CSite::InDir('/about/') || CSite::InDir('/help/') || CSite::InDir('/search/') || CSite::InDir('/helpers/')) {
    $isContent = true;
}
if (CSite::InDir('/about/contacts/')) {
    $isContacts = true;
}
if (CSite::InDir('/catalog/')) {
    $isCatalog = true;
}
if (preg_match('#^/catalog/(.*)/(.*).html#', $APPLICATION->GetCurPage())) {
    $isItem = true;
}
?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link rel="shortcut icon" href="<?= SITE_TEMPLATE_PATH ?>/favicon.ico">
<? $APPLICATION->ShowHead(); ?>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<!--[if lt IE 9]>
<link rel="stylesheet" type="text/css" href="css/ie.css">
<![endif]-->
<link href="<?= SITE_TEMPLATE_PATH ?>/css/style.css" rel="stylesheet" type="text/css">
<link href="<?= SITE_TEMPLATE_PATH ?>/css/flexslider.css" rel="stylesheet" type="text/css">
<link href="<?= SITE_TEMPLATE_PATH ?>/css/jquery.bxslider.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/global.css">
<link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/style2.css">
<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
<noscript>
    <link rel="stylesheet" type="text/css" href="<?= SITE_TEMPLATE_PATH ?>/css/nojs.css" />
</noscript>
<? if ($isFrontPage): ?>
    <link href="<?= SITE_TEMPLATE_PATH ?>/css/menu.css" rel="stylesheet" type="text/css">
<? endif; ?>

<link href='http://fonts.googleapis.com/css?family=Istok+Web:400,700&subset=cyrillic,latin' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"  type="text/javascript"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/script.js" type="text/javascript"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/topmenuscripts.js" type="text/javascript"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/slides.min.jquery.js" type="text/javascript"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/jquery.bxslider.min.js" type="text/javascript" ></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/jquery.cslider.js" type="text/javascript" ></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/modernizr.custom.28468.js" type="text/javascript" ></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/jquery.flexslider.js" type="text/javascript" ></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.hellp_1').click(function() {
            $('.popup_1').show(500);
            $('.overlay').show(0);
        });
        $('.feedback-form .close').click(function() {
            $('.popup_1').hide(200);
            $('.overlay').hide(0);
        });
        
        $('.hellp_2').click(function() {
            $('.popup_2').show(500);
            $('.overlay').show(0);
        });
        $('.feedback-form .close').click(function() {
            $('.popup_2').hide(200);
            $('.overlay').hide(0);
        });

        $('.hellp_3').click(function() {
            $('.popup_3').show(500);
            $('.overlay').show(0);
        });
        $('.feedback-form .close').click(function() {
            $('.popup_3').hide(200);
            $('.overlay').hide(0);
        });

        $('.offers li').hover(function() {
            $(this).find('.hover').show(0);
        }, function() {
            $(this).find('.hover').hide(0);
        });

        $('.wrapp_img').hover(function() {
            $(this).find('.bg_news').hide(0);
        }, function() {
            $(this).find('.bg_news').show(0);
        });

        $('.slider1').bxSlider({
            slideWidth: 330,
            minSlides: 2,
            maxSlides: 2,
            slideMargin: 10
        });
    });
    $(function() {
        $('.slider').slides({
            auto: true,
            preloadImage: 'img/loading.gif',
            play: 5000,
            pause: 2500,
            hoverPause: true,
            animationStart: function() {
                $('.caption').animate({
                    top: 0
                }, 0);
            },
            animationComplete: function(current) {
                $('.caption').animate({
                    top: 0
                }, 50);
                if (window.console && console.log) {
                    // example return of current slide number
                    console.log(current);
                }
                ;
            }
        });

        $('#da-slider').cslider({
            autoplay: true,
            bgincrement: 450,
            interval: 15000
        });
    });
</script>
<script type="text/javascript">
  $('.bxslider').bxSlider({
  buildPager: function(slideIndex){
    switch(slideIndex){
      case 0:
        return '<images src="<?=SITE_TEMPLATE_PATH?>/images/g_5.jpg">';
      case 1:
        return '<images src="<?=SITE_TEMPLATE_PATH?>/images/g_1.jpg">';
      case 2:
        return '<images src="<?=SITE_TEMPLATE_PATH?>/images/g_1.jpg">';
      case 3:
        return '<images src="<?=SITE_TEMPLATE_PATH?>/images/g_1.jpg">';
      case 4:
        return '<images src="<?=SITE_TEMPLATE_PATH?>/images/g_1.jpg">';
    }
  }
});
</script>
<script>
    /*$(document).ready(function() {
     $('.hover,.hover_2').each(function() {
     var hover = $(this);
     hover.hide();
     $("#" + hover.attr('rel')).hover(function() {
     hover.toggle(0);
     });
     });
     });*/
</script>

<!--[if lte IE 6]>
<style type="text/css">

        #banner-overlay { 
                background-image: none;
                filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?= SITE_TEMPLATE_PATH ?>images/overlay.png', sizingMethod = 'crop'); 
        }

        div.product-overlay {
                background-image: none;
                filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?= SITE_TEMPLATE_PATH ?>images/product-overlay.png', sizingMethod = 'crop');
        }
</style>
<![endif]--> 
<title><? $APPLICATION->ShowTitle() ?></title>
</head>
<body>

    <div id="panel"><? $APPLICATION->ShowPanel(); ?></div>

    <div class="overlay" id="login_form"></div>
    <div class="popup_1">
        <form id="order_call" class="feedback-form" name="form">
            <div class="inputs">
                <div class="popup-inner">
                    <p class="question1">Заказать звонок:</p>
                    <p class="question3">Вы можете отправить нам вопрос или сообщение и мы Вам обязательно ответим:</p>
                    <input type="hidden" name="call" value="" />
                    <input type="hidden" name="title" value="Заказать звонок" />
                    <p style="margin:0; padding:0;"><input type="text" autocomplete="on" placeholder="ФИО" value="" name="contact_name"></p>
                    <p style="margin:0; padding:0;"> <input  type="text" autocomplete="on" placeholder="тел." value="" name="contact_phone"></p>
                    <p style="margin:0; padding:0;"> <input  type="text" autocomplete="on" placeholder="удобное время для звонка" value="" name="contact_time"></p>
                    <p style="margin:0; padding:0;"><textarea rows="10" cols="45" placeholder="Коментарий" name="detail"></textarea></p>
                    <input id="call-submit" type="submit"  name="image_button" value="Отправить" alt="Отправьте заявку">
                </div>
                <a class="close" href="javascript:void(0)"></a>
                <div class="sent_message" style="display:none;color: white;padding-top: 60px;">
                    <p class="paragraph"><b>Ваше сообщение успешно отправлено!</b></p>
                    <p class="paragraph">Мы свяжемся с вами по номеру телефона, который был указан при отправке сообщения.</p>
                </div>
            </div>
        </form>
    </div>
    <div class="popup_2">
        <form id="callback" class="feedback-form" name="form1">
            <div class="inputs">
                <div class="popup-inner">
                    <p class="question1">Oбратная связь:</p>
                    <p class="question3">Вы можете отправить нам вопрос или сообщение и мы Вам обязательно ответим:</p>
                    <input type="hidden" name="call" value="" />
                    <input type="hidden" name="title" value="Сообщение из формы обратная связь" />
                    <p style="margin:0; padding:0;"><input type="text" autocomplete="on" placeholder="ФИО" value="" name="contact_name"></p>
                    <p style="margin:0; padding:0;"> <input  type="text" autocomplete="on" placeholder="тел." value="" name="contact_phone"></p>
                    <p style="margin:0; padding:0;"> <input  type="text" autocomplete="on" placeholder="E-mail" value="" name="contact_email"></p>
                    <p style="margin:0; padding:0;"><textarea rows="10" cols="45" placeholder="Коментарий" name="detail"></textarea></p>
                    <input id="call-submit" type="submit"  name="image_button" value="Отправить" alt="Отправьте заявку">
                </div>
                <a class="close" href="javascript:void(0)"></a>
                <div class="sent_message" style="display:none;color: white;padding-top: 60px;">
                    <p class="paragraph"><b>Ваше сообщение успешно отправлено!</b></p>
                    <p class="paragraph">Мы свяжемся с вами по номеру телефона, который был указан при отправке сообщения.</p>
                </div>
            </div>
        </form>
    </div>
    <div class="popup_3">
        <form id="support" class="feedback-form" name="form2">
            <div class="inputs">
                <div class="popup-inner">
                    <p class="question1">Оформить заявку:</p>
                    <p class="question3">Отправить сообщение напрямую в Службу Вы можете также, заполнив форму ниже. Мы обязательно Вам ответим.</p>
                    <input type="hidden" name="call" value="" />
                    
                    <input type="hidden" name="title" value="Техподдержка" />
                    <p style="margin:0; padding:0;"><input type="text" autocomplete="on" placeholder="ФИО" value="" name="contact_name"></p>
                    <p style="margin:0; padding:0;"> <input  type="text" autocomplete="on" placeholder="Организация" value="" name="organization"></p>
                    <p style="margin:0; padding:0;"> <input  type="text" autocomplete="on" placeholder="тел." value="" name="contact_phone"></p>
                    <p style="margin:0; padding:0;"> <input  type="text" autocomplete="on" placeholder="E-mail" value="" name="contact_email"></p>
                    <p style="margin:0; padding:0;"><textarea rows="10" cols="45" placeholder="Опишите Вашу проблему" name="detail"></textarea></p>
                    <p><input type="file"/></p>
                    <input id="call-submit" type="submit"  name="image_button" value="Отправить" alt="Отправьте заявку">
                </div>
                <a class="close" href="javascript:void(0)"></a>
                <div class="sent_message" style="display:none;color: white;padding-top: 60px;">
                    <p class="paragraph"><b>Ваше сообщение успешно отправлено!</b></p>
                    <p class="paragraph">Мы свяжемся с вами по номеру телефона, который был указан при отправке сообщения.</p>
                </div>
            </div>
        </form>
    </div>
    <header>
        <div class="in_header">
            <div class="top_block_h clearfix">
                <div class="logo">
                    <?
                    $APPLICATION->IncludeFile(
                            SITE_DIR . "include/logo.php", Array(), Array("MODE" => "html")
                    );
                    ?>
                </div>
                <?
                $APPLICATION->IncludeComponent("bitrix:search.form", "flat", Array(
                    "PAGE" => "#SITE_DIR#search/",
                        ), false
                );
                ?>
                <div class="top_phones">
                    <?
                    $APPLICATION->IncludeFile(
                            SITE_DIR . "include/phone_top.php", Array(), Array("MODE" => "html")
                    );
                    ?>
                </div>
                <div class="hellp">
                    <?
                    $APPLICATION->IncludeFile(
                            SITE_DIR . "include/hellp.php", Array(), Array("MODE" => "html")
                    );
                    ?>
                </div>
            </div>
        <? if ($isFrontPage): ?>
            <aside class="left-side">
                <div id="main-menu" style="-webkit-transform-style: preserve-3d;">
                    <div class="scroll-layout full" data-disable-scroll-bar="true">
                        <div class="inner" style="-webkit-transform: translate3d(0px, 0px, 0px);">
                            <nav>
                                <a class="p_company active" href="/company/">
                                    <span class="menu-el-content">
                                        <img src="<?= SITE_TEMPLATE_PATH ?>/images/comp.png">
                                            компания
                                    </span>
                                    <span class="menu-el-hover-content">
                                        <img src="<?= SITE_TEMPLATE_PATH ?>/images/comp.png">
                                            компания
                                    </span>
                                </a>
                                   <a class="p_services" href="/services/proektirovanie/">
                                    <span class="menu-el-content">
                                        <img src="<?= SITE_TEMPLATE_PATH ?>/images/servi.png">
                                            умный дом
                                    </span>
                                    <span class="menu-el-hover-content">
                                        <img src="<?= SITE_TEMPLATE_PATH ?>/images/servi.png">
                                            умный дом
                                    </span>
                                </a>
                                <a class="p_project" href="/projects/">
                                    <span class="menu-el-content">
                                        <img src="<?= SITE_TEMPLATE_PATH ?>/images/proj.png">
                                            наша работа
                                    </span>
                                    <span class="menu-el-hover-content">
                                        <img src="<?= SITE_TEMPLATE_PATH ?>/images/proj.png">
                                            наша работа
                                    </span>
                                </a>
                                <a class="p_equipment" href="/equipment/">
                                    <span class="menu-el-content">
                                        <img src="<?= SITE_TEMPLATE_PATH ?>/images/servi.png">
                                            оборудование
                                    </span>
                                    <span class="menu-el-hover-content">
                                        <img src="<?= SITE_TEMPLATE_PATH ?>/images/servi.png">
                                            оборудование
                                    </span>
                                </a>
                                <a class="p_solutions" href="/price/">
                                    <span class="menu-el-content">
                                        <img src="<?= SITE_TEMPLATE_PATH ?>/images/resh.png">
                                            цены
                                    </span>
                                    <span class="menu-el-hover-content">
                                        <img src="<?= SITE_TEMPLATE_PATH ?>/images/resh.png">
                                            цены
                                    </span>
                                </a>
                                <a class="p_contacts" href="/contacts/">
                                    <span class="menu-el-content">
                                        <img src="<?= SITE_TEMPLATE_PATH ?>/images/cont.png">
                                            контакты
                                    </span>
                                    <span class="menu-el-hover-content">
                                        <img src="<?= SITE_TEMPLATE_PATH ?>/images/cont.png">
                                            контакты
                                    </span>
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>
            </aside>
<?endif;?>
            <? /* $APPLICATION->IncludeComponent("bitrix:menu", "left_new", array(
              "ROOT_MENU_TYPE" => "left",
              "MENU_CACHE_TYPE" => "A",
              "MENU_CACHE_TIME" => "36000000",
              "MENU_CACHE_USE_GROUPS" => "Y",
              "MENU_CACHE_GET_VARS" => array(
              ),
              "MAX_LEVEL" => "1",
              "CHILD_MENU_TYPE" => "left",
              "USE_EXT" => "Y",
              "ALLOW_MULTI_SELECT" => "N"
              ),
              false,
              array(
              "ACTIVE_COMPONENT" => "Y"
              )
              ); */ ?>
        </div>
    </header>
    <div class="wrapper clearfix">
        <? if ($isFrontPage): ?>
            <div class="wrapp_to_slider">
                <div class="container">
                        <div id="da-slider" class="da-slider">
                            <?
                            CModule::IncludeModule("iblock");
                            //ресайзер картинок
                            function img2($id, $w, $h, $alt) {
                                $file = CFile::ResizeImageGet($id, array('width' => $w, 'height' => $h), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                                $img = '<img alt="' . $alt . '" src="' . $file['src'] . '" width="' . $file['width'] . '" height="' . $file['height'] . '" />';
                                echo $img;
                            }
                            $arSelect = Array("ID", "NAME", "CODE", "DETAIL_PICTURE", "PREVIEW_PICTURE", "PREVIEW_TEXT");
                            $arFilter = Array("IBLOCK_ID" => 13, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y");
                            $res = CIBlockElement::GetList(Array("SORT" => "ASC"), $arFilter, false, Array("nPageSize" => 10), $arSelect);
                            while ($ob = $res->GetNextElement()) {
                                $arFields = $ob->GetFields();
                                ?>
                                <div class="da-slide">
                                    <h2><?= $arFields["NAME"] ?></h2>
                                    <p><?= $arFields["PREVIEW_TEXT"] ?></p>
                                    <a href="<?= $arFields["CODE"] ?>" class="da-link">подробнее</a>
                                    <div class="da-img"><?= img2($arFields["PREVIEW_PICTURE"], 260, 260, $arFields["NAME"]); ?></div>
                                </div>
<? } ?>
                        </div>
                        <img  class="bottom_arrow" src="<?= SITE_TEMPLATE_PATH ?>/images/bg_slider_bottom.png">
                </div>

                <!--                <div class="bg_slide clearfix">
                                <div class="slider">
                                            <img  class="top_arrow" src="<?= SITE_TEMPLATE_PATH ?>/images/bg_slider_top.png">
                                                <div class="slides_container">
                                                    <div class="wrapp_slide" >
                                                      <a href=""><img src="<?= SITE_TEMPLATE_PATH ?>/images/slide-3.png" width="600" height="343" alt="Slide 1"></a>
                                                      <div class="caption">
                                                          <span>10-летний опыт работы наших<br/>профессионалов
                                                             <div rel="block" class="read"><a href="" style="opacity: 0;">подробнее</a></div>
                                                          </span>
                                                      </div>
                                                    </div>
                                                    <div class="wrapp_slide" >
                                                      <a href=""><img src="<?= SITE_TEMPLATE_PATH ?>/images/slide-3.png" width="600" height="343" alt="Slide 1"></a>
                                                      <div class="caption">
                                                          <span>Реализация комплексных<br/> IT-проектов в здравоохранении
                                                             <div rel="block" class="read"><a href="" style="opacity: 0;">подробнее</a></div>
                                                          </span>
                                                      </div>
                                                    </div>
                                                    <div class="wrapp_slide" >
                                                      <a href=""><img src="<?= SITE_TEMPLATE_PATH ?>/images/slide-3.png" width="600" height="343" alt="Slide 1"></a>
                                                      <div class="caption">
                                                          <span>10-летний опыт работы наших<br/>профессионалов
                                                             <div rel="block" class="read"><a href="" style="opacity: 0;">подробнее</a></div>
                                                          </span>
                                                      </div>
                                                    </div>
                                                     <div class="wrapp_slide" >
                                                      <a href=""><img src="<?= SITE_TEMPLATE_PATH ?>/images/slide-3.png" width="600" height="343" alt="Slide 1"></a>
                                                      <div class="caption">
                                                          <span>Реализация комплексных<br/> IT-проектов в здравоохранении
                                                             <div rel="block" class="read"><a href="" style="opacity: 0;">подробнее</a></div>
                                                          </span>
                                                      </div>
                                                    </div>
                                      </div>
                 </div>
                                </div>  -->
            </div> 
<? endif; ?>
<? if (!$isFrontPage): ?>
            <div class="container clearfix">
                <aside class="left-side">
                <div id="main-menu" style="-webkit-transform-style: preserve-3d;">
                    <div class="scroll-layout full" data-disable-scroll-bar="true">
                        <div class="inner" style="-webkit-transform: translate3d(0px, 0px, 0px);">
                            <nav>
                                <a class="p_company active" href="/company/">
                                    <span class="menu-el-content">
                                        <img src="<?= SITE_TEMPLATE_PATH ?>/images/comp.png">
                                            компания
                                    </span>
                                    <span class="menu-el-hover-content">
                                        <img src="<?= SITE_TEMPLATE_PATH ?>/images/comp.png">
                                            компания
                                    </span>
                                </a>
                                   <a class="p_services" href="/services/proektirovanie/">
                                    <span class="menu-el-content">
                                        <img src="<?= SITE_TEMPLATE_PATH ?>/images/servi.png">
                                            умный дом
                                    </span>
                                    <span class="menu-el-hover-content">
                                        <img src="<?= SITE_TEMPLATE_PATH ?>/images/servi.png">
                                            умный дом
                                    </span>
                                </a>
                                <a class="p_project" href="/projects/">
                                    <span class="menu-el-content">
                                        <img src="<?= SITE_TEMPLATE_PATH ?>/images/proj.png">
                                            наша работа
                                    </span>
                                    <span class="menu-el-hover-content">
                                        <img src="<?= SITE_TEMPLATE_PATH ?>/images/proj.png">
                                            наша работа
                                    </span>
                                </a>
                                <a class="p_equipment" href="/equipment/">
                                    <span class="menu-el-content">
                                        <img src="<?= SITE_TEMPLATE_PATH ?>/images/servi.png">
                                            оборудование
                                    </span>
                                    <span class="menu-el-hover-content">
                                        <img src="<?= SITE_TEMPLATE_PATH ?>/images/servi.png">
                                            оборудование
                                    </span>
                                </a>
                                <a class="p_solutions" href="/price/">
                                    <span class="menu-el-content">
                                        <img src="<?= SITE_TEMPLATE_PATH ?>/images/resh.png">
                                            цены
                                    </span>
                                    <span class="menu-el-hover-content">
                                        <img src="<?= SITE_TEMPLATE_PATH ?>/images/resh.png">
                                            цены
                                    </span>
                                </a>
                                <a class="p_contacts" href="/contacts/">
                                    <span class="menu-el-content">
                                        <img src="<?= SITE_TEMPLATE_PATH ?>/images/cont.png">
                                            контакты
                                    </span>
                                    <span class="menu-el-hover-content">
                                        <img src="<?= SITE_TEMPLATE_PATH ?>/images/cont.png">
                                            контакты
                                    </span>
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>
            </aside>
<? endif; ?>
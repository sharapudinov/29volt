<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $templateData */
/** @var @global CMain $APPLICATION */
global $APPLICATION;
$APPLICATION->AddHeadScript('/bitrix/templates/'.SITE_TEMPLATE_ID.'/js/fancybox/jquery.fancybox-1.3.1.pack.js');
$APPLICATION->SetAdditionalCSS('/bitrix/templates/'.SITE_TEMPLATE_ID.'/js/fancybox/jquery.fancybox-1.3.1.css');
if (isset($templateData['TEMPLATE_THEME']))
{
    $APPLICATION->SetAdditionalCSS($templateData['TEMPLATE_THEME']);
}
if (isset($templateData['JS_OBJ']))
{
    ?><script type="text/javascript">
    BX.ready(BX.defer(function(){
        if (!!window.<? echo $templateData['JS_OBJ']; ?>)
        {
            window.<? echo $templateData['JS_OBJ']; ?>.allowViewedCount(true);
        }
    }));
</script><?
}
?>
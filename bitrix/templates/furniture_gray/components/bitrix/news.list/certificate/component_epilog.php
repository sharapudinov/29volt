<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
__IncludeLang($_SERVER["DOCUMENT_ROOT"].$templateFolder."/lang/".LANGUAGE_ID."/template.php");

$APPLICATION->AddHeadScript('/bitrix/templates/'.SITE_TEMPLATE_ID.'/js/fancybox/jquery.fancybox-1.3.1.pack.js');
$APPLICATION->SetAdditionalCSS('/bitrix/templates/'.SITE_TEMPLATE_ID.'/js/fancybox/jquery.fancybox-1.3.1.css');
?>
<script type="text/javascript">
    $(document).ready(function() {
        $('.fancybox').fancybox({
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
<?php if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();

if (method_exists($this, 'setFrameMode')) {
	$this->setFrameMode(true);
}
?>
<!--noindex-->
<?if (!$arParams['ASD_ID'] && $arParams['SCRIPT_IN_HEAD']!='Y' && strlen($arResult['ASD_PICTURE_NOT_ENCODE'])){?><div style="display: none;"><img src="<?= $arResult['ASD_PICTURE_NOT_ENCODE']?>" alt="" /></div><?}?>
<div id="asd_share_buttons<?= $arParams['ASD_ID']>0 ? $arParams['ASD_ID'] : ''?>">
	<a class="asd_vk_share" href="#" title="<?= strlen($arParams["ASD_LINK_TITLE"]) ? str_replace("#SERVICE#", GetMessage("ASD_VK"), $arParams["ASD_LINK_TITLE"]) : GetMessage("ASD_VK_TITLE")?>" onclick="window.open('http://vk.com/share.php?url=<?=$arResult["ASD_URL"]?>&amp;title=<?= $arResult["ASD_TITLE"]?>&amp;image=<?= $arResult["ASD_PICTURE"]?>&amp;description=<?= $arResult["ASD_TEXT"]?>', '', 'scrollbars=yes,resizable=no,width=560,height=350,top='+Math.floor((screen.height - 350)/2-14)+',left='+Math.floor((screen.width - 560)/2-5)); return false;"></a>
	<a class="asd_fb_share" href="#" title="<?= strlen($arParams["ASD_LINK_TITLE"]) ? str_replace("#SERVICE#", GetMessage("ASD_FB"), $arParams["ASD_LINK_TITLE"]) : GetMessage("ASD_FB_TITLE")?>" onclick="window.open('http://www.facebook.com/sharer.php?u=<?=$arResult["ASD_URL"]?>', '', 'scrollbars=yes,resizable=no,width=560,height=350,top='+Math.floor((screen.height - 350)/2-14)+',left='+Math.floor((screen.width - 560)/2-5)); return false;"></a>
	<a class="asd_tw_share" href="#" title="<?= strlen($arParams["ASD_LINK_TITLE"]) ? str_replace("#SERVICE#", GetMessage("ASD_TW"), $arParams["ASD_LINK_TITLE"]) : GetMessage("ASD_TW_TITLE")?>" onclick="window.open('http://twitter.com/share?text=<?= $arResult["ASD_TITLE"]?>&amp;url=<?= $arResult["ASD_URL"]?>', '', 'scrollbars=yes,resizable=no,width=560,height=350,top='+Math.floor((screen.height - 350)/2-14)+',left='+Math.floor((screen.width - 560)/2-5)); return false;"></a>
	<a class="asd_gp_share" href="#" title="<?= strlen($arParams["ASD_LINK_TITLE"]) ? str_replace("#SERVICE#", GetMessage("ASD_GP"), $arParams["ASD_LINK_TITLE"]) : GetMessage("ASD_GP_TITLE")?>" onclick="window.open('https://plus.google.com/share?url=<?=$arResult["ASD_URL"]?>', '', 'scrollbars=yes,resizable=no,width=560,height=350,top='+Math.floor((screen.height - 350)/2-14)+',left='+Math.floor((screen.width - 560)/2-5)); return false;"></a>
</div>
<?if (in_array("VK_LIKE", $arParams["ASD_INCLUDE_SCRIPTS"]) ||
	in_array("TWITTER", $arParams["ASD_INCLUDE_SCRIPTS"]) ||
	in_array("FB_LIKE", $arParams["ASD_INCLUDE_SCRIPTS"]) ||
	in_array("GOOGLE", $arParams["ASD_INCLUDE_SCRIPTS"]) ||
	in_array("ASD_FAVORITE", $arParams["ASD_INCLUDE_SCRIPTS"])):?>
<table id="asd_social_likes<?= $arParams['ASD_ID']>0 ? $arParams['ASD_ID'] : ''?>">
	<tr>
		<?if (in_array("ASD_FAVORITE", $arParams["ASD_INCLUDE_SCRIPTS"])):?>
		<td>
			<?$APPLICATION->IncludeComponent(
				"bitrix:asd.favorite.button",
				"",
				Array(
					"FAV_TYPE" => $arParams["FAV_TYPE"],
					"BUTTON_TYPE" => $arParams["FAV_BUTTON_TYPE"],
					"ELEMENT_ID" => $arParams["ELEMENT_ID"],
					"GET_COUNT_AFTER_LOAD" => $arParams['SCRIPT_IN_HEAD']!="Y" ? "Y" : "N"
				), $component, array("HIDE_ICONS" => "Y")
			);?>
		</td>
		<?endif;?>
		<?if (in_array("FB_LIKE", $arParams["ASD_INCLUDE_SCRIPTS"])):?>
		<td style="padding-right: 5px;">
			<?if ($arParams["SCRIPT_IN_HEAD"] != "Y"){?><script type="text/javascript" src="http://connect.facebook.net/<?= LANGUAGE_ID=='ru' ? 'ru_RU' : 'en_US'?>/all.js#xfbml=1"></script><?}?>
			<div id="fb-root"></div>
			<fb:like href="<?= $arResult["ASD_URL_NOT_ENCODE"]?>" layout="button_count" action="<?= strtolower($arParams["LIKE_TYPE"])?>"></fb:like>
		</td>
		<?endif;?>
		<?if (in_array("GOOGLE", $arParams["ASD_INCLUDE_SCRIPTS"])):?>
		<td>
			<?if ($arParams["SCRIPT_IN_HEAD"] != "Y"){?><script type="text/javascript" src="http://apis.google.com/js/plusone.js">{"lang": "<?= LANGUAGE_ID=='ru' ? 'ru' : 'en-US'?>"}</script><?}?>
			<div style="width: 70px;"><g:plusone href="<?= CUtil::JSescape($arResult["ASD_URL_NOT_ENCODE"])?>" size="medium"></g:plusone></div>
		</td>
		<?endif;?>
		<?if (in_array("TWITTER", $arParams["ASD_INCLUDE_SCRIPTS"])):?>
		<td>
			<?if ($arParams['SCRIPT_IN_HEAD'] != "Y"){?><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script><?}?>
			<div style="width: 110px; overflow: hidden;"><a rel="nofollow" href="http://twitter.com/share" class="twitter-share-button" data-url="<?= $arResult["ASD_URL_NOT_ENCODE"]?>" data-count="horizontal" data-via="<?= $arParams['TW_DATA_VIA']?>" data-lang="<?= LANGUAGE_ID?>">Tweet</a></div>
		</td>
		<?endif;?>
		<?if (in_array("VK_LIKE", $arParams["ASD_INCLUDE_SCRIPTS"])):?>
		<td>
			<?if ($arParams['SCRIPT_IN_HEAD'] != "Y"){?><script type="text/javascript" src="http://userapi.com/js/api/openapi.js?17"></script><?}?>
			<div id="vk_like"></div>
			<script type="text/javascript">
				function asd_share_vkbutton() {
					if(typeof(VK) != 'undefined') {
						VK.init({apiId: <?= $arParams["VK_API_ID"] ?>, onlyWidgets: true});
						VK.Widgets.Like('vk_like', {
								type: '<?= $arParams["VK_LIKE_VIEW"] ?>',
								width: 200,
								verb: <?= $arParams["LIKE_TYPE"] == "RECOMMEND" ? '1' : '0' ?>,
								pageUrl: '<?= CUtil::JSescape($arResult["ASD_URL_NOT_ENCODE"]) ?>'
						});
					}
				}
				if (window.addEventListener) {
					window.addEventListener("load", asd_share_vkbutton, false);
				}
				else if (window.attachEvent) {
					window.attachEvent("onload", asd_share_vkbutton);
				}
			</script>
		</td>
		<?endif;?>
	</tr>
</table>
<?endif;?>
<!--/noindex-->
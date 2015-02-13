<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Достижения");
?><?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"menu_company",
	Array(
		"ROOT_MENU_TYPE" => "top_projects",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(),
		"MAX_LEVEL" => "1",
		"CHILD_MENU_TYPE" => "",
		"USE_EXT" => "N",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N"
	)
);?> 
<div class="content"> 
  <div class="left_sitb">
    <br />
  </div>
 
  <div class="right_sitb"> 
    <div class="block_photo"> <img src="<?= SITE_TEMPLATE_PATH ?>/images/photo_1.1.png"  /> <img src="<?= SITE_TEMPLATE_PATH ?>/images/photo_1.2.png"  /> </div>
   </div>
 </div>
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
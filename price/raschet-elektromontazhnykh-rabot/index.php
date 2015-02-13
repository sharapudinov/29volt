<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords", "Расчет электромонтажных работ, стоимость электромонтажных работ.");
$APPLICATION->SetPageProperty("description", "Расчет стоимости электромонтажных работ. Формирование бюджета по электромонтажным работам.");
$APPLICATION->SetPageProperty("title", "Стоимость электромонтажных работ от компании 29 Вольт");
$APPLICATION->SetTitle("Расчет электромонтажных работ");
?><?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"menu_bottom",
	Array(
		"ROOT_MENU_TYPE" => "top_price",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => "",
		"MAX_LEVEL" => "1",
		"CHILD_MENU_TYPE" => "",
		"USE_EXT" => "N",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N"
	)
);?> <?$APPLICATION->IncludeFile(
    SITE_DIR."include/calculator_text_top_5.php",
    Array(),
    Array("MODE"=>"html")
);
?>
<?$APPLICATION->IncludeComponent(
    "developer:calc.electro",
    "", Array()
);?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
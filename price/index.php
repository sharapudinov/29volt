<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Рассчитать базовую цену системы умный дом. Формирование бюджета умного дома.");
$APPLICATION->SetPageProperty("keywords", "Цены, система Умный дом, расчет стоимости.");
$APPLICATION->SetPageProperty("title", "Цены на систему Умный дом под ключ | 29 Вольт");
$APPLICATION->SetTitle("Цена");
$APPLICATION->IncludeComponent("bitrix:menu", "menu_bottom", Array(
        "ROOT_MENU_TYPE" => "top_price", // Тип меню для первого уровня
        "MENU_CACHE_TYPE" => "A", // Тип кеширования
        "MENU_CACHE_TIME" => "3600", // Время кеширования (сек.)
        "MENU_CACHE_USE_GROUPS" => "Y", // Учитывать права доступа
        "MENU_CACHE_GET_VARS" => "", // Значимые переменные запроса
        "MAX_LEVEL" => "1", // Уровень вложенности меню
        "CHILD_MENU_TYPE" => "", // Тип меню для остальных уровней
        "USE_EXT" => "N", // Подключать файлы с именами вида .тип_меню.menu_ext.php
        "DELAY" => "N", // Откладывать выполнение шаблона меню
        "ALLOW_MULTI_SELECT" => "N", // Разрешить несколько активных пунктов одновременно
    ),
    false
);
$APPLICATION->AddChainItem("Расчет базовой цены умного дома", "");
?>
<?$APPLICATION->IncludeFile(
    SITE_DIR."include/calculator_text_top_2.php",
    Array(),
    Array("MODE"=>"html")
);
?>
<?$APPLICATION->IncludeComponent(
    "developer:calc.price",
    "", Array()
);?>

 <? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords", "Расчет монтажа видеонаблюдение, стоимость видеонаблюдения.");
$APPLICATION->SetPageProperty("description", "Стоимость работ по установке и пусконаладке системы видеонаблюдения.");
$APPLICATION->SetPageProperty("title", "Стоимость видеонаблюдения");
$APPLICATION->SetTitle("Расчет монтажа Видеонаблюдение");
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
?> <?$APPLICATION->IncludeFile(
    SITE_DIR . "include/calculator_text_top_4.php",
    Array(),
    Array("MODE" => "html")
);
?>
<noindex>
    <?$APPLICATION->IncludeComponent(
        "developer:calc.montazh",
        "", Array()
    );?>
</noindex>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
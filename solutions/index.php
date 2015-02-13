<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Решения");
?>

<?$APPLICATION->IncludeComponent("bitrix:menu", "menu_company", array(
	"ROOT_MENU_TYPE" => "top_solutions",
	"MENU_CACHE_TYPE" => "A",
	"MENU_CACHE_TIME" => "3600",
	"MENU_CACHE_USE_GROUPS" => "Y",
	"MENU_CACHE_GET_VARS" => array(
	),
	"MAX_LEVEL" => "1",
	"CHILD_MENU_TYPE" => "",
	"USE_EXT" => "N",
	"DELAY" => "N",
	"ALLOW_MULTI_SELECT" => "N"
	),
	false
);?>
<?$APPLICATION->IncludeComponent("bitrix:catalog", "solutions", Array(
	"IBLOCK_TYPE" => "solutions",	// Тип инфоблока
	"IBLOCK_ID" => "10",	// Инфоблок
	"SECTION_ID_VARIABLE" => "SECTION_ID",	// Название переменной, в которой передается код группы
	"SEF_MODE" => "Y",	// Включить поддержку ЧПУ
	"SEF_FOLDER" => "/solutions/",	// Каталог ЧПУ (относительно корня сайта)
	"AJAX_MODE" => "N",	// Включить режим AJAX
	"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
	"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
	"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
	"CACHE_TYPE" => "A",	// Тип кеширования
	"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
	"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
	"CACHE_GROUPS" => "Y",	// Учитывать права доступа
	"SET_STATUS_404" => "N",	// Устанавливать статус 404, если не найдены элемент или раздел
	"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
	"ADD_SECTIONS_CHAIN" => "Y",
	"ADD_ELEMENT_CHAIN" => "N",	// Включать название элемента в цепочку навигации
	"USE_ELEMENT_COUNTER" => "Y",	// Использовать счетчик просмотров
	"SECTION_SHOW_PARENT_NAME" => "N",	// Показывать заголовок раздела
	"USE_FILTER" => "N",	// Показывать фильтр
	"USE_REVIEW" => "N",	// Разрешить отзывы
	"USE_COMPARE" => "N",	// Использовать компонент сравнения
	"PRICE_CODE" => "",	// Тип цены
	"USE_PRICE_COUNT" => "N",	// Использовать вывод цен с диапазонами
	"SHOW_PRICE_COUNT" => "1",	// Выводить цены для количества
	"PRICE_VAT_INCLUDE" => "Y",	// Включать НДС в цену
	"PRICE_VAT_SHOW_VALUE" => "N",	// Отображать значение НДС
	"BASKET_URL" => "/personal/basket.php",	// URL, ведущий на страницу с корзиной покупателя
	"ACTION_VARIABLE" => "action",	// Название переменной, в которой передается действие
	"PRODUCT_ID_VARIABLE" => "id",	// Название переменной, в которой передается код товара для покупки
	"USE_PRODUCT_QUANTITY" => "N",	// Разрешить указание количества товара
	"ADD_PROPERTIES_TO_BASKET" => "Y",	// Добавлять в корзину свойства товаров и предложений
	"PRODUCT_PROPS_VARIABLE" => "prop",	// Название переменной, в которой передаются характеристики товара
	"PARTIAL_PRODUCT_PROPERTIES" => "N",	// Разрешить добавлять в корзину товары, у которых заполнены не все характеристики
	"PRODUCT_PROPERTIES" => "",	// Характеристики товара, добавляемые в корзину
	"SHOW_TOP_ELEMENTS" => "N",	// Выводить топ элементов
	"SECTION_COUNT_ELEMENTS" => "Y",	// Показывать количество элементов в разделе
	"SECTION_TOP_DEPTH" => "2",	// Максимальная отображаемая глубина разделов
	"PAGE_ELEMENT_COUNT" => "30",	// Количество элементов на странице
	"LINE_ELEMENT_COUNT" => "3",	// Количество элементов, выводимых в одной строке таблицы
	"ELEMENT_SORT_FIELD" => "",	// По какому полю сортируем товары в разделе
	"ELEMENT_SORT_ORDER" => "",	// Порядок сортировки товаров в разделе
	"ELEMENT_SORT_FIELD2" => "",	// Поле для второй сортировки товаров в разделе
	"ELEMENT_SORT_ORDER2" => "",	// Порядок второй сортировки товаров в разделе
	"LIST_PROPERTY_CODE" => array(	// Свойства
		0 => "",
		1 => "",
	),
	"INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
	"LIST_META_KEYWORDS" => "-",	// Установить ключевые слова страницы из свойства раздела
	"LIST_META_DESCRIPTION" => "-",	// Установить описание страницы из свойства раздела
	"LIST_BROWSER_TITLE" => "-",	// Установить заголовок окна браузера из свойства раздела
	"DETAIL_PROPERTY_CODE" => array(	// Свойства
		0 => "CUSTOMER",
		1 => "",
	),
	"DETAIL_META_KEYWORDS" => "-",	// Установить ключевые слова страницы из свойства
	"DETAIL_META_DESCRIPTION" => "-",	// Установить описание страницы из свойства
	"DETAIL_BROWSER_TITLE" => "-",	// Установить заголовок окна браузера из свойства
	"DETAIL_SHOW_PICTURE" => "Y",	// Показывать изображение
	"LINK_IBLOCK_TYPE" => "",	// Тип инфоблока, элементы которого связаны с текущим элементом
	"LINK_IBLOCK_ID" => "",	// ID инфоблока, элементы которого связаны с текущим элементом
	"LINK_PROPERTY_SID" => "",	// Свойство, в котором хранится связь
	"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",	// URL на страницу, где будет показан список связанных элементов
	"USE_STORE" => "N",	// Показывать блок "Количество товара на складе"
	"PAGER_TEMPLATE" => "",	// Шаблон постраничной навигации
	"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
	"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
	"PAGER_TITLE" => "Наши решения",	// Название категорий
	"PAGER_SHOW_ALWAYS" => "Y",	// Выводить всегда
	"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
	"PAGER_SHOW_ALL" => "Y",	// Показывать ссылку "Все"
	"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
	"PRODUCT_QUANTITY_VARIABLE" => "quantity",	// Название переменной, в которой передается количество товара
	"SEF_URL_TEMPLATES" => array(
		"sections" => "",
		"section" => "#SECTION_CODE#/",
		"element" => "#SECTION_CODE#/#ELEMENT_CODE#/",
		"compare" => "compare.php?action=#ACTION_CODE#",
	),
	"VARIABLE_ALIASES" => array(
		"compare" => array(
			"ACTION_CODE" => "action",
		),
	)
	),
	false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
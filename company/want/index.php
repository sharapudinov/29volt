<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Лицензии и сертификаты");
?>
<?
$APPLICATION->IncludeComponent("bitrix:menu", "menu_company", array(
    "ROOT_MENU_TYPE" => "top_company",
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
        ), false
);
?>    
<div class="content">
        <?$APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "",
                Array(
                        "AREA_FILE_SHOW" => "file",
                        "PATH" => SITE_DIR."include/company_want.php",
                        "AREA_FILE_RECURSIVE" => "N",
                        "EDIT_MODE" => "html",
                ),
                false
        );?>
 
    <div style="clear: both"></div>
    <?$APPLICATION->IncludeComponent("bitrix:news.list", "certificate", Array(
	"DISPLAY_DATE" => "N",	// Выводить дату элемента
		"DISPLAY_NAME" => "N",	// Выводить название элемента
		"DISPLAY_PICTURE" => "N",	// Выводить изображение для анонса
		"DISPLAY_PREVIEW_TEXT" => "N",	// Выводить текст анонса
		"AJAX_MODE" => "N",	// Включить режим AJAX
		"IBLOCK_TYPE" => "company",	// Тип информационного блока (используется только для проверки)
		"IBLOCK_ID" => "20",	// Код информационного блока
		"NEWS_COUNT" => "20",	// Количество новостей на странице
		"SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
		"SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
		"SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
		"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
		"FILTER_NAME" => "",	// Фильтр
		"FIELD_CODE" => "",	// Поля
		"PROPERTY_CODE" => array(	// Свойства
			0 => "MORE_PHOTO",
		),
		"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
		"DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
		"PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
		"ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
		"SET_TITLE" => "N",	// Устанавливать заголовок страницы
		"SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
		"SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
		"SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
		"SET_STATUS_404" => "N",	// Устанавливать статус 404, если не найдены элемент или раздел
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
		"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
		"PARENT_SECTION" => "",	// ID раздела
		"PARENT_SECTION_CODE" => "",	// Код раздела
		"INCLUDE_SUBSECTIONS" => "N",	// Показывать элементы подразделов раздела
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
		"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
		"CACHE_GROUPS" => "Y",	// Учитывать права доступа
		"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
		"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
		"DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под списком
		"PAGER_TITLE" => "Сертификаты",	// Название категорий
		"PAGER_SHOW_ALWAYS" => "Y",	// Выводить всегда
		"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
		"PAGER_SHOW_ALL" => "Y",	// Показывать ссылку "Все"
		"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
		"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
	),
	false
);?>
<!--    <div class="right_sitb">-->
<!--        <div class="wrapp_form">-->
<!--            <form id="company_feedback" class="feedback-form" name="form3">-->
<!--                <div class="inputs">-->
<!--                    <div class="popup-inner">-->
<!--                        <p class="question1">Отправить заявку:</p>-->
<!--                        <input type="hidden" name="hidden" value="" />-->
<!--                        <input type="hidden" name="title" value="Хочу в команду" />-->
<!--                        <p style="margin:0; padding:0;"><input type="text" autocomplete="on" placeholder="ФИО" value="" name="contact_name"></p>-->
<!--                        <p style="margin:0; padding:0;"> <input  type="text" autocomplete="on" placeholder="тел." value=""  name="contact_phone"></p>-->
<!--                        <p style="margin:0; padding:0;"> <input  type="text" autocomplete="on" placeholder="E-mail" value=""  name="contact_email"></p>-->
<!--                        <p style="margin:0; padding:0;"><textarea rows="10" cols="45" placeholder="Коментарий" name="detail"></textarea></p>-->
<!--                        <button id="call-submit" class="submit big-btn">Отправить</button>-->
<!--                        <div class="sent_message" style="display:none;color: black;">-->
<!--                            <b>Ваше сообщение успешно отправлено!</b><br/>-->
<!--                            Мы свяжемся с вами по номеру телефона, который был указан при отправке сообщения.-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                </div>-->
<!--            </form>-->
<!--        </div>-->
<!--        <div class="bott_bk_4"></div>-->
<!--    </div>-->
</div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Опросный лист для системы Умный дом");
$APPLICATION->SetTitle("Опросный лист");
?>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">

    <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>

<?$APPLICATION->IncludeComponent(
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
);?>

    <div class="price clearfix">
<?$APPLICATION->IncludeFile(
    SITE_DIR."include/calculator_text_top_3.php",
    Array(),
    Array("MODE"=>"html")
);
?>

            <ul class="tabs_form">
        <li><a href="javascript:void(0)" id="full_form">Полная форма</a></li>

        <li><a href="javascript:void(0)" id="short_form">Краткая форма</a></li>
    </ul>
    <div class="clear"></div>

    <div>
    <script>

        function requiredCheck(selector) {
            var error = false;
            $(selector).css('position', 'relative');
            $(selector + ' .required').removeClass('r_error');
            $(selector + ' .required').each(function (i, el) {
                if ($(el).hasClass('r_phone')) {
                    var myRe = /^((8|\+3|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,11}$/i;
                    if (!myRe.exec($(el).val())) {
                        error = true;
                        $(el).addClass('r_error');
                        $(el).val('').attr('placeholder', 'Неверный формат номера');
                    }
                }
                else if ($(el).hasClass('r_email')) {
                    if ($(el).val().length) {
                        var myRe = /[0-9a-z_]+@[0-9a-z_]+\.[a-z]{2,5}/i;
                        if (!myRe.exec($(el).val())) {
                            error = true;
                            $(el).addClass('r_error');
                            $(el).val('').attr('placeholder', 'E-mail указан неправильно');

                        }
                    }
                    else {
                        error = true;
                        $(el).addClass('r_error');
                        $(el).val('').attr('placeholder', 'поле E-mail не должно быть пустым');
                    }
                }
                else {
                    if (!$(el).val().length) {
                        error = true;
                        $(el).addClass('r_error');
                        $(el).val('').attr('placeholder', 'Поле не должно быть пустым');
                    }
                }

                $(".r_error").focusin(function () {
                    $(el).attr("placeholder", $(el).attr("data-val"));
                    $(this).removeClass("r_error");
                });
            });
            return error;
        }


        $(document).ready(function () {

            $("#datepicker").datepicker();

            $("#full_form").click(function () {
                $(".full_form").slideDown(300);
                $(".short_form").slideUp(300);
            });


            $("#short_form").click(function () {
                $(".short_form").slideDown(300);
                $(".full_form").slideUp(300);
            })


            $("#full_form_values").on("submit", function (event) {
                event.preventDefault();

                var res = requiredCheck("#full_form_values");
                if (!res) {

                    var formData = new FormData($('#full_form_values')[0]);
                    $.ajax({
                        url: '/ajax/price_full_form.php', //Server script to process data
                        type: 'POST',
                        xhr: function () {  // Custom XMLHttpRequest
                            var myXhr = $.ajaxSettings.xhr();
                            if (myXhr.upload) { // Check if upload property exists
                                myXhr.upload.addEventListener('progress', progressHandlingFunction, false); // For handling the progress of the upload
                            }
                            return myXhr;
                        },
                        // Form data
                        data: formData,
                        //Options to tell jQuery not to process data or worry about content-type.
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            $(".result_full").html(data);
                        }
                    });
                }
            });


            $("#form2").on("submit", function (event) {
                event.preventDefault();

                var res = requiredCheck("#form2");
                if (!res) {

                    var formData = new FormData($('#form2')[0]);
                    $.ajax({
                        url: '/ajax/price_full_form.php', //Server script to process data
                        type: 'POST',
                        xhr: function () {  // Custom XMLHttpRequest
                            var myXhr = $.ajaxSettings.xhr();
                            if (myXhr.upload) { // Check if upload property exists
                                myXhr.upload.addEventListener('progress', progressHandlingFunction, false); // For handling the progress of the upload
                            }
                            return myXhr;
                        },
                        // Form data
                        data: formData,
                        //Options to tell jQuery not to process data or worry about content-type.
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            $(".result_short").html(data);
                        }
                    });
                }
            });


        })
    </script>



    <div class="full_form">
    <form name="form1" id="full_form_values" class="validate" method="post" enctype="multipart/form-data"
          action="/">
    <table  id="orderTable">
    <colgroup width="48%" span="2"></colgroup>
    <tbody>
    <tr>
        <td colspan="2" class="td_header">Информация о заказчике</td>
    </tr>

    <tr>
        <td> Фамилия</td>
        <td><input type="text" name="surname" class="text"/></td>
    </tr>

    <tr>
        <td> Имя&nbsp;<span style="color: rgb(255, 0, 0);">*</span></td>
        <td><input type="text" class="text required" name="username" id="username" value=""
                /></td>
    </tr>

    <tr>
        <td> Отчество</td>
        <td><input type="text" name="second_name" class="text"/></td>
    </tr>

    <tr>
        <td> Организация</td>
        <td><input type="text" name="company" class="text"/></td>
    </tr>

    <tr>
        <td colspan="2">&nbsp;
            <br/>
        </td>
    </tr>

    <tr>
        <td>Контактный телефон с указанием города&nbsp;<span style="color: rgb(255, 0, 0);">*</span></td>
        <td><input type="text" class="r_phone required" name="phone" value=""
                /></td>
    </tr>

    <tr>
        <td> Адрес электронной почты&nbsp;<span style="color: rgb(255, 0, 0);">*</span></td>
        <td><input type="text" class="r_email required" name="email" id="email" value=""
                /></td>
    </tr>

    <tr>
        <td colspan="2">&nbsp;
            <br/>
        </td>
    </tr>

    <tr>
        <td> Предпочтительная дата встречи</td>
        <td><input type="text" id="datepicker" name="date"/></td>
    </tr>

    <tr>
        <td colspan="2" class="td_header">Информация об объекте</td>
    </tr>

    <tr>
        <td> Тип объекта</td>
        <td><select name="object_type">
                <option>Коттедж</option>
                <option>Квартира</option>
                <option>Офисное здание</option>
                <option>Промышленный объект</option>
                <option>Торговое помещение</option>
            </select></td>
    </tr>

    <tr>
        <td> Местоположение (город, район)</td>
        <td><input type="text" class="text" name="location"/></td>
    </tr>

    <tr>
        <td> Общая площадь</td>
        <td><input type="text" class="text" name="space"/></td>
    </tr>

    <tr>
        <td> Количество этажей</td>
        <td><input type="text" class="text" name="floors"/></td>
    </tr>

    <tr>
        <td> Планы помещений (архитектурный проект/дизайн проект)</td>
        <td>
            <? echo CFile::InputFile("PROJECT", 20, $PROJECT); ?> </td>
    </tr>

    <tr>
        <td> Техническое задание</td>
        <td> <? echo CFile::InputFile("TASK", 20, $TASK); ?> </td>
    </tr>

    <tr>
        <td colspan="2" class="td_subheader">УМНЫЙ ДОМ</td>
    </tr>

    <tr>
        <td> Предпочтительный <a target="_blank" href="">класс оборудования</a></td>
        <td><select class="valid" name="po_class">
                <option>Бюджетное решение</option>
                <option>Оптимальное решение</option>
                <option>Эксклюзивное решение</option>
            </select></td>
    </tr>

    <tr>
        <td colspan="2" class="td_subheader">Освещение и электрика</td>
    </tr>

    <tr>
        <td> Количество релейных групп освещения (только включение/выключение)</td>
        <td><input type="text" name="rele_quantity"/></td>
    </tr>

    <tr>
        <td> Количество диммируемых групп света</td>
        <td><input type="text" name="dim_quantity"/></td>
    </tr>

    <tr>
        <td> Количество управляемых розеточных групп</td>
        <td><input type="text" name="roz_quantity"/></td>
    </tr>

    <tr>
        <td colspan="2" class="td_subheader">Управление освещением</td>
    </tr>

    <tr>
        <td> Количество клавишных выключателей</td>
        <td><input type="text" name="clav_quantity"/></td>
    </tr>

    <tr>
        <td> Количество настенных сенсорных экранов</td>
        <td><input type="text" name="wall_quantity"/></td>
    </tr>

    <tr>
        <td> Количество датчиков движения</td>
        <td><input type="text" name="dat_quantity"/></td>
    </tr>

    <tr>
        <td> Управление с iPad, iPhone, а также Android-устройств</td>
        <td><input type="checkbox" name="ipad_quantity"/></td>
    </tr>

    <tr>
        <td colspan="2" class="td_subheader">Управление электроприводами</td>
    </tr>

    <tr>
        <td> Шторы (открытие, закрытие, остановка)</td>
        <td><input type="text" name="shtoru_quantity"/></td>
    </tr>

    <tr>
        <td> Рольставни (открытие, закрытие, остановка)</td>
        <td><input type="text" name="rol_quantity"/></td>
    </tr>

    <tr>
        <td> Экран проектора</td>
        <td><input type="text" name="screen"/></td>
    </tr>

    <tr>
        <td> Ворота</td>
        <td><input type="text" name="gates"/></td>
    </tr>

    <tr>
        <td colspan="2" class="td_header">Безопасность</td>
    </tr>

    <tr>
        <td colspan="2" class="td_subheader">Видеонаблюдение</td>
    </tr>

    <tr>
        <td> Количество видеокамер внутренней установки</td>
        <td><input type="text" name="videocamera"/></td>
    </tr>

    <tr>
        <td> Количество видеокамер уличной установки</td>
        <td><input type="text" name="street_cam"/></td>
    </tr>

    <tr>
        <td> Отображение камер на мобильные и переносные устройства (iPhone, iPad, Android)</td>
        <td><input type="text" name="ipad_cam"/></td>
    </tr>

    <tr>
        <td colspan="2" class="td_subheader">Охранно-пожарная сигнализация</td>
    </tr>

    <tr>
        <td colspan="2">Датчики охранной сигнализации:</td>
    </tr>

    <tr>
        <td> Количество датчиков движения</td>
        <td><input type="text" name="mov_quantity"/></td>
    </tr>

    <tr>
        <td> Количество датчиков открытия дверей</td>
        <td><input type="text" name="open_quantity"/></td>
    </tr>

    <tr>
        <td><strong>SMS-информирование</strong></td>
        <td><input type="checkbox" name="sms_quantity"/></td>
    </tr>

    <tr>
        <td colspan="2">&nbsp;
            <br/>
        </td>
    </tr>

    <tr>
        <td colspan="2">Датчики пожарной сигнализации:</td>
    </tr>

    <tr>
        <td> Количество пожарных дымовых датчиков</td>
        <td><input type="text" name="flame_quantity"/></td>
    </tr>

    <tr>
        <td> Количество пожарных тепловых датчиков (в помещениях с повышенной задымленностью: гараж, кухня,
            постирочная)
        </td>
        <td><input type="text" name="warm_quantity"/></td>
    </tr>

    <tr>
        <td> Количество датчиков открытия дверей</td>
        <td><input type="text" name="door_quantity"/></td>
    </tr>

    <tr>
        <td colspan="2" class="td_subheader">Домофон</td>
    </tr>

    <tr>
        <td> Количество вызывных панелей</td>
        <td><input type="text" name="panels_quantity"/></td>
    </tr>

    <tr>
        <td> Количество ответных панелей</td>
        <td><input type="text" name="answer_quantity"/></td>
    </tr>

    <tr>
        <td> Вывод домофона на ТВ и телефон</td>
        <td><input type="checkbox" name="tv_quantity"/></td>
    </tr>

    <tr>
        <td colspan="2" class="td_subheader">Пассивная безопасность (протечки воды)</td>
    </tr>

    <tr>
        <td> Количество зон протечек воды</td>
        <td><input type="text" name="water_zone"/></td>
    </tr>

    <tr>
        <td colspan="2" class="td_header">Мультимедиа</td>
    </tr>

    <tr>
        <td colspan="2" class="td_subheader">Видеомультирум</td>
    </tr>

    <tr>
        <td> Количество телевизоров для вывода видеоконтента с централизованного хранилища (сервер, ТВ
            приставки)
        </td>
        <td><input type="text" name="tv_quantity_media"/></td>
    </tr>

    <tr>
        <td colspan="2" class="td_subheader">Аудиомультирум</td>
    </tr>

    <tr>
        <td> Количество помещений для прослушки аудиоконтента (радио, плейлист, источники)</td>
        <td><input type="text" name="rooms_quantity"/></td>
    </tr>

    <tr>
        <td colspan="2" class="td_header">Домашний кинотеатр</td>
    </tr>

    <tr>
        <td> Предполагаемый класс оборудования</td>
        <td><select name="suggested_class">
                <option>Hi-Fi</option>
                <option>Hi-End</option>
            </select></td>
    </tr>

    <tr>
        <td> Вывод видео-сигнала</td>
        <td><select name="video_output">
                <option>ТВ</option>
                <option>Проектор</option>
            </select></td>
    </tr>

    <tr>
        <td colspan="2" class="td_header">Интернет</td>
    </tr>

    <tr>
        <td> Количество розеток интернета</td>
        <td><input type="text" name="roz_internet"/></td>
    </tr>

    <tr>
        <td> Покрытие сетью Wi-Fi</td>
        <td><input type="checkbox" name="wifi_lan"/></td>
    </tr>

    <tr>
        <td colspan="2" class="td_header">Кондиционирование</td>
    </tr>

    <tr>
        <td> Выбор системы кондиционирования</td>
        <td><select name="conditioning">
                <option>Сплит система настенных блоков</option>
                <option>Сплит система канальных блоков</option>
                <option>Мультисистема настенных блоков</option>
                <option>Мультисистема канальных блоков</option>
            </select></td>
    </tr>

    <tr>
        <td> Количество помещений для кондиционирования</td>
        <td><input type="text" name="rooms_cond"/></td>
    </tr>

    <tr>
        <td> Количество помещений для приточно-вытяжной вентиляции</td>
        <td><input type="text" name="rooms_vent"/></td>
    </tr>

    <tr>
        <td colspan="2" class="td_header">Климат-контроль</td>
    </tr>

    <tr>
        <td> Управление кондиционированием</td>
        <td><input type="checkbox" name="cond_control"/></td>
    </tr>

    <tr>
        <td> Управление отоплением</td>
        <td><input type="checkbox" name="heat_control"/></td>
    </tr>

    <tr>
        <td> Управление теплыми полами</td>
        <td><input type="checkbox" name="floor_control"/></td>
    </tr>

    <tr>
        <td colspan="2" class="td_header">Телефонная сеть</td>
    </tr>

    <tr>
        <td> Тип систем телефонной сети</td>
        <td><select name="phone_network">
                <option>Аналоговые трубки</option>
                <option>Микросотовая сеть АТС</option>
            </select></td>
    </tr>

    <tr>
        <td> Количество телефонных трубок</td>
        <td><input type="text" name="phone_tube"/></td>
    </tr>

    <tr>
        <td colspan="2" class="td_header">Система центрального пылеудаления</td>
    </tr>

    <tr>
        <td> Количество пневморозеток</td>
        <td><input type="text" name="pnevmo"/></td>
    </tr>

    <tr>
        <td> Количество пневмосовков</td>
        <td><input type="text" name="pnevmosovok"/></td>
    </tr>

    <tr>
        <td colspan="2" class="td_header">Эфирное и спутниковое телевидение</td>
    </tr>

    <tr>
        <td> Подготовить <strong>базовое</strong> коммерческое предложение</td>
        <td><input type="checkbox" name="commercial_tv"/></td>
    </tr>

    <tr>
        <td colspan="2" class="td_header">Усиление сотового сигнала</td>
    </tr>

    <tr>
        <td> Подготовить <strong>базовое</strong> коммерческое предложение</td>
        <td><input type="checkbox" name="commercial_signal"/></td>
    </tr>

    <tr>
        <td colspan="2" style="text-align: right;">
            <input type="submit" class="send_full_form"/></td>
    </tr>
    </tbody>
    </table>
    <div class="result_full"></div>
    </form>
    </div>

    <div style="display: none;" class="short_form">
        <form name="form2" id="form2" class="validate" method="post" enctype="multipart/form-data" action="/"
              style="display: block;">
            <table width="100%" id="miniOrderTable">
                <colgroup width="48%" span="2"></colgroup>
                <tbody>
                <tr>
                    <td colspan="2" class="td_header">Информация о заказчике</td>
                </tr>

                <tr>
                    <td> Контактное лицо &nbsp;<span style="color: rgb(255, 0, 0);">*</span></td>
                    <td><input type="text" class="text required" name="username" value=""
                            /></td>
                </tr>

                <tr>
                    <td>Телефон &nbsp;<span style="color: rgb(255, 0, 0);">*</span></td>
                    <td><input type="text" class="r_phone required" name="phone" id="miniphone" value=""
                            /></td>
                </tr>

                <tr>
                    <td> E-Mail &nbsp;<span style="color: rgb(255, 0, 0);">*</span></td>
                    <td><input type="text" class="r_email required" name="email" value=""
                            /></td>
                </tr>

                <tr>
                    <td colspan="2" class="td_header">Информация об объекте</td>
                </tr>

                <tr>
                    <td> Тип объекта</td>
                    <td><select name="object_type">
                            <option>Коттедж</option>
                            <option>Квартира</option>
                            <option>Офисное здание</option>
                            <option>Промышленный объект</option>
                            <option>Торговое помещение</option>
                        </select></td>
                </tr>

                <tr>
                    <td colspan="2" class="td_header">Дополнительная информация</td>
                </tr>

                <tr>
                    <td> Дополнительная информация</td>
                    <td><textarea name="dopinfo" ></textarea></td>
                </tr>

                <tr>
                    <td colspan="2" style="text-align: right;">
                        <input type="submit" name="Submit" value=" Отправить "/></td>
                </tr>
                </tbody>
            </table>
            <div class="result_short"></div>
        </form>
    </div>
    </div>
    </div>

    <style>
        .td_header {
            background: #ccc
        }

        .td_subheader {
            background: #dddddd
        }

        #orderTable td,#miniOrderTable td {
            border: 1px solid gray;
            padding: 5px

        }

        #orderTable,#miniOrderTable {
            border-spacing: 0;
            border-collapse: collapse;
        }

        .full_form input[type="text"], .short_form input[type="text"], .full_form select, .short_form select,.full_form textarea, .short_form textarea {
            width: 400px;
            height: 30px;
            line-height: 30px;
            padding: 0 10px;
        }
        .full_form textarea, .short_form textarea
        {
            height:100px;
        }
        form input[type="submit"],.tabs_form li a {
            background: linear-gradient(to bottom, #d00, red) repeat scroll 0 0 rgba(0, 0, 0, 0);
            border: 0 none;
            border-radius: 5px;
            color: #fff;
            display: block;
            float: right;
            font-size: 15px;
            margin: 10px 0 5px;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
        }

        form input[type="submit"]:hover,.tabs_form li a:hover {
            background: linear-gradient(to bottom, red, #d00) repeat scroll 0 0 rgba(0, 0, 0, 0);
            text-decoration: underline;
            cursor:pointer
        }
        .tabs_form li{
            float:left;
            display:block;
            padding:5px 10px;
        }
        .clear
        {
            display: block;
            width:100%;
            height:0px;
            clear:both
        }
        .result_full,.result_short
        {
            margin-top:10px;
        }
        .r_error
        {
            border:1px solid red
        }
    </style>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
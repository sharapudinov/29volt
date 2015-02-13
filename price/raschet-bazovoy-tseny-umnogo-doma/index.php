<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Расчет базовой цены умного дома");
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
CModule::IncludeModule('iblock');
$arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", 'PROPERTY_budget_solution', 'PROPERTY_optimal_solution', 'PROPERTY_exclusive_solution');
$arFilter = Array("IBLOCK_ID"=>IntVal(15), "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
?>
    <script>
    $(document).ready(function () {

        $("input.metr, input.metr2, input.metr3, input.metr4, input.metr5").bind('focusin', function () {
            if ($(this).val() == 0) {
                $(this).val('');
            }
        });

        $("input.metr, input.metr2, input.metr3, input.metr4, input.metr5").bind('focusout', function () {
            if ($(this).val() == '') {
                $(this).val(0);
            }
        });
        <img id="bxid_268275" src="/bitrix/images/fileman/htmledit2/php.gif" border="0"  />

            <img id="bxid_41312" src="/bitrix/images/fileman/htmledit2/php.gif" border="0"  />
            $("input.metr").bind('change', function () {
                /*запоминаем введенный метраж*/
                var metr = parseFloat($(this).val());
                console.log(metr);
                var sum = 0;

                if (metr == 0) {
                    sum = 0;
                }
                else if (metr < 100) {
                    sum = <img id="bxid_850972" src="/bitrix/images/fileman/htmledit2/php.gif" border="0"  /> / 1000;
                }

                else if (metr >= 100 && metr <= 300) {
                    sum = metr * 150 / 1000;
                }

                else if (metr > 300 && metr <= 700) {
                    sum = metr * 125 / 1000;
                }

                else if (metr > 700 && metr <= 1500) {
                    sum = metr * 100 / 1000;
                }

                else if (metr > 1500 && metr <= 2500) {
                    sum = metr * 85 / 1000;
                }

                else if (metr > 2500) {
                    sum = metr * 70 / 1000;
                }

//    console.log(sum);
                $(this).parent().parent().find("td.standart").text(sum.toFixed(3).replace(".", " ") + 'р');
                $(this).parent().parent().find("td.prestige").text(sum.toFixed(3).replace(".", " ") + 'р');
                $(this).parent().parent().find("td.premium").text(sum.toFixed(3).replace(".", " ") + 'р');

                var itogo = 0;

                $("td.standart").each(function () {

                    itogo += parseFloat($(this).text());

                });
                $("td#itogo_stan").text(itogo.toFixed(3).replace(".", " ") + 'р');
                itogo = 0;
                $("td.prestige").each(function () {

                    itogo += parseFloat($(this).text());

                });
                $("td#itogo_pres").text(itogo.toFixed(3).replace(".", " ") + 'р');
                itogo = 0;
                $("td.premium").each(function () {

                    itogo += parseFloat($(this).text());

                });
                $("td#itogo_prem").text(itogo.toFixed(3).replace(".", " ") + 'р');
                itogo = 0;
            });
        <img id="bxid_738940" src="/bitrix/images/fileman/htmledit2/php.gif" border="0"  />
            $("input.metr2").bind('change', function () {
                /*запоминаем введенный метраж*/
                var metr = parseFloat($(this).val());
                var sum = 0;

                if (metr == 0) {
                    sum = 0;
                }
                else if (metr < 100) {
                    sum = <img id="bxid_839979" src="/bitrix/images/fileman/htmledit2/php.gif" border="0"  /> / 1000;
                }

                else if (metr >= 100 && metr <= 300) {
                    sum = metr * 160 / 1000;
                }

                else if (metr > 300 && metr <= 700) {
                    sum = metr * 140 / 1000;
                }

                else if (metr > 700 && metr <= 1500) {
                    sum = metr * 120 / 1000;
                }

                else if (metr > 1500 && metr <= 2500) {
                    sum = metr * 100 / 1000;
                }

                else if (metr > 2500) {
                    sum = metr * 80 / 1000;
                }


                $(this).parent().parent().find("td.standart").text(sum.toFixed(3).replace(".", " ") + 'р');
                $(this).parent().parent().find("td.prestige").text(sum.toFixed(3).replace(".", " ") + 'р');
                $(this).parent().parent().find("td.premium").text(sum.toFixed(3).replace(".", " ") + 'р');

                var itogo = 0;

                $("td.standart").each(function () {

                    itogo += parseFloat($(this).text());

                });
                $("td#itogo_stan").text(itogo.toFixed(3).replace(".", " ") + 'р');
                itogo = 0;
                $("td.prestige").each(function () {

                    itogo += parseFloat($(this).text());

                });
                $("td#itogo_pres").text(itogo.toFixed(3).replace(".", " ") + 'р')
                itogo = 0;
                $("td.premium").each(function () {

                    itogo += parseFloat($(this).text());

                });
                $("td#itogo_prem").text(itogo.toFixed(3).replace(".", " ") + 'р')
                itogo = 0;
            });

        <img id="bxid_901472" src="/bitrix/images/fileman/htmledit2/php.gif" border="0"  />

            $("input.metr3").bind('change', function () {
                /*запоминаем введенный метраж*/
                var metr = parseFloat($(this).val());

                $(this).parent().parent().find("td.standart").text((metr * <img id="bxid_589766" src="/bitrix/images/fileman/htmledit2/php.gif" border="0"  /> / 1000).toFixed(3).replace(".", " ") + 'р');
                $(this).parent().parent().find("td.prestige").text((metr * <img id="bxid_793251" src="/bitrix/images/fileman/htmledit2/php.gif" border="0"  /> / 1000).toFixed(3).replace(".", " ") + 'р');
                $(this).parent().parent().find("td.premium").text((metr * <img id="bxid_101242" src="/bitrix/images/fileman/htmledit2/php.gif" border="0"  /> / 1000).toFixed(3).replace(".", " ") + 'р');

                var itogo = 0;

                $("td.standart").each(function () {

                    itogo += parseFloat($(this).text());

                });
                $("td#itogo_stan").text(itogo.toFixed(3).replace(".", " ") + 'р');
                itogo = 0;
                $("td.prestige").each(function () {

                    itogo += parseFloat($(this).text());

                });
                $("td#itogo_pres").text(itogo.toFixed(3).replace(".", " ") + 'р');
                itogo = 0;
                $("td.premium").each(function () {

                    itogo += parseFloat($(this).text());

                });
                $("td#itogo_prem").text(itogo.toFixed(3).replace(".", " ") + 'р');
                itogo = 0;
            });
        <img id="bxid_938626" src="/bitrix/images/fileman/htmledit2/php.gif" border="0"  />

            $("input.metr4").bind('change', function () {
                /*запоминаем введенный метраж*/
                var metr = parseFloat($(this).val());

                $(this).parent().parent().find("td.standart").text((metr * <img id="bxid_319861" src="/bitrix/images/fileman/htmledit2/php.gif" border="0"  /> / 1000).toFixed(3).replace(".", " ") + 'р');
                $(this).parent().parent().find("td.prestige").text((metr * <img id="bxid_967301" src="/bitrix/images/fileman/htmledit2/php.gif" border="0"  /> / 1000).toFixed(3).replace(".", " ") + 'р');
                $(this).parent().parent().find("td.premium").text((metr * <img id="bxid_569669" src="/bitrix/images/fileman/htmledit2/php.gif" border="0"  /> / 1000).toFixed(3).replace(".", " ") + 'р');

                var itogo = 0;

                $("td.standart").each(function () {

                    itogo += parseFloat($(this).text());

                });
                $("td#itogo_stan").text(itogo.toFixed(3).replace(".", " ") + 'р');
                itogo = 0;
                $("td.prestige").each(function () {

                    itogo += parseFloat($(this).text());

                });
                $("td#itogo_pres").text(itogo.toFixed(3).replace(".", " ") + 'р');
                itogo = 0;
                $("td.premium").each(function () {

                    itogo += parseFloat($(this).text());

                });
                $("td#itogo_prem").text(itogo.toFixed(3).replace(".", " ") + 'р');
                itogo = 0;
            });
        <img id="bxid_600590" src="/bitrix/images/fileman/htmledit2/php.gif" border="0"  />

            $("input.metr5").bind('change', function () {
                /*запоминаем введенный метраж*/
                var metr = parseFloat($(this).val());

                $(this).parent().parent().find("td.standart").text((metr * <img id="bxid_665678" src="/bitrix/images/fileman/htmledit2/php.gif" border="0"  /> / 1000).toFixed(3).replace(".", " ") + 'р');
                $(this).parent().parent().find("td.prestige").text((metr * <img id="bxid_858020" src="/bitrix/images/fileman/htmledit2/php.gif" border="0"  /> / 1000).toFixed(3).replace(".", " ") + 'р');
                $(this).parent().parent().find("td.premium").text((metr * <img id="bxid_729658" src="/bitrix/images/fileman/htmledit2/php.gif" border="0"  /> / 1000).toFixed(3).replace(".", " ") + 'р');


                var itogo = 0;

                $("td.standart").each(function () {

                    itogo += parseFloat($(this).text());

                });
                $("td#itogo_stan").text(itogo.toFixed(3).replace(".", " ") + 'р');
                itogo = 0;
                $("td.prestige").each(function () {

                    itogo += parseFloat($(this).text());

                });
                $("td#itogo_pres").text(itogo.toFixed(3).replace(".", " ") + 'р');
                itogo = 0;
                $("td.premium").each(function () {

                    itogo += parseFloat($(this).text());

                });
                $("td#itogo_prem").text(itogo.toFixed(3).replace(".", " ") + 'р');
                itogo = 0;

            });

        <img id="bxid_38217" src="/bitrix/images/fileman/htmledit2/php.gif" border="0"  />

    });

    </script>

    <div class="">
        <!-- Разделитель -->

        <!-- Разделитель -->

        <!-- Разделитель -->

        <!-- Разделитель -->

        <!-- Разделитель -->

        <!-- Разделитель -->

        <!-- Разделитель -->

        <!-- Разделитель -->

        <table width="100%" height="auto" class="calc" id="smart">
            <tbody>
            <tr> <td class="highlight" colspan="6"> Автоматический расчет базовой стоимости &quot;умного дома&quot; </td> </tr>

            <tr> <td></td> <td></td> <td></td> <td style="font-style: italic; text-align: center;"> БЮДЖЕТНОЕ РЕШЕНИЕ </td> <td style="font-style: italic; text-align: center;"> ОПТИМАЛЬНОЕ РЕШЕНИЕ </td> <td style="font-style: italic; text-align: center;"> ЭКСКЛЮЗИВНОЕ РЕШЕНИЕ </td> </tr>

            <tr> <td class="td_header"></td> <td class="td_header"> Наименование проектных работ </td> <td class="td_header"> Метраж </td> <td class="td_header"> Цена </td> <td class="td_header"> Цена </td> <td class="td_header"> Цена </td> </tr>

            <tr> <td style="text-align: center;"> 1 </td> <td style="text-align: left;"> Проектирования систем &quot;Умный дом&quot; </td> <td style="text-align: right; color: rgb(255, 255, 255); background: rgb(204, 204, 204);"> <input type="text" value="0" class="metr" name="metr" /> </td> <td class="standart" style="text-align: center;"> 0 </td> <td class="prestige" style="text-align: center;"> 0 </td> <td class="premium" style="text-align: center;"> 0 </td> </tr>

            <tr> <td style="text-align: center;"> 2 </td> <td style="text-align: left;"> Проектирование систем &quot;электроснабжения&quot; </td> <td style="text-align: right; color: rgb(255, 255, 255); font-weight: bold; background: rgb(204, 204, 204);"> <input type="text" value="0" class="metr2" name="metr2" /> </td> <td class="standart" style="text-align: center;"> 0 </td> <td class="prestige" style="text-align: center;"> 0 </td> <td class="premium" style="text-align: center;"> 0 </td> </tr>

            <tr> <td style="text-align: center;"> 3 </td> <td style="text-align: left;"> Оборудование </td> <td style="text-align: right; color: rgb(255, 255, 255); font-weight: bold; background: rgb(204, 204, 204);"> <input type="text" value="0" class="metr3" name="metr3" /> </td> <td class="standart" style="text-align: center;"> 0 </td> <td class="prestige" style="text-align: center;"> 0 </td> <td class="premium" style="text-align: center;"> 0 </td> </tr>

            <tr> <td style="text-align: center;"> 4 </td> <td style="text-align: left;"> Шефмотаж </td> <td style="text-align: right; color: rgb(255, 255, 255); font-weight: bold; background: rgb(204, 204, 204);"> <input type="text" value="0" class="metr4" name="metr4" /> </td> <td class="standart" style="text-align: center;"> 0 </td> <td class="prestige" style="text-align: center;"> 0 </td> <td class="premium" style="text-align: center;"> 0 </td> </tr>

            <tr> <td style="text-align: center;"> 5 </td> <td style="text-align: left;"> Пусконаладка </td> <td style="text-align: right; color: rgb(255, 255, 255); font-weight: bold; background: rgb(204, 204, 204);"> <input type="text" value="0" class="metr5" name="metr5" /> </td> <td class="standart" style="text-align: center;"> 0 </td> <td class="prestige" style="text-align: center;"> 0 </td> <td class="premium" style="text-align: center;"> 0 </td> </tr>

            <tr> <td style="text-align: center; border-right-style: none; background: rgb(204, 204, 204);" colspan="2"></td> <td style="text-align: right; font-weight: bold; border-left-style: none; background: rgb(204, 204, 204);"> Итого </td> <td id="itogo_stan" style="text-align: right; font-weight: bold; background: rgb(204, 204, 204);"></td> <td id="itogo_pres" style="text-align: center; font-weight: bold; background: rgb(204, 204, 204);"></td> <td id="itogo_prem" style="text-align: center; font-weight: bold; background: rgb(204, 204, 204);"></td> </tr>
            </tbody>
        </table>
    </div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
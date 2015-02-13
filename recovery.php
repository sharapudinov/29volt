<?php
/**
 * Created by PhpStorm.
 * User: Шамиль
 * Date: 12.02.2015
 * Time: 11:41
 */


require($_SERVER['DOCUMENT_ROOT']."/bitrix/header.php");
echo $USER->Update(1,array("PASSWORD"=>'Bitrix*123456'));
echo $USER->LAST_ERROR;
require($_SERVER['DOCUMENT_ROOT']."/bitrix/footer.php");

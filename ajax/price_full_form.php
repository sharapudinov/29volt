<?require_once ($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include.php");
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' && CModule::IncludeModule("iblock")) {
    
    $arr_file=Array(
    "name" => $_FILES['PROJECT']['name'],
    "size" => $_FILES['PROJECT']['size'],
    "tmp_name" => $_FILES['PROJECT']['tmp_name'],
    "type" => "",
    "old_file" => "",
    "del" => "Y",
    "MODULE_ID" => "iblock");
    $fid = CFile::SaveFile($arr_file, "file");
    $arFile = CFile::GetPath($fid);

    $arr_file1=Array(
        "name" => $_FILES['TASK']['name'],
        "size" => $_FILES['TASK']['size'],
        "tmp_name" => $_FILES['TASK']['tmp_name'],
        "type" => "",
        "old_file" => "",
        "del" => "Y",
        "MODULE_ID" => "iblock");
    $fid1 = CFile::SaveFile($arr_file1, "file");
    $arFile1 = CFile::GetPath($fid1);


	$el = new CIBlockElement;
	$name =  $_REQUEST ["username"]." ".$_REQUEST ["surname"]." ".$_REQUEST ["second_name"];
	$PROP = array();

	$PROP[46] = $_REQUEST ["surname"];
    $PROP[47] = $_REQUEST ["username"];
    $PROP[48] = $_REQUEST ["second_name"];
    $PROP[49] = $_REQUEST ["company"];
    $PROP[50] = $_REQUEST ["phone"];
    $PROP[51] = $_REQUEST ["email"];

    $PROP[52] = $_REQUEST ["date"];
    $PROP[53] = $_REQUEST ["object_type"];
    $PROP[54] = $_REQUEST ["location"];
    $PROP[55] = $_REQUEST ["space"];
    $PROP[56] = $_REQUEST ["floors"];

    $PROP[59] = $_REQUEST ["po_class"];
    $PROP[60] = $_REQUEST ["rele_quantity"];
    $PROP[61] = $_REQUEST ["dim_quantity"];
    $PROP[62] = $_REQUEST ["roz_quantity"];
    $PROP[63] = $_REQUEST ["clav_quantity"];
    $PROP[64] = $_REQUEST ["wall_quantity"];
    $PROP[65] = $_REQUEST ["dat_quantity"];

    if ($_REQUEST ["ipad_quantity"] == "on")
    {
        $PROP[66] = "да";
    }
    else{
        $PROP[66] = "нет";
    }
    $PROP[67] = $_REQUEST ["shtoru_quantity"];
    $PROP[108] = $_REQUEST ["rol_quantity"];
    $PROP[68] = $_REQUEST ["screen"];
    $PROP[69] = $_REQUEST ["gates"];
    $PROP[70] = $_REQUEST ["videocamera"];
    $PROP[71] = $_REQUEST ["street_cam"];
    $PROP[72] = $_REQUEST ["ipad_cam"];
    $PROP[74] = $_REQUEST ["mov_quantity"];
    $PROP[75] = $_REQUEST ["open_quantity"];

    if ($_REQUEST ["sms_quantity"] == "on")
    {
        $PROP[76] = "да";
    }
    else{
        $PROP[76] = "нет";
    }
    $PROP[77] = $_REQUEST ["flame_quantity"];
    $PROP[78] = $_REQUEST ["warm_quantity"];
    $PROP[79] = $_REQUEST ["door_quantity"];
    $PROP[80] = $_REQUEST ["panels_quantity"];
    $PROP[81] = $_REQUEST ["answer_quantity"];

    if ($_REQUEST ["tv_quantity"] == "on")
    {
        $PROP[82] = "да";
    }
    else{
       $PROP[82] = "нет";
    }
    $PROP[83] = $_REQUEST ["water_zone"];
    $PROP[84] = $_REQUEST ["tv_quantity_media"];
    $PROP[85] = $_REQUEST ["rooms_quantity"];
    $PROP[86] = $_REQUEST ["suggested_class"];
    $PROP[87] = $_REQUEST ["video_output"];
    $PROP[88] = $_REQUEST ["roz_internet"];

    if ($_REQUEST ["wifi_lan"] == "on")
    {
        $PROP[89] = "да";
    }
    else{
        $PROP[89] = "нет";
    }
    $PROP[90] = $_REQUEST ["conditioning"];
    $PROP[91] = $_REQUEST ["rooms_cond"];
    $PROP[92] = $_REQUEST ["rooms_vent"];


    if ($_REQUEST ["cond_control"] == "on")
    {
        $PROP[93] = "да";
    }
    else{
        $PROP[93] = "нет";
    }
    if ($_REQUEST ["heat_control"] == "on")
    {
        $PROP[94] = "да";
    }
    else{
        $PROP[94] = "нет";
    }
    if ($_REQUEST ["floor_control"] == "on")
    {
        $PROP[95] = "да";
    }
    else{
        $PROP[95] = "нет";
    }

    $PROP[96] = $_REQUEST ["phone_network"];
    $PROP[97] = $_REQUEST ["phone_tube"];
    $PROP[98] = $_REQUEST ["pnevmo"];
    $PROP[99] = $_REQUEST ["pnevmosovok"];

    if ($_REQUEST ["commercial_tv"] == "on")
    {
        $PROP[100] = "да";
    }
    else{
        $PROP[100] = "нет";
    }
    if ($_REQUEST ["commercial_signal"] == "on")
    {
        $PROP[101] = "да";
    }
    else{
        $PROP[101] = "нет";
    }
    $PROP[109] = array("VALUE"=>array("TEXT"=> $_REQUEST ["dopinfo"], "TYPE"=>"html"));

	$arLoadProductArray = Array(
	  "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
	  "IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
	  "IBLOCK_ID"      => 14,
	  "PROPERTY_VALUES"=> $PROP,
	  "NAME"           => $name,
	  "ACTIVE"         => "Y"            // активен
	  );

    if($PRODUCT_ID = $el->Add($arLoadProductArray))
    {
            CIBlockElement::SetPropertyValueCode($PRODUCT_ID, 57, CFile::MakeFileArray($arFile));
            CIBlockElement::SetPropertyValueCode($PRODUCT_ID, 58, CFile::MakeFileArray($arFile1));

        echo ("Спасибо за вашу заявку. Сообщение было успешно отправлено!");
//        $arSend = array(
//          "AUTHOR" =>  $_REQUEST["contact_name"],
//          "AUTHOR_EMAIL" => htmlspecialchars($_REQUEST["contact_email"]),
//          "TITLE" => $_REQUEST["title"],
//          "PHONE" =>  $_REQUEST["contact_phone"],
//          "TIME" =>  $_REQUEST["contact_time"],
//          "TEXT"   =>  $_REQUEST["detail"],
//     );
//     CEvent::Send('FEEDBACK_FORM',SITE_ID,$arSend);

    }
    else {echo "Error: ".$el->LAST_ERROR;}
}
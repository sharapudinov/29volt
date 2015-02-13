<?require_once ($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include.php");
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' && CModule::IncludeModule("iblock")) {
    
    $arr_file=Array(
    "name" => $_FILES['IMAGE_ID']['name'],
    "size" => $_FILES['IMAGE_ID']['size'],
    "tmp_name" => $_FILES['IMAGE_ID']['tmp_name'],
    "type" => "",
    "old_file" => "",
    "del" => "Y",
    "MODULE_ID" => "iblock");
    $fid = CFile::SaveFile($arr_file, "file");
    $arFile = CFile::GetPath($fid);
    
    $file_extension = explode(".",$_FILES['IMAGE_ID']['name']);
    
	$el = new CIBlockElement;
	$name =  htmlspecialchars(trim($_REQUEST ["title"]));
    $contactName = htmlspecialchars(trim($_REQUEST ["contact_name"]));
    $contactPhone = htmlspecialchars(trim($_REQUEST ["contact_phone"]));
    $contactEmail = htmlspecialchars(trim($_REQUEST ["contact_email"]));
    $detail = htmlspecialchars(trim($_REQUEST ["detail"]));
    $contactTime = htmlspecialchars(trim($_REQUEST ["contact_time"]));
    $url = htmlspecialchars(trim($_REQUEST ["url"]));
	$PROP = array();
	$PROP["NAME"]   = $contactName;
	$PROP["PHONE"]  = $contactPhone;
	$PROP["EMAIL"]  = $contactEmail;
	$PROP["COMENT"] = $detail;
	$PROP["TIME"]   = $contactTime;
	$PROP["URL"]    = $url;
	$arLoadProductArray = Array(
	  "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
	  "IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
	  "IBLOCK_ID"      => 12,
	  "PROPERTY_VALUES"=> $PROP,
	  "NAME"           => $name,
	  "ACTIVE"         => "Y"            // активен
	  );
    if($PRODUCT_ID = $el->Add($arLoadProductArray))
    {
            $arFile = CFile::MakeFileArray($arFile);
            CIBlockElement::SetPropertyValueCode($PRODUCT_ID, "USER_FILE", $arFile);
        $arSend = array(
          "AUTHOR" =>  $contactName,
          "AUTHOR_EMAIL" => $contactEmail,
          "TITLE" => $name,
          "PHONE" =>  $contactPhone,
          "TIME" =>  $contactTime,
          "URL"   =>  $url,
          "TEXT"   =>  $detail,
     );
     CEvent::Send('FEEDBACK_FORM',SITE_ID,$arSend);
     echo '1';
    }
    else {echo "Error: ".$el->LAST_ERROR;}
}
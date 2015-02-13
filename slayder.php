<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Слайдер");
CModule::IncludeModule("iblock");
?>
        <div class="container1">
			<div id="da-slider" class="da-slider">
            <?

            //ресайзер картинок
              function img2($id, $w, $h, $alt) {
              $file = CFile::ResizeImageGet($id, array('width' => $w, 'height' => $h), BX_RESIZE_IMAGE_PROPORTIONAL, true);
              $img = '<img alt="' . $alt . '" src="' . $file['src'] . '" width="' . $file['width'] . '" height="' . $file['height'] . '" />';
              echo $img;
              }
            $arSelect = Array("ID", "NAME", "CODE", "DETAIL_PICTURE", "PREVIEW_PICTURE", "PREVIEW_TEXT");
            $arFilter = Array("IBLOCK_ID" => 13, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y");
            $res = CIBlockElement::GetList(Array("SORT" => "ASC"), $arFilter, false, Array("nPageSize" => 10), $arSelect);
            while ($ob = $res->GetNextElement()) {
                $arFields = $ob->GetFields();?>
				<div class="da-slide">
					<h2><?=$arFields["NAME"]?></h2>
					<p><?=$arFields["PREVIEW_TEXT"]?></p>
					<a href="#" class="da-link">Прочитать всё</a>
					<div class="da-img"><?=img2($arFields["PREVIEW_PICTURE"], 260, 260, $arFields["NAME"]);?></div>
				</div>
            <?}?>
				
				<nav class="da-arrows">
					<span class="da-arrows-prev"></span>
					<span class="da-arrows-next"></span>
				</nav>
			</div>
        </div>




		<script type="text/javascript">
			$(function() {
			
				$('#da-slider').cslider({
					autoplay	: true,
					bgincrement	: 450
				});
			
			});
		</script>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
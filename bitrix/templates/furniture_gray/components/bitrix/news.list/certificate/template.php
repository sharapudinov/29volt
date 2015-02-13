<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<ul class="photos_block">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<li>
		<?foreach($arItem["PROPERTIES"]['MORE_PHOTO']['VALUE'] as $arProperty):
            $file_original = CFile::ResizeImageGet($arProperty, array('width'=>'', 'height'=>''), BX_RESIZE_IMAGE_PROPORTIONAL, true);
            $file = CFile::ResizeImageGet($arProperty, array('width'=>190, 'height'=>250), BX_RESIZE_IMAGE_EXACT, true);
            $img = '<img src="'.$file['src'].'" width="'.$file['width'].'" height="'.$file['height'].'" />';?>
            <a class="fancybox" rel="gallery" href="<?=$file_original['src']?>">
                <img src="<?=$file['src']?>" alt="" />
            </a>
		<?endforeach;?>
	</li>
<?endforeach;?>
</ul>

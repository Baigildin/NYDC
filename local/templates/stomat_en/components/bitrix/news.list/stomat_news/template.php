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

<?foreach($arResult["ITEMS"] as $arItem):?>
<?
$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
?>
<a class="item" href="<?=$arItem['DETAIL_PAGE_URL']?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
	<div class="image" style="background-image: url(<?=$arItem['PREVIEW_PICTURE']['SRC']?>);"></div>
	<div class="title">
		<p><?=$arItem['NAME']?></p>
		<svg xmlns="http://www.w3.org/2000/svg" width="22" height="18" viewBox="0 0 22 18" fill="none">
			<path d="M21 9L1 9" stroke="#202020" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
			<path d="M21 9L13 17" stroke="#202020" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
			<path d="M21 9L13 1" stroke="#202020" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
		</svg>
	</div>
</a>
<?endforeach;?>
<?//echo"<pre>";print_r($_REQUEST);echo"</pre>";?>
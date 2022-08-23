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
<div class="item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
	<div class="collapsible"><?=$arItem['NAME']?>
	<div class="arrow">
		<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
			<path d="M11 1V21" stroke="#202020" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
			<path d="M1 11H21" stroke="#202020" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
		</svg>
		<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
			<path d="M16.0713 1.92896L1.92916 16.0711" stroke="#202020" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
			<path d="M1.92871 1.92896L16.0708 16.0711" stroke="#202020" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
		</svg>
	</div>
</div>
<div class="content" style="display: none;">
	<ul>
		<?=$arItem['~DETAIL_TEXT']?>
	</ul>
</div>
</div>
<?endforeach;?>

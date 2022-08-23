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
    <div class="mainscreen" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/img/mainimg.png);">
      <div class="container">
        <div class="row">
          <div class="col-lg-11 col-md-12">
            <div class="main-slider owl-carousel owl-theme">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                <p class="title"><?echo $arItem['~PREVIEW_TEXT']?></p>
                <div class="tags">
                  <div class="tag">
                    <p>Surgery <span>without pain</span></p>
                  </div>
                  <div class="tag">
                    <p>Each clinic specialist <span>has a foreign diploma</span></p>
                  </div>
                </div>
                <button class="btn" data-toggle="modal" data-target=".modal-callback" type="button">Make an appointment</button>
              </div>
<?endforeach;?>
            </div>
          </div>
        </div>
      </div>
    </div>

<?//echo "<pre>";print_r($arResult);echo"</pre>";?>

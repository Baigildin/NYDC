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
<h2>Примеры наших работ</h2>
<div class="row">
	<div class="col-lg-11 col-md-12">
		<div class="examples-slider owl-carousel owl-theme">
			<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<div class="item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<div class="sliderBA" data-auto-animation="false" data-dividing-line="2px solid #FFFFFF">
					<div class="images">
						<div class="image-rgt" data-src="<?=$arItem['DISPLAY_PROPERTIES']['AFTER']['FILE_VALUE']['SRC']?>"></div>
						<div class="image-lft" data-src="<?=$arItem['DISPLAY_PROPERTIES']['BEFORE']['FILE_VALUE']['SRC']?>"></div>
					</div>
					<div class="ui">
						<div class="dragger">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
								<path d="M23.0399 12.5C23.0399 18.5479 18.0815 23.4622 11.9508 23.4622C5.82012 23.4622 0.86178 18.5479 0.86178 12.5C0.86178 6.45211 5.82012 1.53781 11.9508 1.53781C18.0815 1.53781 23.0399 6.45211 23.0399 12.5Z" stroke="white" stroke-width="1.2426"></path>
								<path fill-rule="evenodd" clip-rule="evenodd" d="M19.3445 12.5044C19.3433 12.663 19.2818 12.8213 19.1601 12.9417L16.2913 15.7794C16.0474 16.0207 15.654 16.0186 15.4127 15.7746C15.1714 15.5307 15.1735 15.1373 15.4175 14.896L17.8397 12.5L15.4175 10.104C15.1735 9.8627 15.1714 9.46932 15.4127 9.22536C15.654 8.98141 16.0474 8.97927 16.2913 9.22058L19.1601 12.0583C19.2391 12.1364 19.2928 12.2305 19.321 12.3303C19.3371 12.3871 19.3449 12.4458 19.3445 12.5044ZM6.27028 12.5L8.69252 14.896C8.93647 15.1373 8.93861 15.5307 8.6973 15.7746C8.456 16.0186 8.06262 16.0207 7.81866 15.7794L4.94988 12.9417C4.76225 12.7561 4.71766 12.4806 4.81687 12.2522C4.84751 12.1817 4.89186 12.1157 4.94989 12.0583L7.81866 9.22058C8.06261 8.97927 8.456 8.98141 8.6973 9.22536C8.93861 9.46932 8.93647 9.8627 8.69252 10.104L6.27028 12.5Z" fill="white"></path>
							</svg>
						</div>
					</div>
				</div>
				<div class="discription">
					<p class="title"><?=$arItem['NAME']?></p>
					<p><?=$arItem['PREVIEW_TEXT']?></p>
				</div>
			</div>
			<?endforeach;?>
		</div>
		<button class="btn" data-toggle="modal" data-target=".modal-callback" type="button">Записаться на приём</button>
	</div>
</div>
<?//echo"<pre>";print_r($arResult);echo"</pre>";?>
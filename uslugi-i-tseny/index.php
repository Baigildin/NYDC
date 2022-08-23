<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Услуги");
?>
    <div class="inner-banner" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/img/servicesbg.png);">
      <div class="container">
        <h1><?$APPLICATION->ShowTitle();?></h1>
      </div>
    </div>
    <div class="all-services">
      <div class="container">
        <div class="row">
          <div class="col-lg-10">
            <div class="list-wrap">
             <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"services_dropdown", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "N",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "3",
		"IBLOCK_TYPE" => "products",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "services_dropdown"
	),
	false
);?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="map-services">
      <div class="container">
        <h2>Карта услуг</h2>
        <div class="row">
          <div class="col-lg-10 col-md-12">
 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"services_map", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "N",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "/uslugi-i-tseny/#ELEMENT_CODE#/",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "3",
		"IBLOCK_TYPE" => "products",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "services_map"
	),
	false
);?>
          </div>
        </div>
      </div>
    </div>
    <div class="form">
      <div class="container">
        <h2>Заявка на обратный звонок</h2>
        <div class="row">
          <div class="col-lg-11 col-md-12">
            <form>
              <div class="group">
                <label>Ваше имя</label>
                <input type="text" class="required" name="name">
              </div>
              <div class="group">
                <label>Телефон</label>
                <input type="text" class="required" name="phone" placeholder="+7 ">
              </div>
              <input type="submit" value="Записаться на приём">
            </form>
            <p>Ввод номера телефона подтверждает ваше согласие c <a href='/politika-konfidentsialnosti.php'>условиями передачи информации</a></p>
          </div>
        </div>
      </div>
    </div>
    <div class="contacts" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/img/contactsbg.png);">
      <div class="container">
        <h2>Контакты</h2>
        <div class="row">
          <div class="col-lg-10 col-md-12">
            <div class="contacts-items">
            <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                          "AREA_FILE_RECURSIVE" => "Y",
                          "AREA_FILE_SHOW" => "file",
                          "AREA_FILE_SUFFIX" => "inc",
                          "EDIT_TEMPLATE" => "",
                          "PATH" => "/include/uslugi-i-tseny/contacts.php"
                        )
                      );?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-success-feedback modal fade" tabindex="-1" role="dialog" data-keyboard="false" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
			<button class="close-popup" type="button" data-dismiss="modal" aria-hidden="true">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
              <path d="M18.25 1.75195L1.75085 18.2511" stroke="#202020" stroke-width="2" stroke-linecap="square" stroke-linejoin="bevel"></path>
              <path d="M1.75 1.75L18.2492 18.2492" stroke="#202020" stroke-width="2" stroke-linecap="square" stroke-linejoin="bevel"></path>
            </svg>
          </button>
          <div class="modal-body">
            <div class="info">
              <svg xmlns="http://www.w3.org/2000/svg" width="102" height="102" viewBox="0 0 102 102" fill="none">
                <circle cx="51" cy="51" r="49" stroke="#202020" stroke-width="4"></circle>
                <path d="M32.125 51.5L45.25 64.625L71.5 38.375" stroke="#202020" stroke-width="4" stroke-linecap="round" stroke-linejoin="round">
                </path>
              </svg>
              <p class="title">Ваша заявка отправлена! Специалист клиники свяжется с вами в ближайшее время для подтвеждения записи.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
<?$APPLICATION->AddHeadScript('/uslugi-i-tseny/script.js');?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
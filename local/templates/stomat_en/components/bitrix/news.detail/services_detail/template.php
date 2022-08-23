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
<?
$arrFilterRevie = ['PROPERTY_SERVICE' => $arResult['ID']];
$GLOBALS['arrFilterRevie'] = $arrFilterRevie;
?>
<div class="inner-banner service" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/img/servicebg.png);">
  <div class="container">
    <h1><?=$arResult['NAME'];?></h1>
    <div class="row">
      <div class="col-lg-10 col-md-12">
        <div class="links">
          <p>Click on any service you are interested in:</p>
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
            "CACHE_TYPE" => "A",
            "CHECK_DATES" => "Y",
            "DETAIL_URL" => "/en/uslugi-i-tseny/#ELEMENT_CODE#/",
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
</div>
<div class="description-service">
  <div class="container">
    <h2>Service description</h2>
    <div class="row pl">
      <div class="col-lg-10">
        <div class="row">
          <?$i = 0;?>
            <?foreach ($arResult['PROPERTIES']['DETAIL']['~VALUE'] as $detail):?>
              <?if($i==2):?>
                <?if(!empty($arResult['DISPLAY_PROPERTIES']['PHOTO']['VALUE'])):?>
                <div class="col-md-6">
                  <div class="image" style="background-image: url(<?=$arResult['DISPLAY_PROPERTIES']['PHOTO']['FILE_VALUE']['SRC'];?>);"></div>
                </div>
                <?endif;?>
                <?if(!empty($arResult['PROPERTIES']['VIDEO']['VALUE'])):?>
                <div class="col-md-6"><a class="video" <?if(!empty($arResult['DISPLAY_PROPERTIES']['VIDEO_PREVIEW']['VALUE'])):?>style="background-image: url(<?=$arResult['DISPLAY_PROPERTIES']['VIDEO_PREVIEW']['FILE_VALUE']['SRC'];?>);"<?else:?> style="background-image: url(../img/reviewsvideo.png);"<?endif;?> data-fancybox="video-gallery" href="<?=$arResult['PROPERTIES']['VIDEO']['VALUE'];?>">
                  <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100" fill="none">
                    <circle cx="50" cy="50" r="48" stroke="white" stroke-width="4"></circle>
                    <path d="M69.4682 47.8087C71.3578 48.9823 71.3578 51.732 69.4682 52.9056L42.7971 69.4707C40.7987 70.7119 38.2143 69.2748 38.2143 66.9223L38.2143 33.792C38.2143 31.4395 40.7987 30.0023 42.7971 31.2436L69.4682 47.8087Z" fill="white"></path>
                  </svg>
                </a>
              </div>
                <?endif;?>
                <?endif;?>
                <div class="col-md-6">
                  <?=$detail['TEXT'];?>
                </div>
              <?$i++;?>
            <?endforeach;?>
       </div>
     </div>
   </div>
 </div>
</div>
<div class="tableprice">
  <div class="container">
    <?if($arResult['PROPERTIES']['CONSULTATION']['VALUE']):?>
    <h2>Price</h2>
    <?endif;?>
    <div class="row">
      <div class="col-lg-10">
        <div class="tableprice-wrap">
          <?if($arResult['PROPERTIES']['CONSULTATION']['VALUE']):?>
          <?
          $countConsultation = 0;
          foreach ($arResult['PROPERTIES']['CONSULTATION']['VALUE'] as $consultation){
          $countConsultation++;
          }
          ?>
          <?for ($i=0; $i <= $countConsultation-1; $i++):?>
          <div class="item">
            <p><?=$arResult['PROPERTIES']['CONSULTATION']['VALUE'][$i];?></p>
            <p><?=$arResult['PROPERTIES']['CONSULTATION']['DESCRIPTION'][$i];?> ₽</p>
          </div>
          <?endfor;?>
          <?endif;?>
        </div>
      </div>
      <?//echo"<pre>";print_r($arResult['PROPERTIES']['CONSULTATION']);echo"</pre>";?>
      <div class="col-lg-11">
        <button class="btn" data-toggle="modal" data-target=".modal-callback" type="button">Make an appointment</button>
      </div>
    </div>
  </div>
</div>
<div class="examples">
  <div class="container">
    <!-- <h2>Наши работы до/после</h2> -->
    <?$APPLICATION->IncludeComponent(
     "bitrix:news.list", 
     "work_examples", 
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
      "CACHE_TYPE" => "A",
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
      "IBLOCK_ID" => "6",
      "IBLOCK_TYPE" => "slider",
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
       1 => "BEFORE",
       2 => "AFTER",
       3 => "",
     ),
      "SET_BROWSER_TITLE" => "Y",
      "SET_LAST_MODIFIED" => "N",
      "SET_META_DESCRIPTION" => "Y",
      "SET_META_KEYWORDS" => "Y",
      "SET_STATUS_404" => "N",
      "SET_TITLE" => "Y",
      "SHOW_404" => "N",
      "SORT_BY1" => "ACTIVE_FROM",
      "SORT_BY2" => "SORT",
      "SORT_ORDER1" => "DESC",
      "SORT_ORDER2" => "ASC",
      "STRICT_SECTION_CHECK" => "N",
      "COMPONENT_TEMPLATE" => "work_examples"
    ),
     false
   );?>
 </div>
</div>
<div class="specialists">
  <div class="container">
    <h2>Specialists</h2>
    <div class="row">
      <div class="col-lg-11 col-md-12">
        <div class="specialists-slider owl-carousel owl-theme">
         <?foreach ($arResult['SPECIALIZATION'] as $userSpecK => $userSpec):?>
         <a class="item" href="/spetsialisty/<?=$userSpec['id']?>">
           <div class="image" style="background-image: url(<?=$userSpec['photo'];?>);"></div>
           <div class="description">
             <p class="name"><?=$userSpec['name'];?></p>
             <div class="line"></div>
             <p><?=$userSpec['specialization'];?></p>
           </div>
         </a>
         <?endforeach;?>
       </div><a class="btn" href="/spetsialisty/">All specialists</a>
     </div>
   </div>
 </div>
</div>
<div class="form">
  <div class="container">
    <h2>Call back request</h2>
    <div class="row">
      <div class="col-lg-11 col-md-12">
        <form class="callback-services">
          <div class="group">
            <label>Your name</label>
            <input type="text" class="required" name="name">
          </div>
          <div class="group">
            <label>Phone</label>
            <input type="text" class="required" name="phone" placeholder="+7 ">
          </div>
          <input type="submit" value="Make an appointment">
        </form>
        <p>Entering a phone number confirms your agreement with <a href='/politika-konfidentsialnosti.php'>the terms of information transfer</a></p>
      </div>
    </div>
  </div>
</div>
<?$APPLICATION->IncludeComponent(
 "bitrix:main.include", 
 ".default", 
 array(
  "AREA_FILE_RECURSIVE" => "Y",
  "AREA_FILE_SHOW" => "file",
  "AREA_FILE_SUFFIX" => "inc",
  "EDIT_TEMPLATE" => "",
  "PATH" => "/en/include/uslugi-i-tseny/detail/NYDC.php",
  "COMPONENT_TEMPLATE" => ".default"
),
 false
);?>
<div class="reviews">
  <div class="container">
    <h2>Reviews about the procedure</h2>
    <div class="row">
      <div class="col-lg-11 col-md-12">
        <div class="reviews-slider owl-carousel owl-theme"><a class="item video" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/img/reviewsvideo.png);" data-fancybox="video-gallery" href="https://www.youtube.com/watch?v=z2X2HaTvkl8">
          <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100" fill="none">
            <circle cx="50" cy="50" r="48" stroke="white" stroke-width="4"></circle>
            <path d="M69.4682 47.8087C71.3578 48.9823 71.3578 51.732 69.4682 52.9056L42.7971 69.4707C40.7987 70.7119 38.2143 69.2748 38.2143 66.9223L38.2143 33.792C38.2143 31.4395 40.7987 30.0023 42.7971 31.2436L69.4682 47.8087Z" fill="white"></path>
          </svg></a>
          <?
          $APPLICATION->IncludeComponent(
           "bitrix:news.list", 
           "reviews", 
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
            "CACHE_TYPE" => "A",
            "CHECK_DATES" => "Y",
            "DETAIL_URL" => "",
            "DISPLAY_BOTTOM_PAGER" => "Y",
            "DISPLAY_DATE" => "N",
            "DISPLAY_NAME" => "Y",
            "DISPLAY_PICTURE" => "N",
            "DISPLAY_PREVIEW_TEXT" => "Y",
            "DISPLAY_TOP_PAGER" => "N",
            "FIELD_CODE" => array(
             0 => "",
             1 => "",
           ),
            "FILTER_NAME" => "arrFilterRevie",
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
            "IBLOCK_ID" => "8",
            "IBLOCK_TYPE" => "reviews",
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
            "SET_BROWSER_TITLE" => "Y",
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
            "COMPONENT_TEMPLATE" => "reviews"
          ),
           false
         );?>
       </div>
       <div class="buttons">
        <button class="btn" data-toggle="modal" data-target=".modal-callback" type="button">Submit an application</button><a class="btn" href="#">See all reviews</a>
      </div>
    </div>
  </div>
</div>
</div>
<div class="modal-callback modal fade" tabindex="-1" role="dialog" data-keyboard="false" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <button class="close-popup" type="button" data-dismiss="modal" aria-hidden="true">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
          <path d="M18.25 1.75195L1.75085 18.2511" stroke="#202020" stroke-width="2" stroke-linecap="square" stroke-linejoin="bevel"></path>
          <path d="M1.75 1.75L18.2492 18.2492" stroke="#202020" stroke-width="2" stroke-linecap="square" stroke-linejoin="bevel"></path>
        </svg>
      </button>
      <div class="modal-body">
        <form class="form-callback-send">
          <p class="title">Submit an application</p>
          <div class="group">
            <label>Ваше имя</label>
            <input type="text" class="required" name="name">
          </div>
          <div class="group">
            <label>Phone</label>
            <input type="text" class="required" name="phone" placeholder="+7 ">
          </div>
          <input class="btn" id="btn5" type="submit" value="Submit an application">
        </form>
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
          <p class="title">Your application has been sent! The specialist of the clinic will contact you shortly to confirm the appointment.</p>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(function(){
    $('.callback-services').on('submit', function(event){
      event.preventDefault();
      name = $('input[name="name"]').val();
      phone = $('input[name="phone"]').val();
      let requiredInputs = $(this).find('input.required');
      let errors = false;
      requiredInputs.each(function(){
        const input = $(this)
        if(input.val().length <= 0){
          input.addClass('error');
          errors = true;
        }
      })
      if(!errors){
        $.ajax(
        {
          url: '/ajax/submitForm.php',
          type: 'post',
          dataType: 'html',
          data: { name: name, phone: phone },
          success: function(data)
          {
            $('.modal-success-feedback').modal('show');       
          }
        });
      }
    })
    $('.form-callback-send').on('submit', function(event){
      event.preventDefault();
      name = $('.modal-callback input[name="name"]').val();
      phone = $('.modal-callback input[name="phone"]').val();
      let requiredInputs = $(this).find('input.required');
      let errors = false;
      requiredInputs.each(function(){
        const input = $(this)
        if(input.val().length <= 0){
          input.addClass('error');
          errors = true;
        }
      })
      if(!errors){
       $.ajax(
       {
        url: '/ajax/submitForm.php',
        type: 'post',
        dataType: 'html',
        data: { name: name, phone: phone },
        success: function(data)
        {
          var modal = $('.modal-callback');
          modal.modal('hide');
          $('.modal-success-feedback').modal('show');
        }
    });
     }
   })
    $(document).on('input', 'input.required', function(){
      const input = $(this)
      if(input.val().length > 0){
        input.removeClass('error');
        errors = false;
      }
    })
  })
</script>
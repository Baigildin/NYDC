<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>
тест
<?
function RusToLat($source=false) {
    if ($source) {
        $rus = [
            'А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я',
            'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я'
        ];
        $lat = [
            'A', 'B', 'V', 'G', 'D', 'E', 'Yo', 'Zh', 'Z', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'C', 'Ch', 'Sh', 'Shh', '', 'Y', '', 'E', 'Yu', 'Ya',
            'a', 'b', 'v', 'g', 'd', 'e', 'yo', 'zh', 'z', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'shh', '', 'y', '', 'e', 'yu', 'ya'
        ];
        return str_replace($rus, $lat, $source);
    }
}

$rsUsers = CUser::GetList($by="id", $order="asc",Array("GROUPS_ID" => Array(6)),Array());
while($arUser = $rsUsers->Fetch()){
  $users[] = $arUser['ID'];
  $usList[$arUser['ID']] = RusToLat(mb_strtolower($arUser['LAST_NAME'].'-'.$arUser['NAME'].'-'.$arUser['SECOND_NAME']));
}
foreach ($users as $usersId) {
  $userId = CUser::GetById($usersId);
  $userList[] = $userId->Fetch();
}
$userLists = [];
foreach ($userList as $userk => $user) {
  if(!empty($user['UF_SPECIALIZATION'])){
    $specialist = CUserFieldEnum::GetList(array(), array(
      "ID" => $user['UF_SPECIALIZATION'],
    ));
    while($specialList = $specialist->GetNext()){
      $specials[] = $specialList['VALUE'];
    }
    $specials = implode(', <br>', $specials);
  }else{
    $specials = '';
  }
  $userPhoto = CFile::GetPath($user['PERSONAL_PHOTO']);
  $userLists[$userk]['name'] = $user['LAST_NAME'].' '.$user['NAME'].' '.$user['SECOND_NAME'];
  $userLists[$userk]['specialization'] = $specials;
  $userLists[$userk]['photo'] = $userPhoto;
  $userLists[$userk]['id'] = $usList[$user['ID']];
  $specials = [];
}
?>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"top_slider", 
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
		"IBLOCK_ID" => "5",
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
			1 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "top_slider"
	),
	false
);?>
<div class="privelege">
  <div class="container">
    <div class="row">
      <div class="col-xl-10 offset-xl-1 col-lg-11">
        <div class="wrapper">
          <div class="item">
            <div class="plus">
              <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                <path d="M11 3.72729V18.2727" stroke="#202020" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M3.72726 11H18.2727" stroke="#202020" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
            </div>
            <?$APPLICATION->IncludeComponent(
              "bitrix:main.include", 
              ".default", 
              array(
                "AREA_FILE_RECURSIVE" => "Y",
                "AREA_FILE_SHOW" => "file",
                "AREA_FILE_SUFFIX" => "inc",
                "EDIT_TEMPLATE" => "",
                "PATH" => "/include/main/advantage1.php",
                "COMPONENT_TEMPLATE" => ".default"
              ),
              false
            );?>
          </div>
          <div class="item">
            <div class="plus">
              <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                <path d="M11 3.72729V18.2727" stroke="#202020" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M3.72726 11H18.2727" stroke="#202020" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
            </div>
            <?$APPLICATION->IncludeComponent(
              "bitrix:main.include", 
              ".default", 
              array(
                "AREA_FILE_RECURSIVE" => "Y",
                "AREA_FILE_SHOW" => "file",
                "AREA_FILE_SUFFIX" => "inc",
                "EDIT_TEMPLATE" => "",
                "PATH" => "/include/main/advantage2.php",
                "COMPONENT_TEMPLATE" => ".default"
              ),
              false
            );?>
          </div>
          <div class="item">
            <div class="plus">
              <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                <path d="M11 3.72729V18.2727" stroke="#202020" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M3.72726 11H18.2727" stroke="#202020" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
            </div>
            <?$APPLICATION->IncludeComponent(
              "bitrix:main.include", 
              ".default", 
              array(
                "AREA_FILE_RECURSIVE" => "Y",
                "AREA_FILE_SHOW" => "file",
                "AREA_FILE_SUFFIX" => "inc",
                "EDIT_TEMPLATE" => "",
                "PATH" => "/include/main/advantage3.php",
                "COMPONENT_TEMPLATE" => ".default"
              ),
              false
            );?>
          </div>
          <div class="item">
            <div class="plus">
              <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                <path d="M11 3.72729V18.2727" stroke="#202020" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M3.72726 11H18.2727" stroke="#202020" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
            </div>
            <?$APPLICATION->IncludeComponent(
              "bitrix:main.include", 
              ".default", 
              array(
                "AREA_FILE_RECURSIVE" => "Y",
                "AREA_FILE_SHOW" => "file",
                "AREA_FILE_SUFFIX" => "inc",
                "EDIT_TEMPLATE" => "",
                "PATH" => "/include/main/advantage4.php",
                "COMPONENT_TEMPLATE" => ".default"
              ),
              false
            );?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="about">
  <div class="image" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/img/aboutimg.png);"></div>
  <div class="container">
    <div class="row">
      <div class="col-xl-4 offset-xl-7 col-lg-5 offset-lg-5 col-md-7 offset-md-5">
        <div class="item">
          <?$APPLICATION->IncludeComponent(
           "bitrix:main.include", 
           ".default", 
           array(
            "AREA_FILE_RECURSIVE" => "Y",
            "AREA_FILE_SHOW" => "file",
            "AREA_FILE_SUFFIX" => "inc",
            "EDIT_TEMPLATE" => "",
            "PATH" => "/include/main/aboutclinic.php",
            "COMPONENT_TEMPLATE" => ".default"
          ),
           false
         );?>
         <button class="btn" data-toggle="modal" data-target=".modal-callback-writetous" type="button">Напишите нам</button>
       </div>
     </div>
   </div>
 </div>
</div>
<div class="examples">
  <div class="container">
    <?
    $cnt = CIBlockElement::GetList(
      array(),
      array('IBLOCK_ID' => 6, 'ACTIVE'=>'Y'),
      array(),
      false,
      array('ID', 'NAME')
    );
    if($cnt!=0):?>
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
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
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
    <?endif;?>
  </div>
</div>
<div class="specialists">
  <div class="container">
    <h2>Специалисты</h2>
    <div class="row">
      <div class="col-lg-11 col-md-12">
        <div class="specialists-slider owl-carousel owl-theme">
          <?foreach ($userLists as $userSpecK => $userSpec):?>
          <a href="/spetsialisty/<?=$userSpec['id']?>" class="item">
            <div class="image" style="background-image: url(<?=$userSpec['photo'];?>);"></div>
            <div class="description">
              <p class="name"><?=$userSpec['name'];?></p>
              <div class="line"></div>
              <p><?=$userSpec['specialization'];?></p>
            </div>
          </a>
          <?endforeach;?>
        </div><a class="btn" href="/spetsialisty">Все специалисты</a>
      </div>
    </div>
  </div>
</div>
<div class="services" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/img/servicesimg.png);">
  <div class="container">
    <h2>Услуги</h2>
    <p class="subtitle">Персональная помощь и консультирование</p>
    <div class="row pl">
      <div class="col-lg-11 col-md-12">
        <div class="row">
          <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"services", 
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
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "services"
	),
	false
);?>
</div>
</div>
</div>
</div>
</div>
<div class="form">
  <div class="container">
    <h2>Заявка на обратный звонок</h2>
    <div class="row">
      <div class="col-lg-11 col-md-12">
        <form class="callback-main">
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
<div class="news">
  <div class="container">
    <h2>Новости</h2>
    <div class="row">
      <div class="col-lg-11 col-md-12">
        <div class="news-slider owl-carousel owl-theme">
          <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"stomat_news", 
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
		"DETAIL_URL" => "/novosti/##ELEMENT_ID#",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "1",
		"IBLOCK_TYPE" => "news",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "5",
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
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "TIMESTAMP_X",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "stomat_news"
	),
	false
);?>
</div>
</div>
</div>
</div>
</div>
<div class="reviews">
  <div class="container">
    <h2>Отзывы</h2>
    <div class="row">
      <div class="col-lg-11 col-md-12">
        <div class="reviews-slider owl-carousel owl-theme"><a class="item video" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/img/reviewsvideo.png);" data-fancybox="video-gallery" href="https://www.youtube.com/watch?v=z2X2HaTvkl8">
          <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100" fill="none">
            <circle cx="50" cy="50" r="48" stroke="white" stroke-width="4"></circle>
            <path d="M69.4682 47.8087C71.3578 48.9823 71.3578 51.732 69.4682 52.9056L42.7971 69.4707C40.7987 70.7119 38.2143 69.2748 38.2143 66.9223L38.2143 33.792C38.2143 31.4395 40.7987 30.0023 42.7971 31.2436L69.4682 47.8087Z" fill="white"></path>
          </svg></a>
          <?$APPLICATION->IncludeComponent(
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
		"FILTER_NAME" => "",
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
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
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
  <button class="btn" data-toggle="modal" data-target=".modal-callback" type="button">Отправить заявку</button><a class="btn" href="/otzyvy">Смотреть все отзывы</a>
</div>
</div>
</div>
</div>
</div>
<div class="gallery">
  <div class="container">
    <h2>Фото клиники</h2>
    <div class="row">
      <div class="col-lg-11 col-md-12">
        <div class="gallery-slider owl-carousel owl-theme">
          <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"photo_slider", 
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
		"DISPLAY_NAME" => "N",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "9",
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
			1 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "photo_slider"
	),
	false
);?>
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
              <p class="title">Отправить заявку</p>
              <div class="group">
                <label>Ваше имя</label>
                <input type="text" class="required" name="name">
              </div>
              <div class="group">
                <label>Телефон</label>
                <input type="text" class="required" name="phone" placeholder="+7 ">
              </div>
              <input class="btn" id="btn5" type="submit" value="Отправить заявку">
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-callback-writetous modal fade" tabindex="-1" role="dialog" data-keyboard="false" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <button class="close-popup" type="button" data-dismiss="modal" aria-hidden="true">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
              <path d="M18.25 1.75195L1.75085 18.2511" stroke="#202020" stroke-width="2" stroke-linecap="square" stroke-linejoin="bevel"></path>
              <path d="M1.75 1.75L18.2492 18.2492" stroke="#202020" stroke-width="2" stroke-linecap="square" stroke-linejoin="bevel"></path>
            </svg>
          </button>
          <div class="modal-body">
            <form class="form-writetous-send">
              <p class="title">Отправить письмо</p>
              <div class="group">
                <label>Ваше имя</label>
                <input type="text" class="required" name="name">
              </div>
              <div class="group">
                <label>Телефон</label>
                <input type="text" class="required" name="phone" placeholder="+7 ">
              </div>
              <div class="group">
                <label>Текст</label>
                <textarea name="text"></textarea>
              </div>
              <input class="btn" id="btn5" type="submit" value="Отправить заявку">
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
              <p class="title">Ваша заявка отправлена! Специалист клиники свяжется с вами в ближайшее время для подтвеждения записи.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-success-writeToUs modal fade" tabindex="-1" role="dialog" data-keyboard="false" aria-hidden="true">
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
              <p class="title">Отправлено</p>
            </div>
          </div>
        </div>
      </div>
    </div>
<?$APPLICATION->AddHeadScript('/index.js');?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Специалист");?>
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
  $users[$arUser['ID']] = RusToLat(mb_strtolower($arUser['LAST_NAME'].'-'.$arUser['NAME'].'-'.$arUser['SECOND_NAME']));
}
$users = array_flip($users);
$page = $APPLICATION->GetCurPage();
$page = explode('/', $page);


$rsUser = CUser::GetByID($users[$page[2]]);
$userId = $rsUser->Fetch();
if(!empty($userId['UF_SPECIALIZATION'])){
  $specialist = CUserFieldEnum::GetList(array(), array(
    "ID" => $userId['UF_SPECIALIZATION'],
  ));
  while($specialList = $specialist->GetNext()){
    $specials[] = $specialList['VALUE'];
  }
  $user['specials'] = implode(', ', $specials);
}else{
  $user['specials'] = '';
}
$user['name'] = $userId['LAST_NAME'].' '.$userId['NAME'].' '.$userId['SECOND_NAME'];
$user['photo'] = CFile::GetPath($userId['PERSONAL_PHOTO']);
$user['experience'] = $userId['UF_EXPERIENCE'];
$user['treatment'] = $userId['UF_TREATMENT_APPROACH'];
$user['specdescr'] = $userId['UF_SPEC_DESCR'];
$user['education'] = $userId['UF_EDUCATION'];
if($userId['UF_DIPLOMAS']){
  foreach ($userId['UF_DIPLOMAS'] as $diplomas) {
    $user['diplomas'][] = CFile::GetPath($diplomas);
  }
}else{
  $user['diplomas'] = '';
}

$APPLICATION->AddChainItem($user['name']);

CModule::IncludeModule('iblock');
$cnt = CIBlockElement::GetList(
    array(),
    array('IBLOCK_ID' => 6, 'PROPERTY_SPECIALIST'=>$userId['ID']),
    array(),
    false,
    array('ID', 'NAME')
);
$arrFilterWorkExamples = ['PROPERTY_SPECIALIST' => $userId['ID']];
$arrFilterReviewSpecialists = ['PROPERTY_SPECIALIST_REVIEW' => $userId['ID']];
?>
    <div class="doctor-wrapper">
      <div class="container">
        <div class="row pl">
          <div class="col-lg-11">
            <div class="row">
              <div class="col-md-5">
                <div class="image" style="background-image: url(<?=$user['photo'];?>"></div>
              </div>
              <div class="col-md-7">
                <div class="information">
                  <div class="information-scrolled">
                    <span><?=$user['specials'];?></span>
                    <h1><?=$user['name'];?></h1>
                    <p>Опыт работы: <?=$user['experience'];?></p>
                    <button class="btn" type="button" data-toggle="modal" data-target=".modal-callback">Записаться на приём</button>
                  </div>
                  <?=$user['treatment'];?>
                  <?=$user['specdescr'];?>
                  <p class="title">Образование</p>
                  <div class="education">
                    <ul>
                      <?foreach ($user['education'] as $education):?>
                      <li><?=$education;?></li>
                      <?endforeach;?>
                    </ul>
                    <button type="button" id="btn2" data-toggle="modal" data-target=".modal-diplom">Смотреть фото дипломов</button>
                  </div>
                  <div class="works">
                    <p class="title">Работы доктора</p>
                    <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"work_examples_specialist", 
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
		"FILTER_NAME" => "arrFilterWorkExamples",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "6",
		"IBLOCK_TYPE" => "slider",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "3",
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
		"SORT_BY1" => "TIMESTAMP_X",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "work_examples_specialist"
	),
	false
);?>
                    <?if($cnt>3):?>
                    <button class="btn" id="btn3" type="button">Больше работ</button>
                    <?endif;?>
                  </div>
                  <div class="reviews-doctor">
                    <p class="title">Отзывы пациентов</p>
                    <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"reviews_for_specialist", 
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
		"FILTER_NAME" => "arrFilterReviewSpecialists",
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
		"COMPONENT_TEMPLATE" => "reviews_for_specialist"
	),
	false
);?>
                    <div class="buttons">
                      <button class="btn" id="btn4" type="button" data-toggle="modal" data-target=".modal-send-callback">Отправить заявку</button><a class="btn" data-toggle="modal" data-target=".modal-review" href="#">Оставить свой отзыв</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-diplom modal fade" tabindex="-1" role="dialog" data-keyboard="false" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <button class="close-popup" type="button" data-dismiss="modal" aria-hidden="true">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
              <path d="M18.25 1.75195L1.75085 18.2511" stroke="#202020" stroke-width="2" stroke-linecap="square" stroke-linejoin="bevel"></path>
              <path d="M1.75 1.75L18.2492 18.2492" stroke="#202020" stroke-width="2" stroke-linecap="square" stroke-linejoin="bevel"></path>
            </svg>
          </button>
          <div class="modal-body">
            <p class="title">Дипломы доктора</p>
            <div class="diplom-slider owl-carousel owl-theme">
              <?foreach ($user['diplomas'] as $diplomasPhoto):?>
              <a class="item" data-fancybox="gallery" href="<?=$diplomasPhoto;?>"><img src="<?=$diplomasPhoto;?>"></a>
              <?endforeach;?>
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
            <form class="form-callback">
              <p class="title">Записаться на прием</p>
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
    <div class="modal-send-callback modal fade" tabindex="-1" role="dialog" data-keyboard="false" aria-hidden="true">
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
    <div class="modal-review modal fade" tabindex="-1" role="dialog" data-keyboard="false" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <button class="close-popup" type="button" data-dismiss="modal" aria-hidden="true">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
              <path d="M18.25 1.75195L1.75085 18.2511" stroke="#202020" stroke-width="2" stroke-linecap="square" stroke-linejoin="bevel"></path>
              <path d="M1.75 1.75L18.2492 18.2492" stroke="#202020" stroke-width="2" stroke-linecap="square" stroke-linejoin="bevel"></path>
            </svg>
          </button>
          <div class="modal-body">
            <form id="reviews" enctype="multipart/form-data">
              <p class="title">Оставьте свой отзыв</p>
              <div class="groups">
                <div class="group">
                  <label>Ваше имя</label>
                  <input type="text" class="required" name="name" id="name-rev">
                </div>
                <div class="group">
                  <label>Телефон</label>
                  <input type="text" class="required" name="phone" id="phone-rev" placeholder="+7 ">
                </div>
              </div>
              <div class="group">
                <label>Напишите свой отзыв</label>
                <textarea name="text" class="required"></textarea>
              </div>
              <div class="files">
                <label>
                  <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                    <circle cx="14" cy="14" r="13" stroke="#868686" stroke-width="2"></circle>
                    <line x1="14" y1="8" x2="14" y2="20" stroke="#868686" stroke-width="2" stroke-linecap="round"></line>
                    <line x1="20" y1="14" x2="8" y2="14" stroke="#868686" stroke-width="2" stroke-linecap="round"></line>
                  </svg><span>Перетащите ваше фото или загрузите с компьютера</span>
                  <input type="file" name="file">
                </label>
                <p>Вы можете загрузить изображение в формате JPG, GIF или PNG.</p>
              </div>
              <input class="btn" type="submit" value="Оставить отзыв">
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
    <div class="modal-info modal fade" tabindex="-1" role="dialog" data-keyboard="false" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="info">
              <svg xmlns="http://www.w3.org/2000/svg" width="102" height="102" viewBox="0 0 102 102" fill="none">
                <circle cx="51" cy="51" r="49" stroke="#202020" stroke-width="4"></circle>
                <path d="M32.125 51.5L45.25 64.625L71.5 38.375" stroke="#202020" stroke-width="4" stroke-linecap="round" stroke-linejoin="round">
                </path>
              </svg>
              <p class="title">Спасибо!</p>
              <p class="subtitle">Спасибо, ваше мнение важно для нас!</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      $(function() {
      let i = 2;
      let count = <?=$cnt?>;
      $(document).on("click", "#btn3", function () {
        count = count - 3;
        $.ajax(
        {
          url: '/ajax/workExamplesSpecialists.php?PAGEN_1='+i,
          type: 'post',
          dataType: 'html',
          data: 'id='+<?=$userId['ID'];?>+'&param=Y',
          success: function(data)
          {
            $('.works').append(data);
            
            $('.sliderBA.ajaxLoaded').anyImageComparisonSlider({
                initialPosition: 0.5,
                cursor: 'none',
              });

            $('#btn3').remove();
            if(count>3){
              $('.works').append('<button class="btn" id="btn3" type="button">Больше работ</button>');
            }
          }
        });
        i++;
      })
      $('.form-callback').on('submit', function(event){
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
              var modal = $('.modal-callback');
              modal.modal('hide');
              $('.modal-success-feedback').modal('show');
            }
          });
        }
      })
      $('.form-callback-send').on('submit', function(event){
        event.preventDefault();
        name = $('.modal-send-callback input[name="name"]').val();
        phone = $('.modal-send-callback input[name="phone"]').val();

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
              var modal = $('.modal-send-callback');
              modal.modal('hide');
              $('.modal-success-feedback').modal('show');
            }
          });
        }
      })
      $('#reviews').on('submit', function(event){
        event.preventDefault();
        let name = $('#name-rev').val();
        let phone = $('#phone-rev').val();
        let text = $('textarea[name="text"]').val();
        let fileUp = new FormData(this);
        fileUp.append('id', <?=$userId['ID']?>);
        let requiredInputs = $(this).find('input.required');
        let errors = false;
        let requiredTextarea = $('textarea');
        if(requiredTextarea.val().length <= 0){
          requiredTextarea.addClass('error');
          errors = true;
        }
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
            url: '/ajax/addReviews.php',
            type: 'post',
            dataType: 'html',
            data: fileUp,
            contentType: false,
            processData: false,
            success: function(data)
            {

              $('.modal-review').modal('hide');
              $('.modal-info').modal('show');
              
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
      $(document).on('keyup', 'textarea.required', function() {
        $('textarea').removeClass('error');
        errors = false;
      })
    })
    </script>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
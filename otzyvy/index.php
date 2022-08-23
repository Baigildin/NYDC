<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Отзывы");
?>
<?
$rsUsers = CUser::GetList($by="id", $order="asc",Array("GROUPS_ID" => Array(6)),Array());
while($arUser = $rsUsers->Fetch()){
  $users[] = $arUser['ID'];
}
foreach ($users as $usersId) {
  $userId = CUser::GetById($usersId);
  $userList[] = $userId->Fetch();
}
$userLists = [];
foreach ($userList as $userk => $user) {
  $userLists[$userk]['name'] = $user['LAST_NAME'].' '.$user['NAME'].' '.$user['SECOND_NAME'];
  $userLists[$userk]['id'] = $user['ID'];
}
CModule::IncludeModule('iblock');
$cnt = CIBlockElement::GetList(
    array(),
    array('IBLOCK_ID' => 8),
    array(),
    false,
    array('ID', 'NAME')
);
?>
    <div class="mobile-filter">
      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="18" height="18" x="0" y="0" viewBox="0 0 394 394.00003" style="enable-background:new 0 0 512 512" xml:space="preserve">
        <g>
          <path xmlns="http://www.w3.org/2000/svg" d="m367.820312 0h-351.261718c-6.199219-.0117188-11.878906 3.449219-14.710938 8.960938-2.871094 5.585937-2.367187 12.3125 1.300782 17.414062l128.6875 181.285156c.042968.0625.089843.121094.132812.183594 4.675781 6.3125 7.207031 13.960938 7.21875 21.816406v147.800782c-.027344 4.375 1.691406 8.582031 4.773438 11.6875 3.085937 3.101562 7.28125 4.851562 11.65625 4.851562 2.222656-.003906 4.425781-.445312 6.480468-1.300781l72.3125-27.570313c6.476563-1.980468 10.777344-8.09375 10.777344-15.453125v-120.015625c.011719-7.855468 2.542969-15.503906 7.214844-21.816406.042968-.0625.089844-.121094.132812-.183594l128.691406-181.289062c3.667969-5.097656 4.171876-11.820313 1.300782-17.40625-2.828125-5.515625-8.511719-8.9765628-14.707032-8.964844zm0 0" fill="#202020" data-original="#202020"></path>
        </g>
      </svg>
    </div>
    <div class="inner-banner reviews" style="background-image: url(<?=SITE_TEMPLATE_PATH;?>/img/reviewsbg1.png);">
      <div class="container">
        <h1>Отзывы о клинике</h1>
        <button class="btn" type="button" data-toggle="modal" data-target=".modal-review">Оставить свой отзыв</button>
      </div>
    </div>
    <div class="reviews-wrapper">
      <div class="container">
        <div class="row pl">
          <div class="col-lg-11">
            <div class="row">
              <div class="col-lg-4">
                <div class="filter-doctor">
                  <div class="headline">
                    <p class="title">Фильтр по врачам</p>
                  </div>
                  <div class="body-filter">
                    <ul>
                      <li>
                        <button class="specialist active" type="button" id="0">Все отзывы</button>
                      </li>
                      <?foreach ($userLists as $userList):?>
                      <li>
                        <button class="specialist" type="button" id="<?=$userList['id'];?>"><?=$userList['name'];?></button>
                      </li>
                      <?endforeach;?>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="wrap">
                  <div class="reviews-doctor">
                    <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"reviews_all", 
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
		"IBLOCK_ID" => "8",
		"IBLOCK_TYPE" => "reviews",
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
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SORT_BY1" => "TIMESTAMP_X",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "reviews_all"
	),
	false
);?>
                  </div>
                  <div class="more-btn">
                    <button class="btn" id="morereviews" type="button">Больше отзывов</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="form" id="feedback">
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
                  <input type="text" name="name" class="required" id="name-rev">
                </div>
                <div class="group">
                  <label>Телефон</label>
                  <input type="text" name="phone" class="required" id="phone-rev" placeholder="+7 ">
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
    <script>
        $(function() {
            let i = 2;
            let count = <?=$cnt?>;
            $(document).on("click", "#morereviews", function () {
                count = count - 5;
                $.ajax(
                {
                  url: '/ajax/allReviews.php?PAGEN_1='+i,
                  type: 'post',
                  dataType: 'html',
                  success: function(data)
                  {
                    $('.reviews-doctor').append(data);
                    $('#morereviews').remove();
                    if(count>3){
                      $('.more-btn').append('<button class="btn" id="morereviews" type="button">Больше отзывов</button>');
                    }
                  }
                });
                i++;
            })
            $(document).on('click', '.specialist', function() {
              let id = $(this).attr('id');
              $('.specialist').removeClass('active');
              $('#'+id).addClass('active');
              if(id==0){
                k = 2;
              }else{
                k = 1;
              }
                $.ajax(
                {
                  url: '/ajax/allReviews.php?PAGEN_1='+k,
                  type: 'post',
                  dataType: 'html',
                  data: 'id='+id,
                  success: function(data)
                  {
                    $('.reviews-doctor').html(data);
                    specCount = $('.spec-count').val();
                    $('#morereviews').remove();
                    $('#specialist').remove();
                    if(id>0){
                      if(specCount>0){
                        $('.more-btn').append('<button class="btn" id="specialist" type="button">Больше отзывов</button>');
                      }
                    }else{
                        $('.more-btn').append('<button class="btn" id="morereviews" type="button">Больше отзывов</button>');
                    }
                    if(specCount<6){
                      $('#morereviews').remove();
                      $('#specialist').remove();
                    }
                  }
                });
                let i = 2;
                $(document).on('click', '#specialist', function() {
                  $.ajax(
                  {
                    url: '/ajax/allReviews.php?PAGEN_1='+i,
                    type: 'post',
                    dataType: 'html',
                    data: 'id='+id,
                    success: function(data)
                    {
                      $('.reviews-doctor').html(data);
                      specCount = $('.spec-count').val();
                      $('#morereviews').remove();
                      $('#specialist').remove();
                      if(id>0){
                        if(specCount>0){
                          $('.more-btn').append('<button class="btn" id="specialist" type="button">Больше отзывов</button>');
                        }
                      }else{
                        $('.more-btn').append('<button class="btn" id="morereviews" type="button">Больше отзывов</button>');
                      }
                      if(specCount<6){
                        $('#morereviews').remove();
                        $('#specialist').remove();
                      }
                    specCount = specCount - 5*(i-1);
                    if(specCount<6){
                      $('#specialist').remove();
                    }
                    i++;
                  }
                });
                })
            })
            $('#feedback').on('submit', function(event){
            event.preventDefault();
            let name = $('input[name="name"]').val();
            let phone = $('input[name="phone"]').val();
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
            $('#reviews').on('submit', function(event){
            event.preventDefault();
            let name = $('#name-rev').val();
            let phone = $('#phone-rev').val();
            let text = $('textarea[name="text"]').val();
            let fileUp = new FormData(this);
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
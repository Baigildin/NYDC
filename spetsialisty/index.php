<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Специалисты");
?>
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
<?
$specialSelect = CUserFieldEnum::GetList(array(), array());
$i = 1;
$k = 0;
while($specialSelectList = $specialSelect->GetNext()){
    $specialSelList[$i] = $specialSelectList['VALUE'];
    $i++;
}
?>
    <div class="specialists-wrapper">
      <div class="container">
        <h1>Наши врачи</h1>
        <div class="row pl">
          <div class="col-lg-11">
            <div class="headline-filter">
              <div class="speciality">
                                <div class="select-box">
                                  <div class="select-box__current" tabindex="1">

                                    <div class="select-box__value">
                                      <input class="select-box__input" type="radio" id="0" value="1" name="objects" checked>
                                      <p class="select-box__input-text">Все специальности</p>
                                    </div>
                                    <?foreach ($specialSelList as $specialSelK => $specialSel):?>
                                    <div class="select-box__value">
                                      <input class="select-box__input" type="radio" id="<?=$specialSelK;?>" value="<?=$specialSelK+1;?>" name="objects">
                                      <p class="select-box__input-text"><?=$specialSel;?></p>
                                    </div>
                                    <?endforeach;?>
                                    <svg class="select-box__icon" width="7" height="10" viewBox="0 0 7 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M1.24219 9L5.48483 4.75736L1.24219 0.514719" stroke="#000000" stroke-width="1.2"></path>
                                    </svg>
                                  </div>
                                  <ul class="select-box__list">
                                    <li>
                                      <label class="select-box__option" for="0" aria-hidden>Все специальности</label>
                                    </li>
                                    <?foreach ($specialSelList as $specialSelK => $specialSel):?>
                                    <li>
                                      <label class="select-box__option" for="<?=$specialSelK;?>" aria-hidden><?=$specialSel;?></label>
                                    </li>
                                    <?endforeach;?>
                                  </ul>
                                </div>
              </div>
            <div class="speciality-search">
                <input type="text" name="search" id="speciality-search" placeholder="Поиск врача по ФИО">
            </div>  
              
            
            </div>
            <div class="specialists-inner-wrapper">
                <?foreach ($userLists as $userSpecK => $userSpec):?>
                <?$k++;?>
                <?if($k==7)break;?>
                <a class="item" href="/spetsialisty/<?=$userSpec['id']?>">
                    <div class="image" style="background-image: url(<?=$userSpec['photo'];?>);"></div>
                    <div class="description">
                      <p class="name"><?=$userSpec['name'];?></p>
                      <div class="line"></div>
                      <p><?=$userSpec['specialization'];?></p>
                    </div>
                </a>
                <?endforeach;?>
            </div>
            <div class="more-btn">
              <button class="btn" type="button">Все специалисты</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
        $(function() {
            $(document).on("click", ".btn", function () {
                $.ajax(
                {
                    url: '/ajax/allSpecialists.php',
                    type: 'post',
                    dataType: 'html',
                    success: function(data)
                    {
                        $('.specialists-inner-wrapper').html(data);
                        $('.btn').remove();
                    }
                });
            })
            $('.select-box__option').on('click', function() {
                specialization = $(this).closest('label').text();
                $.ajax(
                {
                    url: '/ajax/specialistSpecialization.php',
                    type: 'post',
                    dataType: 'html',
                    data: 'specialization='+specialization,
                    success: function(data)
                    {
                        $('.specialists-inner-wrapper').html(data);
                        if(specialization == 'Все специальности'){
                            $('.btn').remove();
                        }else{
                            $('.more-btn').html('<button class="btn" type="button">Все специалисты</button>');
                        }
                    }
                });
            })
            $('.speciality-search').keyup(function() {
                $.ajax(
                {
                    url: '/ajax/searchSpecialists.php',
                    type: 'post',
                    dataType: 'html',
                    data: 'searchspec='+$('#speciality-search').val(),
                    success: function(data)
                    {
                        if($('#speciality-search').val()==''){
                            $('.btn').remove();
                        }else{
                            $('.more-btn').html('<button class="btn" type="button">Все специалисты</button>');
                        }
                        $('.specialists-inner-wrapper').html(data);
                    }
                });
            })
        })
    </script>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
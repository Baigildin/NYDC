<?
define('NOT_CHECK_PERMISSIONS', true);
define('NO_KEEP_STATISTIC', true);
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
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
foreach ($userLists as $userUfSpecializationK => $userUfSpecialization) {
  if($_REQUEST['specialization']!='All specialties'){
    if(strstr($userUfSpecialization['specialization'], $_REQUEST['specialization'])){
      $userUfSpecializationList[] = $userUfSpecialization;
    }
  }else{
    $userUfSpecializationList[] = $userUfSpecialization;
  }
}
?>
<?foreach ($userUfSpecializationList as $userUfSpecK => $userUfSpec):?>
<a class="item" href="/spetsialisty/<?=$userUfSpec['id']?>">
  <div class="image" style="background-image: url(<?=$userUfSpec['photo'];?>);"></div>
  <div class="description">
    <p class="name"><?=$userUfSpec['name'];?></p>
    <div class="line"></div>
    <p><?=$userUfSpec['specialization'];?></p>
  </div>
</a>
<?endforeach;?>
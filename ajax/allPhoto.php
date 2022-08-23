<?
define('NOT_CHECK_PERMISSIONS', true);
define('NO_KEEP_STATISTIC', true);
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
CModule::IncludeModule("fileman");
CMedialib::Init();
$arCol= CMedialibCollection::GetList(array('arFilter' => array('ACTIVE' => 'Y')));
$arItems= CMedialibItem::GetList(array('arCollections' => array($arCol[0]['ID'])));
$arImgPath= array();
foreach ($arItems as $arItem){
   $imgPath= $arItem['PATH'];
   $arImgPath[]= $imgPath;
};
$count = count($arImgPath);
$cnt = $count - ($_REQUEST['count']+10);
$imgPathList = array_slice($arImgPath, $_REQUEST['count'], -$cnt);
?>
<?foreach ($imgPathList as $imgPathK => $imgPath):?>
<div class="grid-item"><a class="inner" style="background-image: url(<?=$imgPath;?>);" data-fancybox="gallery" href="<?=$imgPath;?>"></a></div>
<?endforeach;?>
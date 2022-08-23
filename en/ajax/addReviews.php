<?
define('NOT_CHECK_PERMISSIONS', true);
define('NO_KEEP_STATISTIC', true);
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
CModule::IncludeModule("iblock");
if(!empty($_REQUEST['name'])&&!empty($_REQUEST['phone'])){
  $el = new CIBlockElement;
  $PROP = array();
  $PROP[20] = htmlspecialchars($_REQUEST['phone']);
  if(!empty($_REQUEST['id'])){
    $PROP[18] = $_REQUEST['id'];
  }
  if($_FILES['file']['tmp_name']){
    $PROP[21] = CFile::MakeFileArray($_FILES['file']['tmp_name']);
  }
  $text = htmlspecialchars($_REQUEST['text']);
  if(strlen($text)>200 && strlen($text)>300){
    $preview = substr($text, 0, 200);
    $detail = substr($text, 200);
  }else{
    $preview = $text;
    $detail = '';
  }
  $review = Array(
    'NAME' => htmlspecialchars($_REQUEST['name']),
    'PREVIEW_TEXT'   => $preview,
    'DETAIL_TEXT'    => $detail,  
    "IBLOCK_ID"      => 8,
    "PROPERTY_VALUES"=> $PROP,
  );
  $el->Add($review);
}
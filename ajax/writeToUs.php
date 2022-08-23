<?
define('NOT_CHECK_PERMISSIONS', true);
define('NO_KEEP_STATISTIC', true);
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
CModule::IncludeModule("iblock");
if(!empty($_REQUEST['name'])&&!empty($_REQUEST['phone'])){
  $el = new CIBlockElement;
  $PROP = array();
  $PROP[23] = $_REQUEST['name'];
  $PROP[24] = $_REQUEST['phone'];
  $PROP[25] = $_REQUEST['text'];
  $feedback = Array(
    'NAME' => date('d.m.Y H:i:s', time()),  
    "IBLOCK_ID"      => 12,
    "PROPERTY_VALUES"=> $PROP,
  );
  $el->Add($feedback);
}
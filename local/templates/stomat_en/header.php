<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
IncludeTemplateLangFile(__FILE__);
use Bitrix\Main\Page\Asset;
?>
<!DOCTYPE html>
<html lang="<?=LANGUAGE_ID?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://api-maps.yandex.ru/2.1/?apikey=26520e5e-687f-4240-b716-f50e525ced83&lang=ru_RU" type="text/javascript"></script>
    <title><?$APPLICATION->ShowTitle();?></title>
    <?
    $APPLICATION->ShowHead();
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/bootstrap.min.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/owl.carousel.min.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/owl.theme.default.min.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/fancybox.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/style.min.css');
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/style-dop.css');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/scripts/jquery.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/scripts/popper.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/scripts/bootstrap.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/scripts/jquery.inputmask.bundle.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/scripts/owl.carousel.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/scripts/fancybox.umd.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/scripts/scroll-lock.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/scripts/jquery-ui.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/scripts/jquery.anyimagecomparisonslider.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/scripts/main.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/scripts/map.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/scripts/jquery.fancybox.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/scripts/jquery.lazy.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/scripts/masonry.pkgd.min.js');
    ?>
</head>
  <body>
  	<?$APPLICATION->ShowPanel()?>
    <?
    $section = $APPLICATION->GetCurDir();
    $sectionRu = substr($section, 4);
    ?>
    <header>
      <div class="container">
        <div class="wrapper"><a class="logo" href="/en/"><img src="<?=SITE_TEMPLATE_PATH?>/img/logo.png"></a>
        	<?$APPLICATION->IncludeComponent("bitrix:menu", "top_menu", Array(
	"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
		"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
		"DELAY" => "N",	// Откладывать выполнение шаблона меню
		"MAX_LEVEL" => "1",	// Уровень вложенности меню
		"MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
			0 => "",
		),
		"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"MENU_CACHE_TYPE" => "N",	// Тип кеширования
		"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
		"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
		"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
	),
	false
);?>
            <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                          "AREA_FILE_RECURSIVE" => "Y",
                          "AREA_FILE_SHOW" => "file",
                          "AREA_FILE_SUFFIX" => "inc",
                          "EDIT_TEMPLATE" => "",
                          "PATH" => "/en/include/header/phone.php"
                        )
                      );?>
          <div class="lang dropdown">
            <button class="dropdown-toggle" data-toggle="dropdown"><?if(substr($section, 1, 2)=='en'):?><img src="<?=SITE_TEMPLATE_PATH?>/img/eng.png"><span>EN</span><?else:?><img src="<?=SITE_TEMPLATE_PATH?>/img/rus.png"><span>RU</span><?endif;?>
              <svg xmlns="http://www.w3.org/2000/svg" width="9" height="6" viewBox="0 0 9 6" fill="none">
                <path d="M4.8916 5.50671C4.69142 5.75887 4.30858 5.75887 4.10839 5.5067L0.380581 0.810877C0.120451 0.483198 0.353807 -8.43297e-07 0.772187 -8.06721e-07L8.22781 -1.54929e-07C8.64619 -1.18354e-07 8.87955 0.483199 8.61942 0.810878L4.8916 5.50671Z" fill="black"></path>
              </svg>
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="/<?=$sectionRu;?>"><img src="<?=SITE_TEMPLATE_PATH?>/img/rus.png"><span>RU</span></a>
              <a class="dropdown-item" href="<?=$section;?>"><img src="<?=SITE_TEMPLATE_PATH?>/img/eng.png"><span>EN</span></a>
            </div>
          </div>
          <div class="menu-icon"><span></span></div>
        </div>
      </div>
    </header>
    <div id="hidden-block"></div>
    <div class="fixed">
      <div class="container">
        <div class="sidebar">
          <ul>
            <li><a <?if($section=='/en/'){echo 'class="active"';}?> href="/en/">
                <svg xmlns="http://www.w3.org/2000/svg" width="41" height="40" viewBox="0 0 41 40" fill="none">
                  <path d="M9.19405 20H5.86072L20.8607 5L35.8607 20H32.5274" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M9.19403 20V31.6667C9.19403 32.5507 9.54522 33.3986 10.1703 34.0237C10.7955 34.6488 11.6433 35 12.5274 35H29.194C30.0781 35 30.9259 34.6488 31.5511 34.0237C32.1762 33.3986 32.5274 32.5507 32.5274 31.6667V20" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M15.8607 35.0001V25.0001C15.8607 24.116 16.2119 23.2682 16.837 22.6431C17.4622 22.0179 18.31 21.6667 19.1941 21.6667H22.5274C23.4114 21.6667 24.2593 22.0179 24.8844 22.6431C25.5095 23.2682 25.8607 24.116 25.8607 25.0001V35.0001" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>Main</a></li>
            <li><a <?if($section=='/en/spetsialisty/'){echo 'class="active"';}?>href="/en/spetsialisty/">
                <svg xmlns="http://www.w3.org/2000/svg" width="41" height="40" viewBox="0 0 41 40" fill="none">
                  <path d="M14.194 13.3334V10.0001C14.194 9.11603 14.5452 8.26818 15.1703 7.64306C15.7955 7.01794 16.6433 6.66675 17.5274 6.66675H24.194C25.0781 6.66675 25.9259 7.01794 26.5511 7.64306C27.1762 8.26818 27.5274 9.11603 27.5274 10.0001V13.3334" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M30.8607 13.3333H10.8607C9.01979 13.3333 7.5274 14.8256 7.5274 16.6666V29.9999C7.5274 31.8409 9.01979 33.3333 10.8607 33.3333H30.8607C32.7017 33.3333 34.1941 31.8409 34.1941 29.9999V16.6666C34.1941 14.8256 32.7017 13.3333 30.8607 13.3333Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M17.5274 23.3333H24.1941" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M20.8607 20V26.6667" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>Doctors</a></li>
            <li><a <?if($section=='/en/uslugi-i-tseny/'){echo 'class="active"';}?>href="/en/uslugi-i-tseny/">
                <svg xmlns="http://www.w3.org/2000/svg" width="41" height="40" viewBox="0 0 41 40" fill="none">
                  <path d="M22.5274 5C22.9694 5 23.3933 5.17559 23.7059 5.48816C24.0184 5.80072 24.194 6.22464 24.194 6.66667V14.225L30.7407 10.4467C31.1235 10.2257 31.5784 10.1658 32.0054 10.2802C32.4323 10.3946 32.7964 10.6739 33.0174 11.0567L34.684 13.9433C34.905 14.3261 34.9649 14.781 34.8505 15.208C34.7361 15.635 34.4568 15.999 34.074 16.22L27.529 20L34.074 23.7817C34.4568 24.0027 34.7361 24.3667 34.8505 24.7937C34.9649 25.2206 34.905 25.6755 34.684 26.0583L33.0174 28.945C32.7964 29.3278 32.4323 29.6071 32.0054 29.7215C31.5784 29.8359 31.1235 29.776 30.7407 29.555L24.194 25.7733V33.3333C24.194 33.7754 24.0184 34.1993 23.7059 34.5118C23.3933 34.8244 22.9694 35 22.5274 35H19.194C18.752 35 18.3281 34.8244 18.0155 34.5118C17.703 34.1993 17.5274 33.7754 17.5274 33.3333V25.7733L10.9807 29.5533C10.5979 29.7743 10.143 29.8342 9.71604 29.7198C9.28909 29.6054 8.92506 29.3261 8.70404 28.9433L7.03737 26.0567C6.81637 25.6739 6.75648 25.219 6.87088 24.792C6.98527 24.365 7.26459 24.001 7.64737 23.78L14.1924 20L7.64737 16.22C7.26459 15.999 6.98527 15.635 6.87088 15.208C6.75648 14.781 6.81637 14.3261 7.03737 13.9433L8.70404 11.0567C8.92506 10.6739 9.28909 10.3946 9.71604 10.2802C10.143 10.1658 10.5979 10.2257 10.9807 10.4467L17.5274 14.225V6.66667C17.5274 6.22464 17.703 5.80072 18.0155 5.48816C18.3281 5.17559 18.752 5 19.194 5H22.5274Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>Services</a></li>
            <li><a <?if($section=='/en/otzyvy/'){echo 'class="active"';}?>href="/en/otzyvy/">
                <svg xmlns="http://www.w3.org/2000/svg" width="41" height="40" viewBox="0 0 41 40" fill="none">
                  <path d="M5.8606 33.3334L8.02726 26.8334C6.15467 24.0638 5.47725 20.7841 6.12096 17.6039C6.76467 14.4237 8.6857 11.5595 11.5269 9.54384C14.368 7.52818 17.936 6.49821 21.5674 6.64545C25.1988 6.79269 28.6465 8.10711 31.2694 10.3443C33.8923 12.5815 35.512 15.5893 35.8274 18.8084C36.1427 22.0274 35.1322 25.2388 32.9837 27.8453C30.8352 30.4518 27.695 32.2761 24.1469 32.979C20.5988 33.6819 16.8843 33.2156 13.6939 31.6667L5.8606 33.3334" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M14.1939 21.6666L19.1939 18.3333L22.5272 21.6666L27.5272 18.3333" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>Reviews</a></li>
            <li><a <?if($section=='/en/kontakty/'){echo 'class="active"';}?>href="/en/kontakty/">
                <svg xmlns="http://www.w3.org/2000/svg" width="41" height="40" viewBox="0 0 41 40" fill="none">
                  <path d="M9.19405 6.66675H15.8607L19.1941 15.0001L15.0274 17.5001C16.8123 21.1193 19.7415 24.0485 23.3607 25.8334L25.8607 21.6667L34.1941 25.0001V31.6667C34.1941 32.5508 33.8429 33.3987 33.2177 34.0238C32.5926 34.6489 31.7448 35.0001 30.8607 35.0001C24.3595 34.605 18.2276 31.8442 13.6221 27.2387C9.01656 22.6332 6.2558 16.5013 5.86072 10.0001C5.86072 9.11603 6.21191 8.26818 6.83703 7.64306C7.46215 7.01794 8.31 6.66675 9.19405 6.66675" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>Contacts</a></li>
          </ul>
        </div>
        <div id="up-arrow">
          <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
            <path d="M14 4.83325V16.2916" stroke="#202020" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M14 4.83325L18.5833 9.41659" stroke="#202020" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M14 4.83325L9.41663 9.41659" stroke="#202020" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M4.83337 23.1667H23.1667" stroke="#202020" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
          </svg>
        </div>
      </div>
    </div>
    <?if($section!=('/en/')):?>
    <?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb", 
	"breadcrumb", 
	array(
		"PATH" => "",
		"SITE_ID" => "s1",
		"START_FROM" => "1",
		"COMPONENT_TEMPLATE" => "breadcrumb"
	),
	false
);?>
<?endif;?>
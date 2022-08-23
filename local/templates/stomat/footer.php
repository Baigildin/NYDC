<?php
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
IncludeTemplateLangFile(__FILE__);
?>
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-12 col-sm-8">
            <div class="item">
            <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                          "AREA_FILE_RECURSIVE" => "Y",
                          "AREA_FILE_SHOW" => "file",
                          "AREA_FILE_SUFFIX" => "inc",
                          "EDIT_TEMPLATE" => "",
                          "PATH" => "/include/main/contacts.php"
                        )
                      );?>
            </div>
          </div>
          <div class="col-lg-2 offset-lg-1 col-sm-4">
            <div class="wrap-item">
              <div class="item">
                <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                          "AREA_FILE_RECURSIVE" => "Y",
                          "AREA_FILE_SHOW" => "file",
                          "AREA_FILE_SUFFIX" => "inc",
                          "EDIT_TEMPLATE" => "",
                          "PATH" => "/include/footer/aboutclinic.php"
                        )
                      );?>
<?$APPLICATION->IncludeComponent("bitrix:menu", "bottom_menu", Array(
  "ALLOW_MULTI_SELECT" => "N",  // Разрешить несколько активных пунктов одновременно
    "CHILD_MENU_TYPE" => "left",  // Тип меню для остальных уровней
    "DELAY" => "N", // Откладывать выполнение шаблона меню
    "MAX_LEVEL" => "1", // Уровень вложенности меню
    "MENU_CACHE_GET_VARS" => "",  // Значимые переменные запроса
    "MENU_CACHE_TIME" => "3600",  // Время кеширования (сек.)
    "MENU_CACHE_TYPE" => "N", // Тип кеширования
    "MENU_CACHE_USE_GROUPS" => "Y", // Учитывать права доступа
    "ROOT_MENU_TYPE" => "bottom", // Тип меню для первого уровня
    "USE_EXT" => "N", // Подключать файлы с именами вида .тип_меню.menu_ext.php
    "COMPONENT_TEMPLATE" => "top_menu"
  ),
  false
);?>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-8">
            <div class="wrap-item">
              <div class="item last">
                <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                          "AREA_FILE_RECURSIVE" => "Y",
                          "AREA_FILE_SHOW" => "file",
                          "AREA_FILE_SUFFIX" => "inc",
                          "EDIT_TEMPLATE" => "",
                          "PATH" => "/include/footer/services.php"
                        )
                      );?>
                <div>
                <?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"services_menu", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "services",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "services",
		"USE_EXT" => "Y",
		"COMPONENT_TEMPLATE" => "services_menu"
	),
	false
);?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                          "AREA_FILE_RECURSIVE" => "Y",
                          "AREA_FILE_SHOW" => "file",
                          "AREA_FILE_SUFFIX" => "inc",
                          "EDIT_TEMPLATE" => "",
                          "PATH" => "/include/footer/consult.php"
                        )
                      );?>
          </div>
        </div>
      </div>
      <div class="last-stage">
        <div class="container">
          <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                          "AREA_FILE_RECURSIVE" => "Y",
                          "AREA_FILE_SHOW" => "file",
                          "AREA_FILE_SUFFIX" => "inc",
                          "EDIT_TEMPLATE" => "",
                          "PATH" => "/include/footer/copyright.php"
                        )
                      );?>
          <ul>
          <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                          "AREA_FILE_RECURSIVE" => "Y",
                          "AREA_FILE_SHOW" => "file",
                          "AREA_FILE_SUFFIX" => "inc",
                          "EDIT_TEMPLATE" => "",
                          "PATH" => "/include/footer/socialnetworks.php"
                        )
                      );?>
          </ul>
        </div>
      </div>
    </footer>
    <div class="mobile-menu">
      <div class="container">
      <?$APPLICATION->IncludeComponent("bitrix:menu", "top_menu", Array(
        "ALLOW_MULTI_SELECT" => "N",  // Разрешить несколько активных пунктов одновременно
          "CHILD_MENU_TYPE" => "left",  // Тип меню для остальных уровней
          "DELAY" => "N", // Откладывать выполнение шаблона меню
          "MAX_LEVEL" => "1", // Уровень вложенности меню
          "MENU_CACHE_GET_VARS" => array( // Значимые переменные запроса
            0 => "",
          ),
          "MENU_CACHE_TIME" => "3600",  // Время кеширования (сек.)
          "MENU_CACHE_TYPE" => "N", // Тип кеширования
          "MENU_CACHE_USE_GROUPS" => "Y", // Учитывать права доступа
          "ROOT_MENU_TYPE" => "top",  // Тип меню для первого уровня
          "USE_EXT" => "N", // Подключать файлы с именами вида .тип_меню.menu_ext.php
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
                          "PATH" => "/include/header/phone_mobile.php"
                        )
                      );?>
      </div>
    </div>
  </body>
</html>
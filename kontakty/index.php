<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>
    <div class="contacts-wrapper">
      <div class="container">
        <h1>Контактная информация</h1>
        <div class="row pl">
          <div class="col-xl-11 col-lg-10">
            <div class="row">
              <div class="col-xl-5 col-md-6">
                <div class="item">
                <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                              "AREA_FILE_RECURSIVE" => "Y",
                              "AREA_FILE_SHOW" => "file",
                              "AREA_FILE_SUFFIX" => "inc",
                              "EDIT_TEMPLATE" => "",
                              "PATH" => "/include/kontakty/address.php"
                            )
                          );?>
                </div>
              </div>
              <div class="col-xl-4 col-md-6">
                <div class="item">
                <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                              "AREA_FILE_RECURSIVE" => "Y",
                              "AREA_FILE_SHOW" => "file",
                              "AREA_FILE_SUFFIX" => "inc",
                              "EDIT_TEMPLATE" => "",
                              "PATH" => "/include/kontakty/workingMode.php"
                            )
                          );?>
                </div>
              </div>
              <div class="col-xl-3">
                <div class="item">
                <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                              "AREA_FILE_RECURSIVE" => "Y",
                              "AREA_FILE_SHOW" => "file",
                              "AREA_FILE_SUFFIX" => "inc",
                              "EDIT_TEMPLATE" => "",
                              "PATH" => "/include/kontakty/socialService.php"
                            )
                          );?>
                </div>
              </div>
              <div class="col-xl-5 col-md-6">
                <div class="item">
                <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                              "AREA_FILE_RECURSIVE" => "Y",
                              "AREA_FILE_SHOW" => "file",
                              "AREA_FILE_SUFFIX" => "inc",
                              "EDIT_TEMPLATE" => "",
                              "PATH" => "/include/kontakty/phone.php"
                            )
                          );?>
                </div>
              </div>
              <div class="col-xl-4 col-md-6">
                <div class="item">
                <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                              "AREA_FILE_RECURSIVE" => "Y",
                              "AREA_FILE_SHOW" => "file",
                              "AREA_FILE_SUFFIX" => "inc",
                              "EDIT_TEMPLATE" => "",
                              "PATH" => "/include/kontakty/email.php"
                            )
                          );?>
                </div>
              </div>
            </div>
            <div id="map">
                <script>
                    ymaps.ready(init);
                    function init(){
                        var myMap = new ymaps.Map("map", {
                                center: [55.723815, 37.570968],
                                zoom: 17,
                                controls: [],
                                suppressMapOpenBlock: true
                            },
                            {suppressMapOpenBlock: true});

                        // $(window).resize(function(){
                        //         myMap.container.fitToViewport();
                        // });

                        myPlacemarkWithContent = new ymaps.Placemark([55.723815, 37.570968], {
                            hintContent: 'New York Dental Center',
                            balloonContent: 'New York Dental Center',
                        }, {
                            // Тип макета.
                            iconLayout: 'default#imageWithContent',
                            // Своё изображение иконки метки.
                            iconImageHref: '/local/templates/stomat/img/зуб_черн.png',
                            // Размеры метки.
                            iconImageSize: [104, 92],
                            iconImageOffset: [-40, -40],
                        });

                        myMap.controls.add('zoomControl');
                        myMap.controls.add('rulerControl', {
                            // Отключим отображение масштабного отрезка рядом с линейкой.
                            // Подробнее о настройке опций.
                            scaleLine: false
                        });

                        myMap.behaviors.disable('scrollZoom');
                        myMap.geoObjects.add(myPlacemarkWithContent);
                        $(window).resize(function(){
                            myMap.container.fitToViewport();
                            if($(window).width() < 1024)
                            {
                                myMap.behaviors.disable('drag');
                            }
                            else {
                                myMap.behaviors.enable('drag');
                            }
                            if($(window).width() < 500){
                                myMap.setCenter([55.723815, 37.570968],17,"map");
                            }
                            else{
                                myMap.setCenter([55.723815, 37.570968],17,"map");
                            }
                        });
                        window.onload = function () {
                            if($(window).width() < 500){
                                myMap.setCenter([55.723815, 37.570968],17,"map");
                            }
                            else{
                                myMap.setCenter([55.723815, 37.570968],17,"map");
                            }
                        };
                    }
            </script>
            </div>
                <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                              "AREA_FILE_RECURSIVE" => "Y",
                              "AREA_FILE_SHOW" => "file",
                              "AREA_FILE_SUFFIX" => "inc",
                              "EDIT_TEMPLATE" => "",
                              "PATH" => "/include/kontakty/howToGet.php"
                            )
                          );?>
            <div class="requisites">
                              <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                              "AREA_FILE_RECURSIVE" => "Y",
                              "AREA_FILE_SHOW" => "file",
                              "AREA_FILE_SUFFIX" => "inc",
                              "EDIT_TEMPLATE" => "",
                              "PATH" => "/include/kontakty/requisitesTitle.php"
                            )
                          );?>
              <div class="row">
                <div class="col-md-5">
                  <div class="item">
                <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                              "AREA_FILE_RECURSIVE" => "Y",
                              "AREA_FILE_SHOW" => "file",
                              "AREA_FILE_SUFFIX" => "inc",
                              "EDIT_TEMPLATE" => "",
                              "PATH" => "/include/kontakty/requisites1.php"
                            )
                          );?>
                  </div>
                </div>
                <div class="col-md-7">
                  <div class="item">
                <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                              "AREA_FILE_RECURSIVE" => "Y",
                              "AREA_FILE_SHOW" => "file",
                              "AREA_FILE_SUFFIX" => "inc",
                              "EDIT_TEMPLATE" => "",
                              "PATH" => "/include/kontakty/requisites2.php"
                            )
                          );?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
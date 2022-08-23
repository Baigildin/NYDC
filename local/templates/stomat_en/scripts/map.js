if($('#map').length > 0){
    ymaps.ready(init);
}

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
        hintContent: ''
    }, {
        // Тип макета.
        //iconLayout: 'default#imageWithContent',
        // Своё изображение иконки метки.
        //iconImageHref: 'img/pin-map.svg',
        // Размеры метки.
        //iconImageSize: [54, 77],
        //iconImageOffset: [-7, -40]
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
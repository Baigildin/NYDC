$(document).ready(function () {
    $(" input[name=phone] ").inputmask("+7 (999) 999-99-99");

    $('.main-slider').owlCarousel({
        items: 1,
        margin: 10,
        nav: true,
        dots: true,
        loop: false,
        navText: ["<img src='/local/templates/stomat/img/arrow-prev.svg'>","<img src='/local/templates/stomat/img/arrow-next.svg'>"],
    });
    $('.specialists-slider').owlCarousel({
        items: 3,
        margin: 25,
        nav: true,
        dots: false,
        loop: false,
        navText: ["<img src='/local/templates/stomat/img/arrow-prev.svg'>","<img src='/local/templates/stomat/img/arrow-next.svg'>"],
        responsive:{
            0:{
                items:1,
                dots: true,
            },
            760:{
                items:2
            },
            990:{
                items:2
            },
            1200:{
                items:3
            }
        }
    });
    $('.news-slider').owlCarousel({
        items: 3,
        margin: 25,
        nav: true,
        dots: false,
        loop: false,
        navText: ["<img src='/local/templates/stomat/img/arrow-prev.svg'>","<img src='/local/templates/stomat/img/arrow-next.svg'>"],
        responsive:{
            0:{
                items:1,
                dots: true,
            },
            760:{
                items:2
            },
            990:{
                items:2
            },
            1200:{
                items:3
            }
        }
    });
    $('.reviews-slider').owlCarousel({
        items: 2,
        margin: 30,
        nav: true,
        dots: false,
        loop: false,
        navText: ["<img src='/local/templates/stomat/img/arrow-prev.svg'>","<img src='/local/templates/stomat/img/arrow-next.svg'>"],
        responsive:{
            0:{
                items:1,
                dots: true,
            },
            760:{
                items:2
            },
            990:{
                items:2
            },
            1200:{
                items:2
            }
        }
    });
    $('.gallery-slider').owlCarousel({
        items: 3,
        margin: 15,
        nav: true,
        dots: false,
        loop: false,
        navText: ["<img src='/local/templates/stomat/img/arrow-prev.svg'>","<img src='/local/templates/stomat/img/arrow-next.svg'>"],
        responsive:{
            0:{
                items:1,
                dots: true,
            },
            760:{
                items:2
            },
            990:{
                items:2
            },
            1200:{
                items:3
            }
        }
    });
    $('.examples-slider').owlCarousel({
        items: 3,
        margin: 25,
        nav: true,
        dots: false,
        loop: false,
        navText: ["<img src='/local/templates/stomat/img/arrow-prev.svg'>","<img src='/local/templates/stomat/img/arrow-next.svg'>"],
        responsive:{
            0:{
                items:1,
                touchDrag  : false,
                mouseDrag  : false
            },
            760:{
                items:2,
                touchDrag  : false,
                mouseDrag  : false
            },
            990:{
                items:2,
                touchDrag  : false,
                mouseDrag  : false
            },
            1050:{
                items:2,
                touchDrag  : false,
                mouseDrag  : false
            },
            1200:{
                items:3
            }
        }
    });

    $('.diplom-slider').owlCarousel({
        items: 3,
        margin: 25,
        nav: true,
        dots: false,
        loop: false,
        navText: ["<img src='/local/templates/stomat/img/arrow-prev.svg'>","<img src='/local/templates/stomat/img/arrow-next.svg'>"],
        responsive:{
            0:{
                items:1,
                margin: 0,
                dots: true,
            },
            760:{
                items:2,
                margin: 0,
                dots: true,
            },
            990:{
                items:3,
                margin: 25,
                dots: false,
            }
        }
    });

    $('.sliderBA').anyImageComparisonSlider({
        initialPosition: 0.5,
        cursor: 'none',
    });


    // var mySlider = new AnyImageComparisonSlider(document.querySelector('.sliderBA'),{
    //     orientation: 'horizontal',
    //     initialPosition: 0.5,
    //     cursor: 'none',
    // });


    //$('.sliderBA').anyImageComparisonSlider();

    $(".menu-icon").on("click", function () {
        if($(".mobile-filter").hasClass("active")){
            $(".filter-doctor").toggleClass('visible');
            $(".mobile-filter").toggleClass("active");
            $(".menu-icon").toggleClass("active");
            $("#up-arrow").toggleClass("disabled");
            $('#hidden-block').toggleClass('hidden-active');
        }else{
            $(".menu-icon").toggleClass("active");
            $(".mobile-menu").toggleClass('visible');
            $('#hidden-block').toggleClass('hidden-active');
        }
        if($(this).hasClass("active")){
            scrollLock.disablePageScroll();
        }else{
            scrollLock.enablePageScroll();
        }
    });

    $("#hidden-block").on("click", function () {
        if($(".mobile-filter").hasClass("active")){
            $(".filter-doctor").toggleClass('visible');
            $(".mobile-filter").toggleClass("active");
            $(".menu-icon").toggleClass("active");
            $("#up-arrow").toggleClass("disabled");
            $('#hidden-block').toggleClass('hidden-active');
        }else{
            $(".menu-icon").toggleClass("active");
            $(".mobile-menu").toggleClass('visible');
            $('#hidden-block').toggleClass('hidden-active');
        }
        if($(this).hasClass("hidden-active")){
            scrollLock.disablePageScroll();
        }else{
            scrollLock.enablePageScroll();
        }
    });

    $(".mobile-filter").on("click", function () {
        $(".filter-doctor").toggleClass('visible');
        $(".mobile-filter").toggleClass("active");
        $(".menu-icon").toggleClass("active");
        $("#up-arrow").toggleClass("disabled");
        $('#hidden-block').toggleClass('hidden-active');
        if($(this).hasClass("active")){
            scrollLock.disablePageScroll();
        }else{
            scrollLock.enablePageScroll();
        }
    });


    $(document).on("click", ".filter-doctor.visible .body-filter ul li button", function () {
        $(".filter-doctor").toggleClass('visible');
        $(".mobile-filter").toggleClass("active");
        $(".menu-icon").toggleClass("active");
        $("#up-arrow").toggleClass("disabled");
        $('#hidden-block').toggleClass('hidden-active');
        scrollLock.enablePageScroll();
    });



    $("#up-arrow").click(function() {
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });


    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.display === "none") {
                content.style.display = "block";
            } else {
                content.style.display = "none";
            }
        });
    };

    $(document).on("click", ".news-wrapper .item button", function () {
        $(this).closest('.item').find('.text').toggleClass('active');
        if($(this).hasClass('active')){
            $(this).removeClass('active');
            $(this).html('Читать далее');
        }else{
            $(this).addClass('active');
            $(this).html('Свернуть');
        }
    });

    $(document).on("click", ".reviews-doctor .item .description button", function () {
        $(this).closest('.item').find('.text').toggleClass('active');
        if($(this).hasClass('active')){
            $(this).removeClass('active');
            $(this).html('Читать далее');
        }else{
            $(this).addClass('active');
            $(this).html('Свернуть');
        }
    });

    $("form input[type=file]").change(function(){
        var filename = $(this).val().replace(/.*\\/, "");
        $(this).closest(' form ').find('.files label span').text(filename);
    });

    $('.select-box__current').on('click',function(){
        $(this).toggleClass('active');
    });
    // $(document).mouseup(function (e) {
    //     var container = $(".select-box__current");
    //     if (container.has(e.target).length === 0){
    //         container.toggleClass('active');
    //     }
    // });
    $('.grid').masonry({
        itemSelector: '.grid-item',
        columnWidth: '.grid-sizer',
        percentPosition: true
    });

});
$(document).on("scroll", window, function () {
    if ($(window).scrollTop() > 300)
    {
        $("#up-arrow").addClass('active');
    }
    else
    {
        $("#up-arrow").removeClass('active');
    }
});
$(document).on('click', 'a.ani[href^="#"]', function(event){
    event.preventDefault();
    $('html, body').animate({
        scrollTop: $( $.attr(this, 'href') ).offset().top -200
    }, 700);
});

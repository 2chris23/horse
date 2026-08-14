$(window).scroll(function () {
    if ($(window).scrollTop() > 30) {
        $("#logo").addClass("shrink")
    } else {
        $("#logo").removeClass("shrink")
    }
});
var filtered = false,posX=0,posY=0;
function ImageExist(url) {
    var img = new Image();
    img.src = url;
    return img.height != 0;
}

function cargarimagenes() {
    $(function () {
        $.each(document.images, function () {
            var this_image = this;
            var src = $(this_image).attr('src') || '';
            if (!src.length > 0) {
                var lsrc = $(this_image).attr('lsrc') || '';
                if (lsrc.length > 0) {
                    var img = new Image();
                    img.src = lsrc;
                    /*if(ImageExist(lsrc) === true){*/
                    $(img).load(function () {
                        this_image.src = this.src;
                    });
                    /*}*/
                }
            }
        });
    });
}


$(document).ready(function () {
    cargarimagenes();
    $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,

        fixedContentPos: false
    });

    $('.popup-img').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        }
    });
    /*
    if (screenX <= 768) {
        $("#logo").addClass("shrink")
    }
    */
    $(".hola1").animate({left: '250px'});




    /*
        $('.gal-fotos').slick({
            slidesToShow: 4,
            rows: 2,
            slidesToScroll: 1,
            //autoplay: true,
            //autoplaySpeed: 3000,
        });*/
    $('.gal-fotos').magnificPopup({
        delegate: 'div',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
            titleSrc: function (item) {
                return item.el.attr('title');
            }
        }
    });


    /***********************************/
    /*$(window).on('load', function () {
        var $notes = $(".grid").isotope({
            itemSelector: ".grid-item"
        });

        // On filter button click
        $(".filters-button-group .button").on("click", function (e) {
            var $this = $(this);

            // Prevent default behaviour
            e.preventDefault();

            // Toggle the active class on the correct button
            $(".filters-button-group .button").removeClass("is-checked");
            $this.addClass("is-checked");

            // Get the filter data attribute from the button
            $notes.isotope({
                filter: $this.attr("data-filter")
            });

        });

    })*/
    /***********************************/
    /*
        $('.grid').slick({
            dots: false,
            lazyLoad: 'ondemand',
            slidesToShow: 3,
            slidesToScroll: 3,
            //autoplay: true,
            prevArrow: '<button type="button" data-role="none" class="slick-prev"tabindex="0" role="button"></button>',
            nextArrow: '<button type="button" data-role="none" class="slick-next" tabindex="0" role="button"></button>',

            //appendArrows: '.dotss',
            autoplaySpeed: 5000,
    /*
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 6,
                        slidesToScroll: 6,
                        infinite: true,
                    }
                },
                {
                    breakpoint: 760,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 4,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]

        }).removeClass('hidden');
        */


});





$('.mas').on('click', function () {
    $('p.mov').removeClass('hidden');
    $('.menos').removeClass('hidden');
    $(this).addClass('hidden');
});

$('.menos').on('click', function () {
    $('p.mov').addClass('hidden');
    $('.mas').removeClass('hidden');
    $(this).addClass('hidden');
});


$(".filtros .button").on("click", function (e) {
    //filtrado
    var c = $(this).attr('data-filter');
    filtrado(c);
});
/*
$(function () {
    // Initialize Isotope
    var $notes = $(".grid").isotope({
        itemSelector: ".grid-item"
    });

    // On filter button click
    $(".filtros .button").on("click", function (e) {
        var $this = $(this);

        // Prevent default behaviour
        e.preventDefault();

        // Toggle the active class on the correct button
        $(".filtros .button").removeClass("is-checked");
        $this.addClass("is-checked");

        // Get the filter data attribute from the button
        $notes.isotope({
            filter: $this.attr("data-filter")
        });

    });
});
*/
/*

$(window).scroll(function () {
    if ($(window).scrollTop() > 30) {
        $("#logo").addClass("shrink")
    } else {
        if (screenX <= 768) {
            $("#logo").addClass("shrink")
        } else {
            $("#logo").removeClass("shrink")
        }
    }
});
*/
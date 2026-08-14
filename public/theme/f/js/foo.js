
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

 function reloade(url) {
    window.location.href = url;
}
$(document).ready(function () {
    cargarimagenes();
    $('.slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 6000,
    });
    $('.carousel-inner').slick({
        /*dots: false,
        lazyLoad: 'ondemand',
        */
        slidesToShow: 6,
        slidesToScroll: 6,
        autoplay: true,
        autoplaySpeed: 6000,
        infinite: true,
        arrows: true,

        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 6,
                    slidesToScroll: 6,

                }
            },
            {
                breakpoint: 760,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    }).removeClass('hidden').slickAnimation();
    $(window).on('load', function () {
        notes = $(".grids").removeClass('hidden').isotope({
            itemSelector: ".grids-item",

            sortBy: 'random',
            resizable: true,
        });
    });

    $('.c-videos').slick({
        /*dots: false,
        lazyLoad: 'ondemand',
        */
        slidesToShow: 6,
        slidesToScroll: 6,
        autoplay: true,
        autoplaySpeed: 6000,
        infinite: true,
        arrows: true,

        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 6,
                    slidesToScroll: 6,

                }
            },
            {
                breakpoint: 760,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    }).removeClass('hidden').slickAnimation();
    
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

    $('.popup').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        }
    });
    $('.slider .slick-next').addClass('hidden');
});


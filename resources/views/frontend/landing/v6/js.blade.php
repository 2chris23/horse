<?php if(!empty($stud)): ?>
    <?php if(empty($stud)): ?>
        <script>
            <?php endif; ?>
                    <?php 
                        $paistrabajo = \Session::get('pais_id');
                        $paistrabajo = (!empty($paistrabajo))?$paistrabajo:0;
                     ?>
                window.pai = <?php echo $paistrabajo; ?>;
            window.edo = 0;

            function getPrice(v, d) {
                $(v).html('').append(d.precio + " <span class=\"coinl \">" + d.moneda + "</span>");
            };

            function getCubri(v, d) {
                $(v).html('').append(d.cubri + " <span class=\"coinl \">" + d.moneda + "</span>");
            };

            function tooltipsnew(v, d) {
                var toolconf = {
                    animation: 'fade',
                    delay: 200,
                    theme: 'tooltipster-borderless',
                    trigger: 'hover',
                    content: d,
                    contentAsHTML: true,
                    contentCloning: false
                };
                $(v).tooltipster(toolconf)
            }

            function ObtenerPrecios() {
                var s = $('[data-getprice]');
                var d = new FormData();
                var to = 0;
                $.each(s, function (k, v) {
                    d.append(k, $(v).attr('data-getprice'));
                    to = to + 1;
                });
                if (to != 0) {
                    axios.post("<?php echo route('ObtenerPrecioCaballos'); ?>", d).then(function (data) {
                        var horses = data.data.horses;
                        $.each(horses, function (k, v) {
                            $.each(v, function (a, b) {
                                s = $('[data-getprice="' + b.slug + '"]');
                                getPrice(s, b);
                                if ($('.recent-ads-list-price').val() != undefined) {
                                    getPrice($('.recent-ads-list-price'), b);
                                }
                            });
                        });
                    }).catch(function (error) {
                        console.dir(error);
                    });
                }
                to = 0;
                s = $('[data-getcubri]');
                d = new FormData();
                $.each(s, function (k, v) {
                    d.append(k, $(v).attr('data-getcubri'));
                    to = to + 1;
                });
                if (to != 0) {
                    axios.post("<?php echo route('ObtenerCubricionCaballos'); ?>", d).then(function (data) {
                        var horses = data.data.horses;
                        $.each(horses, function (k, v) {
                            s = $('[data-getcubri="' + v.slug + '"]');
                            getCubri(s, v);
                        });
                    }).catch(function (error) {
                        console.dir(error);
                    });
                }
                to = 0;
                s = $('[data-slugp]');
                var ptool = new FormData();
                $.each(s, function (k, v) {
                    ptool.append(k, $(v).attr('data-slugp'));
                    to = to + 1;
                });
                if (to != 0) {
                    axios.post("<?php echo route('ObtenerPreciosCaballos'); ?>", ptool).then(function (data) {
                        var horses = data.data.horses;
                        $.each(horses, function (k, v) {
                            $.each(v, function (a, b) {
                                s = $('[data-slugp="' + b.slug + '"]');
                                $(s).tooltipster({
                                    animation: 'fade',
                                    delay: 200,
                                    theme: 'tooltipster-borderless',
                                    trigger: 'hover',
                                    content: b.precio,
                                    multiple: true,
                                    contentAsHTML: true,
                                    contentCloning: false
                                });
                            });
                        });
                    }).catch(function (error) {
                        console.dir(error);
                    });
                }
                to = 0;
                var sa = $('[data-slugc]');
                var ctool = new FormData();
                $.each(sa, function (k, v) {
                    ctool.append(k, $(v).attr('data-slugc'));
                    to = to + 1;
                });
                if (to == 0) {
                    axios.post("<?php echo route('ObtenerCubricionesCaballos'); ?>", ctool).then(function (data) {
                        var horses = data.data.horses;
                        $.each(horses, function (k, v) {
                            s = $('[data-slugc="' + v.slug + '"]');
                            /*tooltipsnew(s, v.precio);*/
                            $(s).tooltipster({
                                animation: 'fade',
                                delay: 200,
                                theme: 'tooltipster-borderless',
                                trigger: 'hover',
                                content: v.tool,
                                multiple: true,
                                contentAsHTML: true,
                                contentCloning: false
                            });
                        });
                    }).catch(function (error) {
                        console.dir(error);
                    });
                }
            }

            $(".numbers").keypress(function (e) {
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    return false;
                }
            });

            function sociales() {
                var w = $(window).width();
                var h = $(window).height();
                var tsd = $('#parallax').find('.slick-list');
                var tsf = $('#parallax').find('.hola1');
                $(tsd).css('top', '80px');
                
                if (w <= 425) {
                    $("#SocialShare").css('top', 'unset').css('width', 'auto').css('z-index', '5').css('bottom', '1px').css('position', 'fixed')
                        .css('right', 'unset');
                } else {
                    $("#SocialShare").attr('style', ' ');
                }
                
            }

            sociales();

            function changelan(id) {
                var url = '<?php echo route('lengauje'); ?>/' + id;
                console.log(url);
                window.location.replace(url);
            }
            
            /* ---------------------------------------------- /*
             * Preloader
             /* ---------------------------------------------- */
            (function () {
                $(window).on('load', function () {
                    ObtenerPrecios();
                    $('.loader').fadeOut();
                    $('.page-loader').delay(350).fadeOut('slow');
                });
                $(document).ready(function () {

                    var sa = $('[data-urlcubri]');
                    var s = $('[data-urlmoneda]');

                    $.each(s, function (k, v) {
                        var t = $(v).attr('data-urlmoneda');
                        $.ajax({
                            url: t,
                            headers: {
                                'X-CSRF-TOKEN': token,
                                'csrftoken': token,
                            },
                            contentType: 'JSON',
                            processData: true,
                            async: false,
                            type: 'GET',
                            success: function (data) {
                                var cu = data.cubri;
                                var pr = data.precio;
                                var da = cu + pr;

                                $(v).find('.tooltip_content').html(data.precio);
                                $(v).attr('tittle', data.precio).attr('data-title', data.precio).attr('data-content', data.precio);
                                tooltipsnew(v, data.precio);

                            },
                            error:
                                function (xhr, status, error) {
                                    console.error(xhr);
                                }
                        });
                    });

                    $.each(sa, function (k, v) {
                        var t = $(v).attr('data-urlcubri');
                        $.ajax({
                            url: t,
                            headers: {
                                'X-CSRF-TOKEN': token,
                                'csrftoken': token,
                            },
                            contentType: 'JSON',
                            processData: true,
                            async: false,
                            type: 'GET',
                            success: function (data) {

                                $(v).find('.tooltip_content').html(data.cubri);
                                $(v).attr('tittle', data.cubri).attr('data-title', data.cubri).attr('data-content', data.cubri);
                                tooltipsnew(v, data.cubri);

                            },
                            error:
                                function (xhr, status, error) {
                                    console.error(xhr);
                                }
                        });
                    });

                    $(".numbers").keypress(function (e) {
                        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                            return false;
                        }
                    });

                    /* ---------------------------------------------- /*
                     * WOW Animation When You Scroll
                     /* ---------------------------------------------- */
                    wow = new WOW({
                        mobile: false
                    });
                    wow.init();
                    /* ---------------------------------------------- /*
                     * Scroll top
                     /* ---------------------------------------------- */
                    $(window).scroll(function () {
                        if ($(this).scrollTop() > 100) {
                            $('.scroll-up').fadeIn();
                        } else {
                            $('.scroll-up').fadeOut();
                        }
                    });
                    $('a[href="#totop"]').click(function () {
                        $('html, body').animate({scrollTop: 0}, 'slow');
                        return false;
                    });
                    /* ---------------------------------------------- /*
                     * Initialization General Scripts for all pages
                     /* ---------------------------------------------- */
                    var homeSection = $('.home-section'),
                        navbar = $('.navbar-custom'),
                        navHeight = navbar.height(),
                        worksgrid = $('#works-grid'),
                        width = Math.max($(window).width(), window.innerWidth),
                        mobileTest = false;
                    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                        mobileTest = true;
                    }
                    buildHomeSection(homeSection);
                    navbarAnimation(navbar, homeSection, navHeight);
                    navbarSubmenu(width);
                    hoverDropdown(width, mobileTest);
                    $(window).resize(function () {
                        var width = Math.max($(window).width(), window.innerWidth);
                        buildHomeSection(homeSection);
                        hoverDropdown(width, mobileTest);
                    });
                    $(window).scroll(function () {
                        effectsHomeSection(homeSection, this);
                        navbarAnimation(navbar, homeSection, navHeight);
                    });
                    /* ---------------------------------------------- /*
                     * Set sections backgrounds
                     /* ---------------------------------------------- */
                    var module = $('.home-section, .module, .module-small, .side-image');
                    module.each(function (i) {
                        if ($(this).attr('data-background')) {
                            $(this).css('background-image', 'url(' + $(this).attr('data-background') + ')');
                        }
                    });

                    /* ---------------------------------------------- /*
                     * Home section height
                     /* ---------------------------------------------- */
                    function buildHomeSection(homeSection) {
                        if (homeSection.length > 0) {
                            if (homeSection.hasClass('home-full-height')) {
                                homeSection.height($(window).height());
                            } else {
                                homeSection.height($(window).height() * 0.85);
                            }
                        }
                    }

                    /* ---------------------------------------------- /*
                     * Home section effects
                     /* ---------------------------------------------- */
                    function effectsHomeSection(homeSection, scrollTopp) {
                        if (homeSection.length > 0) {
                            var homeSHeight = homeSection.height();
                            var topScroll = $(document).scrollTop();
                            if ((homeSection.hasClass('home-parallax')) && ($(scrollTopp).scrollTop() <= homeSHeight)) {
                                homeSection.css('top', (topScroll * 0.55));
                            }
                            if (homeSection.hasClass('home-fade') && ($(scrollTopp).scrollTop() <= homeSHeight)) {
                                var caption = $('.caption-content');
                                caption.css('opacity', (1 - topScroll / homeSection.height() * 1));
                            }
                        }
                    }

                    /* ---------------------------------------------- /*
                     * Intro slider setup
                     /* ---------------------------------------------- */
                    if ($('.hero-slider').length > 0) {
                        $('.hero-slider').flexslider({
                            animation: "fade",
                            animationSpeed: 1000,
                            animationLoop: true,
                            prevText: '',
                            nextText: '',
                            before: function (slider) {
                                $('.titan-caption').fadeOut().animate({top: '-80px'}, {
                                    queue: false,
                                    easing: 'swing',
                                    duration: 700
                                });
                                slider.slides.eq(slider.currentSlide).delay(500);
                                slider.slides.eq(slider.animatingTo).delay(500);
                            },
                            after: function (slider) {
                                $('.titan-caption').fadeIn().animate({top: '0'}, {
                                    queue: false,
                                    easing: 'swing',
                                    duration: 700
                                });
                            },
                            useCSS: true
                        });
                    }
                    /* ---------------------------------------------- /*
                     * Rotate
                     /* ---------------------------------------------- */
                    $(".rotate").textrotator({
                        animation: "dissolve",
                        separator: "|",
                        speed: 3000
                    });

                    /* ---------------------------------------------- /*
                     * Transparent navbar animation
                     /* ---------------------------------------------- */
                    function navbarAnimation(navbar, homeSection, navHeight) {
                        var topScroll = $(window).scrollTop();
                        if (navbar.length > 0 && homeSection.length > 0) {
                            if (topScroll >= navHeight) {
                                navbar.removeClass('navbar-transparent');
                            } else {
                                navbar.addClass('navbar-transparent');
                            }
                        }
                    }

                    /* ---------------------------------------------- /*
                     * Navbar submenu
                     /* ---------------------------------------------- */
                    function navbarSubmenu(width) {
                        if (width > 767) {
                            $('.navbar-custom .navbar-nav > li.dropdown').hover(function () {
                                var MenuLeftOffset = $('.dropdown-menu', $(this)).offset().left;
                                var Menu1LevelWidth = $('.dropdown-menu', $(this)).width();
                                if (width - MenuLeftOffset < Menu1LevelWidth * 2) {
                                    $(this).children('.dropdown-menu').addClass('leftauto');
                                } else {
                                    $(this).children('.dropdown-menu').removeClass('leftauto');
                                }
                                if ($('.dropdown', $(this)).length > 0) {
                                    var Menu2LevelWidth = $('.dropdown-menu', $(this)).width();
                                    if (width - MenuLeftOffset - Menu1LevelWidth < Menu2LevelWidth) {
                                        $(this).children('.dropdown-menu').addClass('left-side');
                                    } else {
                                        $(this).children('.dropdown-menu').removeClass('left-side');
                                    }
                                }
                            });
                        }
                    }

                    /* ---------------------------------------------- /*
                     * Navbar hover dropdown on desctop
                     /* ---------------------------------------------- */
                    function hoverDropdown(width, mobileTest) {
                        if ((width > 767) && (mobileTest !== true)) {
                            $('.navbar-custom .navbar-nav > li.dropdown, .navbar-custom li.dropdown > ul > li.dropdown').removeClass('open');
                            var delay = 0;
                            var setTimeoutConst;
                            $('.navbar-custom .navbar-nav > li.dropdown, .navbar-custom li.dropdown > ul > li.dropdown').hover(function () {
                                    var $this = $(this);
                                    setTimeoutConst = setTimeout(function () {
                                        $this.addClass('open');
                                        $this.find('.dropdown-toggle').addClass('disabled');
                                    }, delay);
                                },
                                function () {
                                    clearTimeout(setTimeoutConst);
                                    $(this).removeClass('open');
                                    $(this).find('.dropdown-toggle').removeClass('disabled');
                                });
                        } else {
                            $('.navbar-custom .navbar-nav > li.dropdown, .navbar-custom li.dropdown > ul > li.dropdown').unbind('mouseenter mouseleave');
                            $('.navbar-custom [data-toggle=dropdown]').not('.binded').addClass('binded').on('click', function (event) {
                                event.preventDefault();
                                event.stopPropagation();
                                $(this).parent().siblings().removeClass('open');
                                $(this).parent().siblings().find('[data-toggle=dropdown]').parent().removeClass('open');
                                $(this).parent().toggleClass('open');
                            });
                        }
                    }

                    /* ---------------------------------------------- /*
                     * Navbar collapse on click
                     /* ---------------------------------------------- */
                    $(document).on('click', '.navbar-collapse.in', function (e) {
                        if ($(e.target).is('a') && $(e.target).attr('class') != 'dropdown-toggle') {
                            $(this).collapse('hide');
                        }
                    });
                    /* ---------------------------------------------- /*
                     * Video popup, Gallery
                     /* ---------------------------------------------- */
                    $('.video-pop-up').magnificPopup({
                        type: 'iframe',
                    });
                    $(".gallery-item").magnificPopup({
                        delegate: 'a',
                        type: 'image',
                        gallery: {
                            enabled: true,
                            navigateByImgClick: true,
                            preload: [0, 1]
                        },
                        image: {
                            titleSrc: 'title',
                            tError: 'The image could not be loaded.'
                        }
                    });
                    $('.fotog').magnificPopup({
                        type: 'image',

                        gallery: {
                            enabled: true,

                            navigateByImgClick: true,
                            preload: [0, 1]
                        },
                        /*mainClass: 'mfp-with-zoom',*/
                    });
                    $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
                        disableOn: 700,
                        type: 'iframe',
                        mainClass: 'mfp-fade',
                        removalDelay: 160,
                        preloader: false,

                        fixedContentPos: false
                    });
                    /* ---------------------------------------------- /*
                     * Portfolio
                     /* ---------------------------------------------- */
                    var worksgrid = $('#works-grid'),
                        worksgrid_mode;
                    if (worksgrid.hasClass('works-grid-masonry')) {
                        worksgrid_mode = 'masonry';
                    } else {
                        worksgrid_mode = 'fitRows';
                    }
                    worksgrid.imagesLoaded(function () {
                        worksgrid.isotope({
                            layoutMode: worksgrid_mode,
                            itemSelector: '.work-item'
                        });
                    });
                    /*
                     $(".work-iteml").magnificPopup({
                        delegate: 'a',
                        type: 'image',
                        gallery: {
                            enabled: true,
                            navigateByImgClick: true,
                            preload: [0, 1]
                        },
                        image: {
                            titleSrc: 'title',
                            tError: 'The image could not be loaded.'
                        }
                    });
                     */
                    $('#filters a').click(function () {
                        $('#filters .current').removeClass('current');
                        $(this).addClass('current');
                        var selector = $(this).attr('data-filter');
                        worksgrid.isotope({
                            filter: selector,
                            animationOptions: {
                                duration: 750,
                                easing: 'linear',
                                queue: false
                            }
                        });
                        return false;
                    });
                    /* ---------------------------------------------- /*
                     * Testimonials
                     /* ---------------------------------------------- */
                    if ($('.testimonials-slider').length > 0) {
                        $('.testimonials-slider').flexslider({
                            animation: "slide",
                            smoothHeight: true
                        });
                    }
                    /* ---------------------------------------------- /*
                     * Post Slider
                     /* ---------------------------------------------- */
                    if ($('.post-images-slider').length > 0) {
                        $('.post-images-slider').flexslider({
                            animation: "slide",
                            smoothHeight: true,
                        });
                    }
                    /* ---------------------------------------------- /*
                     * Progress bar animations
                     /* ---------------------------------------------- */
                    $('.progress-bar').each(function (i) {
                        $(this).appear(function () {
                            var percent = $(this).attr('aria-valuenow');
                            $(this).animate({'width': percent + '%'});
                            $(this).find('span').animate({'opacity': 1}, 900);
                            $(this).find('span').countTo({from: 0, to: percent, speed: 900, refreshInterval: 30});
                        });
                    });
                    /* ---------------------------------------------- /*
                     * Funfact Count-up
                     /* ---------------------------------------------- */
                    $('.count-item').each(function (i) {
                        $(this).appear(function () {
                            var number = $(this).find('.count-to').data('countto');
                            $(this).find('.count-to').countTo({from: 0, to: number, speed: 1200, refreshInterval: 30});
                        });
                    });
                    /* ---------------------------------------------- /*
                     * Youtube video background
                     /* ---------------------------------------------- */
                    $(function () {
                        $(".video-player").mb_YTPlayer();
                    });
                    $('#video-play').click(function (event) {
                        event.preventDefault();
                        if ($(this).hasClass('fa-play')) {
                            $('.video-player').playYTP();
                        } else {
                            $('.video-player').pauseYTP();
                        }
                        $(this).toggleClass('fa-play fa-pause');
                        return false;
                    });
                    $('#video-volume').click(function (event) {
                        event.preventDefault();
                        if ($(this).hasClass('fa-volume-off')) {
                            $('.video-player').YTPUnmute();
                        } else {
                            $('.video-player').YTPMute();
                        }
                        $(this).toggleClass('fa-volume-off fa-volume-up');
                        return false;
                    });
                    /* ---------------------------------------------- /*
                     * Owl Carousel
                     /* ---------------------------------------------- */
                    $('.owl-carousel').each(function (i) {
                        
                        if ($(this).data('items') > 0) {
                            items = $(this).data('items');
                        } else {
                            items = 4;
                        }
                        
                        if (($(this).data('pagination') > 0) && ($(this).data('pagination') === true)) {
                            pagination = true;
                        } else {
                            pagination = false;
                        }
                        
                        if (($(this).data('navigation') > 0) && ($(this).data('navigation') === true)) {
                            navigation = true;
                        } else {
                            navigation = false;
                        }
                        
                        $(this).owlCarousel({
                            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                            nav: navigation,
                            dots: pagination,
                            loop: true,
                            dotsSpeed: 400,
                            items: items,
                            navSpeed: 300,
                            autoplay: 2000
                        });
                    });
                    /* ---------------------------------------------- /*
                     * Blog masonry
                     /* ---------------------------------------------- */
                    $('.post-masonry').imagesLoaded(function () {
                        $('.post-masonry').masonry();
                    });
                    /* ---------------------------------------------- /*
                     * Scroll Animation
                     /* ---------------------------------------------- */
                    $('.section-scroll').bind('click', function (e) {
                        var anchor = $(this);
                        $('html, body').stop().animate({
                            scrollTop: $(anchor.attr('href')).offset().top - 50
                        }, 1000);
                        e.preventDefault();
                    });
                    /*===============================================================
                     Working Contact Form
                     ================================================================*/
                    $("#contactForm").submit(function (e) {
                        e.preventDefault();
                        var $ = jQuery;
                        var postData = $(this).serializeArray(),
                            formURL = $(this).attr("action"),
                            $cfResponse = $('#contactFormResponse'),
                            $cfsubmit = $("#cfsubmit"),
                            cfsubmitText = $cfsubmit.text();
                        $cfsubmit.text("Sending...");
                        $.ajax(
                            {
                                url: formURL,
                                type: "POST",
                                data: postData,
                                success: function (data) {
                                    $cfResponse.html(data);
                                    $cfsubmit.text(cfsubmitText);
                                    $('#contactForm input[name=name]').val('');
                                    $('#contactForm input[name=email]').val('');
                                    $('#contactForm textarea[name=message]').val('');
                                },
                                error: function (data) {
                                    alert("Error occurd! Please try again");
                                }
                            });
                        return false;
                    });
                    /*===============================================================
                     Working Request A Call Form
                     ================================================================*/
                    $("#requestACall").submit(function (e) {
                        e.preventDefault();
                        var $ = jQuery;
                        var postData = $(this).serializeArray(),
                            formURL = $(this).attr("action"),
                            $cfResponse = $('#requestFormResponse'),
                            $cfsubmit = $("#racSubmit"),
                            cfsubmitText = $cfsubmit.text();
                        $cfsubmit.text("Sending...");
                        $.ajax(
                            {
                                url: formURL,
                                type: "POST",
                                data: postData,
                                success: function (data) {
                                    $cfResponse.html(data);
                                    $cfsubmit.text(cfsubmitText);
                                    $('#requestACall input[name=name]').val('');
                                    $('#requestACall input[name=subject]').val('');
                                    $('#requestACall textarea[name=phone]').val('');
                                },
                                error: function (data) {
                                    alert("Error occurd! Please try again");
                                }
                            });
                        return false;
                    });
                    /*===============================================================
                     Working Reservation Form
                     ================================================================*/
                    $("#reservationForm").submit(function (e) {
                        e.preventDefault();
                        var $ = jQuery;
                        var postData = $(this).serializeArray(),
                            formURL = $(this).attr("action"),
                            $cfResponse = $('#reservationFormResponse'),
                            $cfsubmit = $("#rfsubmit"),
                            cfsubmitText = $cfsubmit.text();
                        $cfsubmit.text("Sending...");
                        $.ajax(
                            {
                                url: formURL,
                                type: "POST",
                                data: postData,
                                success: function (data) {
                                    $cfResponse.html(data);
                                    $cfsubmit.text(cfsubmitText);
                                    $('#reservationForm input[name=date]').val('');
                                    $('#reservationForm input[name=time]').val('');
                                    $('#reservationForm textarea[name=people]').val('');
                                    $('#reservationForm textarea[name=email]').val('');
                                },
                                error: function (data) {
                                    alert("Error occurd! Please try again");
                                }
                            });
                        return false;
                    });

                    /* ---------------------------------------------- /*
                     * Subscribe form ajax
                     /* ---------------------------------------------- */
                    $('#subscription-form').submit(function (e) {
                        e.preventDefault();
                        var $form = $('#subscription-form');
                        var submit = $('#subscription-form-submit');
                        var ajaxResponse = $('#subscription-response');
                        var email = $('input#semail').val();
                        $.ajax({
                            type: 'POST',
                            url: 'assets/php/subscribe.php',
                            dataType: 'json',
                            data: {
                                email: email
                            },
                            cache: false,
                            beforeSend: function (result) {
                                submit.empty();
                                submit.append('<i class="fa fa-cog fa-spin"></i> Wait...');
                            },
                            success: function (result) {
                                if (result.sendstatus == 1) {
                                    ajaxResponse.html(result.message);
                                    $form.fadeOut(500);
                                } else {
                                    ajaxResponse.html(result.message);
                                }
                            }
                        });
                    });
                    /* ---------------------------------------------- /*
                     * Google Map
                     /* ---------------------------------------------- */
                    if ($("#map").length == 0 || typeof google == 'undefined') return;
                    
                    google.maps.event.addDomListener(window, 'load', init);
                    var mkr = new google.maps.LatLng(<?php echo $stud->getLat(); ?>, <?php echo $stud->getLng(); ?>);
                    var cntr = (mobileTest) ? mkr : new google.maps.LatLng(<?php echo $stud->getLat(); ?>, <?php echo $stud->getLng(); ?>);

                    function init() {
                                
                        var mapOptions = {
                                    
                                    zoom: 11,
                                scrollwheel: false,
                                    
                                    center: cntr,
                                    
                                            
                                    styles: [
                                        {
                                            "featureType": "all",
                                            "elementType": "geometry.fill",
                                            "stylers": [
                                                {
                                                    "visibility": "on"
                                                },
                                                {
                                                    "saturation": "-11"
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "administrative",
                                            "elementType": "geometry.fill",
                                            "stylers": [
                                                {
                                                    "saturation": "22"
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "administrative",
                                            "elementType": "geometry.stroke",
                                            "stylers": [
                                                {
                                                    "saturation": "-58"
                                                },
                                                {
                                                    "color": "#cfcece"
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "administrative",
                                            "elementType": "labels.text",
                                            "stylers": [
                                                {
                                                    "color": "#f8f8f8"
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "administrative",
                                            "elementType": "labels.text.fill",
                                            "stylers": [
                                                {
                                                    "color": "#999999"
                                                },
                                                {
                                                    "visibility": "on"
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "administrative",
                                            "elementType": "labels.text.stroke",
                                            "stylers": [
                                                {
                                                    "visibility": "on"
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "administrative.country",
                                            "elementType": "geometry.fill",
                                            "stylers": [
                                                {
                                                    "color": "#f9f9f9"
                                                },
                                                {
                                                    "visibility": "simplified"
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "landscape",
                                            "elementType": "all",
                                            "stylers": [
                                                {
                                                    "color": "#f2f2f2"
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "landscape",
                                            "elementType": "geometry",
                                            "stylers": [
                                                {
                                                    "saturation": "-19"
                                                },
                                                {
                                                    "lightness": "-2"
                                                },
                                                {
                                                    "visibility": "on"
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "poi",
                                            "elementType": "all",
                                            "stylers": [
                                                {
                                                    "visibility": "off"
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "road",
                                            "elementType": "all",
                                            "stylers": [
                                                {
                                                    "saturation": -100
                                                },
                                                {
                                                    "lightness": 45
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "road.highway",
                                            "elementType": "all",
                                            "stylers": [
                                                {
                                                    "visibility": "simplified"
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "road.arterial",
                                            "elementType": "labels.icon",
                                            "stylers": [
                                                {
                                                    "visibility": "off"
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "transit",
                                            "elementType": "all",
                                            "stylers": [
                                                {
                                                    "visibility": "off"
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "water",
                                            "elementType": "all",
                                            "stylers": [
                                                {
                                                    "color": "#d8e1e5"
                                                },
                                                {
                                                    "visibility": "on"
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "water",
                                            "elementType": "geometry.fill",
                                            "stylers": [
                                                {
                                                    "color": "#dedede"
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "water",
                                            "elementType": "labels.text",
                                            "stylers": [
                                                {
                                                    "color": "#cbcbcb"
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "water",
                                            "elementType": "labels.text.fill",
                                            "stylers": [
                                                {
                                                    "color": "#9c9c9c"
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "water",
                                            "elementType": "labels.text.stroke",
                                            "stylers": [
                                                {
                                                    "visibility": "off"
                                                }
                                            ]
                                        }
                                    ]
                            };
                                
                        var mapElement = document.getElementById('map');
                                
                        var map = new google.maps.Map(mapElement, mapOptions);
                                
                        var image = new google.maps.MarkerImage('<?php echo url('theme/g/images/map-icon.png'); ?>',
                            new google.maps.Size(59, 65),
                            new google.maps.Point(0, 0),
                            new google.maps.Point(24, 42)
                            );
                        var marker = new google.maps.Marker({
                            position: mkr,
                            icon: image,
                            title: '<?php echo $stud->getName(); ?>',
                            infoWindow: {

                                

                                content: '<p><?php echo $stud->getAddress() .", ". $stud->getCity() .", ". $stud->getStateModel()->name.", ".$stud->getCountryModel()->getName(); ?></p>'
                            },
                            map: map,
                        });
                    }
                });
            })(jQuery);
            $(window).on('load', function () {
                sociales();
            }).resize(function () {
                sociales();
            });
            <?php if(empty($stud)): ?>
        </script>
    <?php endif; ?>
<?php endif; ?>
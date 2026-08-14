$(document).ready(function () {
    var APIURL = 'https://yender.com.ve/disnight/panel/';


    /***************** Waypoints ******************/

    $('.wp1').waypoint(function () {
        $('.wp1').addClass('animated fadeInUp');
    }, {
        offset: '75%'
    });
    $('.wp2').waypoint(function () {
        $('.wp2').addClass('animated fadeInUp');
    }, {
        offset: '75%'
    });
    $('.wp3').waypoint(function () {
        $('.wp3').addClass('animated fadeInRight');
    }, {
        offset: '75%'
    });

    /***************** Initiate Flexslider ******************/
    $('.flexslider').flexslider({
        animation: "slide",
        controlNav: false
    });

    /***************** Initiate Fancybox ******************/

    $('.single_image').fancybox({
        padding: 4,
    });

    /***************** Tooltips ******************/
    $('[data-toggle="tooltip"]').tooltip();

    /***************** Nav Transformicon ******************/

    /* When user clicks the Icon */
    $('.nav-toggle').click(function () {
        $(this).toggleClass('active');
        $('.header-nav').toggleClass('open');
        event.preventDefault();
    });
    /* When user clicks a link */
    $('.header-nav li a').click(function () {
        $('.nav-toggle').toggleClass('active');
        $('.header-nav').toggleClass('open');

    });

    /***************** Header BG Scroll ******************/

    /*$(function() {
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();

            if (scroll >= 20) {
                $('section.navigation').addClass('fixed');*/
    $('header').css({
        "border-bottom": "none",
        "padding": "35px 0"
    });
    $('header .member-actions').css({
        "top": "26px",
    });
    $('header .navicon').css({
        "top": "34px",
    });
    /*          } else {
                    $('section.navigation').removeClass('fixed');
                    $('header').css({
                        "border-bottom": "solid 1px rgba(255, 255, 255, 0.2)",
                        "padding": "50px 0"
                    });
                    $('header .member-actions').css({
                        "top": "41px",
                    });
                    $('header .navicon').css({
                        "top": "48px",
                    });
                }
            });
        });*/
    /***************** Smooth Scrolling ******************/

    $(function () {

        $('a[href*=#]:not([href=#])').click(function () {
            if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 2000);
                    return false;
                }
            }
        });

    });
    var w = window.innerWidth / 2;
    var wf = $(".form_login_menu").width() / 2 + 15;
    var wt = w - wf;
    var r = wt.toString() + 'px';
    $('.form_login_menu').css('left', r)/*.css('transform','translateX(-65%)')*/;
    var timeMenuLoginOut = false;
    /*
        $('.loginup').hover( function(){
            clearInterval(timeMenuLoginOut);
            $('.form_login_menu').fadeIn('fast');
        }, function(){
            timeMenuLoginOut = setTimeout(function(){
                $('.form_login_menu').fadeOut();
            },500);
        } );
        */

    $('.loginup').on('click', function () {
        $('.form_login_menu').fadeToggle();
    }).on('hover', function () {
        $('.form_login_menu').fadeToggle();
    });

    $('#formLogin').on('submit', function (e) {
        e.preventDefault();
        if ($('#txEmail').val() == '') {
            $('#txEmail').focus();
            return false;
        }
        if ($('#txPwd').val() == '') {
            $('#txPwd').focus();
            return false;
        }

        $('#formLogin .text-danger').remove();
        $('.toplogin').removeClass('hidden').parent().attr('disabled', 'disabled');
        $.post(APIURL + '/home/login', {'user': $('#txEmail').val(), 'password': $('#txPwd').val()}, function (res) {
            if (res.status) {
                window.location.href = APIURL;
                $('#formLogin').html('<span class="text-success">Redireccionado al panel</span>')
            } else {
                $('#btnLogin').after('<span class="text-danger" style="clear:both;display:block;margin-top:10px;">Usuario o Contraseña incorrectos</span>');
            }
            $('.toplogin').addClass('hidden').parent().removeAttr('disabled');
        }, 'json');
    });

    $('.signup-form').on('submit', function (e) {
        e.preventDefault();
        var formObject = document.getElementsByClassName('signup-form')[0];
        var formLenth = formObject.length - 1;
        for (i = 0; i < formLenth; i++) {
            if (formObject.elements[i].value.trim() == '') {
                formObject.elements[i].style.borderColor = 'red';
                formObject.elements[i].focus();
                return false;
            }
        }
        $('.sign-up-btn > i').removeClass('hide');
        $('.sign-up-btn').attr('disabled', 'disabled');
        $.post(APIURL + '/home/register', $('.signup-form').serialize(), function (res) {
            if (res.status) {
                $('.signup-form').html('<br /><br /><div class="alert alert-success">' + res.msg + '</div>')
            }
            $('.sign-up-btn').removeAttr('disabled');
            $('.sign-up-btn > i').addClass('hide');
        }, 'json');
    });

    $('.genclave-form').on('submit', function (e) {
        e.preventDefault();
        $('.genclave-form .alert').remove();
        if ($('#txtPaswrd').val().trim() == '') {
            $('#txtPaswrd').focus();
            return false;
        }
        if ($('#txtConfPaswrd').val().trim() == '') {
            $('#txtConfPaswrd').focus();
            return false;
        }
        if ($('#txtPaswrd').val() != $('#txtConfPaswrd').val()) {
            $('.genclave-form').prepend('<div class="alert alert-danger">Contraseñas no coinciden.</div>');
            return false;
        }

        $('.sign-up-btn > i').removeClass('hide');
        $('.sign-up-btn').attr('disabled', 'disabled');
        $.post(APIURL + '/home/updPswrd', $('.genclave-form').serialize(), function (res) {
            if (res.status) {
                $('.genclave-form').html('<div class="alert alert-success">' + res.msg + '</div>');
            } else {
                $('.genclave-form').prepend('<div class="alert alert-danger">' + res.msg + '</div>');
            }
            $('.sign-up-btn').removeAttr('disabled');
            $('.sign-up-btn > i').addClass('hide');
        }, 'json');
    });


    $(window).resize(function () {
        var a = $(window).width() / 2;
        var b = $(".form_login_menu").width() / 2 + 15;
        var c = a - b;
        var d = c.toString();
        d = d + 'px';
        $(".form_login_menu").css('left', d);
    });
    /*var w = window.innerWidth/2-$(".form_login_menu").width()/2+15;
    var r = w.toString()+'px !important';
    if(w<=496){
        console.log(r);
        $(".form_login_menu").css('left',r);
        console.log("listo");
    }*/
});
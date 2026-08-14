 <style>
    #bar {
        width: 0%;
        max-width: 100%;
        height: 6px;
        background-color: #F9DC09;
    }

    #progressBar {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        width: 100%;
        background-color: white;
        z-index: 1;
    }

    .fa-play,
    .fa-pause {
        position: absolute;
        bottom: 3px;
        left: 0;
        padding: 20px;
        cursor: pointer;
        font-size: 1.2rem;
        color: rgba(255, 255, 255, 0.6);
        z-index: 100;
    }
    .fa-play:hover,
    .fa-pause:hover {
        color: white;
    }

    .fa-pause {
        display: none;
    }

    .owl-carousel {
        position: relative;
        margin: 0 auto;
        padding: 0;
        border: 0;
        height: 100vh;
        overflow: hidden;
    }
    .owl-carousel .slide {
        position: relative;
        overflow: hidden;
        padding: 0;
        margin: 0;
    }
    .owl-carousel .slide img {
        width: 100%;
    }
    .owl-carousel .slide .video i {
        position: absolute;
        top: 0;
        left: 0;
        padding: 20px;
        cursor: pointer;
        font-size: 3rem;
        color: rgba(255, 255, 255, 0.6);
        z-index: 100;
    }
    .owl-carousel .slide .video i.fa-volume-off {
        display: block;
    }
    .owl-carousel .slide .video i.fa-volume-up {
        display: none;
    }
    .owl-carousel .slide .video i:hover {
        color: white;
    }
    .owl-carousel .slide .video.on i.fa-volume-off {
        display: none;
    }
    .owl-carousel .slide .video.on i.fa-volume-up {
        display: block;
    }
    .owl-carousel .slide .row {
        position: relative;
        max-width: 100%;
        width: 100%;
    }
    .owl-carousel .slide .row .columns {
        padding: 0;
    }
    .owl-carousel .slide .row .columns:first-child {
        width: 97%;
        -moz-transition-property: all;
        -o-transition-property: all;
        -webkit-transition-property: all;
        transition-property: all;
        -moz-transition-duration: 0.3s;
        -o-transition-duration: 0.3s;
        -webkit-transition-duration: 0.3s;
        transition-duration: 0.3s;
        -moz-transition-timing-function: ease-in-out;
        -o-transition-timing-function: ease-in-out;
        -webkit-transition-timing-function: ease-in-out;
        transition-timing-function: ease-in-out;
    }
    .owl-carousel .slide .row .columns:last-child {
        position: absolute;
        top: 0;
        left: 97%;
        overflow: hidden;
        float: none;
        height: 100%;
        padding: 60px;
        background-color: white;
        -moz-transition-property: all;
        -o-transition-property: all;
        -webkit-transition-property: all;
        transition-property: all;
        -moz-transition-duration: 0.3s;
        -o-transition-duration: 0.3s;
        -webkit-transition-duration: 0.3s;
        transition-duration: 0.3s;
        -moz-transition-timing-function: ease-in-out;
        -o-transition-timing-function: ease-in-out;
        -webkit-transition-timing-function: ease-in-out;
        transition-timing-function: ease-in-out;
    }
    .owl-carousel .slide .row .columns:last-child i {
        position: absolute;
        display: block;
        top: 8px;
        left: 8px;
        cursor: pointer;
        padding: 10px;
    }
    .owl-carousel .slide .row .columns:last-child i.fa-times {
        display: none;
    }
    .owl-carousel .slide .row .columns:last-child i.fa-long-arrow-left {
        display: block;
    }
    .owl-carousel .slide.open .row .columns:first-child {
        width: 80%;
    }
    .owl-carousel .slide.open .row .columns:first-child.wrap-video {
        width: 97%;
    }
    .owl-carousel .slide.open .row .columns:last-child {
        width: 40%;
        left: 60%;
    }
    .owl-carousel .slide.open .row .columns:last-child i.fa-times {
        display: block;
    }
    .owl-carousel .slide.open .row .columns:last-child i.fa-long-arrow-left {
        display: none;
    }

    .owl-theme .owl-controls {
        position: absolute;
        left: 45px;
        bottom: 15px;
        text-align: left;
    }

    .owl-theme .owl-controls .owl-page span {
        background-color: white;
    }

    .fluid-width-video-wrapper {
        width: 100%;
        position: relative;
        padding: 0;
    }

    .fluid-width-video-wrapper iframe,
    .fluid-width-video-wrapper object,
    .fluid-width-video-wrapper embed {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

</style>
<?php $image = (isset($image))?$image:null; ?>
<?php $titulo = (isset($titulo))?$titulo:null; ?>
<?php $contenido = (isset($contenido))?$contenido:null; ?>


<div id="owl-example" class="owl-carousel">
    <div class="slide slide-1">
        <div class="row">
            <div class="columns">
                <img src="{!! $image !!}"/>
            </div>
            <div class="columns" data-slide="1">
                <i class="fa fa-times"></i>
                <i class="fa fa-long-arrow-left"></i>
                <h2>{!! $titulo !!}</h2>
                <p>{!! $contenido !!}</p>
            </div>
        </div>
    </div>
    {{--
    <div class="slide slide-2 open">
        <div class="row">
            <div class="columns wrap-video">
                <div class="video fluid-width-video-wrapper" style="padding-top: 56.25%;">
                    <div id="player"></div>
                    <i class="fa fa-volume-off"></i>
                    <i class="fa fa-volume-up"></i>
                </div>
            </div>
            <div class="columns" data-slide="2">
                <i class="fa fa-times"></i>
                <i class="fa fa-long-arrow-left"></i>
                <h2>Métamorphose</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque posuere quis felis et
                    facilisis. Suspendisse a venenatis ipsum. Cras nec libero vel mi blandit imperdiet non eget
                    metus.</p>
            </div>
        </div>
    </div>
    <div class="slide slide-3 open">
        <div class="row">
            <div class="columns">
                <img src="http://lorempixel.com/output/1600/1600/city/4/"/>
            </div>
            <div class="columns" data-slide="3">
                <i class="fa fa-times"></i>
                <i class="fa fa-long-arrow-left"></i>
                <h2>Gabriela Ungureanu</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque posuere quis felis et
                    facilisis. Suspendisse a venenatis ipsum. Cras nec libero vel mi blandit imperdiet non eget
                    metus.</p>
            </div>
        </div>
    </div>
    <div class="slide slide-4 open">
        <div class="row">
            <div class="columns">
                <img src="http://lorempixel.com/output/1600/1600/city/3/"/>
            </div>
            <div class="columns" data-slide="4">
                <i class="fa fa-times"></i>
                <i class="fa fa-long-arrow-left"></i>
                <h2>Alexandre Tharaud</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque posuere quis felis et
                    facilisis. Suspendisse a venenatis ipsum. Cras nec libero vel mi blandit imperdiet non eget
                    metus.</p>
            </div>
        </div>
    </div>
    --}}
</div>

<script>
    var tag = document.createElement('script');
    tag.src = "https://www.youtube.com/player_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    {{-- // 3. This function creates an <iframe> (and YouTube player)
    //    after the API code downloads. --}}
    var player;

    function onYouTubePlayerAPIReady() {
        player = new YT.Player('player', {
            playerVars: {'rel': 0, 'autoplay': 1, 'controls': 0, 'autohide': 1, 'showinfo': 0, 'wmode': 'opaque'},
            videoId: 'QjlFqgRbICY',
            {{-- //suggestedQuality: 'hd720', --}}
            events: {
                'onReady': onPlayerReady
            }
        });
    }

    {{-- // 4. The API will call this function when the video player is ready. --}}
    function onPlayerReady(event) {
        event.target.mute();
        event.target.setPlaybackQuality('hd720');
        {{-- //$(".video").fitVids(); --}}

        $('.video i').on('click', function () {
            if ($('.video').hasClass('on')) {
                event.target.mute();
                $('.video').removeClass('on');
            } else {
                event.target.unMute();
                $('.video').addClass('on');
            }
        });

    };

    function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.BUFFERING) {
            event.target.setPlaybackQuality('hd720');
        }
    };

    $(document).ready(function () {

        var time = 7; {{-- // time in seconds --}}

        var $progressBar,
            $bar,
            $elem,
            isPause,
            tick,
            percentTime;

        {{-- //Init the carousel --}}
        $("#owl-example").owlCarousel({
            items: 1,
            slideSpeed: 500,
            paginationSpeed: 500,
            singleItem: true,
            afterInit: progressBar,
            afterMove: moved,
            startDragging: pauseOnDragging
        });

        {{-- //Init progressBar where elem is $("#owl-demo") --}}
        function progressBar(elem) {

            $elem = elem;
            {{-- // building playing slideshow --}}
            buildButtons();

            $('.columns:last-child').on('click', function () {
                if ($('#owl-example .slide-' + $(this).data('slide')).hasClass('open')) {
                    {{-- //isPause = false; --}}
                    $('#owl-example .slide-' + $(this).data('slide')).removeClass('open');
                } else {
                    {{-- //isPause = true; --}}
                    $('#owl-example .slide-' + $(this).data('slide')).addClass('open');
                }
            });

            $('.fa-pause').on('click', function () {
                isPause = false;
                $(this).fadeOut(0);
                $('.fa-play').fadeIn();
            });

            $('.fa-play').on('click', function () {
                isPause = true;
                $(this).fadeOut(0);
                $('.fa-pause').fadeIn();
            });

            setTimeout(function () {
                $('.slide-1 .columns:last-child').trigger('click');
            }, 1000);

            {{-- //build progress bar elements --}}
            buildProgressBar();
            {{-- //start counting --}}
            start();
        }

        {{-- //create div#progressBar and div#bar then prepend to $("#owl-demo") --}}
        function buildProgressBar() {
            $progressBar = $("<div>", {
                id: "progressBar"
            });
            $bar = $("<div>", {
                id: "bar"
            });
            $progressBar.append($bar).prependTo($elem);
        }

        function buildButtons() {
            $buttonPause = $("<i>", {
                class: "fa fa-pause"
            });
            $buttonPlay = $("<i>", {
                class: "fa fa-play"
            });
            $buttonPause.prependTo($elem);
            $buttonPlay.prependTo($elem);
        }

        function start() {
            {{-- //reset timer --}}
            percentTime = 0;
            isPause = false;
            {{-- //run interval every 0.01 second --}}
            tick = setInterval(interval, 10);
        };

        function interval() {
            if (isPause === false) {
                percentTime += 1 / time;
                $bar.css({
                    width: percentTime + "%"
                });
                {{-- //if percentTime is equal or greater than 100 --}}
                if (percentTime >= 100) {
                    {{-- //slide to next item --}}
                    $elem.trigger('owl.next')
                }
            }
        }

        {{-- //pause while dragging --}}
        function pauseOnDragging() {
            isPause = true;
        }

        {{-- //moved callback --}}
        function moved() {

            if (isPause == false) {
                {{-- //clear interval --}}
                clearTimeout(tick);
                {{-- //start again --}}
                start();
                {{-- //player.pauseVideo(); --}}
            }

        }
{{-- 
        //uncomment this to make pause on mouseover
        // $elem.on('mouseover',function(){
        //   isPause = true;
        //});
        // $elem.on('mouseout',function(){
        //   isPause = false;
        //});
 --}}
    });
</script>
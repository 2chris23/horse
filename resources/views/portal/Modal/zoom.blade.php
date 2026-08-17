<div class="modal fade" id="zooms" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span
                            class="sr-only">Close</span>
                </button>
                {{--<h3 class="modal-title">Comparte</h3>--}}
            </div>
            <div class="modal-body">
                <div class="slideshow-container">
                    <!-- Full-width images with number and caption text -->
                    <?php $ts = 0; ?>
                    <?php $totales = count($horse->getPhotoModel()) +count($horse->getPhotoModel())  ; ?>

                    @foreach($horse->getPhotoModel() as $k=>$v)
                        <?php $ffoto =  $v->getUrl(); ?>
                        <div class="mySlides fade in">
                            <div class="numbertext">{!! $k +1 !!} / {!! $totales !!}</div>
                            <img src="{!! $ffoto !!}"  alt="{!! $horse->getAltText() !!}" style="width:100%">
                            {{--<div class="text">Caption Text</div>--}}
                        </div>
                        <?php $ts = $k+1; ?>
                    @endforeach

                    @foreach($horse->getVideosModel() as $k=>$v)
                        <?php $ssd = $k+$ts; ?>
                        <div class="mySlides fade in embed-responsive embed-responsive-4by3">
                            <div class="numbertext">{!! $ssd  !!} / {!! $totales !!}</div>
                            <iframe class="embed-responsive-item "
                                    src="{!! $v->getEmbedVideoYoutube()!!}"

                                    allowfullscreen>

                            </iframe>
                            {{--


                                    <img src="{!! $v->getYoutubeThumb() !!}" style="width:100%">


                                --}}
                        </div>
                    @endforeach


                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
                {{--
                <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                </div>
                --}}
            </div>
        </div>
    </div>
</div>
<script>
    var slideIndex = 1;

    function plusSlides(n) {
        $.each($('[style^="display"].embed-responsive-4by3'), function (k, v) {
            $(v).css('display','none');
            console.dir(v);
       });
        showSlides(slideIndex += n);

    }

    function currentSlide(n) {
        $.each($('[style^="display"].embed-responsive-4by3'), function (k, v) {
            $(v).css('display','none');
            console.dir(v);
       });
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {

            slides[i].style.display = "none";
        }
        /*
        //var dots = document.getElementsByClassName("dot");
        for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");

        }

        dots[slideIndex-1].className += " active";

        */
        slides[slideIndex - 1].style.display = "block";


    }

    $(window).on('load', function () {
        showSlides(slideIndex);
    });
</script>

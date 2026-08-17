@php
    $razas = $stud->Horses()->select('raza', DB::raw('count(*) as total'))->groupby('raza')->get()->toArray();
      $colores =  $stud->Horses()->select('color', DB::raw('count(*) as total'))->groupby('color')->get()->toArray();
      $colorcoorp = $stud->getColor();
      $lang = \Session::get('lang');
      if (empty($lang)) {
          $lang = 'es';
          \Session::put('lang', $lang);
          \Session::put('applocale', $lang);
      }
      App::setLocale($lang);

      $favicon = url('assets/img/logo1.ico');
      if (!empty($stud)) {
          if (!empty($stud->getFav())) {
              $favicon = $stud->getFavUrl();
          }
      }
       $Coins = \Session::get('moneda');
      $css = null;
      $Coins = empty($Coins)?'USD':$Coins;
      $sexos = Horse::where(['studs_id' => $stud->id])->select('sex', DB::raw('count(*) as total'))->groupby('sex')->get()->toArray();
@endphp
        <!doctype html>
<html lang="{!! $lang !!}">
<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title>{!! trans('Titulos.Trabajo') !!} | {!! $stud->getName() !!}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="">
    @include('meta',
[
'titulo' => $stud->getTituloWeb(),
'descripcion'=>$stud->getSeodescripcion(),
'key'=>$stud->words,
'logo'=>$stud->getLogo(),
'imagenes' =>$stud->getPhotosModel(),
])
    <link rel="icon" type="image/png" href="{!! $stud->getLogo() !!}">

    <!-- Styles -->
    <link rel='stylesheet' href='{!! url('theme/w/css/bootstrap.min.css') !!}'>
    <link rel='stylesheet' href='{!! url('theme/w/css/animate.min.css') !!}'>
    <link rel='stylesheet' href="{!! url('theme/w/css/font-awesome.min.css') !!}"/>
    <link rel="stylesheet" href="{!! url('frontend/working/css/styles.css')!!} ">
    <link rel='stylesheet' href="{!! url('theme/w/css/style.css') !!}"/>
    <link rel="stylesheet" type="text/css" href="{!! url('theme/w/slick/slick.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! url('theme/w/slick/slick-theme.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! url('theme/w/css/horses.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! url('theme/w/social/jssocials.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! url('theme/w/social/jssocials-theme-minima.css') !!}">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:200,300,400,500,600,700,800' rel='stylesheet'
          type='text/css'>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js'"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- Favicon -->
    @include('adsence')
    @if(!empty($stud->getGa()))
    <!-- Google Analytics -->

        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

            ga('create', '{!! $stud->getGa() !!}', 'auto');
            ga('send', 'pageview');

        </script>
        <!-- End Google Analytics -->
    @endif
    @include('zopin')
    <link rel="stylesheet" type="text/css" href="{!! url('frontend/working/css/jquery.tagsinput.css')!!} ">

    <link rel="stylesheet" href="{!! url('css/flags.css') !!}" type="text/css">
    <link rel="shortcut icon" href="#">
    <link href='{!! route('CssTheme2',['slug'=>$stud->slug]) !!}' rel='stylesheet' type='text/css'>
    <style>
        #logo {
            transform: scale(1) !important;
        }

        .shrink img {
            transform: scale(1) !important;
            margin-top: 0px;
        }

        #logo > .navbar-brand {
            display: block;
        }

        #about {
            width: 100%;
        }


    </style>
</head>
<body>

@include('frontend.landing.v2.partials.social')
@include('frontend.landing.studs.partials.messenger')
@include('frontend.landing.v2.partials.navbar',['trabajo' => true])
{{--@include('frontend.landing.v2.partials.slider')--}}
<section id="about" class="parallax section bg7 bgs">
    <div class="wrapsection">
        <div class="parallax-overlay bgt"></div>
        <div class="container">
            <div class="row">
                <div class="main_about text-center">
                    <div class="item active about_item">
                        <div class="col-xs-12">
                            <div class="tab-pane active mt20" id="candidate-profile">
                                @if(empty($editado))

                                    <form enctype="multipart/form-data" class="col-xs-12"
                                          action="{!! route('TrabajoIndexPost',['slug'=>$stud->slug]) !!}"
                                          method="post">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="studid" value="{!! $stud->id !!}">
                                        @include('frontend.trabajos.partials.left')
                                        @include('frontend.trabajos.partials.right')


                                    </form> <!-- end .row -->
                                @else

                                    <form enctype="multipart/form-data" class="col-xs-12"
                                          action="{!! route('TrabajoIndexPost',['slug'=>$stud->slug]) !!}"
                                          method="post">

                                        {!! csrf_field() !!}
                                        <input type="hidden" name="studid" value="{!! $stud->id !!}">
                                        @include('frontend.trabajos.partials.leftedit')
                                        @include('frontend.trabajos.partials.right')


                                    </form> <!-- end .row -->
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="contactarea" class="parallax section" style="background-image: url({!! url('theme/w/img/madera-.jpg')!!});
        background-repeat: repeat-y;">
    <div class="wrapsection " style="    padding-top: 80px;">
        <div class="parallax-overlay" style="background-color: black;opacity:0.1;"></div>
        <div class="container">
            <div class="test_authour">
                <img class="img-circle tam-img-150" lsrc="{!! $stud->getLogo() !!}" alt=""/>
                <h2>{!! $stud->getName() !!}</h2>
                {{--
                <h5><em>La yeguada Juan Vázquez lleva más de una década dedicada exclusivamente a la
                        cría, selección y entrenamiento de caballos españoles. Su máxima es cría
                        caballos españoles de alto nivel que sirvan para el deporte.</em></h5>
                --}}
                <div class="separator_auto"></div>
            </div>
            @include('frontend.landing.v2.partials.info')
        </div>
    </div>
</section>

<div class="scrollup" style="display: block;"><a href="#"><i class="fa fa-chevron-up"></i></a></div>
@include('frontend.landing.v2.partials.footer')
<script src="{!! url('theme/w/js/jquery.min.js') !!}"></script>
<script src="{!! url('theme/w/js/bootstrap.min.js') !!}"></script>
<script src="{!! url('theme/w/js/waypoints.min.js') !!}"></script>
<script src="{!! url('theme/w/js/jquery.scrollTo.min.js') !!}"></script>
<script src="{!! url('theme/w/js/jquery.localScroll.min.js') !!}"></script>
<script src="{!! url('theme/w/js/jquery.magnific-popup.min.js') !!}"></script>
<script src="{!! url('theme/w/slick/slick.min.js') !!}"></script>
<script src="{!! url('theme/w/js/validate.js') !!}"></script>
<script src="{!! url('theme/w/js/common.js') !!}"></script>
<script src="{!! url('theme/w/js/vjquery.js') !!}"></script>
<script src="{!! url('theme/w/js/isotope.min.js') !!}"></script>
<script src="{!! url('theme/w/social/jssocials.min.js') !!}"></script>

<script src="{!!route('JsTheme2',['slug'=>$stud->slug]) !!}"></script>

<script src="{!! url('frontend/working/js/jquery.tagsinput.min.js')!!}"></script>
<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
<script type="text/javascript">
    $('#tags').tagsInput();

    bkLib.onDomLoaded(function () {
        nicEditors.editors.push(
            new nicEditor().panelInstance(
                document.getElementById('myNicEditor')
            )
        );
        nicEditors.editors.push(
            new nicEditor().panelInstance(
                document.getElementById('myNicEditor2')
            )
        );

    });
    //bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
    {{--

    var input = document.getElementById('foto');
    var preview = document.querySelector('.preview');
    input.style.opacity = 0;
    input.addEventListener('change', updateImageDisplay);
    function updateImageDisplay() {
        while(preview.firstChild) {
            preview.removeChild(preview.firstChild);
        }

        var curFiles = input.files;
        if(curFiles.length === 0) {
            var para = document.createElement('p');
            para.textContent = 'No files currently selected for upload';
            preview.appendChild(para);
        } else {
            var list = document.createElement('ol');
            //preview.appendChild(list);
            for(var i = 0; i < curFiles.length; i++) {
                var listItem = document.createElement('li');
                var para = document.createElement('p');
                if(validFileType(curFiles[i])) {
                    para.textContent = 'File name ' + curFiles[i].name + ', file size ' + returnFileSize(curFiles[i].size) + '.';
                    var image = document.createElement('img');
                    image.src = window.URL.createObjectURL(curFiles[i]);

                    listItem.appendChild(image);
                    listItem.appendChild(para);

                } else {
                    list.appendChild(listItem);

                    /*
                    para.textContent = 'File name ' + curFiles[i].name + ': Not a valid file type. Update your selection.';
                    */
                    listItem.appendChild(image);
                    listItem.appendChild(para);

                }

                list.appendChild(listItem);
            }
        }
    }
    var fileTypes = [
        'image/*',

    ]

    function validFileType(file) {
        for(var i = 0; i < fileTypes.length; i++) {
            if(file.type === fileTypes[i]) {
                return true;
            }
        }

        return false;
    }
    --}}
    $(".numbers").keypress(function (e) {
        //if the letter is not digit then display error and don't type anything
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            //display error message
            //$("#errmsg").html("Digits Only").show().fadeOut("slow");
            return false;
        }
    });
    $('.savest').on('click', function () {
        $('#enviome').click();
    });
            {{--
            $(".telefonos").intlTelInput({
                // allowDropdown: false,
                // autoHideDialCode: false,
                // autoPlaceholder: "off",
                // dropdownContainer: "body",
                // excludeCountries: ["us"],
                // formatOnDisplay: false,

                preferredCountries: ['mx', 'es', 'nl', 'de', 'us'],
                separateDialCode: true,
                utilsScript: "{!! url('phone/js/utils.js') !!}"

            });
            --}}
    var UrlEstado = "{!! route('state.ajax') !!}";
    window.token = '{!! csrf_token() !!}';
    var UrlCiudad = "{!! route('city.ajax') !!}";

    function DisableElement(el) {
        $(el).prop('disabled', true);
        return null;
    };

    function EnableElement(el, clear = true) {
        $(el).prop('disabled', false);
        if (clear === true) $(el).val('');
        return null;
    };

</script>
<script type="text/javascript" src="{!!url('assets/js/localidad.js')!!}"></script>
</body>
</html>


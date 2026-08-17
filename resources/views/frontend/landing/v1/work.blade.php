@section('title', trans('Titulos.Trabajo'))
@section('fbheader')
    @include('meta',
[
'titulo' => $stud->getTituloWeb(),
'descripcion'=>$stud->getSeodescripcion(),
'key'=>$stud->words,
'logo'=>$stud->getLogo(),
'imagenes' =>$stud->getPhotosModel(),
])
    @foreach($stud->getPhotosModel() as $h => $i)
        <meta property="og:image" content="{!! $i->url !!}"/>
    @endforeach
@endsection

@extends('frontend.landing.v1.base')
@section('csstop')
    <link rel="stylesheet" type="text/css" href="{!! url('frontend/working/css/jquery.tagsinput.css')!!} ">
    <style>

    </style>
@endsection
@section('cssup')
    <link rel="stylesheet" href="{!! url('frontend/working/css/styles.css')!!} ">

@endsection
@section('content')
    @include('frontend.landing.v1.partials.baner',['texto'=>trans('Titulos.Trabajo'),'clase'=>'fotos'])
    <div class="clearfix"></div>
    <section id="gallery" class="gallery margin-top-120 bg-white ">
        <div class="col-xs-12">
            <div class="tab-content">
                <div class="tab-pane active mt20" id="candidate-profile">
                    @if(empty($editado))

                        <form enctype="multipart/form-data" class="col-xs-12" action="{!! route('TrabajoIndexPost',['slug'=>$stud->slug]) !!}"
                              method="post">
                            {!! csrf_field() !!}
                            <input type="hidden" name="studid" value="{!! $stud->id !!}">
                            @include('frontend.trabajos.partials.left')
                            @include('frontend.trabajos.partials.right')


                        </form> <!-- end .row -->
                    @else

                        <form enctype="multipart/form-data"  class="col-xs-12" action="{!! route('TrabajoIndexPost',['slug'=>$stud->slug]) !!}"
                              method="post">

                            {!! csrf_field() !!}
                            <input type="hidden" name="studid" value="{!! $stud->id !!}">
                            @include('frontend.trabajos.partials.leftedit')
                            @include('frontend.trabajos.partials.right')


                        </form> <!-- end .row -->
                    @endif
                </div> <!-- end .tabe pane -->

                {{--
                                        <div class="tab-pane" id="candidate-cv">
                                            <h3 class="tab-title">Profile</h3>
                                            <p>Here goes the content</p>
                                        </div> <!-- end .tab-pane -->

                                        <div class="tab-pane" id="candidate-documents">
                                            <h3 class="tab-title">Products/Services</h3>
                                            <p>Here goes the content</p>
                                        </div> <!-- end .tab-pane -->

                                        <div class="tab-pane" id="candidate-protfolio">
                                            <h3 class="tab-title">Portfolio</h3>
                                            <p>Here goes the content</p>
                                        </div> <!-- end .tab-pane -->
                --}}
            </div> <!-- end .tab-content -->

        </div>
    </section><!-- End off portfolio section -->


@endsection

@section('js')
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
    @endsection
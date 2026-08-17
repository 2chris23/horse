@extends('frontend.landing.v4.base')
@section('cssup')
    <link rel="stylesheet" type="text/css" href="{!! url('frontend/working/css/jquery.tagsinput.css')!!} ">
    <link rel="stylesheet" href="{!! url('frontend/working/css/styles.css')!!} ">
    <style>

    </style>
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
@section('content')
    <!-- SUB BANNER -->
    <section class="section-sub-banner bg-9">
        <div class="awe-overlay"></div>
        <div class="sub-banner">
            <div class="container">
                <div class="text text-center">
                    <h2>{!! trans('Titulos.Trabajo') !!}</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- END / SUB BANNER -->
    <!-- LADO IZQUIERDO-->
    <section class="section-room bg-white">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="motijob-sidebar col-xs-12 ">
                        <div class="candidate-profile-picture">
                            <div class="upload-img-field preview">
                                <img src="" alt="" id="blah" class="img-responsive img-fluid">
                            </div>
                            <a class="awe-btn awe-btn-default bold btn-medium" href="#" onclick="$('#foto').click();">
                                {!! trans('trabajo.fotoupload') !!}
                            </a>
                            <input name="foto" id="foto" type="file" class="hidden" accept=".jpg, .jpeg, .png"
                                   onchange="readURL(this);">
                            <script>
                                function readURL(input) {
                                    if (input.files && input.files[0]) {
                                        var reader = new FileReader();
                                        reader.onload = function (e) {
                                            $('#blah').attr('src', e.target.result);
                                            $('.upload-img-field').css('background-image', 'url("")');
                                        };
                                        reader.readAsDataURL(input.files[0]);
                                    }
                                }

                                window.onload = function (e) {
                                    $("#foto").change(function () {
                                        console.log('cambiando');
                                        readURL(this);
                                    });
                                };

                            </script>
                        </div>
                        <!-- end .agent-profile-picture -->

                        <div class="candidate-general-info col-xs-12">

                            <div class="title clearfix col-xs-12 text-center">
                                <h6>
                                    {!! trans('trabajo.generalinfo') !!}
                                </h6>
                            </div>
                            <!-- end .end .title -->

                            <ul class="list-unstyled candidate-registration ">
                                <li class="clearfix col-xs-12">
                                    <div class="col-xs-5">
                                        <strong>{!! trans('trabajo.name') !!}:</strong>
                                    </div>
                                    <div class="col-xs-7">
                                        <input name="name" class="w100" type="text"
                                               placeholder="{!! trans('trabajo.place.name') !!}" required>
                                    </div>
                                </li>
                                <li class="clearfix col-xs-12">
                                    <div class="col-xs-5">
                                        <strong>{!! trans('trabajo.bday') !!}:</strong>
                                    </div>
                                    <div class="col-xs-7">
                                        <input name="date" class="w100" type="date"
                                               placeholder="{!! trans('trabajo.place.bday') !!}" required>
                                    </div>
                                </li>
                                <li class="clearfix col-xs-12">
                                    <div class="col-xs-5">
                                        <strong>{!! trans('trabajo.country') !!}:</strong>
                                    </div>
                                    <div class="col-xs-7">
                                        @include('frontend.trabajos.common.country')

                                    </div>
                                </li>

                                <li class="clearfix col-xs-12">
                                    <div class="col-xs-5">
                                        <strong>{!! trans('trabajo.state') !!}:</strong>
                                    </div>
                                    <div class="col-xs-7">
                                        @include('frontend.trabajos.common.state')
                                    </div>
                                </li>
                                <li class="clearfix col-xs-12">
                                    <div class="col-xs-5">
                                        <strong>{!! trans('trabajo.city') !!}:</strong>
                                    </div>
                                    <div class="col-xs-7">
                                        <input name="city" class="w100" type="text"
                                               placeholder="{!! trans('trabajo.place.city') !!}">
                                    </div>
                                </li>
                                <li class="clearfix col-xs-12">
                                    <div class="col-xs-5">
                                        <strong>{!! trans('trabajo.address') !!}:</strong>
                                    </div>
                                    <div class="col-xs-7">
                                        <input name="address" class="w100" type="text"
                                               placeholder="{!! trans('trabajo.place.address') !!}">
                                    </div>
                                </li>
                                @include('frontend.trabajos.common.phone')
                                <li class="clearfix col-xs-12">
                                    <div class="col-xs-5">
                                        <strong>{!! trans('trabajo.email') !!}:</strong>
                                    </div>
                                    <div class="col-xs-7">
                                        <input name="email" class="w100" type="email"
                                               placeholder="{!! trans('trabajo.place.email') !!}" required>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- end .candidate-general-info -->
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- end .3col grid layout -->
                <!-- LADO IZQUIERDO-->

                @php
                    $cat = '';

                        foreach(trans('categorias.trabajo') as $k=>$v){
                        $sel =($k == 0)? ' selected ':'';
                        $cat.="<option value=\"$k\" $sel>$v</option>";
                        }
                    $cat = " <div class=\"skill-selectbox mb10 skills\"> <select  name=\"skillsw\"> $cat</select> </div> ";
                @endphp

                <div class="col-md-8 col-xs-12">
                    <div class="job-reg-form">
                        <div class="candidate-single-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <label><span>*</span>{!! trans('trabajo.skill') !!}</label>
                                </div> <!-- end .4th grid-layout -->

                                <div class="col-md-8">
                                    <div class="candidate-skill-single clearfix">
                                        <div class="col-xs-12 mt10">
                                            @foreach(trans('categorias.contacto') as $k=>$v)
                                                @if($k!=0)
                                                    <div class="col-xs-4 pdt5">
                                                        <input type="checkbox" id="cks_{!! $k !!}" name="skillss[]"
                                                               value="{!! $k !!}"/>
                                                        <span onclick="$('#cks_{{$k}}').click();">{!! $v !!}</span>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div> <!-- end .candidate-skills-single -->
                                </div> <!-- end .8th grid layout -->
                            </div> <!-- end nasted .row -->
                        </div> <!-- end .candidate-single-content -->
                        <!-- Habilidad -->
                        <!-- Datos present -->
                        <div class="candidate-single-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>{!! trans('trabajo.present',['name'=>$stud->name]) !!}</label>
                                </div> <!-- end .4th grid-layout -->

                                <div class="col-md-8">
                                    <div class="candidate-des-editore">
                                        <div class="textarea-editor">
                                            <textarea name="present" id="myNicEditor"
                                                      placeholder="{!! trans('trabajo.place.present') !!}"
                                                      cols="40"></textarea>
                                        </div> <!-- end textarea-editor -->
                                    </div> <!-- end .condidate-description -->
                                </div> <!-- end .8th grid layout -->

                            </div> <!-- end nasted .row -->
                        </div> <!-- end .candidate-single-content -->
                        <!-- Datos present -->

                        <!-- Datos mensaje -->
                        <div class="candidate-single-content ">
                            <div class="row">
                                <div class="col-md-4">
                                    <label><span>*</span>{!! trans('trabajo.sms') !!}</label>
                                </div> <!-- end .4th grid-layout -->

                                <div class="col-md-8">
                                    <div class="candidate-des-editore">
                                        <div class="textarea-editor">
                                            <textarea name="sms" id="myNicEditor2"
                                                      placeholder="{!! trans('trabajo.place.sms') !!}"
                                                      cols="40"></textarea>
                                        </div> <!-- end textarea-editor -->
                                    </div> <!-- end .condidate-description -->
                                </div> <!-- end .8th grid layout -->

                            </div> <!-- end nasted .row -->
                        </div> <!-- end .candidate-single-content -->
                        <!-- Datos mensaje -->


                        <!-- Habilidad adicional-->
                        <div class="candidate-single-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>
                                        {!! trans('trabajo.file') !!}
                                    </label>
                                </div> <!-- end .4th grid-layout -->

                                <div class="col-md-8">
                                    <div class="add-skills-field">
                                        <input name="docs" type="file"
                                               accept=".pdf,application/pdf,.doc,.docx,.xml,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                    </div>
                                </div> <!-- end .8th grid layout -->
                            </div> <!-- end .nasted .row -->
                        </div> <!-- end .candidate-single-content -->
                        <!-- Habilidad adicional-->
                        <!-- Guardar -->
                        <input type="submit" class="hidden" id="enviome">
                        <div class="save-cancel-button ml20">
                            <a href="#" class="awe-btn savest awe-btn-default bold">{!! trans('trabajo.save') !!}</a>
                            <a href="{!! route('MyContact',['slug'=>$stud->slug]) !!}"
                               class="awe-btn awe-btn-cancel ml10 bold">{!! trans('trabajo.cancel') !!}</a>
                        </div> <!-- end .save-cancel-button -->
                        <!-- Guardar -->

                    </div> <!-- end .candidate-reg-form -->
                </div> <!-- end .9col grid layout -->
            </div>
        </div>
    </section>

@endsection
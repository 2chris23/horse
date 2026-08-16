@php($Monedas = Publico::ArrayMonedas())
@php
    $horse_id =(empty($horse->id))?0:$horse->id;
if(\Auth::user()->isAdm() != true){
    $yegu = \Auth::user()->Yeguada();
    $marca = $yegu->Marca();
    $mostrarmarca = 0;
    $agua = 0;
    if(!empty($marca)){
    $mostrarmarca = 1;
    $agua = $yegu->MarcaAgua()->first()->status;
    }
    }
@endphp
@php($cd = null);
@if(!empty($cd))
    <script>
                @endif
                {{--<script src="{!! url('js/tags/tagging.js') !!}"></script>--}}
        var horse_id ={{$horse->id}};
        var dropconp_caballo = {
            url: "{!!route('imagenes')!!}",
            method: "post",
            {{--//uploadMultiple: true,--}}
            uploadMultiple: false,
            autoProcessQueue: true,
            maxFilesize: 10,
            parallelUploads: 20,
            maxFiles: 50,
            headers: {
                'X-CSRF-TOKEN': token,
                'csrftoken': token,
            },
            acceptedFiles: 'image/*',
            clickable: '#caballo',
            init: function () {
                var myDropzone = this;
                drp = this;
                $(".btn-drp-caballo").click(function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    $(this).html("{!! Funciones::ReemplazarApostrofe(trans('users.sending')) !!}");
                    if ($("#caballo").hasClass("dz-started")) {
                        {{--// eligio archivos pa subir--}}
                        {{--//if (fisrts !== 0) return null;--}}
                        {{--//fisrts = 1;--}}
                        myDropzone.processQueue();
                    } else {
                        {{--// no esta subiendo archivos--}}
                    }
                    ;
                    {{--//saveDatosContacto();--}}
                    {{--//nFiles = flyerPhotoDropZone.getQueuedFiles().length;--}}
                });
                this.on("sendingmultiple", function () {
                });
                this.on("addedfiles", function (files) {
                    subida_caballo = this.getQueuedFiles().length;
                });
                this.on("addedfile", function (files) {
                    subida_caballo = this.getQueuedFiles().length;
                });
                this.on("removedfile", function (files) {
                    subida_caballo = this.getQueuedFiles().length;
                });
                this.on("successmultiple", function (files, response, e) {
                    archivos_ya_subieron = 1;
                    nombres_archivos = response;
                    console.dir(response);
                    console.dir(e);
                    GalleryUpload = 1;
                    {{--//window.location.href = "{!! route('caballoc.index') !!}";--}}
                });
                this.on("errormultiple", function (files, response) {
                    GalleryUpload = 1;
                    if (response.sms !== undefined) {
                        ErrP('{!! Funciones::ReemplazarApostrofe(trans('error.errorImageUp')) !!}', response.sms);
                    } else {
                        ErrP('{!! Funciones::ReemplazarApostrofe(trans('error.errorImageUp')) !!}', '{!! Funciones::ReemplazarApostrofe(trans('error.Desconocido')) !!}');
                    }
                });
                this.on('sending', function (file, xhr, formData) {
                    {{--//var uno = new FormData(document.getElementById('horse_'));--}}
                    {{--
                    formData.append('descripcion', CKEDITOR.instances['input_stud_description'].getData());
                    $("#vidoetape").find("input").each(function () {
                        formData.append($(this).attr("name"), $(this).val());
                    });
                    $("#horse_").find("input").each(function () {
                        formData.append($(this).attr("name"), $(this).val());
                    });--}}
                    @if($mostrarmarca!=0)
                    {{-- para marca de agua predeterminada --}}
                    formData.append('marca', $('#marcapredetermianda').val());
                    @endif
                    formData.append('type', typep_caballo);
                    @if(($horse!== null))
                    formData.append('id', horse_id);
                    @endif
                    @if(\Auth::user()->isAdm() and !empty($stud))
                    formData.append('stud_id', {!! $stud->id !!});
                    @endif
                });
                this.on('queuecomplete', function () {
                });
                this.on('success', function (file, responseText, e) {
                    var t = responseText.el;
                    var s = "";
                    $.each(t, function (k, v) {
                        s = v.replace('\n', '');
                        s = s.replace('\\', '');
                        $("#photos").append(s);
                        cargarimagenes()
                    });
                    myDropzone.removeFile(file);
                    SucP('{!! Funciones::ReemplazarApostrofe(trans('users.cargaImg')) !!}', '{!! Funciones::ReemplazarApostrofe(trans('users.cargaImgOk')) !!}');
                });
                {{--
                this.on("success", function (response) {
                    nombres_archivos = response;
                    console.dir(response);

//console.log(response);
                });
                --}}
                    this.on("addedfile", function (file) {
                            {{--// Create the remove button
                            //var removeButton = Dropzone.createElement("<button>Remove file</button>");--}}
                    var removeButton = Dropzone.createElement('<a href="javascript:void(0)" class="btn btn-warning pull-right remover">{!! Funciones::ReemplazarApostrofe(trans('text.RemoveFile')) !!}</a>');
                            {{--// Capture the Dropzone instance as closure.--}}
                    var _this = this;
                    {{--// Listen to the click event--}}
                    removeButton.addEventListener("click", function (e) {
                        _this.removeFile(file);
                    });
                    {{--// Add the button to the file preview element.--}}
                    file.previewElement.appendChild(removeButton);
                });
                this.on("error", function (file, response) {
                    {{--// do stuff here.--}}
                    console.dir(response);
                    GlobalError = 1;
                    if (response.sms !== undefined) {
                        ErrP('{!! Funciones::ReemplazarApostrofe(trans('error.errorImageUp')) !!}', response.sms);
                    } else {
                        ErrP('{!! Funciones::ReemplazarApostrofe(trans('error.errorImageUp')) !!}', '{!! Funciones::ReemplazarApostrofe(trans('error.Desconocido')) !!}');
                    }
                    var ErrorSms = Dropzone.createElement(response.sms + '<br><a class="dz-remove" href="javascript:undefined;" data-dz-remove="">{!! Funciones::ReemplazarApostrofe(trans('text.RemoveFile')) !!}</a>');
                    ErrorSms.addEventListener("click", function (e) {
                        myDropzone.removeFile(file);
                    });
                    $(file.previewElement).find('.dz-error-message').text("").append(response).append(ErrorSms);
                });
            }
        };
        var testo = null;
        var finis = 0;
        var drp = null;
        Dropzone.autoDiscover = false;
        Dropzone.options.myAwesomeDropzone = false;
        var typep_caballo = 'horse';
        var subida_caballo = 0;
        var lastp = 0;
        var tada = null;
        var fst = 0;
        var fisrts = 0;

        function addvideo() {
            var d = $('#input_stud_video').val();
            var s = '<div class="col-12 row"><div class="col-9"><input type="text" id="video" name="video[]" class="form-control " disabled value="' + d + '"></div><div class="col-3"><a href="#!" class="btn btn-waring" onclick="removevideo(this)" ><i class="fa fa-minus"></i></a></div></div>';
            $('#vidoetape').append(s);
            $('#input_stud_video').val('');
        }

        function removevideo(el) {
            var t = $(el).parent().parent().remove();
        }


        function envio(form, url) {
            axios.post(url, form)
                .then(function (response) {
                    var r = response;
                    console.dir(r);
                    {{--//var s = $.parseJSON(data);
                    //$('#video').append(s.el);--}}
                    $('#video').append(response.el);
                    swal(
                        '{!! Funciones::ReemplazarApostrofe(trans('users.applychange')) !!}',
                        response.sms,
                        'success'
                    );
                })
                .catch(function (error) {
                            {{--//var err = eval(xhr.responseText.sms);--}}
                    var e = error;
                    console.dir(e);
                    var v = e.message;
                    swal({
                        title: '{!! Funciones::ReemplazarApostrofe(trans('users.tittleerror')) !!}',
                        html: '{!! Funciones::ReemplazarApostrofe(trans('users.someerror')) !!}<br>' + v,
                        type: 'error',
                        confirmButtonColor: '#4fb7fe'
                    });
                    $('.save').prop('disabled', false);
                });
            {{--
            $.ajax({
                url: url,
                data: form,
                headers: {
                    'X-CSRF-TOKEN': token,
                    'csrftoken': token,
                },
                contentType: false,
                processData: false,
                type: 'POST',
                success: function (data) {
                    var s = $.parseJSON(data);
                    $('#video').append(s.el);
                    swal(
                        '{!! trans('users.applychange') !!}',
                        s.sms,
                        'success'
                    )
                },
                error:
                    function (xhr, status, error) {
                        var err = eval(xhr.responseText.sms);
                        var v = $.parseJSON(xhr.responseText);
                        swal({
                            title: '{!! trans('users.tittleerror') !!}',
                            html: '{!! trans('users.someerror') !!}<br>' + v.sms,
                            type: 'error',
                            confirmButtonColor: '#4fb7fe'
                        });
                    }
            });
            --}}
        }

        function HabilitarCaballos(clear = true) {
            EnableElement(raised, clear);
            EnableElement(name, clear);
            EnableElement(birthdate, clear);
            EnableElement(raza, clear);
            EnableElement(doma, clear);
            EnableElement(sex, clear);
            EnableElement(tosold, clear);
            EnableElement(price, clear);
            EnableElement(id, clear);
            EnableElement($('.save'), clear);
            EnableElement($('.cancel'), clear);
        }

        function savedata() {
            {{--//$('.save').on('click', function (e) {
            //e.preventDefault();
            //DisableElement($('.save'));
            //DisableElement($('.cancel'));--}}
            $('.save').prop('disabled', true);
            var formElement = document.getElementById("horse_");
            var form = new FormData(formElement);
            var doma, tosold;
            var raised = $('#input_horse_raised').val();
            var birthdate = $('#input_horse_birthdate').val();
            var name = $('#input_horse_name').val();
            var raza = $('#input_horse_raza').val();
            var stud = $('#input_horse_stud').val();
            var sex = $('#input_horse_sex').val();
            var price = $('#input_horse_price').val();
            var cubri = $('#cubri').val();
            var id = horse_id;
            var description = CKEDITOR.instances['input_stud_description'].getData();
            var color = $('#colorselect').val();
            var s = $('#input_horse_doma_si').hasClass('hidden-xl-down');
            var d = $('#check_si').hasClass('hidden-xl-down');
            if (s === true) {
                doma = false;
            } else {
                doma = true;
            }
            if (d === true) {
                tosold = false;
            } else {
                tosold = true;
            }
            form.append('raised', raised);
            form.append('name', name);
            form.append('color', color);
            form.append('birthdate', birthdate);
            form.append('raza', raza);
            form.append('doma', doma);
            form.append('tosold', tosold);
            form.append('stud', stud);
            form.append('sex', sex);
            form.append('price', price);
            form.append('id', id);
            form.append('description', description);
            form.append('cubri', cubri);
            {{--//EnableElement($('.save'), true);
            //EnableElement($('.cancel'), true);--}}
            if (campos() !== true) {
                $('.save').prop('disabled', false);
                return null;
            }
            axios.post('{!! route('horse.store') !!}', form)
                .then(function (response) {
                    var r = response.data;
                    horse_id = r.id;
                    $('#horse_id').val(horse_id);
                    {{--//$('.fileinput-upload-button').click();
                    //$('.btn-drp-caballo').click();--}}
                    swal(
                        '{!! Funciones::ReemplazarApostrofe(trans('users.applychange')) !!}',
                        r.sms,
                        'success'
                    );
                    {{--//window.location.href = '{!! route('caballoc.index') !!}';--}}
                    $('.save').prop('disabled', false);
                })
                .catch(function (error) {
                            {{--//var err = eval(xhr.responseText.sms);--}}
                    var e = error.response;
                    var v = e.data.sms;
                    swal({
                        title: '{!! Funciones::ReemplazarApostrofe(trans('users.tittleerror')) !!}',
                        html: '{!! Funciones::ReemplazarApostrofe(trans('users.someerror')) !!}<br>' + v,
                        type: 'error',
                        confirmButtonColor: '#4fb7fe'
                    });
                    $('.save').prop('disabled', false);
                });
        };

        function savevideo(url) {
            var form = new FormData();
            var description = $('#input_stud_video').val();
            form.append('video', description);
            form.append('type', 'horse');
            form.append('horse_id', horse_id);
            swal({
                title: '{!! Funciones::ReemplazarApostrofe(trans('users.usure')) !!}',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.yes')) !!}',
                cancelButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.no')) !!}',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonColor: '#4fb7fe',
                html: '{!! Funciones::ReemplazarApostrofe(trans('users.caballocambiovideo')) !!}<br>',
                cancelButtonColor: '#EF6F6C',
                buttonsStyling: false
            }).then(function () {
                envio(form, url);
                $('#input_stud_video').val();
            }, function (dismiss) {
                if (dismiss === 'cancel') {
                    swal(
                        '{!! Funciones::ReemplazarApostrofe(trans('users.canceltask')) !!}',
                        '{!! Funciones::ReemplazarApostrofe(trans('users.cancelmodal')) !!}',
                        'error'
                    )
                }
            });
        }


        function addbtn(step) {
            lastp = step;
            if (step === 2) {
                if (validar() == true) {
                    $('#fakesave').removeClass('desha');
                } else {
                    $('#fakesave').addClass('desha');
                }
            }
            lastp = step;
            if (step === 2) {
                if (validar() == true) {
                    $('#fakesave').removeClass('desha');
                } else {
                    $('#fakesave').addClass('desha');
                }
            }
            if (fst != 0) return null;
            fst = 1;
            var btn = "<a href=\"#!\" id=\"fakesave\"class=\"btn btn-warning pull-right hidden-xs-up desha\" onclick=\"$('#savec').click()\">{!! Funciones::ReemplazarApostrofe(trans('users.submit')) !!}</a>";
            $('.btn-toolbar').children().addClass('col-12 row').append(btn);
        }

        function validar() {
            if (
                $('#colorselect').val() !== 0 &&
                $('#input_horse_raza').val() !== 0 &&
                $('#input_horse_sex').val() !== 0 &&
                $('#input_horse_name').val().length == 0) {
                ErrorCampos('{!! Funciones::ReemplazarApostrofe(trans('error.errorNoSave')) !!}', '{!! Funciones::ReemplazarApostrofe(trans('error.errorNoHorseName')) !!}');
                return false;
            }
            return true;
        }

        function ErrorCampos(titulo, texto) {
            new PNotify({title: titulo, text: texto, type: 'error'});
            return false;
        }

        function setfav(id, valu) {
            var dat = new FormData();
            dat.append('seti', valu);
            var url = "{!! route('caballoc.fav') !!}" + "/" + id;
            $.ajax({
                url: url,
                data: dat,
                headers: {
                    'X-CSRF-TOKEN': token,
                    'csrftoken': token,
                },
                contentType: false,
                processData: false,
                async: false,
                type: 'POST',
                success: function (data) {
                    var s = $.parseJSON(data);
                    console.dir(s);
                    if (s === 0) {
                        {{--//no fav--}}
                        $('#favorite_si').addClass('hidden-xl-down').prop('checked', false);
                        $('#favorite_no').removeClass('hidden-xl-down').prop('checked', true);
                    } else {
                        {{--//fav--}}
                        $('#favorite_no').addClass('hidden-xl-down').prop('checked', false);
                        $('#favorite_si').removeClass('hidden-xl-down').prop('checked', true);
                    }
                },
                error:
                    function (xhr, status, error) {
                        var v = $.parseJSON(xhr.responseText);
                        console.error('error');
                        console.dir(v);
                    }
            });
            dat = null;
        };

        function setfav(id, valu) {
                    {{--//caballoc.fav--}}
            var dat = new FormData();
            dat.append('seti', valu);
            var url = "{!! route('caballoc.fav') !!}" + "/" + id;
            $.ajax({
                url: url,
                data: dat,
                headers: {
                    'X-CSRF-TOKEN': token,
                    'csrftoken': token,
                },
                contentType: false,
                processData: false,
                async: false,
                type: 'POST',
                success: function (data) {
                    var s = $.parseJSON(data);
                    {{--console.dir(s);--}}
                    if (s === 0) {
                        {{--//no fav
                        //$('tr[data-id=128]').removeClass('favorite');--}}
                        $('tr[data-id=' + id + ']').removeClass('favorite').attr('data-fav', 0);
                        $('#favorite_si_' + id).addClass('hidden-xl-down').prop('checked', false);
                        $('#favorite_no_' + id).removeClass('hidden-xl-down').prop('checked', true);
                    } else {
                        {{--//fav--}}
                        $('tr[data-id=' + id + ']').addClass('favorite').attr('data-fav', 1);
                        $('#favorite_no_' + id).addClass('hidden-xl-down').prop('checked', false);
                        $('#favorite_si_' + id).removeClass('hidden-xl-down').prop('checked', true);
                    }
                },
                error:
                    function (xhr, status, error) {
                        var v = $.parseJSON(xhr.responseText);
                        console.error('error');
                        {{--console.dir(v);--}}
                    }
            });
            dat = null;

        }


        function campos() {
            var v1 = $('#colorselect').val();
            var e = 0;
            var v2 = ($('#input_horse_raza').val());
            var f = 0;
            var v3 = ($('#input_horse_name').val().length);
            var g = 0;
            var v4 = $('#input_horse_sex').val();
            var h = 0;
            if (v1 == 0) {
                e = 1
            }
            if (v2 == 0) {
                f = 1
            }
            if (v3 == 0) {
                g = 1
            }
            if (v4 == 0) {
                h = 1
            }
            var el = $('#colorselect');
            if (e === 1) {
                $(el).addClass('has-danger');
            } else {
                $(el).removeClass('has-danger');
            }
            el = $('#input_horse_raza');
            if (f === 1) {
                $(el).addClass('has-danger');
            } else {
                $(el).removeClass('has-danger');
            }
            el = $('#input_horse_name');
            if (g === 1) {
                $(el).addClass('has-danger');
            } else {
                $(el).removeClass('has-danger');
            }
            el = $('#input_horse_sex');
            if (h === 1) {
                $(el).addClass('has-danger');
            } else {
                $(el).removeClass('has-danger');
            }
            if (e === 0 && f === 0 && g === 0 && h === 0) {
                $('.sw-btn-next').removeProp('disabled');
                return true;
            } else {
                $('.sw-btn-next').prop('disabled', true);
                return false;
            }
        };


        function cambioa() {
            $('#moneda').val($('#moneda1').val()).trigger('change');
        }

        function cambiob() {
            $('#moneda1').val($('#moneda').val()).trigger('change');
        }

        function cubric() {
            var t = $('#input_horse_sex').val();
            if (t == 1) {
                $('.cubris').removeClass('hidden-xl-down');
            } else if (t == 4) {
                $('.cubris').removeClass('hidden-xl-down');
            } else {
                $('.cubris').addClass('hidden-xl-down');
            }
            campos();
        }

        function ComparteFb(url, name) {
            window.open('https://www.facebook.com/sharer.php?u=' + url, 'Comparte a ' + name, 'resizable=no,height=200,scrollbars=no');
            {{--
            swal({
                title: 'Compartir por Facebook',
                type: 'success',
                showCancelButton: true,
                confirmButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.yes') !!}',
                cancelButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.no') !!}',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonColor: '#4fb7fe',
                html: '¿Quieres compartir a ' + name + ' por facebook ahora?',
                cancelButtonColor: '#EF6F6C',
                buttonsStyling: false
            }).then(function () {
                window.open('https://www.facebook.com/sharer.php?u=' + url, 'Comparte a ' + name, 'resizable=no,height=200,scrollbars=no');
                {{--window.open(tace, 'Compartir caballo', "resizable=no,height=200,scrollbars=no");-- }}
            }, function (dismiss) {

           });
            --}}
        }

        function Vendido(id) {
            swal({
                title: 'Confirmación de venta',
                type: 'success',
                showCancelButton: true,
                confirmButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.yes')) !!}',
                cancelButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.no')) !!}',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonColor: '#4fb7fe',
                html: '¿Has vendido este caballo?<br><span class="mensajepeque">Puedes consultar tus caballos vendidos en tu historia de ventas.</span>',
                cancelButtonColor: '#EF6F6C',
                buttonsStyling: false
            }).then(function () {
                var url = "{!! route('horse.vendido') !!}" + "/" + id;
                var dat = new FormData();
                dat.append('seti', id);
                $.ajax({
                    url: url,
                    data: dat,
                    headers: {
                        'X-CSRF-TOKEN': token,
                        'csrftoken': token,
                    },
                    contentType: false,
                    processData: false,
                    async: false,
                    type: 'POST',
                    success: function (data) {
                        var s = $.parseJSON(data);
                        if (s === 1) {
                            {{--//no fav--}}
                            $('.horse_' + id).addClass('hidden-xl-down').prop('checked', false);
                            swal(
                                '{!! Funciones::ReemplazarApostrofe(trans('users.canceltask')) !!}',
                                '',
                                'success'
                            )
                        }

                    },
                    error:
                        function (xhr, status, error) {
                            var v = $.parseJSON(xhr.responseText);
                            console.error('error');
                            {{--console.dir(v);--}}
                        }
                });
            }, function (dismiss) {

            });
        }


        function Visitas(url, cantidad, name) {
            swal({
                title: 'Visitas',
                type: 'success',
                showCancelButton: true,
                confirmButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.yes')) !!}',
                cancelButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.no')) !!}',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonColor: '#4fb7fe',
                html: name + ' ha sido visitado ' + cantidad + ' veces<br>¿Quieres visitar su página? ',
                cancelButtonColor: '#EF6F6C',
                buttonsStyling: false
            }).then(function () {
                window.open(url);
                {{--window.open(tace, 'Compartir caballo', "resizable=no,height=200,scrollbars=no");--}}
            }, function (dismiss) {
            });
        }

        function deleteit(id) {
            var dat = new FormData();

            dat.append('seti', '');
            var url = "{!! route('caballoc.del') !!}" + "/" + id;

            swal({
                title: '¿Estas seguro de borrar este caballo?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.yes')) !!}',
                cancelButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.no')) !!}',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonColor: '#4fb7fe',
                html: '<span class="mensajepeque">Se eliminarán todos las imagenes y registros de este caballo.</span>',
                cancelButtonColor: '#EF6F6C',
                buttonsStyling: false
            }).then(function () {
                $.ajax({
                    url: url,
                    data: dat,
                    headers: {
                        'X-CSRF-TOKEN': token,
                        'csrftoken': token,
                    },
                    contentType: false,
                    processData: false,
                    async: false,
                    type: 'POST',
                    success: function (data) {
                        var s = $.parseJSON(data);
                        if (s === 1) {
                            {{--//no fav--}}
                            $('.horse_' + id).addClass('hidden-xl-down').prop('checked', false);
                        }
                    },
                    error:
                        function (xhr, status, error) {
                            var v = $.parseJSON(xhr.responseText);
                            console.error('error');
                            {{--console.dir(v);--}}
                        }
                });
            }, function (dismiss) {
                if (dismiss === 'cancel') {
                    swal(
                        '{!! Funciones::ReemplazarApostrofe(trans('users.canceltask')) !!}',
                        '{!! Funciones::ReemplazarApostrofe(trans('users.cancelmodal')) !!}',
                        'error'
                    )
                }
            });


            dat = null;

        }


        function guardado2() {
            var uno = new FormData(document.getElementById('horse_'));
            uno.append('descripcion', CKEDITOR.instances['input_stud_description'].getData());
            $("#vidoetape").find("input").each(function () {
                uno.append($(this).attr("name"), $(this).val());
            });
            axios.post("{!!route('caballoc.se2',['id'=>$horse->id])!!}", uno)
                .then(function (response) {
                    var r = response;
                    {{--//dasdas = response;--}}
                    console.dir(response.data.horse_id);
                    horse_id = response.data.horse_id;
                    $('#horse_id').val(horse_id);
                    swal(
                        '{!! Funciones::ReemplazarApostrofe(trans('users.applychange')) !!}',
                        response.sms,
                        'success'
                    );
                    {{--//window.location.href = "{!! route('caballoc.index') !!}";--}}
                })
                .catch(function (error) {
                            {{--//var err = eval(xhr.responseText.sms);--}}
                    var e = error.response.data;
                    console.dir(e);
                    var v = e.sms;
                    swal({
                        title: '{!! Funciones::ReemplazarApostrofe(trans('users.tittleerror')) !!}',
                        html: '{!! Funciones::ReemplazarApostrofe(trans('users.someerror')) !!}<br>' + v,
                        type: 'error',
                        confirmButtonColor: '#4fb7fe'
                    });
                });
        };
        $(window).on('load', function () {
            $('.predeterminadrmarca').on('click', function () {
                var s = $(this).attr('data-check');
                if (s == 0) {
                    $(this).attr('data-check', 1);
                    $('.nopredeterminado').addClass('hidden-xs-up');
                    $('.predeterminado').removeClass('hidden-xs-up');
                    $('.campopredeterminado').html('{!! Funciones::ReemplazarApostrofe(trans('desing.watermark')) !!}');
                    $('#marcapredetermianda').val(1);
                } else {
                    $(this).attr('data-check', 0);
                    $('.predeterminado').addClass('hidden-xs-up');
                    $('.nopredeterminado').removeClass('hidden-xs-up');
                    $('.campopredeterminado').html('{!! Funciones::ReemplazarApostrofe(trans('desing.watermark')) !!}');
                    $('#marcapredetermianda').val(0);
                }
            });
            $('.sw-btn-next').on('mouseover', function (e) {
                campos();
            });
        });
        $(document).on("ready", function () {

            $(window).hover(function () {
                cargarimagenes();
                $('tr[data-fav="1"]').addClass('favorite');
            });
            $('#tabla tbody').on('click', 'tr', function () {
                console.log('clicl');
                {{--//var data = table.row(this).data();
                //alert('You clicked on ' + data[0] + '\'s row');--}}
            });
            $('.drp_action_caballo').on('click', function () {
                drp_action_caballo = 1;
            });
            new Dropzone("div#caballo", dropconp_caballo);

            $("#photos").sortable().disableSelection();

            $('#input_horse_raised').mask("000 cm", {reverse: true});
            $('#input_horse_price').mask("000.000.000.000", {reverse: true});
            $('#cubri').mask("000.000.000.000", {reverse: true});
            $("#photos").sortable({
                stop: function (ui, event) {
                    getItems('#photos');
                }
            }).disableSelection();
            tada = $('#smartwizard').smartWizard({
                lang: {
                    {{--// Language variables--}}
                    next: '{!! Funciones::ReemplazarApostrofe(trans('portal.next')) !!}',
                    previous: '{!! Funciones::ReemplazarApostrofe(trans('portal.back')) !!}',
                },
                contentCache: false,
                contentURL: null,
                toolbarSettings: {
                    toolbarPosition: 'none',
                    {{--// none, top, bottom, both--}}
                    toolbarButtonPosition: 'right',
                    {{--// left, right--}}
                    showNextButton: false,
                    {{--// show/hide a Next button--}}
                    showPreviousButton: false,
                    {{--// show/hide a Previous button--}}
                },
                anchorSettings: {
                    anchorClickable: true,
                    {{--// Enable/Disable anchor navigation--}}
                    enableAllAnchors: true,
                    {{--// Activates all anchors clickable all times--}}
                    markDoneStep: true,
                    {{--// Add done css--}}
                    markAllPreviousStepsAsDone: true,
                    {{--// When a step selected by url hash, all previous steps are marked done--}}
                    removeDoneStepOnNavigateBack: false,
                    {{--// While navigate back done step after active step will be cleared--}}
                    enableAnchorOnDoneStep: true
                    {{--// Enable/Disable the done steps navigation--}}
                },
            });
        }).on("showStep", function (e, anchorObject, stepNumber, stepDirection) {
            {{--//addbtn(stepNumber);--}}
            if (stepNumber === 0) {
                $('.sw-btn-prev').addClass('hidden-xs-up');
            } else {
                $('.sw-btn-prev').removeClass('hidden-xs-up');
            }
            if (stepNumber === 2) {
                $('.sw-btn-next').addClass('hidden-xs-up');
            } else {
                $('.sw-btn-next').removeClass('hidden-xs-up');
            }
            if (stepNumber === 2) {
                $('#fakesave').removeClass('hidden-xs-up');
            } else {
                $('#fakesave').addClass('hidden-xs-up');
            }
            {{--//alert("You are on step " + stepNumber + " now");--}}
        });


        $('.selectpicker').selectpicker('refresh');
        $('#tosold').change(function () {
            if ($(this).is(":checked")) {
                $('#cardsell').removeClass('hidden-xl-down');
                return null;
            }
            ;
            $('#cardsell').addClass('hidden-xl-down');
            return null;
        });
        $('#check_si').on('click', function (e) {
            $('#check_si').addClass('hidden-xl-down').prop('checked', false);
            $('.monoprice').addClass('hidden-xl-down');
            $('#check_no').removeClass('hidden-xl-down').prop('checked', true);
            $('#tosold').val(0);
        });
        $('#check_no').on('click', function (e) {
            $('#check_no').addClass('hidden-xl-down').prop('checked', false);
            $('#tosold').val(1);
            $('.monoprice').removeClass('hidden-xl-down');
            $('#check_si').removeClass('hidden-xl-down').prop('checked', true);
        });
        $('#input_horse_doma_si').on('click', function (e) {
            $('#input_horse_doma_si').addClass('hidden-xl-down').prop('checked', false);
            $('#input_horse_doma_no').removeClass('hidden-xl-down').prop('checked', true);
            $('#doma').val(0);
        });
        $('#input_horse_doma_no').on('click', function (e) {
            $('#doma').val(1);
            $('#input_horse_doma_no').addClass('hidden-xl-down').prop('checked', false);
            $('#input_horse_doma_si').removeClass('hidden-xl-down').prop('checked', true);
        });

        $('#favorite_si').on('click', function (e) {
            $('#favorite_si').addClass('hidden-xl-down').prop('checked', false);
            $('#favorite_no').removeClass('hidden-xl-down').prop('checked', true);
        });
        $('#favorite_no').on('click', function (e) {
            $('#favorite_no').addClass('hidden-xl-down').prop('checked', false);
            $('#favorite_si').removeClass('hidden-xl-down').prop('checked', true);
        });


        $('#input_horse_raza').on('change', function () {
            campos();
        });
        $('#colorselect').on('change', function () {
            campos();
        });


        @php($cd = null);
        @if(!empty($cd))
    </script>


@endif

{{--
    <!--var table = $('#tabla').dataTable({
"order": [[0, "asc"]],
"pageLength": 25,
"language": {
"decimal": ",",
"thousands": ".",
{{--//"lengthMenu": "Mostrando _MENU_ registros por pagina",-- }}
            "zeroRecords": "{!! Funciones::ReemplazarApostrofe(trans('users.zerorecord') !!}",
"info": "{!! Funciones::ReemplazarApostrofe(trans('users.tableinfo') !!}",
"loadingRecords": "{!! Funciones::ReemplazarApostrofe(trans('users.tableloading') !!}",
{{--//"processing": "{!! Funciones::ReemplazarApostrofe(trans('users.tablebusy') !!}",-- }}
            //"search": "Filter records:",}}
            "search": "{!! Funciones::ReemplazarApostrofe(trans('users.tablesearch') !!}",
"infoEmpty": "{!! Funciones::ReemplazarApostrofe(trans('users.tableinfoempty') !!}",
"infoFiltered": "{!! Funciones::ReemplazarApostrofe(trans('users.tableinfofilter') !!}",
"emptyTable": "{!! Funciones::ReemplazarApostrofe(trans('users.tableempty') !!}",
"lengthMenu": "{!! Funciones::ReemplazarApostrofe(trans('users.tableregistros') !!}",
"emptyTable": "{!! Funciones::ReemplazarApostrofe(trans('users.emptyTable') !!}",
"paginate": {
"first": "{!! Funciones::ReemplazarApostrofe(trans('users.tablefirst') !!}",
"last": "{!! Funciones::ReemplazarApostrofe(trans('users.tablelast') !!}",
"next": "{!! Funciones::ReemplazarApostrofe(trans('users.tablenext') !!}",
"previous": "{!! Funciones::ReemplazarApostrofe(trans('users.tableprevious') !!}",

},
{{--
            "ajax": {
                'url': "{!! route('fotospost.index') !!}",
                'type': 'POST',
                'beforeSend': function (request) {
                    request.setRequestHeader("X-CSRF-TOKEN", token);
                    request.setRequestHeader("csrftoken", token);
                }

            },
            -- }}


            },

            "fnInitComplete": function (oSettings, json) {
            $('#tabla').on('page.dt', function () {
{{--//var info = table.page.info();
//console.log( 'Showing page: '+info.page+' of '+info.pages );-- }}
            cargarimagenes();
            $('.page-link').on('click', function () {
            cargarimagenes();
            });
            });
            },

{{--//"processing": true,
    //"serverSide": true,-- }}
            });
{{-- }}
var t1 = $('#tabla').dataTable({
    "ajax": {
        'url':"{!! route('fotospost.index') !!}",
        'type':'POST',
        'beforeSend':function(request){
            console.log("EEEEEEEEEEEEEEEEEEE");
            request.setRequestHeader("X-CSRF-TOKEN",token);
            request.setRequestHeader("csrftoken",token);
        }

    },
});
-- }}
    {{--
    t1.ajax.url("http://horse.com/admin/Fotos").load();
        //.url("{!! route('fotospost.index') !!}").load();
    //"http://horse.com/admin/Fotos"
    //table.ajax.url("http://horse.com/admin/Fotos").load();
    -- }}

            @endif-->
--}}
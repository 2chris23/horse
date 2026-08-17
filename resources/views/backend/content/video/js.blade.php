@php($user = isset($user)?$user:null)
@php($stud = !empty($user)?$user->Yeguada():null)
@php($tiempoaviso = 60000)
@if(!empty($cd))
    <script>
        @endif

        function envio(form, url) {
            axios.post(url, form)
                .then(function (response) {
                    var r = response;
                    var el = r.data.el;
                    console.dir(r);
                    console.dir(r.data);
                    console.dir(r.data.el);
                    if (el === null) console.log('solo null');
                    if (el === 'null') console.log('solo texto null');
                    {{--//https://www.youtube.com/watch?v=XFRfrPkfghY--}}
                    if (el !== null) {

                        $('#video').append("<div class='col-3 m-t-20'>" + r.data.el + "</div>");
                        cargarimagenes();

                        swal(
                            '{!! Funciones::ReemplazarApostrofe(trans('users.applychange')) !!}',
                            r.data.sms,
                            'success'
                        );
                    } else {
                        swal({
                            title: '{!! Funciones::ReemplazarApostrofe(trans('users.tittleerror')) !!}',
                            html: r.data.sms + '<br>',
                            type: 'error',
                            confirmButtonColor: '#4fb7fe'
                        });
                    }


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
                    console.dir(data);
                    var s = $.parseJSON(data);
                    $('#video').append(s.el);


                    swal(
                        '{!! Funciones::ReemplazarApostrofe(trans('users.applychange') !!}',
                        s.sms,
                        'success'
                    )
                },
                error:
                    function (xhr, status, error) {
                        var err = eval(xhr.responseText.sms);
                        var v = $.parseJSON(xhr.responseText);
                        swal({
                            title: '{!! Funciones::ReemplazarApostrofe(trans('users.tittleerror') !!}',
                            html: '{!! Funciones::ReemplazarApostrofe(trans('users.someerror') !!}<br>' + v.sms,
                            type: 'error',
                            confirmButtonColor: '#4fb7fe'
                        });
                    }
            });
            --}}
        }

        function savevideo(url) {
            var form = new FormData();
            {{--//var description = $('#input_stud_description');--}}
            var description = $('#input_stud_video').val();
            form.append('video', description);

            swal({
                title: '{!! Funciones::ReemplazarApostrofe(trans('users.usure')) !!}',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.yes')) !!}',
                cancelButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.no')) !!}',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonColor: '#4fb7fe',
                html: '{!! Funciones::ReemplazarApostrofe(trans('video.videoconfirmation')) !!}<br>',
                cancelButtonColor: '#EF6F6C',
                buttonsStyling: false
            }).then(function () {
                envio(form, url);
                $('#input_stud_video').val('');
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

        $(document).on('ready', function () {
            $(function () {
                $("#video").sortable({
                    stop: function (ui, event) {
                        getvideos('#video');
                    }
                }).disableSelection();
            });

            {{--// =============start gallery2 js==========--}}
            var gallery2 = $("#gallery2").unitegallery({
                gallery_theme: "video",
                gallery_width: 1100,
                gallery_height: 600,

            });
            {{--// api.resize(width, height)
            // =============end gallery2 js==========--}}
            $("#menu-toggle").on("click", function () {
                setTimeout(function () {
                    gallery2.resize();
                }, 400);
            });

        });


        @if(!empty($cd))
    </script>
@endif

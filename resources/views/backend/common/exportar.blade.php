@php($nom['olx']='https://logodownload.org/wp-content/uploads/2016/10/olx-logo-3.png')
@php($nom['divendo']=url('anuncios/divendo.png'))
@php($nom['anunciate']=url('anuncios/anuncit.png'))
@php($nom['anunciate']=url('anuncios/anuncit.png'))
@php($nom['casinuevo']='https://static.casinuevo.net/images/consejos/20170301220310.png')
@php($nom['mitula.net']=url('anuncios/mitula.png'))
@php($nom['venderya.es']=url('anuncios/venderya.png'))
@php($nom['trovit']=url('anuncios/logo.gif'))
@php($nom['milauncios']='https://static.milanuncios.com/imagenes/logo.png')
@php($nom['google.com']='http://brandemia.org/sites/default/files/logo_google_nuevo_portada.jpg')
@php($n['HorsesWorldSale.com']=url("landing/images/basic/logo.png"))
@php($avisoventa="Esta función pronto estará disponible para que publiques tu caballo en muchos portales y aumentes tus ventas!")

<script>


    function exportar(id) {

        var text = '<div class="col-12 row">' +
            '<div class="col-3"></div><div class="col-6">' +
            '<figure class="img-fluid portales">' +
            '<img src="{!! url("landing/images/basic/logo.png") !!}" alt="HorsesWorldSale" class="img-fluid">' +
            '</figure>' +
            '</div>' +
                @foreach($nom as $k=>$v)
                        {{-- Fin --}}
                        {{--'<div class="col-12 row">'+--}}

                    '<div class="col-4 text-center ">'+
            '<div class=" {{--@if($k == 'divendo' or $k=='trovit') portalok @else portalesno @endif--}}">' +
                     
            '<figure class="img-fluid portales ">' +
            '<img src="{!! $v !!}" alt="{!! $v !!}" class="img-fluid">' +
            '</figure>' +
            {{--'{!! $k !!}'--}}
            '</div>' +
            '</div>' +
                {{--
                '<div class="col-9">'+
                '{!! $k !!}'+
                '</div>'</div>'+'+
                    --}}

                        {{-- Fin --}}
                        @endforeach
                    '<div class="col-12 text-center"> {!! $avisoventa !!} </div>'+
                    '</div>';

        var url = "{!! route('exportar.caballo') !!}" + "/" + id;
        swal({
            title: 'Exporta tu Caballo',
            {{-- //type: 'info', --}}
            html: text,
            showCloseButton: true,
            showCancelButton: false,
            showConfirmButton: false,
            {{-- // There won't be any confirm button --}}
            confirmButtonColor: '#fa6900',
            focusConfirm: false,
            confirmButtonText: 'Publicar',
            confirmButtonAriaLabel: 'Thumbs up, great!',
            cancelButtonText: '{!! trans('users.cancel') !!}',
            cancelButtonAriaLabel: 'Thumbs down',
        }).then(function () {
            window.location.href = url;


        });

    }
</script>
@extends('frontend.landing.studs.base',['user'=>$user,'stud'=>$stud])
@section('title', trans('Titulos.VentaCliente'))
@php
    $logobasic= url("landing/images/basic/logo.png");
        $logo =$stud->getLogo();
        $espanol =  url("landing/img/es.png");
        $english =  url("landing/img/en.png");

        /*slider*/
        $dummy = url("landing/images/dummy.png");
        /*slider 1*/
        $text1 = "LA APLICACIÓN DE CABALLOS QUE TE HARA LAS COSAS MÄS FACIL PARA GESTIONAR TU NEGOCIO";
        $stext1 ="¡INSCRÍBETE CON NOSOTROS YA!";

        $text2 = '2 LA APLICACIÓN DE CABALLOS QUE TE HARA LAS COSAS MÄS FACIL PARA GESTIONAR TU NEGOCIO';
        $stext2 ='LAS COSAS MÄS FACIL PARA GESTIONAR TU NEGOCIO';

        $horseapp ='LA APLICACIÖN DE CABALLOS QUE TE HARA LAS COSAS MÄS FACIL PARA GESTIONAR TU NEGOCIO';
        $horseinscription ="¡INSCRÍBETE CON NOSOTROS YA!";

        $tittlehorsewordsale ='Horses Word Sale';
        $contenido ="Este contenido es de prueba";
        $contenido2 ="Caballos, ventas";
        $login = "Iniciar sesion";
        $imgother3 = url("landing/images/other/3.png");

$d[0]= url("landing/images/slider/1/2.jpg");
$d[1]= url("landing/images/slider/1/1.jpg");
$d[2]= url('frontend/img/slides/s3.jpg');
$d[3]= url('frontend/img/gallery/img-2.jpg');
$d[4]= url('frontend/img/gallery/img-3.jpg');
$d[5]= url('frontend/img/gallery/img-4.jpg');
$d[6]= url('frontend/img/gallery/img-5.jpg');
$d[7]= url('frontend/img/slides/s1.jpg');
$d[8]= url('frontend/img/slides/s2.jpg');
$d[9]= url('frontend/img/slides/s3.jpg');
$text[0]= "{!! trans('users.fake.0') !!}";
$text[1]= "{!! trans('users.fake.1') !!}";
$text[2]= "{!! trans('users.fake.2') !!}";
$text[3]= "{!! trans('users.fake.3') !!}";
$stext[0]= "{!! trans('users.fake.0') !!}";
$stext[1]= "{!! trans('users.fake.1') !!}";
$stext[2]= "{!! trans('users.fake.2') !!}";
$stext[3]= "{!! trans('users.fake.3') !!}";


for($i = 0;$i<20;$i++){
$d[$i]= url('img/horse/'.($i+1).'.jpg');
$t[$i] = $text[rand(0,3)];
$st[$i] = $stext[rand(0,3)];
}

$text[0]= "Descripcion corta 1";
$text[1]= "Descripcion corta 2";
$text[2]= "Descripcion corta 3";
$text[3]= "Descripcion corta 4";
$text[4]= "";
$text[5]= "";
$text[6]= "";
$text[7]= "";
$text[8]= "";
$text[9]= "";
$stext[0]= "{!! trans('users.fake.0') !!}";
$stext[1]= "{!! trans('users.fake.1') !!}";
$stext[2]= "{!! trans('users.fake.2') !!}";
$stext[3]= "{!! trans('users.fake.3') !!}";
$stext[4]= "";
$stext[5]= "";
$stext[6]= "";
$stext[7]= "";
$stext[8]= "";
$stext[9]= "";
$web = (isset($web))?$web:trans('portal.sell');
$sweb = (isset($sweb))?$sweb:trans('portal.sellhorse');
$error = (!empty(\Session::get('error') ))?\Session::get('error') :null;
//$error = \Session::all() ;

@endphp

@section('fbheader')
    @include('meta',
[
'titulo' => $stud->getTituloWeb(),
'descripcion'=>$stud->getSeodescripcion(),
'key'=>$stud->words,
'logo'=>$logo,
'imagenes' =>$stud->getPhotosModel(),
])
@endsection


@section('csstop')


@endsection
@section('content')

    @include('frontend.landing.studs.partials.principal',['stud'=>$stud,'titulo'=>$web,'texto'=>$sweb])
    @if(!empty($error))
        <div class="col-xs-12 text-center">
            <div class="alert alert-warning text-center">
                {!! $error !!}
            </div>
        </div>
    @endif


    <div class="grid-cause-area">
        <div class="container">
            <div class="row">
                @if(count($horses)!=0)
                    @foreach($horses as $k=>$v)

                        @php
                            $foto = $v->getPhotoModel()->first();
                            $url = (!empty($foto))?$foto->getUrl():'';
                                $rd = rand(0,3);

                                $color = $v->getColorString();

                        //$color = (!empty($color))?$color->name:null;
    $link =route('MyHorseDetailed',['stud'=>$stud->slug,'horse'=>$v->slug]);

                        if($venta == 1) $link =route('MySellDetailSell',['stud'=>$stud->slug,'horse'=>$v->slug]);

                        @endphp
                        {{-- {!! dd($v) !!} Route::get('/{stud?}/{horse?}', 'StudController@DetailedHorse')->name('MyHorseDetailed');--}}

                        @include('frontend.landing.studs.partials.sellcard',[
            'link'=>$link,
            'id'=> $v->id,
            'url'=> $url,
            'titulo'=> $v->getName(),
            'raza'=> $v->getRaza(),
            'stitulo'=>$text[rand(0,3)],
            'alzada'=>$v->getRaisedFormat(),
            'edad'=>$v->getAge(),
            'horse'=>$v,
            'color'=>$color,

            ])
                        {{--'stitulo'=>$v->getDescripcion(),--}}

                    @endforeach
                @else

                    <div class="text-center row " style="height:360px;
    min-height: 100px;
    max-height: 337px;
">
                        <div class="col-offset-3 col-6 f-s-16 " style="padding-bottom:30px">
                            {!! trans('portal.nohorse') !!}
                        </div>
                        {{--
                        <figure>
                            <img src="{!! $stud->getLogo(); !!}" alt="" class="img-responsive">
                        </figure>
                        --}}
                        <a href="{!! route('MyContact',['slug'=>$user->getMySlug()]) !!}"
                           class="btn-contact coorp p-l-10"
                           @if(!empty($stud->getColor()))
                           style="
                                   color: {!! $stud->getColor() !!};
                                   "
                                @endif


                        >
                            {!! trans('stud.contact') !!}
                        </a>

                    </div>


                @endif
            </div>
            {{--
            <div class="pagination-wrapper">
                <ul class="pagination">
                    <li><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#" class="active">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><span>...</span></li>
                    <li><a href="#">7</a></li>
                    <li><a href="#">8</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                </ul>
            </div>
            --}}
        </div>
    </div>
    {{--
    @if(count($horses)== 0)
        <div class="grid-cause-area">
            <div class="container">
                <div class="row">

                </div>

            </div>
        </div>
    @endif
    --}}

@endsection
@section('js')
    <script>
        {{--
        $('.info-block').readmore({
            speed: 500, collapsedHeight: 100,
            moreLink: '<a href="#">Lee mas</a>',
            lessLink: '<a href="#">Lee Menos</a>',
        });
        --}}
    </script>
@endsection
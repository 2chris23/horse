@php($stud = \Auth::user()->Yeguada())
@php($etiquetalabel = "col-xs-12 col-sm-12 col-md-12 col-lg-3 text-sm-left text-md-left text-lg-right ")
@php($tiquetainput = " col-xs-12 col-sm-12 col-md-12 col-lg-9 ")

@extends('backend.layouts.base')
@section('title', trans('Titulos.Tema') )
@section('topcss')

    <link type="text/css" rel="stylesheet" href="{!! route('ThemesCss')!!}"/>
@endsection
@section('content')
    @php
        $aguapre=0;
            $img=[];
            $img[0]=url('img/plantillas/base.png');
            $img[1]= url('img/plantillas/tema2.png');
            $img[2]= url('img/plantillas/base45.jpeg');
            $img[2]= url('img/plantillas/tema3.jpg');
            $img[3]= url('img/plantillas/base2.jpg');
            $img[3]= url('img/plantillas/t2.jpg');
            $img[4]= url('img/plantillas/base3.png');
            $img[5]= url('img/plantillas/base4.jpeg');
    $img[6]= url('img/plantillas/base45.jpeg');
    $img[7]= url('img/plantillas/base2.jpg');

    @endphp
    <div class=" col-3 pull-right ">
        <a href="{!! route('gallery.index') !!}"
           class=" btn btn-warning pull-right ">
            {!! trans('users.return') !!}</a>
    </div>
    {{--http://nitinhayaran.github.io/Justified.js/demo/index.html --}}


    <div class="col-12 row">

        @php($myds = \Auth::user()->Yeguada()->getDesing())
        @foreach($img as $k=>$v)

            @php
                if($myds == $k){
                $aguapre = 1;
                }else{
                $aguapre =0;}
            @endphp
            <div class="col-xs-12 col-md-6 col-lg-3 col-xl-3 m-t-35">
                <div class="card @if($aguapre == 1) selected  @endif">
                    <div class="card-header bg-white p1">
                    <span class="card-title">
                         {!! trans('desing.plantilla',['n'=>$k +1]) !!}
                    </span>
                        {{--
                            <span class="float-right">
                                <i class="fa fa-close"></i>
                                <i class="fa fa-pencil edito"></i>
                                <i class="fa fa-chevron-up"></i>
                                <i class="fa fa-tint"></i>
                                <i class="fa fa-arrows-alt"></i>
                            </span>
                            --}}
                    </div>
                    <div class="card-block">
                        <form action="" id="th{!! $k !!}" class="row predeterminadrmarca  "
                              data-check="{!! $aguapre !!}" data-id="{!! $k !!}">
                            <input type="hidden" name="themesel[{!! $k !!}]" id="themesel" class="themesel"
                                   value="{!! $aguapre !!}">
                            <input type="hidden" class="url" value="{!! route('ThemesPost') !!}">
                            <div class="corte col-12 form-group row m-t-35"
                                 @if($k >1) onclick="PruebaTemplte({!! $k !!},'{!! $v !!}')"
                                 @else onclick="$('th{!! $k !!}').click()" @endif>
                                <figure
                                        {{--@if($k >1) onclick="PruebaTemplte({!! $k !!},'{!! $v !!}')"
                                        @else onclick="$('th{!! $k !!}').click()"
                                        @endif--}}
                                        @if($k<3)
                                        onclick="PruebaTemplte({!! $k !!},'{!! $v !!}')"
                                        @endif
                                >
                                    <img lsrc="{!! $v !!}" alt=""
                                         class="img-responsive img-fluid  mx-auto d-block hidden"
                                         @if($k <3) onclick="PruebaTemplte({!! $k !!},'{!! $v !!}')"
                                         @else onclick="$('th{!! $k !!}').click()" @endif>
                                </figure>
                            </div>
                            <div class="col-12"></div>
                            <div class="col-12  m-t-20  pull-right text-right">
                                <a href="#th{!! $k !!}"
                                   onclick="PruebaTemplte({!! $k !!},'{!! $v !!}')"
                                   {{--class="btn btn-nice @if($aguapre == 1) btn-danger @else btn-warning @endif hidden-xs-up" >--}}
                                   class="btn btn-warning m-t-20 "
                                >
                                    {!! trans('desing.plantillaver') !!}
                                </a>
                                @if($k<3)
                                    <a href="#th{!! $k !!}"
                                       onclick="EnviarPlantilla({!! $k !!})"
                                       class="btn  m-t-20 @if($aguapre == 1) btn-danger @else btn-warning @endif textos"
                                    >
                                        @if($aguapre == 1) {!! trans('desing.plantillaselect') !!} @else {!! trans('desing.change') !!} @endif
                                    </a>
                                @else
                                    <a href="#th{!! $k !!}"
                                       class="btn  m-t-20 p-l-r-5 @if($aguapre == 1) btn-danger @else btn-warning @endif ">
                                        {!! trans('desing.plantillanext') !!}
                                    </a>
                                @endif

                            </div>

                        </form>
                    </div>
                    <div class="bloqueo"></div>
                </div>
            </div>
        @endforeach


    </div>
    <div class="hidden-xs-up">
        <a
                class="btn btn-success btn-md adv_cust_mod_btn hidden-xs-up"
                id="btnmod" data-toggle="modal"
                data-href="#responsive" href="#responsive"></a>
    </div>



    <!--- responsive model -->
    <div class="modal fade in display_none" id="responsive" tabindex="-1" role="dialog" style="display: none;"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h4 class="modal-title text-white">
                        {!! trans('desing.camnioeste') !!}

                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 modal-img" id="targetimga">
                            <figure>
                                <img src="" alt="" class="img-fluid mx-auto d-block" id="imgtarget">
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="closemod" data-dismiss="modal" class="btn btn-secondary">
                        {!! trans('desing.close') !!}
                    </button>
                    <button type="button" id="btnmod1" class="btn btn-success">
                        {!! trans('desing.plantillanext') !!}
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- END modal-->
@endsection
@section('bottomjs')
    <script src="{!!route('ThemesJs') !!}"></script>

@endsection

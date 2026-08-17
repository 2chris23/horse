@extends('frontend.landing.v1.base')
@section('fbheader')
    @include('meta',
      [
  'titulo' => $stud->getTituloWeb(),
  'descripcion'=>$stud->getSeodescripcion(),
'key'=>$stud->words,
  'logo'=>$stud->getLogo(),
  'imagenes' =>$stud->getPhotosModel(),
      ])

@endsection
@section('title', trans('Titulos.Contactoliente'))
@section('content')

    @include('frontend.landing.v1.partials.baner',['texto'=>trans('stud.contact'),'clase'=>'contact-banner','stex'=>trans('stud.subtext')])
    <section id="action" class="action roomy-100">
        <div class="container">
            <div class="row">
                <div class=" col-xs-offset-3 col-xs-6 m-t-20">
                    @include('flash::message')
                </div>
                <div class="main_action text-center">
                    <div class="col-md-4">
                        <div class="action_item">
                            <i class="fa fa-map-marker"></i>
                            <h4 class="text-uppercase m-top-20">{!! trans('personal.attrib.address') !!}</h4>
                            <p> {!! $stud->getAddress() !!}, {!! $stud->getCity() !!}
                                , {!! $stud->getStateModel()->name!!}
                                , {!! $stud->getCountryModel()->name !!}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="action_item">
                            <i class="fa fa-headphones"></i>
                            <h4 class="text-uppercase m-top-20">{!! trans('personal.attrib.phone') !!}</h4>
                            @php($cd =0)
                            <p>@foreach($stud->getPhoneModel() as $k=> $v)
                                    @if($v->isNull() !== true)
                                        @if($cd == 0)
                                            <a href="tel:{!! $v->getFormatNumberOnly() !!}" class="no-color">
                                                <span class="no-color"> {!! $v->FormatNumber() !!} </span>
                                            </a> @php($cd = 1) @endif @endif @endforeach
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="action_item">
                            <i class="fa fa-envelope-o"></i>
                            <h4 class="text-uppercase m-top-20">{!! trans('personal.attrib.email') !!}</h4>
                            <p>{!! $stud->getEmail() !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="map" class="map">
        <div class="ourmap"></div>
    </div>

    <section id="contact" class="contact fix">
        <div class="container">
            <div class="row">
                <div class="main_contact p-top-100 pb-85">
                    <form class="col-md-8 sm-m-top-30 row " action="{!! route('contacto.accion') !!}" method="post">
                        <input type="hidden" value="{!! csrf_token() !!}" id="_token" name="_token">
                        <input type="hidden" value="{!! $stud->id !!}" id="stud" name="stud">
                        <div class="col-sm-12 col-md-4 ">
                            <div class="form-group">
                                <label>
                                    {!! trans('stud.namecontact') !!} *
                                </label>
                                <input name="name" class="form-control" type="text"
                                       placeholder="{!! trans('stud.namecontactplace') !!}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label>
                                    {!! trans('stud.emailcontact') !!} *
                                </label>
                                <input name="email" class="form-control" type="text"
                                       placeholder="{!! trans('stud.emailcontactplace') !!}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label>
                                    {!! trans('stud.phonecontact') !!}
                                </label>
                                <input name="phone" class="form-control numbers" type="tel"
                                       placeholder="{!! trans('stud.phonecontactplace') !!}">
                            </div>
                        </div>

                        <div class="col-xs-12">
                            <div class="form-group">
                                <label>
                                    {!! trans('stud.smscontact') !!} *
                                </label>
                                <textarea name="message" class="form-control" rows="6"
                                          placeholder="{!! trans('stud.smscontactplace') !!}"></textarea>
                            </div>
                            <div class="form-group">
                                <a href="" class="btn btn-default coorp">
                                    {!! trans('stud.send') !!}
                                    <i class="fa fa-long-arrow-right"></i>
                                </a>
                            </div>
                        </div>


                    </form>

                    <div class="col-md-4">
                        <div class="contact_img">
                            <img lsrc="{!! $stud->getLogo() !!}" alt="{!! $stud->getName() !!}"
                                 class="img-responsive hidden  lazy"/>
                        </div>
                        <div class="col-xs-12 text-center text-small">
                            {!! trans('tema1.whorwithus',['link'=>route('TrabajoIndex',['slug'=>$stud->slug])]) !!}


                        </div>
                    </div>


                </div>
            </div><!--End off row -->
        </div><!--End off container -->
    </section><!--End off Contact Section-->


@endsection

@section('js')
    
    
    <script>
        

    </script>


@endsection

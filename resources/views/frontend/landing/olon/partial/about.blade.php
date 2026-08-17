@php($titulo = isset($title)?$title:null)
@php($description = isset($description)?$description:null)
@php($detalles = isset($detalles)?$detalles:null)
<!-- About Section -->
<section id="about">
    <div class="container content-section text-center">
        <div class="row">
            <h2>
                {!! $titulo !!}
            </h2>
            @if(empty($detalles))
                <div class="col-lg-8 col-lg-offset-2">

                    {!! $description !!}

                    {{--
                    <p>
                        <a href="#" class="btnghost"><i class="fa fa-download"></i> Curriculum Vitae</a>
                    </p>
                    --}}
                </div>
            @else
                <div class="col-lg-8 col-lg-offset-2">

                    <div class="person_details m-top-20 ">
                        @php($left = "col-xs-6 text-right")
                        @php($right = "col-xs-6 text-left")
                        @if($horse->sold == 1)
                            <div class="sold sold-n sold-s"></div>
                        @endif
                        <div class="row   ">
                            <div class="{!! $left !!}">
                                {!! trans('portal.raza') !!}:
                            </div>
                            <div class="{!! $right !!}">
                                {!! trans('horse.raza.'.$horse->raza) !!}
                            </div>
                        </div>
                        <div class="row   ">
                            <div class="{!! $left !!}">
                                {!! trans('portal.age') !!}:
                            </div>
                            <div class="{!! $right !!}">
                                @if($edad!=0)
                                    {!! trans('horse.years',['ano'=>$edad]) !!}
                                @else
                                    {!! trans('horse.mes',['mes'=>$mes]) !!}
                                @endif
                            </div>
                        </div>
                        <div class="row   ">
                            <div class="{!! $left !!}">
                                {!! trans('stud.text.raised') !!}:
                            </div>
                            <div class="{!! $right !!}">
                                {!! $horse->getRaisedFormat() !!}
                            </div>
                        </div>
                        <div class="row   ">
                            <div class="{!! $left !!}">
                                {!! trans('portal.sex') !!}:
                            </div>
                            <div class="{!! $right !!}">
                                {!! trans('horse.sex.'.$horse->sex )!!}
                            </div>
                        </div>
                        <div class="row   ">
                            <div class="{!! $left !!}">
                                {!! trans('horse.attrib.color') !!}:
                            </div>
                            <div class="{!! $right !!}">
                                {!! trans('horse.color.'.$horse->color) !!}
                            </div>
                        </div>
                        @if(!empty($horse->getStud() ))
                            @if($horse->getStud() !='')
                                <div class="row text-left  ">
                                    <div class="col-xs-6 ">
                                        {!! trans('horse.text.stud') !!}:
                                    </div>
                                    <div class="col-xs-6 ">
                                        {!! $horse->getStud() !!}
                                    </div>
                                </div>
                            @endif
                        @endif
                        <div class="row   ">
                            <div class="{!! $left !!}">
                                {!! trans('portal.doma') !!}:
                            </div>
                            <div class="{!! $right !!}">
                                @if($horse->getDoma() != 1 )
                                    {!! trans('horse.doma.0' )!!}
                                @else
                                    {!! trans('horse.doma.'.$horse->doma )!!}
                                @endif

                            </div>
                        </div>
                        @if(!empty($horse->getGenealogia()))
                            <div class="row text-left  ">
                                <div class="col-xs-6 ">
                                    {{trans('horse.text.genealogia')}}:
                                </div>
                                <div class="col-xs-6 ">
                                    <a href="{!! url($horse->getGenealogia()) !!}" target="_blank">
                                        {!! trans('tema1.ficha') !!}
                                    </a>
                                </div>
                            </div>
                        @endif
                        @if(!empty($horse->tocubri))
                            <div class="row   ">
                                <div class="{!! $left !!}">
                                    {!! trans('horse.text.cubricion') !!}:
                                </div>
                                <div class="{!! $right !!}">
                                                    <span class="mone no-color"

                                                            @include('backend.common.toolmoneda',['horse'=>$horse,'c'=>1])
                                                    >
                                                         {!! $horse->ObtenPrecioMonedaMill() !!}
                                                        <span class="coinl coinl-local">
                        {!! $horse->getSimboloMoneda() !!}
                    </span>
                                                        {{--
                                                {!!Funciones::AjustarNumeroMil($horse->getCubriPrice())   !!}
                                                        <i class="fa fa-eur"></i>
                                                        --}}
                                            </span>
                                </div>
                            </div>
                        @endif
                        @if($horse->getTosold() == true)
                            <div class="row   ">
                                <div class="{!! $left !!}">
                                    {!! trans('portal.price') !!}:</p>
                                </div>
                                <div class="{!! $right !!}">
                                    @if( $horse->sold == 1)
                                        {!! trans('users.sold') !!}
                                    @else
                                        @if(empty($horse->getPrice()))
                                            <span class="consulta no-color">
                                                    {!! trans('users.pricecheck') !!}
                                                </span>
                                        @else
                                            <span class="mone no-color"
                                                    @include('backend.common.toolmoneda',['horse'=>$horse,'p'=>1])
                                            >
                                                        {!! Funciones::AjustarNumeroMil($horse->getPrice()) !!}
                                                <i class="fa fa-eur"></i>
                                                    </span>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        @endif
                        <div class="col-xs-12">
                            {!! $description !!}
                        </div>

                        {{--
                    <div class="col-md-12 col-xs-12  text-center">
                        <button type="button" class="btn m-top-20 btn-special-black"
                                data-toggle="modal"
                                data-target=".price-quote">
                            {!! trans('portal.emailcontact') !!}
                        </button>
                    </div>
                        --}}
                        <div class="col-xs-12  m-top-20 text-center">
                            <div class=" col-md-6 col-xs-12 m-w-100 text-right">
                                <figure>
                                    <img src="{!! $horse->getYeguada()->getLogo() !!}"
                                         alt="{!! $horse->getYeguada()->getName() !!}"
                                         class="img-responsive pull-right">
                                </figure>
                            </div>
                            <div class="col-md-6 col-xs-12 text-left">
                                <div class="col-xs-12 text-tittle">
                                    <a class="hover-color" href="#">
                                        {!! $horse->getStudName() !!}
                                    </a>
                                </div>
                                @if(!empty($stud->getAddress()))
                                    <div class="m-top-10 col-xs-12 fix-text-200">
                                        {!! $stud->getAddress() !!}, {!! $stud->getCity() !!}
                                        , {!! $stud->getStateModel()->name!!}
                                        , {!! $stud->getCountryModel()->name !!}
                                        {{--{!! trans('portal.pubdate',['date'=>Funciones::AjustarFechaDmy($horse->created_at)]) !!}--}}
                                    </div>
                                @endif
                                <div class="m-top-10 col-xs-12 fix-text-200">

                                    <span class="no-color"> {!! $stud->getEmail() !!} </span>

                                </div>
                                @php($cd = 0)
                                @foreach($stud->getPhoneModel() as $k=> $v)
                                    @if($v->isNull() !== true)
                                        @if($cd == 0)
                                            <div class="m-top-10 col-xs-12 fix-text-200">
                                                <a href="tel:{!! $v->getFormatNumberOnly() !!}"
                                                   class="no-color">
                                                    <span class="no-color"> {!! $v->FormatNumber() !!} </span>
                                                </a></div>
                                            @php($cd = 1)
                                        @endif
                                    @endif
                                @endforeach


                            </div>


                        </div>


                    </div>
                    <div class="col-xs-12 row text-center m-top-20">
                        <div class=" col-xs-12 col-md-4 text-center">
                            @if(!empty($prev))
                                <a href="{!! $prev !!}"
                                   class="btn btnghost btn-lg">
                                    <i class="fa fa-long-arrow-left"></i>
                                    {!! trans('portal.back') !!}

                                </a>
                            @endif

                        </div>
                        <div class=" col-xs-12 col-md-4 text-center">
                            <a href="{!! route('MyHorsesV1',['slug'=>$user->getMySlug()]) !!}"
                               class="btn btnghost btn-lg">
                                {!! trans('users.return') !!}
                            </a>
                        </div>
                        <div class=" col-xs-12 col-md-4 text-center ">
                            @if(!empty($next))
                                <a href="{!! $next !!}"
                                   class="btn btnghost btn-lg">
                                    {!! trans('portal.next') !!}
                                    <i class="fa fa-long-arrow-right"></i>
                                </a>
                            @endif

                        </div>

                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

<section id="ourPakeg" class="ourPakeg">
    <div class="container">
        <div class="main_pakeg_content">
            <div class="row">
                <div class="head_title text-center">
                    <h4>{!! trans('stud.ouranimal') !!}</h4>
                </div>
                @php($caballos = $stud->Horses()->get())
                
                @for($i=0;$i<count($caballos);$i++)
                    @php($p = $i%2)
                    @php($t = $caballos[$i])
                    @php
                        $f = $t->getPhotoFirstModel();
                        $foto = '';
                            if(!empty($f)){
                                $foto = $f->getUrl();
                            }
                        $edad = $t->getAge();
                        $mes = $t->getAgeMonth();
                        $sold = ($t->sold == 1) ?'sold':'';
                    @endphp
                    @if($p==0)
                        <div class="single_pakeg_one text-right wow rotateInDownRight pak"
                             style="background:url({!! $foto !!}) left center no-repeat;">
                            <div class="col-md-6 col-md-offset-6 col-sm-6 col-sm-offset-6 peq">
                                <div class="single_pakeg_text">
                                    <div class="pakeg_title">
                                        <h4>{!! $t->getName() !!}</h4>
                                    </div>
                                    <div class="row text-left ">
                                        <div class="col-xs-6 ">
                                            {!! trans('portal.raza') !!}:
                                        </div>
                                        <div class="col-xs-6 ">
                                            {!! trans('horse.raza.'.$t->raza) !!}
                                        </div>
                                    </div>
                                    <div class="row text-left  ">
                                        <div class="col-xs-6 ">
                                            {!! trans('portal.age') !!}:
                                        </div>
                                        <div class="col-xs-6 ">
                                            @if($edad!=0)
                                                {!! trans('horse.years',['ano'=>$edad]) !!}
                                            @else
                                                {!! trans('horse.mes',['mes'=>$mes]) !!}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row text-left  ">
                                        <div class="col-xs-6 ">
                                            {!! trans('stud.text.raised') !!}:
                                        </div>
                                        <div class="col-xs-6 ">
                                            {!! $t->getRaisedFormat() !!}
                                        </div>
                                    </div>
                                    <div class="row text-left  ">
                                        <div class="col-xs-6 ">
                                            {!! trans('portal.sex') !!} :
                                        </div>
                                        <div class="col-xs-6 ">
                                            {!! trans('horse.sex.'.$t->sex )!!}
                                        </div>
                                    </div>
                                    <div class="row text-left  ">
                                        <div class="col-xs-6 ">
                                            {!! trans('horse.attrib.color') !!}:
                                        </div>
                                        <div class="col-xs-6 ">
                                            {!! trans('horse.color.'.$t->color) !!}
                                        </div>
                                    </div>
                                    @if(!empty($t->getStud() ))
                                        @if($t->getStud() !='')
                                            <div class="row text-left  ">
                                                <div class="col-xs-6 ">
                                                    {!! trans('horse.text.stud') !!}:
                                                </div>
                                                <div class="col-xs-6 ">
                                                    {!! $t->getStud() !!}
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                    <div class="row text-left  ">
                                        <div class="col-xs-6 ">
                                            {!! trans('portal.doma') !!}:
                                        </div>
                                        <div class="col-xs-6 ">
                                            @if($t->getDoma() != 1 )
                                                {!! trans('horse.doma.0' )!!}
                                            @else
                                                {!! trans('horse.doma.'.$t->doma )!!}
                                            @endif
                                        </div>
                                    </div>
                                    @if(!empty($t->getGenealogia()))
                                        <div class="row text-left  ">
                                            <div class="col-xs-6 ">
                                                {{trans('horse.text.genealogia')}}:
                                            </div>
                                            <div class="col-xs-6 ">
                                                <a rel="nofollow" href="{!! url($t->getGenealogia()) !!}"
                                                   target="_blank">
                                                    {!! trans('tema1.ficha') !!}
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                    @if(!empty($t->tocubri))
                                        <div class="row text-left  ">
                                            <div class="col-xs-6 ">
                                                {!! trans('horse.text.cubricion') !!}:
                                            </div>
                                            <div class="col-xs-6 ">
                                                <span class="mone no-color" @include('backend.common.toolmoneda',['precio'=>$t->ObtenPrecioCubricionMoneda()])>
                                                 {!! $t->ObtenPrecioMonedaMill() !!}
                                                    <span class="coinl coinl-local">
                        {!! $t->getSimboloMoneda() !!}
                    </span>
                                                    {{--
                                                    {!!Funciones::AjustarNumeroMil($t->getCubriPrice())   !!}
                                                    <i class="fa fa-eur"></i>
                                                    --}}
                                                </span>
                                            </div>
                                        </div>
                                    @endif
                                    @if($t->getTosold() == true)
                                        <div class="row text-left  ">
                                            <div class="col-xs-6 ">
                                                {!! trans('portal.price') !!}:</p>
                                            </div>
                                            <div class="col-xs-6 ">
                                                @if( $t->sold == 1)
                                                    {!! trans('users.sold') !!}
                                                @else
                                                    @if(empty($t->getPrice()))
                                                        <span class="consulta no-color">
                                                            {!! trans('users.pricecheck') !!}
                                                        </span>
                                                    @else
                                                        <span class="mone no-color" @include('backend.common.toolmoneda',['precio'=>$t->getPrice()]) >
                                                            {!! Funciones::AjustarNumeroMil($t->getPrice()) !!}
                                                            <i class="fa fa-eur"></i>
                                                        </span>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                    <div class="text-center m-t-15">
                                        <a rel="nofollow" href="la-esmeralda/detalle/{!! $t->getName() !!}"
                                           class="btn btn-primary"
                                           onclick="reloade('{!! route('MyHorseDetailed',['stud'=>$stud->slug,'horse'=>$t->slug]) !!}')">
                                            ver más </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($p!=0)
                        <div class="single_pakeg_two text-left wow rotateInDownLeft"
                             style="background:url({!! $foto !!}) right center no-repeat;">
                            <div class="col-md-6 col-sm-6 peq">
                                <div class="single_pakeg_text">
                                    <div class="pakeg_title">
                                        <h4>{!! $t->getName() !!}</h4>
                                    </div>
                                    <div class="row text-left  ">
                                        <div class="col-xs-6 ">
                                            {!! trans('portal.raza') !!}:
                                        </div>
                                        <div class="col-xs-6 ">
                                            {!! trans('horse.raza.'.$t->raza) !!}
                                        </div>
                                    </div>
                                    <div class="row text-left  ">
                                        <div class="col-xs-6 ">
                                            {!! trans('portal.age') !!}:
                                        </div>
                                        <div class="col-xs-6 ">
                                            @if($edad!=0)
                                                {!! trans('horse.years',['ano'=>$edad]) !!}
                                            @else
                                                {!! trans('horse.mes',['mes'=>$mes]) !!}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row text-left  ">
                                        <div class="col-xs-6 ">
                                            {!! trans('stud.text.raised') !!}:
                                        </div>
                                        <div class="col-xs-6 ">
                                            {!! $t->getRaisedFormat() !!}
                                        </div>
                                    </div>
                                    <div class="row text-left  ">
                                        <div class="col-xs-6 ">
                                            {!! trans('portal.sex') !!} :
                                        </div>
                                        <div class="col-xs-6 ">
                                            {!! trans('horse.sex.'.$t->sex )!!}
                                        </div>
                                    </div>
                                    <div class="row text-left  ">
                                        <div class="col-xs-6 ">
                                            {!! trans('horse.attrib.color') !!}:
                                        </div>
                                        <div class="col-xs-6 ">
                                            {!! trans('horse.color.'.$t->color) !!}
                                        </div>
                                    </div>
                                    @if(!empty($t->getStud() ))
                                        @if($t->getStud() !='')
                                            <div class="row text-left  ">
                                                <div class="col-xs-6 ">
                                                    {!! trans('horse.text.stud') !!}:
                                                </div>
                                                <div class="col-xs-6 ">
                                                    {!! $t->getStud() !!}
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                    <div class="row text-left  ">
                                        <div class="col-xs-6 ">
                                            {!! trans('portal.doma') !!}:
                                        </div>
                                        <div class="col-xs-6 ">
                                            @if($t->getDoma() != 1 )
                                                {!! trans('horse.doma.0' )!!}
                                            @else
                                                {!! trans('horse.doma.'.$t->doma )!!}
                                            @endif

                                        </div>
                                    </div>
                                    @if(!empty($t->getGenealogia()))
                                        <div class="row text-left  ">
                                            <div class="col-xs-6 ">
                                                {{trans('horse.text.genealogia')}}:
                                            </div>
                                            <div class="col-xs-6 ">
                                                <a rel="nofollow" href="{!! url($t->getGenealogia()) !!}"
                                                   target="_blank">
                                                    {!! trans('tema1.ficha') !!}
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                    @if(!empty($t->tocubri))
                                        <div class="row text-left  ">
                                            <div class="col-xs-6 ">
                                                {!! trans('horse.text.cubricion') !!}:
                                            </div>
                                            <div class="col-xs-6 ">
                                                <span class="mone no-color" @include('backend.common.toolmoneda',['precio'=>$t->ObtenPrecioCubricionMoneda()])>
                                                     {!! $t->ObtenPrecioMonedaMill() !!}
                                                    <span class="coinl coinl-local">
                        {!! $t->getSimboloMoneda() !!}
                    </span>
                                                    {{--
                                                    {!!Funciones::AjustarNumeroMil($t->getCubriPrice())   !!}
                                                    <i class="fa fa-eur"></i>
                                                    --}}
                                                </span>
                                            </div>
                                        </div>
                                    @endif
                                    @if($t->getTosold() == true)
                                        <div class="row text-left  ">
                                            <div class="col-xs-6 ">
                                                {!! trans('portal.price') !!}:</p>
                                            </div>
                                            <div class="col-xs-6 ">
                                                @if( $t->sold == 1)
                                                    {!! trans('users.sold') !!}
                                                @else
                                                    @if(empty($t->getPrice()))
                                                        <span class="consulta no-color">
                                                            {!! trans('users.pricecheck') !!}
                                                        </span>
                                                    @else
                                                        <span class="mone no-color" @include('backend.common.toolmoneda',['precio'=>$t->getPrice()]) >
                                                            {!! Funciones::AjustarNumeroMil($t->getPrice()) !!}
                                                            <i class="fa fa-eur"></i>
                                                        </span>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                    <div class="text-center m-t-15">
                                        <a rel="nofollow" href="la-esmeralda/detalle/{!! $t->getName() !!}"
                                           class="btn btn-primary"
                                           onclick="reloade('{!! route('MyHorseDetailed',['stud'=>$stud->slug,'horse'=>$t->slug]) !!}')">
                                            ver más </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endfor
            </div>
        </div>
    </div>
</section>
@php
    $moneda = '<i class="fa fa-eur"></i>';
    $Coins = \Session::get('moneda', 'USD');
    $j = 0;
@endphp

@foreach($horses as $i => $v)
    @php
        $foto = $v->getFirstFoto();
        $photo = $v->getPhotoModel();
        $url = (!empty($foto)) ? $foto->getUrl() : null;
        $color = $v->getColorString();
        $link = route('portalcaballo', ['slug' => $v->slug]);
        $titulo = $v->getName();
        $descripcion = $v->getDescripcion();
        $precio = $v->price;
        $altfoto = $v->getAltText();
        $raza = trans('horse.raza.' . $v->getRaza());
        $alzada = $v->getRaisedFormat();
        $edad = $v->getAge();
        $mes = $v->getAgeMonth();
    @endphp

    @if($j == 4)
        <div class="col-md-12 col-xs-12 col-sm-12">
            <section class="advertising">
                <a href="{!! route('landinghome') !!}" target="_blank">
                    <div class="banner">
                        <div class="wrapper">
                            <span class="title">{!! trans('portal.publicidad1.titulo') !!}</span>
                            <span class="submit">
                                {!! trans('portal.publicidad1.subtitulo') !!}
                                <i class="fa fa-plus-square"></i>
                            </span>
                        </div>
                    </div>
                </a>
            </section>
        </div>
        @php $j = 0; @endphp
    @endif
    @php $j++; @endphp

    <div class="ads-list-archive">
        <div class="col-lg-5 col-md-5 col-sm-5 no-padding">
            <div class="ad-archive-img">
                <a href="{!! $link !!}">
                    <div>
                        <figure class="novo">
                            @if(!empty($url))
                                <img class="img-responsive"
                                     src="{!! $url !!}"
                                     alt="{!! $altfoto !!}"
                                     onerror="this.onerror=null;this.src='{!! url('portal_/images/posting/car-3.jpg') !!}';">
                            @else
                                <img class="img-responsive"
                                     src="{!! url('portal_/images/posting/car-3.jpg') !!}"
                                     alt="{!! $altfoto !!}"
                                     style="min-height: 313px; margin: auto !important;">
                            @endif
                        </figure>
                    </div>
                </a>
            </div>
        </div>
        <div class="clearfix visible-xs-block"></div>
        <div class="col-lg-7 col-md-7 col-sm-7 no-padding">
            <div class="ad-archive-desc">
                <div data-getprice="{!! $v->slug !!}" 
                     @if(empty($precio))
                         class="horse-special-price"
                     @else
                         @include('backend.common.toolmoneda', ['horse' => $v, 'p' => 1, 'class' => 'horse-special-price'])
                     @endif
                >
                    @if(empty($precio))
                        <span class="consulta">
                            {!! trans('users.pricecheck') !!}
                        </span>
                    @endif
                </div>

                <!-- Title -->
                <a href="{!! $link !!}"
                   @if($v->sold == 0)
                       @include('backend.common.toolmoneda', ['horse' => $v, 'p' => 1])
                   @endif
                >
                    <h3>{!! $titulo !!}</h3>
                </a>

                <!-- Category -->
                <div class="category-title">
                    <span>
                        <a href="{!! $link !!}">{!! $raza !!}</a>
                    </span>
                    @if($alzada != 0)
                        <span>
                            <a href="{!! $link !!}">, {!! $alzada !!}</a>
                        </span>
                    @endif
                    @if($edad != 0)
                        <span>
                            <a href="{!! $link !!}">, {!! trans('horse.years', ['ano' => $edad]) !!}</a>
                        </span>
                    @else
                        <span>
                            <a href="{!! $link !!}">, {!! trans('horse.mes', ['mes' => $mes]) !!}</a>
                        </span>
                    @endif
                    @if(!empty($color))
                        <span>
                            <a href="{!! $link !!}">, {!! $color !!}</a>
                        </span>
                    @endif
                </div>

                <!-- Short Description -->
                <div class="clearfix visible-xs-block"></div>
                <div class="hidden-sm corte">
                    <p>{!! $descripcion !!}</p>
                </div>

                <!-- Ad Features -->
                <div class="col-xs-12 ">
                    <ul class="add_info">
                        <!-- Contact Details -->
                        @php
                            $tel = $v->getStudPhone();
                        @endphp
                        @if(!empty($tel) && is_array($tel) && count($tel) > 0)
                            <li>
                                <div class="custom-tooltip tooltip-effect-4">
                                    <span class="tooltip-item">
                                        <i class="fa fa-phone"></i>
                                    </span>
                                    <div class="tooltip-content">
                                        @foreach($tel as $phoneItem)
                                            @php
                                                $phId = is_array($phoneItem) ? ($phoneItem['id'] ?? null) : null;
                                                $rw = $phId ? \App\Models\Directory::find($phId) : null;
                                            @endphp
                                            @if($rw)
                                                <span class="label label-success f-s-18">
                                                    {!! $rw->FormatNumber() !!}
                                                </span>
                                                <br>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                        @endif

                        <!-- Address -->
                        @php
                            $studLocation = $v->getStudLocation();
                            $stud = $v->getYeguada();
                        @endphp
                        @if(!empty($studLocation) && !empty($stud) && is_object($stud))
                            <li>
                                <div class="custom-tooltip tooltip-effect-4">
                                    <span class="tooltip-item">
                                        <i class="fa fa-map-marker"></i>
                                    </span>
                                    <div class="tooltip-content">
                                        <h4>{!! trans('portal.address') !!}</h4>
                                        <span class="ad-pub">
                                            {!! $stud->getAddress() !!}, {!! $stud->getCity() !!}
                                            @if($stud->getStateModel()) , {!! $stud->getStateModel()->name !!} @endif
                                            @if($stud->getCountryModel()) , {!! $stud->getCountryModel()->name !!} @endif
                                        </span>
                                    </div>
                                </div>
                            </li>
                        @endif
                    </ul>

                    <!-- Ad History -->
                    <div class="clearfix archive-history">
                        <div class="last-updated">
                            {!! trans('portal.pubdate', ['date' => Funciones::AjustarFechaDmySlash($v->created_at)]) !!}
                        </div>
                        <div class="ad-meta">
                            <a class="btn btn-success" href="{!! $link !!}">
                                <i class="fa fa-eye"></i>
                                {!! trans('portal.seemore') !!}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Ad Desc End -->
        </div>
        <!-- Content Block End -->
    </div>
@endforeach

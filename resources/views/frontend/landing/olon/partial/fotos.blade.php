@php($fot = isset($fotos)?$fotos:null)
@php($tit = isset($titulo)?$titulo:null)
@php($h = isset($caballos)?$caballos:null)
@php($id = isset($imagenes)?$imagenes:null)
@php($vid = isset($videos)?$videos:null)
@if(!empty($fot))
    <section id="portfolio">
        <div class="container content-section text-center">
            <div class="row">
                <h2>
                    {!! $titulo !!}
                </h2>
            </div>
        </div>
        <div class="gallery col-xs-12">
            <ul>
                @if(!empty($h))
                    @foreach($h as $k=>$v)
                        @php($s =$v->getPhotoFirstModel() )
                        @if(!empty($s))
                            <li class="gallery-item">
                                <div class="col-xs-12">
                                    <a href="{!! route('MyHorseDetailed',['stud'=>$stud->slug,'horse'=>$v->slug]) !!}">
                                        <figure>
                                            <img lsrc="{!! $s->getUrl() !!}" alt="{!! $v->getAltText() !!}"
                                                 class="hidden ">
                                        </figure>
                                    </a>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                        @endif
                    @endforeach
                @endif

                @if(!empty($id))
                    @foreach($id as $k=>$v)
                        <li class="gallery-item">
                            <div class="col-xs-12">
                                <a href="{!! $v->getUrl() !!}" class="popup-img">
                                    <figure>
                                        <img lsrc="{!! $v->getUrl() !!}" alt="{!! $stud->getName() !!}"
                                             class="hidden ">
                                    </figure>
                                </a>
                            </div>
                            <div class="clearfix"></div>
                        </li>
                    @endforeach
                @endif
                @if(!empty($vid))
                    @foreach($vid as $k=>$v)

                        <li class="gallery-item">
                            <div class="col-xs-12">
                                <a href="{!! $v->getNormalVideoYoutube() !!}" class="video-link">
                                    <span class="fa fa-youtube-play"> </span>
                                    <figure>
                                        <img lsrc="{!! $v->getYoutubeThumb() !!}"
                                             alt="{!! $stud->getName()  !!}  {!! $v->getName() !!}" class="hidden">
                                    </figure>
                                </a>
                            </div>
                            <div class="clearfix"></div>
                        </li>

                    @endforeach
                @endif
                {{--
                    <li class="col-md-3">
                    <a href="portfolio-item.html">
                        <img src="http://unsplash.it/680/380?random=1" alt="">
                    </a>
                </li>
                <li class="col-md-3">
                    <a href="portfolio-item.html">
                        <img src="http://unsplash.it/680/380?random=2" alt="">
                    </a>
                </li>
                <li class="col-md-3">
                    <a href="portfolio-item.html">
                        <img src="http://unsplash.it/680/380?random=3" alt="">
                    </a>
                </li>
                <li class="col-md-3">
                    <a class="image" href="portfolio-item.html">
                        <img src="http://unsplash.it/680/380?random=4" alt="">
                    </a>
                </li>
                <li class="col-md-3">
                    <a href="portfolio-item.html">
                        <img src="http://unsplash.it/680/380?random=5" alt="">
                    </a>
                </li>
                <li class="col-md-3">
                    <a href="portfolio-item.html">
                        <img src="http://unsplash.it/680/380?random=6" alt="">
                    </a>
                </li>
                <li class="col-md-3">
                    <a href="portfolio-item.html">
                        <img src="http://unsplash.it/680/380?random=7" alt="">
                    </a>
                </li>
                <li class="col-md-3">
                    <a href="portfolio-item.html">
                        <img src="http://unsplash.it/680/380?random=8" alt="">
                    </a>
                </li>
                <li class="col-md-3">
                    <a href="portfolio-item.html">
                        <img src="http://unsplash.it/680/380?random=10" alt="">
                    </a>
                </li>
                <li class="col-md-3">
                    <a href="portfolio-item.html">
                        <img src="http://unsplash.it/680/380?random=11" alt="">
                    </a>
                </li>
                <li class="col-md-3">
                    <a href="portfolio-item.html">
                        <img src="http://unsplash.it/680/380?random=12" alt="">
                    </a>
                </li>
                <li class="col-md-3">
                    <a href="portfolio-item.html">
                        <img src="http://unsplash.it/680/380?random=13" alt="">
                    </a>
                </li>
                --}}
            </ul>
        </div>
    </section>
@endif

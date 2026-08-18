@php($cd = 0)
<section class="section-deals borde-top">
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col col-xs-12 col-lg-6 col-lg-offset-3">
                    <div class="ot-heading row-20 mb30 text-center">
                        <h2>{!! trans('stud.contactus') !!}</h2>
                        <p class="sub">{!! trans('stud.contactustext') !!}</p>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-xs-12 col-sm-4 mb20">
                    <div class="info-box">
                        <i class="fa fa-map-marker f20 mb10"></i>
                        <p class="f14">
                            @if(!empty($stud->getAddress()))
                                {!! $stud->getAddress() !!}@if(!empty($stud->getCity())), {!! $stud->getCity() !!}@endif
                                @if(!empty($stud->getStateModel())), {!! $stud->getStateModel()->name !!}@endif
                                @if(!empty($stud->getCountryModel())), {!! $stud->getCountryModel()->name !!}@endif
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 mb20">
                    <div class="info-box">
                        <i class="fa fa-envelope f20 mb10"></i>
                        <p class="f14">
                            @if(!empty($stud->getEmail()))
                                <a href="mailto:{!! $stud->getEmail() !!}" class="link no-color">{!! $stud->getEmail() !!}</a><br>
                            @endif
                            @foreach($stud->getPhoneModel() as $k => $v)
                                @if(!empty($v) && method_exists($v, 'isNull') && $v->isNull() !== true)
                                    @if($cd == 0)
                                        <a href="tel:{!! $v->getFormatNumberOnly() !!}" class="no-color link">
                                            <span class="no-color link">{!! $v->FormatNumber() !!}</span>
                                        </a>
                                        @php($cd = 1)
                                    @endif
                                @endif
                            @endforeach
                        </p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 mb20">
                    <div class="info-box">
                        <i class="fa fa-share-alt f20 mb10"></i>
                        <p class="f14">
                            @if(!empty($stud->getFacebook()->getUrlPage()))
                                <a rel="nofollow" class="mr10" href="{!! $stud->getFacebook()->getUrlPage() !!}" target="_blank"><i class="fa fa-facebook f16"></i></a>
                            @endif
                            @if(!empty($stud->getTwitter()->getUrlPage()))
                                <a rel="nofollow" class="mr10" href="{!! $stud->getTwitter()->getUrlPage() !!}" target="_blank"><i class="fa fa-twitter f16"></i></a>
                            @endif
                            @if(!empty($stud->getInstagram()->getUrlPage()))
                                <a rel="nofollow" class="mr10" href="{!! $stud->getInstagram()->getUrlPage() !!}" target="_blank"><i class="fa fa-instagram f16"></i></a>
                            @endif
                            @if(!empty($stud->getPinterest()->getUrlPage()))
                                <a rel="nofollow" class="mr10" href="{!! $stud->getPinterest()->getUrlPage() !!}" target="_blank"><i class="fa fa-pinterest-p f16"></i></a>
                            @endif
                            @if(!empty($stud->getYoutube()->getUrlPage()))
                                <a rel="nofollow" class="mr10" href="{!! $stud->getYoutube()->getUrlPage() !!}" target="_blank"><i class="fa fa-youtube f16"></i></a>
                            @endif
                            @if(!empty($stud->getGoogle()->getUrlPage()))
                                <a rel="nofollow" class="mr10" href="{!! $stud->getGoogle()->getUrlPage() !!}" target="_blank"><i class="fa fa-google-plus f16"></i></a>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div class="row text-center mt20">
                <div class="col-xs-12">
                    <a rel="nofollow" href="#"
                       class="awe-btn btn-medium font-hind bold f12 awe-btn-default"
                       data-target="#modalcontact" data-toggle="modal">{!! trans('stud.contact') !!}</a>
                </div>
            </div>
        </div>
    </div>
</section>

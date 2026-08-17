<section id="company" class="company foo-bg"><!-- bg-light"-->
    <div class="over"></div>
    <div class="container">
        <div class="row">
            <div class="main_company roomy-100 text-center text-shadow">
                <h3 class="text-uppercase text-white">

                    {!! trans('stud.contactus') !!}
                </h3>
                <p> {!! $stud->getAddress() !!}, {!! $stud->getCity() !!}, {!! $stud->getStateModel()->name!!}
                    , {!! $stud->getCountryModel()->name !!}</p>
                @php($cd = 0)
                <p>@foreach($stud->getPhoneModel() as $k=> $v)
                        @if($v->isNull() !== true)
                            @if($cd == 0)
                                <a href="tel:{!! $v->getFormatNumberOnly() !!}" class="no-color">
                                    <span class="no-color"> {!! $v->FormatNumber() !!} </span>
                                </a> - @php($cd = 1) @endif @endif @endforeach  {!! $stud->getEmail() !!}
                </p>
            </div>
        </div>
    </div>
</section>


<!-- scroll up-->
<div class="scrollup">
    <a href="#"><i class="fa fa-chevron-up"></i></a>
</div><!-- End off scroll up -->


<footer id="footer" class="footer bg-mega">
    <div class="container">
        <div class="row">
            <div class="main_footer p-top-40 p-bottom-30" style="padding: 20px 5px;">
                <div class="col-md-6 text-left sm-text-center">
                    <p class="wow fadeInRight" data-wow-duration="1s" style="padding-top: 4px">
                        {{--{!! trans('portal.allright') !!}--}}

                        <i class="fa fa-love"></i>
                        <a target="_blank"
                           href="{!! url('http://'.$stud->getDomain()) !!}">{!! $stud->getDomain() !!}</a>
                        ©
                        {!! Funciones::CurrentYear()!!}
                        {!! trans('portal.allright') !!}
                    </p>
                </div>
                <div class="col-md-6 text-right sm-text-center sm-m-top-20">
                    @if(!empty($stud->getFacebook()->getUrlPage())or
                    !empty($stud->getPinterest()->getUrlPage()) or
                    !empty($stud->getGoogle()->getUrlPage()) or
                    !empty($stud->getTwitter()->getUrlPage()) or
                    !empty($stud->getYoutube()->getUrlPage()))


                        <ul class="list-inline redes">
                            @if(!empty($stud->getFacebook()->getUrlPage()))
                                <li><a href="{!! $stud->getFacebook()->getUrlPage() !!}" target="_blank"><i
                                                class="fa fa-facebook"></i></a>
                                </li>
                            @endif
                            @if(!empty($stud->getTwitter()->getUrlPage()))
                                <li><a href="{!! $stud->getTwitter()->getUrlPage() !!}" target="_blank"><i
                                                class="fa fa-twitter"></i></a></li>
                            @endif
                            @if(!empty($stud->getInstagram()->getUrlPage()))
                                <li><a href="{!! $stud->getInstagram()->getUrlPage() !!}" target="_blank"><i
                                                class="fa fa-instagram"></i></a></li>
                            @endif
                            @if(!empty($stud->getPinterest()->getUrlPage()))
                                <li><a href="{!! $stud->getPinterest()->getUrlPage() !!}" target="_blank"><i
                                                class="fa fa-pinterest-p"></i></a></li>
                            @endif
                            @if(!empty($stud->getYoutube()->getUrlPage()))
                                <li><a href="{!! $stud->getYoutube()->getUrlPage() !!}" target="_blank">
                                        <i class="fa fa-youtube"></i>
                                    </a></li>
                            @endif
                            @if(!empty($stud->getGoogle()->getUrlPage()))
                                <li><a href="{!! $stud->getGoogle()->getUrlPage() !!}" target="_blank">
                                        <i class="fa fa-google-plus"></i>
                                    </a></li>
                            @endif

                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</footer>

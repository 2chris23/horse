<!-- Contact Section -->
<section id="contact">
    <div class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>{!! $stud->getName() !!}</h2>
                <p>

                    {!! $stud->getAddress() !!}, {!! $stud->getCity() !!}, {!! $stud->getStateModel()->name!!}
                    , {!! $stud->getCountryModel()->name !!}

                </p>
                <p>
                    @php($cd =0 )
                    @foreach($stud->getPhoneModel() as $k=> $v)
                        @if($v->isNull() !== true)
                            @if($cd == 0)
                                <a href="tel:{!! $v->getFormatNumberOnly() !!}" class="no-color link">
                                    <span class="no-color link"> {!! $v->FormatNumber() !!} </span>
                                </a>  @php($cd = 1) @endif @endif @endforeach
                </p>
                <p>
                    <i>
                        <a href="mailto:{!! $stud->getEmail() !!}" style="border-bottom:1px dashed #ccc;">
                            {!! $stud->getEmail() !!}</a>
                    </i>
                </p>

                @if(!empty($stud->getFacebook()->getUrlPage())or !empty($stud->getTwitter()->getUrlPage()) or !empty($stud->getYoutube()->getUrlPage()))
                    <ul class="list-inline banner-social-buttons">

                        @if(!empty($stud->getFacebook()->getUrlPage()))
                            <li>
                                <a href="{!! $stud->getFacebook()->getUrlPage() !!}" class="btn btnghost btn-lg"
                                   target="_blank">
                                    <i class="fa fa-facebook fa-fw">
                                    </i>
                                    <span class="network-name">Facebook</span>
                                </a>
                            </li>

                        @endif
                        @if(!empty($stud->getTwitter()->getUrlPage()))
                            <li>
                                <a href="{!! $stud->getTwitter()->getUrlPage() !!}" class="btn btnghost btn-lg"
                                   target="_blank">
                                    <i class="fa fa-twitter fa-fw">
                                    </i>
                                    <span class="network-name">Twitter</span>
                                </a>
                            </li>
                        @endif
                        @if(!empty($stud->getInstagram()->getUrlPage()))
                            <li>
                                <a href="{!! $stud->getInstagram()->getUrlPage() !!}" class="btn btnghost btn-lg"
                                   target="_blank">
                                    <i class="fa fa-instagram fa-fw">
                                    </i>
                                    <span class="network-name">Instagram</span>
                                </a>
                            </li>
                        @endif
                        @if(!empty($stud->getPinterest()->getUrlPage()))
                            <li>
                                <a href="{!! $stud->getPinterest()->getUrlPage() !!}" class="btn btnghost btn-lg"
                                   target="_blank">
                                    <i class="fa fa-pinterest-p fa-fw">
                                    </i>
                                    <span class="network-name">Pinterest</span>
                                </a>
                            </li>
                        @endif
                        @if(!empty($stud->getYoutube()->getUrlPage()))
                            <li>
                                <a href="{!! $stud->getYoutube()->getUrlPage() !!}" class="btn btnghost btn-lg"
                                   target="_blank">
                                    <i class="fa fa-youtube fa-fw">
                                    </i>
                                    <span class="network-name">Youtube</span>
                                </a>
                            </li>
                        @endif
                        @if(!empty($stud->getGoogle()->getUrlPage()))
                            <li>
                                <a href="{!! $stud->getGoogle()->getUrlPage() !!}" class="btn btnghost btn-lg"
                                   target="_blank">
                                    <i class=" fa fa-google-plus fa-fw">
                                    </i>
                                    <span class="network-name">Google+</span>
                                </a>
                            </li>
                        @endif

                    </ul>
                @endif
            </div>
        </div>
    </div>
</section>

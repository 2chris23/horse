<section id="contact" class="footer_widget" style="background: #1c1c1c;">
    <div class="container">
        <div class="row">
            <div class="footer_widget_content text-center">
                <div class="col-md-4">
                    <div class="single_widget wow fadeIn" data-wow-duration="2s">
                        <h3>Visítanos</h3>
                        <div class="single_widget_info">
                            <div class="col-xs-12">
                                @if(!empty($stud->getAddress()))
                                    <div class="m-top-10 col-xs-10 text-center col-xs-offset-1">
                                        <i class="fa fa-map-marker"></i>
                                        <br>
                                        {!! $stud->getAddress() !!}, {!! $stud->getCity() !!}
                                        , {!! $stud->getStateModel()->name!!}, {!! $stud->getCountryModel()->name !!}
                                    </div>
                                @endif
                            </div>
                            <br>
                            <div class="col-xs-12">
                                @php($cd = 0)
                                @foreach($stud->getPhoneModel() as $k=> $v)
                                    @if($v->isNull() !== true)
                                        <div class="m-top-10 col-xs-10 text-center col-xs-offset-1">
                                            @if($cd == 0)
                                                <i class="fa fa-phone"></i>
                                                <br>
                                                @php($cd = 1)
                                            @endif
                                            <a rel="nofollow" href="tel:{!! $v->getFormatNumberOnly() !!}"
                                               class="no-color">
                                                {!! $v->FormatNumber() !!}
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <br>
                            <div class="col-xs-12">
                                <div class="m-top-10 col-xs-10 text-center col-xs-offset-1">
                                    <i class="fa fa-envelope-o"></i>
                                    <br>
                                    {!! $stud->getEmail() !!}
                                </div>
                            </div>
                        </div>
                        <div class="footer_socail_icon">
                            @if(!empty($stud->getFacebook()->getUrlPage())or
                            !empty($stud->getPinterest()->getUrlPage()) or
                            !empty($stud->getGoogle()->getUrlPage()) or
                            !empty($stud->getTwitter()->getUrlPage()) or
                            !empty($stud->getYoutube()->getUrlPage()))
                                @if(!empty($stud->getFacebook()->getUrlPage()))
                                    <a rel="nofollow" href="{!! $stud->getFacebook()->getUrlPage() !!}">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                @endif
                                @if(!empty($stud->getTwitter()->getUrlPage()))
                                    <a rel="nofollow" href="{!! $stud->getTwitter()->getUrlPage() !!}" target="_blank">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                @endif
                                @if(!empty($stud->getInstagram()->getUrlPage()))
                                    <a rel="nofollow" href="{!! $stud->getInstagram()->getUrlPage() !!}"
                                       target="_blank">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                @endif
                                @if(!empty($stud->getPinterest()->getUrlPage()))
                                    <a rel="nofollow" href="{!! $stud->getPinterest()->getUrlPage() !!}"
                                       target="_blank">
                                        <i class="fa fa-pinterest-p"></i>
                                    </a>
                                @endif
                                @if(!empty($stud->getYoutube()->getUrlPage()))
                                    <a rel="nofollow" href="{!! $stud->getYoutube()->getUrlPage() !!}" target="_blank">
                                        <i class="fa fa-youtube"></i>
                                    </a>
                                @endif
                                @if(!empty($stud->getGoogle()->getUrlPage()))
                                    <a rel="nofollow" href="{!! $stud->getGoogle()->getUrlPage() !!}" target="_blank">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="single_widget wow fadeIn" data-wow-duration="5s">
                        <h3>Contacto</h3>
                        <div class="single_widget_form text-left">
                            <form action="#" id="formid">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="Nombre"
                                           required="">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email"
                                           required="">
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Teléfono">
                                </div> <!-- end of form-group -->
                                <div class="form-group">
                                    <textarea class="form-control" name="message" rows="3"
                                              placeholder="Mensaje"></textarea>
                                </div>
                                <input type="submit" value="enviar" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
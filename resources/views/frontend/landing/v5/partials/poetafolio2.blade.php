<section id="portfolio" class="portfolio">
    <div class="container">
        <div class="row">
            <div class="portfolio_content text-center  wow fadeIn" data-wow-duration="5s">
                <div class="col-md-12">
                    <div class="head_title text-center">
                        <h4>Delightful</h4>
                        <h3>Experience</h3>
                    </div>

                    <div class="main_portfolio_content">

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



                                <div class="col-md-3 col-sm-4 col-xs-6 single_portfolio_text">
                                    <img src="{!! $foto !!}" alt=""/>
                                    <div class="portfolio_images_overlay text-center">
                                        <h6>{!! $t->getName() !!}</h6>
                                        <p class="product_price">
                                            {!! $t->getRaisedFormat() !!}<br>
                                            @if($edad!=0)
                                                {!! trans('horse.years',['ano'=>$edad]) !!}
                                            @else
                                                {!! trans('horse.mes',['mes'=>$mes]) !!}
                                            @endif
                                        </p>
                                        <a href="" class="btn btn-primary">Click here</a>
                                    </div>
                                </div>

                                {{--
                                <div class="col-md-3 col-sm-4 col-xs-6 single_portfolio_text">
                                    <img src="assets/images/p2.png" alt="" />
                                    <div class="portfolio_images_overlay text-center">
                                        <h6>Italian Source Mushroom</h6>
                                        <p class="product_price">$12</p>
                                        <a href="" class="btn btn-primary">Click here</a>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4 col-xs-6 single_portfolio_text">
                                    <img src="assets/images/p3.png" alt="" />
                                    <div class="portfolio_images_overlay text-center">
                                        <h6>Italian Source Mushroom</h6>
                                        <p class="product_price">$12</p>
                                        <a href="" class="btn btn-primary">Click here</a>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4 col-xs-6 single_portfolio_text">
                                    <img src="assets/images/p4.png" alt="" />
                                    <div class="portfolio_images_overlay text-center">
                                        <h6>Italian Source Mushroom</h6>
                                        <p class="product_price">$12</p>
                                        <a href="" class="btn btn-primary">Click here</a>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4 col-xs-6 single_portfolio_text">
                                    <img src="assets/images/p5.png" alt="" />
                                    <div class="portfolio_images_overlay text-center">
                                        <h6>Italian Source Mushroom</h6>
                                        <p class="product_price">$12</p>
                                        <a href="" class="btn btn-primary">Click here</a>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4 col-xs-6 single_portfolio_text">
                                    <img src="assets/images/p6.png" alt="" />
                                    <div class="portfolio_images_overlay text-center">
                                        <h6>Italian Source Mushroom</h6>
                                        <p class="product_price">$12</p>
                                        <a href="" class="btn btn-primary">Click here</a>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4 col-xs-6 single_portfolio_text">
                                    <img src="assets/images/p7.png" alt="" />
                                    <div class="portfolio_images_overlay text-center">
                                        <h6>Italian Source Mushroom</h6>
                                        <p class="product_price">$12</p>
                                        <a href="" class="btn btn-primary">Click here</a>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4 col-xs-6 single_portfolio_text">
                                    <img src="assets/images/p8.png" alt="" />
                                    <div class="portfolio_images_overlay text-center">
                                        <h6>Italian Source Mushroom</h6>
                                        <p class="product_price">$12</p>
                                        <a href="" class="btn btn-primary">Click here</a>
                                    </div>
                                </div>--}}

                            @endif
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
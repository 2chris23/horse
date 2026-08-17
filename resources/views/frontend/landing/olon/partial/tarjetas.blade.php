{{--
                @foreach( $stud->getHorses() as $k => $v)

                    @php($fat = $v->getPhotoFirstModel())
                    @php
                        $img = "";
                            if(!empty($fat)){
                            $img = $fat->getUrl();
                            }
                    @endphp
                    <div class="single-blog">
                        <div class="content fix">
                            <a class="image fix" href="blog-details.html">
                                <img src="{!! $img !!}"
                                     alt=""/>
                                <div class="date">
                                    <h4>25</h4>
                                    <h5>Aug</h5>
                                </div>
                            </a>
                            <h2>
                                <a class="title" href="blog-details.html">
                                    {!! $v->getName() !!}
                                </a>
                            </h2>
                            <div class="meta">
                                <a href="#">
                                    <i class="fa fa-pencil-square-o">
                                    </i>John Lee</a>
                                <a href="#">
                                    <i class="fa fa-calendar">
                                    </i>2 Days ago</a>
                                <a href="#">
                                    <i class="fa fa-comments">
                                    </i>12 Comments</a>
                            </div>
                            <p>
                                {!! $v->getDescripcion() !!}
                            </p>
                        </div>
                    </div>
                @endforeach
            --}}
<div class="blog-area section fix"><!--Start Blog Area-->
    <div class="container">
        <div class="row">
            <div class="section-title">
                <h2>Latest From Blog</h2>
                <div class="underline"></div>
            </div>
            <div class="blog-slider owl-carousel">
                @foreach( $stud->getHorses() as $k => $v)
                    @php
                        $edad = $v->getAge();
                        $mes = $v->getAgeMonth();
                        $sold = ($v->sold == 1) ?'sold':'';
                        $solde = ($v->sold == 1) ?1:0;
                        $fbs = Funciones::CompartirFacebook($v->getName(),Request::fullUrl());
                        $tws = Funciones::CompartirTwitter($v->getName(),Request::fullUrl());
                        $Gs = Funciones::CompartirGoogle(Request::fullUrl());
                        $Ptr = Funciones::CompartirPinterest($v->getName(),Request::fullUrl());
                        $fat = $v->getPhotoFirstModel();
                        $img = "";
                            if(!empty($fat)){
                            $img = $fat->getUrl();
                            }
                    @endphp
                    <div class="single-blog">
                        <div class="content fix">
                            <a class="image fix" href="blog-details.html">
                                <div class="imagestatic">
                                    <figure>
                                        <img src="{!! $img !!}" alt="{!! $v->getAltText() !!}"/>
                                    </figure>
                                </div>
                                @if($solde == 1)
                                    <div class="date">
                                        <h4>Vendido</h4>
                                        {{--<h5>Aug</h5>--}}
                                    </div>
                                @endif
                            </a>
                            <h2><a class="title" href="blog-details.html">
                                    {!! $v->getName() !!}
                                </a></h2>
                            <div class="meta">
                                <a href="#"><i class="fa fa-pencil-square-o"></i>
                                    {!! trans('horse.sex.'.$v->sex) !!}
                                </a>
                                <a href="#"><i class="fa fa-calendar"></i>
                                    @if($edad!=0)
                                        {!! trans('horse.years',['ano'=>$edad]) !!}
                                    @else
                                        {!! trans('horse.mes',['mes'=>$mes]) !!}
                                    @endif
                                </a>
                                <a href="#"><i class="fa fa-comments"></i>12 Comments</a>
                            </div>
                            <p>
                                {!! $v->getDescripcion() !!}
                            </p>
                        </div>
                    </div>
                @endforeach
                {{--
                <div class="single-blog">
                    <div class="content fix">
                        <a class="image fix" href="blog-details.html"><img src="img/blog/blog-1.jpg" alt=""/>
                            <div class="date">
                                <h4>25</h4>
                                <h5>Aug</h5>
                            </div>
                        </a>
                        <h2><a class="title" href="blog-details.html">Lorem ipsum dolor sit amet</a></h2>
                        <div class="meta">
                            <a href="#"><i class="fa fa-pencil-square-o"></i>John Lee</a>
                            <a href="#"><i class="fa fa-calendar"></i>2 Days ago</a>
                            <a href="#"><i class="fa fa-comments"></i>12 Comments</a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim niam.</p>
                    </div>
                </div>
                <div class="single-blog">
                    <div class="content fix">
                        <a class="image fix" href="blog-details.html"><img src="img/blog/blog-2.jpg" alt=""/>
                            <div class="date">
                                <h4>25</h4>
                                <h5>Aug</h5>
                            </div>
                        </a>
                        <h2><a class="title" href="blog-details.html">Lorem ipsum dolor sit amet</a></h2>
                        <div class="meta">
                            <a href="#"><i class="fa fa-pencil-square-o"></i>John Lee</a>
                            <a href="#"><i class="fa fa-calendar"></i>2 Days ago</a>
                            <a href="#"><i class="fa fa-comments"></i>12 Comments</a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim niam.</p>
                    </div>
                </div>
                <div class="single-blog">
                    <div class="content fix">
                        <a class="image fix" href="blog-details.html"><img src="img/blog/blog-3.jpg" alt=""/>
                            <div class="date">
                                <h4>25</h4>
                                <h5>Aug</h5>
                            </div>
                        </a>
                        <h2><a class="title" href="blog-details.html">Lorem ipsum dolor sit amet</a></h2>
                        <div class="meta">
                            <a href="#"><i class="fa fa-pencil-square-o"></i>John Lee</a>
                            <a href="#"><i class="fa fa-calendar"></i>2 Days ago</a>
                            <a href="#"><i class="fa fa-comments"></i>12 Comments</a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim niam.</p>
                    </div>
                </div>
                <div class="single-blog">
                    <div class="content fix">
                        <a class="image fix" href="blog-details.html"><img src="img/blog/blog-4.jpg" alt=""/>
                            <div class="date">
                                <h4>25</h4>
                                <h5>Aug</h5>
                            </div>
                        </a>
                        <h2><a class="title" href="blog-details.html">Lorem ipsum dolor sit amet</a></h2>
                        <div class="meta">
                            <a href="#"><i class="fa fa-pencil-square-o"></i>John Lee</a>
                            <a href="#"><i class="fa fa-calendar"></i>2 Days ago</a>
                            <a href="#"><i class="fa fa-comments"></i>12 Comments</a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim niam.</p>
                    </div>
                </div>
                --}}
            </div>
        </div>
    </div>
</div><!--End Blog Area-->

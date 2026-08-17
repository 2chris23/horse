@php($sexos = Horse::where(['studs_id' => $stud->id])->select('sex', DB::raw('count(*) as total'))->groupby('sex')->get()->toArray())

<div class="tab-product-area section fix"><!--Start Product Area-->
    <div class="container">
        <div class="row">
            <!-- Nav tabs -->
            <ul class="tabs-list" role="tablist">
                {{--<li class="active"><a href="#new" data-toggle="tab">NEW ARRIVALS</a></li>--}}
                {{--<li><a href="#feature" data-toggle="tab">FEATURED</a></li>
                <li><a href="#b-sales" data-toggle="tab">BEST SELLERS</a></li>
                <li><a href="#trending" data-toggle="tab">TRENDING</a></li>--}}
                @foreach($sexos as $k=>$v)
                    <li><a href="#s-{!! $v['sex'] !!}" data-toggle="tab">{!! trans('horse.sexs.'.$v['sex']) !!}</a></li>
                @endforeach
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                @foreach($sexos as $k=>$v)
                    <div class="tab-pane fade" id="s-{!! $v['sex'] !!}">
                        <div class="tab-pro-slider trending-product owl-carousel">
                            @php($sex = \App\Models\Horse::where(['sex'=>$v['sex'],'studs_id'=>$stud->id])->get())
                            @php($dsf = count($sex))
                            @for($i = 0;$i < $dsf;$i++)
                                @php
                                    $r = $i;
                                    $s = $sex[$i];
                                    try{
                                    $nx = $sex[$i+1];
                                    }catch (\ErrorException $e){
                                    $nx = null;
                                    }
                                @endphp


                                {{--@foreach($sex as $r=>$s)--}}
                                @if($r%2 == 0)
                                    <div class="single-product-item">
                                    @endif
                                    <!-- Single Product Start -->

                                    @php($fat = $s->getPhotoFirstModel())
                                    @php
                                        $img = "";
                                            if(!empty($fat)){
                                            $img = $fat->getUrl();
                                            }
                                    @endphp
                                    <!-- Single Product Start -->
                                        <div class="product-item fix">
                                            <div class="product-img-hover">
                                                <!-- Product image -->
                                                <a href="product-details.html" class="pro-image fix">
                                                    <img src="{!! $img !!}"
                                                         alt="{!! $s->getAltText() !!}"/>
                                                </a>
                                                <!-- Product action Btn -->
                                                <div class="product-action-btn">
                                                    <a class="quick-view" href="#"><i class="fa fa-search"></i></a>
                                                    <a class="favorite" href="#"><i class="fa fa-heart-o"></i></a>
                                                    <a class="add-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
                                                </div>
                                            </div>
                                            <div class="pro-name-price-ratting">
                                                <!-- Product Name -->
                                                <div class="pro-name">
                                                    <a href="product-details.html">
                                                        {!! $s->getName() !!}
                                                    </a>
                                                </div>
                                                <!-- Product Ratting -->
                                                <div class="pro-ratting">
                                                    <i class="on fa fa-star"></i>
                                                    <i class="on fa fa-star"></i>
                                                    <i class="on fa fa-star"></i>
                                                    <i class="on fa fa-star"></i>
                                                    <i class="on fa fa-star-half-o"></i>
                                                </div>

                                            </div>
                                        </div><!-- Single Product End -->

                                        @if($r%2 == 1 or (empty($nx)))
                                    </div>

                                @endif

                                {{--@endforeach--}}
                            @endfor
                            {{--
                                        <!-- Product Price -->
                                        <div class="pro-price fix">
                                            <p><span class="old">$165</span><span class="new">$150</span></p>
                                        </div>
                                <!-- Single Product Start -->
                            --}}
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div><!--End Product Area-->

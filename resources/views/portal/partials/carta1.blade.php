<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
    <div class="white category-grid-box-1 clearfix">
        <!-- Image Box -->
        <div class="image">
            <figure class="h-313-234">
                <img alt="Tour Package" src="{!! $url !!}" class="img-responsive m-w-313">
            </figure>
        </div>
        <!-- Short Description -->
        <div class="short-description-1 clearfix">
            <!-- Category Title -->
            <div class="category-title"><span><a
                            href="#">{!! trans('horse.raza.'.$raza)!!}</a></span></div>
            <!-- Ad Title -->
            <h3>
                <a title="" href="single-page-listing.html">{!! $titulo !!}</a>
            </h3>
            <!-- Location -->
            <p>
                @if(!empty($edad))
                    {!! $edad !!} {!! trans('horse.years') !!}
                @else
                    {!! trans('horse.yearsunkown') !!}
                @endif
                @if(!empty($color))
                    , {!! $color !!}
                @endif
            </p>

            <!-- Location -->
            <p class="location"><i class="fa fa-map-marker"></i> Houghton Street London</p>
            <!-- Rating -->
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <span class="rating-count">(2)</span>

            </div>
            <!-- Price -->
            <span class="horse-special-price">{!! $precio !!} <i class="fa fa-eur"></i></span>
        </div>
        <!-- Ad Meta Stats -->
        <div class="horse-special-info-1">
            {{--
            <ul>

                <li><i class="fa fa-eye"></i><a href="#">445 Views</a></li>

                <li><i class="fa fa-clock-o"></i>15 minutes ago</li>
            </ul>
            --}}
        </div>

    </div>
</div>

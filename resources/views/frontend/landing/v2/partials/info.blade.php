@php($cd = 0)
<div class="row text-center" style="margin-top: 30px; padding-left: 20%;">
    <div class="col-md-3 texto-shadow ">
        {!! $stud->getAddress() !!}, {!! $stud->getCity() !!}, {!! $stud->getStateModel()->name!!}
        , {!! $stud->getCountryModel()->name !!}
    </div>
    <div class="col-md-3 texto-shadow ">
        {!! $stud->getEmail() !!} <br> @foreach($stud->getPhoneModel() as $k=> $v)
            @if($v->isNull() !== true)
                @if($cd == 0)
                    <a href="tel:{!! $v->getFormatNumberOnly() !!}" class="no-color link">
                        <span class="no-color link"> {!! $v->FormatNumber() !!} </span>
                    </a>  @php($cd = 1) @endif @endif @endforeach
    </div>



    @if(!empty($stud->getFacebook()->getUrlPage())or !empty($stud->getTwitter()->getUrlPage()) or !empty($stud->getYoutube()->getUrlPage()))
        <div class="col-md-3 social wow zoomIn texto-shadow " style="margin-top: 15px;">
        
            @if(!empty($stud->getFacebook()->getUrlPage()))
                <a href="{!! $stud->getFacebook()->getUrlPage() !!}" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                
            @endif
            @if(!empty($stud->getTwitter()->getUrlPage()))
                <a href="{!! $stud->getTwitter()->getUrlPage() !!}" target="_blank"><i
                                class="fa fa-twitter"></i></a>
            @endif
            @if(!empty($stud->getInstagram()->getUrlPage()))
                <a href="{!! $stud->getInstagram()->getUrlPage() !!}" target="_blank"><i
                                class="fa fa-instagram"></i></a>
            @endif
            @if(!empty($stud->getPinterest()->getUrlPage()))
                <a href="{!! $stud->getPinterest()->getUrlPage() !!}" target="_blank"><i
                                class="fa fa-pinterest-p"></i></a>
            @endif
            @if(!empty($stud->getYoutube()->getUrlPage()))
                <a href="{!! $stud->getYoutube()->getUrlPage() !!}" target="_blank">
                        <i class="fa fa-youtube"></i>
                    </a>
            @endif
            @if(!empty($stud->getGoogle()->getUrlPage()))
                <a href="{!! $stud->getGoogle()->getUrlPage() !!}" target="_blank">
                        <i class=" fa fa-google-plus"></i>
                    </a>
            @endif

        
        </div>
    @endif
    
    
    
    {{--
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-youtube"></i></a>--}}
    
</div>
@php
    $d = [];
     $d[0] = url('landing/images/slider/1/2.jpg');
        $d[1] = url('landing/images/slider/1/6.jpg');
        $d[2] = url('landing/images/slider/1/9.jpg');
        $d[3] = url('landing/images/slider/1/8.jpg');
$rnd = rand(0,3);
@endphp
@if(!empty(Photo::Slider($stud->id)->first()))
    {{--@if(count($sliders)>1)--}}
    @php
        $sliders =Photo::Slider($stud->id)->get();
    $g = count($sliders)-1;
    $ws = $sliders[rand(0,$g)];
    $img = $ws['url'];
    @endphp
@else
    @php

        $ws = $d[rand(0,3)];
        $img = $ws;
    @endphp

@endif

@if(isset($img) )
    <style>
        .home {
            background: url({!!$img !!}) no-repeat top center;
            background-attachment: fixed;
            background-size: cover;
            background-color: #fff;
        }

    </style>
@else
    <style>
        .home {
            background: url({!!$d[$rnd] !!}) no-repeat top center;
            background-attachment: fixed;
            background-size: cover;
            background-color: #fff;
        }

    </style>

@endif
@if(isset($f))
    @if(!empty($f))
        @php($img = $f->getUrl())
        @if(!empty($img))
            <style>
                .{!! $clase !!}        {
                    background: url({!!$img !!}) no-repeat top center;
                    background-attachment: fixed;
                    background-size: cover;
                    background-color: #fff;
                }
            </style>
        @else
            <style>
                .{!! $clase !!}     {
                    background: url({!!$img!!}) no-repeat top center;
                    background-attachment: fixed;
                    background-size: cover;
                    background-color: #fff;
                }

            </style>
        @endif
    @endif
@else
    <style>
        .{!! $clase !!}     {
            background: url({!! $img !!}) no-repeat top center;
            background-attachment: fixed;
            background-size: cover;
            background-color: #fff;
        }

    </style>
@endif
{{--
@if(!empty($stud->getFront()) and empty($f))
    @if(!empty($stud->getFront()->getUrl()))
        <style>
            .bg-mega {
                background: url({!! $stud->getFront()->getUrl() !!}) center center no-repeat;
                background-size: cover;
            }
        </style>
    @endif
@endif
--}}
@php($texto = isset($texto)?$texto:'')
@php($stex = isset($stex)?$stex:'')
<section id="hello" class="{!! $clase !!} bg-mega">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="main_home text-center">
                <div class="home_text">
                    <!--h4 class="text-white text-uppercase">a new creative studio</h4-->
                    <h1 class="text-white text-uppercase text-shadow b_faddown2 texto-imagen1  m-t-10 texto-shadow ">{!! $texto !!}</h1>
                    <div class="separator"></div>
                    <div class="b_faddown2 texto-imagen2 m-t-10 texto-shadow">
                    {!! $stex !!}
                    </div>
                    {{--
                    <h5 class=" text-uppercase text-white text-shadow">
                        <em>
                            Nueva promesa 2017
                        </em>
                    </h5>
                    --}}
                </div>
            </div>
        </div><!--End off row-->

    </div><!--End off container -->
</section> <!--End off Home Sections-->


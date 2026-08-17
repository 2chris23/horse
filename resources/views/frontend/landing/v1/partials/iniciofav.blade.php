@php
    $p = $df->getPhotoFirstModel();
        if(!empty($p)){
        $img = $p->getUrl();

        }else{
        $img ='';
        }

@endphp
<style>
    .home {
        background: url({!! $df->getPhotoFirstModel()->getUrl() !!}) no-repeat top center;
        /*background-attachment: fixed;*/
        /*background-size: cover;*/
        background-color: #fff;
    }
</style>
<section id="hello" class="home bg-mega">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="main_home text-center">
                <div class="home_text">
                    <!--h4 class="text-white text-uppercase">a new creative studio</h4-->
                    <h1 class="text-white text-uppercase text-shadow">{!! $df->getName() !!}</h1>
                    <div class="separator"></div>
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
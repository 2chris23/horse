<!-- LADO IZQUIERDO-->
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
    <div class="motijob-sidebar col-xs-12 ">
        <div class="candidate-profile-picture">
            <div class="upload-img-field preview">
            </div>
            <a class="btn btn-default" href="#" onclick="$('#foto').click();">
                {!! trans('trabajo.fotoupload') !!}
            </a>
            <input name="foto" id="foto" type="file" class="hidden"  accept=".jpg, .jpeg, .png">
        </div>
        <!-- end .agent-profile-picture -->

        <div class="candidate-general-info col-xs-12">

            <div class="title clearfix col-xs-12 text-center">
                <h6>
                    {!! trans('trabajo.generalinfo') !!}
                </h6>
                {{--
                <a class="pull-right" href="#">
                    <i class="fa fa-edit">
                    </i>Edit</a>
                --}}
            </div>
            <!-- end .end .title -->

            <ul class="list-unstyled candidate-registration ">
                <li class="clearfix col-xs-12">
                    <div class="col-xs-5">
                        <strong>{!! trans('trabajo.name') !!}:</strong>
                    </div>
                    <div class="col-xs-7">
                        {{$aplications->getName()}}
                        <input name="name" class="w100" type="text" placeholder="{!! trans('trabajo.place.name') !!}" required>
                    </div>
                </li>
                <li class="clearfix col-xs-12">
                    <div class="col-xs-5">
                        <strong>{!! trans('trabajo.bday') !!}:</strong>
                    </div>
                    <div class="col-xs-7">
                        {{$aplications->getBdaySlash()}}

                    </div>
                </li>


                <li class="clearfix col-xs-12">
                    <div class="col-xs-5">
                        <strong>{!! trans('trabajo.country') !!}:</strong>
                    </div>
                    <div class="col-xs-7">
                        {{--<input class="w100"  type="text" placeholder="{!! trans('trabajo.place.country') !!}">--}}

                        {{--@include('frontend.trabajos.common.country')--}}
                        @if(!empty($aplications->Country()->first()))
                            <label for="">{{$aplications->Country()->first()->name}}</label>
                        @else

                        @endif

                    </div>
                </li>

                <li class="clearfix col-xs-12">
                    <div class="col-xs-5">
                        <strong>{!! trans('trabajo.state') !!}:</strong>
                    </div>
                    <div class="col-xs-7">
                        {{--@include('frontend.trabajos.common.state')--}}
                        @if(!empty($aplications->State()->first()))
                            <label for="">{{$aplications->State()->first()->name}}</label>
                        @else

                        @endif
                    </div>
                </li>
                <li class="clearfix col-xs-12">
                    <div class="col-xs-5">
                        <strong>{!! trans('trabajo.city') !!}:</strong>
                    </div>
                    <div class="col-xs-7">

                        {{$aplications->getCity()}}
                    </div>
                </li>
                <li class="clearfix col-xs-12">
                    <div class="col-xs-5">
                        <strong>{!! trans('trabajo.address') !!}:</strong>
                    </div>
                    <div class="col-xs-7">
                        {{$aplications->getAddress()}}
                    </div>
                </li>
                {{--@include('frontend.trabajos.common.phone')--}}

                <li class="clearfix col-xs-12">
                    <div class="col-xs-5">
                        <strong>{!! trans('trabajo.phone') !!}:</strong>
                    </div>
                    <div class="col-7">
                        {{$aplications->getPhone()}}
                    </div>
                </li>
                {{--
                <li class="clearfix col-xs-12">
                    <div class="col-xs-5">
                        <strong>{!! trans('trabajo.phone') !!}:</strong>
                    </div>
                    <div class="col-xs-7">
                        <input class="w100" type="text" placeholder="{!! trans('trabajo.place.phone') !!}">
                    </div>
                </li>
                --}}
                <li class="clearfix col-xs-12">
                    <div class="col-xs-5">
                        <strong>{!! trans('trabajo.email') !!}:</strong>
                    </div>
                    <div class="col-xs-7">
                        {{$aplications->getEmail()}}

                    </div>
                </li>
                {{--
                <li class="clearfix col-xs-12">
                    <div class="col-xs-5">
                        <strong>{!! trans('trabajo.skill') !!}:</strong>
                    </div>
                    <div class="col-xs-7">
                        <input class="w100" type="text" placeholder="{!! trans('trabajo.place.skill') !!}">
                    </div>
                </li>
                <li class="clearfix col-xs-12">
                    <div class="col-xs-5">
                        <strong>{!! trans('trabajo.skils') !!}:</strong>
                    </div>
                    <div class="col-xs-7">
                        <input class="w100" type="text" placeholder="{!! trans('trabajo.place.skils') !!}">
                    </div>
                </li>
                --}}
                {{--
                <li class="clearfix col-xs-12">
                    <div class="col-xs-5">
                        <strong>{!! trans('trabajo.file') !!}:</strong>
                    </div>
                    <div class="col-xs-7">
                        <input class="w100" type="text" placeholder="{!! trans('trabajo.place.file') !!}">
                    </div>
                </li>
                --}}
                {{--
                <li class="clearfix col-xs-12">
                    <div class="col-xs-5">
<strong>{!! trans('trabajo.present') !!}:</strong>
</div>
<div class="col-xs-7">
                    <input class="w100"  type="text" placeholder="{!! trans('trabajo.place.present') !!}">
                </div>
</li>

                <li class="clearfix col-xs-12">
                    <div class="col-xs-5">
<strong>{!! trans('trabajo.sms') !!}:</strong>
</div>
<div class="col-xs-7">
                    <input class="w100"  type="text" placeholder="{!! trans('trabajo.place.sms') !!}">
                </div>
</li>
                --}}

            </ul>

        </div>
        <!-- end .candidate-general-info -->
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</div>
<!-- end .3col grid layout -->
<!-- LADO IZQUIERDO--> 
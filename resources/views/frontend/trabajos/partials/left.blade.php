<!-- LADO IZQUIERDO-->
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
    <div class="motijob-sidebar col-xs-12 ">
        <div class="candidate-profile-picture">
            <div class="upload-img-field preview">
                <img src="" alt="" id="blah" class="img-responsive img-fluid">
            </div>
            <a class="btn btn-default" href="#" onclick="$('#foto').click();">
                {!! trans('trabajo.fotoupload') !!}
            </a>
            <input name="foto" id="foto" type="file" class="hidden" accept=".jpg, .jpeg, .png"
                   onchange="readURL(this);">
            <script>
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('#blah').attr('src', e.target.result);
                            $('.upload-img-field').css('background-image', 'url("")');
                        };
                        reader.readAsDataURL(input.files[0]);
                    }
                }

                window.onload = function (e) {
                    $("#foto").change(function () {
                        console.log('cambiando');
                        readURL(this);
                    });
                };

            </script>
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
                        <input name="name" class="w100" type="text" placeholder="{!! trans('trabajo.place.name') !!}" required>
                    </div>
                </li>
                <li class="clearfix col-xs-12">
                    <div class="col-xs-5">
                        <strong>{!! trans('trabajo.bday') !!}:</strong>
                    </div>
                    <div class="col-xs-7">
                        <input name="date" class="w100" type="date" placeholder="{!! trans('trabajo.place.bday') !!}" required>
                    </div>
                </li>


                <li class="clearfix col-xs-12">
                    <div class="col-xs-5">
                        <strong>{!! trans('trabajo.country') !!}:</strong>
                    </div>
                    <div class="col-xs-7">
                        {{--<input class="w100"  type="text" placeholder="{!! trans('trabajo.place.country') !!}">--}}

                        @include('frontend.trabajos.common.country')

                    </div>
                </li>

                <li class="clearfix col-xs-12">
                    <div class="col-xs-5">
                        <strong>{!! trans('trabajo.state') !!}:</strong>
                    </div>
                    <div class="col-xs-7">
                        @include('frontend.trabajos.common.state')
                        {{--<input class="w100"  type="text" placeholder="{!! trans('trabajo.place.state') !!}">--}}
                    </div>
                </li>
                <li class="clearfix col-xs-12">
                    <div class="col-xs-5">
                        <strong>{!! trans('trabajo.city') !!}:</strong>
                    </div>
                    <div class="col-xs-7">
                        <input name="city" class="w100" type="text" placeholder="{!! trans('trabajo.place.city') !!}">
                    </div>
                </li>
                <li class="clearfix col-xs-12">
                    <div class="col-xs-5">
                        <strong>{!! trans('trabajo.address') !!}:</strong>
                    </div>
                    <div class="col-xs-7">
                        <input name="address"class="w100" type="text" placeholder="{!! trans('trabajo.place.address') !!}">
                    </div>
                </li>
                @include('frontend.trabajos.common.phone')
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
                        <input name="email"class="w100" type="email" placeholder="{!! trans('trabajo.place.email') !!}" required>
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
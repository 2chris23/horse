@php
    $cat = '';

        foreach(trans('categorias.trabajo') as $k=>$v){
        $sel =($k == 0)? ' selected ':'';
        $cat.="<option value=\"$k\" $sel>$v</option>";
        }
    $cat = " <div class=\"skill-selectbox mb10 skills\"> <select  name=\"skillsw\"> $cat</select> </div> ";
@endphp

<div class="col-md-8 col-xs-12">
    <div class="job-reg-form">
        <!-- Habilidad -->
        <div class="candidate-single-content">
            <div class="row">
                <div class="col-md-4">
                    {{--<label><span>*</span>Habilidades y destrezas</label>--}}
                    <label><span>*</span>{!! trans('trabajo.skill') !!}</label>
                </div> <!-- end .4th grid-layout -->
                <div class="col-md-8">
                    <div class="candidate-skill-single clearfix">
                        <div class="col-12 mt10 row ">
                            @foreach($aplications->getSkills() as $k=>$v)

                                <div class="col-4 pdt5">
                                    {!! trans('categorias.contacto.'.$v) !!}
                                </div>

                            @endforeach
                        </div>
                    </div> <!-- end .candidate-skills-single -->
                </div> <!-- end .8th grid layout -->
            </div> <!-- end nasted .row -->
        </div> <!-- end .candidate-single-content -->
        <!-- Habilidad -->
        <!-- Datos present -->
        <div class="candidate-single-content">
            <div class="row">
                <div class="col-md-4">
                    <label><span>*</span>{!! trans('trabajo.present',['name'=>$stud->name]) !!}</label>
                </div> <!-- end .4th grid-layout -->

                <div class="col-md-8">
                    <div class="candidate-des-editore">
                        {{--{!! $cat !!}<!-- end .skill-selectbox -->--}}
                        <div class="textarea-editor">
                            <p>
                                {{$aplications->getPresent()}}
                            </p>
                            {{--<p>You can add HTML content or input your HTML file <a
                                        href="#" class="btn btn-default">Import</a>
                            </p>--}}
                        </div> <!-- end textarea-editor -->
                    </div> <!-- end .condidate-description -->
                </div> <!-- end .8th grid layout -->

            </div> <!-- end nasted .row -->
        </div> <!-- end .candidate-single-content -->
        <!-- Datos present -->

    <!-- Habilidad adicional-->
        <div class="candidate-single-content">
            <div class="row">
                <div class="col-md-4">
                    <label><span>*</span>
                        {!! trans('trabajo.file') !!}
                    </label>
                </div> <!-- end .4th grid-layout -->

                <div class="col-md-8">
                    <div class="add-skills-field">
                        DOCUEMNTO
                        {{--<input type="text"
                               placeholder="Add your skills separated by comma">--}}
                    </div>
                </div> <!-- end .8th grid layout -->
            </div> <!-- end .nasted .row -->
        </div> <!-- end .candidate-single-content -->
        <!-- Habilidad adicional-->
        <!-- Guardar -->
        <input type="submit" class="hidden" id="enviome">
        <div class="save-cancel-button ml20">
            <a href="#" class="btn savest btn-default">{!! trans('trabajo.save') !!}</a>
            <a href="{!! route('MyContact',['slug'=>$stud->slug]) !!}"
               class="btn btn-black ml10">{!! trans('trabajo.cancel') !!}</a>
        </div> <!-- end .save-cancel-button -->
        <!-- Guardar -->

    </div> <!-- end .candidate-reg-form -->
</div> <!-- end .9col grid layout -->

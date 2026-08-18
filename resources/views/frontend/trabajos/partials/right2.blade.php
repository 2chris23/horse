@php
    $cat = '';

        foreach(trans('categorias.contacto') as $k=>$v){
        $sel =($k == 0)? ' selected ':'';
        $cat.="<option value=\"$k\" $sel>$v</option>";
        }
    $cat = " <div class=\"skill-selectbox mb10 skills\" name=\"skills[]\"> <select> $cat</select> </div> ";
@endphp

<div class="col-md-8">
    <div class="job-reg-form">

            <!-- Titulo carta-->
            <div class="form-banner-button">
                <div class="preview-import pull-left">
                    {{--
                    <a class="btn btn-green" href="#">Preview</a>
                    <a class="btn btn-default ml3" href="#">
                        <i class="fa fa-linkedin-square"></i>
                        Import Data from LinkedIn
                    </a>
                    --}}
                </div> <!-- end .preview-import -->

                <div class="language pull-right">
                    <div class="language-select pull-left">
                        @php($ln = \Config::get('lenguaje'))

                        <select>
                            @foreach($ln as $k=>$v)
                                <option value="{{$k}}">{{$v}}</option>
                            @endforeach

                            {{--
                                                                                        <option value="#">FR</option>
                                                                                        <option value="#">IT</option>
                                                                                        <option value="#">DE</option>
                                                                                        --}}
                        </select>
                    </div> <!-- end .language-select -->

                    <a class="btn btn-default pull-left ml5" href="#">Add Language</a>

                </div> <!-- end .language -->

            </div> <!-- end .form-banner-button -->
            <!-- Titulo carta-->
            <!-- Habilidad -->

            <div class="candidate-single-content">
                <div class="row">
                    <div class="col-md-4">
                        <label><span>*</span>Habilidades y destrezas</label>
                    </div> <!-- end .4th grid-layout -->

                    <div class="col-md-8">
                        <div class="candidate-skill-single clearfix">

                            {{-- <div class="skill-edit-button">
                                <a href="#" class="skill-edit btn-primary">Edit</a>
                                <a href="#" class="skill-delete btn-danger">Delete</a>
                                <a href="#" class="skill-save btn-success">Save</a>
                            </div> <!-- end .sill-edit-button -->  --}}
                            <div class="col-xs-12 clearfix">
                                {!! trans('trabajo.skill') !!}
                            </div>
                            <div class="skill-edit-content mt20">

                                <div class="col-xs-12">
                                    @foreach(trans('categorias.contacto') as $k=>$v)
                                        @if($k!=0)
                                            <div class="col-xs-4">
                                                <input type="checkbox" id="cks_{!! $k !!}" name="skillss[]" value="{!! $k !!}" /><span  onclick="$('#cks_{{$k}}').click();">{!! $v !!}</span>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                {{--
                                                                <div class="skill-description mb10">
                                                                                                    <textarea name="skill-description"
                                                                                                              placeholder="Description"></textarea>
                                                                </div> <!-- end .skill-description -->


                                                                <div class="skill-progressbar">

                                                                    <p>
                                                                        <span class="mini-amount">0%</span>
                                                                        <input type="text" id="amount-first">

                                                                    </p>

                                                                    <div id="slider-skill-first"></div>
                                                                </div> <!-- end .skill-progressbar -->
                                                                --}}

                            </div> <!-- end .skill-edit-content -->
                        </div> <!-- end .candidate-skills-single -->


                        <div class="candidate-skill-single clearfix">

                            {{-- <div class="skill-edit-button">
                                <a href="#" class="skill-edit btn-primary">Edit</a>
                                <a href="#" class="skill-delete btn-danger">Delete</a>
                                <a href="#" class="skill-save btn-success">Save</a>
                            </div> <!-- end .sill-edit-button -->  --}}
                            <div class="col-xs-12 clearfix">
                                Puesto deseado
                            </div>
                            <div class="skill-edit-content mt40">
                            {!! $cat !!}<!-- end .skill-selectbox -->

                                <div class="skill-description mb10">
                                                                    <textarea name="skill-description"
                                                                              placeholder="Description"></textarea>
                                </div> <!-- end .skill-description -->
                                {{--
                                                    <div class="skill-progressbar">

                                                        <p>
                                                            <span class="mini-amount">0%</span>
                                                            <input type="text" id="amount-first">

                                                        </p>

                                                        <div id="slider-skill-first"></div>
                                                    </div> <!-- end .skill-progressbar -->
                                                    --}}

                            </div> <!-- end .skill-edit-content -->
                        </div> <!-- end .candidate-skills-single -->
                        {{--
                                                <div class="candidate-skill-single clearfix">

                                                    {{-- <div class="skill-edit-button">
                                                        <a href="#" class="skill-edit btn-primary">Edit</a>
                                                        <a href="#" class="skill-delete btn-danger">Delete</a>
                                                        <a href="#" class="skill-save btn-success">Save</a>
                                                    </div> <!-- end .sill-edit-button -->  -- }}

                                                    <div class="skill-edit-content">
                                                    {!! $cat !!}<!-- end .skill-selectbox -->

                                                        <div class="skill-description mb10">
                                                                                            <textarea name="skill-description"
                                                                                                      placeholder="Description"></textarea>
                                                        </div> <!-- end .skill-description -->

                                                        <div class="skill-progressbar">

                                                            <p>
                                                                <span class="mini-amount">0%</span>
                                                                <input type="text" id="amount-third">

                                                            </p>

                                                            <div id="slider-skill-third"></div>
                                                        </div> <!-- end .skill-progressbar -->

                                                    </div> <!-- end .skill-edit-content -->
                                                </div> <!-- end .candidate-skills-single -->
                                                --}}

                        {{--<div class="add-skill-button">
                            <a class="btn btn-default" href="#">Add a Skill</a>
                        </div>
                        --}}
                    </div> <!-- end .8th grid layout -->
                </div> <!-- end nasted .row -->
            </div> <!-- end .candidate-single-content -->
            <!-- Habilidad -->
            <!-- Datos present -->
            <div class="candidate-single-content mt20">
                <div class="row">
                    <div class="col-md-4">
                        <label><span>*</span>{!! trans('trabajo.present') !!}</label>
                    </div> <!-- end .4th grid-layout -->

                    <div class="col-md-8">
                        <div class="candidate-des-editore">
                            <div class="textarea-editor">
                                                                <textarea name="area" id="myNicEditor"
                                                                          placeholder="{!! trans('trabajo.place.present') !!}"
                                                                          cols="40"></textarea>

                                {{--<p>You can add HTML content or input your HTML file <a
                                            href="#" class="btn btn-default">Import</a>
                                </p>--}}
                            </div> <!-- end textarea-editor -->
                        </div> <!-- end .condidate-description -->
                    </div> <!-- end .8th grid layout -->

                </div> <!-- end nasted .row -->
            </div> <!-- end .candidate-single-content -->
            <!-- Datos present -->

            <!-- Datos mensaje -->
            <div class="candidate-single-content ">
                <div class="row">
                    <div class="col-md-4">
                        <label><span>*</span>{!! trans('trabajo.sms') !!}</label>
                    </div> <!-- end .4th grid-layout -->

                    <div class="col-md-8">
                        <div class="candidate-des-editore">
                            <div class="textarea-editor">
                                                                <textarea name="area" id="myNicEditor2"
                                                                          placeholder="{!! trans('trabajo.place.sms') !!}"
                                                                          cols="40"></textarea>

                                {{--<p>You can add HTML content or input your HTML file <a
                                            href="#" class="btn btn-default">Import</a>
                                </p>--}}
                            </div> <!-- end textarea-editor -->
                        </div> <!-- end .condidate-description -->
                    </div> <!-- end .8th grid layout -->

                </div> <!-- end nasted .row -->
            </div> <!-- end .candidate-single-content -->
            <!-- Datos mensaje -->



            <!-- Habilidad adicional-->
            {{--<div class="candidate-single-content">
                <div class="row">
                    <div class="col-md-4">
                        <label><span>*</span>Additional Skills</label>
                    </div> <!-- end .4th grid-layout -->

                    <div class="col-md-8">
                        <div class="add-skills-field">
                            <input type="text"
                                   placeholder="Add your skills separated by comma">
                        </div>
                    </div> <!-- end .8th grid layout -->
                </div> <!-- end .nasted .row -->
            </div> <!-- end .candidate-single-content -->--}}
            <!-- Habilidad adicional-->
            <!-- Guardar -->
            <div class="save-cancel-button ml20">
                <a href="#" class="btn btn-default">Save</a>
                <a href="#" class="btn btn-black">Cancel</a>
            </div> <!-- end .save-cancel-button -->
            <!-- Guardar -->

    </div> <!-- end .candidate-reg-form -->
</div> <!-- end .9col grid layout -->
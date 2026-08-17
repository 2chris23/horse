{{--
<div class="modal fade " id="workwi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span
                            class="sr-only">Close</span>
                </button>
                <h3 class="modal-title">Comparte</h3>
            </div>
            <div class="modal-body">
                --}}
<div class="col-xs-12">
    <div class="job-reg-form col-xs-12">
        <form action="#" class="col-xs-12 row">
            <!-- Titulo carta-->
            <div class="form-banner-button  col-xs-12">
                <div class="preview-import pull-left col-xs-8">
                    <a class="btn btn-green" href="#">Preview</a>
                    <a class="btn btn-default ml3" href="#"><i class="fa fa-linkedin-square"></i>Import
                        Data from
                        LinkedIn</a>
                </div> <!-- end .preview-import -->

                <div class="language pull-right col-xs-4">
                    <div class="language-select pull-left">
                        <select>
                            <option value="#">EN</option>
                            <option value="#">FR</option>
                            <option value="#">IT</option>
                            <option value="#">DE</option>
                        </select>
                    </div> <!-- end .language-select -->

                    <a class="btn btn-default pull-left ml5" href="#">Add Language</a>

                </div> <!-- end .language -->

            </div> <!-- end .form-banner-button -->
            <!-- Titulo carta-->

            <!-- Datos candidato -->
            <div class="candidate-single-content mt20 col-xs-12 m-t-20">
                <div class="row">
                    <div class="col-md-4">
                        <label><span>*</span>About the Candidate SOBRE</label>
                    </div> <!-- end .4th grid-layout -->
                    <div class="col-md-8">
                        <div class="candidate-des-editore col-xs-12">
                            <div class="textarea-editor col-xs-12">
                                <textarea name="area" id="myNicEditor" cols="40" class="form-control"></textarea>
                                <p>You can add HTML content or input your HTML file
                                    <a href="#" class="btn btn-default">Import</a>
                                </p>
                            </div> <!-- end textarea-editor -->
                        </div> <!-- end .condidate-description -->
                    </div> <!-- end .8th grid layout -->

                </div> <!-- end nasted .row -->
            </div> <!-- end .candidate-single-content -->
            <!-- Datos candidato -->
            <!-- Habilidad -->
            <div class="candidate-single-content  col-xs-12">
                <div class="row">
                    <div class="col-md-4">
                        <label><span>*</span>Skills</label>
                    </div> <!-- end .4th grid-layout -->

                    <div class="col-md-8">
                        <div class="candidate-skill-single clearfix">

                            <div class="skill-edit-button col-xs-3">
                                <a href="#" class="skill-edit btn-primary">Edit</a>
                                <a href="#" class="skill-delete btn-danger">Delete</a>
                                <a href="#" class="skill-save btn-success">Save</a>
                            </div> <!-- end .sill-edit-button -->

                            <div class="skill-edit-content col-xs-9">
                                <div class="skill-selectbox mb10 col-xs-12">
                                    <select class="form-control">
                                        <option value="#">Select you Skill</option>
                                        <option value="#">php</option>
                                        <option value="#">css</option>
                                        <option value="#">html</option>
                                        <option value="#">javascript</option>
                                    </select>
                                </div> <!-- end .skill-selectbox -->

                                <div class="skill-description mb10 col-xs-12">
                                                    <textarea name="skill-description" class="form-control"
                                                              placeholder="Description"></textarea>
                                </div> <!-- end .skill-description -->

                                <div class="skill-progressbar col-xs-12">

                                    <p>
                                        <span class="mini-amount">0%</span>
                                        <input type="text" id="amount-first">

                                    </p>

                                    <div id="slider-skill-first"></div>
                                </div> <!-- end .skill-progressbar -->

                            </div> <!-- end .skill-edit-content -->
                        </div> <!-- end .candidate-skills-single -->
                        {{--
                                                                <div class="candidate-skill-single clearfix">

                                                                    <div class="skill-edit-button">
                                                                        <a href="#" class="skill-edit btn-primary">Edit</a>
                                                                        <a href="#" class="skill-delete btn-danger">Delete</a>
                                                                        <a href="#" class="skill-save btn-success">Save</a>
                                                                    </div> <!-- end .sill-edit-button -->

                                                                    <div class="skill-edit-content">
                                                                        <div class="skill-selectbox mb10">
                                                                            <select>
                                                                                <option value="#">Select you Skill</option>
                                                                                <option value="#">php</option>
                                                                                <option value="#">css</option>
                                                                                <option value="#">html</option>
                                                                                <option value="#">javascript</option>
                                                                            </select>
                                                                        </div> <!-- end .skill-selectbox -->

                                                                        <div class="skill-description mb10">
                                                                            <textarea name="skill-description"
                                                                                      placeholder="Description"></textarea>
                                                                        </div> <!-- end .skill-description -->

                                                                        <div class="skill-progressbar">

                                                                            <p>
                                                                                <span class="mini-amount">0%</span>
                                                                                <input type="text" id="amount-second">

                                                                            </p>

                                                                            <div id="slider-skill-second"></div>
                                                                        </div> <!-- end .skill-progressbar -->

                                                                    </div> <!-- end .skill-edit-content -->
                                                                </div> <!-- end .candidate-skills-single -->

                                                                <div class="candidate-skill-single clearfix">

                                                                    <div class="skill-edit-button">
                                                                        <a href="#" class="skill-edit btn-primary">Edit</a>
                                                                        <a href="#" class="skill-delete btn-danger">Delete</a>
                                                                        <a href="#" class="skill-save btn-success">Save</a>
                                                                    </div> <!-- end .sill-edit-button -->

                                                                    <div class="skill-edit-content">
                                                                        <div class="skill-selectbox mb10">
                                                                            <select>
                                                                                <option value="#">Select you Skill</option>
                                                                                <option value="#">php</option>
                                                                                <option value="#">css</option>
                                                                                <option value="#">html</option>
                                                                                <option value="#">javascript</option>
                                                                            </select>
                                                                        </div> <!-- end .skill-selectbox -->

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

                        <div class="add-skill-button">
                            <a class="btn btn-default" href="#">Add a Skill</a>
                        </div>
                    </div> <!-- end .8th grid layout -->
                </div> <!-- end nasted .row -->
            </div> <!-- end .candidate-single-content -->
            <!-- Habilidad -->
            <!-- Habilidad adicional-->
            <div class="candidate-single-content  col-xs-12">
                <div class="row">
                    <div class="col-md-4">
                        <label><span>*</span>Additional Skills</label>
                    </div> <!-- end .4th grid-layout -->

                    <div class="col-md-8">
                        <div class="add-skills-field">
                            <input type="text" placeholder="Add your skills separated by comma">
                        </div>
                    </div> <!-- end .8th grid layout -->
                </div> <!-- end .nasted .row -->
            </div> <!-- end .candidate-single-content -->
            <!-- Habilidad adicional-->
            <!-- Guardar -->
            <div class="save-cancel-button ml20  col-xs-12">
                <a href="#" class="btn btn-default">Save</a>
                <a href="#" class="btn btn-black">Cancel</a>
            </div> <!-- end .save-cancel-button -->
            <!-- Guardar -->
        </form>
    </div> <!-- end .candidate-reg-form -->
</div> <!-- end .9col grid layout -->


{{--
<div class="modal-footer">
                    <a href="#!"
                       onclick="window.open('{!! $fbs !!}', 'Compartir caballo', 'resizable=no,height=200,scrollbars=no');"
                       class="btn btn-fb btn-md">
                        <i class="fa fa-facebook">
                        </i>
                    </a>
                    <a href="#!"
                       onclick="window.open('{!! $tws !!}', 'Compartir caballo', 'resizable=no,height=200,scrollbars=no');"
                       class="btn btn-twitter btn-md">
                        <i class="fa fa-twitter">
                        </i>
                    </a>
                    <a href="#!"
                       onclick="window.open('{!! $Gs !!}', 'Compartir caballo', 'resizable=no,height=200,scrollbars=no');"
                       class="btn btn-gplus btn-md">
                        <i class="fa fa-google-plus">
                        </i>
                    </a>
                    </div>
    --}}
{{--

</div>
</div>
</div>
</div>
--}}
<div class="col-xs-12">
    ddasdad
</div>

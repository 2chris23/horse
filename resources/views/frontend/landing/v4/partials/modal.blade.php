<div class="modal fade" id="modalcontact">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title">{!! trans('stud.contact') !!}</h4>
            </div>
            <div class="modal-body">
                <div class="mailchimp-form">
                    <form class="sm-m-top-30 row " action="{!! route('contacto.accion') !!}" method="post">
                        <input type="hidden" value="{!! csrf_token() !!}" id="_token" name="_token">
                        <input type="hidden" value="{!! $stud->id !!}" id="stud" name="stud">
                        <div class="col-sm-12 col-md-4 ">
                            <div class="form-group">
                                <label>{!! trans('stud.namecontact') !!} *</label>
                                <input name="name" class="form-control" type="text"
                                       placeholder="{!! trans('stud.namecontactplace') !!}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label>{!! trans('stud.emailcontact') !!} *</label>
                                <input name="email" class="form-control" type="text"
                                       placeholder="{!! trans('stud.emailcontactplace') !!}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label>{!! trans('stud.phonecontact') !!}</label>
                                <input name="phone" class="form-control numbers" type="tel"
                                       placeholder="{!! trans('stud.phonecontactplace') !!}">
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label>{!! trans('stud.smscontact') !!} *</label>
                                <textarea name="message" class="form-control" rows="6"
                                          placeholder="{!! trans('stud.smscontactplace') !!}"></textarea>
                            </div>
                        </div>
                        <input type="submit" class="hidden hidden-xs-up" id="ddaassvv">
                    </form>
                </div>
                <div class="col-12 text-center text-small pt-5">
                    {!! trans('tema1.whorwithus',['link'=>route('TrabajoIndex',['slug'=>$stud->slug])]) !!}
                </div>
                <div class="row mt-15 justify-content-around info">
                    <div class="col-md-4">
                        @if(!empty($stud->getAddress()))
                            <div class="mt-2 col-10 text-center mx-auto">
                                <i class="fa fa-map-marker mb-2"></i>
                                <br>
                                {!! $stud->getAddress() !!}, {!! $stud->getCity() !!}
                                , {!! $stud->getStateModel()->name!!}, {!! $stud->getCountryModel()->name !!}
                            </div>
                        @endif
                    </div>
                    <div class="col-md-4">
                        @php($cd = 0)
                        @foreach($stud->getPhoneModel() as $k=> $v)
                            @if($v->isNull() !== true)
                                <div class="mt-2 col-10 text-center mx-auto">
                                    @if($cd == 0)
                                        <i class="fa fa-phone mb-2"></i>
                                        <br>
                                        @php($cd = 1)
                                    @endif
                                    <a rel="nofollow" href="tel:{!! $v->getFormatNumberOnly() !!}" class="no-color">
                                        {!! $v->FormatNumber() !!}
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-md-4">
                        <div class="mt-2 col-10 text-center mx-auto">
                            <i class="fa fa-envelope mb-2"></i>
                            <br>
                            {!! $stud->getEmail() !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a rel="nofollow" href="#"
                   class="awe-btn font-hind bold f12 awe-btn-cancel f13"
                   data-dismiss="modal">{!! trans('masivo.cancel') !!}</a>
                <a rel="nofollow" href="#" onclick="$('#ddaassvv').click()"
                   class="awe-btn font-hind bold f12 awe-btn-default f13">{!! trans('masivo.send') !!}</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
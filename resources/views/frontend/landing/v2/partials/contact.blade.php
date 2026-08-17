@php($caballo = isset($caballo)?$caballo:null)
<div class="col-md-12">
    {{--
    <div class="maintitle">
        <h3 class="section-title texto-shadow ">
            {!! trans('stud.contact') !!}
        </h3>
        <p class="lead texto-shadow ">
            {!! trans('tema2.contactsms') !!}
        </p>
    </div>
    --}}
    @if(empty($caballo))
        <form class="text-left " id="contact" name="contact" action="{!! route('contacto.accion') !!}" method="post">
            @else
                <form class="text-left " id="contact" name="contact"
                      action="{!! route('contactocaballoventa',['slug'=>$caballo->slug]) !!}" method="post">
                    @endif

                    {{--<form id="contact" name="contact" method="post" class="text-left">--}}
                    <input type="hidden" value="{!! csrf_token() !!}" id="_token" name="_token">
                    <input type="hidden" value="{!! $stud->id !!}" id="stud" name="stud">

                    <fieldset>
                        <div class="row">
                            <div class="col-md-4 wow fadeIn animated animated" data-wow-delay="0.1s"
                                 data-wow-duration="2s">

                                <label for="name" class="texto-shadow ">{!! trans('stud.namecontact') !!} <span
                                            class="required">*</span></label>
                                <input name="name" class="form-control" type="text" size="30"
                                       placeholder="{!! trans('stud.namecontactplace') !!}" required>
                            </div>
                            <div class="col-md-4 wow fadeIn animated" data-wow-delay="0.3s" data-wow-duration="2s">
                                <label for="email" class="texto-shadow ">{!! trans('stud.emailcontact') !!}<span
                                            class="required">*</span></label>
                                <input name="email" class="form-control" type="text" size="30" required
                                       placeholder="{!! trans('stud.emailcontactplace') !!}">
                            </div>
                            <div class="col-md-4 wow fadeIn animated" data-wow-delay="0.3s" data-wow-duration="2s">
                                <label for="phone" class="texto-shadow ">{!! trans('stud.phonecontact') !!}</label>
                                <input name="phone" class="form-control numbers" type="tel" size="30"
                                       placeholder="{!! trans('stud.phonecontactplace') !!}">
                            </div>
                        </div>
                        <div class="wow fadeIn animated" data-wow-delay="0.3s" data-wow-duration="1.5"
                             style="margin-top:15px;">
                            <label for="message" class="texto-shadow ">{!! trans('stud.smscontact') !!}<span
                                        class="required">*</span></label>

                            <textarea name="message" class="form-control" rows="6"
                                      placeholder="{!! trans('stud.smscontactplace') !!}" required></textarea>
                        </div>
                        <div class="wow fadeIn animated" data-wow-delay="0.3" data-wow-duration="1.5s">
                            @if(empty($caballo))
                                <input id="submit" type="submit" name="submit" value="{!! trans('stud.send') !!}"/>
                            @else
                                <input id="submit" type="submit" name="submit"
                                       value="{!! trans('portal.emailcontact') !!}"/>
                            @endif


                        </div>
                    </fieldset>
                </form>
                <div id="success">
                    <p class="contactalert  texto-shadow ">
                        {!! trans('tema2.contactsend') !!}
                    </p>
                </div>
                <div id="error">
                    <p class="contactalert texto-shadow ">
                        {!! trans('tema2.contactnosend') !!}

                    </p>
                </div>

                @if(empty($caballo))
                    <div class="col-xs-12 text-center text-small text-right texto-shadow ">
                        {!! trans('tema1.whorwithus',['link'=>route('TrabajoIndex',['slug'=>$stud->slug])]) !!}
                    </div>

                @endif


</div>
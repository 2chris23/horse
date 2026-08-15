{{--onload="pagespeed.CriticalImages.checkImageForCriticality(this);"--}}
<div id="request_list" style="padding-top: 54px;" class="">
    <div class="request_scrollable" style="height: 812px; overflow: hidden; padding: 0px; width: 250px;">


        <div class="jspContainer" style="width: 250px; height: 812px;">
            <div class="jspPane" style="padding: 0px; top: 0px; left: 0px; width: 250px;">
                <ul class="nav nav-tabs m-t-15">
                    <li class="nav-item">
                        <a class="nav-link active text-center"
                           href="#settings"
                           data-toggle="tab">Otras operaciones</a>
                    </li>
                    {{--
                    <li class="nav-item">
                        <a class="nav-link text-center"
                           href="#favourites"
                           data-toggle="tab">Favorites</a>
                    </li>
                    --}}
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="settings">
                        <div id="settings_section">
                            <div class="layout_styles mx-3">
                                {{--
                                <div class="row">
                                    <div class="col-12 m-t-35">
                                        <a href="#!">
                                            Hora {!! Funciones::AjustarFechaDmySlashHms() !!}
                                        </a>
                                    </div>
                                </div>
                                --}}
                                <div class="row">
                                    <div class="col-12 m-t-35">
                                        <a href="{!! url('#') !!}">
                                            Registros
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 m-t-35">
                                        <a href="{!! url('#') !!}" target="_blank">
                                            Monedas
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 m-t-35">
                                        <a href="{!! url('#') !!}" target="_blank">
                                            Traducciones
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 m-t-35">
                                        <a href="{!! url('#') !!}" target="_blank">
                                            Razas
                                        </a>
                                    </div>
                                </div>
                                {{--
                                <div class="row">
                                    <div class="col-12 m-t-35">
                                        <a href="{!! url('#') !!}">
                                            Fakemail test
                                        </a>
                                    </div>
                                </div>
                                --}}
                                {{--
                                <div class="row">
                                    <div class="col-12 m-t-35">
                                        <a href="http://fontawesome.io/icons/">
                                            Font Awsome
                                        </a>
                                    </div>
                                </div>
                                --}}
                                <div class="row">
                                    <div class="col-12 m-t-35">
                                        <a href="https://www.flaticon.com/">
                                            Flaticon
                                        </a>
                                    </div>
                                </div>

                                {{--
                                                            <div class="layout_styles mx-3">
                                                                <div class="row">
                                                                    <div class="col-12 m-t-35">
                                                                        Fake Ticket
                                                                    </div>
                                                                </div>
                                                            </div>
                                --}}

                                <div class="row">
                                    {{--<div class="col-12 m-t-35 text-center">
                                        <a href="{!! url('#') !!}" target="_blank">
                                            Monitor
                                        </a>
                                    </div>--}}
                                    <div class="col-12 m-t-35">
                                        <a href="{!! url('#') !!}" target="_blank">
                                            Backup
                                        </a>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    {{--
                    <div class="tab-pane active" id="settings">
                        <div id="settings_section">
                            <div class="layout_styles mx-3">
                                <div class="row">
                                    <div class="col-12 m-t-35">
                                        <h4>Layout settings</h4>
                                    </div>
                                </div>
                                <form autocomplete="off">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="float-left m-t-20">Fixed Header</div>
                                            <div class="float-right m-t-15">
                                                <div id="setting_fixed_nav">
                                                    <div class="lcs_wrap"><input class="make-switch" data-on-text="ON"
                                                                                 data-off-text="OFF" type="checkbox"
                                                                                 data-size="small" checked="">
                                                        <div class="lcs_switch  lcs_on lcs_checkbox_switch">
                                                            <div class="lcs_cursor"></div>
                                                            <div class="lcs_label lcs_label_on">ON</div>
                                                            <div class="lcs_label lcs_label_off">OFF</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="float-left m-t-20">Fixed Menu</div>
                                            <div class="float-right m-t-15">
                                                <div id="setting_fixed_menunav">
                                                    <div class="lcs_wrap"><input class="make-switch" data-on-text="ON"
                                                                                 data-off-text="OFF" name="radioBox"
                                                                                 type="checkbox" data-size="small">
                                                        <div class="lcs_switch  lcs_off lcs_checkbox_switch">
                                                            <div class="lcs_cursor"></div>
                                                            <div class="lcs_label lcs_label_on">ON</div>
                                                            <div class="lcs_label lcs_label_off">OFF</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="float-left m-t-20">No Breadcrumb</div>
                                            <div class="float-right m-t-15">
                                                <div id="setting_breadcrumb">
                                                    <div class="lcs_wrap"><input class="make-switch" data-on-text="ON"
                                                                                 data-off-text="OFF" type="checkbox"
                                                                                 data-size="small">
                                                        <div class="lcs_switch  lcs_off lcs_checkbox_switch">
                                                            <div class="lcs_cursor"></div>
                                                            <div class="lcs_label lcs_label_on">ON</div>
                                                            <div class="lcs_label lcs_label_off">OFF</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="mx-3">
                                <div class="row">
                                    <div class="col-12 m-t-35">
                                        <h4 class="setting_title">General Settings</h4>
                                    </div>
                                </div>
                                <div class="data m-t-5">
                                    <div class="row">
                                        <div class="col-2"><i class="fa fa-bell-o setting_ions text-info"></i></div>
                                        <div class="col-7">
                                            <span class="chat_name">Notifications</span><br>
                                            Get new notifications
                                        </div>
                                        <div class="col-2 checkbox float-right">
                                            <label class="text-info">
                                                <input type="checkbox" value="" checked="">
                                                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="data">
                                    <div class="row">
                                        <div class="col-2"><i class="fa fa-envelope-o setting_ions text-danger"></i>
                                        </div>
                                        <div class="col-7">
                                            <span class="chat_name">Messages</span><br>
                                            Get new messages
                                        </div>
                                        <div class="col-2 checkbox float-right">
                                            <label class="text-danger">
                                                <input type="checkbox" value="" checked="">
                                                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="data">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="fa fa-exclamation-triangle setting_ions text-warning"></i>
                                        </div>
                                        <div class="col-7">
                                            <span class="chat_name">Warnings</span><br>
                                            Get new warnings
                                        </div>
                                        <div class="col-2 checkbox float-right">
                                            <label class="text-warning">
                                                <input type="checkbox" value="" checked="">
                                                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="data">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="fa fa-calendar texlayout_stylest-primary setting_ions"></i>
                                        </div>
                                        <div class="col-7">
                                            <span class="chat_name">Events</span><br>
                                            Show new events
                                        </div>
                                        <div class="col-2 checkbox float-right">
                                            <label class="text-primary">
                                                <input type="checkbox" value="">
                                                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    --}}
                    <div class="tab-pane" id="favourites">
                        <div id="requests" class="mx-3">
                            <div class="m-t-35">
                                <h4 class="setting_title">Favorites</h4>
                            </div>
                            <div class="data m-t-10">
                                <div class="row">
                                    <div class="col-2">
                                        <img src="#!"
                                             class="message-img avatar rounded-circle" alt="avatar1"
                                             data-pagespeed-url-hash="2620256442"
                                        ></div>
                                    <div class="col-8 message-data"><span class="chat_name">Philip J. Webb</span><br>
                                        Available
                                    </div>
                                    <div class="col-1">
                                        <i class="fa fa-circle text-success"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="data">
                                <div class="row">
                                    <div class="col-2">
                                        <img src="#!"
                                             class="message-img avatar rounded-circle" alt="avatar1"
                                             data-pagespeed-url-hash="685232321"
                                        >
                                    </div>
                                    <div class="col-8 message-data">
                                        <span class="chat_name">Nancy T. Strozier</span><br>
                                        Away
                                    </div>
                                    <div class="col-1">
                                        <i class="fa fa-circle text-warning"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="data">
                                <div class="row">
                                    <div class="col-2">
                                        <img src="#!"
                                             class="message-img avatar rounded-circle" alt="avatar1"
                                             data-pagespeed-url-hash="3507700012"
                                        >
                                    </div>
                                    <div class="col-8 message-data">
                                        <span class="chat_name">Robbinson</span><br>
                                        Offline
                                    </div>
                                    <div class="col-1">
                                        <i class="fa fa-circle"></i>
                                    </div>
                                </div>
                            </div>
                            <h4 class="setting_title">Contacts</h4>
                            <div class="data m-t-10">
                                <div class="row">
                                    <div class="col-2">
                                        <img src="#!"
                                             class="message-img avatar rounded-circle" alt="avatar1"
                                             data-pagespeed-url-hash="390732400"
                                        >
                                    </div>
                                    <div class="col-8 message-data">
                                        <span class="chat_name">Chester Hardesty</span><br>
                                        Busy
                                    </div>
                                    <div class="col-1">
                                        <i class="fa fa-circle text-warning"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="data">
                                <div class="row">
                                    <div class="col-2">
                                        <img src="#!"
                                             class="message-img avatar rounded-circle" alt="avatar1"
                                             data-pagespeed-url-hash="3213200091"
                                        ></div>
                                    <div class="col-8 message-data">
                                        <span class="chat_name">Peter</span><br>
                                        Online
                                    </div>
                                    <div class="col-1">
                                        <i class="fa fa-circle text-warning"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="data">
                                <div class="row">
                                    <div class="col-2">
                                        <img src="#!"
                                             class="message-img avatar rounded-circle" alt="avatar1"
                                             data-pagespeed-url-hash="96232479"
                                        >
                                    </div>
                                    <div class="col-8 message-data">
                                        <span class="chat_name">Devin Hartsell</span><br>
                                        Available
                                    </div>
                                    <div class="col-1">
                                        <i class="fa fa-circle text-success"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="data">
                                <div class="row">
                                    <div class="col-2">
                                        <img src="#!"
                                             class="message-img avatar rounded-circle" alt="avatar1"
                                             data-pagespeed-url-hash="3802199933"
                                        ></div>
                                    <div class="col-8 message-data">
                                        <span class="chat_name">Kimy Zorda</span><br>
                                        Available
                                    </div>
                                    <div class="col-1">
                                        <i class="fa fa-circle text-success"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="data">
                                <div class="row">
                                    <div class="col-2">
                                        <img src="#!"
                                             class="message-img avatar rounded-circle" alt="avatar1"
                                             data-pagespeed-url-hash="4096699854"
                                        ></div>
                                    <div class="col-8 message-data">
                                        <span class="chat_name">Jessica Bell</span><br>
                                        Offline
                                    </div>
                                    <div class="col-1">
                                        <i class="fa fa-circle"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

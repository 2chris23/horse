<div class="notifications no-bg">
    <a class="btn btn-default btn-sm messages" data-toggle="dropdown" id="messages_section"> <i
                class="flag flag-{!! \Session::get('applocale') !!}">
            {{--            <span class="flag flag-es"></span>--}}
        </i>
        {{--<span class="badge badge-pill badge-warning notifications_badge_top">8</span>--}}
    </a>
    <div class="dropdown-menu drop_box_align" role="menu" id="messages_dropdown">
        <div class="popover-title"><span class="flag flag-es"></span></div>
        <div id="messages">
            @php($ln = \Config::get('lenguaje'))
            @foreach($ln as $k=>$v)
            <div class="data">
                <div class="row" onclick="changelan('{!! $k !!}')">

                    <div class="col-2">
                        <span class="flag flag-{!! $k !!}" style="display: inline-block!important;"></span>
                    </div>
                    <div class="col-10 message-data">
                        <strong>{!! $v !!}</strong>
                    </div>

                </div>
            </div>
            @endforeach

            {{--
            <div class="data">
                <div class="row" onclick="changelan('de')">
                    <div class="col-2">
                        <span class="flag flag-de" style="display: inline-block!important;"></span>
                    </div>
                    <div class="col-10 message-data">
                        <strong>Deutsch</strong>
                    </div>
                </div>
            </div>

            <div class="data">
                <div class="row" onclick="changelan('es')">
                    <div class="col-2">
                        <span class="flag flag-es" style="display: inline-block!important;"></span>
                    </div>
                    <div class="col-10 message-data">
                        <strong>Español</strong>
                    </div>
                </div>
            </div>

            <div class="data">
                <div class="row" onclick="changelan('fr')">
                    <div class="col-2">
                        <span class="flag flag-fr" style="display: inline-block!important;"></span></div>
                    <div class="col-10 message-data">
                        <strong>Français</strong>
                    </div>
                </div>
            </div>

            <div class="data">
                <div class="row" onclick="changelan('it')">
                    <div class="col-2">
                        <span class="flag flag-it" style="display: inline-block!important;"></span></div>
                    <div class="col-10 message-data">
                        <strong>Italiano</strong>
                    </div>
                </div>
            </div>

            <div class="data">
                <div class="row" onclick="changelan('en')">
                    <div class="col-2">
                        <span class="flag flag-nl" style="display: inline-block!important;"></span></div>
                    <div class="col-10 message-data">
                        <strong>Nederlands</strong>
                    </div>

                </div>
            </div>
            <div class="data">
                <div class="row" onclick="changelan('pr')">
                    <div class="col-2">
                        <span class="flag flag-br" style="display: inline-block!important;"></span></div>
                    <div class="col-10 message-data">
                        <strong>Português</strong>
                    </div>

                </div>
            </div>
            --}}

            <div class="popover-footer">
                {{--<a href="#" class="text-white">Inbox</a>--}}
            </div>

        </div>
    </div>
</div>
<script>
    function changelan(id) {
        var url = '{!! route('lengauje') !!}/' + id;
        console.log(url);
        window.location.replace(url);
    }
</script>
{{--

--}}

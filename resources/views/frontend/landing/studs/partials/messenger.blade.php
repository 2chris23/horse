@if(!empty($stud->getWscontact()) or !empty($stud->getFbcontact()))
    <!-- WhatsHelp.io widget -->
    <style>
        #wh-widget-send-button {
            margin: 0 !important;
            padding: 0 !important;
            position: fixed !important;
            z-index: 16000160 !important;
            bottom: 0 !important;
            text-align: center !important;
            height: 90px;
            width: 60px;
            visibility: visible;
            transition: none !important;
        }

        #wh-widget-send-button.wh-widget-right {
            right: 0;
        }

        #wh-widget-send-button.wh-widget-left {
            left: 10px;
        }

        #wh-widget-send-button iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }

        div.clear {
            clear: both;
        }
    </style>
    <script type="text/javascript">

        (function () {

            var options = {
                @php
                    $tt  = null;
                        if(!empty($stud->getFbcontact())){
                        $tt = "facebook:'".$stud->getFacebookId()."',";
                        }
                    $ff  = null;
                        if(!empty($stud->getWscontact())){
                        $ff = "whatsapp:'".$stud->getWscontact()."',";
                        }

                @endphp

                {{--facebook: "Carlanganas", // Facebook page ID--}}
                        {!! $tt !!}{{--// Facebook page ID--}}


                {!! $ff !!}
                        {{--whatsapp: "+584266752455", // WhatsApp number--}}


                company_logo_url: "//static.whatshelp.io/img/flag.png", {{--// URL of company logo (png, jpg, gif)--}}
                greeting_message: "{!! trans('stud.smswelcomestud') !!}", {{--// Text of greeting message--}}
                call_to_action: "{!! trans('stud.smsactionstud') !!}", {{--// Call to action--}}
                button_color: "#E74339", {{--// Color of button--}}
                {{--position: "left", // Position may be 'right' or 'left'--}}
                position: "left", {{-- // Position may be 'right' or 'left'--}}
                @php
                    $show ='';
                if(!empty($stud->getFbcontact())){
                    $show .= "facebook";
                }

                if(!empty($stud->getWscontact()) and !empty($stud->getFbcontact())){
                    $show .= ",";
                }

                if(!empty($stud->getWscontact())){
                    $show .= "whatsapp";
                }

                @endphp
                order: "{!! $show !!}" {{--// Order of buttons--}}
            };
            var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
            var s = document.createElement('script');
            s.type = 'text/javascript';
            s.async = true;
            s.src = url + '/widget-send-button/js/init.js';
            s.onload = function () {
                WhWidgetSendButton.init(host, proto, options);
            };
            var x = document.getElementsByTagName('script')[0];
            x.parentNode.insertBefore(s, x);

        })();

    </script>
    <!-- /WhatsHelp.io widget -->
@endif

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WL5JW4G"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
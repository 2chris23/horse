<?php $envi = \Config::get('app.env'); ?>
@if($envi != 'local')
    <?php $robot= Agent::isRobot(); ?>
    @if($robot != true)
    {{--
        <!--Start of Zendesk Chat Script-->
        <style>
            .zopim {
                display: none !important;
            }
        </style>
        <script type="text/javascript">
            window.$zopim || (function (d, s) {
                var z = $zopim = function (c) {
                    z._.push(c)
                }, $ = z.s =
                    d.createElement(s), e = d.getElementsByTagName(s)[0];
                z.set = function (o) {
                    z.set._.push(o)
                };
                z._ = [];
                z.set._ = [];
                $.async = !0;
                $.setAttribute("charset", "utf-8");
                $.src = "https://v2.zopim.com/?5HJfiVKy1fuzjb9nzL4h0apQKUV8CeUo";
                z.t = +new Date;
                $.type = "text/javascript";
                e.parentNode.insertBefore($, e)
            })(document, "script");
        </script>
        <!--End of Zendesk Chat Script-->

        --}}
    <style>
        #chat-application, #chat-application-iframe {
            display: none !important;
        }
    </style>
    <!-- Smartsupp Live Chat script -->
    <script type="text/javascript">
        var _smartsupp = _smartsupp || {};
        _smartsupp.key = '32ca5c42456b3570590cf402b977637ed98bcda4';
        window.smartsupp || (function (d) {
            var s, c, o = smartsupp = function () {
                o._.push(arguments)
            };
            o._ = [];
            s = d.getElementsByTagName('script')[0];
            c = d.createElement('script');
            c.type = 'text/javascript';
            c.charset = 'utf-8';
            c.async = true;
            c.src = 'https://www.smartsuppchat.com/loader.js?';
            s.parentNode.insertBefore(c, s);
        })(document);
    </script>

    @endif
@endif
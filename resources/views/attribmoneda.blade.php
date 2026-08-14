<script type="text/javascript">
    function tooltipsnew(v, d) {
        var toolconf = {
            animation: 'fade',
            delay: 200,
            theme: 'tooltipster-borderless',
            trigger: 'hover',
            content: d,
            contentAsHTML: true,
            contentCloning: false
        };
        $(v).tooltipster(toolconf)
    }

    /*$(document).ready(function () {*/

        var sa = $('[data-urlcubri]');
        var s = $('[data-urlmoneda]');

        $.each(s, function (k, v) {
            var t = $(v).attr('data-urlmoneda');
            $.ajax({
                url: t,
                headers: {
                    'X-CSRF-TOKEN': token,
                    'csrftoken': token,
                },
                contentType: 'JSON',
                processData: true,
                async: false,
                type: 'GET',
                success: function (data) {
                    var cu = data.cubri;
                    var pr = data.precio;
                    var da = cu + pr;

                    $(v).find('.tooltip_content').html(data.precio);
                    $(v).attr('tittle', data.precio).attr('data-title', data.precio).attr('data-content', data.precio);
                    tooltipsnew(v, data.precio);

                },
                error:
                    function (xhr, status, error) {
                        console.error(xhr);
                    }
            });
        });

        $.each(sa, function (k, v) {
            var t = $(v).attr('data-urlcubri');
            $.ajax({
                url: t,
                headers: {
                    'X-CSRF-TOKEN': token,
                    'csrftoken': token,
                },
                contentType: 'JSON',
                processData: true,
                async: false,
                type: 'GET',
                success: function (data) {

                    $(v).find('.tooltip_content').html(data.cubri);
                    $(v).attr('tittle', data.cubri).attr('data-title', data.cubri).attr('data-content', data.cubri);
                    tooltipsnew(v, data.cubri);

                },
                error:
                    function (xhr, status, error) {
                        console.error(xhr);
                    }
            });
        });
        /*
        .each(fa, function (k, v) {

             $(v).tooltipster({
                animation: 'fade',
                delay: 200,
                theme: 'tooltipster-punk',
                trigger: 'hover'
            });
            console.dir(v);
            console.log('finalizando tool');

        });
    */
    /*});*/
</script>
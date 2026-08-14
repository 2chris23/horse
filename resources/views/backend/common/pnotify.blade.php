<script>
    function SucP(titulo, contenido) {
        PNotify.prototype.options.styling = "fontawesome";

        new PNotify({
            title: titulo,
            text: contenido,
            type: 'success',
            delay:180000,
            /*
            animate: {
                animate: true,
                in_class: 'slideInDown',
                out_class: 'slideOutUp'
            }*/
        });

    };

    function WarP(titulo, contenido) {
        PNotify.prototype.options.styling = "fontawesome";
        new PNotify({
            title: titulo,
            text: contenido,
            type: 'warning',
            delay:180000,
            /*
            animate: {
                animate: true,
                in_class: 'slideInDown',
                out_class: 'slideOutUp'
            }
            */
        });
    }

    function InfP(titulo, contenido) {
        PNotify.prototype.options.styling = "fontawesome";
        new PNotify({
            title: titulo,
            text: contenido,
            delay:180000,
            type: 'info',
            /*
            animate: {
                animate: true,
                in_class: 'slideInDown',
                out_class: 'slideOutUp'
            }
            */
        });
    };

    function ErrP(titulo, contenido) {
        PNotify.prototype.options.styling = "fontawesome";
        new PNotify({
            title: titulo,
            delay:180000,
            text: contenido,
            type: 'error',
            /*
            animate: {
                animate: true,
                in_class: 'slideInDown',
                out_class: 'slideOutUp'
            }
            */
        });
    };
</script>
@if(isset($cd))
    <script>

        @endif
        function h(el) {
            console.dir($(el).attr('class'));
        }

        $('.emoji').on('click', function (e) {
            h(el);

        });


        @if(isset($cd))
    </script>
@endif
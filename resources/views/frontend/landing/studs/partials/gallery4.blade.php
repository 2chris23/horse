{{--http://sapegin.github.io/jquery.mosaicflow/ https://github.com/sapegin/jquery.mosaicflow--}}
@php


        @endphp

<style>
    .mosaicflow__column {
        float: left;
    }

    .mosaicflow__item img {
        display: block;
        width: 100%;
        height: auto;
    }
</style>
<div class="clearfix mosaicflow">

    @foreach($imagen as $k => $v)
        <div class="mosaicflow__item item">
            <img src="{!! $v['url'] !!}" alt="">
        </div>
    @endforeach
</div>
<script>

    window.onload = function () {
        $(function () {
            $('#mosaicflow').mosaicflow({
                itemSelector: '.item',
                minItemWidth: 240,
                minColumns: 1,
                columnClass: 'mosaicflow__column',
                itemHeightCalculation: 'auto',
                threshold: 40
            });
        });

    };
</script>
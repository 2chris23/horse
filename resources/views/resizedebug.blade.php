<div class="col-xs-12" id="windoda">

</div>
<script>
    function datosw(){
        var ww = $(window).width();
        var wh = $(window).height();
        var dw = $(document).width();
        var dh = $(document).height();
        var t = "<br>w-Widht "+ww+"<br>w-Height "+wh+"<br><br><br>d-Widht "+dw+"<br>d-Height "+dh+"<br><br>";
        $('#windoda').html(t);
    }
    $(window).on('resize',function(){
        datosw();
    });

    $(window).on('load',function(){
        datosw();
    });
</script>

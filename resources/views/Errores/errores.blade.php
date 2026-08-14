
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="robots" content="NoIndex,NoFollow">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 3 Fluid Layout Example</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
{{--
<nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Tutorial Republic</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="https://www.tutorialrepublic.com" target="_blank">Home</a></li>
                <li><a href="https://www.tutorialrepublic.com/about-us.php" target="_blank">About</a></li>
                <li><a href="https://www.tutorialrepublic.com/contact-us.php" target="_blank">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
--}}
<div class="container-fluid">
    <div class="row">
        <table class="table table-responsive table-striped table-hover table-condensed">
            <?php $col = [

                                    "id",
                                    "Tipo",
                                    "metodo",
                                    "url",
                                    "referer",

                                    "linea",
                                    "ip",
                                    "mensaje",
                                    "header",
                                    "traza",

                                ]; ?>
            <thead class="j209">
            <tr class="j210">
                @foreach($col as $v)
                    <th class="j215 j216 j219">
                        {!! $v !!}
                    </th>
                @endforeach
            </tr>

            </thead>
            <tbody>
            @foreach($errores as $k=>$v)

                <script>
                    var m_{!! $k !!} = '{!! nl2br(str_replace_last("'",'"',$v->traza)) !!}';
                </script>
                <tr class="j210 @if($k%2 )  active @endif " onclick="console.dir(m_{!! $k !!})">

                    @foreach($col as $g)
                        @if($g != 'traza')
                            <td class="j215 j217">{!! $v->{$g} !!}</td>
                        @endif
                    @endforeach
                </tr>

            @endforeach


            </tbody>


        </table>
    </div>
    <hr>
    <div class="row">
        <div class="col-xs-12 text-center">
            {!! $errores->render() !!}
        </div>
    </div>
</div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
</body>
<script>
    function mostrar(txt) {
        alert(txt);
    }
</script>
</html>




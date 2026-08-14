@php($user = isset($user)?$user:null)
@php($stud = !empty($user)?$user->Yeguada():null)
@php($cd = null)
@if(!empty($cd))
    <style>
        @endif
        @for($i=0;$i<110;$i++)
        @php($a = $i*10)
        @php($b = $a)
        @php($c = $b+5)

        .m-l-{!! $b !!} {
            margin-left: {!! $b !!}px;
        }

        .m-l-{!! $c !!} {
            margin-left: {!! $c !!}px;
        }

        .m-r-{!! $b !!} {
            margin-right: {!! $b !!}px;
        }

        .m-r-{!! $c !!} {
            margin-right: {!! $c !!}px;
        }

        .m-t-{!! $b !!} {
            margin-top: {!! $b !!}px;
        }

        .m-t-{!! $c !!} {
            margin-top: {!! $c !!}px;
        }

        .m-b-{!! $b !!} {
            margin-bottom: {!! $b !!}px;
        }

        .m-b-{!! $c !!} {
            margin-bottom: {!! $c !!}px;
        }

        .p-l-{!! $b !!} {
            padding-left: {!! $b !!}px;
        }

        .p-l-{!! $c !!} {
            padding-left: {!! $c !!}px;
        }

        .p-r-{!! $b !!} {
            padding-right: {!! $b !!}px;
        }

        .p-r-{!! $c !!} {
            padding-right: {!! $c !!}px;
        }

        .p-t-{!! $b !!} {
            padding-top: {!! $b !!}px;
        }

        .p-t-{!! $c !!} {
            padding-top: {!! $c !!}px;
        }

        .p-b-{!! $b !!} {
            padding-bottom: {!! $b !!}px;
        }

        .p-b-{!! $c !!} {
            padding-bottom: {!! $c !!}px;
        }

        .pad-{!! $b !!}-{!! $b !!}  {
            padding-left: {!! $b !!}px;
            padding-right: {!! $b !!}px;
        }

        .pad-{!! $c !!}-{!! $c !!}  {
            padding-left: {!! $c !!}px;
            padding-right: {!! $c !!}px;
        }

        .m-lr-{!! $b !!}-{!! $b !!}  {
            margin-left: {!! $b !!}px;
            margin-right: {!! $b !!}px;
        }

        .m-lr-{!! $c !!}-{!! $c !!}  {
            margin-left: {!! $c !!}px;
            margin-right: {!! $c !!}px;
        }

        .w-p-{!! $b !!}  {
            width: {!! $b !!}% !important;
        }

        .w-p-{!! $c !!}  {
            width: {!! $c !!}% !important;
        }
        @endfor

        @if(!empty($cd)) </style> @endif {{--Borrar el 15/01/2018--}}
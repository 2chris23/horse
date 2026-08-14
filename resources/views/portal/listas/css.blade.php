@php($cd = null) @if(!empty($cd))
    <style> @endif
        @php $f[0]=url('landing/images/slider/1/2.jpg'); $f[1]=url('landing/images/slider/1/6.jpg'); $f[2]=url('landing/images/slider/1/9.jpg'); $f[3]=url('landing/images/slider/1/8.jpg'); $imagen = $f[rand(0,3)]; @endphp

  .horse-special-price {
            font-size: 25px !important;
            font-weight: 600 !important;
            float: right;
            margin-bottom: 15px !important;
            /* color: #232323!important; */
            position: relative;
        }

        .category-title {
            padding-top: 30px;
        }
        @if(!empty($cd)) </style> @endif {{--Borrar el 15/01/2018--}}
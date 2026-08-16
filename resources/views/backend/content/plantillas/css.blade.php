@php($cd = null) @if(!empty($cd))
    <style> @endif

        .corte {
            float: left;
            overflow: hidden;
            position: relative;
            height: 200px;
        }

        .corte img {
            position: absolute;
        }

        .modal-img {
            float: left;
            overflow: hidden;
            overflow-y: inherit;
            position: relative;
            height: 200px;
        }

        .modal-img img {
            position: absolute;
        }

        .modal-dialog {
            top: 4%
        }

        .selected {
            box-shadow: 0 0 25px -5px #9e9c9e;
        } @php($cd = null) @if(!empty($cd)) </style> @endif
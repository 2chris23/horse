@if(!empty($stud))
    @php($colorcorp = $stud->getColor())
    @if(empty($stud))
        <style>
            @endif

    {{--INICIO--}}

	@if(!empty($colorcorp)) 
		.navbar-default .navbar-nav > li > a:hover,
            .navbar-default .navbar-nav > li > a:focus,
            .header_top_menu .call_us_text a i,
            .head_top_social a,
            .footer_socail_icon a i,
            .footer .copyright p a {
                color: {!! $colorcorp !!};
            }

            .btn-primary,
            .btn-primary.active.focus,
            .btn-primary.active:focus,
            .btn-primary.active:hover,
            .btn-primary:active.focus,
            .btn-primary:active:focus,
            .btn-primary:active:hover,
            .open > .dropdown-toggle.btn-primary.focus,
            .open > .dropdown-toggle.btn-primary:focus,
            .open > .dropdown-toggle.btn-primary:hover,
            .btn-primary.focus,
            .btn-primary:focus,
            .btn-primary.disabled,
            .btn-primary.disabled:hover {
                color: #ffffff;
                background-color: {!! $colorcorp !!};
                border-color: {!! $colorcorp !!};
            }

            @endif

	.single_widget p {
                margin-top: 5px;
                margin-bottom: 0px;
            }

            .footer_socail_icon {
                position: absolute;
                bottom: -90px;
                margin: 0 auto;
            }

            .single_widget_info i {
                margin-top: 15px;
            }

            .single_widget_info i {
                font-size: 1.3em;
            }


            {{--INICIO--}}
            @if(empty($stud))
        </style>
    @endif
@endif
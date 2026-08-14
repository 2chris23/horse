@extends('backend.layouts.base')
@section('title', trans('Titulos.PlanesStud') )
@php($p1 = 10)
@php($p3 = 25)
@php($p6 = 50)
@php($p12 = 100)

@php($c1 = '#000')
@php($c3 = '#d66a00')
@php($c6 = '#f38f2c')
@php($c12 = '#f93')
@section('topcss')
    <link type="text/css" rel="stylesheet"
          href="{!! url('css/pages/widgets.css') !!}"/>
    <style>

        .heading-title {
            margin-bottom: 100px;
        }

        .pricingTable {
            border: 1px solid rgba(0, 0, 0, 0.125);
            text-align: center;
            background: #fff;
            padding: 30px 0;
        }

        .pricingTable .title {
            font-size: 22px;
            font-weight: 600;
            color: #2e282a;
            text-transform: uppercase;
            margin: 0 0 30px 0;

        }

        .pricingTable .price-value {
            /*padding: 30px 0;*/
            background: #ba5289;
            margin-bottom: 30px;
            position: relative;
            padding-bottom: 10px;
            padding-top: 30px;

        }

        .pricingTable .price-value:before {
            content: "";
            border-top: 15px solid #fff;
            border-left: 15px solid transparent;
            border-right: 15px solid transparent;
            position: absolute;
            top: 0;
            left: 46%;
        }

        .pricingTable .month {
            display: block;
            font-size: 15px;
            font-weight: 900;
            color: #fff;
            text-transform: uppercase;
        }

        .pricingTable .amount {
            display: inline-block;
            font-size: 50px;
            color: #fff;
            position: relative;
        }

        .pricingTable .currency {
            position: absolute;
            top: 25px;
            left: -35px;
        }

        .pricingTable .value {
            font-size: 20px;
            position: absolute;
            top: 21px;
            right: -27px;
        }

        .pricingTable .pricing-content {
            padding: 0;
            margin: 0 0 30px 0;
            list-style: none;
        }

        .pricingTable .pricing-content li {
            font-size: 16px;
            color: #868686;
            line-height: 35px;
        }

        .pricingTable .pricingTable-signup {
            display: inline-block;
            padding: 8px 40px;
            background: #fca4a7;
            font-size: 15px;
            font-weight: 600;
            color: #fff;
            text-transform: capitalize;
            border: 2px solid #fca4a7;
            border-radius: 30px;
            transition: all 0.5s ease 0s;
        }

        .pricingTable .pricingTable-signup:hover {
            background: #fff;
            color: #fca4a7;
        }

        @media only screen and (max-width: 990px) {
            .pricingTable {
                margin-bottom: 30px;
            }
        }

        .pricingTable.c1 > .price-Value > .value,
        .pricingTable.c1 .heading,
        .pricingTable.c1.value {
            color: {!! $c1 !!};
        }

        .pricingTable.c3 > .price-Value > .value,
        .pricingTable.c3 .heading,
        .pricingTable.c3.value {
            color: {!! $c3 !!};
        }

        .pricingTable.c6 > .price-Value > .value,
        .pricingTable.c6 .heading,
        .pricingTable.c6.value {
            color: {!! $c6 !!};
        }

        .pricingTable.c12 > .price-Value > .value,
        .pricingTable.c12 .heading,
        .pricingTable.c12.value {
            color: {!! $c12 !!};
        }

        .pricingTable.c1 > a {
            background-color: {!! $c1 !!};
        }

        .pricingTable.c3 > a {
            background-color: {!! $c3 !!};
        }

        .pricingTable.c6 > a {
            background-color: {!! $c6 !!};
        }

        .pricingTable.c12 > a {
            background-color: {!! $c12 !!};
        }

        @media only screen and (max-width: 480px) {
            .pricingTable .pricingTable-signup {
                padding: 10px 20px;
            }
        }
    </style>
@endsection
@section('topjs')


@endsection
@section('content')
    @php
            @endphp
    <div class="card">
        <div class="card-block">
            <div class='card-header bg-white '>

            </div>
            <div class="row col-12">

                {{-- Tipo 1-- }}
                <div class="col-lg-3 col-sm-6 col-12 m-t-35">
                    <div class="card payment">
                        <div class="card-header bg-warning text-center">
                            GOLD
                        </div>
                        <div class="bg-white">
                            <div class="card-block m-t-15">
                                <div class="amount text-center">
                                    <span>
<sup class="dollar_symbol">
<strong>$</strong>
</sup>
</span>
<span class="price"
                                                                                                          id="gold">330</span>
<span>/month</span>
                                </div>
                                <div class="text-center">
                                    <div>Upto 25 projects</div>
                                    <div>Upto 100 users</div>
                                    <div class="m-b-15">125 GB storage</div>
                                    <hr>
                                </div>
                                <div class="text-center">
                                    <p>
<strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum,
                                            maiores!</strong>
                                    </p>
                                    <hr>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                    <hr>
                                    <div>Lorem ipsum dolor sit amet, consectetur adipisicing maiores.</div>
                                </div>
                            </div>
                            <div class="card-footer bg-white text-center">
                                <button class="btn btn-secondary btn-block get_plan_warning">GET PLAN</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Tipo 1-- }}
                {{-- Tipo 2-- }}
                <div class="col-lg-3 col-sm-6 col-12 m-t-35">
                    <div class="text-center pricing_bg pricing_info section_border">
                        <h3 class="m-t-10">Platinum Plan</h3>
                        <div class="mx-auto pricing_align">
                            <div class="half top text-white mx-auto">
                                <sup class="dollar_symbol">$</sup>
                                <span class="mont" id="platinum_plan">400</span>
                            </div>
                            <div class="half bottom mx-auto">
                                <p class="pricing_color">month</p>
                            </div>
                        </div>
                        <p>
<strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum, maiores!</strong>
                        </p>
                        <hr>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, ex!</p>
                        <hr>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <button class="btn btn-secondary btn-block mb-1">CHOOSE THIS
                        </button>
                    </div>
                </div>
                {{  -- Tipo 2--}}


                <div class="col-3  c1 m-t-35">
                    <div class="pricingTable">
                        <h3 class="title">Standard</h3>
                        <div class="price-value">
                            <span class="month">per month</span>
                            <span class="amount">
                                <span class="currency">$</span>
                                10
                                <span class="value">99</span>
                            </span>
                        </div>
                        {{--
                        <ul class="pricing-content">
                            <li>50GB Disk Space</li>
                            <li>50 Email Accounts</li>
                            <li>50GB Monthly Bandwidth</li>
                            <li>10 Subdomains</li>
                            <li>15 Domains</li>
                        </ul>
                        --}}
                        <a href="#!"
                           class="pricingTable-signup">Adquierelo</a>
                    </div>
                </div>

                <div class="col-4 m-t-35 m-b-35">
                    <div class="card">
                        <div class="card-block row m-t-35">
                            <div class="form-group row col-12  ">
                                <ul>
                                    <li>
                                        <i class="fa fa-dot-circle-o"> </i>
                                        50GB Disk Space
                                    </li>
                                    <li>
                                        <i class="fa fa-envelope"> </i>
                                        50 Email Accounts
                                    </li>
                                    <li>
                                        <i class="fa fa-forumbee"> </i>
                                        50GB Monthly Bandwidth
                                    </li>
                                    <li>
                                        <i class="fa fa-life-ring"> </i>
                                        15 Domains
                                    </li>
                                </ul>
                            </div>


                        </div>


                    </div>
                </div>
                {{--
                    <div class="col-md-3 col-sm-6">
                        <div class="pricingTable green active">
                            <div class="pricingTable-header text-center">
                                
                                <h3 class="heading">
                                    3 Meses
                                </h3>
                            </div>
                            <div class="pricing-content">
                                <ul>
                                    <li>
                                        <i class="fa fa-dot-circle-o"> </i>
                                        60GB Disk Space
                                    </li>
                                    <li>
                                        <i class="fa fa-envelope"> </i>
                                        60 Email Accounts
                                    </li>
                                    <li>
                                        <i class="fa fa-forumbee"> </i>
                                        60GB Monthly Bandwidth
                                    </li>
                                    <li>
                                        <i class="fa fa-life-ring"> </i>
                                        20 Domains
                                    </li>
                                </ul>
                            </div>
                            <div class="price-Value">
                                <span class="value">
                                    <span class="currency">$</span>
                                    20.00
                                    <span class="month">/mo</span>
                                </span>
                            </div>
                            <a href="#!"
                               class="btn pricingTable-signup">
     Afiliate </a>
                        </div>
                    </div>
    
                    <div class="col-md-3 col-sm-6">
                        <div class="pricingTable purple">
                            <div class="pricingTable-header text-center">
                                
                                <h3 class="heading">6 Meses</h3>
                            </div>
                            <div class="pricing-content">
                                <ul>
                                    <li>
                                        <i class="fa fa-dot-circle-o"> </i>
                                        70GB Disk Space
                                    </li>
                                    <li>
                                        <i class="fa fa-envelope"> </i>
                                        70 Email Accounts
                                    </li>
                                    <li>
                                        <i class="fa fa-forumbee"> </i>
                                        70GB Monthly Bandwidth
                                    </li>
                                    <li>
                                        <i class="fa fa-life-ring"> </i>
                                        25 Domains
                                    </li>
                                </ul>
                            </div>
                            <div class="price-Value">
                                <span class="value">
                                    <span class="currency">$</span>
                                    30.00
                                    <span class="month">/mo</span>
                                </span>
                            </div>
                            <a href="#!"
                               class="btn pricingTable-signup">
     Afiliate </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="pricingTable purple">
                            <div class="pricingTable-header text-center">
                                
                                <h3 class="heading">
                                    12 Meses
                                </h3>
                            </div>
                            <div class="pricing-content">
                                <ul>
                                    <li>
                                        <i class="fa fa-dot-circle-o"> </i>
                                        70GB Disk Space
                                    </li>
                                    <li>
                                        <i class="fa fa-envelope"> </i>
                                        70 Email Accounts
                                    </li>
                                    <li>
                                        <i class="fa fa-forumbee"> </i>
                                        70GB Monthly Bandwidth
                                    </li>
                                    <li>
                                        <i class="fa fa-life-ring"> </i>
                                        25 Domains
                                    </li>
                                </ul>
                            </div>
                            <div class="price-Value">
                                <span class="value">
                                    <span class="currency">$</span>
                                    30.00
                                    <span class="month">/mo</span>
                                </span>
                            </div>
                            <a href="#!"
                               class="btn pricingTable-signup">
     Afiliate </a>
                        </div>
                    </div>
                    --}}
                <div class="col-9">

                </div>
            </div>
        </div>
    </div>


@endsection

@section('bottomjs')


@endsection

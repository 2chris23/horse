@extends('backend.layouts.base')
@section('title', trans('horse.chooseone') )
@section('content')
    <div class="row">
        <div class="col-md-7">
            <div class="widget widget-fullwidth user-develop-chart">
                <div class="widget-head">
                    <div class="tools"><span class="icon s7-cloud-download"></span><span
                                class="icon s7-refresh-2"></span></div>
                    <span class="title">Development Activity</span>
                </div>
                <div class="widget-chart-container">
                    <div id="develop-chart-legend" class="legend-container">
                        <table style="font-size:smaller;color:#545454">
                            <tbody>
                            <tr>
                                <td class="legendColorBox">
                                    <div style="border:1px solid #ccc;padding:1px">
                                        <div style="width:4px;height:0;border:5px solid rgb(44,193,133);overflow:hidden"></div>
                                    </div>
                                </td>
                                <td class="legendLabel">Purchases</td>
                                <td class="legendColorBox">
                                    <div style="border:1px solid #ccc;padding:1px">
                                        <div style="width:4px;height:0;border:5px solid rgb(38,225,150);overflow:hidden"></div>
                                    </div>
                                </td>
                                <td class="legendLabel">Plans</td>
                                <td class="legendColorBox">
                                    <div style="border:1px solid #ccc;padding:1px">
                                        <div style="width:4px;height:0;border:5px solid rgb(67,246,174);overflow:hidden"></div>
                                    </div>
                                </td>
                                <td class="legendLabel">Services</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="develop-chart" style="height: 225px; padding: 0px; position: relative;">
                        <canvas class="flot-base"
                                style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 652.5px; height: 225px;"
                                width="652" height="225"></canvas>
                        <canvas class="flot-overlay"
                                style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 652.5px; height: 225px;"
                                width="652" height="225"></canvas>
                    </div>
                </div>
            </div>
        </div>
@endsection

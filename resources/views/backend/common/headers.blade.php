@php
    $head = (isset($head))?$head:0;
$headers = [];

@endphp
<div class="form-group row m-t-35 ">
    <label class="col-3 col-form-label text-right">
        Header
    </label>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
        <select class=" form-control" data-style="btn-primary" id="headers"
                placeholder="{{trans('color.placeholder.color')}}">
            {{--}}
            <option data-tokens="1" value="1" >Blanco</option>
            <option data-tokens="2" value="2" >Negro</option>
            <option data-tokens="3" value="1" >Rojo</option>--}}
            @foreach($headers as $k=>$v)
                <option data-tokens="{!! $v['id'] !!}" value="{!! $v['id'] !!}"
                        @if($head == $v['id']) selected @endif>{!! $v['name'] !!}</option>
            @endforeach

        </select>
    </div>
</div>





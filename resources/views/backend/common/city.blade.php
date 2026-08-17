<?php $city = (isset($city))?$city:null; ?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
    <div class="form-group row">
        <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
            {{trans('stud.text.city')}}:
        </label>
        <div class="col-xs-10 col-sm-10 col-md-6">
            <input type="text"
                   placeholder="{{trans('stud.placeholder.city')}}"
                   id="city"
                   name="city"
                   value="{!! $city !!}"
                   class="form-control">
        </div>
    </div>
</div>

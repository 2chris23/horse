<?php $instagram = (isset($instagram))?$instagram:null; ?>
<?php $twitter = (isset($twitter))?$twitter:null; ?>
<?php $youtube = (isset($youtube))?$youtube:null; ?>
<?php $facebook = (isset($facebook))?$facebook:null; ?>
<?php $pinterest = (isset($pinterest))?$pinterest:null; ?>
<?php $google = (isset($google))?$google:null; ?>
{{--
$cliente->getYoutube()->getUrl()
$cliente->getInstagram()->getUrl()
$cliente->getTwitter()->getUrl()
--}}
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
    <div class="form-group row">
        <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
            Facebook :
        </label>
        <div class="col-xs-10 col-sm-10 col-md-6">
            <input
                    id="input_cliente_facebook"
                    name="facebook"
                    Type="url"
                    placeholder="{{trans('stud.placeholder.facebook')}}"
                    value="{{$cliente->getFacebook()->getUrl()}}"
                    class="form-control facebook">

        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
    <div class="form-group row">
        <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
            Youtube :
        </label>
        <div class="col-xs-10 col-sm-10 col-md-6">
            <input
                    id="input_cliente_youtube"
                    name="youtube"
                    Type="url"
                    placeholder="{{trans('stud.placeholder.youtube')}}"
                    value="{{ $youtube }}" class="form-control">
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">

    <div class="form-group row">
        <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
            Twitter :
        </label>
        <div class="col-xs-10 col-sm-10 col-md-6">
            <input
                    id="input_cliente_twitter"
                    name="twitter"
                    Type="url"
                    placeholder="{{trans('stud.placeholder.twitter')}}"
                    value="{{ $twitter  }}" class="form-control">
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
    <div class="form-group row">
        <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
            Instagram :
        </label>
        <div class="col-xs-10 col-sm-10 col-md-6">
            <input
                    id="input_cliente_instagram"
                    name="instagram"
                    Type="url"
                    placeholder="{{trans('stud.placeholder.instagram')}}"
                    value="{{$instagram}}" class="form-control">
        </div>
    </div>
</div>
{{--
<div class="form-group row">
    <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
        Google+ :
    </label>
    <div class="col-xs-10 col-sm-10 col-md-6">
        <input
                id="input_cliente_google"
                name="google"
                type="text"
                placeholder="{{trans('stud.placeholder.google')}}"
                value="{{  $google }}" class="form-control">
    </div>
</div>
--}}

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
    <div class="form-group row">
        <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
            Pinterest :
        </label>
        <div class="col-xs-10 col-sm-10 col-md-6">
            <input
                    id="input_cliente_pinterest"
                    name="pinterest"
                    Type="url"
                    placeholder="{{trans('stud.placeholder.instagram')}}"
                    value="{{ $pinterest }}" class="form-control">
        </div>
    </div>
</div>

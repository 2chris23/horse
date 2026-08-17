<?php $logo =url("landing/images/basic/logo.png"); ?>
<?php $logo =url("portal_/images/logoportal.png"); ?>
<?php $logo = url(\Config::get('logos.logoh350')); ?>
@php
    $studId = (\Config::get('app.env') == 'local') ? 1 : 6;
    $yte = \App\Models\Stud::find($studId);
    $linkbaner = $yte ? route('MyPage', ['slug' => $yte->slug]) : url('/');
@endphp

<?php $baner = url('portal_/images/banner-1.png'); ?>
<?php $baner = url('portal_/images/pereira1.jpg'); ?>

<a href="{!! $linkbaner !!}" target="_blank">
    <figure class="banner-dd ">
        <img class="img-responsive " src="{!! $baner !!}" alt="" >
    </figure>
</a>
